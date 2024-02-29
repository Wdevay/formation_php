<?php

$success=false;
if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    
    $name = cleanInput($_POST['name']);
    $firstname = cleanInput($_POST['firstname']);
    $email = cleanInput($_POST['email']);
    $password = password_hash(cleanInput($_POST['password']), PASSWORD_DEFAULT);
    $adress = cleanInput($_POST['adress']);
    $adress2 = cleanInput($_POST['adress2']);
    $city = cleanInput($_POST['city']);
    $state = cleanInput($_POST['state']);
    $code_postal = cleanInput($_POST['code_postal']);
    $message = cleanInput($_POST['message']);

    $errors = [];

    if (isset($_FILES['avatar'])) {
        // On définit les types mimi acceptés
        $accepted= ["image/png","image/jpeg"];
        // echo "<h2> on upload le fichier </h2>";
        //On doit transformer le nom de fichier en tableau array
        //afin d'en extraire l'extension
        $arrayName = explode(".",$_FILES['avatar']['name']);
        $extension = strtolower(end($arrayName)); //strtolower pour lower case et end pour extraire le dernier element du tableau
        //var_dump($extension);
        //die();
        // Si le type de fichier n'existe pas dans les types acceptés on génere une erreur
        if(!in_array($extension,$accepted)){ // ou (!in_array($_FILES['avatar']['type'],$accepted))
            $errors[]="Extension (".$extension.") n'est pas accepté";//equivalent à un array.push() (ca met à la suite)
        }
        // Si l'un des champs est vide on génère une erreur
        if(empty($_FILES['avatar'])){
            $errors[]="Tous les champs sont obligatoires merci";
        }

        //On définit un nouveau nom
        $newFile = "./assets/images/avatar_".time().$extension;
        //SI LE TABLEAU DES ERREURS EST VIDE ALORS :
        //On copie le fichier dans le dossier uploads
        if(empty($errors)) {
        move_uploaded_file($_FILES['avatar']['tmp_name'],$newFile);
        $avatar = $newFile;
        }
    }

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
            $sql = $db->prepare('INSERT INTO user (avatar, email, password) VALUES (:avatar, :email, :password)');
            $sql->bindParam(':avatar', $avatar);
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
