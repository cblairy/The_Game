<?php

require_once('pdo.php');

// on construit le menu select pour choisir le personnage a suppr
$lecture_requete = "SELECT * FROM `Personnages`";

try {
    $declaration = $dbh->query($lecture_requete)->fetchAll(PDO::FETCH_ASSOC) ;  
}
catch (PDOException $e){
    echo "Erreur lors de la lecture des données : ".$e->getMessage();
}
?>
SUPPRESSION PERSONNAGE<br>
<form method="post" action="suppr_perso.php">
    <select id="mymenu" name="select">
        <option value="0">selection perso</option>
        <?php
            foreach($declaration as $element){
                echo "<option value='".$element['personnage_id']."'>".$element['nom']."</option>";
            }
        ?>
    </select>
    <button>Go</button>
</form>
<a href="../index.php">retour</a>