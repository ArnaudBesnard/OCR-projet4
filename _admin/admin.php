<?php require('../_connect/connect.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Administration</title>
</head>

<body>
    <!--Feuille de style générale et responsive-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
                    <li><a href="../index.php">Accueil</a></li>
                    <li><a href="#">Ajouter un billet</a></li>
                    <li><a href="#">Editer un billet</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-8">
            <div class="contenu_admin">
                <?php
                    include('../_admin/ajout_billet.php');
                ?>
            </div>
        </div>
        <div class="col-2">

        </div>
    </div>
</div>

</html>
