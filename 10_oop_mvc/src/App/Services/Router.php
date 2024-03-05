<?php
// representation de l'organisation
namespace App\Services;
/*
* A very simple class Routeur
* based on $_GET['page']
*/
class Router
{
    private $page;

    public function __construct(){
        $this->setPage( );
    }

    public function setPage()
    {
        $this->page = isset($_GET['page']) ? strtolower($_GET['page']) : 'home';
    }

    public function getPage()
    {
        return $this->page;
    }
}