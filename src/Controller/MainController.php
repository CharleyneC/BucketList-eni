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
         * @Route("/main/aboutUs", name = "aboutUs")
         */
        public function accueil(){
            return $this->render('main/aboutUs.html.twig');
        }

        /**
         * @Route ("/main/legale-stuff", name="legal-stuff")
         */
        public function legalStuff(){
            return $this->render('main/legal-stuff.html.twig');
        }

        /**
         * @Route("/main/inscription", name="inscription")
         */
        public function inscription(){
            return $this->render('main/inscription.html.twig');
        }

        /**
         * @Route("/main/connexion", name="connexion")
         */
        public function connexion(){
            return $this->render('main/connexion.html.twig');
        }

    }
