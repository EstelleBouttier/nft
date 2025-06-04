<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $arrayCategories = [
            [
                'title' => 'Services',
                'slug' => 'services',
                'children' => [
                    ['title' => 'Services details', 'slug' => 'services-details'],
                ],
            ],
            [
                'title' => 'About',
                'slug' => 'about',
                'children' => [
                    ['title' => 'About us', 'slug' => 'about-us'],
                    ['title' => 'Team', 'slug' => 'team'],
                    ['title' => 'Price', 'slug' => 'price'],
                ],
            ],
            [
                'title' => 'Blog',
                'slug' => 'blog',
                'children' => [],
            ],
            [
                'title' => 'Contact us',
                'slug' => 'contact-us',
                'children' => [],
            ],
        ];

        foreach ($arrayCategories as $item) {
            $parent = new Categories();
            $parent->setName($item['title']);
            $parent->setSlug($item['slug']);
            $parent->setParent(null);

            $manager->persist($parent);

            foreach ($item['children'] as $child) {
                $subCategory = new Categories();
                $subCategory->setName($child['title']);
                $subCategory->setSlug($child['slug']);
                $subCategory->setParent($parent);

                $manager->persist($subCategory);
            }
        }

        $manager->flush();
    }
}
