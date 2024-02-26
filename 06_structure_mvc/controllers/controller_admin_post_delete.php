<?php 
if (!isset($_SESSION['user'])) {
    header("Location: ?page=login");
    exit();
}
if (!in_array('ROLE_ADMIN', json_decode($_SESSION['user']['roles']))) {
    header("Location: ?page=home");
    exit();
}

if (isset($_GET['id'])) {
    // NB: (int) permet de forcer le type de la variable au type entier
    $id_to_delete=(int)$_GET['id'];

    $db = connectDB();
    if ($db) {
        $sql = $db->prepare("DELETE FROM post WHERE id = :id");
        $sql->bindParam(':id', $id_to_delete);
        $sql->execute();
    
        header("Location: ?page=admin");
        exit();  
    }  
}