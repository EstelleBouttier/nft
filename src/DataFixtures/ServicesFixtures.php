<?php

namespace App\DataFixtures;

use App\Entity\Services;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\HttpFoundation\File\File;

class ServicesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $services = [
            [
                'title' => 'Strategy Consulting',
                'description' => "A social assistant that's flexible can accommodate your schedule and needs, making life easier.",
                'image' => '1.png'
            ],
            [
                'title' => 'Financial Advisory',
                'description' => 'Modules transform smart trading by automating processes and improving decision-making.',
                'image' => '2.png'
            ],
            [
                'title' => 'Management',
                'description' => "There, it's me, your friendly neighborhood reporter's news analyst processes and improving",
                'image' => '3.png'
            ],
            [
                'title' => 'Supply Optimization',
                'description' => "Hey, have you checked out that new cryptocurrency platform? It's pretty cool and easy to use!",
                'image' => '4.png'
            ],
            [
                'title' => 'HR consulting',
                'description' => 'Hey guys, just a quick update on exchange orders. There have been some changes currency!',
                'image' => '5.png'
            ],
            [
                'title' => 'Marketing consulting',
                'description' => 'Hey! Just wanted to let you know that the price notification module processes is now live!',
                'image' => '6.png'
            ],
        ];

        foreach ($services as $data) {
            $service = new Services();
            $service->setTitle($data['title']);
            $service->setDescription($data['description']);

            $imagePath = __DIR__ . '/../../public/images/service/' . $data['image'];
            if (file_exists($imagePath)) {
                $file = new File($imagePath);
                $service->setImageFile($file);
                $service->setImageName($data['image']);
                $service->setImageSize(filesize($imagePath));
            }

            $manager->persist($service);
        }


        $manager->flush();
    }
}
