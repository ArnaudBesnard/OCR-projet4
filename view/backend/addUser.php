<?php
session_start ();
// On récupère nos variables de session

$title = "Jean Forteroche - Ajout d'un utlisateur";
ob_start();

//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include '../model/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();

$addUser = new User;
$addUser->setLogin($_POST['login']);
$addUser->setLastname($_POST['lastname']);
$addUser->setFirstname($_POST['firstname']);
$addUser->setEmail($_POST['email']);
$addUser->setPassword($_POST['password']);
$addUser->setCreateDate($_POST['createDate']);
$addUser->setRole($_POST['role']);

$manager = new UserManager($bdd);
$manager->add($addUser);
//Copier ce code pour l'edition d'article
echo('L\'utilisateur a été ajouté, vous allez êtes redirigé vers la page d\'administration');

$content = ob_get_clean();
require('template.php');

header("Refresh: 3; URL=index.php?page=administration" );