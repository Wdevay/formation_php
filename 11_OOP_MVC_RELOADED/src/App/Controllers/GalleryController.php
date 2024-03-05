<?php

namespace App\Controllers;

use App\Models\PostManager;
use App\Controllers\AbstractController;

class GalleryController extends AbstractController
{
    public function index(){
        $title = "Gallery";
        $post = new PostManager();
       
        $posts = $post->getPosts();
         
        $template = './views/template_gallery.phtml';
        $this->render($template,['title'=>$title,'posts'=>$posts]);
    }

}