<?php

class userManager
{
    protected $_bdd;

    public function __construct($bdd)
    {
        $this->setBdd($bdd);
    }

    public function add(User $user)
    {
        $req = $this->_bdd->prepare('INSERT INTO users(nickname, lastname, firstname, email, password, createDate, role) VALUES(:nickname, :lastname, :firstname, :email, :password, :createDate, :role)');
        $req->bindValue(':nickname', $user->nickname());
        $req->bindValue(':lastname', $user->lastname());
        $req->bindValue(':firstname', $user->firstname());
        $req->bindValue(':email', $user->email());
        $req->bindValue(':password', $user->password());
        $req->bindValue(':createDate', $user->createDate());
        $req->bindValue(':role', $user->role());
        $req->execute();
    }


    public function delete($id)
    {
        $this->_bdd->exec('DELETE FROM users WHERE id = ' . $id);
    }

    public function get($id)
    {
        $id = (int)$id;
        $req = $this->_bdd->query('SELECT nickname, lastname, firstname, email, password, createDate, role FROM users WHERE id = ' . $id);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new User($donnees);
    }

    /**
     * @return array|Article
     */
    public function getlist()
    {
        //$billet[];
        $req = $this->_bdd->query('SELECT * FROM users ORDER BY nickname ASC');
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {

            $user = new User($donnees);
            $billet->hydrate($donnees);
            return $user;
        }
    }

    public function update(User $user)
    {
        $req = $this->_bdd->prepare('UPDATE users SET nickname = :nickname, lastname = :lastname, firstname = :firstname, email = :email, password = :password, createDate = :createDate, role = :role WHERE id = :id');

        $req->bindValue(':id', $user->id());
        $req->bindValue(':nickname', $user->nickname());
        $req->bindValue(':lastname', $user->lastname());
        $req->bindValue(':firstname', $user->firstname());
        $req->bindValue(':email', $user->email());
        $req->bindValue(':password', $user->password());
        $req->bindValue(':createDate', $user->createDate());
        $req->bindValue(':role', $user->role());
        $req->execute();
    }

    public function checkPassword()
    {
        // Créer vérification des mots de passe
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}