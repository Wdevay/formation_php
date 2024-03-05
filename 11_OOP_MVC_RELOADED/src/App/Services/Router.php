<?php
// representation de l'organisation
namespace App\Services;
/*
* A very simple class Routeur
* based on $_GET['page']
* $page=contact&action=new
*/

class Router
{
    private $page;
    private $action;

    public function __construct()
    {
        $this->setPage();
        $this->setAction();
    }

    public function setPage()
    {
        $this->page = isset($_GET['page']) ? strtolower($_GET['page']) : 'home';
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setAction()
    {
        $this->action = isset($_GET['action']) ? strtolower($_GET['action']) : 'index';
    }

    public function getAction()
    {
        return $this->action;
    }

    public function run()
    {   
        // On définit le controller par défaut
        $controllerName = "App\Controllers\NotFoundController";
        // On définit l'action par défaut
        $action = "index";

        // Si le fichier
        // ex: App\Controllers\HomeController.php 
        // existe alors on instancie la class
        if(file_exists("./src/App/Controllers/". ucfirst($this->getPage()) ."Controller.php")){
            $controllerName = "App\Controllers\\" . ucfirst($this->getPage()) . "Controller"; // ucfirst() met la première lettre en majuscule
        }
        // Si la methode correspondante dans le controller existe
        // Alors on execute cette methode
        if(method_exists($controllerName,$this->getAction())){
            $action = $this->getAction();
        }
        // On peut donc ensuite instancier notre controller
        $controller = new $controllerName();
        // On peut executer la methode correspondante
        // par défaut c'est index()
        $controller->$action();
    }
}
