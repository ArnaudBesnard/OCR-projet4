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
        $req = $this->_bdd->prepare('INSERT INTO users(login, lastname, firstname, email, password, createDate, role) VALUES(:login, :lastname, :firstname, :email, :password, :createDate, :role)');
        $req->bindValue(':login', $user->login());
        $req->bindValue(':lastname', $user->lastname());
        $req->bindValue(':firstname', $user->firstname());
        $req->bindValue(':email', $user->email());
        $req->bindValue(':password', md5($user->password()));
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
        $req = $this->_bdd->query('SELECT login, lastname, firstname, email, password, createDate, role FROM users WHERE id = ' . $id);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new User($donnees);
    }

    /**
     * @return array|Article
     */
    public function getlist()
    {
        //$user[];
        $req = $this->_bdd->query('SELECT * FROM users ORDER BY login ASC');
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {

            $user = new User($donnees);
            $user->hydrate($donnees);
            return $user;
        }
    }

    public function update(User $user)
    {
        $req = $this->_bdd->prepare('UPDATE users SET login = :login, lastname = :lastname, firstname = :firstname, email = :email, password = :password, createDate = :createDate, role = :role WHERE id = :id');

        $req->bindValue(':id', $user->id());
        $req->bindValue(':login', $user->login());
        $req->bindValue(':lastname', $user->lastname());
        $req->bindValue(':firstname', $user->firstname());
        $req->bindValue(':email', $user->email());
        $req->bindValue(':password', md5($user->password()));
        $req->bindValue(':createDate', $user->createDate());
        $req->bindValue(':role', $user->role());
        $req->execute();
    }

    public function checkUser($login, $password)
    {
        $req = $this->_bdd->prepare('SELECT * FROM users WHERE login = :login AND password = :password');
        $req->execute(array('login' => $login, 'password' => md5($password)));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        if ($donnees){
            return $donnees;
        }
        else{
            echo('<center>Nom d\'utilisateur ou mot de passe invalide</center>');
        }
    }

    public function resetPwd($login, $email){
        $req = $this->_bdd->prepare('SELECT password FROM users WHERE login = :login AND email = :email');
        $req->execute(array('login' =>$login, 'email' =>$email));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        if ($donnees){
            return true;
        }
        else{
            echo('<center>Login ou mot de passe incorrect</center>');
        }
    }

    public function newPwd($login, $pwd){
        $req = $this->_bdd->prepare('UPDATE users SET password = :password WHERE login = :login');
        $req->bindValue(':password', md5($pwd));
        $req->bindValue(':login', $login);
        $req->execute();
        if ($req){
            echo ('<center>Votre mot de passe a bien été changé !</center>');
        }
        else {
            echo ('<center>Une erreur s\'est produite ! Veuillez recommencer</center>');
        }
    }

    public function setBdd(PDO $bdd)
    {
        $this->_bdd = $bdd;
    }
}