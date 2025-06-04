<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $posts = [
            [
                'title' => 'Online Trading For Beginners',
                'category' => 'Forex Trading',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Barutcu Yesar',
                'date' => '2023-05-28',
            ],
            [
                'title' => 'Advantages Of Day Trading',
                'category' => 'Trading Market',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Yilmaz Orhan',
                'date' => '2023-05-29',
            ],
            [
                'title' => 'Conditions To Claim Deduction',
                'category' => 'Investment',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Huseyin Akogul',
                'date' => '2023-04-29',
            ],[
                'title' => 'Extra source of income',
                'category' => 'Forex Trading',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Gazali Oztepe',
                'date' => '2023-02-22',
            ],
            [
                'title' => 'Control Trades and Portfolio',
                'category' => 'Investment',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Muazzez Yasar',
                'date' => '2023-04-19',
            ],
            [
                'title' => 'The Pros and Cons of Trading',
                'category' => 'Trading Market',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Sevil Haslak',
                'date' => '2023-08-26',
            ],[
                'title' => 'Diversified Trading Portfolio',
                'category' => 'Forex Trading',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Ayse Nuriye',
                'date' => '2023-05-28',
            ],
            [
                'title' => 'Profits Trading Techniques',
                'category' => 'Trading Market',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Gulnaz Dagli',
                'date' => '2023-05-29',
            ],
            [
                'title' => 'Fundamental Analysis',
                'category' => 'Investment',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Avni Evran',
                'date' => '2023-04-29',
            ],
          
          
        ];

        foreach ($posts as $post) {
            $blog = new Blog();
            $blog->setTitle($post['title']);
            $blog->setCategory($post['category']);
            $blog->setAuthorName($post['author']);
            $blog->setImage($post['image']);
            $blog->setContent('content'); 
            $blog->setCreatedAt(new \DateTime($post['date']));

            $manager->persist($blog);
        }


        $manager->flush();
    }
}
