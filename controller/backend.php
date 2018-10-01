<?php

function administration(){
    require('view/backend/adminManager.php');
}

function createUser(){
    require('view/backend/formAddUser.php');
}

function addUser(){
    $addUser = new User;
    $addUser->setLogin($_POST['login']);
    $addUser->setLastname($_POST['lastname']);
    $addUser->setFirstname($_POST['firstname']);
    $addUser->setEmail($_POST['email']);
    $addUser->setPassword($_POST['password']);
    $addUser->setCreateDate($_POST['createDate']);
    $addUser->setRole($_POST['role']);

    $manager = new UserManager();
    $manager->add($addUser);

    echo('<center>L\'utilisateur a été ajouté</center>');
    header("Refresh: 2; URL=index.php" );
}

function formAddPost(){
    require('view/backend/formAddPost.php');
}

function addPost(){
    $dateAjout = date("Y-m-d");
    $billet = new Post;
    $billet->setTitre($_POST['titre_chapitre']);
    $billet->setContenu($_POST['contenu']);
    $billet->setDateAjout($dateAjout);
    $billet->setAuteur($_POST['auteur']);

    $manager = new PostManager($bdd);
    $manager->add($billet);

    echo '<center>Les données ont été ajoutées, vous allez êtes redirigé vers la page d\'administration</center>';
    header("Refresh: 3; URL=index.php?action=administration" );
}

function deletePost(){
    $billetId = $_GET['id'];
    $manager = new PostManager();
    $manager->delete($billetId);
    echo("<center>Le billet avec l'id n°" . $billetId . " a bien été supprimé, vous allez êtes redirigé vers la page d'administration</center>");
    header("Refresh: 3; URL=index.php?action=administration");
}

function editPost(){
    require('view/backend/editPost.php');
}
