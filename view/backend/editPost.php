<?php
ob_start();
?>
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
$content = ob_get_clean();
$title = "Edition d'un chapitre";
require('view/backend/template.php');
?>