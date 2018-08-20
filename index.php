<?php require('_connect/connect.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Jean Forteroche - Alaska</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
    
<body>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</body>

    <?php include('template/header.html'); ?>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <?php include('template/nav_left.html'); ?>
        </div>
        <div class="col-8">
            <?php include('view_billet.php'); ?>
        </div>
        <div class="col-2">
            <?php include('template/nav_right.html'); ?>
        </div>
    </div>
</div>
<div class="container-fluid">
            <?php include('template/footer.html'); ?>
</div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</html>
