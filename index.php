<?php require('_connect/connect.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Jean Forteroche - Alaska</title>
</head>

<body>
    <!--Feuille de style générale-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--Feuille de style Bootstrap 4.1.3-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</body>

<header>
    <div class='titre'>Un billet simple pour l'Alaska</div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="_admin/admin.php">Administration</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-8">
            <?php
            include('view_billet.php'); 
            ?>
        </div>
        <div class="col-2">
            <ul>
                <li>Archive 1</li>
                <li>Archive 2</li>
                <li>Archive 3</li>
            </ul>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>
