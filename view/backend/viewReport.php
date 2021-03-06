<?php
ob_start();
    $dateCreate = date("Y-m-d");
    $reporting = 1;
    ?>
            <div class="col-lg-2"><?php include('public/template/adminNav.php'); ?></div>
            <div class="col-lg-10">
                <div class="main">
                    <h2>Liste des signalements de commentaires :</h2>
                    <div class="form_billet">
                        <?php
                        $manager = new CmtManager($bdd);
                        $comments = $manager->getReporting($reporting);
                        if ($comments) {
                            foreach ($comments as $comment) { ?>
                                <form action="#" method="post">
                                    <div class="comment">
                                        <?= 'Chapitre : ' . $comment->postId() . ' - Id N° : ' . $comment->id(); ?>
                                        <?php echo("<div class='titreComment'>" . $comment->title() . "</div><div class='contenuComment'>" . $comment->comment() . "</div><div class='commentAuthor'>" . $comment->author() . "</div>"); ?>
                                    </div>
                                    <div class="button">
                                        <a href="index.php?action=cancelReport&&id=<?= $comment->id(); ?>" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir valider ce commentaire ?');"><i style="font-size:18px" class="fa">&#xf087;</i> Commentaire ok</a></button>
                                        <a href="index.php?action=deleteComment&&id=<?= $comment->id(); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');"><i style="font-size:18px" class="fa">&#xf088;</i> Supprimer</a></button>
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
    <?php
$content = ob_get_clean();
$title = "Modération commentaires";
require('view/backend/template.php');
?>

