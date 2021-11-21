<?php

namespace App\Controller;

use App\Entity\ConteinerMovimentacoes;
use App\Form\ConteinerMovimentacoesType;
use App\Repository\ConteinerMovimentacoesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movimentacoes')]
class ConteinerMovimentacoesController extends AbstractController
{
    #[Route('/', name: 'conteiner_movimentacoes_index', methods: ['GET'])]
    public function index(ConteinerMovimentacoesRepository $conteinerMovimentacoesRepository): Response
    {
        return $this->render('conteiner_movimentacoes/index.html.twig', [
            'conteiner_movimentacoes' => $conteinerMovimentacoesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'conteiner_movimentacoes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $conteinerMovimentaco = new ConteinerMovimentacoes();
        $form = $this->createForm(ConteinerMovimentacoesType::class, $conteinerMovimentaco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($conteinerMovimentaco);
            $entityManager->flush();

            return $this->redirectToRoute('conteiner_movimentacoes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('conteiner_movimentacoes/new.html.twig', [
            'conteiner_movimentaco' => $conteinerMovimentaco,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'conteiner_movimentacoes_show', methods: ['GET'])]
    public function show(ConteinerMovimentacoes $conteinerMovimentaco): Response
    {
        return $this->render('conteiner_movimentacoes/show.html.twig', [
            'conteiner_movimentaco' => $conteinerMovimentaco,
        ]);
    }

    #[Route('/{id}/edit', name: 'conteiner_movimentacoes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ConteinerMovimentacoes $conteinerMovimentaco, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConteinerMovimentacoesType::class, $conteinerMovimentaco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('conteiner_movimentacoes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('conteiner_movimentacoes/edit.html.twig', [
            'conteiner_movimentaco' => $conteinerMovimentaco,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'conteiner_movimentacoes_delete', methods: ['POST'])]
    public function delete(Request $request, ConteinerMovimentacoes $conteinerMovimentaco, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conteinerMovimentaco->getId(), $request->request->get('_token'))) {
            $entityManager->remove($conteinerMovimentaco);
            $entityManager->flush();
        }

        return $this->redirectToRoute('conteiner_movimentacoes_index', [], Response::HTTP_SEE_OTHER);
    }
}
