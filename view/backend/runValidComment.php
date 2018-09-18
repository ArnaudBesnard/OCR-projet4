<?php
//Autoload de chargement des classes
spl_autoload_register(function ($classe) {
    include '../../model/' . $classe . '.class.php';
});
$db = new Database;
$bdd = $db->getConnection();

$comment = new comment;
$comment->setStatut($_POST['statut']);

$manager = new CommentManager($bdd);
$manager->update($comment);
header('Location: index.php?page=validComment');