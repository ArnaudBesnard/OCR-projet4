<?php

class userManager extends Database
{
//Add User method
    public function add(User $user)
    {
        $db = $this->dbconnect();
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['email']);
        $query = $db->prepare('SELECT * from users WHERE login = :login');
        $query->bindValue(':login', $login);
        $query->execute();
        $num_row = $query->rowCount();
        if ($num_row == 1)
        {
            header("Refresh: 3; URL=index.php?action=register" );
            echo('<center>Ce nom d\'utilisateur est déjà pris</center>');
            exit;
        } else {
            $req = $db->prepare('INSERT INTO users(login, lastname, firstname, email, password, createDate, role) VALUES(:login, :lastname, :firstname, :email, :password, :createDate, :role)');
            $req->bindValue(':login', htmlspecialchars($user->login()));
            $req->bindValue(':lastname', htmlspecialchars($user->lastname()));
            $req->bindValue(':firstname', htmlspecialchars($user->firstname()));
            $req->bindValue(':email', htmlspecialchars($user->email()));
            $req->bindValue(':password', md5($user->password()));
            $req->bindValue(':createDate', $user->createDate());
            $req->bindValue(':role', $user->role());
            $req->execute();
            header("Refresh: 3; URL=index.php?action=connect" );
            echo ('<center>Votre comptre a bien été crée !</center>');
            exit;
        }
    }
//Check User method
    public function checkUser($login, $password)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('SELECT * FROM users WHERE login = :login AND password = :password');
        $req->bindValue(':login', htmlspecialchars($login));
        $req->bindValue(':password', md5($password));
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data){
            return $data;
        } else {
            echo('<center>Nom d\'utilisateur ou mot de passe invalide</center>');
        }
    }
//Reset Password method
    public function resetPwd($login, $email){
        $db = $this->dbconnect();
        $req = $db->prepare('SELECT password FROM users WHERE login = :login AND email = :email');
        $req->bindValue(':login', htmlspecialchars($login));
        $req->bindValue(':email', htmlspecialchars($email));
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data){
            return true;
        } else {
            echo('<center>Login ou mot de passe incorrect</center>');
        }
    }
//New Password method
    public function newPwd($login, $pwd){
        $db = $this->dbconnect();
        $req = $db->prepare('UPDATE users SET password = :password WHERE login = :login');
        $req->bindValue(':password', md5($pwd));
        $req->bindValue(':login', htmlspecialchars($login));
        $req->execute();
        if ($req){
            echo ('<center>Votre mot de passe a bien été changé !</center>');
        } else {
            echo ('<center>Une erreur s\'est produite ! Veuillez recommencer</center>');
        }
    }
}