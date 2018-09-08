<?php

//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include '../class/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();

$addUser = new User;
$addUser->setNickname($_POST['nickname']);
$addUser->setLastname($_POST['lastname']);
$addUser->setFirstname($_POST['firstname']);
$addUser->setEmail($_POST['email']);
$addUser->setPassword($_POST['password']);
$addUser->setCreateDate($_POST['createDate']);
$addUser->setRole($_POST['role']);

$manager = new UserManager($bdd);
$manager->add($addUser);
//Copier ce code pour l'edition d'article
echo('L\/utilisateur a été ajoutées, vous allez êtes redirigé vers la page d\'administration');

header("Refresh: 3; URL=admin.php" );