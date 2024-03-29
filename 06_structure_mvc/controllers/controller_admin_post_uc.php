<?php
if (!isset($_SESSION['user'])) {
    header("Location: ?page=login");
    exit();
}
if (!Utils::isRole('ROLE_ADMIN')) {
    header("Location: ?page=home");
    exit();
}


require_once("./Models/Post.php");
$postModel = new Post();



// PARTIE UPDATE DU CRUD
if (isset($_GET['id'])) {
    // NB: (int) permet de forcer le type de la variable au type entier
    $id_to_update = (int)$_GET['id'];

    $post = $postModel -> getById("SELECT * FROM post WHERE id = :id", $id_to_update);

    // if ($db) {
    //     $sql = $db->prepare("SELECT * FROM post WHERE id = :id");
    //     $sql->bindParam(':id', $id_to_update);
    //     $sql->execute();

    //     $post = $sql->fetch(PDO::FETCH_ASSOC);
        
     if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['url']) && !empty($_POST['title']) && !empty($_POST['description'] && !empty($_POST['url']))) {
            
             $title = Utils::cleanInput($_POST['title']);
            $description = Utils::cleanInput($_POST['description']);
            $url = Utils::cleanInput($_POST['url']);

            $postModel -> updatePost($id_to_update, $title, $description, $url);

    //         $sql = $db->prepare("UPDATE post SET title = :title, description = :description, image = :url WHERE id = :id");
    //         $sql->bindParam(':title', $title);
    //         $sql->bindParam(':description', $description);
    //         $sql->bindParam(':url', $url);
    //         $sql->bindParam(':id', $id_to_update);
    //         $sql->execute();

             header("Location: ?page=admin");
            exit();
    }

    // }
// PARTIE CREATE DU CRUD
} elseif (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['url']) && !empty($_POST['title']) && !empty($_POST['description'] && !empty($_POST['url']))) {


    $title = Utils::cleanInput($_POST['title']);
    $description = Utils::cleanInput($_POST['description']);
    $url = Utils::cleanInput($_POST['url']);

    if ($db) {
        $sql = $db->prepare("INSERT INTO post (user_id, title, description, image) VALUES (:user_id, :title, :description, :url)");
        $sql->bindParam(':user_id', $_SESSION['user']['id']);
        $sql->bindParam(':title', $title);
        $sql->bindParam(':description', $description);
        $sql->bindParam(':url', $url);
        $sql->execute();

        header("Location: ?page=admin");
        exit();

    }
}

include "./views/base.phtml";
