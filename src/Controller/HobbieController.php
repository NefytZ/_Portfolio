<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HobbieController extends AbstractController
{
    #[Route('/hobbie', name: 'app_hobbie')]
    public function index(): Response
    {
        return $this->render('hobbie/index.html.twig', [
            'controller_name' => 'HobbieController',
        ]);
    }
}
