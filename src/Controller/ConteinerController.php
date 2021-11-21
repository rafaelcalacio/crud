<?php

namespace App\Controller;

use App\Entity\Conteiner;
use App\Form\ConteinerType;
use App\Repository\ConteinerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/conteiner')]
class ConteinerController extends AbstractController
{
    #[Route('/', name: 'conteiner_index', methods: ['GET'])]
    public function index(ConteinerRepository $conteinerRepository): Response
    {
        return $this->render('conteiner/index.html.twig', [
            'conteiners' => $conteinerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'conteiner_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $conteiner = new Conteiner();
        $form = $this->createForm(ConteinerType::class, $conteiner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($conteiner);
            $entityManager->flush();

            return $this->redirectToRoute('conteiner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('conteiner/new.html.twig', [
            'conteiner' => $conteiner,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'conteiner_show', methods: ['GET'])]
    public function show(Conteiner $conteiner): Response
    {
        return $this->render('conteiner/show.html.twig', [
            'conteiner' => $conteiner,
        ]);
    }

    #[Route('/{id}/edit', name: 'conteiner_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Conteiner $conteiner, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConteinerType::class, $conteiner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('conteiner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('conteiner/edit.html.twig', [
            'conteiner' => $conteiner,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'conteiner_delete', methods: ['POST'])]
    public function delete(Request $request, Conteiner $conteiner, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conteiner->getId(), $request->request->get('_token'))) {
            $entityManager->remove($conteiner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('conteiner_index', [], Response::HTTP_SEE_OTHER);
    }
}
