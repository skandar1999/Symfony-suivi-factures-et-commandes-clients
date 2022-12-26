<?php

namespace App\Controller;

use App\Entity\Pc;
use App\Form\PcType;
use App\Repository\PcRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pc')]
class PcController extends AbstractController
{
    #[Route('/', name: 'app_pc_index', methods: ['GET'])]
    public function index(PcRepository $pcRepository): Response
    {
        return $this->render('pc/index.html.twig', [
            'pcs' => $pcRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pc_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PcRepository $pcRepository): Response
    {
        $pc = new Pc();
        $form = $this->createForm(PcType::class, $pc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pcRepository->save($pc, true);

            return $this->redirectToRoute('app_pc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pc/new.html.twig', [
            'pc' => $pc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pc_show', methods: ['GET'])]
    public function show(Pc $pc): Response
    {
        return $this->render('pc/show.html.twig', [
            'pc' => $pc,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pc_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pc $pc, PcRepository $pcRepository): Response
    {
        $form = $this->createForm(PcType::class, $pc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pcRepository->save($pc, true);

            return $this->redirectToRoute('app_pc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pc/edit.html.twig', [
            'pc' => $pc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pc_delete', methods: ['POST'])]
    public function delete(Request $request, Pc $pc, PcRepository $pcRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pc->getId(), $request->request->get('_token'))) {
            $pcRepository->remove($pc, true);
        }

        return $this->redirectToRoute('app_pc_index', [], Response::HTTP_SEE_OTHER);
    }
}
