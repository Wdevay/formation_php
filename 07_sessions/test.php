<pre><?php
session_start();
// echo session_encode();
echo "Bonjour " . $_SESSION['nom'];
var_dump($_SESSION);