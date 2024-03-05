<?php

namespace App\Controllers;

use App\Services\Authenticator;

class AbstractController{
    /**
     * This is a common method to display template
     *  and send some data
     */

    protected function render($templatePath, $data){
        // Ouvrir la mémoire tampon du serveur
        ob_start();
        //$auth peut contenir toute la classe Authenticator
        //afin de simplifier la syntaxe dans les vues
        // $auth::isRole('ROLE_ADMIN') est plus simple que App\Services\Authenticator::isRole...
        $auth = Authenticator::class;
        // Quand on aura $data['posts']
        //Grace à extract($data)
        // On pourra récupérer directement
        // $posts dans le template
        extract($data);
        include $templatePath;
        // On charge la mémoire tampon dans le template
        $template = ob_get_clean();
        // Afficher le template
        include './Views/base.phtml';
    }
}