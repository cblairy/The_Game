<?
require_once('pdo.php');

//print_r(PDO::getAvailableDrivers());


$requete_ajouter = "INSERT INTO `Personnages` (`nom`,`race`,`force_perso`,`pv`,`endurance`) VALUES ('" . $_POST['nom'] . "','" . $_POST['race'] . "','" . $_POST['force_perso'] . "','" . $_POST['pv'] . "','" . $_POST['endurance'] . "')";

try {
    $declaration = $dbh->query($requete_ajouter);
    header("Location: createOK.php");
}
catch (PDOException $e){
    echo "Echec lors de l'ajout du personnage : " . $e->getMessage();
}


?>