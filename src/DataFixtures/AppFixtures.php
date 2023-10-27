<?php

namespace App\DataFixtures;
use App\Entity\Detail;
use App\Entity\Commande;
use App\Entity\Categorie;
use App\Entity\Plat;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture

{
    public function load(ObjectManager $manager): void
    {include 'district.php';
        $categorieRepo = $manager->getRepository(Categorie::class);

        foreach ($categorie as $categorieData){
            $categorieDB = new Categorie();
            $categorieDB
            ->setId($categorieData['id'])
            ->setLibelle($categorieData['libelle'])
            ->setImage($categorieData['image'])
            ->setActive($categorieData['active']);
// dd($categorieDB);

            $manager->persist($categorieDB);

           
            $metadata = $manager->getClassMetaData(Categorie::class);
            $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        }

        $manager->flush();
        foreach ($plat as $platData) {
            $platDB = new plat();
            $platDB
            ->setLibelle($platData['libelle'])
            ->setDescription($platData['description'])
            ->setPrix($platData['prix'])
            ->setImage($platData['image'])
            ->setActive($platData['active']);

            
            $categorie = $categorieRepo->find($platData['id_categorie']);
            $platDB->setCategorie($categorie);

            $manager->persist($platDB);
        }
        $manager->flush();
 
        $commandeRepo = $manager->getRepository(Commande::class);

        foreach ($commande as $commandeData) {
            $commandeDB = new Commande();
            $dateCommande = new \DateTime($commandeData['date_commande']);
            $commandeDB
                ->setId($commandeData['id'])
                
                ->setDateCommande($dateCommande)
                ->setTotal($commandeData['total'])
                ->setEtat((int)$commandeData['etat']);

            $manager->persist($commandeDB);

             // empêcher l'auto incrément
             $metadata = $manager->getClassMetaData(Commande::class);
             $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
         }
         $manager->flush();
 
         $platRepo = $manager->getRepository(Plat::class);
 
         
         $detail = [];
         foreach ($detail as $detailData) {
             $detailDB = new detail();
             $detailDB
                 ->setQuantite($detailData['quantite']);
             $commande = $commandeRepo->find($detailData['commande_id']);
             $detailDB->setCommande($commande);
             $plat = $platRepo->find($detailData['plat_id']);
             $detailDB->setPlat($plat);
 
             $manager->persist($detailDB);
         }
 
 
         $manager->flush();
     }
 }