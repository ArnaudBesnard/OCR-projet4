<?php
    //Création de la classe article
    class article {
    
        private $_id = 14;
        private $_titre;
        private $_contenu;
        private $_auteur;
        private $date;
    
        public function viewArticle(){
            // Méthode pour consulter un article
            return('Article affiché avec l\'id : ' .$this->_id. '<br />');
        }
        public function insertArticle(){
            // Méthode ajout d'un article
            return('Article ajouté avec l\'id : ' .$this->_id. '<br />');
        }
        public function editArticle(){
            // Méthode édition d'un article 
            return('Article édité avec l\'id : '.$this->_id. '<br />');
        }
        public function deleteArticle(){
            // M"thode suppression d'un article
            return('Article supprimé avec l\'id : '.$this->_id. '<br />');
        }
    }

    //Création de l'objet viewBillet
    $viewBillet = new article;
    echo($viewBillet->viewArticle());
    //Création de l'objet addBillet
    $insertBillet = new article;
    echo($insertBillet->insertArticle());

    //Création de l'objet editBillet
    $editBillet = new article;
    echo($editBillet->editArticle());

    //Création de l'objet deleteBillet
    $deleteBillet = new article;
    echo($deleteBillet->deleteArticle());

                
