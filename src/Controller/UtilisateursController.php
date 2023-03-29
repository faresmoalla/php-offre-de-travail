<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateursController extends AbstractController
{
    #[Route('/utilisateurs', name: 'app_utilisateurs')]
    public function index(): Response
    {
        return $this->render('utilisateurs/index.html.twig', [
            'controller_name' => 'UtilisateursController',
        ]);
    }
    #[Route('/isitapp', name: 'accueil')]
    public function indexAccueil(): Response
    {
        return $this->render(
            'accueil/accueil.html.twig'
        );
    }

    #[Route('/accueilclient', name: 'accueilclient')]
    public function accueilclient(): Response
    {
        return $this->render(
            'accueil/accueilclient.html.twig'
        );
    }

    #[Route('/accueilfreelancer', name: 'accueilfreelancer')]
    public function accueilfreelancer(): Response
    {
        return $this->render(
            'accueil/accueilfreelancer.html.twig'
        );
    }

    #[Route('/signin', name: 'signin')]
    public function signin(): Response
    {
        return $this->render(
            'utilisateurs/signin.html.twig'
        );
    }
    #[Route('/backfreelancer', name: 'backfreelancer')]
    public function backfreelancer(): Response
    {
        return $this->render(
            'back/freelancer.html.twig'
        );
    }
    #[Route('/backrepresentant', name: 'backrepresentant')]
    public function backrepresentant(): Response
    {
        return $this->render(
            'back/representant.html.twig'
        );
    }
    #[Route('/admin', name: 'admin')]
    public function admin(): Response
    {
        return $this->render(
            'back/admin.html.twig'
        );
    }

    #[Route('/frontTest', name: 'frontTest')]
    public function test(): Response
    {
        return $this->render(
            'accueil/frontTest.html.twig'
        );
    }
}
