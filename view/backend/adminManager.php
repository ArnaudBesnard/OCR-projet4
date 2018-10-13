<?php
ob_start();
    ?>
            <div class="col-lg-2">
                <?php include('public/template/adminNav.php'); ?>
            </div>
            <div class="col-lg-10">
                <div class="main">
                    <h1>Gestion des chapitres</h1>
                    <?php
                    foreach ($posts as $post) {
                        ?>
                        <div class="titre"><?= $post->titre(); ?></div>
                        <div class='date_billet'>
                            <?= $post->dateAjout(); ?>
                        </div>
                        <div class='contenu'>
                            <?= $post->contenu(); ?>
                        </div>
                        <div class='auteur'>
                            <?= $post->auteur(); ?>
                        </div>
                        <?php if ($post->postImg()){ ?>
                            <div>image associée : <a href="public/uploads/<?= $post->postImg() ; ?>" target="_blank"><?= $post->postImg() ; ?></a></div>
                        <?php } ?>
                        <div class="btnGestion">
                            <a href="index.php?action=editPost&&id=<?= $post->id() ?>" class="btn btn-success"><i style="font-size:18px" class="fa">&#xf0a4;</i> Editer</a>
                            </button>
                            <a href="index.php?action=deletePost&&id=<?= $post->id() ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');"><i style="font-size:18px" class="fa">&#xf088;</i> Supprimer</a>
                            </button>
                        </div>
                    <?php }; ?>
                </div>
            </div>
<?php
$content = ob_get_clean();
$title = "Jean Forteroche - Administration";
require('view/backend/template.php');
?>