<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $teams = [
            ['name' => 'Dianne Russell', 'role' => 'Trade Captain'],
            ['name' => 'Theresa Webb', 'role' => 'Strategic Advisor'],
            ['name' => 'Courtney Henry', 'role' => 'Management Consultant'],
            ['name' => 'Albert Flores', 'role' => 'Development Specialist'],
            ['name' => 'Darrell Steward', 'role' => 'Growth Strategist'],
            ['name' => 'Wade Warren', 'role' => 'Trade Consultant'],
            ['name' => 'Cody Fisher', 'role' => 'HR Consultant'],
            ['name' => 'Bessie Cooper', 'role' => 'Financial Advisor'],
        ];

        foreach ($teams as $data) {
            $team = new Team();
            $team->setName($data['name']);
            $team->setRole($data['role']);

            $manager->persist($team);
        }

        $manager->flush();
    }
}
