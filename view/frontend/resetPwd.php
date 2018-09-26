<?php

$title = "Connexion validée, bienvenue";
ob_start();

$mail = $_POST['email'];
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
    $passage_ligne = "\r\n";
}
else
{
    $passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Bonjour, voici l'email de réinitialisation de votre mot de passe";
$message_html = "<html><head></head><body><b>Bonjour</b>, voici le lien pour réinitialiser votre mot de passe : <br /><a href=\"http://localhost/ocr-projet4/index.php?page=newPwd\">Cliquez ici</a></body></html>";
//==========

//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========

//=====Définition du sujet.
$sujet = "Réinitialisation de votre mot de passe";
//=========

//=====Création du header de l'e-mail.
$header = "From: \"Jean Forteroche\"JeanForteroche.fr".$passage_ligne;
$header.= "Reply-to: \"Jean Forteroche\" JeanForteroche.gmail.com".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========

//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========

$login = $_POST['user'];

$manager = new userManager($bdd);
$pwd =  $manager->resetPwd($login, $mail);
if ($pwd == true){
    mail($mail,$sujet,$message,$header);
    echo ('<center>Un email vous a été envoyé, vous pourrez réinitialiser votre mot de passe</center>');
    header("Refresh: 3; URL=index.php?page=connection");
}

$content = ob_get_clean();
require('template.php');
?>