<?php

namespace App\Services;

use App\Models\UserManager;

class Authenticator
{
    public function __construct()
    {   
        if (!isset($_SESSION)) session_start();

    }

    private function setSession($userData)
    {
        $_SESSION['user']= $userData;
    }


    public function login($email,$password)
    {
        // Au départ on est pas log
        $isLogged = false;
        $userManager = new UserManager();
        $user= $userManager->getUserInfo($email);

        if ($user) {
            $isLogged = password_verify($password, $user['password']);
        }
        if ($isLogged) {
            $this->setSession($user);
        }
        return $isLogged;
        
    }

    static function isRole($role)
    {
        $is_role = isset($_SESSION['user']) && in_array($role, json_decode($_SESSION['user']['roles']));
        return $is_role;
    }

    public function logout(){
        session_destroy();
    }
}