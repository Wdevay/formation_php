<?php
if (!isset($_SESSION['user'])){
    header('Location: ?page=home');
    exit();
}

$state = [
    "Auvergne-Rhône-Alpes",
    "Bourgogne-Franche-Comté",
    "Bretagne",
    "Centre-Val de Loire",
    "Corse",
    "Grand Est",
    "Hauts-de-France",
    "Ile-de-France",
    "Normandie",
    "Nouvelle-Aquitaine",
    "Occitanie",
    "Pays de la Loire",
    "Provence Alpes Côte d’Azur",
    "Guadeloupe",
    "Guyane",
    "Martinique",
    "Mayotte",
    "Réunion"
];

if (isset($_GET['id'])) {
    $user_id = (int)$_GET['id'];
}
else {
    $user_id = (int)$_SESSION['user']['id'];
}


$db=connectDB();

if ($db){
    $sql= $db->prepare("SELECT * FROM user INNER JOIN contact ON user.id = contact.user_id WHERE user.id = :id");
    $sql->bindParam(':id',$user_id, PDO::PARAM_INT);	
    $sql->execute();

    $user = $sql->fetch(PDO::FETCH_ASSOC);
}


$errors=[];

if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email'])  && !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['email'])) {

    $name = cleanInput($_POST['name']);
    $firstname = cleanInput($_POST['firstname']);
    $email = cleanInput($_POST['email']);
    $adress = cleanInput($_POST['adress']);
    $adress2 = cleanInput($_POST['adress2']);
    $city = cleanInput($_POST['city']);
    $state = cleanInput($_POST['state']);
    $code_postal = cleanInput($_POST['code_postal']);
    $message = cleanInput($_POST['message']);

    if (isset($_FILES['avatar']) && !empty($_FILES['avatar'])) {
        $accepted= ["jpg","png","jpeg","gif","svg","webp"];
        $arrayName = explode(".",$_FILES['avatar']['name']);
        $extension = strtolower(end($arrayName)); 
        if(!in_array($extension,$accepted)){ 
            $errors[]="Extension (".$extension.") n'est pas accepté";
        }
        if(empty($_FILES['avatar'])){
            $errors[]="Tous les champs sont obligatoires merci";
        }
        $newFile = "./assets/images/avatar_".time().".".$extension;
        if(empty($errors)) {
        move_uploaded_file($_FILES['avatar']['tmp_name'],$newFile);
        unlink($user['avatar']);
        $avatar = $newFile;
        }
    }
    else {
        $avatar = $user['avatar'];
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Veuillez renseigner une adresse email valide svp";
    }

    if ($db) {
        $sql = $db->prepare("SELECT email FROM user  WHERE email = :email");
        $sql->bindParam(':email',$email);
        $sql->execute();
        $email_already_used = $sql->fetchColumn();
    }

    if ($email_already_used&&$email!=$user['email']) {
        $errors[] = "Cette adresse e-mail est déjà utilisée";
    }
    if (empty($errors)) {
        if ($db) {
            // PARTIE USER
            $sql = $db->prepare('UPDATE user SET avatar = :avatar, email = :email WHERE id = :id');
            $sql->bindParam(':id', $user_id);
            $sql->bindParam(':avatar', $avatar);
            $sql->bindParam(':email', $email);
            $sql->execute();


            // PARTIE CONTACT
            $query = $db->prepare('UPDATE contact SET name = :name, firstname = :firstname, adress = :adress, adress2 = :adress2, city = :city, state = :state, code_postal = :code_postal, message = :message WHERE user_id = :user_id');
            $query->bindParam(':user_id', $user_id);
            $query->bindParam(':name', $name);
            $query->bindParam(':firstname', $firstname);
            $query->bindParam(':adress', $adress);
            $query->bindParam(':adress2', $adress2);
            $query->bindParam(':city', $city);
            $query->bindParam(':state', $state);
            $query->bindParam(':code_postal', $code_postal);
            $query->bindParam(':message', $message);
            $query->execute();


        }


    }
}

if ($db){
    $sql= $db->prepare("SELECT * FROM user INNER JOIN contact ON user.id = contact.user_id WHERE user.id = :id");
    $sql->bindParam(':id', $user_id);	
    $sql->execute();

    $user = $sql->fetch(PDO::FETCH_ASSOC);
}

// if (isset($_GET['id'])) {
//     header("Location: ?page=admin_user");
//     exit();
// }

include "./views/base.phtml";
?>