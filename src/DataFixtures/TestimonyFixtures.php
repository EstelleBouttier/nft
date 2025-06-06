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
            ['comment' => 'Super service, très satisfait !', 'note' => 5],
            ['comment' => 'Bonne expérience, mais peut être améliorée.', 'note' => 4],
            ['comment' => 'Moyen, j’ai eu quelques soucis.', 'note' => 3],
        ];

        foreach ($testimonies as $data) {
            $testimony = new Testimony();
            $testimony->setComment($data['comment']);
            $testimony->setNote($data['note']);
            $testimony->setCreatedAt(new \DateTimeImmutable());

            $manager->persist($testimony);
        }

        $manager->flush();
    }
}
