<?php

class Cmt {
    protected $_id;
    protected $_postId;
    protected $_statut;
    protected $_title;
    protected $_comment;
    protected $_author;
    protected $_posted;

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
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
    public function postId()
    {
        return $this->_postId;
    }
    public function statut()
    {
        return $this->_statut;
    }
    public function title()
    {
        return $this->_title;
    }
    public function comment()
    {
        return $this->_comment;
    }
    public function author()
    {
        return $this->_author;
    }
    public function posted()
    {
        return $this->_posted;
    }

    //Setter
    public function setId($id)
    {
        if ((int)$id)
        {
            $this->_id = $id;
        }
    }
    public function setPostId($postId)
    {
        if ((int)$postId)
        {
            $this->_postId = $postId;
        }
    }
    public function setStatut($statut)
    {
        if ((int)$statut)
        {
            $this->_statut = $statut;
        }
    }
    public function setTitle($title)
    {
        if (is_string($title))
        {
            $this->_title = $title;
        }
    }
    public function setComment($comment)
    {
        if (is_string($comment))
        {
            $this->_comment = $comment;
        }
    }
    public function setAuthor($author)
    {
        if (is_string($author))
        {
            $this->_author = $author;
        }
    }
    public function setPosted($posted)
    {
        if (is_string($posted))
        {
            $this->_posted = $posted;
        }
    }
}