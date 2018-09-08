<?php
//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include 'class/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();

            if (empty($_GET)) {
                include('indexView.php');
            }
            elseif ($_GET['page'] === "singlePost"){
                include('single.php');
            }
            else {
                include ('default.php');
            }
        


