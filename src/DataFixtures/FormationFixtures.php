<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Formation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Filesystem\Filesystem;


class FormationFixtures extends Fixture
{
    public const Formations = [
        'WAB - Le digital coopératif' => ['Gestion d\'une page commerciale', '2014-01-01', '2014-12-31', 'Une formation pour apprendre à gérer une page commerciale'],
        'CFA Agglomération Métropole' => ['Bac Pro Commerce', '2015-01-01', '2015-12-31', 'Une formation pour obtenir un Bac Pro en commerce'],
        'CFA Agglomération Métropole' => ['CAP Vente Spécialiation objets divers', '2016-01-01', '2016-12-31', 'Une formation pour obtenir un CAP en vente avec une spécialisation en objets divers'],
        'Wild Code School' => ['Developpeur Web et Web Mobile (équivalence BAC+2)', '2017-01-01', '2017-12-31', 'Une formation pour devenir développeur web et mobile'],
    ];

    public function __construct(private Filesystem $filesystem)
    {
    }


    public function load(ObjectManager $manager): void
    {
        foreach (self::Formations as $nameoforganisation => $details) {
        $formation = new formation();
        $formation->setNomEtablissement($nameoforganisation);
        $formation->setDiplome($details[0]);
        $formation->setDateDebut(new DateTime($details[1]));
        $formation->setDateFin(new DateTime($details[2]));
        $formation->setDescription($details[3]);

        $manager->persist($formation);
        }

        $manager->flush();
    }
}

