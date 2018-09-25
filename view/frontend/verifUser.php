<?php
$title = "Connexion validée, bienvenue";
ob_start();

$login = $_POST['login'];
$password = $_POST['password'];

if (!empty($login) && !empty($password)) {
    $manager = new userManager($bdd);
    $datas = $manager->checkUser($login, $password);
    //session_start();
    $_SESSION['id'] = $datas['id'];
    $_SESSION['login'] = $datas['login'];
    $_SESSION['role'] = $datas['role'];
    echo '<br /><center>Bienvenue ' . $_SESSION['login'] . '</center>';
    }
    else {
        echo ('<center>Veuillez renseignez tous les champs du formulaire !</center>');
    }
header("Refresh: 3; URL=index.php");
$content = ob_get_clean();
require('template.php');
?>