<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"></link>
    <style>
        .choix{
            display: flex;
            justify-content: center;
            margin-top: 10rem;
        }
        a {
            text-decoration: none;
            color: black;
            list-style: none;
        }
        section{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    //ON VA FAIRE UN CHIFUMI EN PHP

    ?>
    <section>
        <H1>Joue avec moi</H1>
        <ul class="choix">
            <a href="go.php?choix=0" name="pierre">
                <li>
                    <div class="card" style="width: 18rem;">
                    <img src="img/0.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">PIERRE</h5>
                    </div>
                    </div>
                </li>
            </a>
            <a href="go.php?choix=1" name="feuille">
                <li>
                    <div class="card" style="width: 18rem;">
                    <img src="img/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">FEUILLE</h5>
                    </div>
                    </div>
                </li>
            </a>
            <a href="go.php?choix=2" name="ciseaux">
                <li>
                    <div class="card" style="width: 18rem;">
                    <img src="img/2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">CISEAUX</h5>
                    </div>
                    </div>
                </li>
            </a>
    </section>
    </body>
</html>