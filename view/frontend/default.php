<?php
session_start();
$title = "Page 404 Erreur";
ob_start();
?>
<center>
    <h1>ERREUR 404</h1>
    <h2>La page demandée n'a pas été trouvée !</h2>
</center>

<?php
$content = ob_get_clean();
require('template.php');