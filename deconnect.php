<?php
$title = "Page de déconnexion";
ob_start();

session_start();
session_unset();
session_destroy();
echo '<br /><center>Déconnexion en cours !</center>';
header("Refresh: 3; URL=index.php" );

$content = ob_get_clean();
require('template.php');