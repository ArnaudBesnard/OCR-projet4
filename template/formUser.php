<form action="<?= $action ?>" method="post">
    <div>
        <input type="text" name="nickname" class="form-control" placeholder="Nom d'utilisateur">
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
        <input type="password" name="confirm_password" class="form-control" placeholder="Confirmez votre mot de passe">
    </div>
    <br/>
    <div>
        <input type="date" name="createDate" class="form-control" placeholder="Date"
               value="<?php if (isset($dateCreate)) echo($dateCreate); ?>">
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
