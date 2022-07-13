<?php
include 'fonctions.php';

function combat($combattant1,$combattant2){
    while($combattant1->pv > 0 && $combattant2->pv > 0){
        // CREATION DU CONTENU DU COMBAT
        
        if($combattant1->pv + $combattant1->endurance > $combattant2->pv + $combattant2->endurance){
            $combattant1->attaquer($combattant2);
            $combattant2->attaquer($combattant1);
        } else {
            $combattant2->attaquer($combattant1);
            $combattant1->attaquer($combattant2);
        }
    }
    // on sort de la boucle while (un perso est KO)
    if($combattant1->pv <= 0){
        console("$combattant1->name est KO.");
        echo "$combattant1->name est KO.";
    } else {
        console("$combattant2->name est KO.");
        echo "$combattant2->name est KO.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battle</title>
</head>
<body style=" background:url('images/sda.webp')">
<h1 style="background:white; width:400px; border-radius: 5px; padding:10px">PRET POUR LA BASTON ?</h1>
    <label for="champions" style="background:white; padding:5px; border-radius:5px">Choix du premier Champion</label>
    <select name="champions" id="champions">
        <option value="">--Choix1--</option>
        <option value="$homme">Homme</option>
        <option value="$elfe">Elfe</option>
        <option value="$orque">Orque</option>
    </select>
<br>
    <label for="champions2" style="background:white; padding:5px;border-radius:5px">Choix du second Champion</label>
    <select name="champions2" id="champions2">
        <option value="">--Choix 2--</option>
        <option value="$homme">Homme</option>
        <option value="$elfe">Elfe</option>
        <option value="$orque">Orque</option>
    </select>
    <div style="background-color:white; width:310px; border-radius:5px; padding:10px" >
    le choix n'est pas encore disponible, oupsi<br><br>
    <?php
    combat($homme,$elfe);
    ?>
    </div>
</body>
<script type="text/javascript" src="index.js"></script>
</html>

