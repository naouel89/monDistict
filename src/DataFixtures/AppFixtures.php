<?php

namespace App\DataFixtures;
use App\Entity\Detail;
use App\Entity\Commande;
use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\Utilisateur;

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

            // dd($platDB);

            $manager->persist($platDB);
        }
        $manager->flush();
 //cree l'utilisateur avant la commande 
 $utilisateurRepo = $manager->getRepository(Utilisateur::class);
foreach($utiliateur as 	$utilisateurData){
    $utilisateurDB = new utilisateur();
    $utilisateurDB
    ->setId($utilisateurData['id'])
    ->setEmail($utilisateurData['email'])
    ->setRoles($utilisateurData['ROLE_USER'])
    ->setPassword($utilisateurData['password'])
    ->setNom($utilisateurData['nom'])
    ->setPrenom($utilisateurData['prenom'])
    ->setTelephone($utilisateurData['telephone'])
    ->setAdresse($utilisateurData['adresse'])
    ->setCodePostal($utilisateurData['code_postal'])
    ->setVille($utilisateurData['ville'])
    ;
}
$metadata = $manager->getClassMetaData(Utilisateur::class);
$metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);

        $commandeRepo = $manager->getRepository(Commande::class);

        foreach ($commande as $commandeData) {
            $commandeDB = new Commande();
            $dateCommande = new \DateTime($commandeData['date_commande']);
            $commandeDB
                ->setId($commandeData['id'])
                
                ->setDateCommande($dateCommande)
                ->setTotal($commandeData['total'])
                ->setEtat((int)$commandeData['etat']);
// dd($commandeDB);


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
             $detailDB->setId($detailData['id']);

             $plat = $platRepo->find($detailData['plat_id']);
             $detailDB->setPlat($plat);
            //  dd($detailDB);
 
             $manager->persist($detailDB);
         }
 
 
         $manager->flush();
     }
 }