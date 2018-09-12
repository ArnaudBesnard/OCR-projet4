<?php
//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include 'class/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();

$login = $_POST['login'];
$password = $_POST['password'];

if (!empty($login) && !empty($password)) {
    $req = $bdd->prepare('SELECT id FROM users WHERE login = :login AND password = :password');
    $req->execute(array('login' => $login,'password' => $password));
    $resultat = $req->fetch();
    if (!$resultat) {
        echo 'Vos identifiants sont incorrects !';
    }
    else {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['login'] = $login;
        echo 'OK';
        header("Refresh: 3; URL=index.php" );
    }
} else {
    echo 'Veuillez remplir tous les champs !';
}
?>