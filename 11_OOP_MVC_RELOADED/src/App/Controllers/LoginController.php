<?php
// On se place dans le dossier src/App/Controllers
namespace App\Controllers;
// Utilisation de la classe Post
use App\Services\Utils;
use App\Services\Authenticator;
use App\Controllers\AbstractController;


class LoginController extends AbstractController
{
    public function index()
    {
        $title = "Login";

        if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

            $errors = [];

            $email = Utils::cleanInput($_POST['email']);
            $password = Utils::cleanInput($_POST['password']);
            $auth = new Authenticator();

            if ($auth->login($email, $password)) {
                // header("Location:?page=admin");
                // die();
            } else {
                $errors[] = "Problème d'authentification";
            }
        }

        $template = './Views/template_login.phtml';
        $this->render($template, ['title' => $title, 'errors' => $errors]);
    }
}
