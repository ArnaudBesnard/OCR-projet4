<?php
ob_start();
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
    $dateCreate = date("Y-m-d");
    $action = "index.php?action=addUser";
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include('public/template/adminNav.php'); ?>
            </div>
            <div class="col-8">
                <div class="articles">
                    <h2>Ajout d'un utilisateur sur le site :</h2>
                    <div class="form_billet">
                        <?php include("public/template/formUser.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
else{
    header("Refresh: 2; URL=index.php");
    echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
    exit;
}
$content = ob_get_clean();
$title = "Ajout d'un utilisateur";
require('view/template.php');
?>