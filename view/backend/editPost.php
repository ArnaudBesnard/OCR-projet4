<?php
//session_start();

$title = "Jean Forteroche - Administration";
ob_start();
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
    $chapitre = $_GET['id'];
    $action = "index.php?page=updatePost";
    $reponse = $bdd->query("SELECT * FROM posts WHERE id = '" . $chapitre . "' ") or die(print_r($bdd->errorInfo()));

    while ($donnees = $reponse->fetch()) {
        $id = $donnees['id'];
        $titre = $donnees['titre'];
        $contenu = $donnees['contenu'];
        $auteur = $donnees['auteur'];
        $dateAjout = $donnees['dateAjout'];
    };
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include('public/template/adminNav.php'); ?>
            </div>
            <div class="col-8">
                <div class="articles">
                    <h2>Edition d'un billet sur le site :</h2>
                    <div class="form_billet">
                        <?php include("public/template/formPost.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    header('Location: index.php?page=connection');
}
$content = ob_get_clean();
require('template.php');
?>