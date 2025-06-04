<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\HttpFoundation\File\File;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $teams = [

            ['name' => 'Dianne Russell', 'role' => 'Trade Captain', 'image' => '1.png'],
            ['name' => 'Theresa Webb', 'role' => 'Strategic Advisor', 'image' => '2.png'],
            ['name' => 'Courtney Henry', 'role' => 'Management Consultant', 'image' => '3.png'],
            ['name' => 'Albert Flores', 'role' => 'Development Specialist', 'image' => '4.png'],
            ['name' => 'Darrell Steward', 'role' => 'Growth Strategist', 'image' => '5.png'],
            ['name' => 'Wade Warren', 'role' => 'Trade Consultant', 'image' => '6.png'],
            ['name' => 'Cody Fisher', 'role' => 'HR Consultant', 'image' => '7.png'],
            ['name' => 'Bessie Cooper', 'role' => 'Financial Advisor', 'image' => '8.png'],
        ];

        foreach ($teams as $data) {
            $team = new Team();
            $team->setName($data['name']);
            $team->setRole($data['role']);

            $imagePath = __DIR__ . '/../../public/uploads/team/' . $data['image'];
            if (file_exists($imagePath)) {
                $file = new File($imagePath);
                $team->setImageFile($file);
                $team->setImageName($data['image']);
                $team->setImageSize(filesize($imagePath));
            } 
            
            $manager->persist($team);
        }

        $manager->flush();
    }
}
