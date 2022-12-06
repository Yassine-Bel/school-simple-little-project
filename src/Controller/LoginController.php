<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController {
    #[Route('/login', 'login.index', methods: ['GET'])]
    public function index(): Response {
        return $this->render('login.html.twig');
    }
}
