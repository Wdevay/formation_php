<?php 
if (!isset($_SESSION['user'])) {
    header("Location: ?page=login");
    exit();
}
if (!Utils::isRole('ROLE_ADMIN')) {
    header("Location: ?page=home");
    exit();
}

if (isset($_GET['post_id'])) {
    // NB: (int) permet de forcer le type de la variable au type entier
    $id_to_delete=(int)$_GET['id'];

    $db = Utils::connectDB();
    if ($db) {
        $sql = $db->prepare("DELETE FROM post WHERE id = :id");
        $sql->bindParam(':id', $id_to_delete);
        $sql->execute();
    
        header("Location: ?page=admin");
        exit();  
    }  
}

if (isset($_GET['com_id'])) {
    // NB: (int) permet de forcer le type de la variable au type entier
    $id_to_delete=(int)$_GET['com_id'];

    $db = Utils::connectDB();
    if ($db) {
        $sql = $db->prepare("SELECT post_id FROM comments WHERE id = :id");
        $sql->bindParam(':id', $id_to_delete);
        $sql->execute();
        $post_id = $sql->fetch(PDO::FETCH_ASSOC);

        $sql = $db->prepare("DELETE FROM comments WHERE id = :id");
        $sql->bindParam(':id', $id_to_delete);
        $sql->execute();
    
        header("Location: ?page=post_detail&id=" . $post_id['post_id']);
        exit();  
    }  
}