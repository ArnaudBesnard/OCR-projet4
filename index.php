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
            echo("<center>Erreur, aucun ID de billet envoyé</center>");
            header("Refresh: 2; URL=index.php");
        }
    } elseif ($_GET['action'] == 'addComment') {
        addComment();
    } elseif ($_GET['action'] == 'reporting') {
        reporting();
    } //Users
    elseif ($_GET['action'] == 'connect') {
        if (!isset($_SESSION['login'])){
            connect();
        }
        else {
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous êtes déjà connecté !</center>');
            exit;
        }
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
    } elseif ($_GET['action'] == 'administration') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            administration();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'formAddPost') {
        if (isset($_SESSION['login']) && (($_SESSION['role'] == 'Administrateur') || ($_SESSION['role'] == 'Contributeur'))) {
            formAddPost();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'addPost') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            addPost();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'deletePost') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            deletePost();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'editPost') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            editPost();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'createUser') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            createUser();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'adminComment') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            adminComment();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'validComment') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            validComment();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'deleteComment') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            deleteComment();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'viewReport') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            viewReport();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'cancelReport') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            cancelReport();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'deleteComment') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            deleteComment();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'editPost') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            editPost();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'updatePost') {
        if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) {
            updatePost();
        }
        else{
            header("Refresh: 2; URL=index.php");
            echo('<center>Vous n\'êtes pas autorisé à accéder à cette partie du site</center>');
            exit;
        }
    } elseif ($_GET['action'] == 'mentionsLegales'){
        mentionsLegales();
    }
    else {
        getDefault();
    }
} else {
    getlist();
}