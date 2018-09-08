<?php

class PostManager
{

    protected $_bdd;

    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    public function add(Post $billet)
    {
        $req = $this->_bdd->prepare('INSERT INTO billet(titre, contenu, dateAjout, auteur) VALUES(:titre, :contenu, :dateAjout, :auteur)');
        $req->bindValue(':titre', $billet->titre());
        $req->bindValue(':contenu', $billet->contenu());
        $req->bindValue(':dateAjout', $billet->dateAjout());
        $req->bindValue(':auteur', $billet->auteur());
        $req->execute();
    }


    public function delete($id)
    {
        $this->_bdd->exec('DELETE FROM billet WHERE id = ' . $id);
    }

    public function get($id)
    {
        $id = (int)$id;
        $req = $this->_bdd->query('SELECT id, titre, contenu, dateAjout, auteur FROM billet WHERE id = ' . $id);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Article($donnees);
    }

    public function getlist()
    {
        //$billet[];
        $req = $this->_bdd->query('SELECT * FROM billet ORDER BY titre ASC');
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {

            $billet = new Article($donnees);
            $billet->hydrate($donnees);
            return $billet;
        }
    }

    public function update(Post $billet)
    {
        $req = $this->_bdd->prepare('UPDATE billet SET titre = :titre, contenu = :contenu, dateAjout = :dateAjout, auteur = :auteur WHERE id = :id');

        $req->bindValue(':id', $billet->id());
        $req->bindValue(':titre', $billet->titre());
        $req->bindValue(':contenu', $billet->contenu());
        $req->bindValue(':dateAjout', $billet->dateAjout());
        $req->bindValue(':auteur', $billet->auteur());
        $req->execute();
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}