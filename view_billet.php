<?php
$reponse = $bdd->query('SELECT * FROM billet ORDER BY id DESC LIMIT 0,10') or die(print_r($bdd->errorInfo()));

                while ($donnees = $reponse->fetch()) { 
$dataId = $donnees['id']; ?>
  
<h1>
        <?php echo($donnees['titre']); ?>

    </h1>
    <div class='date_billet'>
        <?php echo($donnees['date']); ?>
    </div>
    <div class='contenu'>
        <?php echo($donnees['contenu']); ?>
    </div>
    <div class='auteur'>
        <?php echo($donnees['auteur']); ?>
    </div>
    <button type="button" class="btn btn-warning">Editer</button>
    <button type="button" class="btn btn-danger">Supprimer</button>

    <?php }  $reponse->closeCursor(); ?>
