<?php

namespace App\Controller;

use App\Entity\Authorization;
use App\Form\AuthorizationType;
use App\Repository\AuthorizationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/authorization')]
class AuthorizationController extends AbstractController
{
    #[Route('/', name: 'app_authorization_index', methods: ['GET'])]
    public function index(AuthorizationRepository $authorizationRepository): Response
    {
        return $this->render('authorization/index.html.twig', [
            'authorizations' => $authorizationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_authorization_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AuthorizationRepository $authorizationRepository): Response
    {
        $authorization = new Authorization();
        $form = $this->createForm(AuthorizationType::class, $authorization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $authorizationRepository->save($authorization, true);

            return $this->redirectToRoute('app_authorization_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('authorization/new.html.twig', [
            'authorization' => $authorization,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_authorization_show', methods: ['GET'])]
    public function show(Authorization $authorization): Response
    {
        return $this->render('authorization/show.html.twig', [
            'authorization' => $authorization,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_authorization_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Authorization $authorization, AuthorizationRepository $authorizationRepository): Response
    {
        $form = $this->createForm(AuthorizationType::class, $authorization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $authorizationRepository->save($authorization, true);

            return $this->redirectToRoute('app_authorization_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('authorization/edit.html.twig', [
            'authorization' => $authorization,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_authorization_delete', methods: ['POST'])]
    public function delete(Request $request, Authorization $authorization, AuthorizationRepository $authorizationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$authorization->getId(), $request->request->get('_token'))) {
            $authorizationRepository->remove($authorization, true);
        }

        return $this->redirectToRoute('app_authorization_index', [], Response::HTTP_SEE_OTHER);
    }
}
