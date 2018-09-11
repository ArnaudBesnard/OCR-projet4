<?php
//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include 'class/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();

$login_valide = "Admin";
$pwd_valide = "root";

if (isset($_POST['login']) && isset($_POST['password'])) {

    if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['password']) {

        session_start ();
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];

        header ('location: index.php');
    }
    else {
        echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
}
else {
    echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>