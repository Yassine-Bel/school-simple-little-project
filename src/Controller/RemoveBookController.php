<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemoveBookController extends AbstractController
{
    #[Route('/remove/book', name: 'app_remove_book')]
    public function index(): Response
    {
        return $this->render('remove_book/index.html.twig', [
            'controller_name' => 'RemoveBookController',
        ]);
    }
}
