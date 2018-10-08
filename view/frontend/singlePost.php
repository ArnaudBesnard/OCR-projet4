<?php

$id = $_GET['id'];
if (isset($_SESSION['login'])) { $author = $_SESSION['login']; }
$posted = date("Y-m-d");
$brutDate  = $post->dateAjout();
$date = DateTime::createFromFormat('Y-m-d', $brutDate);
ob_start();
?>
            <div class="col-lg-12">
                <div class="main">
                    <!--Début de l'affichage de l'article-->
                    <div class="titre"><?= $post->titre(); ?></div>
                    <?php if ($post->postImg()) { ?>
                        <center><img id="imgPost" src="public/uploads/<?= $post->postImg(); ?>" alt="Image liée à l'article"></center>
                     <?php }; ?>
                    <div class='date_billet'>Chapitre publié le : <?= $date->format('d-m-Y'); ?></div>
                    <div class='contenu'><?= $post->contenu(); ?></div>
                    <div class='auteur'><?= $post->auteur(); ?></div>
                    <!--Fin affichage de l'article-->
                    <?php
                    //Affichage des commentaires
                    if (isset($_SESSION['login'])) {
                    foreach ($comments as $comment) { ?>
                        <div class="comment">
                            <?php echo("<div class='titreComment'>" . $comment->title() . "</div><div class='contenuComment'>" . $comment->comment() . "</div><div class='commentAuthor'>" . $comment->author() . ' - Posté le ' . $comment->posted() . "</div>"); ?>
                            <div class="signalement"><a href="index.php?action=reporting&&id=<?= $comment->id(); ?>">Signaler</a></div></div>
                    <?php }
                    include('public/template/formComment.php'); ?>
                </div>
                <?php
                }
                else {
                    echo("<center>Vous devez être connecté afin de voir ou poster un commentaire,<br /><a href='index.php?action=connect'>cliquez ici</a> pour vous connecter</center>");
                } ?>
            </div>
<?php
$content = ob_get_clean();
$title = $post->titre();
require('view/frontend/template.php');
?>