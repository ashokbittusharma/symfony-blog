<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface; // <-- added
use App\Entity\Post;                     // <-- added

final class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $posts = $em->getRepository(Post::class)->findBy([], ['id' => 'DESC']);
        return $this->render('blog/index.html.twig', ['posts' => $posts]);
    }

    #[Route('/blog/{id}', name: 'blog_show')]
    public function show(Post $post): Response
    {
        return $this->render('blog/show.html.twig', ['post' => $post]);
    }
}