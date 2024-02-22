<?php

$x = 5; //$x is an integer
//methode moderne :
const app="php"; //pour les constantes pas de $ (comme JS)
//methode ancienne :
define("APP","php");
function myCart(){
    global $x;
    echo "<p>Le montant de la commande est de $x €</p>";
    echo "Mon application se nomme ".app;
}
echo "<p>Le montant de la commande est de $x €</p>";
myCart();
