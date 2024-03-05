<?php

namespace App\Controllers;

use App\Models\ContactManager;
use App\Models\UserManager;
use App\Services\Utils;

class ContactController extends AbstractController
{
    public function index()
    {
        $success = false;
        $title = "Contact";
        $errors = [];
        $state = [
            "Auvergne-Rhône-Alpes",
            "Bourgogne-Franche-Comté",
            "Bretagne",
            "Centre-Val de Loire",
            "Corse",
            "Grand Est",
            "Hauts-de-France",
            "Ile-de-France",
            "Normandie",
            "Nouvelle-Aquitaine",
            "Occitanie",
            "Pays de la Loire",
            "Provence Alpes Côte d’Azur",
            "Guadeloupe",
            "Guyane",
            "Martinique",
            "Mayotte",
            "Réunion"
        ];
        //////////////////////////////////LOGIQUE D'INSERTION USER/CONTACT /////////////////////////////////////////
        if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {


            $name = Utils::cleanInput($_POST['name']);
            $firstname = Utils::cleanInput($_POST['firstname']);
            $email = Utils::cleanInput($_POST['email']);
            $password = password_hash(Utils::cleanInput($_POST['password']), PASSWORD_DEFAULT);
            $adress = Utils::cleanInput($_POST['adress']);
            $adress2 = Utils::cleanInput($_POST['adress2']);
            $city = Utils::cleanInput($_POST['city']);
            $state = Utils::cleanInput($_POST['state']);
            $code_postal = Utils::cleanInput($_POST['code_postal']);
            $message = Utils::cleanInput($_POST['message']);

            $errors = [];

            if (isset($_FILES['avatar'])) {
                $accepted = ["image/png", "image/jpeg"];

                $arrayName = explode(".", $_FILES['avatar']['name']);
                $extension = strtolower(end($arrayName));

                if (!in_array($extension, $accepted)) {
                    $errors[] = "Extension (" . $extension . ") n'est pas accepté";
                }

                if (empty($_FILES['avatar'])) {
                    $errors[] = "Tous les champs sont obligatoires merci";
                }

                $newFile = "./assets/images/avatar_" . time() . $extension;

                if (empty($errors)) {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $newFile);
                    $avatar = $newFile;
                }
            }
            echo "<pre>";
            var_dump($_FILES, $errors, $newFile);
            die();

            //////////////////////////////////LOGIQUE D'INSERTION USER/CONTACT /////////////////////////////////////////
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Veuillez renseigner une adresse email valide svp";
            }
            $userManager = new UserManager();
            $email_already_used = $userManager->getOnebyParam(['email' => $email]);

            if ($email_already_used) {
                $errors[] = "Cette adresse e-mail est déjà utilisée";
            }

            if (empty($errors)) {
                // echo "On peut ajouter le nouveau utilisateur";

                $insertUser = $userManager->insert([$avatar, $email, $password, "[]"]);
                $user_id = $insertUser->lastUserId();

                $contactManager = new ContactManager();
                $insertContact = $contactManager->insert([
                    $user_id,
                    $name,
                    $firstname,
                    $adress,
                    $adress2,
                    $city,
                    $state,
                    $code_postal,
                    $message
                ]);

                $success = true;
            }
        }

        $template = './views/template_contact.phtml';
        $this->render($template, [
            'title' => $title,
            'success' => $success,
            'state' => $state,
            'errors' => $errors
        ]);
    }
}
