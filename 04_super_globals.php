<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test des $GLOBALS dans un formulaire</title>
    <style>
        input {
            display: block;
        }
    </style>
</head>
<body>
    <?php
        // si la variable avatar arrive par le biais de la methode FILE
        // on copie le fichier $_FILES['avatar'] dans le dossier uploads

        /************************VERSION CODEIUM*****************************
        if (isset($_FILES['avatar'])) {
            echo "<h2> on upload le fichier </h2>";
            //on verifie que le fichier a bien une extension autorisee
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            if (!in_array($extension, ['png', 'jpg', 'jpeg'])) {
                die("extension non autorisee");
            }
            
            //on verifie que le poids du fichier est inferieur ou egale a 5Mo
            if ($_FILES['avatar']['size'] > 5000000) {
                die("fichier trop lourd");
            }

            //on renomme le fichier pour eviter les conflits
            do {
                $nomFichier = "avatar_" . time() . ".{$extension}";
            } while (file_exists('uploads/' . $nomFichier));

            //on deplace le fichier vers le dossier uploads
            move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/' . $nomFichier);

            //on envoi un message de succes
            echo "Le fichier a ete upload avec succes<br />";
            echo "Vous pouvez maintenant <a href='index.php'>retourner</a>";
        } else {
            echo "<h2> on ne upload pas le fichier </h2>";
            }
        *************************************************************************/
        /********************VERSION COURS***************************************/
        //On initialise un tableau d'erreurs potentielles vide au départ
        $errors = [];

        
        if (isset($_FILES['avatar'])) {
            // On définit les types mimi acceptés
            $accepted= ["image/png","image/jpeg"];
            echo "<h2> on upload le fichier </h2>";
            //On doit transformer le nom de fichier en tableau array
            //afin d'en extraire l'extension
            $arrayName = explode(".",$_FILES['avatar']['name']);
            $extension = strtolower(end($arrayName)); //strtolower pour lower case et end pour extraire le dernier element du tableau
            //var_dump($extension);
            //die();
            // Si le type de fichier n'existe pas dans les types acceptés on génere une erreur
            if(!in_array($extension,$accepted)){ // ou (!in_array($_FILES['avatar']['type'],$accepted))
                $errors[]="Extension (".$extension.") n'est pas accepté";//equivalent à un array.push() (ca met à la suite)
            }
            // Si l'un des champs est vide on génère une erreur
            if(empty($_POST['name'])||empty($_POST['email'])||empty($_¨POST['password'])|empty($_FILES['avatar'])){
                $errors[]="Tous les champs sont obligatoires merci";
            }

            //On définit un nouveau nom
            $newFile = "./uploads/avatar_".time().".png";
            //SI LE TABLEAU DES ERREURS EST VIDE ALORS :
            //On copie le fichier dans le dossier uploads
            if(empty($errors)) {
            move_uploaded_file($_FILES['avatar']['tmp_name'],$newFile);
            echo "<h2>le fichier a été uploadé</h2>";
            }
        }

        echo "<pre>";
        var_dump($errors);
        echo "</pre>";

        
    ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data"> <!--//methode POST pour envoyer des informations au serveur et GET pour recevoir (GET par défaut) et afficher les info dans l'URL
        <input type="text" name="nom"/>  //name correspond à la clé de l'array qui va recevoir les données du formulaire -->
        <label for="name">Name*</label> <!-- for correspond à la clé de l'input et l'id de l'input permet de lier le label et l'input (focus)-->
        <input type="text" name="name" id="name" required>
        <label for="email">Email*</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password*</label>
        <input type="password" name="password" id="password" required>
        <label for="avatar">Avatar*</label>
        <input type="file" multiple name="avatar" id="avatar"  accept=".jpg,.jpeg,.gif,.png" required>    <!-- accept pour borner les extensions au niveau client mais pas protégé-->
        <input type="submit" value="envoyer" required>
    </form>
    <?php
    echo "<pre>";
    var_dump($_SERVER);
    echo "</pre>";
    ?>
</body>
</html>