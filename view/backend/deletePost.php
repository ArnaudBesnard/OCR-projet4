<?php

session_start();
// On récupère nos variables de session

$title = "Jean Forteroche - Administration";
ob_start();

//Autoload de chargement des classes
spl_autoload_register(function ($classe) {
    include '../model/' . $classe . '.class.php';
});
$db = new Database;
$bdd = $db->getConnection();

$billetId = $_GET['id'];
$manager = new PostManager($bdd);
$manager->delete($billetId);
echo("Le billet avec l'id n°" . $billetId . " a bien été supprimé, vous allez êtes redirigé vers la page d'administration");

$content = ob_get_clean();
require('template.php');

header("Refresh: 3; URL=index.php?page=administration");