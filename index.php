<?php
include 'Service/GameEngine.php';

$gameEngine = new GameEngine();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battle Royal SDA !</title>
</head>
<body style=" background:url('images/sda.webp')">
<h1 style="background:white; width:400px; border-radius: 5px; padding:10px">PRET POUR LA BASTON ?</h1>
    <label for="champions" style="background:white; padding:5px; border-radius:5px">Choix du premier Champion</label>
    <select name="champions" id="champions">
        <option value="">--Choix1--</option>
        <option value="$homme">Homme</option>
        <option value="$elfe">Elfe</option>
        <option value="$orque">Orque</option>
    </select>
    <label for="champions2" style="background:white; padding:5px;border-radius:5px">Choix du second Champion</label>
    <select name="champions2" id="champions2">
        <option value="">--Choix 2--</option>
        <option value="$homme">Homme</option>
        <option value="$elfe">Elfe</option>
        <option value="$orque">Orque</option>
    </select><br><br>
    <div style="background-color:white; width:400px; border-radius:5px; padding:10px" >
    le choix n'est pas encore disponible, oupsi<br><br>
    <?php
    $gameEngine->start();
    ?>
    </div>
</body>
<script type="text/javascript" src="index.js"></script>
</html>

