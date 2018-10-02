<?php

//session_start();

$title = "Jean Forteroche - Un billet simple pour l'Alaska";
ob_start();
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
    $dateCreate = date("Y-m-d");
    $action = "#";
    $status = 0;
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include('public/template/adminNav.php'); ?>
            </div>
            <div class="col-8">
                <div class="articles">
                    <h2>Validation des commentaires :</h2>
                    <div class="form_billet">
                        <?php
                        $manager = new CmtManager($bdd);
                        $comments = $manager->getStatus($status);
                        if ($comments) {
                            foreach ($comments as $comment) {
                                ?>
                                <form action="index.php?action=validComment&&id=<?= $comment->id(); ?>" method="post">
                                    <div class="comment">
                                        <?= 'Chapitre : ' . $comment->postId() . ' - Id N° : ' . $comment->id(); ?>
                                        <?php echo("<div class='titreComment'>" . $comment->title() . "</div><div class='contenuComment'>" . $comment->comment() . "</div><div class='commentAuthor'>" . $comment->author() . "</div>"); ?>
                                    </div>
                                    <div class="button">
                                        <button type="submit" class="btn btn-primary"><i style="font-size:18px" class="fa">&#xf087;</i> Valider</button>
                                        <button type="button" class="btn btn-danger"><a href="index.php?action=deleteComment&&id=<?= $comment->id(); ?>"><i style="font-size:18px" class="fa">&#xf088;</i> Supprimer</a></button>
                                    </div>
                                </form>
                                <br/>
                            <?php }
                        } else {
                            echo('<br /><center>Aucun commentaire à valider !</center>');
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    header('Location: index.php?action=connect');
}
$content = ob_get_clean();
require('view/template.php');
?>

