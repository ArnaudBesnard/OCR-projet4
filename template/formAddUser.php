<?php $dateAjout = date("Y-m-d");
$action = "#";
?>
<div class="articles">
<h2>Formulaire de création d'utilisateur</h2>
<form action="<?php echo $action; ?>" method="post">
    <div>
        <label for="nickname">Votre pseudo :</label>
        <input type="text" id="nickname" name="nickname">
    </div>
    <div>
        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname"></input>
    </div>
    <div>
        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname"></input>
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email"></input>
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password"></input>
    </div>
    <div>
        <label for="date">Date :</label>
        <input id="dateAjout" type="date" name="dateAjout" value="<?php if (isset($dateAjout)) echo ($dateAjout); ?>">
    </div>
    <div>
        <label for="role">Rôle :</label><br />
        <select id="role" type="text" name="role">
            <option>Administrateur</option>
            <option>Contributeur</option>
            <option>Utilisateur</option>
        </select>
    </div>
    <div class="button">

        <br /><button type="submit" class="btn btn-primary">Envoyer</button>
        <button type="button" class="btn btn-danger"><a href="admin.php">Annuler</a></button>
    </div>
</form>
</div>