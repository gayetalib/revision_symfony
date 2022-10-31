<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <=10 ; $i++) { 
            $article = new Article();
            $article->setTitre("Titre de l'article ".$i);
            $article->setContenu("Contenu de l'article");

            $date = new \DateTime();
            $date->modify('-'.$i.'days');
            $article->setDateCreation($date);
           
            $manager->persist($article);
        }
        
         $manager->flush();
    }
}
