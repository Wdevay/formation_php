<?php

class Voiture
{
    // Constante
    Const IMMATRICULATION = "AA-123-AA";

    // Propriétés
    public ?string $marque;
    public $modele = "";
    public $energie = "";
    public $couleur = "";
    private ?int $qt_energie = 30;


    // Méthode magique __construct
    // Constructeur qui permet de déclencher du code à l'instanciation
    public function __construct($marque, $modele, $energie, $couleur)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->energie = $energie;
        $this->couleur = $couleur;
    }

    // Méthodes
    public function demarrer()
    {
        for ($i=$this->qt_energie; $i>0; $i-=10) {
            echo "<p>Vroum vroum vroum</p>";
            $this->qt_energie = $i;
        }
        
    }

    public function getQtEnergie()
    {
        return $this->qt_energie;
    }

    public function setQtEnergie($qt)
    {
        $this->qt_energie += $qt;
    }

    public static function gonflerLesPneus() {
        echo "<p>Pneus gonflés</p>";
    }
}
