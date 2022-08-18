<?php

require_once('pdo.php');

$lecture_requete = "SELECT * FROM `Personnages`";

try {
    $declaration = $dbh->query($lecture_requete)->fetchAll(PDO::FETCH_ASSOC) ;  
}
catch (PDOException $e){
    echo "Echec lors de la lecture des données : ".$e->getMessage();
}
?>

<table>
    <tr><th>Nom</th><th>Race</th></tr>
    <?php
    foreach($declaration as $element){
        echo ("<tr><td>" . $element['nom'] . "</td><td>" . $element['race'] . "</td></tr>");
    }
    ?>
</table>
