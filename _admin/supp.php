<?php
//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include '../class/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();

$billetId = $_GET['id'];

$sql = $bdd->exec('DELETE from billet WHERE id = ' . $billetId);

echo("Le billet avec l'id n°" .$billetId. " a bien été supprimé, vous allez êtes redirigé vers la page d'administration");

header("Refresh: 3; URL=admin.php" );