<?php

namespace App\Controllers;

use App\Models\Post;

class GalleryController
{
    public function index(){
        $title = "Gallery";
        $post = new Post();
        $posts = $post->getAll(null,"SELECT post.*, name, firstname, avatar FROM post 
        INNER JOIN contact ON post.user_id = contact.user_id
        INNER JOIN user ON contact.user_id = user.id
         ORDER BY post.id DESC");
        $template = './views/template_gallery.phtml';
        $this->render($template,['title'=>$title,'posts'=>$posts]);
    }

    public function render($templatePath,$data){
        // Ouvrir la mémoire tempon du serveur
        ob_start();
        include $templatePath;
        // On charge la mémoire tempon dans le template
        $template = ob_get_clean();
        include './views/base.phtml';
    }
}