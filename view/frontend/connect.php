<?php
ob_start();
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="articles">
                    <?php if (!isset($_SESSION['login'])){ ?>
                        <h2>Page de connexion utilisateurs</h2>
                    <form action="index.php?action=verifUser" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="login" required value="">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">**</span>
                            </div>
                            <input type="password" class="form-control" placeholder="Mot de passe" name="password" required value="">
                        </div>
                        <span><a href="index.php?action=forgetPwd">Mot de passe oublié</a></span>
                        <div class="button">
                            <br />
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
    <?php }
    else {
                        header("Refresh: 2; URL=index.php");
                        echo('<center>Vous êtes déjà connecté !</center>');
                        exit;
    }?>
                </div>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
$title = "Connexion";
require('view/template.php');
?>