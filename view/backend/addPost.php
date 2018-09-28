<?php

$title = "Jean Forteroche - Ajout d'un chapitre";
ob_start();
$dateAjout = date("Y-m-d");
$billet = new Post;
$billet->setTitre($_POST['titre_chapitre']);
$billet->setContenu($_POST['contenu']);
$billet->setDateAjout($dateAjout);
$billet->setAuteur($_POST['auteur']);

$manager = new PostManager($bdd);
$manager->add($billet);

echo '<center>Les données ont été ajoutées, vous allez êtes redirigé vers la page d\'administration</center>';
header("Refresh: 3; URL=index.php?page=administration" );
$content = ob_get_clean();
require('template.php');

