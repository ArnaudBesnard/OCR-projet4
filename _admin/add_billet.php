<?php
spl_autoload_register(function($classe){
    include 'class/' .$classe. '.class.php';
});

$db= new Database();
$bdd = $db->getConnection();

$billet = new Article();
$billet->setTitre($_POST['titre_chapitre']);
$billet->setContenu($_POST['contenu']);
$billet->setDateAjout($_POST['dateAjout']);
$billet->setAuteur($_POST['auteur']);

$manager = new ArticleManager($bdd);
$manager->add($billet);
