<?php
// include permet de charger un fichier externe
// include ne retourne qu'un Warning en cas de problème de chargement

// require permet de faire la même chose mais
// require retourne une erreur fatale en cas d'echec de chargement

require("./05_texte.txt"); // require : si le fichier n'est pas accessible => ERREUR et arrêt execution du code
include("./05_texte.html"); // include : même fonction que require mais sans erreur, juste des warnings
require("./05_code.php");
echo $date;