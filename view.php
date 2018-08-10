<?php
$reponse = $bdd->query('SELECT * FROM billet');
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <nav>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="edit_billet.php">Editer un billet</a></li>
                        <li><a href="add_billet.php">Ajouter un billet</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-10">
                <?php
                while ($donnees = $reponse->fetch())
                { ?>
                    <h1>
                        <?php echo($donnees['titre']); ?>
                    </h1>
                    <div class='date_billet'>
                        <?php echo($donnees['date']); ?> </div>
                    <div class='contenu'>
                        <?php echo($donnees['contenu']); ?>
                    </div>
                    <div class='auteur'>
                        <?php echo($donnees['auteur']); ?>
                    </div>
                    <button type="button" class="btn btn-warning">Editer</button>
                    <button type="button" class="btn btn-danger">Supprimer</button>

                    <?php } ?>
            </div>
        </div>
    </div>
