<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Experience;
use App\Entity\FormationCompetence;
use App\Entity\Competence;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Filesystem\Filesystem;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Id;

class ExperienceFixtures extends Fixture implements DependentFixtureInterface
{
    public const Experiences = [
        'Developpeur' => ['Wild Code School', '2014-01-01', '2014-12-31', 'Projet CV perso fictif via Git), Capture the flag,
        Refonte de site web, PHP - POO - PDO - TWIG,
        Projet client réel, Hackathon - consommation d\'une API, Scrum - méthode Agile, Simple MVC/Symfony, Workflow Git/GitHub'],
        'Digital Marketing' => ['Forma School', '2015-01-01', '2015-12-31', 'Ventes et marketing, Campagnes d\'emailing
        Gestion d\'affiliation, Facebook, Instagram
        Stratégie Marketing, Klaviyo, SMS Bump']
    ];

    public function __construct(private Filesystem $filesystem)
    {
    }


    public function load(ObjectManager $manager): void
    {
        foreach (self::Experiences as $nameofposte => $details) {
            $experience = new Experience();
            $experience->setTitreposte($nameofposte);
            $experience->setNomEntreprise($details[0]);
            $experience->setDateDebut(new DateTime($details[1]));
            $experience->setDateFin(new DateTime($details[2]));
            $experience->setDescription($details[3]);
            $experience->setUser($this->getReference('user_1'));

           // $formationCompetence = new FormationCompetence();
           // $manager->persist($formationCompetence);//
            $manager->persist($experience);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CompetenceFixtures::class,
        ];
    }
}

