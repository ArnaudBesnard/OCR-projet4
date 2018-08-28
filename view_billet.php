<?php
//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include 'class/' .$classe. '.class.php';
});

$db= new Database();
$bdd = $db->getConnection();

$request = $bdd->query('select * FROM billet order by id ASC') or die(print_r($bdd->errorInfo()));
    while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
    {
        $billet = new Article($donnees);
        $billet->hydrate($donnees);
?>
 <h1><?php echo $billet->titre(); ?></h1>
    <div class='date_billet'><?php echo $billet->dateAjout(); ?></div>
    <div class='contenu'><?php echo $billet->contenu(); ?></div>
    <div class='auteur'><?php echo $billet ->auteur(); ?></div>
    
<?php }  $request->closeCursor(); ?>

