<?php

namespace App\Controller;

use App\Repository\CompetenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CompetenceRepository $competenceRepository): Response
    {
        $competence = $competenceRepository->findAll();
        return $this->render('home/index.html.twig', [
            'user' => $this->getUser(),
            'competences' => $competence,

        ]);
    }
}
