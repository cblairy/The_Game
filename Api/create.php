<?php
require_once('pdo.php');

$requete_ajouter = "INSERT INTO personnages (nom,`race`,`force_perso`,`pv`,`endurance`) 
    VALUES ('" . $_POST['nom'] . "',
        '" . $_POST['race'] . "',
        '" . $_POST['force_perso'] . "',
        '" . $_POST['pv'] . "',
        '" . $_POST['endurance'] . "'
    )";

try {
    $dbh->query($requete_ajouter);
    header("Location: createOK.php");
}
catch (PDOException $e){
    echo "Echec de connexion : " . $e->getMessage();
}


