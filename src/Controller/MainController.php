<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class MainController extends AbstractController
    {
        /**
         * @Route("/", name = "home")
         */
        public function home()
        {
            return $this->render('main/home.html.twig');
        }

        /**
         * @Route("/main/accueil", name = "aboutUs")
         */
        public function Accueil(){
            return $this->render('main/aboutUs.html.twig');
        }
    }
