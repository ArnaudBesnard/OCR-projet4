<?php
$dateCreate = date("Y-m-d");
$action = "index.php?action=addUser";
?>
    <div class="col-xl-12">
        <div class="main">
            <h1>Création d'un compte utilisateur :</h1>
            <?php include("public/template/formUser.php"); ?>
        </div>
    </div>
<?php
$content = ob_get_clean();
$title = "Inscription";
require('view/frontend/template.php');
?>