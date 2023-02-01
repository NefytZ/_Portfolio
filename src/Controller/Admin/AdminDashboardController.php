<?php

namespace App\Controller\Admin;
use Locale;
use App\Entity\User;
use App\Entity\Hobbie;
use App\Entity\Formation;
use App\Entity\Competence;
use App\Entity\Experience;
use App\Repository\ExperienceRepository;
use Container7aRvcPF\getExperienceService;
use App\Controller\AdminExperienceController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Dto\LocaleDto;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Container7aRvcPF\getAdminExperienceControllerService;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class AdminDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(): Response
    {
        return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Thyphen\'s Portfolio Administration');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Portfolio'),
            MenuItem::linkToCrud('Experiences', 'fa fa-tags', Experience::class),
            MenuItem::linkToCrud('Formations', 'fa fa-tags', Formation::class),
            MenuItem::linkToCrud('Compétences', 'fa fa-tags', Competence::class),
            MenuItem::linkToCrud('Hobbies', 'fa fa-tags', Hobbie::class),

            MenuItem::section('Utilisateur'),
            MenuItem::linkToCrud('Thyphen', 'fa fa-tags', User::class)
        ];
    }
}
