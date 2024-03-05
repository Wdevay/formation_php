<?php

namespace App\Controllers;

use App\Models\PostManager;
use App\Services\Authenticator;
use App\Controllers\AbstractController;
use App\Models\CommentsManager;

class AdminPostController extends AbstractController
{
    public function __construct()
    {
        if(!Authenticator::isRole("ROLE_ADMIN")){
            header("Location:?page=home");
            die();
        }
    }
    public function index(){

        $template = './Views/template_admin_post_uc.phtml';
        $this->render($template,[]);
    }

    public function create(){

       
    }

    public function update(){
        $post_id = (int)$_GET['id'];
        $manager = new PostManager();
        $post_array = $manager->getPosts($post_id);
        $post = $post_array[array_key_first($post_array)];

        $template = './Views/template_admin_post_uc.phtml';
        $this->render($template,['post'=>$post]);
    }

    public function delete(){
        $post_id = (int)$_GET['post_id'];
        $manager = new PostManager();
        $c_manager = new CommentsManager();
        $c_delete = $c_manager -> delete(['post_id'=>$post_id]);
        $delete = $manager -> delete(['id'=>$post_id]);

        header("Location:?page=admin");
      
    }


}