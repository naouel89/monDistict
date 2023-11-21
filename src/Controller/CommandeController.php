<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Commande;

class CommandeController extends AbstractController
{
    #[Route('/nouvelle-commande', name: 'nouvelle_commande')]
    public function nouvelleCommande(Request $request, PlatRepository $platsRepository, EntityManagerInterface $entityManager): Response
    {
        // Tu dois récupérer les éléments du panier ici
        $panier = []; 

        $dateCommande = new \DateTime();

        // Initialise le montant total du panier
        $montantTotalPanier = 0;

        // Parcourt chaque élément du panier
        foreach ($panier as $element) {
            // Récupère le plat associé à l'élément du panier depuis le repository
            $plat = $platsRepository->find($element['plat_id']);

            // Ajoute le montant du plat multiplié par la quantité à total du panier
            $montantTotalPanier += $plat->getPrix() * $element['quantity'];
        }

        // Crée une nouvelle instance de la classe Commande
        $nouvelleCommande = new Commande();

        // Configure les propriétés de la commande
        $nouvelleCommande->setDateCommande($dateCommande);
        $nouvelleCommande->setTotal($montantTotalPanier);
        $nouvelleCommande->setEtat('0');

        $utilisateur = $this->getUser();
        if ($utilisateur) {
            $nouvelleCommande->setUtilisateur($utilisateur);
        }

        // Persiste la nouvelle commande dans la base de données
        $entityManager->persist($nouvelleCommande);
        $entityManager->flush();

        // Redirige vers la page de succès
        return $this->redirectToRoute('app-accueil');
    }
}