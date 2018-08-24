<?php
    //Création de la classe article
    class article {
    
        private $_id;
        private $_titre;
        private $_contenu;
        private $_auteur;
        private $_maDate;
        
        //Hydratation de la classe
        public function hydrate(array $donnees)
        {
            if (isset($donnees['id']))
            {
                $this->setId($donnees['id']);
            }
            if (isset($donnees['titre']))
            {
                $this->setTitre($donnees['titre']);
            }
            if (isset($donnees['contenu']))
            {
                $this->setContenu($donnees['contenu']);
            }
            if (isset($donnees['auteur']))
            {
                $this->setAuteur($donnees['auteur']);
            }
            if (isset($donnees['date']))
            {
                $this->setmaDate($donnees['date']);
            }
        }
        
        //Getter
        public function id()
        {
            return $this->_id;
        }
        public function titre()
        {
            return $this->_titre;
            
        }
        public function contenu()
        {
            return $this->_contenu;
        }
        public function auteur()
        {
            return $this->_auteur;
        }
        public function maDate()
        {
            return $this->_maDate;
        }
        
        //Setter
        public function setId($id)
        {
            if ((int)$id)
            {
                $this->_id = $id;
            }
        }
        public function setTitre($titre)
        {
            if (is_string($titre))
            {
                $this->_titre = $titre;
            }
        }
        
        public function setContenu($contenu)
        {
            if (is_string($contenu))
            {
                $this->_contenu = $contenu;
            }
        }
        
        public function setAuteur($auteur)
        {
            if (is_string($auteur))
            {
                $this->_auteur = $auteur;
            }
        }
        
        public function setmaDate($maDate)
        {
            $this->_maDate = $maDate;
        }
    }