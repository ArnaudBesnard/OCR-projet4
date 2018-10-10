<?php

class PostManager extends Database
{

    // Add Posts method
    public function add(Post $billet)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('INSERT INTO posts(titre, contenu, dateAjout, auteur, postImg) VALUES(:titre, :contenu, :dateAjout, :auteur, :postImg)');
        $req->bindValue(':titre', $billet->titre());
        $req->bindValue(':contenu', $billet->contenu());
        $req->bindValue(':dateAjout', $billet->dateAjout());
        $req->bindValue(':auteur', $billet->auteur());
        $req->bindValue(':postImg', $billet->postImg());
        $req->execute();
    }

    // Delete Post method
    public function delete($id)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
    }
    // select Post by ID method
    public function get($id)
    {
        $db = $this->dbconnect();
        $req= $db->prepare('select * from posts WHERE id = :id') or die(print_r($db->errorInfo()));
        $req->bindValue(':id', $id);
        $req->execute();
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        $post = new Post();
        $post->hydrate($donnees);
        return $post;
    }
    // View all posts method
    public function getList()
    {
        $db = $this->dbconnect();
        $posts = [];
        $req = $db->prepare('select * from posts order by id ASC ') or die(print_r($db->errorInfo()));
        $req->execute();
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post();
            $post->hydrate($donnees);
            array_push($posts, $post);
        }
        return $posts;
    }
    // Update Post method
    public function update(Post $billet)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('UPDATE posts SET titre = :titre, contenu = :contenu, dateAjout = :dateAjout, auteur = :auteur, postImg = :postImg WHERE id = :id');
        $req->bindValue(':id', $billet->id());
        $req->bindValue(':titre', $billet->titre());
        $req->bindValue(':contenu', $billet->contenu());
        $req->bindValue(':dateAjout', $billet->dateAjout());
        $req->bindValue(':auteur', $billet->auteur());
        $req->bindValue(':postImg', $billet->postImg());
        $req->execute();
    }
}