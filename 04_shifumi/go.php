<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"></link>
    <style>
        body{
            align-content: center;
        }
        ul{
            display: flex;
            text-decoration: none;
            list-style: none;
        }

    </style>
</head>
<body>
<?php
// 0 = PIERRE   /   1 = FEUILLE    /    2 = CISEAUX
$resultat = '';
$ordi= rand(0,2);

if($_GET['choix']==0){
    $ordi==2?$resultat='GAGNE':($ordi==1?$resultat='PERDU':$resultat='EGALITE');
} else if($_GET['choix']==1){
    $ordi==0?$resultat='GAGNE':($ordi==2?$resultat='PERDU':$resultat='EGALITE');
}
else if($_GET['choix']==2){
    $ordi==1?$resultat='GAGNE':($ordi==0?$resultat='PERDU':$resultat='EGALITE');
}
?>
<H1><?php echo $resultat?></H1>
<ul>
    <li name="choix">
        <div class="card" style="width: 18rem;">
            <img src="img/<?php echo $_GET['choix']?>.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center">Votre choix</h5>
            </div>
        </div>
    </li>
    <li><h2>VS</h2></li>
    <li name="ordi">
        <div class="card" style="width: 18rem;">
        <img src="img/<?php echo $ordi?>.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title" style="text-align: center">Choix de l'ordinateur</h5>
        </div>
        </div>
    </li>
</ul>
<a href="TP_chifumi.php"><button type="button" class="btn btn-primary">REJOUER</button></a>

</body>
</html>
