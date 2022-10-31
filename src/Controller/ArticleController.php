<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles/ajouter", name="ajout_article")
     */
    public function ajouter(EntityManagerInterface $manager)
    {
        $article = new Article();
        // dump($article); die;
        $article->setTitre("titre de l'article");
        $article->setContenu("Contenu de l'article");
        $article->setDateCreation(new \DateTime());
        
        $manager->persist($article);
        $manager->flush();

        // die;
    }

    /**
     * @Route("/articles/{id}", name="find_article")
     */
    public function findByOne(ArticleRepository $articleRepository, $id)
    {
        $article = $articleRepository->find($id);
        dump($article);
        
        return $this->render('article/index.html.twig',[
            'article' => $article
        ]);
        // die;
    }
}
