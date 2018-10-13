<?php
ob_start();
    $dateCreate = date("Y-m-d");
    $action = "index.php?action=addPost";
    $auteur = $_SESSION['login']; ?>

            <div class="col-lg-2">
                    <?php include('public/template/adminNav.php'); ?>
            </div>
            <div class="col-lg-10">
                <div class="main">
                    <h2>Ajout d'un billet sur le site :</h2>
                    <div class="form_billet">
                        <?php include("public/template/formPost.php"); ?>
                    </div>
                </div>
            </div>
<?php
$content = ob_get_clean();
$title = "Ajout d'un chapitre";
require('view/backend/template.php');
?>