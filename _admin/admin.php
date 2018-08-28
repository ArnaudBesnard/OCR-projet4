<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Jean Forteroche - Alaska</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</body>

<?php include('../template/header.html'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <nav>
                <ul>
                    <li><a href="../index.php">Revenir au blog</a></li>
                    <li><a href="admin.php?page=ajout">Ajout d'un billet</a></li>
                    <li><a href="admin.php?page=edit">Edition d'un billet</a></li>
                    <li><a href="admin.php?page=supp">Suppression d'un billet</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-8">
            <?php 
                if (empty($_GET)) {
                    include('form_add_billet.php');
                }
                elseif ($_GET['page'] === "ajout"){
                    include('form_add_billet.php'); 
                    }
                elseif ($_GET['page'] === "edit") {
                   include('selectChapitre.php'); 
                }
                elseif ($_GET['page'] === "dataEdit") {
                   include('edit_billet.php'); 
                }
                elseif ($_GET['page'] === "supp") {
                    include('supp.php');
                }
                else {
                    include ('default.php');
                }
            ?>
        </div>
    </div>
</div>
<div class="container-fluid">
    <?php include('../template/footer.html'); ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</html>
