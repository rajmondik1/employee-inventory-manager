<?php

namespace App\Controller;

use App\Entity\EquipmentHandover;
use App\Form\EquipmentHandoverType;
use App\Repository\EquipmentHandoverRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/equipment-handover")
 */
class EquipmentHandoverController extends AbstractController
{
    /**
     * @Route("/", name="equipment_handover_index", methods={"GET"})
     */
    public function index(EquipmentHandoverRepository $equipmentHandoverRepository): Response
    {
        return $this->render('equipment_handover/index.html.twig', [
            'equipment_handovers' => $equipmentHandoverRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="equipment_handover_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $equipmentHandover = new EquipmentHandover();
        $form = $this->createForm(EquipmentHandoverType::class, $equipmentHandover);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($equipmentHandover);
            $entityManager->flush();

            return $this->redirectToRoute('equipment_handover_index');
        }

        return $this->render('equipment_handover/new.html.twig', [
            'equipment_handover' => $equipmentHandover,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="equipment_handover_show", methods={"GET"})
     */
    public function show(EquipmentHandover $equipmentHandover): Response
    {
        return $this->render('equipment_handover/show.html.twig', [
            'equipment_handover' => $equipmentHandover,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="equipment_handover_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EquipmentHandover $equipmentHandover): Response
    {
        $form = $this->createForm(EquipmentHandoverType::class, $equipmentHandover);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('equipment_handover_index');
        }

        return $this->render('equipment_handover/edit.html.twig', [
            'equipment_handover' => $equipmentHandover,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="equipment_handover_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EquipmentHandover $equipmentHandover): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipmentHandover->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($equipmentHandover);
            $entityManager->flush();
        }

        return $this->redirectToRoute('equipment_handover_index');
    }
}
