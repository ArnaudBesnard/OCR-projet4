<?php

class CmtManager {
    protected $_bdd;

    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    public function add(Cmt $comment)
    {
        $req = $this->_bdd->prepare('INSERT INTO comments(postId, title, comment, author, posted) VALUES(:postId, :title, :comment, :author, :posted)');
        $req->bindValue(':postId', $comment->postId());
        $req->bindValue(':title', $comment->title());
        $req->bindValue(':comment', $comment->comment());
        $req->bindValue(':author', $comment->author());
        $req->bindValue(':posted', $comment->posted());
        $req->execute();
    }

    public function delete($id)
    {
        $this->_bdd->exec('DELETE FROM comments WHERE id = ' . $id);
    }

    public function get($id)
    {
        $id = (int)$id;
        $req = $this->_bdd->query('SELECT id, postId, statut, title, comment, author, posted FROM comments WHERE id = ' . $id);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Comment($donnees);
    }

    public function getlist($id)
    {
        $comments = [];
        $request = $this->_bdd->query('select * from comments WHERE postId =' . $id . ' && statut = 1') or die(print_r($bdd->errorInfo()));
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Cmt();
            $comment->hydrate($donnees);
            array_push($comments, $comment);
        }
        return $comments;
    }

    public function update(Comment $comment)
    {
        $req = $this->_bdd->prepare('UPDATE comments SET postId = :postId, statut = :statut, title = :title, comment = :comment, author = :author, posted = :posted WHERE id = :id');

        $req->bindValue(':postId', $comment->PostId());
        $req->bindValue(':statut', $comment->statut());
        $req->bindValue(':title', $comment->title());
        $req->bindValue(':comment', $comment->comment());
        $req->bindValue(':author', $comment->author());
        $req->bindValue('posted', $comment->posted());
        $req->execute();
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}