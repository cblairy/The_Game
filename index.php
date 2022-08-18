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
<h1>PRET POUR LA BASTON ?</h1>
<div id="form">
    <? include './Api/lecture.php'?>
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
        Nom du Personnage: <input type="text" name="nom">
        <br>
        Force : <input type="number" name="force_perso" max="10">
        <br>
        Points de vie : <input type="number" name="pv">
        <br>
        Endurance : <input type="number" name="endurance">
        <br><br>
        <button>Go</button>
    </form>
    <a href="./Api/delete.php">supprimmer un personnage</a>
</div>
    <div>
    <?php
    $gameEngine->start();
    ?>
    </div>
</body>
<script type="text/javascript" src="index.js"></script>
</html>

