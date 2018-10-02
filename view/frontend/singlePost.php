<?php

$id = $_GET['id'];
if (isset($_SESSION['login'])) {$author = $_SESSION['login'];}
$posted = date("Y-m-d");
ob_start();
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <!-- Colonne vide-->
            </div>
            <div class="col-8">
                <div class="articles">
                    <!--Début de l'affichage de l'article-->
                    <h1><?= $post->titre(); ?></h1>
                    <div class='date_billet'><?= $post->dateAjout(); ?></div>
                    <div class='contenu'><?= $post->contenu(); ?></div>
                    <div class='auteur'><?= $post->auteur(); ?></div>
                    <!--Fin affichage de l'article-->
                    <?php
                    //Affichage des commentaires
                    if (isset($_SESSION['login'])) {
                         foreach($comments as $comment){ ?>
                        <div class="comment">
                            <?php echo("<div class='titreComment'>" .$comment->title() . "</div><div class='contenuComment'>" . $comment->comment() ."</div><div class='commentAuthor'>" . $comment->author() .' - Posté le '.$comment->posted(). "</div>"); ?>

                            <div class="signalement"><a href="index.php?action=reporting&&id=<?= $comment->id(); ?>">Signaler</a></div></div>
                    <?php }

                    include('public/template/formComment.php'); ?>

                </div>
                <?php
                }
                else {
                    echo("<center>Vous devez être connecté afin de voir ou poster un commentaire,<br /><a href='index.php?page=connection'>cliquez ici</a> pour vous connecter</center>");
                } ?>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
$title = $post->titre();
require('view/template.php');
?>