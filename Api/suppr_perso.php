<?php
require_once("pdo.php");

$id = $_POST['select'];

$suppr_requete = "DELETE FROM `personnages` WHERE id=" . $id;

try {
    $declaration = $dbh->query($suppr_requete) ;  
}
catch (PDOException $e){
    echo "La suppression a échouée : ".$e->getMessage();
}

header("Location: ../index.php?msg=personnage%20deleted");

?>