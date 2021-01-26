<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WishController extends AbstractController{
    /**
     * @Route("/wishes/liste", name = "liste")
     */
    public function liste()
    {
        return $this->render('wishes/liste.html.twig');
    }

    /**
     * @Route("/wishes/detail/{id}", name = "detail")
     */
    public function detail($id = 1) : Response{
        return $this->render('wishes/detail.html.twig');
    }
}
