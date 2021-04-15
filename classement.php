<div style="display:flex;justify-content:center;text-align:center;border-radius: 5px 5px;margin-bottom:20px;">
    Voici le classement des membres qui ont crées le plus de rappels ! Ce sont les plus actifs sur notre plateforme.
</div>
<?php
$Stats = ($Bdd->query("SELECT SUM(remindnb) as somme, AVG(remindnb) as moyenne FROM `stats`"))->fetch();
?>
<div style="display:flex;justify-content:center;text-align:center;border-radius: 5px 5px;margin-bottom:100px;">
<?php echo $Stats->somme; ?> rappels ont étés crée en tout sur la plateforme, avec une moyenne de <?php echo intval($Stats->moyenne); ?> rappels par utilisateurs, wow!
</div>
<?php
$nb = 1;
$ORes = $Bdd->query("SELECT s.remindnb, u.nom, u.prenom, u.image FROM stats as s LEFT JOIN users as u ON id = s.usersid GROUP BY s.remindnb DESC");
while ($Usr = $ORes->fetch()) {
    if ($nb == 10) {break;} // top 10

    ?>
    <div style="display:flex;justify-content:center;text-align:center;border-radius: 5px 5px;background-color: white;margin:25px;margin-right:640px;margin-left:640px;">
    <?php
        if(!empty($Usr->image)) { echo "<img src='user_picture/$Usr->image' alt='photo' style='width:50px;height:50px;border-radius:5px;margin-right:10px'>"; } else { echo "<img src='images/user.png' alt='photo' style='width:50px;height:50px;border-radius:5px;margin-right:10px'>"; } 
        echo "$Usr->nom $Usr->prenom<br>$Usr->remindnb rappels crées !";
    ?>
    </div>
    <?php

    $nb += 1;
}