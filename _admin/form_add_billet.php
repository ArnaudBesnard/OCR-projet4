<h2>Ajout d'un billet sur le site :</h2>
<div class="form_billet">
    <form action="add_billet.php" method="post">
        <div>
            <label for="titre">Titre du chapitre :</label>
            <input type="text" id="titre" name="titre_chapitre">
        </div>
        <div>
            <label for="contenu">Contenu :</label>
            <textarea type="text" id="contenu" name="contenu"></textarea>
        </div>
        <div>
            <label for="date">Date :</label>
            <input id="date" name="date">
        </div>
        <div>
            <label for="auteur">Auteur :</label>
            <input id="auteur" name="auteur">
        </div>
        <div class="button">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>
