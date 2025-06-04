<?php

namespace App\DataFixtures;

use App\Entity\Services;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ServicesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $services = [
            [
                'title' => 'Strategy Consulting',
                'description' => "A social assistant that's flexible can accommodate your schedule and needs, making life easier.",
            ],
            [
                'title' => 'Financial Advisory',
                'description' => 'Modules transform smart trading by automating processes and improving decision-making.',
            ],
            [
                'title' => 'Management',
                'description' => "There, it's me, your friendly neighborhood reporter's news analyst processes and improving",
            ],
            [
                'title' => 'Supply Optimization',
                'description' => "Hey, have you checked out that new cryptocurrency platform? It's pretty cool and easy to use!",
            ],
            [
                'title' => 'HR consulting',
                'description' => 'Hey guys, just a quick update on exchange orders. There have been some changes currency!',
            ],
            [
                'title' => 'Marketing consulting',
                'description' => 'Hey! Just wanted to let you know that the price notification module processes is now live!',
            ],
        ];

        foreach ($services as $data) {
            $service = new Services();
            $service->setTitle($data['title']);
            $service->setDescription($data['description']);

            $manager->persist($service);
        }


        $manager->flush();
    }
}
