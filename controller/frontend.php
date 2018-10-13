<?php

//Posts and Comments functions
function getDefault(){
    require('view/frontend/default.php');
}
function getList()
{
    $manager = new PostManager();
    $posts = $manager->getList();

    require('view/frontend/listPostView.php');
}

//Fonction pour couper les post dans listPostView
function cutText ($text, $size, $id)
{
    if (strlen ($text) <= $size)
        return $text;
    $cut = substr ($text, 0, $size);
    $cut = substr ($text, 0, strrpos ($cut, ' ')) . "<br /><a href='index.php?action=singlePost&&id=$id'>Lire la suite...</a>";
    return $cut;
}

function getPost()
{
    $id = $_GET['id'];
    $statut = 1;
    $postmanager = new PostManager();
    $commentManager = new CmtManager();
    $post = $postmanager->get($id);
    $comments = $commentManager->getlist($id, $statut);
    require('view/frontend/singlePost.php');
}

function addComment(){
    $comment = new Cmt;
    $comment->setPostId($_POST['postId']);
    $comment->setTitle($_POST['titleComment']);
    $comment->setComment($_POST['commentaire']);
    $comment->setAuthor($_POST['author']);
    $comment->setPosted($_POST['posted']);
    $manager = new CmtManager();
    $manager->add($comment);
    header("Refresh: 3; URL=index.php?action=singlePost&&id=".$_POST['postId']);
    echo '<center>Votre commentaire a bien été ajouté, il devra être validé avant affichage</center>';
    exit;
}

function reporting(){
    $id = $_GET['id'];
    $manager = new CmtManager();
    $manager->reporting($id);
    header("Refresh: 3; URL=index.php");
    echo ('<br /><center>Le commentaire a bien été signalé ! Merci de votre aide. </center>');
    exit;
}

//Users functions
function connect()
{
    require('view/frontend/connect.php');
}

function verifUser()
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (!empty($login) && !empty($password)) {
        $manager = new UserManager();
        $datas = $manager->checkUser($login, $password);
        $_SESSION['id'] = $datas['id'];
        $_SESSION['login'] = $datas['login'];
        $_SESSION['role'] = $datas['role'];
        header("Refresh: 2; URL=index.php");
        echo '<br /><center>Bienvenue ' . $_SESSION['login'] . '</center>';
        exit;
    } else {
        header("Refresh: 2; URL=index.php?action=connect");
        echo('<center>Veuillez renseignez tous les champs du formulaire !</center>');
        exit;
    }
}

function register()
{
    require('view/frontend/register.php');
}

function deconnexion()
{
    session_unset();
    session_destroy();
    header("Refresh: 2; URL=index.php");
    echo('<br /><center>Déconnexion en cours !</center>');
    exit;
}

function forgetPwd()
{
    require('public/template/formForgetPwd.php');
}

function resetPwd()
{
    $mail = $_POST['email'];
    $login = $_POST['user'];

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    } else {
        $passage_ligne = "\n";
    }
    //=====Déclaration des messages au format texte et au format HTML.
    $message_txt = "Bonjour, voici l'email de réinitialisation de votre mot de passe";
    $message_html = "<html><head></head><body><b>Bonjour</b>, voici le lien pour réinitialiser votre mot de passe : <br /><a href=\"http://localhost/ocr-projet4/index.php?action=formPwd&&login=$login\">Cliquez ici</a></body></html>";
    //==========

    //=====Création de la boundary
    $boundary = "-----=" . md5(rand());
    //==========

    //=====Définition du sujet.
    $sujet = "Réinitialisation de votre mot de passe";
    //=========

    //=====Création du header de l'e-mail.
    $header = "From: \"Jean Forteroche\"JeanForteroche.fr" . $passage_ligne;
    $header .= "Reply-to: \"Jean Forteroche\" JeanForteroche.gmail.com" . $passage_ligne;
    $header .= "MIME-Version: 1.0" . $passage_ligne;
    $header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
    //==========

    //=====Création du message.
    $message = $passage_ligne . "--" . $boundary . $passage_ligne;
    //=====Ajout du message au format texte.
    $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_txt . $passage_ligne;
    //==========
    $message .= $passage_ligne . "--" . $boundary . $passage_ligne;
    //=====Ajout du message au format HTML
    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_html . $passage_ligne;
    //==========
    $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
    $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
    //==========

    $manager = new userManager();
    $pwd = $manager->resetPwd($login, $mail);
    if ($pwd == true) {
        mail($mail, $sujet, $message, $header);
        header("Refresh: 3; URL=index.php?action=connect");
        echo('<center>Un email vous a été envoyé, vous pourrez réinitialiser votre mot de passe</center>');
        exit;
    }
}

function formPwd()
{
    require('public/template/formPwd.php');
}

function updatePwd()
{
    $login = $_POST['login'];
    $pwd = $_POST['newPwd'];
    $pwd2 = $_POST['newPwd2'];

    if ($pwd === $pwd2) {
        $manager = new userManager();
        $manager->newPwd($login, $pwd);
    } else {
        echo('<center>Veuillez saisir des mots de passes identiques</center>');
    }
    header("Refresh: 3; URL=index.php?action=connect");
    exit;
}

function mentionsLegales()
{
    require('view/frontend/mentionsLegales.php');
}
