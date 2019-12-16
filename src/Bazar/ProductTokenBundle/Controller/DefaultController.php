<?php

namespace App\Bazar\ProductTokenBundle\Controller;

use App\Bazar\ConnectDBBundle\Entity\Order\BSaleOrderPropsValue;
use App\Bazar\ProductTokenBundle\Utils\Order;
use App\Bazar\ProductTokenBundle\Utils\Crypter;
use App\Bazar\ProductTokenBundle\Utils\ProductHelper;
use CCatalogSku;
use CIBlockElement;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use QSOFT\BackOffice\Export\Order\OrderException;
use QSOFT\Distributor\Distributor;
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
     * @param Order $order
     * @return JsonResponse
     */
    public function checkToken(Request $request, SessionInterface $session, Order $order)
    {
        $crypto = new Crypter($this->cryptoKey);
        if ($request->headers->get('AuthToken') != $session->get('authKey')) {
            return $this->json(['errors' => ['auth_error']], 403);
        }
        $key = $request->headers->get('AuthToken');
        $orderId = $crypto->decrypt($key);
        $choice = $order->checkStatusChoice($orderId);
        return $this->json(['data' => ['AuthToken' => $session->get('authKey'), 'isChoice' => $choice]]);
    }

    public function checkOrder(Request $request, SessionInterface $session)
    {

    }

    /**
     * @Route("/token/auth", name="auth")
     * @param Request $request
     * @param SessionInterface $session
     * @param Order $order
     * @return JsonResponse
     * @throws Exception
     */
    public function auth(Request $request, SessionInterface $session, Order $order)
    {
        $requestData = json_decode($request->getContent(), true);
        $errors = [];
        $data = [];

        if (!$order->checkAuthToken($requestData['code'], $requestData['phone'])){
            $errors[] = 'Ошибка проверки токена';
            return $this->json(['errors' => $errors], 403);
        }

        try {
            $saleOrder = $order->getSaleOrder();
            $crypt = new Crypter($this->cryptoKey);
            $this->authKey = $crypt->encrypt($saleOrder->getId());
            $choice = $order->checkStatusChoice($saleOrder->getId());
            $data = ['AuthToken' => $this->authKey, 'isChoice' => $choice];
            $session->set('authKey', $this->authKey);
        }catch (Exception $e){
            $errors[] = $e->getMessage();
        }

        if ($errors) {
            return $this->json(['errors' => $errors], 403);
        }

        return $this->json(['data' => $data]);
    }

    /**
     * @Route(path="/token/choice", name="choice")
     * @param Request $request
     * @param SessionInterface $session
     * @return JsonResponse
     */
    public function choice(Request $request, SessionInterface $session):JsonResponse
    {
        $crypt = new Crypter($this->cryptoKey);
        $key = $session->get('authKey');
        if ($request->headers->get('AuthToken') != $key) {
            return $this->json(['errors' => ['auth_error']], 403);
        }
        $orderId = $crypt->decrypt($key);
        $data = ProductHelper::getProductsChoice($orderId);
        return $this->json(['data' => $data]);
    }

    /**
     * @Route(path="/token/selectProduct", methods={"POST"}, name="choiceLoad")
     * @param Request $request
     * @return JsonResponse
     */
    public function selectProduct(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $result = ProductHelper::setProductChoice($data['order_id'], $data['prods']);
        return $this->json(['result' => $result]);
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
        if ($request->headers->get('AuthToken') != $key) {
            return $this->json(['errors' => ['auth_error']], 403);
        }
        $orderId = $crypt->decrypt($key);
        $data = ProductHelper::getProducts($orderId);
        return $this->json(['data' => $data]);
    }
}
