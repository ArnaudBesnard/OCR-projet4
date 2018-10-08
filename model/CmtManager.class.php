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
        $db->exec('DELETE FROM comments WHERE id = ' . $id);
    }
//Get Status method
    public function getStatus($status)
    {
        $db = $this->dbconnect();
        $comments = [];
        $request = $db->query('select * from comments WHERE  statut =' . $status) or die(print_r($db->errorInfo()));
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
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
        $request = $db->query('select * from comments WHERE postId =' . $id . ' && statut = 1 ORDER BY posted DESC') or die(print_r($db>errorInfo()));
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
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
        $req = $db->query('UPDATE comments SET statut = 1 WHERE id =' .$id);
    }
//Report comment method
    public function reporting($id)
    {
        $db = $this->dbconnect();
        $req = $db->query('UPDATE comments SET reporting = 1 WHERE id =' .$id);
    }
// Cancel Report method
    public function cancelReport($id)
    {
        $db = $this->dbconnect();
        $req = $db->query('UPDATE comments SET reporting = 0 WHERE id =' .$id);
    }
// Get reporting method
    public function getReporting($reporting)
    {
        $db = $this->dbconnect();
        $comments = [];
        $request = $db->query('select * from comments WHERE  reporting =' . $reporting) or die(print_r($bdd->errorInfo()));
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
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
        $request = $db->query('SELECT COUNT(*) AS statut FROM comments WHERE statut = 0') or die(print_r($bdd->errorInfo()));
        $data = $request->fetch(PDO::FETCH_ASSOC);
        $count = $data['statut'];
        return $count;
    }
// Count reporting comment method
    public function countReporting()
    {
        $db = $this->dbconnect();
        $request = $db->query('SELECT COUNT(*) AS reporting FROM comments WHERE reporting = 1') or die(print_r($bdd->errorInfo()));
        $data = $request->fetch(PDO::FETCH_ASSOC);
        $count = $data['reporting'];
        return $count;
    }
}