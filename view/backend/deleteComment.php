<?php
$id = $_GET['id'];
//Passer le statut du commentaire à 1
$manager = new CmtManager($bdd);
$manager->delete($id);
echo '<br /><center>Le commentaire a bien été supprimé </center>';
header("Refresh: 2; URL=index.php?page=adminComment");