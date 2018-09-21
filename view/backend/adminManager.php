<?php
session_start();

$title = "Jean Forteroche - Administration";
ob_start();
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include('public/template/adminNav.html'); ?>
            </div>
            <div class="col-8">
                <div class="articles">
                    <?php
                    $manager = new PostManager($bdd);
                    $posts = $manager->getList();
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

                        <div class="btnGestion">
                            <button type="button" class="btn btn-success"><a
                                        href="index.php?page=postEdit&&id=<?= $post->id() ?>">Editer</a>
                            </button>
                            <button type="button" class="btn btn-danger"><a
                                        href="index.php?page=deletePost&&id=<?= $post->id() ?>"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</a>
                            </button>
                        </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    header('Location: index.php?page=connection');
}

$content = ob_get_clean();
require('template.php');
?>