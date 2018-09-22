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

    public function getStatus($status)
    {
        $comments = [];
        $request = $this->_bdd->query('select * from comments WHERE  statut =' . $status) or die(print_r($bdd->errorInfo()));
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Cmt();
            $comment->hydrate($donnees);
            array_push($comments, $comment);
        }
        return $comments;
    }

    public function getlist($id, $statut)
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

    public function valid($id)
    {
        $req = $this->_bdd->query('UPDATE comments SET statut = 1 WHERE id =' .$id);
    }

    public function reporting($id)
    {
        $req = $this->_bdd->query('UPDATE comments SET reporting = 1 WHERE id =' .$id);
    }

    public function cancelReport($id)
    {
        $req = $this->_bdd->query('UPDATE comments SET reporting = 0 WHERE id =' .$id);
    }

    public function getReporting($reporting)
    {
        $comments = [];
        $request = $this->_bdd->query('select * from comments WHERE  reporting =' . $reporting) or die(print_r($bdd->errorInfo()));
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Cmt();
            $comment->hydrate($donnees);
            array_push($comments, $comment);
        }
        return $comments;
    }

    public function countComment()
    {
        $request = $this->_bdd->query('SELECT COUNT(*) AS statut FROM comments WHERE statut = 0') or die(print_r($bdd->errorInfo()));
        $data = $request->fetch(PDO::FETCH_ASSOC);
        $count = $data['statut'];
        return $count;
    }

    public function countReporting()
    {
        $request = $this->_bdd->query('SELECT COUNT(*) AS reporting FROM comments WHERE reporting = 1') or die(print_r($bdd->errorInfo()));
        $data = $request->fetch(PDO::FETCH_ASSOC);
        $count = $data['reporting'];
        return $count;
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}