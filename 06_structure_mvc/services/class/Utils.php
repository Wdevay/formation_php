<?php

class Utils
{
    // INFO DE BDD
    const DB_HOST = "localhost";
    const DB_NAME = "mvc_php";
    const DB_PORT = "3306";
    const DB_USER = "root";
    const DB_PASS = "";
    
    static function cleanInput($data)
    {
        $data = strip_tags($data);
        $data = htmlentities($data);
        return $data;
    }


    static function connectDB()
    {
        $db = false;
        try {
            $db = new PDO('mysql:host=' . self::DB_HOST . ';port=' . self::DB_PORT . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            // tenter de réessayer la connexion après un certain délai, par exemple
            echo "problème de connexion au serveur de base de données: " . $e;
        }
        return $db;
    }

    static function isRole($role)
    {
        $is_role = isset($_SESSION['user']) && in_array($role, json_decode($_SESSION['user']['roles']));
        return $is_role;
    }

    static function dump($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }

    static function dump_die($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();
    }
}
