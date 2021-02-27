<?php

namespace App\Controller;

use App\Message\DoSomethingMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends ApiController
{
    /**
     * @Route(path="/", name="index")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(): ?Response
    {
        return $this->apiJsonResponse('Success');
    }

    // TODO: https://symfony.com/doc/current/components/security.html

    /**
     * @Route(path="/test", name="app_index")
     *
     * @param MessageBusInterface $bus
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function test()
    {
        return new Response('Your message has been dispatched!');
    }
}