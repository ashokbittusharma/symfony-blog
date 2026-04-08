<?php
// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // --- Create Categories ---
        $tech = new Category();
        $tech->setName('Technology');
        $manager->persist($tech);

        $life = new Category();
        $life->setName('Lifestyle');
        $manager->persist($life);

        $travel = new Category();
        $travel->setName('Travel');
        $manager->persist($travel);

        // --- Create Tags ---
        $phpTag = new Tags();
        $phpTag->setName('PHP');
        $manager->persist($phpTag);

        $symfonyTag = new Tags();
        $symfonyTag->setName('Symfony');
        $manager->persist($symfonyTag);

        $doctrineTag = new Tags();
        $doctrineTag->setName('Doctrine');
        $manager->persist($doctrineTag);

        $lifestyleTag = new Tags();
        $lifestyleTag->setName('Health');
        $manager->persist($lifestyleTag);

        // --- Create Posts ---
        $post1 = new Post();
        $post1->setTitle('Getting Started with Symfony 8');
        $post1->setContent('This is a blog post about Symfony 8...');
        $post1->setIsFeatured(true);
        $post1->setCategory($tech); // ✅ single Category
        $post1->addTag($phpTag);
        $post1->addTag($symfonyTag);
        $post1->addTag($doctrineTag);
        $post1->setCreatedAt(new \DateTime('2026-04-08 10:00:00'));
        $manager->persist($post1);

        $post2 = new Post();
        $post2->setTitle('Healthy Lifestyle Tips');
        $post2->setContent('Some tips for a healthy lifestyle...');
        $post2->setIsFeatured(false);
        $post2->setCategory($life);
        $post2->addTag($lifestyleTag);
        $post2->setCreatedAt(new \DateTime('2026-04-07 09:00:00'));
        $manager->persist($post2);

        $post3 = new Post();
        $post3->setTitle('Top 10 Travel Destinations');
        $post3->setContent('Explore the most amazing places to travel...');
        $post3->setIsFeatured(true);
        $post3->setCategory($travel);
        $post3->setCreatedAt(new \DateTime('2026-04-06 08:30:00'));
        $manager->persist($post3);

        // --- Save everything ---
        $manager->flush();
    }
}