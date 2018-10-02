<?php
session_start();
//Autoload de chargement des classes
spl_autoload_register(function ($classe) {
    include 'model/' . $classe . '.class.php';
});
require('controller/frontend.php');
require('controller/backend.php');


if (isset($_GET['action'])) {

    //Posts
    if ($_GET['action'] == 'listPost') {
        getList();
    } elseif ($_GET['action'] == 'singlePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            getPost($_GET['id']);
        } else {
            echo("Erreur, aucun ID de billet envoyé");
            header("Refresh: 2; URL=index.php");
        }
    } elseif ($_GET['action'] == 'addComment') {
        addComment();
    } elseif ($_GET['action'] == 'reporting') {
        reporting();
    } elseif ($_GET['action'] == 'formAddPost') {
        formAddPost();
    } elseif ($_GET['action'] == 'addPost') {
        addPost();
    } elseif ($_GET['action'] == 'deletePost') {
        deletePost();
    } elseif ($_GET['action'] == 'editPost') {
        editPost();
    } //Users
    elseif ($_GET['action'] == 'connect') {
        connect();
    } elseif ($_GET['action'] == 'verifUser') {
        verifUser();
    } elseif ($_GET['action'] == 'deconnexion') {
        deconnexion();
    } elseif ($_GET['action'] == 'register') {
        register();
    } elseif ($_GET['action'] == 'addUser') {
        addUser();
    } elseif ($_GET['action'] == 'forgetPwd') {
        forgetPwd();
    } elseif ($_GET['action'] == 'resetPwd') {
        resetPwd();
    } elseif ($_GET['action'] == 'formPwd') {
        formPwd();
    } elseif ($_GET['action'] == 'updatePwd') {
        updatePwd();
    } //Administration
    elseif ($_GET['action'] == 'administration') {
        administration();
    } elseif ($_GET['action'] == 'createUser') {
        createUser();
    } elseif ($_GET['action'] == 'adminComment') {
        adminComment();
    } elseif ($_GET['action'] == 'validComment') {
        validComment();
    } elseif ($_GET['action'] == 'deleteComment') {
        deleteComment();
    } elseif ($_GET['action'] == 'viewReport') {
        viewReport();
    } elseif ($_GET['action'] == 'cancelReport') {
        cancelReport();
    } elseif ($_GET['action'] == 'deleteComment') {
        deleteComment();
    } elseif ($_GET['action'] == 'editPost') {
        editPost();
    } elseif ($_GET['action'] == 'updatePost') {
        updatePost();
    }
} else {
    getlist();
}
        


