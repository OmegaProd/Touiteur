<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Touite;
use App\Repository\TouiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TouitesController extends AbstractController
{
    /**
     * @Route("/touites", name="touites")
     **/
    public function index(TouiteRepository $repo)
    {
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
     * @Route("/touites/new", name="touites_create")
     */
    public function create(Request $request, ManagerRegistry $manager)
    {
        $touite = new Touite();

        $form = $this->createFormBuilder($touite)
            ->add('content')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $touite->setCreatedAt(new \DateTime());

            $manager->getManager()->persist($touite);
            $manager->getManager()->flush();

            return $this->redirectToRoute('touites_show', [
                'id' => $touite->getId()
            ]);
        }
    }


    /**
     * @Route("/touites/{id}", name="touites_show")
     */
    public function show(Touite $touite)
    {
        return $this->render('touites/show.html.twig', [
            'touite' => $touite
        ]);
    }
}
