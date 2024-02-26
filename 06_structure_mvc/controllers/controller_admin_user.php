<?php
if (!isset($_SESSION['user'])) {
    header("Location: ?page=login");
    exit();
}
if (!in_array('ROLE_ADMIN', json_decode($_SESSION['user']['roles']))) {
    header("Location: ?page=home");
    exit();
}

$db = connectDB();
$posts = [];
if ($db){
    $sql= $db->prepare("SELECT * FROM contact");
    $sql->execute();
    // echo "<pre>";
    $contacts = $sql->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($posts);
}

include "./views/base.phtml";