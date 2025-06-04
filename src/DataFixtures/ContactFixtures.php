<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contacts = [
            [
                'fullName' => 'Alice Martin',
                'email' => 'alice.martin@example.com',
                'message' => 'I’d like to know more about your services.',
            ],
            [
                'fullName' => 'Julien Bernard',
                'email' => 'julien.bernard@example.com',
                'message' => 'Can I schedule a meeting with an advisor next week?',
            ],
            [
                'fullName' => 'Sophie Dubois',
                'email' => 'sophie.dubois@example.com',
                'message' => 'Your website is great! Just wanted to say thanks.',
            ],
            [
                'fullName' => 'Marc Lefevre',
                'email' => 'marc.lefevre@example.com',
                'message' => 'Do you offer support in French and English?',
            ],
            [
                'fullName' => 'Emma Rousseau',
                'email' => 'emma.rousseau@example.com',
                'message' => 'I’d like a quote for financial advisory.',
            ],
        ];

        foreach ($contacts as $data) {
            $contact = new Contact();
            $contact->setFullName($data['fullName']);
            $contact->setEmail($data['email']);
            $contact->setMessage($data['message']);

            $manager->persist($contact);
        }

        $manager->flush();
    }
}
