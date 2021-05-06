<?php
// src/Controller/ProductController.php
namespace App\Controller;

// ...
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personne", name="creer_personne")
     */
    public function creerPersonne(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setNom('Durand');
        $product->setPrenom('Pierre');
        $product->setDate('15');

        $entityManager->persist($product);

        $entityManager->flush();

        return new Response('Nouvelle personne enregistrée avec l\'id '.$product->getId());
    }
}