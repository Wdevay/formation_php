<?php

$post_id=$_GET['id'];
$db = connectDB();
$article = [];

if ($db){
    $sql = $db->prepare("SELECT post.*, name, firstname FROM post INNER JOIN contact ON post.user_id = contact.user_id WHERE post.id =:id");
    $sql->bindParam(':id', $post_id);
    $sql->execute();
    $article = $sql->fetch(PDO::FETCH_ASSOC);
}

include "./views/base.phtml";
