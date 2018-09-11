<?php
session_start();
session_unset();
session_destroy();
echo 'Vous avez bien été déconnecté, à bientôt !';
header("Refresh: 3; URL=index.php" );