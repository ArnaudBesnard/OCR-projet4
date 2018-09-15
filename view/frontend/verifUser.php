<?php
$title = "Connexion validée, bienvenue";
ob_start();

//Autoload de chargement des classes
spl_autoload_register(function ($classe) {
    include 'model/' . $classe . '.class.php';
});
$db = new Database;
$bdd = $db->getConnection();

$login = $_POST['login'];
$password = $_POST['password'];

if (!empty($login) && !empty($password)) {
    $req = $bdd->prepare('SELECT id, login, role FROM users WHERE login = :login AND password = :password');
    $req->execute(array('login' => $login, 'password' => $password));
    $resultat = $req->fetch();
    if (!$resultat) {
        echo 'Vos identifiants sont incorrects, veuillez ressayer !';
    } else {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['login'] = $resultat['login'];
        $_SESSION['role'] = $resultat['role'];
        echo '<br /><center>Bienvenue ' . $_SESSION['login'] . '</center>';
        header("Refresh: 3; URL=index.php");
    }
} else {
    echo 'Veuillez remplir tous les champs !';
}

$content = ob_get_clean();
require('template.php');
?>