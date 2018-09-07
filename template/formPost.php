
<form action="<?php echo $action; ?>" method="post">
    <div>
        <input type="text" name="id" class="form-control" placeholder="Id" value="<?php if (isset($id)) echo ($id); ?>">
    </div>
    <br />
    <div>
        <input type="text" name="titre_chapitre" class="form-control" placeholder="Chapitre" value="<?php if (isset($titre)) echo ($titre); ?>">
    </div>
    <br />
    <div>
        <textarea type="text" name="contenu" rows="10" class="form-control" placeholder="Contenu" id="contenu"><?php if (isset($contenu)) echo ($contenu); ?></textarea>
    </div>
    <br />
    <div>
        <input class="form-control" name="dateAjout" type="date" placeholder="Date" value="<?php if (isset($dateAjout)) echo ($dateAjout); ?>">
    </div>
    <br />
    <div>
        <input class="form-control" name="auteur" placeholder="Auteur" value="<?php if (isset($auteur)) echo ($auteur); ?>">
    </div>
    <div class="button">

        <br /><button type="submit" class="btn btn-primary">Envoyer</button>
        <button type="button" class="btn btn-danger"><a href="admin.php">Annuler</a></button>
    </div>
</form>
