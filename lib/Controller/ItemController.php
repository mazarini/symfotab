<?php

namespace Mazarini\SymfoTabBundle\Controller;

use Mazarini\SymfoTabBundle\Entity\Item;
use Mazarini\SymfoTabBundle\Form\ItemType;
use Mazarini\SymfoTabBundle\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[Route('/')]
class ItemController extends AbstractController
{
    #[Route('/', name: 'item_home', methods: ['GET'])]
    public function home(): Response
    {
        return $this->redirectToRoute('item_index', ['tableName'=>'table'], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{tableName}', name: 'item_index', methods: ['GET'])]
    public function index(ItemRepository $itemRepository,string $tableName): Response
    {
        $items = $itemRepository->getTable($tableName);
        return $this->render('@MazariniSymfoTab/item/index.html.twig', [
            'items'=>$items,
        ]);
    }

    #[Route('{tableName}/new.html', name: 'item_new', methods: ['GET','POST'])]
    public function new(Request $request,string $tableName): Response
    {
        $item = new Item();
        $item->setTableName($tableName);

        return $this->edit($request, $tableName, $item);
    }

    #[Route('/{tableName}/show-{id}.html', name: 'item_show', methods: ['GET'])]
    public function show(string $tableName, Item $item): Response
    {
        if ($item->getTableName() !== $tableName) {
            throw new NotFoundHttpException();
        }

        return $this->render('@MazariniSymfoTab/item/show.html.twig', [
            'item' => $item,
        ]);
    }

    #[Route('/{tableName}/edit-{id}.html', name: 'item_edit', methods: ['GET','POST'])]
    public function edit(Request $request,string $tableName, Item $item): Response
    {
        if ($item->getTableName() !== $tableName) {
            throw new NotFoundHttpException();
        }
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            if ($item-isNew()) {
                $entityManager->persist($item);
            }
            $entityManager->flush();

            return $this->redirectToRoute('item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('@MazariniSymfoTab/item/edit.html.twig', [
            'item' => $item,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'item_delete', methods: ['POST'])]
    public function delete(Request $request, Item $item): Response
    {
        if ($this->isCsrfTokenValid('delete'.$item->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($item);
            $entityManager->flush();
        }

        return $this->redirectToRoute('item_index', [], Response::HTTP_SEE_OTHER);
    }
}
