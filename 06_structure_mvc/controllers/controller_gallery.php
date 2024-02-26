<?php

$db = connectDB();
$posts = [];
if ($db){
    $sql = $db->prepare("SELECT post.*, name, firstname FROM post INNER JOIN contact ON post.user_id = contact.user_id ORDER BY id DESC");
    // $sql= $db->prepare("SELECT post.*, name, firstname FROM post, contact WHERE post.user_id = contact.user_id ORDER BY id DESC");
    $sql->execute();
    // echo "<pre>";
    $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
}

// On charge la vue
include "./views/base.phtml"
?>
