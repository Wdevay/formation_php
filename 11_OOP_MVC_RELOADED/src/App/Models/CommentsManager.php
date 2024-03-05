<?php

namespace App\Models;

use App\Models\Comments;
use App\Services\Database;

class CommentsManager extends AbstractManager
{
    public function __construct()
    {
        self::$db = new Database();
        self::$tableName = 'comments';
        self::$obj = new Comments;
    }

    public function getComments($post_id=null)
    {
        // $param = [$post_id];
        $where=" WHERE comments.post_id=".$post_id;
        $query = "SELECT comments.*, name, firstname,avatar FROM comments 
        INNER JOIN user ON comments.user_id = user.id
        INNER JOIN contact ON contact.user_id = user.id".$where." ORDER BY comments.created_at DESC";
        $results = self::$db->selectAll($query);
        return $results;
    }

}
