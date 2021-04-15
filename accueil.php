<link rel="stylesheet" href="css/accueil.css">

<?php

?>
<form action="" method="POST">
    <div class="row d-flex justify-content-center container">
        <div class="col-md-8">
            <div class="card-hover-shadow-2x mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Ajouter un To-do</div>
                </div>
                <div class="scroll-area-sm">
                    <perfect-scrollbar class="ps-show-limits">
                        <div style="position: static;" class="ps ps--active-y">
                            <div class="ps-content">
                                <ul class=" list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="todo-indicator bg-warning"></div>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">
                                                        <input type="text" name="desc" id="" placeholder="Texte">
                                                        <p>Rappel dans :</p>
                                                        <input type="number" name="jour" id="" placeholder="Jour">
                                                        <input type="number" name="heure" id="" placeholder="Heure">
                                                        <input type="number" name="minute" id="" placeholder="Minutes">
                                                        <input type="number" name="seconde" id="" placeholder="Secondes">
                                                        <p id="ou">Ou</p>
                                                        <p>Rappel le :</p>
                                                        <input type="date" name="date" id="">
                                                        <input type="time" name="time" id="">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </perfect-scrollbar>
                </div>
                <div class="d-block text-right card-footer"><input class="btn btn-primary" type="submit" name="ajout" value="Ajouter"></div>
            </div>
        </div>
    </div>
</form> 
<?php

if(isset($_POST["ajout"])) {
    if (!empty($_POST["time"]) || !empty($_POST["date"])) {
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
        $date = "$date $time";
    } else {
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
        $date = date('Y-m-d H:i:s', time() + $sec);
    }
    $Bdd->query("INSERT INTO reminds (usersid, description, date) VALUES ('$_SESSION[id]','$_POST[desc]','$date')");
    $msg = "Votre rappel ('$_POST[desc]') pour le $date a bien été validé.";
}

if (isset($msg)) {
    ?>
    <script>
        alert("<?php echo $msg;?>");
        document.location.href="index.php?p=accueil";
    </script>
    <?php
    
}
// fonction starts with
function str_starts_with ( $haystack, $needle ) {
    return strpos( $haystack , $needle ) === 0;
}
if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        if(str_starts_with($key, 'sup-')) {
            $id = explode("-",$key)[1];
            $req2 = "DELETE FROM reminds WHERE id = '$id'";
            $ORes2 = $Bdd->query($req2);
        }
    }
}

$req = "SELECT * FROM reminds WHERE usersid = '$_SESSION[id]' ORDER BY date asc";
$ORes = $Bdd->query($req);
?>

<div class="row d-flex justify-content-center container">
<div class="col-md-8">
    <div class="card-hover-shadow-2x mb-3 card">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;To-do List</div>
        </div>
        <div class="scroll-area-sm">
            <perfect-scrollbar class="ps-show-limits">
                <div style="position: static;" class="ps ps--active-y">
                    <div class="ps-content">
<?php
while ($reminds = $ORes->fetch()){?>
                            <ul class=" list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading"><?php if(!empty($reminds->description)){ echo($reminds->description);} ?>
                                                <?php
                                                    $date1 = strtotime(date("Y-m-d H:i:s")); $date2 = strtotime($reminds->date);
                                                    if (($date2 - $date1) <= 0) {
                                                        ?> <div class="badge badge-info ml-2">NOW</div> <?php
                                                    }
                                                ?>
                                                </div>
                                                <div class="widget-subheading"><i><?php if(!empty($reminds->date)){ echo($reminds->date);} ?></i></div>
                                            </div>
                                            <div class="widget-content-right"> <form action="" method="POST"><button class="border-0 btn-transition btn btn-outline-danger" name="sup-<?php echo $reminds->id;?>"> <i class="fa fa-trash"></i> </button></form> </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                         <?php
}
?>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
        </div>
    </div>
</div>