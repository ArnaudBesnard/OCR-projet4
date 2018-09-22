<?php
$id = $_GET['id'];
//Passer le statut du commentaire à 1
$manager = new CmtManager($bdd);
$manager->cancelReport($id);
echo '<br /><center>Le signalement a bien été supprimé </center>';
header("Refresh: 2; URL=index.php?page=adminComment");