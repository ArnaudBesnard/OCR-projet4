<?php
session_start ();
// On récupère nos variables de session

$title = "Un billet simple pour l'Alaska";
ob_start();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
            <div class="articles">
                <?php if (isset($_SESSION['login'])) {
                echo('Bonjour ' .$_SESSION['login']);
                }
                else{
                    echo('Bonjour visiteur');
                }

                $request = $bdd->query('select * from billet order by id ASC ') or die(print_r($bdd->errorInfo()));
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
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require('template.php');
?>

