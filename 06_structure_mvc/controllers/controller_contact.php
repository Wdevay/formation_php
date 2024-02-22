<?php

$success=false;
if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    
    $name = htmlentities(strip_tags($_POST['name']));
    $firstname = htmlentities(strip_tags($_POST['firstname']));
    $email = htmlentities(strip_tags($_POST['email']));
    $password = password_hash(htmlentities(strip_tags($_POST['password'])), PASSWORD_DEFAULT);
    $adress = htmlentities(strip_tags($_POST['adress']));
    $adress2 = htmlentities(strip_tags($_POST['adress2']));
    $city = htmlentities(strip_tags($_POST['city']));
    $state = htmlentities(strip_tags($_POST['state']));
    $code_postal = htmlentities(strip_tags($_POST['code_postal']));
    $message = htmlentities(strip_tags($_POST['message']));


    $errors = [];

    $db = connectDB();

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Veuillez renseigner une adresse email valide svp";
    }

    if ($db) {
        $sql = $db->prepare("SELECT email FROM user  WHERE email = :email");
        $sql->bindParam(':email',$email);
        $sql->execute();
        $email_already_used = $sql->fetchColumn();
    }

    if ($email_already_used) {
        $errors[] = "Cette adresse e-mail est déjà utilisée";
    }
    if (empty($errors)) {
        // echo "On peut ajouter le nouveau utilisateur";
        if ($db) {

            // PARTIE USER
            $sql = $db->prepare('INSERT INTO user (email, password) VALUES (:email, :password)');
            $sql->bindParam(':email', $email);
            $sql->bindParam(':password', $password);
            $sql->execute();

            $user_id = $db->lastInsertId(); // FOREIGN KEY

            // PARTIE CONTACT
            $query = $db->prepare('INSERT INTO contact (user_id, name, firstname, adress, adress2, city, state, code_postal, message) VALUES (:user_id, :name, :firstname, :adress, :adress2, :city, :state, :code_postal, :message)');
            $query->bindParam(':user_id', $user_id);
            $query->bindParam(':name', $name);
            $query->bindParam(':firstname', $firstname);
            $query->bindParam(':adress', $adress);
            $query->bindParam(':adress2', $adress2);
            $query->bindParam(':city', $city);
            $query->bindParam(':state', $state);
            $query->bindParam(':code_postal', $code_postal);
            $query->bindParam(':message', $message);
            $query->execute();

            $success = true;
        }
    }
}

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





// On charge la vue
include "./views/base.phtml";
