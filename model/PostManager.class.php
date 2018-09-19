<?php

class PostManager
{

    protected $_bdd;

    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }
    // Méthode d'ajout de post
    public function add(Post $billet)
    {
        $req = $this->_bdd->prepare('INSERT INTO posts(titre, contenu, dateAjout, auteur) VALUES(:titre, :contenu, :dateAjout, :auteur)');
        $req->bindValue(':titre', $billet->titre());
        $req->bindValue(':contenu', $billet->contenu());
        $req->bindValue(':dateAjout', $billet->dateAjout());
        $req->bindValue(':auteur', $billet->auteur());
        $req->execute();
    }
    // Méthode de suppression de post
    public function delete($id)
    {
        $this->_bdd->exec('DELETE FROM posts WHERE id = ' . $id);
    }
    // Méthode de sélection de post par Id
    public function get($id)
    {
        $request = $this->_bdd->query('select * from posts WHERE id = ' . $id) or die(print_r($bdd->errorInfo()));
        $donnees = $request->fetch(PDO::FETCH_ASSOC);
        $post = new Post();
        $post->hydrate($donnees);
        return $post;
    }
    // Méthode d'affichage de tous les posts
    public function getList()
    {
        $posts = [];
        $request = $this->_bdd->query('select * from posts order by id ASC ') or die(print_r($bdd->errorInfo()));
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post();
            $post->hydrate($donnees);
            array_push($posts, $post);
        }
        return $posts;
    }
    // Méthode d'update des posts
    public function update(Post $billet)
    {
        $req = $this->_bdd->prepare('UPDATE posts SET titre = :titre, contenu = :contenu, dateAjout = :dateAjout, auteur = :auteur WHERE id = :id');
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