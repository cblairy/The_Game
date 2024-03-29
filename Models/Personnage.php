<?php 


class Personnage {
    // declaration des proprietes 
    protected int $id;

    function __construct(
        public string $name,
        public int $force,
        public float $pv,
        public int $endurance
    ) {
        $this->name = $name;
        $this->force = $force;
        $this->pv = $pv;
        $this->endurance = $endurance; 
    }

    // declaration des methodes 
    public function getId(): int
    {
        return $this->id;
    }

    public function attaquer(Personnage $cible): float
    {
        $degats = 0.5 + (0.25*$this->force + (rand(0,20)/10));
        $cible->setPV($cible->getPV() - $degats);
        return $degats;
    }

    public function isDead(): bool
    {
        return $this->pv <= 0 ;
    }

    public function getPV(): float // pour gerer le pv = 0
    {
        return $this->pv;
    }

    public function setPV(float $pv): void
    {
        if($pv < 0){$pv = 0;}
        $this->pv = $pv;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function getForce(): int 
    {
        return $this->force;
    }

    public function getEndurance(): int 
    {
        return $this->endurance;
    }

}




?>