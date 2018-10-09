<?php $manager = new CmtManager($bdd); ?>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=x033aj159s617dv6p04ex8cf9h6t37eytyjtfami5oah5xsg"></script>
<script>tinymce.init({selector: 'textarea'});</script>

<header>
    <div class="navNormal">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top ">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <a class="navbar-brand" href="#"><img src="public/img/avion.png" alt="Avion sur la bannière"/></a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"> <a class="nav-link" href="index.php"><i style="font-size:16px" class="fa">&#xf015;</i>Accueil</a></li>
                    <?php if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) { ?>
                        <li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'><i style='font-size:16px' class='fa'>&#xf1fe;</i> Administration</a>
                            <div class='dropdown-menu'>
                                    <span class="titre_nav_admin">Gestion des articles</span>
                                    <a class='dropdown-item' href="index.php?action=formAddPost"><i style="font-size:18px" class="fa">&#xf055;</i> Ajout d'un billet</a>
                                    <a class='dropdown-item' href="index.php?action=administration"><i style="font-size:18px" class="fa">&#xf0ad;</i> Gestion des billets</a>
                                    <div class="dropdown-divider"></div>
                                    <span class="titre_nav_admin">Gestion des utilisateurs</span>
                                    <a class='dropdown-item' href="index.php?action=createUser"><i style="font-size:18px" class="fa">&#xf234;</i> Ajouter un utilisateur</a>
                                    <div class="dropdown-divider"></div>
                                    <span class="titre_nav_admin">Gestion des commentaires</span>
                                    <a class='dropdown-item' href="index.php?action=adminComment"><i style="font-size:18px" class="fa">&#xf00c;</i> Validation (<?= $manager->countComment() ?>)</a>
                                    <a class='dropdown-item' href="index.php?action=viewReport"><i style="font-size:18px" class="fa">&#xf0f3;</i> Modéreration (<?= $manager->countReporting() ?>)</a>
                            </div>
                        </li>
                    <?php }
                    elseif (isset($_SESSION['login']) && ($_SESSION['role'] == 'Contributeur')) { ?>
                        <li class="nav-item"> <a class="nav-link" href="index.php?action=formAddPost"><i style="font-size:16px" class="fa">&#xf055;</i> Ajouter un chapitre</a></li>
                    <?php }
                    ?>
                </ul>
            </div>
            <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="index.php">Jean Forteroche - Un billet simple pour l'Alaska</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php if (empty($_SESSION['login'])) { ?>
                        <a class='nav-link' href='index.php?action=connect'><i style='font-size:16px' class='fa'>&#xf090;</i> Se connecter</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='index.php?action=register'><i style='font-size:16px' class='fa'>&#xf007;</i> S'enregistrer</a>
                    </li>
                    <?php } else { ?>
                    <li class='nav-item'><a class='nav-link'><i style='font-size:16px' class='fa'>&#xf007;</i> Bienvenue <?= $_SESSION['login']?></a></li>
                    <li class='nav-item'>
                        <a class='nav-link' href='index.php?action=deconnexion'><i style='font-size:16px' class='fa'>&#xf08b;</i> Déconnexion</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!--Début navbar responsive-->

    <div class="navResponsive">
        <nav class="navbar navbar-dark bg-dark indigo darken-2 fixed-top">
            <a class="navbar-brand" href="index.php"><img id="AvionHeader" src="public/img/avion.png" alt="Avion sur la bannière"/></a>
            <a class="navbar-brand" href="#">Billet pour l'Alaska</a>
            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text">
                    <i class="fa fa-bars fa-1x"></i></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i style="font-size:16px" class="fa">&#xf015;</i> Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Administrateur')) { ?>
                        <li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'><i style='font-size:16px' class='fa'>&#xf1fe;</i> Administration</a>
                            <div class='dropdown-menu'>
                                <span class="titre_nav_admin">Gestion des articles</span>
                                <a class='dropdown-item' href="index.php?action=formAddPost"><i style="font-size:18px" class="fa">&#xf055;</i> Ajout d'un billet</a>
                                <a class='dropdown-item' href="index.php?action=administration"><i style="font-size:18px" class="fa">&#xf0ad;</i> Gestion des billets</a>
                                <div class="dropdown-divider"></div>
                                <span class="titre_nav_admin">Gestion des utilisateurs</span>
                                <a class='dropdown-item' href="index.php?action=createUser"><i style="font-size:18px" class="fa">&#xf234;</i> Ajouter un utilisateur</a>
                                <div class="dropdown-divider"></div>
                                <span class="titre_nav_admin">Gestion des commentaires</span>
                                <a class='dropdown-item' href="index.php?action=adminComment"><i style="font-size:18px" class="fa">&#xf00c;</i> Validation (<?=$manager->countComment()?>)</a>
                                <a class='dropdown-item' href="index.php?action=viewReport"><i style="font-size:18px" class="fa">&#xf0f3;</i> Modéreration (<?=$manager->countReporting()?>)</a>
                            </div>
                        </li>
                    <?php }
                    elseif (isset($_SESSION['login']) && ($_SESSION['role'] == 'Contributeur')) { ?>
                        <li class="nav-item"> <a class="nav-link" href="index.php?action=formAddPost"><i style="font-size:16px" class="fa">&#xf055;</i> Ajouter un chapitre</a></li>
                    <?php }
                    ?>
                    <li class="nav-item">
                        <?php if (empty($_SESSION['login'])) { ?>
                        <a class='nav-link' href='index.php?action=connect'><i style='font-size:16px' class='fa'>&#xf090;</i> Se connecter</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='index.php?action=register'><i style='font-size:16px' class='fa'>&#xf007;</i> S'enregistrer</a>
                    </li>
                    <?php  } else { ?>
                    <li class='nav-item'><a class='nav-link'><i style='font-size:16px' class='fa'>&#xf007;</i> Bienvenue <?= $_SESSION['login'] ?></a></li>
                    <li class='nav-item'>
                        <a class='nav-link' href='index.php?action=deconnexion'><i style='font-size:16px' class='fa'>&#xf08b;</i> Déconnexion</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!--Fin navbar responsive-->
    <div class="travel_train">
        <div class="titre_img">"Un voyage au bout du monde."</div>
    </div>
</header>