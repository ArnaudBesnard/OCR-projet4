<h2>Ajouter un commentaire sur cet article</h2>
<form action="index.php?action=addComment" method="post">
    <div>
        <input type="hidden" name="postId" class="form-control" required value="<?=$id?>" >
    </div>
    <div>
        <input type="text" name="titleComment" class="form-control" placeholder="Titre du commentaire" required value="">
    </div>
    <br/>
    <div>
        <textarea type="text" name="commentaire" rows="7" class="form-control" id="commentaire"></textarea>
    </div>
    <br/>
    <div>
        <input type="hidden" name="author" class="form-control" required value="<?php if (isset($author)) echo($author); ?>" >
    </div>
    <div>
        <input type="hidden" name="posted" class="form-control" required value="<?=$posted?>" >
    </div>
    <div class="button">
        <br/>
        <button type="submit" class="btn btn-primary"> Envoyer</button>
        <button type="button" class="btn btn-danger"><a href="index.php?action=singlePost&&id=<?=$id?>"> Annuler</a></button>
    </div>
</form>