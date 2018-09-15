<?php

class Database
{
    const DB_HOST = 'mysql:host=localhost;dbname=projet4;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
    
    public function getConnection()
    {
        try{
            $bdd = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
        }
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :' .$errorConnection->getMessage());
        }
    }
}

