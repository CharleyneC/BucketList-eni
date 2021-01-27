<?php
namespace App\Controller;
use App\Entity\Wishes;
use App\Repository\WishesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WishController extends AbstractController{
    /**
     * @Route("/wishes/liste", name = "liste")
     */
    public function liste(WishesRepository $wishesRepository) : Response
    {
        $wish = $wishesRepository->findBy(["estVisible" => true], ["dateCrea" => "DESC"], 100, 0);

        return $this->render('wishes/liste.html.twig',[
                                'wish' => $wish
        ]);

    }

    /**
     * @Route("/wishes/detail/{id}", name = "detail", requirements={"id": "\d+"})
     */
    public function detail(int $id, WishesRepository $wishesRepository) : Response{
        $idWish = $wishesRepository->find($id);

        return $this->render('wishes/detail.html.twig', [
                                'idWish' => $idWish,
        ]);

    }

    /**
     * @Route("/wishes/add", name="wish_add_test")
     */
    public function addTest(EntityManagerInterface $entityManager){
        $wish = new Wishes();

        $wish->getId();
        $wish->setTitre('Tout terminer');
        $wish->setDescription('Terminer absolument tout les petits travaux que jai commencé');
        $wish->setAuteur('moi');
        $wish->setEstVisible(true);
        $wish->setDateCrea(new \DateTime());

        $entityManager->persist($wish);
        $entityManager->flush();

        return new Response('Cest good!');
    }

}
