<?php

namespace App\DataFixtures;
use App\Entity\Detail;
use App\Entity\Commande;
use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;

class AppFixtures extends Fixture

{
    public function load(ObjectManager $manager): void
    {
        include 'district.php';

        //cree l'utilisateur avant la commande 
        $utilisateurRepo = $manager->getRepository(Utilisateur::class);

        foreach($utilisateur as $utilisateurData){
        
            $utilisateurDB = new Utilisateur();
            $utilisateurDB
            ->setId($utilisateurData['id'])
            ->setEmail($utilisateurData['email']) 
            ->setPassword($utilisateurData['password'])
            ->setRoles([$utilisateurData['roles']])
        
            ->setNom($utilisateurData['nom'])
            ->setPrenom($utilisateurData['prenom'])
            ->setTelephone($utilisateurData['telephone'])
            ->setAdresse($utilisateurData['adresse'])
            ->setCodePostal($utilisateurData['code_postal'])
            ->setVille($utilisateurData['ville'])
            ;
            // dd($utilisateurDB);
            $manager->persist($utilisateurDB);

            $metadata = $manager->getClassMetaData(Utilisateur::class);
            $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        }

        $manager->flush();



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

        $commandeRepo = $manager->getRepository(Commande::class);
// $utilisateur = (['']);
        foreach ($commande as $commandeData) {
            $commandeDB = new Commande();
            $dateCommande = new \DateTime($commandeData['date_commande']);

            // $utilisateurId = isset($commandeData['utilisateur_id']) ? $commandeData['utilisateur_id'] : null;
            // $utilisateur = $utilisateurId ? $utilisateurRepo->find($utilisateurId) : null;

            // $utilisateur = new Utilisateur($utilisateur['utilisateur_id']);
            $utilisateur = $utilisateurRepo -> find($commandeData['utilisateur_id']);
            // $utilisateurData = new Utilisateur($commandeData['utilisateur_id']);
            $commandeDB
                ->setId($commandeData['id'])
            
                ->setDateCommande($dateCommande)
                ->setUtilisateur($utilisateur)
                // ['utilisateur_id'])
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