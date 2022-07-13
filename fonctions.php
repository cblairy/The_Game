<?php 
// fonction d'assistance pour afficher ce qu'on veut dans la console
function console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log(' $output ');</script>";
}


class Personnage {
    // declaration des proprietes 
    function __construct(string $name, int $force, int $pv, int $endurance){
        $this->name = $name;
        $this->force = $force;
        $this->pv = $pv;
        $this->endurance = $endurance;
    }

    // declaration des methodes 
    public function attaquer($cible){
        $cible->pv += -(1 + (0.2*$this->force));
        console("$this->name tape du ". (1 + (0.25)*$this->force) ." sur $cible->name, il lui reste : $cible->pv");
        echo "$this->name tape du ". (1 + (0.25)*$this->force) ." sur $cible->name, il lui reste : $cible->pv<br>";
    }
}

$homme = new Personnage("homme",6,7,6);
$orque = new Personnage("orque",10,7,2);
$elfe = new Personnage("elfe",3,10,10);



?>