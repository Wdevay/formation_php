<?php

class Database
{
    // propriétés de la classe
    private $db_host;
    private $db_name;
    private $db_port;
    private $db_user;
    private $db_pass;
    // DSN = Data Source Name
    private $db_dsn;
    // PDO = PHP Data Object 
    private $pdo;

    // constructeur de la classe
    public function __construct(
        $db_host = "localhost",
        $db_name = "mvc_php",
        $db_port = "3306",
        $db_user = "root",
        $db_pass = ""
    ) {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_port = $db_port;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_dsn = "mysql:host=" . $this->db_host . ";port=" . $this->db_port . ";dbname=" . $this->db_name. ";charset=utf8";
    }

    private function getPDO(){
        // SI PDO N'EST PAS DEJA CONNECTE
        if($this->pdo === null){
            try {
                $db = new PDO($this->db_dsn, $this->db_user,$this->db_pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error) {
                // tenter de réessayer la connexion après un certain délai, par exemple
                echo "problème de connexion au serveur de base de données: " . iconv('ISO-8859-1', 'UTF-8',$error->getMessage()); // pour afficher les accents
                die();
            }
            $this->pdo = $db;
        }
        // PDO n'est appelé qu'une seule fois
        return $this->pdo;
    }

    public function selectAll($statement, $params=[]){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($params); // execute($params) remplace bindParam($params[i])
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;        
    }

    public function select($statement, $params=[]){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($params); // execute($params) remplace bindParam($params[i])
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;        
    }

    public function query($statement,$params=[]){ // Toutes les requetes INSERT, UPDATE, DELETE
        $req = $this->getPDO()->prepare($statement);
        $req->execute($params);
        return $this->getPDO();
    }

}
