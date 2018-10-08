<?php
ob_start();
?>
    <div class="col-lg-12">
        <center>
            <h1>ERREUR 404</h1>
            <h2>La page demandée n'a pas été trouvée !</h2>
        </center>
    </div>
<?php
$content = ob_get_clean();
$title = "Page 404 Erreur";
require('view/frontend/template.php');