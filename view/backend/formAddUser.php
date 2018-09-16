<?php
session_start();
// On récupère nos variables de session

$title = "Jean Forteroche - Un billet simple pour l'Alaska";
ob_start();
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
    $dateCreate = date("Y-m-d");
    $action = "addUser.php";
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include('public/template/adminNav.html'); ?>
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
    header('Location: index.php?page=connection');
}
$content = ob_get_clean();
require('template.php');
?>