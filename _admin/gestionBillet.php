                <?php
                $request = $bdd->query('select * from billet order by id ASC ') or die(print_r($bdd->errorInfo()));
                while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
                {
                    $billet = new Article($donnees);
                    $billet->hydrate($donnees);
                    ?>
                    <h1>
                        <?= $billet->titre(); ?>
                    </h1>
                    <div class='date_billet'>
                        Id n°<?=$billet->id(); ?> - Ajouté le :  <?= $billet->dateAjout(); ?>
                    </div>
                    <div class='contenu'>
                        <?= $billet->contenu(); ?>
                    </div>
                    <div class='auteur'>
                        <?= $billet->auteur(); ?>
                    </div>
                    <div class="btnGestion"><button type="button" class="btn btn-success" ><a href="admin.php?page=dataEdit&&id=<?=$billet->id() ?>">Editer</a></button><button type="button" class="btn btn-danger"><a href="admin.php?page=supp&&id=<?=$billet->id() ?>">Supprimer</a></button></div>
                <?php }; ?>
