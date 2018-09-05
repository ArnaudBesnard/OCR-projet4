<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=x033aj159s617dv6p04ex8cf9h6t37eytyjtfami5oah5xsg"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<?php
$dateCreate = date("Y-m-d");
?>
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
            <label for="dateAjout">Date :</label>
            <input id="dateAjout" name="dateAjout" value="<?= $dateCreate ?>">
        </div>
        <div>
            <label for="auteur">Auteur :</label>
            <input id="auteur" name="auteur">
        </div>
        <div>
            <label for="upload">Fichier :</label>
            <input type="file" class="form-control-file" id="uploadFile">

        </div>
        <br />
        <div class="button">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>
