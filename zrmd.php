<form action="" method="POST">
    <input type="date" name="date">
    <input type="time" name="time">
    <button type="submit" name="1">s</button>
</form>
<form action="" method="POST">
    Dans...
    <label for="jour">Jours</label>
    <input type="number" name="jour">
    <label for="heure">Heures</label>
    <input type="number" name="heure">
    <label for="minute">Minutes</label>
    <input type="number" name="minute">
    <label for="seconde">Secondes</label>
    <input type="number" name="seconde">
    <button type="submit" name="2">s</button>
</form>

<?php
    if(isset($_POST["1"])) {
        if(empty($_POST["time"])) {
            $time = date("H:i:s");
        } else {
            $time = $_POST["time"] . ":00";
        }
        if(empty($_POST["date"])) {
            $date = date("Y-m-d");
        } else {
            $date = $_POST["date"];
        }
        $total = "$date $time";
        echo "$total <br>";
        // date("Y-m-d H:i:s"); get the current date
    } else if(isset($_POST["2"])) {
        $sec = 0;
        if(!empty($_POST["jour"])) {
            $sec += (intval($_POST["jour"]) * 86400);
        }
        if(!empty($_POST["heure"])) {
            $sec += (intval($_POST["heure"]) * 3600);
        }
        if(!empty($_POST["minute"])) {
            $sec += (intval($_POST["minute"]) * 60);
        }
        if(!empty($_POST["seconds"])) {
            $sec += (intval($_POST["seconds"]));
        }
        echo date('Y-m-d H:i:s', time() + $sec);
    }