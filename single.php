<?php
//$title = $titrePost;
$id = $_GET['id'];
ob_start();
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <div class="articles">
                    <?php
                    $request = $bdd->query('select * from billet WHERE id = ' . $id) or die(print_r($bdd->errorInfo()));
                    $donnees = $request->fetch(PDO::FETCH_ASSOC);

                        $billet = new Post($donnees);
                        $billet->hydrate($donnees);
                        ?>
                        <h1>
                            <?= $billet->titre(); ?>
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
                </div>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
require('template.php');
?>