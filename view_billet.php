<?php
require("Article.classe.php");

$request = $bdd->query('select * FROM billet order by id ASC') or die(print_r($bdd->errorInfo()));
    while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
    {
        $billet = new article($donnees);
        $billet->hydrate($donnees);
?>
 <h1><?php echo ('id n°'.$billet->id(). ' - ' .$billet->titre()); ?></h1>
    <div class='date_billet'><?php echo $billet->maDate(); ?></div>
    <div class='contenu'><?php echo $billet->contenu(); ?></div>
    <div class='auteur'><?php echo $billet ->auteur(); ?></div>

<?php }  $request->closeCursor(); ?>