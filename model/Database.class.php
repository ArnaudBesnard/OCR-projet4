<?php

class Database {
    const DB_HOST = 'mysql:host=localhost;dbname=projet4;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';

    protected function dbConnect()
    {
        $db = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}

