<?php

class userManager extends Database
{

    public function add(User $user)
    {
        $db = $this->dbconnect();
        $login = $_POST['login'];
        $email = $_POST['email'];
        $query = $db->query("SELECT * from users WHERE login='$login'");
        $num_row = $query->rowCount();
        if ($num_row == 1)
        {
            echo('<center>Ce nom d\'utilisateur est déjà pris</center>');
            header("Refresh: 3; URL=index.php?action=register" );
        }
        else
        {
            $req = $db->prepare('INSERT INTO users(login, lastname, firstname, email, password, createDate, role) VALUES(:login, :lastname, :firstname, :email, :password, :createDate, :role)');
            $req->bindValue(':login', $user->login());
            $req->bindValue(':lastname', $user->lastname());
            $req->bindValue(':firstname', $user->firstname());
            $req->bindValue(':email', $user->email());
            $req->bindValue(':password', md5($user->password()));
            $req->bindValue(':createDate', $user->createDate());
            $req->bindValue(':role', $user->role());
            $req->execute();
            echo ('<center>Votre comptre a bien été crée !</center>');
            header("Refresh: 3; URL=index.php?action=connect" );
        }
    }

    public function checkUser($login, $password)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('SELECT * FROM users WHERE login = :login AND password = :password');
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
        $db = $this->dbconnect();
        $req = $db->prepare('SELECT password FROM users WHERE login = :login AND email = :email');
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
        $db = $this->dbconnect();
        $req = $db->prepare('UPDATE users SET password = :password WHERE login = :login');
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
}