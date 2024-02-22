<?php 
        // Si la var page est définie dans l'url on la récupère sinon c'est ""
        $getPage = isset($_GET['page']) ? strtolower($_GET['page']) : "";
        //on définit le parcours pour charger la page souhaitée
        $path = "./controllers/controller_" . $getPage . ".php";
        // Si le fichier existe on le charge sinon on charge la page "home"
        $page = file_exists($path) ? $getPage : "home";