<?php

require_once('pdo.php');

// on construit le menu select pour choisir le personnage a suppr
$lecture_requete = "SELECT nom, id FROM `personnages`";

try {
    $declaration = $dbh->query($lecture_requete)->fetchAll(PDO::FETCH_ASSOC) ;  
}
catch (PDOException $e){
    echo "Erreur lors de la lecture des données : ".$e->getMessage();
}

?>

SUPPRESSION PERSONNAGE<br>
<form method="post" action="suppr_perso.php">
    <select id="mymenu">
        <option value="0">selection perso</option>
        <?php
            foreach($declaration as $element){

                echo "<option value='".$element['id']."'>".$element['nom']."</option>";
            }
        ?>
    </select >
    <button name="select" type="submit">Go</button>
</form>
<a href="../index.php">retour</a>