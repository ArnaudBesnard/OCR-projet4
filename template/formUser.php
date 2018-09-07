<?php $dateAjout = date("Y-m-d");
$action = "#";
?>
<div class="articles">
    <h2>Formulaire de création d'utilisateur</h2>
    <form action="<?php echo $action; ?>" method="post">
        <div>
            <input type="text" name="nickname" class="form-control" placeholder="Pseudo">
        </div>
        <br/>
        <div>
            <input type="text" name="lastname" class="form-control" placeholder="Nom">
        </div>
        <br/>
        <div>
            <input type="text" name="firstname" class="form-control" placeholder="Prénom">
        </div>
        <br/>
        <div>
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <br/>
        <div>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
        </div>
        <br/>
        <div>
            <input type="date" name="createDate" class="form-control" placeholder="Date"
                   value="<?php if (isset($dateAjout)) echo($dateAjout); ?>">
        </div>
        <br/>
        <div>

            <select id="role" name="role" class="form-control" type="text">
                <option>Administrateur</option>
                <option>Contributeur</option>
                <option>Utilisateur</option>
            </select>
        </div>
        <div class="button">

            <br/>
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <button type="button" class="btn btn-danger"><a href="admin.php">Annuler</a></button>
        </div>
    </form>
</div>