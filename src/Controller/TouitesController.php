<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Touite;

class TouitesController extends AbstractController
{
    /**
     * @Route("/touites", name="touites")
     **/
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Touite::class);

        $touites = $repo->findAll();

        return $this->render('touites/index.html.twig', [
            'controller_name' => 'TouitesController',
            'touites' => $touites
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('touites/home.html.twig', [
            'title' => "Touiteur",
            'age' => 17
        ]);
    }

    /**
     * @Route("/touites/12", name="touites_show")
     */
    public function show()
    {
        return $this->render('touites/show.html.twig');
    }
}
