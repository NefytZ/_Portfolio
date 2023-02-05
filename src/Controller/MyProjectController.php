<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyProjectController extends AbstractController
{
    #[Route('/my/project', name: 'app_my_project')]
    public function index(): Response
    {
        return $this->render('my_project/index.html.twig', [
            'controller_name' => 'MyProjectController',
        ]);
    }
}
