<?php
session_start();
// On récupère nos variables de session

$title = "Jean Forteroche - Administration";
ob_start();
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include('public/template/adminNav.html'); ?>
            </div>
            <div class="col-8">
                <div class="articles">
                    <?php
                    $request = $bdd->query('select * from billet order by id ASC ') or die(print_r($bdd->errorInfo()));
                    while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
                        $billet = new Post($donnees);
                        $billet->hydrate($donnees);
                        ?>
                        <h1> <?= $billet->titre(); ?></h1>
                        <div class='date_billet'>
                            Id n°<?= $billet->id(); ?> - Ajouté le : <?= $billet->dateAjout(); ?>
                        </div>
                        <div class='contenu'>
                            <?= $billet->contenu(); ?>
                        </div>
                        <div class='auteur'>
                            <?= $billet->auteur(); ?>
                        </div>
                        <div class="btnGestion">
                            <button type="button" class="btn btn-success"><a
                                        href="index.php?page=postEdit&&id=<?= $billet->id() ?>">Editer</a>
                            </button>
                            <button type="button" class="btn btn-danger"><a
                                        href="index.php?page=deletePost&&id=<?= $billet->id() ?>"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</a>
                            </button>
                        </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
require('template.php');
?>