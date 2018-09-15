<?php
session_start();
// On récupère nos variables de session

$title = "Jean Forteroche - Administration";
ob_start();

$chapitre = $_GET['id'];
$action = "updatePost.php";
$reponse = $bdd->query("SELECT * FROM billet WHERE id = '" . $chapitre . "' ") or die(print_r($bdd->errorInfo()));

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
                <?php include('public/template/adminNav.html'); ?>
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
$content = ob_get_clean();
require('template.php');
?>