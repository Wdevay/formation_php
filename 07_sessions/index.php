<?php 
// Pour que la session fonctionne
// ON DOIT IMPERATIVEMENT AVOIR
// un session_start au début de chaque fichier
session_start();
// les informations sont stockées dans $_SESSION
// son contenu est accessible de partout et est librement modifiable
$_SESSION['nom'] = "Toto";
$_SESSION['plats preferes'] = array("pizza","pates","salade");
echo "<pre>";
var_dump($GLOBALS);
echo "</pre>";





?>