<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_default")
     */
    public function index(): Response
    {
      $response =  new Response("Bonjour les codeurs SYMFONY");

    //   dump($response);

    //   return $response;
      // return $this->render('default/index.html.twig', 
      // ['controller_name' => 'Amadou']);

      return $this->render('default/vue.html.twig', [
    
      ]);
    } 


    /**
     * @Route("/aicles", name="list")
     */
    public function listArticle(): Response
    {
        return new Response("test de la route liste");
    }


    /**
     * @Route("/arles/{id}", name="list_one", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function article($id): Response
    {
        $articles = [
           [
             'nom' => 'article 1',
             'prix' => '35000'
           ],
           [
             'nom' => 'article 2',
             'prix' => '45000'
           ]
        ];
        return $this->render('default/vue.html.twig', [
          'id' => $id,
          'articles' => $articles
      ]);
    }
}
