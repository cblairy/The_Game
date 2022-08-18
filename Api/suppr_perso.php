<?php
require_once("pdo.php");

$userID = $_POST['select'];

$suppr_requete = "DELETE FROM `Personnages` WHERE personnage_id=" . $userID;

try {
    $declaration = $dbh->query($suppr_requete) ;  
}
catch (PDOException $e){
    echo "La suppression a échoué : ".$e->getMessage();
}

header("Location: ../index.php?msg=personnage%20deleted");

?>