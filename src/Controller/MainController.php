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
         * @Route("/main/accueil", name = "accueil")
         */
        public function Accueil(){
            return $this->render('main/accueil.html.twig');
        }
    }
