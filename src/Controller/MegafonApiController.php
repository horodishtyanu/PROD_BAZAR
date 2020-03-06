<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MegafonApiController extends AbstractController
{

    private $token = "mlMbgRfwwWOK";

    /**
     * @Route(path="/api/megafon/create", methods={"POST"}, name="megafonCreateOrder")
     * @param Request $request
     * @return Response
     *
     * {
        "GUID": "5649871464",
        "PHONE": "79851467824",
        "TOKEN": "mlMbgRfwwWOK"
        }
     */
    public function createOrder(Request $request):Response
    {
        $data = json_decode($request->getContent(), true);
        if (isset($data['GUID']) && isset($data['PHONE']) && $data['TOKEN'] == $this->token){
            return $this->json(['success' => true, 'ORDER_ID' => '564780']);
        }
        else{
            return $this->json(['success' => false]);
        }
    }


    /**
     * @Route(path="/api/megafon/disable")
     * @param Request $request
     * @return Response
     *
     * {
        "ORDER_ID": "564780",
        "PHONE": "79851467824",
        "TOKEN": "mlMbgRfwwWOK"
        }
     */
    public function disableKey(Request $request):Response
    {
        $data = json_decode($request->getContent(), true);
        if (isset($data['ORDER_ID']) && isset($data['PHONE']) && $data['TOKEN'] == $this->token){
            return $this->json(['success' => true]);
        }
        else{
            return $this->json(['success' => false]);
        }
    }

}