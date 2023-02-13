<?php

namespace App\DataFixtures;

use App\Entity\Hobbie;
use App\DataFixtures\UserFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Filesystem\Filesystem;



class HobbieFixtures extends Fixture implements DependentFixtureInterface
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
        $hobbie->setUser($this->getReference('user_1'));
        $manager->persist($hobbie);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
