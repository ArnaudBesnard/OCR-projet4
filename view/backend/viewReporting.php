<?php
//session_start();

$title = "Jean Forteroche - Un billet simple pour l'Alaska";
ob_start();
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
    $dateCreate = date("Y-m-d");
    $action = "#";
    $reporting = 1;
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include('public/template/adminNav.php'); ?>
            </div>
            <div class="col-8">
                <div class="articles">
                    <h2>Liste des signalements de commentaires :</h2>
                    <div class="form_billet">
                        <?php
                        $manager = new CmtManager($bdd);
                        $comments = $manager->getReporting($reporting);
                        if ($comments) {
                            foreach ($comments as $comment) {
                                ?>
                                <form action="#" method="post">
                                    <div class="comment">
                                        <?= 'Chapitre : ' . $comment->postId() . ' - Id N° : ' . $comment->id(); ?>
                                        <?php echo("<div class='titreComment'>" . $comment->title() . "</div><div class='contenuComment'>" . $comment->comment() . "</div><div class='commentAuthor'>" . $comment->author() . "</div>"); ?>
                                    </div>
                                    <div class="button">
                                        <button type="button" class="btn btn-primary"><a href="index.php?page=cancelReporting&&id=<?= $comment->id(); ?>"><i style="font-size:18px" class="fa">&#xf087;</i> Commentaire ok</a></button>
                                        <button type="button" class="btn btn-danger"><a href="index.php?page=deleteComment&&id=<?= $comment->id(); ?>"><i style="font-size:18px" class="fa">&#xf088;</i> Supprimer</a></button>
                                    </div>
                                </form>
                                <br/>
                            <?php }
                        } else {
                            echo('<br /><center>Aucun signalement !</center>');
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    header('Location: index.php?page=connection');
}
$content = ob_get_clean();
require('template.php');
?>

