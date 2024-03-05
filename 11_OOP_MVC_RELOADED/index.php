<?php
namespace App;

session_start();

use App\Services\Router;

require_once('config.php');
require_once('autoload.php');


// On détermine quelle page doit être affichée avec la variable page (?page=...)
$router = new Router();
$page = $router->run();

