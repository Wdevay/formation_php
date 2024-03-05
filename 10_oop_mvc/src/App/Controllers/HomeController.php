<?php
// On se place dans le dossier src/App/Controllers
namespace App\Controllers;
// Utilisation de la classe Post
use App\Models\Post;

class HomeController
{
    public function index()
    {
        $title = "Home";
        $template = './Views/template_home.phtml';
        $post = new Post();
        $posts = $post->getAll();
        $this->render($template, ['title' => $title, 'posts' => $posts]);
    }

    public function render($templatePath, $data)
    {
        // Ouvrir la mémoire tampon du serveur
        ob_start();
        include $templatePath;
        // On charge la mémoire tampon dans le template
        $template = ob_get_clean();
        // Afficher le template
        include './Views/base.phtml';
    }
}