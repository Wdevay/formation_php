<?php
// On se place dans le dossier src/App/Controllers
namespace App\Controllers;
// Utilisation de la classe Post
use App\Services\Utils;
use App\Models\User;

class LoginController
{
    public function index()
    {
        $title = "Login";
        $template = './Views/template_login.phtml';


        if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

            $errors = [];

            $email = Utils::cleanInput($_POST['email']);
            $password = Utils::cleanInput($_POST['password']);

            $user = new User();
            $account = $user->getByEmail(null, $email);
        }

        if ($account) {
            $hash = $account["password"];
        } else {
            $errors[] = "Cet utilisateur n'existe pas -> <a href=\"?page=contact\">Inscrivez-vous</a>";
        }

        if ($account && !(password_verify($password, $hash))) {
            $errors[] = "Mot de passe incorrect";
        }

        if (empty($errors)) {
            // Connexion reussie on supprime le mot de passe
            unset($account["password"]);
            $_SESSION['user'] = $account;
        }
        if (Utils::isRole('ROLE_ADMIN')) {
            header("Location: ?page=admin");
            exit();
        }

        $this->render($template, ['title' => $title, 'errors' => $errors]);
    }

    public function render($templatePath, $data)
    {
        // Ouvrir la mémoire tampon du serveur
        ob_start();
        include $templatePath;
        // On charge la mémoire tampon dans le template
        $template = ob_get_clean();
        // On extrait les données
        extract($data);
        // Afficher le template
        include './Views/base.phtml';
    }
}
