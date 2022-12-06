<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController {
    #[Route('/reservation', 'reservation.index', methods: ['GET'])]
    public function index(): Response {
        
        return $this->render('reservation.html.twig');
    }
}