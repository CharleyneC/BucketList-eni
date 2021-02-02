<?php
namespace App\Controller;
use App\Entity\Wishes;
use App\Form\WishType;
use App\Repository\WishesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WishController extends AbstractController{
    /**
     * @Route("/wishes/liste", name = "liste")
     */
    public function liste(WishesRepository $wishesRepository) : Response
    {
        $wish = $wishesRepository->findBy(["estVisible" => true],
                                            ["dateCrea" => "DESC"], 100, 0);

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
        $wish->setTitre();
        $wish->setDescription();
        $wish->setAuteur();
        $wish->setEstVisible();
        $wish->setDateCrea(new \DateTime());

        $entityManager->persist($wish);
        $entityManager->flush();

        return new Response('Cest good!');
    }

    /**
     * @Route ("/wishes/ajout", name="ajouter")
     */
    public function ajouterWish(Request $request, EntityManagerInterface $entityManager): Response {

        $wish = new Wishes();

        $form = $this->createForm(WishType::class, $wish);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $wish->setDateCrea(new \DateTime());

            $entityManager->persist($wish);
            $entityManager->flush();

            $this->addFlash('succes', 'Excellent! Ton souhait à bien était créé! Plus qua le réaliser!');

            return $this->redirectToRoute('detail', ['id' => $wish->getId()]);

        }elseif($form->isEmpty()){
            $this->addFlash('error', 'Ya un truc qui ne va pas, le souhait ne peut pas être sauvegarder!');
        }
        return $this->render('wishes/ajout.html.twig', [
            "wish_form" => $form->createView()
        ]);
    }

}
