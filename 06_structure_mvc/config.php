<?php
// Ancienne métode pour déclarer des constantes
define("CONFIG_SITE_SLOGAN","Cette magnifique structure permet de séparer les responsabilités afin de mieux maintenir notre code");
// Nouvelle méthode pour déclarer des constantes
const CONFIG_SITE_TITLE = "Mon Superbe MVC";
// INFO DE BDD
const DB_HOST = "localhost";
const DB_NAME = "mvc_php";
const DB_PORT = "3306";
const DB_USER = "root";
const DB_PASS = "";

function connectDB(){
    $db=false;
try {
    $db = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $e) {
    // tenter de réessayer la connexion après un certain délai, par exemple
    echo "problème de connexion au serveur de base de données: ".$e;
}
return $db;
}