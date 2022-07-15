<?php 
include_once 'Personnage.php';

class Humain extends Personnage 
{
    public function coupEpee(Personnage $cible): void
    {
        parent::attaquer($cible);
    }
}


?>