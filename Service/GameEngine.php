<?php 
include 'Helper.php';
include 'Models/Elfe.php';
include 'Models/Orque.php';
include 'Models/Humain.php';


class GameEngine {
    private array $combattants;
    private int $turn;
    private Personnage $combattantActuel;
    private int $indexCombattantActuel;

    public function __construct()
    {
        $this->combattants = [];
        $this->turn = 0;
        $this->addCombattant(new Orque("Balcmeg",9,6,3));
        $this->addCombattant(new Humain("Jean-Bil",6,7,6));
        $this->addCombattant(new Elfe("Legonidas",3,10,10));
        $this->addCombattant(new Orque("Lug",10,5,8));
        $this->addCombattant(new Elfe("Elleronde",4,9,9));
        $this->addCombattant(new Humain("AraCorne",8,8,7));
        $this->addCombattant(new Orque("Othrod",9,6,4));
        $this->addCombattant(new Elfe("Eowyn ",6,9,10));
        $this->addCombattant(new Humain("Isildur",6,7,7));
        $this->addCombattant(new Orque("Orcobal",8,8,1));
        $this->addCombattant(new Elfe("Celebrimbor",5,10,10));
        $this->addCombattant(new Humain("Boromir",6,8,8));
        $this->accident = [
        "s'est foulé la cheville...", 
        "trébuche et plante son arme dans son pied,",
        "se déconcentre en observant la magnifique paysage du Mordor et se prend un coup dans le dos...", 
        "est térrifié a l'idée de sucomber, il tente de s'enfuir mais", 
        "ecoute un morceau de Jul,"];
        $this->indexCombattantActuel = 0;
        $this->combattantActuel = $this->combattants[$this->indexCombattantActuel];
    }
    // declaration des methodes 
    public function addCombattant(Personnage $personnageP): void
    {
       $this->combattants[] = $personnageP;
    }

    public function start(): void
    {   
        //var_dump($this->combattants);
        while(!$this->fin()){            
           $this->tourDeJeu(); 
        }
    }

    public function getId(): void
    {
        // utilité ? Pas pour moi :s
    }

    public function getJoueur(): Personnage
    {
        return $this->combattants[array_rand($this->combattants)];
    }

    public function tourDeJeu(): void
    {   
        $joueurAlea = $this->getJoueur();
        $degats = $this->combattantActuel->attaquer($joueurAlea);
        if($this->combattantActuel === $joueurAlea){
            echo "<p>" . $this->combattantActuel->name . " " . $this->accident[array_rand($this->accident)] . " le pauvre perd " . $degats-1.5 . " PDV.</p>";
        } else {
            echo "<p>" . $this->combattantActuel->name . " frappe et effectue " . $degats . " points de dégats à " .  $joueurAlea->name . " et ses PV tombent à " . $joueurAlea->getPv() . "</p>";
        }
        $this->nettoyerMort();
        $this->prochainAttaquant();
    }

    
    public function prochainAttaquant(): void
    {
        if($this->indexCombattantActuel >= count($this->combattants)-1){
            $this->indexCombattantActuel = 0;
        } else {
            $this->indexCombattantActuel++;
        }
        $this->combattantActuel = $this->combattants[$this->indexCombattantActuel];   
    }

    public function nettoyerMort(): void
    {
        foreach($this->combattants as $key => $combattant)
        {   
            if($combattant->isDead()){
                echo $combattant->name . " est KO.<br>";
                array_splice($this->combattants, $key, 1);
            }
        }
    }

    public function fin(): bool
    {
        // on sort de la boucle while (un perso est KO)
            if(count($this->combattants) == 1){
                echo $this->combattants[0]->name . " gagne la coupe des 4 Maisons !</p>";
                return true;               
            }
        return false; 
    }
}

?>