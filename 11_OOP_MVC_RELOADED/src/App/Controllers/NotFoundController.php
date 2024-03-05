<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

class NotFoundController extends AbstractController
{
    public function index()
    {
        $title = "This page does not exists :(";
        $template = './Views/template_notfound.phtml';
        $this->render($template, ['title' => $title]);
    }
}