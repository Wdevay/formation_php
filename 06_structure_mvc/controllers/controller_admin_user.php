<?php
if (!isset($_SESSION['user'])) {
    header("Location: ?page=login");
    exit();
}
if (!Utils::isRole('ROLE_ADMIN')) {
    header("Location: ?page=home");
    exit();
}

$db = Utils::connectDB();

if ($db){
    $sql= $db->prepare("SELECT * FROM contact, user WHERE contact.user_id = user.id");
    $sql->execute();
    // echo "<pre>";
    $contacts = $sql->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($posts);
}

include "./views/base.phtml";