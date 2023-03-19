<?php
$connex = "mysql:host=thegame.com;dbname=thegame;";
$utilisateur = 'root';
$mdp = '';

try {
    $dbh = new PDO($connex,$utilisateur,$mdp);  
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$status = $dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS);
    //echo "Connexion réussie, état de la connexion : $status";  
}
catch (PDOException $e){
    echo "Echec de connexion : " . $e->getMessage();
}
