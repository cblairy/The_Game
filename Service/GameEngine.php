<?php 
include 'Helper.php';
include 'Models/Elfe.php';
include 'Models/Orque.php';
include 'Models/Humain.php';

class GameEngine {
    private array $combattants;
    private Personnage $combattantActuel;
    private int $indexCombattantActuel;
    private array $accident;

    public function __construct()
    {
        $this->combattants = array();
        $this->addCombattant(new Orque("Balcmeg",9,6,3));
        $this->addCombattant(new Humain("Jean-Bil",6,7,6));
        $this->addCombattant(new Elfe("Legonidas",3,10,10));
        $this->addCombattant(new Orque("Lug",10,5,8));
        $this->addCombattant(new Elfe("Elrond",4,9,9));
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
            "se déconcentre en observant la magnifique paysage du Mordor...", 
            "est térrifié a l'idée de sucomber, il tente de s'enfuir mais échoue", 
            "ecoute un morceau de Jul,"
        ];
        $this->indexCombattantActuel = 0;
        $this->combattantActuel = $this->combattants[$this->indexCombattantActuel];
    }
    // declaration des methodes 
    public function addCombattant(Personnage $personnageP): void
    {
       array_push($this->combattants, $personnageP);
    }

    public function getCombattantsList(): array
    {
        return $this->combattants;
    }

    public function start(): void
    {   
        $dbh = new PDO("mysql:host=thegame.com;dbname=thegame;", "root", "");
        $joueurs = $dbh->query("SELECT * FROM `personnages`")->fetchAll(PDO::FETCH_ASSOC);
        foreach($joueurs as $joueur) {
            if($joueur["race"] == "orque")
                $this->addCombattant(new Orque($joueur["nom"], $joueur["force_perso"], $joueur["pv"], $joueur["endurance"]));
            if($joueur["race"] == "homme")
                $this->addCombattant(new Humain($joueur["nom"], $joueur["force_perso"], $joueur["pv"], $joueur["endurance"]));
            if($joueur["race"] == "elfe")
                $this->addCombattant(new Elfe($joueur["nom"], $joueur["force_perso"], $joueur["pv"], $joueur["endurance"]));
        }
        
        while(!$this->fin()){            
           $this->tourDeJeu(); 
        }
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
            echo "<p>" . $this->combattantActuel->getName() . " " . $this->accident[array_rand($this->accident)] . " le pauvre perd " . $degats-1.5 . " PDV.</p>";
        } else {
            echo "<p>" . $this->combattantActuel->getName() . " frappe et effectue " . $degats . " points de dégats à " .  $joueurAlea->getName() . " et ses PV tombent à " . $joueurAlea->getPv() . "</p>";
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
                echo $combattant->getName() . " est KO.<br>";
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