<?php
$title = "Mot de passe oublié ?";
ob_start();
?>
<h2>Formulaire de réinitialisation de mot de passe</h2>
<h6><center>Un email vous sera envoyé afin de réinitialiser votre mot de passe</center></h6>
<form action="index.php?page=resetPwd" method="post">

    <div>
        <input type="text" name="user" class="form-control" placeholder="Votre nom d'utilisateur" value="">
    </div>
    <br/>
    <div>
        <input type="email" name="email" class="form-control" placeholder="Votre adresse email" value="" >
    </div>
    <br />
    <div class="button">
        <br/>
        <button type="submit" class="btn btn-primary"> Envoyer</button>
        <button type="button" class="btn btn-danger"><a href="index.php"> Annuler</a></button>
    </div>
</form>

<?php
$content = ob_get_clean();
require('template.php');
?>