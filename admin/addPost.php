<?php

//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include '../class/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();

$billet = new Post;
$billet->setTitre($_POST['titre_chapitre']);
$billet->setContenu($_POST['contenu']);
$billet->setDateAjout($_POST['dateAjout']);
$billet->setAuteur($_POST['auteur']);

$manager = new PostManager($bdd);
$manager->add($billet);


echo 'Les données ont été ajoutées, vous allez êtes redirigé vers la page d\'administration';

header("Refresh: 3; URL=admin.php" );
