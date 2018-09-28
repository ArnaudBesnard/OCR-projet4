<?php
//session_start();

$title = "Jean Forteroche - Administration";
ob_start();

$billetId = $_GET['id'];
$manager = new PostManager($bdd);
$manager->delete($billetId);
echo("<center>Le billet avec l'id n°" . $billetId . " a bien été supprimé, vous allez êtes redirigé vers la page d'administration</center>");
header("Refresh: 3; URL=index.php?page=administration");
$content = ob_get_clean();
require('template.php');

