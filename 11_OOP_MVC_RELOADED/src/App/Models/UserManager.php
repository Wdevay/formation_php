<?php

namespace App\Models;

use App\Models\User;
use App\Services\Database;

class UserManager extends AbstractManager
{
    public function __construct()
    {
        self::$db = new Database();
        self::$tableName = 'user';
        self::$obj = new User;
    }

    public function getUserInfo($email):array
    {
        $where = " WHERE email ='".$email."' AND user.id = contact.user_id";
        $query = "SELECT user.*, contact.name, contact.firstname FROM user, contact";
        $result = self::$db->select($query.$where);
        return $result;
    }
}
