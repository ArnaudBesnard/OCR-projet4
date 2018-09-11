<?php
//Autoload de chargement des classes
spl_autoload_register(function($classe){
    include '../class/' .$classe. '.class.php';
});
$db= new Database;
$bdd = $db->getConnection();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
            <div class="articles">
<?php
                $request = $bdd->query('select * from users order by login ASC ') or die(print_r($bdd->errorInfo()));
                while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
                {
                    $users = new user($donnees);
                    $users->hydrate($donnees);
                    echo ("<b>Pseudo :</b> ".$users->login(). " <b>- Mot de passe : </b>" .$users->password(). " <b>- Email : </b>" .$users->email()."<br />");


                 }; ?>
            </div>
        </div>
    </div>
</div>
