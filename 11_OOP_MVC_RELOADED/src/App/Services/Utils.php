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
