<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MyProjectController extends AbstractController
{
    #[Route('/my_project', name: 'app_my_project')]
    public function index(ProjectRepository $projectRepository): Response
    {
        $project = $projectRepository->findAll();
        return $this->render('my_project/index.html.twig', [
            'projects' => $project,
        ]);
    }
}
