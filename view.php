<?php
$reponse = $bdd->query('SELECT * FROM billet');
while ($donnees = $reponse->fetch())
{
?>
    <div class="container">

        <h1>
            <?php echo($donnees['titre']); ?>
        </h1>
        <div class='date'>
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
