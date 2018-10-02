<?php
ob_start();
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
    $id = $_GET['id'];
    $action = "index.php?action=updatePost";
    $manager = new PostManager();
    $post = $manager->get($id);
        $id = $post->id();
        $titre = $post->titre();
        $contenu = $post->contenu();
        $auteur = $post->auteur();
        $dateAjout = $post->dateAjout();
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include('public/template/adminNav.php'); ?>
            </div>
            <div class="col-8">
                <div class="articles">
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
    echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
    header("Refresh: 2; URL=index.php");
}
$content = ob_get_clean();
$title = "Edition d'un chapitre";
require('view/template.php');
?>