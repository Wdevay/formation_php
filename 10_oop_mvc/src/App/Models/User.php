<?php
namespace App\Models;

use App\Services\Database;

class User
{
    // propriété $db pour stocker PDO
    private $db;

       // constructeur
       public function __construct(){
        $this->db = new Database();
    } 


    public function getAll($nb=null, $query="SELECT * FROM user"){
        $limit = !is_null($nb) ? " LIMIT ".$nb : "";
        $users=[];
        $users=$this->db->selectAll($query.$limit);
        return $users;
    }

    public function getByEmail($query="SELECT user.*, contact.name, contact.firstname FROM user, contact  WHERE email = :email AND user.id = contact.user_id",$email ){
        $user = $this->db->select($query, ['email' => $email]);
        return $user;
    }

    // public function updatePost($id, $title, $description, $url){
    //     $query = "UPDATE post SET title = :title, description = :description, image = :url WHERE id = :id";
    //     return $this->db->query($query, ['title' => $title, 'description' => $description, 'url' => $url, 'id' => $id]);
    // }

}
