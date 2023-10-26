<?php
//  * Database `district`
//  */

/* `district`.`categorie` */
$categorie = array(
  array('id' => '4','libelle' => 'Pizza','image' => 'pizza_cat.jpg','active' => 'Yes'),
  array('id' => '5','libelle' => 'Burger','image' => 'burger_cat.jpg','active' => 'Yes'),
  array('id' => '9','libelle' => 'Wraps','image' => 'wrap_cat.jpg','active' => 'Yes'),
  array('id' => '10','libelle' => 'Pasta','image' => 'pasta_cat.jpg','active' => 'Yes'),
  array('id' => '11','libelle' => 'Sandwich','image' => 'sandwich_cat.jpg','active' => 'Yes'),
  array('id' => '12','libelle' => 'Asian Food','image' => 'asian_food_cat.jpg','active' => 'No'),
  array('id' => '13','libelle' => 'Salade','image' => 'salade_cat.jpg','active' => 'Yes'),
  array('id' => '14','libelle' => 'Veggie','image' => 'veggie_cat.jpg','active' => 'Yes'),
  array('id' => '15','libelle' => 'Tacos','image' => 'tacos_cat.jpg','active' => 'Yes')
);
// $manager->persist($categorie);
/* `district`.`commande` */
$commande = array(
  array('id' => '7','id_plat' => '10','quantite' => '2','total' => '16.00','date_commande' => '2021-07-20 06:40:21','etat' => 'En cours de livraison','nom_client' => 'Claudia Hedley','telephone_client' => '7451114400','email_client' => 'hedley@gmail.com','adresse_client' => '1119 Kinney Street'),
  array('id' => '8','id_plat' => '14','quantite' => '1','total' => '14.00','date_commande' => '2021-07-20 06:40:57','etat' => 'En préparation','nom_client' => 'Vernon Vargas','telephone_client' => '7414744440','email_client' => 'venno@gmail.com','adresse_client' => '1234 Hazelwood Avenue'),
  array('id' => '9','id_plat' => '9','quantite' => '4','total' => '20.00','date_commande' => '2021-07-20 07:06:06','etat' => 'Annulée','nom_client' => 'Carlos Grayson','telephone_client' => '7401456980','email_client' => 'carlos@gmail.com','adresse_client' => '2969 Hartland Avenue')
);
// $manager->persist($commande);

/* `district`.`detail` */
$detail = array(
);

/* `district`.`messenger_messages` */
$messenger_messages = array(
);

/* `district`.`plat` */
$plat = array(
  array('id' => '4','libelle' => 'District Burger','description' => 'Burger composé d’un bun’s du boulanger, deux steaks de 80g (origine française), de deux tranches poitrine de porc fumée, de deux tranches cheddar affiné, salade et oignons confits. .','prix' => '8.00','image' => 'hamburger.jpg','id_categorie' => '5','active' => 'Yes'),
  array('id' => '5','libelle' => 'Pizza Bianca','description' => 'Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.','prix' => '16.94','image' => 'pizza-salmon.png','id_categorie' => '4','active' => 'Yes'),
  array('id' => '9','libelle' => 'Buffalo Chicken Wrap','description' => 'Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.','prix' => '5.00','image' => 'buffalo-chicken.webp','id_categorie' => '9','active' => 'Yes'),
  array('id' => '10','libelle' => 'Cheeseburger','description' => 'Burger composé d’un bun’s du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d’un steak d’origine Française, d’une tranche de cheddar affiné, et de notre sauce maison.','prix' => '8.00','image' => 'cheesburger.jpg','id_categorie' => '5','active' => 'Yes'),
  array('id' => '12','libelle' => 'Spaghetti aux légumes','description' => 'Un plat de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide','prix' => '10.00','image' => 'spaghetti-legumes.jpg','id_categorie' => '10','active' => 'Yes'),
  array('id' => '13','libelle' => 'Salade César','description' => 'Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l\'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.','prix' => '7.00','image' => 'cesar_salad.jpg','id_categorie' => '13','active' => 'Yes'),
  array('id' => '14','libelle' => 'Pizza Margherita','description' => 'Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...','prix' => '16.94','image' => 'pizza-margherita.jpg','id_categorie' => '4','active' => 'Yes'),
  array('id' => '15','libelle' => 'Courgettes farcies au quinoa et duxelles de champignons','description' => 'Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!','prix' => '8.00','image' => 'courgettes_farcies.jpg','id_categorie' => '14','active' => 'Yes'),
  array('id' => '16','libelle' => 'Lasagnes','description' => 'Découvrez notre recette des lasagnes, l\'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratinée à l\'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscade.

','prix' => '12.00','image' => 'lasagnes_viande.jpg
','id_categorie' => '10','active' => 'Yes'),
  array('id' => '17','libelle' => 'Tagliatelles au saumon','description' => 'Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui qui vous assure un véritable régal!  

','prix' => '12.00','image' => 'tagliatelles_saumon.webp
','id_categorie' => '10','active' => 'Yes'),
  array('id' => '19','libelle' => 'Giga Tacos','description' => 'Tacos garnie avec 5 doses de viandes au choix, frites, sauce fromagère maison et sauces au choix. Vous pouvez compléter votre composition avec nos irrésistibles suppléments !','prix' => '15.00','image' => 'tacos_cat.jpg','id_categorie' => '15','active' => 'Yes')
);
// $manager->persist($plat);

/* `district`.`utilisateur` */
$utilisateur = array(
);
