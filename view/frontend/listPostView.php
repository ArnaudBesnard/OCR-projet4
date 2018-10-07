<?php
ob_start();
?>
        <div class="col-xl-10">
            <div class="main">
                <!--Affichage des articles-->
                <?php foreach($posts as $post){
                    $brutDate  = $post->dateAjout();
                    $date = DateTime::createFromFormat('Y-m-d', $brutDate);
                    ?>
                    <div class="titre"><a href="index.php?action=singlePost&&id=<?= $post->id(); ?>"><?= $post->titre(); ?></a></div></h1>
                    <div class='date_billet'>Chapitre publié le : <?=  $date->format('d-m-Y'); ?></div>
                    <div class='contenu'>
                        <?php
                            $id = $post->id();
                            $text = $post->contenu();
                            $cutText = cutText($text, 1500, $id);
                            echo $cutText;
                         ?>
                    </div>
                    <div class='auteur'> <?= $post->auteur(); ?></div>
                 <?php } ?>
                <!--Fin affichage des articles-->
            </div>
        </div>
        <div class="col-xl-2">
            <figurecaption id="textBiographie"><center>Jean Forteroche</center></figurecaption>
            <figure><img class="biographie" src="public/img/JeanForteroche.jpg" alt="Jean Forteroche" /></figure>
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
<?php
$content = ob_get_clean();
$title = "Jean Forteroche - Un billet simple pour l'Alaska";
require('view/frontend/template.php');
?>

