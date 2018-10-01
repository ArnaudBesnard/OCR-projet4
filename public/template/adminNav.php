<?php $manager = new CmtManager($bdd); ?>
<nav class="menuAdmin">
    <ul class="nav flex-column">
        <li><a href="index.php"><i style="font-size:18px" class="fa">&#xf112;</i> Revenir au blog</a></li>
        <span class="titre_nav_admin">Gestion des articles</span>
        <li><a href="index.php?action=formAddPost"><i style="font-size:18px" class="fa">&#xf055;</i> Ajout d'un billet</a></li>
        <li><a href="index.php?action=administration"><i style="font-size:18px" class="fa">&#xf0ad;</i> Gestion des billets</a></li>

        <span class="titre_nav_admin">Gestion des utilisateurs</span>
        <li><a href="index.php?action=createUser"><i style="font-size:18px" class="fa">&#xf234;</i> Ajouter un utilisateur</a></li>
        <span class="titre_nav_admin">Gestion des commentaires</span>
        <li><a href="index.php?page=adminComment"><i style="font-size:18px" class="fa">&#xf00c;</i> Validation (<?= $manager->countComment(); ?>)</a></li>
        <li><a href="index.php?page=viewReporting"><i style="font-size:18px" class="fa">&#xf0f3;</i> Modéreration (<?= $manager->countReporting(); ?>)</a></li>
    </ul>
</nav>