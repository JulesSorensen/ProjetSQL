<link rel="stylesheet" href="css/accueil.css">

<?php


?>
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
                                                    <input type="text" name="" id="" placeholder="Texte">
                                                    <p>Rappel dans :</p>
                                                    <input type="number" name="" id="" placeholder="Jour">
                                                    <input type="number" name="" id="" placeholder="Heure">
                                                    <input type="number" name="" id="" placeholder="Minutes">
                                                    <input type="number" name="" id="" placeholder="Secondes">
                                                    <p id="ou">Ou</p>
                                                    <p>Rappel le :</p>
                                                    <input type="date" name="" id="">
                                                    <input type="time" name="" id="">

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
            <div class="d-block text-right card-footer"><input class="btn btn-primary" type="submit" value="Ajouter"></div>
        </div>
    </div>
</div>

<?php
$req = "SELECT * FROM reminds WHERE usersid = '$_SESSION[id]'";
$ORes = $Bdd->query($req);   ?>

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
                                                <div class="widget-heading"><?php if(!empty($reminds->description)){ echo($reminds->description);} ?><div class="badge badge-info ml-2">NOW</div>
                                                </div>
                                                <div class="widget-subheading"><i><?php if(!empty($reminds->date)){ echo($reminds->date);} ?></i></div>
                                            </div>
                                            <div class="widget-content-right"> <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> </div> <!--POUBELLE-->
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