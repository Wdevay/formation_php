<?php

namespace App\Services;
class Utils
{
   
    
    static function cleanInput($data)
    {
        $data = strip_tags($data);
        $data = htmlentities($data);
        return $data;
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
