<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site modulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html{
            position: relative;
            min-height: 100%;
        }
        #carouselExampleIndicators img{
            aspect-ratio: 16/10;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 40px;
            line-height: 40px;
        }
    </style>
</head>

<body class="block">
    <header>
    <?php
    require("header.php");
    ?>
    </header>
    <main class="container-fluid">
        <?php
        // Si la var page est définie dans l'url on la récupère sinon c'est "home"
        $getPage = isset($_GET['page']) ? $_GET['page'] : "home";
        //on définit le parcours pour charger la page souhaitée
        $path = "./pages/" . $getPage . ".php";
        // Si le fichier existe on le charge sinon on charge la page "home"
        $page = file_exists($path) ? $path : "./pages/home.php";
        include($page);
        ?>
    </main>
    <footer class="footer">
    <?php
    require("footer.php");
    ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>