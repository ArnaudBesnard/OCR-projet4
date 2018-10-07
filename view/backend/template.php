<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $title ?>
        </title><link rel="icon" type="image/png" href="public/img/livre.ico.png"/>
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="public/js/validRegister.js"></script>
    </head>
    <body>
       <?php require('public/template/header.php'); ?>
       <div class="container-fluid">
           <div class="row">
               <?= $content ?>
           </div>
       </div>
       <?php require('public/template/footer.html'); ?>
    </body>
</html>