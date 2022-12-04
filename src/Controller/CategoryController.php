<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController {
    #[Route('/category', 'category.index', methods: ['GET'])]
    public function index(): Response {
        return $this->render('category.html.twig');
    }
}