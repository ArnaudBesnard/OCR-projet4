<?php
session_start();
//Autoload de chargement des classes
spl_autoload_register(function ($classe) {
    include 'model/' . $classe . '.class.php';
});
require('controller/frontend.php');
require('controller/backend.php');
/*

//Frontend
            if (empty($_GET)) {
                include('view/frontend/listPostView.php');
            } elseif ($_GET['page'] == "singlePost") {
                include('view/frontend/singlePost.php');
            } elseif ($_GET['page'] == "connection") {
                include('view/frontend/connect.php');
            } elseif ($_GET['page'] == "register") {
                include('view/frontend/register.php');
            } elseif ($_GET['page'] == "deconnection") {
                include('view/frontend/deconnect.php');
            } elseif ($_GET['page'] == "verifUser") {
                include('view/frontend/verifUser.php');
            } elseif ($_GET['page'] == "reporting"){
                include('view/frontend/reporting.php');
            } elseif ($_GET['page'] == "addUser") {
                include('view/backend/addUser.php');
            } elseif ($_GET['page'] == "forgetPwd"){
                include('view/frontend/forgetPwd.php');
            } elseif ($_GET['page'] == "resetPwd") {
                include('view/frontend/sendMailPwd.php');
            } elseif ($_GET['page'] == "newPwd") {
                include('view/frontend/formPwd.php');
            } elseif ($_GET['page'] == "changePwd") {
                include('view/frontend/updatePwd.php');
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
            } elseif ($_GET['page'] == "runAddUser") {
                include('view/backend/addUser.php');
            } elseif ($_GET['page'] == "runAddPost") {
                include('view/backend/addPost.php');
            } elseif ($_GET['page'] == "postEdit") {
                include('view/backend/editPost.php');
            } elseif ($_GET['page'] == "updatePost") {
                include('view/backend/updatePost.php');
            } elseif ($_GET['page'] == "deletePost") {
                include('view/backend/deletePost.php');
            } elseif ($_GET['page'] == "addComment") {
                include('view/backend/addComment.php');
            } elseif ($_GET['page'] == "adminComment") {
                include('view/backend/adminComment.php');
            } elseif ($_GET['page'] == "validComment") {
                include('view/backend/validComment.php');
            } elseif ($_GET['page'] == "deleteComment") {
                include('view/backend/deleteComment.php');
            } elseif ($_GET['page'] == "viewReporting") {
                include('view/backend/viewReporting.php');
            } elseif ($_GET['page'] == "cancelReporting") {
                include ('view/backend/cancelReporting.php');
            } else {
                include('view/frontend/default.php');
            }*/

if (isset($_GET['action'])){
    //Posts
    if ($_GET['action'] == 'listPost'){
        getList();
    }
    elseif ($_GET['action'] == 'singlePost'){
        if (isset($_GET['id']) && $_GET['id'] > 0){
            getPost($_GET['id']);
        }
        else {
            echo("Erreur, aucun ID de billet envoyé");
            header("Refresh: 2; URL=index.php" );
        }
    }
    elseif ($_GET['action'] == 'addComment'){
        addComment();
    }
    elseif ($_GET['action'] == 'reporting'){
        reporting();
    }
    elseif ($_GET['action'] == 'formAddPost'){
        formAddPost();
    }
    elseif ($_GET['action'] == 'addPost'){
        addPost();
    }
    elseif ($_GET['action'] == 'deletePost'){
        deletePost();
    }
    elseif ($_GET['action'] == 'editPost'){
        editPost();
    }
    //Users
    elseif ($_GET['action'] == 'connect'){
        connect();
    }
    elseif ($_GET['action'] == 'verifUser'){
        verifUser();
    }
    elseif ($_GET['action'] == 'deconnexion'){
        deconnexion();
    }
    elseif ($_GET['action'] == 'register'){
        register();
    }
    elseif ($_GET['action'] == 'addUser'){
        addUser();
    }
    elseif ($_GET['action'] == 'forgetPwd'){
        forgetPwd();
    }
    elseif ($_GET['action'] == 'resetPwd'){
        resetPwd();
    }
    elseif ($_GET['action'] == 'formPwd'){
        formPwd();
    }
    elseif ($_GET['action'] == 'updatePwd'){
        updatePwd();
    }
    //Administration
    elseif ($_GET['action'] == 'administration'){
        administration();
    }
    elseif ($_GET['action'] == 'createUser'){
        createUser();
    }
}
else {
    getlist();
}
        


