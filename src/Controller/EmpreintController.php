<?php

namespace App\Controller;

use App\Entity\Empreint;
use App\Form\EmpreintType;
use App\Repository\EmpreintRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/empreint')]
class EmpreintController extends AbstractController
{
    #[Route('/', name: 'app_empreint_index', methods: ['GET'])]
    public function index(EmpreintRepository $empreintRepository): Response
    {
        return $this->render('empreint/index.html.twig', [
            'empreints' => $empreintRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_empreint_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EmpreintRepository $empreintRepository): Response
    {
        $empreint = new Empreint();
        $form = $this->createForm(EmpreintType::class, $empreint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $empreintRepository->save($empreint, true);

            return $this->redirectToRoute('app_empreint_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('empreint/new.html.twig', [
            'empreint' => $empreint,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_empreint_show', methods: ['GET'])]
    public function show(Empreint $empreint): Response
    {
        return $this->render('empreint/show.html.twig', [
            'empreint' => $empreint,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_empreint_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Empreint $empreint, EmpreintRepository $empreintRepository): Response
    {
        $form = $this->createForm(EmpreintType::class, $empreint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $empreintRepository->save($empreint, true);

            return $this->redirectToRoute('app_empreint_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('empreint/edit.html.twig', [
            'empreint' => $empreint,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_empreint_delete', methods: ['POST'])]
    public function delete(Request $request, Empreint $empreint, EmpreintRepository $empreintRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$empreint->getId(), $request->request->get('_token'))) {
            $empreintRepository->remove($empreint, true);
        }

        return $this->redirectToRoute('app_empreint_index', [], Response::HTTP_SEE_OTHER);
    }
}
