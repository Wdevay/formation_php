<?php
//afficher la date et l'heure en jj/mm/aaaa hh:mm:ss

$date = date("d/m/Y H:i:s"); 
echo "<h1>$date</h1>"."<br/><br/>";

//afficher le nombre de secondes écoulées depuis le 1er janvier 1970 jusqu'à maintenant
$seconds = time();
echo "Le nombre de secondes écoulées depuis le 1er janvier 1970 est : $seconds <br><br>";

//afficher Pi
echo "<h3>".pi()."</h3>";

$random = rand(0,9);
echo "Le nombre aleatoire est : <strong> $random</strong>";
$array_img = [
    "https://images.pexels.com/photos/19985055/pexels-photo-19985055/free-photo-of-rhume-neige-bois-mer.jpeg",
    "https://images.pexels.com/photos/14983437/pexels-photo-14983437/free-photo-of-monument-italie-cathedrale-urbain.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    "https://images.pexels.com/photos/19526798/pexels-photo-19526798/free-photo-of-paysage-colline-arbre-automne.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    "https://images.pexels.com/photos/18173019/pexels-photo-18173019/free-photo-of-nourriture-rhume-amour-gens.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    "https://images.pexels.com/photos/8005072/pexels-photo-8005072.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    "https://images.pexels.com/photos/19992348/pexels-photo-19992348/free-photo-of-clairiere-ete-soleil-jardin.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    "https://images.pexels.com/photos/19891046/pexels-photo-19891046/free-photo-of-ville-rue-building-retro.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    "https://images.pexels.com/photos/19923206/pexels-photo-19923206/free-photo-of-personne-gens-femme-detente.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    "https://images.pexels.com/photos/19915878/pexels-photo-19915878/free-photo-of-neige-aube-paysage-soleil-couchant.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    "https://images.pexels.com/photos/15374913/pexels-photo-15374913/free-photo-of-ciel-voler-motif-liberte.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
];





echo "<img src=\"$array_img[$random]\" alt=\"image\" height=\"50%\" width=\"50%\">";

echo "<h3>Compter le nombre d'entrées dans un tableau</h3>";
echo count($array_img);

echo "<h3>le tableau en json </h3>".json_encode($array_img);