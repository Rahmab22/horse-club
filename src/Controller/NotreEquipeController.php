<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NotreEquipeController extends AbstractController
{
    #[Route('/equipe', name: 'app_notre_equipe')]
    public function index(): Response
    {
        return $this->render('notre_equipe/index.html.twig', [
            'controller_name' => 'NotreEquipeController',
        ]);
    }
}
