<?php

namespace App\Controller;

use App\Service\DashboardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route(path="/", name="app_home")
     *
     * @return Response
     */
    public function home(): ?Response
    {
        return $this->redirectToRoute('app_index');
    }

    /**
     * @Route(path="/dashboard", name="app_index")
     *
     * @return Response
     */
    public function index(DashboardService $service): ?Response
    {
        return $this->render('dash/dash.html.twig', [
            'employees' => $service->getEmployeeCount(),
            'equipment' => $service->getEquipmentCount(),
            'handovers' => $service->getHandoverCount(),
            'totalPrice' => $service->getTotalPrice()
        ]);
    }
}