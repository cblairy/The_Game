<?php

require_once('pdo.php');

$lecture_requete = "SELECT * FROM `personnages`";

try {
    $declaration = $dbh->query($lecture_requete)->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Echec lors de la lecture des données : " . $e->getMessage();
}
?>
<h1>Participants</h1>
<table>
    <thead>
        <tr>
            <th colspan="2">Nom</th>
            <th colspan="2">Race</th>
            <th colspan="2">PV</th>
            <th colspan="2">Force</th>
            <th colspan="2">Endurance</th>
        </tr>
    </thead>
    <tbody>
      
    <?php
    foreach ($declaration as $element) {
        echo ("<tr>
                <td colspan='2'>" . $element['nom'] . "</td>
                <td colspan='2'>" . $element['race'] . "</td>
                <td colspan='2'>" . $element['pv'] . "</td>
                <td colspan='2'>" . $element['force_perso'] . "</td>
                <td colspan='2'>" . $element['endurance'] . "</td>
            </tr>"
        );
    }
    ?>
    </tbody>
</table>