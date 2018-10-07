<?php
    //Création de la classe Post
    class Post {
    
        protected $_id;
        protected $_titre;
        protected $_contenu;
        protected $_dateAjout;
        protected $_auteur;
        protected $_postImg;

        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value)
            {
                // On récupère le nom du setter correspondant à l'attribut.
                $method = 'set'.ucfirst($key);
        
                // Si le setter correspondant existe.
                if (method_exists($this, $method))
                {
                    // On appelle le setter.
                    $this->$method($value);
                }
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
        public function dateAjout()
        {
            return $this->_dateAjout;
        }
        public function postImg()
        {
            return $this->_postImg;
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
        
        public function setDateAjout($dateAjout)
        {
            if (is_string($dateAjout))
            {
            $this->_dateAjout = $dateAjout;
            }
        }
        /*public function setDateAjout($dateAjout)
        {
            $brutDate  = $dateAjout;
            $date = DateTime::createFromFormat('Y-m-d', $brutDate);
            if ($date)
            {
                $this->_dateAjout = $date->format('d/m/Y');
            }
        }*/
        
        public function setAuteur($auteur)
        {
            if (is_string($auteur))
            {
                $this->_auteur = $auteur;
            }
        }
        public function setPostImg($postImg)
        {
                $this->_postImg = $postImg;
        }
        
    }
