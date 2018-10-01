<?php
//session_start ();
// On récupère nos variables de session

$title = "Jean Forteroche - Un billet simple pour l'Alaska";
ob_start();

$billet = new Post;
$billet->setId($_POST['id']);
$billet->setTitre($_POST['titre_chapitre']);
$billet->setContenu($_POST['contenu']);
$billet->setDateAjout($_POST['dateAjout']);
$billet->setAuteur($_POST['auteur']);

$manager = new PostManager();
$manager->update($billet);

    echo('<center>Les données ont été modifiées, vous allez êtes redirigé vers la page d\'administration</center>');

    header("Refresh: 3; URL=index.php?page=administration" );

$content = ob_get_clean();
require('template.php');
