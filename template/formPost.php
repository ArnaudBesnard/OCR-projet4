
<form action="<?php echo $action; ?>" method="post">
    <div>
        <label for="id">Id :</label>
        <input type="text" id="id" name="id" value="<?php if (isset($id)) echo ($id); ?>">
    </div>
    <div>
        <label for="titre">Titre du chapitre :</label>
        <input type="text" id="titre" name="titre_chapitre" value="<?php if (isset($titre)) echo ($titre); ?>">
    </div>
    <div>
        <label for="contenu">Contenu :</label>
        <textarea type="text" id="contenu" name="contenu"><?php if (isset($contenu)) echo ($contenu); ?></textarea>
    </div>
    <div>
        <label for="date">Date :</label>
        <input id="dateAjout" type="date" name="dateAjout" value="<?php if (isset($dateAjout)) echo ($dateAjout); ?>">
    </div>
    <div>
        <label for="auteur">Auteur :</label>
        <input id="auteur" name="auteur" value="<?php if (isset($auteur)) echo ($auteur); ?>">
    </div>
    <div class="button">

        <br /><button type="submit" class="btn btn-primary">Envoyer</button>
        <button type="button" class="btn btn-danger"><a href="admin.php">Annuler</a></button>
    </div>
</form>
