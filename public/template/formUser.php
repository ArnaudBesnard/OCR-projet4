<form action="<?= $action ?>" method="post">
    <div>
        <input type="text" name="login" class="form-control" placeholder="Nom d'utilisateur" required value="">
    </div>
    <br/>
    <div>
        <input type="text" name="lastname" class="form-control" placeholder="Nom" required value="">
    </div>
    <br/>
    <div>
        <input type="text" name="firstname" class="form-control" placeholder="Prénom" required value="">
    </div>
    <br/>
    <div>
        <input type="email" name="email" class="form-control" placeholder="Email" required value="">
    </div>
    <br/>
    <div>
        <input id="password" for="pwd" type="password" name="password" class="form-control" placeholder="Mot de passe" required value="">
    </div>
    <br/>
    <div>
        <input id="confirm_password" for="pwd2" type="password" name="confirm_password" class="form-control" placeholder="Confirmez votre mot de passe" onblur="checkPwd()" required value="">
        <label id="mdperror"></label>
    </div>
    <br/>
    <div>
        <input type="hidden" name="createDate" class="form-control" placeholder="Date"
               value="<?php if (isset($dateCreate)) echo($dateCreate); ?>">
    </div>
    <br/>
    <div>
        <input type="hidden" id="role" name="role" class="form-control" value="Utilisateur">
    </div>
    <div class="button">
        <br/>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <a href="index.php?action=administration" class="btn btn-danger">Annuler</a></button>
    </div>
</form>
