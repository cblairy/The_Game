<?php
include 'Service/GameEngine.php';

$gameEngine = new GameEngine();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Battle Royal SDA !</title>
</head>

<body>
    <div id="content">
        <div id="form">
            <br>
            <!-- DEBUT FORMULAIRE -->
            <form method="post" action="./Api/create.php">
                <label>Choix du personnage</label>
                <select name="race" id="race">
                    <option value="0">Selection...</option>
                    <option value="homme">Homme</option>
                    <option value="elfe">Elfe</option>
                    <option value="orque">Orque</option>
                </select>
                <br><br>
                    Nom du Personnage: <input type="text" name="nom" required>
                <br>
                    Force : <input type="number" name="force_perso" max="10" required>
                <br>
                    Points de vie : <input type="number" name="pv" required>
                <br>
                    Endurance : <input type="number" name="endurance" required>
                <br><br>
                <button>Go</button>
            </form>
            <a href="./Api/delete.php">supprimer un personnage</a>
        </div>
        <div id="baston">
            <h1>PRET POUR LA BASTON ?</h1>
            <form method="post" action="index.php">
                <button type="submit" name="start"> COMMENCER </button>
            </form>

            <?php
            if (isset($_POST['start'])) {
               $gameEngine->start();
            } ?>
        </div>

        <div id="participants">
            <?php include './Api/lecture.php'; ?>
        </div>
    </div>

</body>

</html>