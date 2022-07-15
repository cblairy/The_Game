<?php 
include_once 'Personnage.php';

class Orque extends Personnage 
{
    public function coupDeMassue(Personnage $cible): void
    {
        parent::attaquer($cible);
    }
}


?>