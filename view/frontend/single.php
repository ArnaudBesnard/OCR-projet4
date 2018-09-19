<?php
session_start();
$id = $_GET['id'];
$author = $_SESSION['login'];
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
                    <?php
                    $request = $bdd->query('select * from posts WHERE id = ' . $id) or die(print_r($bdd->errorInfo()));
                    $donnees = $request->fetch(PDO::FETCH_ASSOC);

                    $billet = new Post($donnees);
                    $billet->hydrate($donnees);
                    ?>
                    <h1><?= $billet->titre(); ?></h1>
                    <div class='date_billet'><?= $billet->dateAjout(); ?></div>
                    <div class='contenu'><?= $billet->contenu(); ?></div>
                    <div class='auteur'><?= $billet->auteur(); ?></div>

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
$title = "Jean Forteroche - " . $billet->titre();
require('template.php');
?>