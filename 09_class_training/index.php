<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html> -->

<?php

require_once("Voiture.php");

echo Voiture::IMMATRICULATION;
Voiture::gonflerLesPneus();


$titine = new Voiture("Peugeot", "3008", "Essence", "Rouge");
echo $titine::IMMATRICULATION;
echo "<br>";
echo $titine->couleur;
echo "<br>";
echo $titine->getQtEnergie();
echo "<br>";
echo $titine->demarrer();
echo "<br>";
echo $titine->getQtEnergie();
echo "<br>";
echo $titine->setQtEnergie(20);
echo "<br>";
echo $titine->getQtEnergie();
echo "<br>";

