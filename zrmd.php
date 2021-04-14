<form action="" method="POST">
    <input type="date" name="date">
    <input type="time" name="time">
    <button type="submit">s</button>
</form>

<?php
    if(isset($_POST["date"])) {
        print_r($_POST["date"] . " ");
        print_r($_POST["time"]);
        echo "<br>";
        // date("Y-m-d H:i:s"); get the current date
        print_r(date_create());
    }