<?php
$reponse = $bdd->query('SELECT * FROM billet');
$donnees = $reponse->fetch();
?>

    <h1>
        <?php echo($donnees['titre']); ?>
    </h1>
    <div class='date'><?php echo($donnees['date']); ?> </div>
    <div class='contenu'>
        <?php echo($donnees['contenu']); ?>
    </div>
    <div class='auteur'><?php echo($donnees['auteur']); ?></div>
