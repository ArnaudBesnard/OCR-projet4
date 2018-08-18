<?php
require('../_connect/connect.php'); 

$reponse = $bdd->query('SELECT * FROM billet WHERE titre LIKE "chapitre 1"') or die(print_r($bdd->errorInfo()));
while ($donnees = $reponse->fetch()) { 
  
$titre = $donnees['titre'];
$contenu = $donnees['contenu'];
$auteur = $donnees['auteur'];
$date = $donnees['date'];
};   
?>

    <h2>Edition d'un billet sur le site :</h2>
    <div class="form_billet">
        <form action="#" method="post">

            <div>
                <label for="titre">Titre du chapitre :</label>
                <input type="text" id="titre" name="titre_chapitre" value="<?php echo($titre); ?>" </div>
                <div>
                    <label for="contenu">Contenu :</label>
                    <textarea type="text" id="contenu" name="contenu"><?php echo ($contenu); ?></textarea>
                </div>
                <div>
                    <label for="auteur">Auteur :</label>
                    <input id="auteur" name="auteur" value="<?php echo($auteur); ?>">
                </div>
                <div>
                    <label for="date">Date :</label>
                    <input id="date" name="date" value="<?php echo($date); ?>">
                </div>
                <div class="button">
                    <br /><button type="submit" class="btn btn-primary">Editer</button>
                </div>
                <a href="admin.php">Retour</a>
        </form>

        </div>
