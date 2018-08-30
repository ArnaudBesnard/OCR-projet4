<?php

$billet = new Article();
$billet->setTitre($_POST['titre_chapitre']);
$billet->setContenu($_POST['contenu']);
$billet->setDateAjout($_POST['dateAjout']);
$billet->setAuteur($_POST['auteur']);

$manager = new ArticleManager($bdd);
$manager->add($billet);
//Copier ce code pour l'edition d'article