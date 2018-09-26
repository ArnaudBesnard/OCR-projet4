<?php
$login = $_POST['login'];
$pwd = $_POST['newPwd'];
$pwd2 = $_POST['newPwd2'];

if ($pwd === $pwd2) {
    $manager = new userManager($bdd);
    $manager->newPwd($login, $pwd);
}
else {
    echo ('<center>Veuillez saisir des mots de passes identiques</center>');
}
header("Refresh: 3; URL=index.php?page=connection" );