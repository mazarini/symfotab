<?php

namespace Mazarini\SymfoTabBundle\Controller;

use Mazarini\SymfoTabBundle\Entity\Stab;
use Mazarini\SymfoTabBundle\Form\StabType;
use Mazarini\SymfoTabBundle\Repository\StabRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class StabController extends AbstractController
{
    #[Route('/', name: 'stab_index', methods: ['GET'])]
    public function index(StabRepository $stabRepository): Response
    {
        return $this->render('@MazariniSymfoTab/stab/index.html.twig', [
            'stabs' => $stabRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'stab_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $stab = new Stab();
        $form = $this->createForm(StabType::class, $stab);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stab);
            $entityManager->flush();

            return $this->redirectToRoute('stab_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('@MazariniSymfoTab/stab/new.html.twig', [
            'stab' => $stab,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'stab_show', methods: ['GET'])]
    public function show(Stab $stab): Response
    {
        return $this->render('@MazariniSymfoTab/stab/show.html.twig', [
            'stab' => $stab,
        ]);
    }

    #[Route('/{id}/edit', name: 'stab_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Stab $stab): Response
    {
        $form = $this->createForm(StabType::class, $stab);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stab_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('@MazariniSymfoTab/stab/edit.html.twig', [
            'stab' => $stab,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'stab_delete', methods: ['POST'])]
    public function delete(Request $request, Stab $stab): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stab->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stab);
            $entityManager->flush();
        }

        return $this->redirectToRoute('stab_index', [], Response::HTTP_SEE_OTHER);
    }
}
