<?php

namespace App\Bazar\ProductTokenBundle\Controller;

use App\Bazar\ConnectDBBundle\Entity\Order\BSaleOrder;
use App\Bazar\ConnectDBBundle\Entity\Order\BSaleOrderPropsValue;
use App\Bazar\ConnectDBBundle\Entity\QKey;
use App\Bazar\ConnectDBBundle\Helpers\Crypter;
use App\Bazar\ConnectDBBundle\Helpers\Order;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    protected $authKey;
    private $cryptoKey = 'QH9O9v9D';
    /**
     * @Route("/lk", name="main")
     */
    public function index()
    {
        return $this->render('tokenActivate/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/token/checkToken", name="checkToken")
     * @param Request $request
     * @param SessionInterface $session
     * @return JsonResponse
     */
    public function checkToken(Request $request, SessionInterface $session)
    {
        if ($request->headers->get('AuthToken') != $session->get('authKey')) {
            return $this->json(['errors' => ['auth_error']], 403);
        }
//        return $this->json(['errors' => ['auth_error']], 403);

        return $this->json(['data' => ['AuthToken' => $session->get('authKey')]]);
    }

    /**
     * @Route("/token/auth", name="auth")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param SessionInterface $session
     * @return JsonResponse
     * @throws \Exception
     */
    public function auth(Request $request, EntityManagerInterface $em, SessionInterface $session)
    {
        $requestData = json_decode($request->getContent(), true);
        $errors = [];
        $data = [];
        $order = new Order($em);
        $repoProps = $this->getDoctrine()->getRepository(BSaleOrderPropsValue::class);
        $props = $repoProps->findBy(['code' => 'UNIQUE_KEYS_CODE', 'value' => $requestData['code']]);

        foreach ($props as $prop){
            dd($prop->getOrderId());
            $order = $order->getByProp(['code' => 'PHONE', 'value' => $requestData['phone'], 'orderId' => $prop->getOrderId()]);
        }

        if (!$order){
            return $this->json(['errors' => $errors], 403);
        }
        dd($order);


        if ($order != '') {
            $crypter = new Crypter($this->cryptoKey);
            $this->authKey = $crypter->encrypt($order->getId());
            $data = ['AuthToken' => $this->authKey];
            $session->set('authKey', $this->authKey);
        } else {
            $errors[] = 'login error';
        }

        if (count($errors)) {
            return $this->json(['errors' => $errors], 403);
        }

        return $this->json(['data' => $data]);
    }

    /**
     * @Route("/token/products", name="products")
     * @param Request $request
     * @param SessionInterface $session
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function products(Request $request, SessionInterface $session, EntityManagerInterface $em):JsonResponse
    {
        $crypt = new Crypter($this->cryptoKey);
        $key = $session->get('authKey');
        $orderId = $crypt->decrypt($key);
        $obOrder = new \QSOFT\Distributor\Order($orderId);

        $dbKey = \QSOFT\Distributor\DistributorNew::getKeys(['order_id' => $orderId], [], true);
        while ($arKey = $dbKey->Fetch())
        {
            $item = $obOrder->getItemById($arKey['product_id']);
            $arKey['down_link'] = $item->getDownloadLink();
            $arKey['name'] = \CIBlockElement::GetByID($arKey['product_id'])->fetch()['NAME'];
            $items[] = $arKey;
        }
//        dd($items);
//        dd($orderId);
        if ($request->headers->get('AuthToken') != $key) {
            return $this->json(['errors' => ['auth_error']], 403);
        }

        $data = [
            'order' => $obOrder->getId(),
        ];
        foreach ($items as $item){
            $data['items'][] = [
                'order' => $item['key'],
                'link' => $item['down_link'],
                'name' => $item['name']
            ];
        }

        return $this->json(['data' => $data]);
    }
}
