<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddBookController extends AbstractController {
    #[Route('/addbook', 'addbook.index', methods: ['GET'])]
    public function index(): Response {
        return $this->render('addbook.html.twig');
    }
}