<?php
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";


if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    $errors = [];

    $db = Utils::connectDB();
    $email = Utils::cleanInput($_POST['email']);
    $password = Utils::cleanInput($_POST['password']);

    if ($db) {

        $sql = $db->prepare("SELECT user.*, contact.name, contact.firstname FROM user, contact  WHERE email = :email AND user.id = contact.user_id");
        $sql->bindParam(':email', $email);
        $sql->execute();
        $account = $sql->fetch(PDO::FETCH_ASSOC);

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
}

include "./views/base.phtml";
