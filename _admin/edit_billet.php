<?php
 
    $chapitre = $_GET['id'];

    $reponse = $bdd->query("SELECT * FROM billet WHERE id = '".$chapitre."' ") or die(print_r($bdd->errorInfo()));

    while ($donnees = $reponse->fetch()) {
        $id = $donnees['id'];
        $titre = $donnees['titre'];
        $contenu = $donnees['contenu'];
        $auteur = $donnees['auteur'];
        $dateAjout = $donnees['dateAjout'];
    };   
?>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=x033aj159s617dv6p04ex8cf9h6t37eytyjtfami5oah5xsg"></script>
<script>tinymce.init({ selector:'textarea' });</script>
    <h2>Edition d'un billet sur le site :</h2>
    <div class="form_billet">
        <form action="update_billet.php" method="post">
            <div>
                <label for="id">Id :</label>
                <input type="text" id="id" name="id" value="<?php echo($id); ?>">
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
                <label for="date">Date :</label>
                <input id="dateAjout" name="dateAjout" value="<?php echo($dateAjout); ?>">
            </div>
            <div>
                <label for="auteur">Auteur :</label>
                <input id="auteur" name="auteur" value="<?php echo($auteur); ?>">
            </div>
            <div class="button">

                <br /><button type="submit" class="btn btn-primary">Editer</button>
                <button type="button" class="btn btn-danger"><a href="admin.php">Annuler</a></button>
            </div>
        </form>
    </div>
