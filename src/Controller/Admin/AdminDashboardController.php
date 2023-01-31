<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Controller\AdminExperienceController;
use App\Entity\Competence;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Entity\Hobbie;
use App\Repository\ExperienceRepository;
use Container7aRvcPF\getAdminExperienceControllerService;
use Container7aRvcPF\getExperienceService;
use Locale;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\LocaleDto;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class AdminDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin.index")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
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

            MenuItem::section('POrtfolio'),
            MenuItem::linkToCrud('Experiences', 'fa fa-tags', Experience::class),
            MenuItem::linkToCrud('Formations', 'fa fa-tags', Formation::class),
            MenuItem::linkToCrud('Compétences', 'fa fa-tags', Competence::class),
            MenuItem::linkToCrud('Hobbies', 'fa fa-tags', Hobbie::class),
        ];
    }
}
