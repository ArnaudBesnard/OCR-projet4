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
                $request = $bdd->query('select * from posts order by id ASC ') or die(print_r($bdd->errorInfo()));
                while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
                {
                    $billet = new Post($donnees);
                    $billet->hydrate($donnees);
                    ?>
                    <h1>
                        <a href="index.php?page=singlePost&&id=<?= $billet->id(); ?>"><?= $billet->titre(); ?></a>
                    </h1>
                    <div class='date_billet'>
                        <?= $billet->dateAjout(); ?>
                    </div>
                    <div class='contenu'>
                        <?= $billet->contenu(); ?>
                    </div>
                    <div class='auteur'>
                        <?= $billet->auteur(); ?>
                    </div>
                <?php }; ?>

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

