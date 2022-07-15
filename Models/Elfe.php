<?php 
include_once 'Personnage.php';

class Elfe extends Personnage {
    public function tireUneFleche(Personnage $cible): void
    {
        parent::attaquer($cible);
    }
}


?>