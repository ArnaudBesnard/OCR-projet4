<?php

$title = "Connexion validée, bienvenue";
ob_start();

$login = $_POST['user'];
$email = $_POST['email'];
$from = 'administrateur@jeanforteroche.fr';
$subject = 'Réinitialisation du mot de passe';
$headers = 'test de mail';


$manager = new userManager($bdd);
$pwd =  $manager->resetPwd($login, $email);
echo ($pwd);
//mail($email,$subject,$pwd,$headers);
//echo ('Email envoyé');



$content = ob_get_clean();
require('template.php');
?>