<?php
//Admin acces
function administration(){
    require('view/backend/adminManager.php');
}
//Users Functions
function createUser(){
    require('view/backend/addUser.php');
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
//Posts admin
function formAddPost(){
    require('view/backend/addPost.php');
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

function updatePost(){
    $billet = new Post;
    $billet->setId($_POST['id']);
    $billet->setTitre($_POST['titre_chapitre']);
    $billet->setContenu($_POST['contenu']);
    $billet->setDateAjout($_POST['dateAjout']);
    $billet->setAuteur($_POST['auteur']);

    $manager = new PostManager();
    $manager->update($billet);

    echo('<center>Les données ont été modifiées, vous allez êtes redirigé vers la page d\'administration</center>');

    header("Refresh: 3; URL=index.php?action=administration" );
}
//Comments admin
function adminComment(){
    require('view/backend/adminComment.php');
}

function validComment(){
    $id = $_GET['id'];
    //Passer le statut du commentaire à 1
    $manager = new CmtManager($bdd);
    $manager->valid($id);
    echo '<br /><center>Le commentaire a bien été ajouté </center>';
    header("Refresh: 2; URL=index.php?action=adminComment");
}

function deleteComment(){
    $id = $_GET['id'];
    $manager = new CmtManager($bdd);
    $manager->delete($id);
    echo '<br /><center>Le commentaire a bien été supprimé </center>';
    header("Refresh: 2; URL=index.php?action=adminComment");
}
//Reports admin
function viewReport(){
    require('view/backend/viewReport.php');
}

function cancelReport(){
    $id = $_GET['id'];
    //Passer le statut du commentaire à 1
    $manager = new CmtManager($bdd);
    $manager->cancelReport($id);
    echo '<br /><center>Le signalement a bien été supprimé </center>';
    header("Refresh: 2; URL=index.php?action=viewReport");
}



