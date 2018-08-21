<?php
    require('../_connect/connect.php');
    $id = $_POST['id'];
    $req = $bdd->prepare("UPDATE billet SET titre = :titre, contenu = :contenu, date = :date, auteur = :auteur WHERE id = $id");
    $req->execute(array(
	   'titre' => $_POST['titre_chapitre'],
	   'contenu' => $_POST['contenu'],
	   'date' => $_POST['date'],
       'auteur' => $_POST['auteur']
       
	));

    echo('Les données ont été modifiées, vous allez êtes redirigé vers la page d\'administration');

    header("Refresh: 3; URL=admin.php" );
