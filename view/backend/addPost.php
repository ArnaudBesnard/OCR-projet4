<?php
//session_start ();

$title = "Jean Forteroche - Ajout d'un utlisateur";
ob_start();

$billet = new Post;
$billet->setTitre($_POST['titre_chapitre']);
$billet->setContenu($_POST['contenu']);
$billet->setDateAjout($_POST['dateAjout']);
$billet->setAuteur($_POST['auteur']);

$manager = new PostManager($bdd);
$manager->add($billet);

echo '<center>Les données ont été ajoutées, vous allez êtes redirigé vers la page d\'administration</center>';
$content = ob_get_clean();
require('template.php');
header("Refresh: 3; URL=index.php?page=administration" );
