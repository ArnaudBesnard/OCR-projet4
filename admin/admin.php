<?php
//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include '../class/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();
?>

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

<?php include('../template/header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <nav class="menuAdmin">
                <ul class="nav flex-column">
                    <li><a href="../index.php">Revenir au blog</a></li>
                    <span>Gestion articles</span>
                    <li><a href="admin.php?page=ajout">Ajout d'un billet</a></li>
                    <li><a href="admin.php?page=gestion">Gestion des billets</a></li><br />
                    <span>Gestion utilisateurs</span>
                    <li><a href="admin.php?page=createUser">Ajouter un utilisateur</a> </li>
                    <li><a href="admin.php?page=viewUser">Voir les utilisateurs</a> </li>
                </ul>
            </nav>
        </div>
        <div class="col-8">
            <?php
            if (empty($_GET)) {
                include('postManager.php');
            }
            elseif ($_GET['page'] === "ajout"){
                include('formAddPost.php');
            }
            elseif ($_GET['page'] === "dataEdit") {
                include('editPost.php');
            }
            elseif ($_GET['page'] === "supp") {
                include('deletePost.php');
            }
            elseif ($_GET['page'] === "gestion") {
                include('postManager.php');
            }
            elseif ($_GET['page'] === "createUser") {
                include('formAddUser.php');
            }
            elseif ($_GET['page'] === "viewUser") {
                include('viewUser.php');
            }
            else {
                include('../default.php');
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
