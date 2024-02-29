<?php

$post_id=$_GET['id'];
$db = connectDB();
$article = [];


if ($db){
    $sql = $db->prepare("SELECT post.*, name, firstname,avatar FROM post 
    INNER JOIN contact ON post.user_id = contact.user_id 
    INNER JOIN user ON contact.user_id = user.id
    WHERE post.id =:id");
    $sql->bindParam(':id', $post_id);
    $sql->execute();
    $article = $sql->fetch(PDO::FETCH_ASSOC);

    $sql = $db->prepare("SELECT comments.*, name, firstname,avatar FROM comments 
    INNER JOIN user ON comments.user_id = user.id
    INNER JOIN contact ON contact.user_id = user.id
     WHERE comments.post_id =:id ORDER BY comments.created_at DESC");
    $sql->bindParam(':id', $post_id);
    $sql->execute();
    $comments = $sql->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['comment']) && !empty($_POST['comment'])) {
    $comment = cleanInput($_POST['comment']);
    $user_id = $_SESSION['user']['id'];

    if ($db) {
        $sql = $db->prepare('INSERT INTO comments (post_id, user_id, comment) VALUES (:post_id, :user_id, :comment)');
        $sql->bindParam(':post_id', $post_id);
        $sql->bindParam(':user_id', $user_id);
        $sql->bindParam(':comment', $comment);
        $sql->execute();

        header('Location: ?page=post_detail&id=' . $post_id);
        exit();
    }
}

include "./views/base.phtml";
