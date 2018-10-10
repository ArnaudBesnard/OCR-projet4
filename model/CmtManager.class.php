<?php

class CmtManager extends Database
{
//Add Comment method
    public function add(Cmt $comment)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('INSERT INTO comments(postId, title, comment, author, posted) VALUES(:postId, :title, :comment, :author, :posted)');
        $req->bindValue(':postId', $comment->postId());
        $req->bindValue(':title', $comment->title());
        $req->bindValue(':comment', $comment->comment());
        $req->bindValue(':author', $comment->author());
        $req->bindValue(':posted', $comment->posted());
        $req->execute();
    }
//Delete Comment method
    public function delete($id)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
    }
//Get Status method
    public function getStatus($status)
    {
        $db = $this->dbconnect();
        $comments = [];
        $req = $db->prepare('select * from comments WHERE  statut = :status') or die(print_r($db->errorInfo()));
        $req->bindValue(':status', $status);
        $req->execute();
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Cmt();
            $comment->hydrate($donnees);
            array_push($comments, $comment);
        }
        return $comments;
    }
//Get list method
    public function getlist($id, $statut)
    {
        $db = $this->dbconnect();
        $comments = [];
        $req = $db->prepare('select * from comments WHERE postId = :id && statut = 1 ORDER BY posted DESC') or die(print_r($db>errorInfo()));
        $req->bindValue(':id', $id);
        $req->execute();
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Cmt();
            $comment->hydrate($donnees);
            array_push($comments, $comment);
        }
        return $comments;
    }
// Valid comment method
    public function valid($id)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('UPDATE comments SET statut = 1 WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
    }
//Report comment method
    public function reporting($id)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('UPDATE comments SET reporting = 1 WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
    }
// Cancel Report method
    public function cancelReport($id)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('UPDATE comments SET reporting = 0 WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
    }
// Get reporting method
    public function getReporting($reporting)
    {
        $db = $this->dbconnect();
        $comments = [];
        $req = $db->prepare('select * from comments WHERE  reporting = :reporting') or die(print_r($bdd->errorInfo()));
        $req->bindValue(':reporting', $reporting);
        $req->execute();
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Cmt();
            $comment->hydrate($donnees);
            array_push($comments, $comment);
        }
        return $comments;
    }
// Count comment method
    public function countComment()
    {
        $db = $this->dbconnect();
        $req = $db->prepare('SELECT COUNT(*) AS statut FROM comments WHERE statut = 0') or die(print_r($bdd->errorInfo()));
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $count = $data['statut'];
        return $count;
    }
// Count reporting comment method
    public function countReporting()
    {
        $db = $this->dbconnect();
        $req = $db->prepare('SELECT COUNT(*) AS reporting FROM comments WHERE reporting = 1') or die(print_r($bdd->errorInfo()));
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $count = $data['reporting'];
        return $count;
    }
}