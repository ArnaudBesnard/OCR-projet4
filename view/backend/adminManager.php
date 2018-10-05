<?php
ob_start();
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include('public/template/adminNav.php'); ?>
            </div>
            <div class="col-8">
                <div class="articles">
                    <h2>Gestion des chapitres</h2>
                    <?php
                    foreach ($posts as $post) {
                        ?>
                        <h1><?= $post->titre(); ?></h1>
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
        </div>
    </div>
<?php } else {
    header("Refresh: 2; URL=index.php");
    echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
    exit;
}
$content = ob_get_clean();
$title = "Jean Forteroche - Administration";
require('view/template.php');
?>