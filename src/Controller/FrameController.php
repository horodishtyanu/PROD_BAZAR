<?php


namespace App\Controller;


use App\Utils\Rostelekom\RostelePaymentService;
use QSOFT\BackOffice\Export\Order\OrderException;
use QSOFT\Distributor\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class FrameController extends AbstractController
{

    /**
     * @Route(path="/api/frame", methods={"GET"}, name="renderRostelekomFrame")
     * @param Request $request
     * @return Response
     */
    public function getFrame(Request $request): Response
    {
        $params = $request->query->all();
        if (isset($params['offerId']) && $params['userId']) {
            return $this->render("iframe/base.html.twig", ['params' => $params]);
        }else{
            return $this->json(['error' => 'Отсутствуют обязательные параметры!'], '500');
        }
    }


    /**
     * @Route(path="/api/frame", methods={"POST"}, name="makeRostelekomOrder")
     * @param Request $request
     * @return Response
     *
     * {
     * "attributes":[
     * {"inphone":"1234567890"},
     * {"key":"54564878454"} ,
     * {"orderid":"654785"
     * ],
     * "cost":13246,
     * "chequeText":"Наименование программы, ключ: 54564878454",
     * "status":"0",
     * }
     *
     */
    public function makeOrder(Request $request)
    {
        $params = $request->request->all();
        $rostele = new RostelePaymentService($params['offerId'], $params['phone'], $params['userId']);
        $result = $rostele->makeOrder();

        return $this->json(json_encode($result));
    }

    /**
     * @Route(path="/api/frame/order", methods={"POST"}, name="releaseOrder")
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function releaseOrder(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $date = new \DateTime();

        try {
            $order = new Order($data['payParamList'][0]['paramValue']);
            $orderId = $order->getId();
        } catch (OrderException $exception) {
            return $this->json([
                'reqStatus' => -1,
                'reqNote'   => $exception->getMessage()
            ]);
        }

        if ($order->getRetailer()->SITE_ID !== 'rt') {
            return $this->json([
                'reqStatus' => -1,
                'reqNote'   => "Заказ не найден у данного ретейлера!"
            ]);
        }

        if ($data['reqType'] == 'createPayment' && $orderId) {
            try {
                $result = RostelePaymentService::sendKeysBySMS($orderId);
            } catch (\Exception $exception) {
                return $this->json([
                    'reqStatus' => -1,
                    'reqNote'   => $exception->getMessage()
                ]);
            }
            return $this->json([
                'reqStatus'  => 0,
                "dstPayId"   => $orderId,
                "payStatus"  => (int)$result,
                "statusTime" => $date->format('Y-m-d\TH:i:sP')
            ]);
        } elseif ($data['reqType'] == 'abandonPayment' && $orderId) {
            $result = RostelePaymentService::abandonPayment($orderId);
            if ($result !== true) {
                return $this->json([
                    'reqStatus' => -1,
                    'reqNote'   => $result
                ]);
            } else {
                return $this->json([
                    'reqStatus'        => 0,
                    "payStatus"        => (int)$result,
                    "dstPayId"         => $orderId,
                    "statusTime"       => $date->format('Y-m-d\TH:i:sP'),
                    "abandonReason"    => 1,
                    "abandonInitiator" => 1
                ]);
            }
        } else {
            return $this->json([
                'reqStatus' => -1,
                'reqNote'   => "Ошибка исполнения запроса!"
            ]);
        }

    }
}