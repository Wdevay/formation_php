<?php
require_once("./services/class/Database.php");

class Post
{
    // proprieté $db pour stocker PDO
    private $db;

    // constructeur
    public function __construct(){
        $this->db = new Database();
    } 


    public function getAll($nb=null, $query="SELECT * FROM post ORDER BY id DESC"){
        $limit = !is_null($nb) ? " LIMIT ".$nb : "";
        $posts=[];
        $posts=$this->db->selectAll($query.$limit);
        return $posts;
    }

    public function getById($query="SELECT * FROM post WHERE id = :id",$id ){
        $post = $this->db->select($query, ['id' => $id]);
        return $post;
    }

    public function updatePost($id, $title, $description, $url){
        $query = "UPDATE post SET title = :title, description = :description, image = :url WHERE id = :id";
        return $this->db->query($query, ['title' => $title, 'description' => $description, 'url' => $url, 'id' => $id]);
    }

}