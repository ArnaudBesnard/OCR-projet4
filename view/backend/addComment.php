<?php
session_start ();

$title = "Jean Forteroche - Ajout d'un commentaire";
ob_start();

$comment = new Cmt;
$comment->setPostId($_POST['postId']);
$comment->setTitle($_POST['titleComment']);
$comment->setComment($_POST['commentaire']);
$comment->setAuthor($_POST['author']);
$comment->setPosted($_POST['posted']);

$manager = new CmtManager($bdd);
$manager->add($comment);

echo '<center>Votre commentaire a bien été ajouté, il devra être validé avant affichage</center>';
$content = ob_get_clean();
require('template.php');
header("Refresh: 3; URL=index.php" );
