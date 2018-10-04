<?php

class PostManager extends Database
{

    // Méthode d'ajout de post
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

    // Méthode de suppression de post
    public function delete($id)
    {
        $db = $this->dbconnect();
        $db->exec('DELETE FROM posts WHERE id = ' . $id);
    }
    // Méthode de sélection de post par Id
    public function get($id)
    {
        $db = $this->dbconnect();
        $request = $db->query('select * from posts WHERE id = ' . $id) or die(print_r($db->errorInfo()));
        $donnees = $request->fetch(PDO::FETCH_ASSOC);
        $post = new Post();
        $post->hydrate($donnees);
        return $post;
    }
    // Méthode d'affichage de tous les posts
    public function getList()
    {
        $db = $this->dbconnect();
        $posts = [];
        $request = $db->query('select * from posts order by id ASC ') or die(print_r($db->errorInfo()));
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
        $db = $this->dbconnect();
        $req = $db->prepare('UPDATE posts SET titre = :titre, contenu = :contenu, dateAjout = :dateAjout, auteur = :auteur, postImg = :postImg WHERE id = :id');
        $req->bindValue(':id', $billet->id());
        $req->bindValue(':titre', $billet->titre());
        $req->bindValue(':contenu', $billet->contenu());
        $req->bindValue(':dateAjout', $billet->dateAjout());
        $req->bindValue(':auteur', $billet->auteur());
        $req->bindvalue(':postImg', $_FILES['postImage']['name']);
        $req->execute();
    }
}