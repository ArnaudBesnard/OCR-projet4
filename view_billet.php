<?php
    $reponse = $bdd->query('SELECT * FROM billet ORDER BY id ASC') or die(print_r($bdd->errorInfo()));
        while ($donnees = $reponse->fetch()) { 
            $dataId = $donnees['id']; 
?>
    <h1><?php echo($donnees['titre']); ?></h1>
    <div class='date_billet'><?php echo($donnees['date']); ?></div>
    <div class='contenu'><?php echo($donnees['contenu']); ?></div>
    <div class='auteur'><?php echo($donnees['auteur']); ?></div>

<?php }  $reponse->closeCursor(); ?>
