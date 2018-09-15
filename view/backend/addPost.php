<?php
session_start ();
// On récupère nos variables de session

$title = "Jean Forteroche - Ajout d'un utlisateur";
ob_start();
//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include '../model/' .$classe. '.class.php';
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
$content = ob_get_clean();
require('template.php');
header("Refresh: 3; URL=index.php?page=administration" );
