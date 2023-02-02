<?php

namespace App\Controller;

use App\Repository\HobbieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HobbieController extends AbstractController
{
    #[Route('/hobbie', name: 'app_hobbie')]
    public function index(HobbieRepository $hobbieRepository): Response
    {
        $hobbie = $hobbieRepository->findAll();
        return $this->render('hobbie/index.html.twig', [
            'hobbies' => $hobbie,
        ]);
    }
}
