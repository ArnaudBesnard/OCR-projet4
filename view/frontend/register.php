<?php
$dateCreate = date("Y-m-d");
$action = "index.php?action=addUser";
?>
<div class="articles">
    <h2>Ajout d'un utilisateur sur le site :</h2>
    <div class="form_billet">
        <?php include("public/template/formUser.php"); ?>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = "Inscription";
require('view/template.php');
?>