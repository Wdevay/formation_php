<?php

$db = connectDB();
$posts = [];
if ($db){
    $sql= $db->prepare("SELECT * FROM post ORDER BY id");
    $sql->execute();
    // echo "<pre>";
    $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($posts);
}

// On charge la vue
include "./views/base.phtml"
?>
