<?php

$chapitre = $_GET['id'];
$action = "updatePost.php";
$reponse = $bdd->query("SELECT * FROM billet WHERE id = '".$chapitre."' ") or die(print_r($bdd->errorInfo()));

while ($donnees = $reponse->fetch()) {
    $id = $donnees['id'];
    $titre = $donnees['titre'];
    $contenu = $donnees['contenu'];
    $auteur = $donnees['auteur'];
    $dateAjout = $donnees['dateAjout'];
};
?>
<div class="articles">
<h2>Edition d'un billet sur le site :</h2>
<div class="form_billet">
    <?php include("../template/formPost.php"); ?>
</div>
</div>
