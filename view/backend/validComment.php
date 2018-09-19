<?php

session_start();

$title = "Jean Forteroche - Un billet simple pour l'Alaska";
ob_start();
if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
    $dateCreate = date("Y-m-d");
    $action = "#";
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include('public/template/adminNav.html'); ?>
            </div>
            <div class="col-8">
                <div class="articles">
                    <h2>Valider les commentaires :</h2>
                    <div class="form_billet">
                        <?php
                        $request = $bdd->query('select * from comments WHERE statut = 0 ORDER BY id ASC') or die(print_r($bdd->errorInfo()));
                        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
                            $comments = new Cmt();
                            $comments->hydrate($donnees); ?>
                            <div class="comment">
                                <form action="view/backend/runValidComment.php" method="post">
                                    <?php echo("<div class='titreComment'>" . $comments->title() . "</div><div class='contenuComment'>" . $comments->comment() . "</div><div class='commentAuthor'>" . $comments->author() . "</div>"); ?>
                                    <label>Validation :</label><br/>
                                    <select name="statut">
                                        <option>0</option>
                                        <option>1</option>
                                    </select>
                                    <div class="buttonValidComment">
                                        <button type="submit" class="btn btn-primary">Valider</button>
                                    </div>
                                </form>
                            </div>
                        <?php }; ?>
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