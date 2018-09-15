<?php

session_start ();
// On récupère nos variables de session
$title = "Jean Forteroche - Aperçu des utilisateurs";
ob_start();

//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include '../model/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <?php include('public/template/adminNav.html'); ?>
        </div>
        <div class="col-10">
            <div class="articles">
<?php
                $request = $bdd->query('select * from users order by login ASC ') or die(print_r($bdd->errorInfo()));
                while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
                {
                    $users = new user($donnees);
                    $users->hydrate($donnees);
                    echo ("<b>Pseudo :</b> ".$users->login(). " <b>- Mot de passe : </b>" .$users->password(). " <b>- Email : </b>" .$users->email()."<br />");


                 }; ?>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require('template.php');
?>