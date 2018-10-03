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
                    <div>image associée : <a href="public/uploads/<?= $post->postImg() ; ?>" target="_blank"><?= $post->postImg() ; ?></a></div>

                        <div class="btnGestion">
                            <button type="button" class="btn btn-success"><a
                                        href="index.php?action=editPost&&id=<?= $post->id() ?>"><i style="font-size:18px" class="fa">&#xf0a4;</i> Editer</a>
                            </button>
                            <button type="button" class="btn btn-danger"><a
                                        href="index.php?action=deletePost&&id=<?= $post->id() ?>"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');"><i style="font-size:18px" class="fa">&#xf088;</i> Supprimer</a>
                            </button>
                        </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
    header("Refresh: 2; URL=index.php");
}
$content = ob_get_clean();
$title = "Jean Forteroche - Administration";
require('view/template.php');
?>