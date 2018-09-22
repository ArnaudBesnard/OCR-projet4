<?php
$id = $_GET['id'];
$manager = new CmtManager($bdd);
$manager->reporting($id);
echo ('<br /><center>Le commentaire a bien été signalé ! Merci de votre aide. </center>');
header("Refresh: 2; URL=index.php");



