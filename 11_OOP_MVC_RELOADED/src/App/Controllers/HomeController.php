<?php
// On se place dans le dossier src/App/Controllers
namespace App\Controllers;
// Utilisation de la classe Post
use App\Models\PostManager;
use App\Controllers\AbstractController;

class HomeController extends AbstractController
{
    public function index()
    {
        $title = "Home";
        $post = new PostManager();
        $posts = $post->getAll(3);

        $template = './Views/template_home.phtml';
        $this->render($template, ['title' => $title, 'posts' => $posts]);
    }


}