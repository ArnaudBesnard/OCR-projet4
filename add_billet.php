<?php
require('_connect/connect.php');
$req = $bdd->prepare('INSERT INTO billet(titre, contenu, date, auteur) VALUES(:titre, :contenu, :date, :auteur)');

$req->execute(array(
    ':titre' => ($_POST['titre_chapitre']),
    ':contenu' => $_POST['contenu'],
    ':date' => $_POST['date'],
    ':auteur' => $_POST['auteur']
));
 
echo('Données ajoutées ! Bravo');

?>
<br /><br /><a href="index.php">Retour à la page précédente</a>