<?php
ob_start();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10">
            <div class="articles">
                <!--Affichage des articles-->
                <?php foreach($posts as $post){ ?>
                    <h1><a href="index.php?action=singlePost&&id=<?= $post->id(); ?>"><?= $post->titre(); ?></a></h1>
                    <div class='date_billet'>
                        <?= $post->dateAjout(); ?>
                    </div>
                    <div class='contenu'>
                        <?php
                            $id = $post->id();
                            $text = $post->contenu();
                            $cutText = cutText($text, 1500, $id);
                            echo $cutText;
                         ?>
                    </div>
                    <div class='auteur'>
                        <?= $post->auteur(); ?>
                    </div>
                 <?php } ?>
                <!--Fin affichage des articles-->
            </div>
        </div>
        <div class="col-xl-2">
            <figure><img class="biographie" src="public/img/JeanForteroche.jpg" alt="Jean Forteroche" /></figure>
            <figurecaption id="textBiographie"><center>Jean Forteroche</center></figurecaption>
            <div class="postTitleRight">Liste des chapitres</div>
            <div class="postsTitlesList">
            <?php
            foreach($posts as $post){
                $postTitle = $post->titre();
                $id = $post->id();
                $cutTitle = substr($postTitle, 0, 21) . "...";
                $titleLink = ("<a href='index.php?action=singlePost&&id=$id'>$cutTitle</a><br />");
                echo $titleLink;
             } ?>
        </div>
    </div>
</div>
</div>
<?php
$content = ob_get_clean();
$title = "Jean Forteroche - Un billet simple pour l'Alaska";
require('view/template.php');
?>

