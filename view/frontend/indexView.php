<?php
session_start ();

$title = "Jean Forteroche - Un billet simple pour l'Alaska";
ob_start();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="articles">
                <!--Affichage des articles-->
                <?php
                    $manager = new PostManager($bdd);
                    $posts = $manager->getList();
                    foreach($posts as $post){
                ?>
                    <h1>
                        <a href="index.php?page=singlePost&&id=<?= $post->id(); ?>"><?= $post->titre(); ?></a>
                    </h1>
                    <div class='date_billet'>
                        <?= $post->dateAjout(); ?>
                    </div>
                    <div class='contenu'>
                        <?= $post->contenu(); ?>
                    </div>
                    <div class='auteur'>
                        <?= $post->auteur(); ?>
                    </div>
                 <?php } ?>
                <!--Fin affichage des articles-->
            </div>
        </div>
        <div class="col-2">
            <!--Affichage ici des titres des chapitres-->
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require('template.php');
?>

