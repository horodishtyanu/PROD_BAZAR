<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VASController extends AbstractController
{
    /**
     * @Route(path="/api/statusVas", name="CallBack Vas")
    **/
    public function callback()
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();
    }
}