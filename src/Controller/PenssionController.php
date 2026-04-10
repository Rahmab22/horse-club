<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PenssionController extends AbstractController
{
    #[Route('/penssion', name: 'app_penssion')]
    public function index(): Response
    {
        return $this->render('penssion/index.html.twig', [
            'controller_name' => 'PenssionController',
        ]);
    }
}
