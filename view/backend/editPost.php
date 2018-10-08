<?php
ob_start();
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) { ?>
            <div class="col-lg-2">
                <?php include('public/template/adminNav.php'); ?>
            </div>
            <div class="col-lg-10">
                <div class="main">
                    <h2>Edition d'un billet sur le site :</h2>
                    <div class="form_billet">
                        <?php include("public/template/formPost.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    header("Refresh: 2; URL=index.php");
    echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
    exit;
}
$content = ob_get_clean();
$title = "Edition d'un chapitre";
require('view/backend/template.php');
?>