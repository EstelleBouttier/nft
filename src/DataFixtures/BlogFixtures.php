<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\HttpFoundation\File\File;

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
                'image' => '1.png'
            ],
            [
                'title' => 'Advantages Of Day Trading',
                'category' => 'Trading Market',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Yilmaz Orhan',
                'date' => '2023-05-29',
                'image' => '2.png'

            ],
            [
                'title' => 'Conditions To Claim Deduction',
                'category' => 'Investment',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Huseyin Akogul',
                'date' => '2023-04-29',
                'image' => '3.png'

            ],
            [
                'title' => 'Extra source of income',
                'category' => 'Forex Trading',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Gazali Oztepe',
                'date' => '2023-02-22',
                'image' => '4.png'

            ],
            [
                'title' => 'Control Trades and Portfolio',
                'category' => 'Investment',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Muazzez Yasar',
                'date' => '2023-04-19',
                'image' => '5.png'
            ],
            [
                'title' => 'The Pros and Cons of Trading',
                'category' => 'Trading Market',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Sevil Haslak',
                'date' => '2023-08-26',
                'image' => '6.png'
            ],
            [
                'title' => 'Diversified Trading Portfolio',
                'category' => 'Forex Trading',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Ayse Nuriye',
                'date' => '2023-05-28',
                'image' => '7.png'
            ],
            [
                'title' => 'Profits Trading Techniques',
                'category' => 'Trading Market',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Gulnaz Dagli',
                'date' => '2023-05-29',
                'image' => '8.png'
            ],
            [
                'title' => 'Fundamental Analysis',
                'category' => 'Investment',
                'content' => 'Lorem ipsum dolor sit amet Iaculis suspendisse semper m dolor amet Iaculis lectus ipsum dolor sit amet Iaculis',
                'author' => 'Avni Evran',
                'date' => '2023-04-29',
                'image' => '9.png'
            ],
        ];

        foreach ($posts as $post) {
            $blog = new Blog();
            $blog->setTitle($post['title']);
            $blog->setCategory($post['category']);
            $blog->setContent($post['content']);
            $blog->setCreatedAt(new \DateTime($post['date']));

            $imagePath = __DIR__ . '/../../public/images/blog/' . $post['image'];
            if (file_exists($imagePath)) {
                $file = new File($imagePath);
                $blog->setImageFile($file);
                $blog->setImageName($post['image']);
                $blog->setImageSize(filesize($imagePath));
            }

            $manager->persist($blog);
        }

        $manager->flush();
    }
}
