<?php


namespace App\Controller;


use App\Utils\Rostelekom\RostelePaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

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

        return $this->json($result);
    }
}