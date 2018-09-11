<?php
ob_start();
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="articles">
                        <h2>Page de connexion utilisateurs</h2>
                    <form action="verifUser.php" method="post">
                        <div>
                            <input type="text" name="login" class="form-control" placeholder="Entrer votre nom d'utilisateur">
                        </div>
                        <br/>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe">
                        </div>
                        <br />
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                            <label class="custom-control-label" for="defaultUnchecked">Se souvenir de moi</label>
                        </div>
                        <div class="button">
                        <br/>
                        <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
$title = "Jean Forteroche - Page de connection";
require('template.php');
?>