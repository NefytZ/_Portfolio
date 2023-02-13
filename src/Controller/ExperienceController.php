<?php

namespace App\Controller;

use App\Repository\ExperienceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExperienceController extends AbstractController
{
    #[Route('/experience', name: 'app_experience')]
    public function index(ExperienceRepository $experienceRepository): Response
    {
        $experience = $experienceRepository->findAll();
        return $this->render('experience/index.html.twig', [
            'experiences' => $experience,
        ]);
    }
}
