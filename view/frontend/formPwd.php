<?php
$title = "Réinitialisation du mot de passe";
ob_start();
$login = $_GET['login'];
?>
<h2>Réinitialisation de votre mot de passe</h2>
    <form action="index.php?action=updatePwd" method="post">
        <div>
            <input type="hidden" name="login" class="form-control" value="<?= $login ?>">
        </div>
        <div>
            <input type="password" name="newPwd" class="form-control" placeholder="Entrez votre nouveau mot de passe" value="">
        </div>
        <br/>
        <div>
            <input type="password" name="newPwd2" class="form-control" placeholder="Confirmer votre nouveau mot de passe" value="">
        </div>
        <br />
        <div class="button">
            <br/>
            <button type="submit" class="btn btn-primary"> Envoyer</button>
        </div>
    </form>

<?php
$content = ob_get_clean();
require('view/template.php');
?>