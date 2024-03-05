<?php

namespace App\Controllers;

use App\Models\PostManager;
use App\Services\Authenticator;
use App\Controllers\AbstractController;

class AdminController extends AbstractController
{
    public function __construct()
    {
        if(!Authenticator::isRole("ROLE_ADMIN")){
            header("Location:?page=home");
            die();
        }
    }

    public function index(){
        $post = new PostManager();
        $posts = $post->getPosts();


        $template = './Views/template_admin.phtml';
        $this->render($template,['title'=>'Welcome to the Admin Dashboard','posts'=>$posts]);
    }


}