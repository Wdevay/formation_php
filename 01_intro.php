<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma première page PHP</title>
</head>
<body>
    <h1>Ma première page PHP</h1>
    <?php 
    $date ="29 Janvier 2024"; // $ = variable 
    $total = 50+15; //calcul (entier)
    $delivery = true;  //boolean
    $rate = 0.2; //float
    $vat = $total*$rate; //calcul (float)
    $info = "Vous restez nous devoir la somme de $total+$vat €";
    $array = ["banane"=>"milshake", "pomme"=>"tarte", "orange"=>"jus"]; //tableau associatif
    // var_dump() est une fonction qui permet de debugger facilement
    
    class Voiture{
        public $color ="red";
        public $marque = "Ferrari";
        public $year = 2020;
        public $energy = "essence";
        
        function __construct($c,$m,$y,$e){
            $this->color=$c;
            $this->marque=$m;
            $this->year=$y;
            $this->energy=$e;
        }
    };
    $voiture = new Voiture("bleu","BMW",2017,"essence");
    echo $voiture->marque;
    echo "<br>";
    echo $voiture->color;
    echo "<br>";
    echo $voiture->year;
    echo "<br>";
    echo $voiture->energy;
    echo "<br><br>";

    
    
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
    echo "<br>le montant total HT est : ". $total-$vat . "€<br>"."le montant total TTC est : ". $total . "€<br>"."et la TVA est de : ". $vat . "€<br>"; //. = concaténation
    echo $date;
    phpinfo()
    ?>
</body>
</html>
