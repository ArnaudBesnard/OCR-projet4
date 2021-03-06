<?php
ob_start();
    $dateCreate = date("Y-m-d");
    $status = 0;
    ?>
            <div class="col-lg-2">
                <?php include('public/template/adminNav.php'); ?>
            </div>
            <div class="col-lg-10">
                <div class="main">
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
                                        <?=("<div class='titreComment'>" . $comment->title() . "</div><div class='contenuComment'>" . $comment->comment() . "</div><div class='commentAuthor'>" . $comment->author() . "</div>"); ?>
                                    </div>
                                    <div class="button">
                                        <button type="submit" class="btn btn-primary"><i style="font-size:18px" class="fa">&#xf087;</i> Valider</button>
                                        <a href="index.php?action=deleteComment&&id=<?= $comment->id(); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');"><i style="font-size:18px" class="fa">&#xf088;</i> Supprimer</a></button>
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
    <?php
$content = ob_get_clean();
$title = "Validation des commentaires";
require('view/backend/template.php');
?>

