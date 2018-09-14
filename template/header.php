<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=x033aj159s617dv6p04ex8cf9h6t37eytyjtfami5oah5xsg"></script>
<script>tinymce.init({selector: 'textarea'});</script>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <a class="navbar-brand" href="#"><img src="http://localhost/ocr-projet4/template/img/avion.png"/></a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/ocr-projet4/index.php"><i style="font-size:16px" class="fa">&#xf015;</i> Accueil</a>
                </li>

                  <?php  if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')){
                   echo("<li class='nav-item'><a class='nav-link' href='http://localhost/ocr-projet4/admin/admin.php'><i style='font-size:16px' class='fa'>&#xf1fe;</i> Administration</a></li>");
                   }?>

            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="index.php">Jean Forteroche - Un billet simple pour l'alaska</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php if (empty($_SESSION['login'])) {
                        echo("<a class='nav-link' href='http://localhost/ocr-projet4/index.php?page=connection'><i style='font-size:16px' class='fa'>&#xf090;</i> Se connecter</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='http://localhost/ocr-projet4/index.php?page=register'><i style='font-size:16px' class='fa'>&#xf007;</i> S'enregistrer</a>
                </li>");
                    } else {
                        echo ("<li class='nav-item'><a class='nav-link'><i style='font-size:16px' class='fa'>&#xf007;</i> Bienvenue ".$_SESSION['login']."</a></li>
                <li class='nav-item'>
                    <a class='nav-link' href='deconnect.php'><i style='font-size:16px' class='fa'>&#xf08b;</i> Déconnexion</a>");
                    } ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
