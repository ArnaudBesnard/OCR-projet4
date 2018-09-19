<?php
session_start();
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
                    <?php
                    $post = new PostManager($bdd);
                    ?>
                    <h1><?= $post->get($id)->titre(); ?></h1>
                    <div class='date_billet'><?= $post->get($id)->dateAjout(); ?></div>
                    <div class='contenu'><?= $post->get($id)->contenu(); ?></div>
                    <div class='auteur'><?= $post->get($id)->auteur(); ?></div>
                    <!--Fin affichage de l'article-->
                    <?php
                    if (isset($_SESSION['login'])) {
                    ?>
                    <!--Liste des commentaires-->
                    <?php include('view/frontend/viewComment.php'); ?>
                    <!--Fin liste des commentaires-->
                    <!--Formulaire des commentaires-->
                    <?php include('public/template/formComment.php'); ?>
                    <!--Fin du formulaire des commentaires-->
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
$title = "Jean Forteroche - " . $post->get($id)->titre();
require('template.php');
?>