<?php

namespace App\DataFixtures;

use App\Entity\Testimony;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TestimonyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       $testimonies = [
            ['name' => 'Alice Dupont', 'comment' => 'Super service, très satisfait !', 'note' => 5],
            ['name' => 'Jean Durand', 'comment' => 'Bonne expérience, mais peut être améliorée.', 'note' => 4],
            ['name' => 'Sophie Martin', 'comment' => 'Moyen, j’ai eu quelques soucis.', 'note' => 3],
        ];

        foreach ($testimonies as $data) {
            $testimony = new Testimony();
            $testimony->setName($data['name']);
            $testimony->setComment($data['comment']);
            $testimony->setNote($data['note']);
            $testimony->setCreatedAt(new \DateTimeImmutable());

            $manager->persist($testimony);
        }

        $manager->flush();
    }
}
