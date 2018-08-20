<?php
    require('../_connect/connect.php'); 
    $reponse = $bdd->query('SELECT * FROM billet WHERE id = 1') or die(print_r($bdd->errorInfo()));
    while ($donnees = $reponse->fetch()) { 
        $id = $donnees['id'];
        $titre = $donnees['titre'];
        $contenu = $donnees['contenu'];
        $auteur = $donnees['auteur'];
        $date = $donnees['date'];
    };   
?>

    <h2>Edition d'un billet sur le site :</h2>
    <div class="form_billet">
        <form action="update_art.php" method="post">
            <div>
                <select name="id">
                    <?php echo('<option>' .$id. '</option>'); ?>
                </select>
            </div>
            <div>
                <label for="titre">Titre du chapitre :</label>
                <input type="text" id="titre" name="titre_chapitre" value="<?php echo($titre); ?>">
            </div>
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
        </form>
    </div>
