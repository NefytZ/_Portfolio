<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Filesystem\Filesystem;



class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public const Projects = [
        'Projet A' => ['Description du projet A', 'https://github.com/NefytZ/projet-a'],
        'Projet B' => ['Description du projet B', 'https://github.com/NefytZ/projet-b'],
        'Projet C' => ['Description du projet C', 'https://github.com/NefytZ/projet-c'],
        'Projet D' => ['Description du projet D', 'https://github.com/NefytZ/projet-d']
    ];

    public function __construct(private Filesystem $filesystem)
    {
    }


    public function load(ObjectManager $manager): void
    {
        foreach (self::Projects as $name => $description) {
        $project = new Project();
        $project->setTitre($name);
        $project->setDescription($description[0]);
        $project->setUrl($description[1]);
        $project->setUser($this->getReference('user_1'));
        $manager->persist($project);
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