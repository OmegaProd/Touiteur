<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TouitesController extends AbstractController
{
    /**
    * @Route("/touites", name="touites")
    **/
    public function index() {
        return $this->render('touites/index.html.twig', [
            'controller_name' => 'TouitesController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render('touites/home.html.twig',[
            'title' => "Touiteur",
            'age' => 17
        ]);
    }
}