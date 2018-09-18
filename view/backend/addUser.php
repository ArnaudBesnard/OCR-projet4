<?php
session_start ();

$title = "Jean Forteroche - Ajout d'un utlisateur";
ob_start();

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

echo('<center>L\'utilisateur a été ajouté, vous allez êtes redirigé vers la page d\'administration</center>');

$content = ob_get_clean();
require('template.php');

header("Refresh: 3; URL=index.php?page=administration" );