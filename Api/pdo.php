<?php
$connex = "mysql:dbname=thegame;host=db:3306;";
$utilisateur = 'coco';
$mdp = '0000';

try {
    $dbh = new PDO($connex,$utilisateur,$mdp);    
}
catch (PDOException $e){
    echo "Echec de connexion : " . $e->getMessage();
}
