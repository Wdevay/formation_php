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
$posts = [];

if ($db){
    $sql= $db->prepare("SELECT * FROM post ORDER BY id DESC");
    $sql->execute();
    // echo "<pre>";
    $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($posts);
}


include "./views/base.phtml";