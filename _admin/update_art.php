<?php
    
    //Autoload de chargement des classes
    spl_autoload_register(function($classe){
    include '../class/' .$classe. '.class.php';
});

    $db= new Database();
    $bdd = $db->getConnection();

    $id = $_POST['id'];
    $req = $bdd->prepare("UPDATE billet SET titre = :titre, contenu = :contenu, dateAjout = :dateAjout, auteur = :auteur WHERE id = $id");
    $req->execute(array(
	   'titre' => $_POST['titre_chapitre'],
	   'contenu' => $_POST['contenu'],
	   'dateAjout' => $_POST['dateAjout'],
       'auteur' => $_POST['auteur']
       
	));

    echo('Les données ont été modifiées, vous allez êtes redirigé vers la page d\'administration');

    header("Refresh: 3; URL=admin.php" );
