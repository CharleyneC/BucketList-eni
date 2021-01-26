<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WishController extends AbstractController{
    /**
     * @Route("/main/liste", name = "liste")
     */
    public function liste()
    {
        return $this->render('main/liste.html.twig');
    }

    /**
     * @Route("/main/detail/{id}", name = "detail")
     */
    public function detail($id =1){
        return $this->render('main/detail.html.twig', [$id]);
    }
}
