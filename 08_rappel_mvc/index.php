<?php 
    require('./config.php');
    // C'est quelle page qu'on doit afficher
    // On récupère la variable 'page' dans l'URL
    // Si la variable est définie dans l'URL on la récupère
    // Sinon on considère que la variable est vide donc on affiche la page 'home'
     //$getPage = isset($_GET['page']) ? $_GET['page'] : 'home';    c'est notre 'route' => router.php
    require('./services/router.php');
    require('./controllers/controller_'.$page.'.php'); // la variable '$page' vient du router.php
    // include("./views/template_".$page.".phtml");
    ?>