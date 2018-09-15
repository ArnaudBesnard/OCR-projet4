<?php
session_start ();
// On récupère nos variables de session

$title = "Jean Forteroche - Un billet simple pour l'Alaska";
ob_start();
    //Autoload de chargement des classes
    spl_autoload_register(function($classe){
    include '../model/' .$classe. '.class.php';
});

$db= new Database;
$bdd = $db->getConnection();

$billet = new Post;
$billet->setId($_POST['id']);
$billet->setTitre($_POST['titre_chapitre']);
$billet->setContenu($_POST['contenu']);
$billet->setDateAjout($_POST['dateAjout']);
$billet->setAuteur($_POST['auteur']);

$manager = new PostManager($bdd);
$manager->update($billet);

    echo('Les données ont été modifiées, vous allez êtes redirigé vers la page d\'administration');

    header("Refresh: 3; URL=admin.php" );

$content = ob_get_clean();
require('template.php');
