<?php
//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include '../class/' .$classe. '.class.php';
});

$db= new Database();
$bdd = $db->getConnection();
$reponse = $bdd->query('SELECT titre FROM billet ORDER BY id ASC') or die(print_r($bdd->errorInfo()));
?>

<form action="admin.php?page=dataEdit" method="post">
    <select id="selectTitre" name="selectTitre">
        <?php 
            while ($donnees = $reponse->fetch()) {
                foreach($donnees as $chapitre);
                    echo('<option>'.$chapitre);
            }
        ?>
    </select>
    <button>Envoyer</button>
</form>
