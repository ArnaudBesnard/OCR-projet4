<?php
session_start ();
// On récupère nos variables de session

$dateCreate = date("Y-m-d");
$action = "admin/addUser.php";
$title = "Inscription";
?>
<div class="articles">
    <h2>Ajout d'un utilisateur sur le site :</h2>
    <div class="form_billet">
        <?php include("public/template/formUser.php"); ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require('template.php');
?>