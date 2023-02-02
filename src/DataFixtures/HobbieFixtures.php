<?php

namespace App\DataFixtures;

use App\Entity\Hobbie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Filesystem\Filesystem;


class HobbieFixtures extends Fixture
{
    public const Hobbies = [
        'Series TV' => 'Netflix Goat',
        'Musique' => 'Passion',
        'Informatique' => 'Dev..'
    ];

    public function __construct(private Filesystem $filesystem)
    {
    }


    public function load(ObjectManager $manager): void
    {
        foreach (self::Hobbies as $name => $description) {
        $hobbie = new Hobbie();
        $hobbie->setNom($name);
        $hobbie->setDescription($description);
        $manager->persist($hobbie);
        }

        $manager->flush();
    }
}
