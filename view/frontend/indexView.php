<?php
session_start ();

$title = "Jean Forteroche - Un billet simple pour l'Alaska";
ob_start();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="articles">
            <!--Affichage des articles-->
                <?php
                    $manager = new PostManager($bdd);
                    var_dump($manager);
                    echo $manager->getList()->titre();
                   echo $manager->getList()->contenu();
                 ?>
            <!--Fin affichage des articles-->
            </div>
        </div>
        <div class="col-2">
            <!--Affichage ici des titres des chapitres-->
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require('template.php');
?>

