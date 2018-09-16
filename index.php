<?php

//Autoload de chargement des classes
spl_autoload_register(function ($classe) {
    include 'model/' . $classe . '.class.php';
});
$db = new Database;
$bdd = $db->getConnection();

//Frontend
            if (empty($_GET)) {
                include('view/frontend/indexView.php');
            } elseif ($_GET['page'] == "singlePost") {
                include('view/frontend/single.php');
            } elseif ($_GET['page'] == "connection") {
                include('view/frontend/userConnect.php');
            } elseif ($_GET['page'] == "register") {
                include('view/frontend/register.php');
            } elseif ($_GET['page'] == "deconnection") {
                include('view/frontend/deconnect.php');
            } elseif ($_GET['page'] == "verifUser") {
                include('view/frontend/verifUser.php');
            }
//Backend
            elseif ($_GET['page'] == "administration") {
                include('view/backend/adminManager.php');
            } elseif ($_GET['page'] == "viewUser") {
                include('view/backend/viewUser.php');
            } elseif ($_GET['page'] == "createUser") {
                include('view/backend/formAddUser.php');
            } elseif ($_GET['page'] == "addPost") {
                include('view/backend/formAddPost.php');
            } elseif ($_GET['page'] == "postEdit") {
                include('view/backend/editPost.php');
            } elseif ($_GET['page'] == "deletePost") {
                include('view/backend/deletePost.php');
            } else {
                include('view/frontend/default.php');
            }
        


