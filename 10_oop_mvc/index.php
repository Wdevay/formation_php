<?php
namespace App;

session_start();

use App\Services\Router;

require_once('config.php');
require_once('autoload.php');


// On détermine quelle page doit être affichée avec la variable page (?page=...)
$router = new Router();
$page = $router->getPage();

// ex: App\Controllers\HomeController
$controllerName = "App\Controllers\\" . ucfirst($page) . "Controller"; // ucfirst() met la première lettre en majuscule
$controller= new $controllerName();
$controller->index(); 