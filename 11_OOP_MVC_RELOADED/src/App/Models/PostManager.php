<?php

namespace App\Models;

use App\Models\Post;
use App\Services\Database;

class PostManager extends AbstractManager
{
    public function __construct()
    {
        self::$db = new Database();
        self::$tableName = 'post';
        self::$obj = new Post;
    }

    public function getPosts($id=null)
    {
        $param = !$id === null ? [$id] : null;
        $where= !$id===null ? " WHERE post.id=".$id : "";
        $query = "SELECT post.*, name, firstname, avatar FROM post 
        INNER JOIN contact ON post.user_id = contact.user_id
        INNER JOIN user ON contact.user_id = user.id".$where." ORDER BY post.id DESC";
        $results = self::$db->selectAll($query,$param);
        return $results;
    }
}
