<?php
//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include 'class/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();

require('index_view.php');
        


