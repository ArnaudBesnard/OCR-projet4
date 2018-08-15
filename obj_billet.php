//Création de l'objet billet
<?php

class billet {
    private $_titre;
    private $_contenu;
    private $_auteur;
    private $date;
    
    public function view_billet(){
        echo('Affichage du billet');
    }
    public function edit_billet(){
        echo('<br />Edition du billet');
    }
    public function delete_billet(){
        echo('<br />Affichage du billet');
    }
}




$monBillet = new billet;

$monBillet->view_billet();
$monBillet->edit_billet();
$monBillet->delete_billet();
?>
