<?php

namespace App\Controller;

use App\Repository\CompetenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetenceController extends AbstractController
{
    #[Route('/competence', name: 'app_competence')]
    public function index(CompetenceRepository $competenceRepository): Response
    {
        $competence = $competenceRepository->findAll();
        return $this->render('competence/index.html.twig', [
            'competences' => $competence,
        ]);
    }
}
