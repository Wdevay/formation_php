<?php

namespace App\Controllers;

use App\Services\Authenticator;
use App\Controllers\AbstractController;

class LogoutController extends AbstractController
{
    public function index()
    {
        $auth = new Authenticator();
    $auth->logout();
    header("Location:?page=home");
    }
}