<div style="display:flex;justify-content:center;text-align:center;border-radius: 5px 5px;margin-bottom:20px;">
    Voici le classement des 10 membres qui ont crées le plus de rappels ! Ce sont les plus actifs sur notre plateforme.
</div>
<?php
$Stats = ($Bdd->query("SELECT SUM(remindnb) as somme, AVG(remindnb) as moyenne FROM `stats`"))->fetch();
?>
<div style="display:flex;justify-content:center;text-align:center;border-radius: 5px 5px;margin-bottom:100px;">
<?php echo $Stats->somme; ?> rappels ont étés crées en tout sur la plateforme, avec une moyenne de <?php echo intval($Stats->moyenne); ?> rappels par utilisateurs, wow!
</div>
<?php
$nb = 1;
$ORes = $Bdd->query("SELECT s.remindnb, (DATEDIFF(CURDATE(),u.inscription) + 1) as jour, u.nom, u.prenom, u.image FROM stats as s LEFT JOIN users as u ON id = s.usersid GROUP BY s.remindnb DESC LIMIT 10");
while ($Usr = $ORes->fetch()) {
    ?>
    <div style="display:flex;justify-content:center;text-align:center;border-radius: 5px 5px;background-color: white;margin:25px;margin-right:630px;margin-left:630px;">
    <?php
        if(!empty($Usr->image)) { echo "<img src='user_picture/$Usr->image' alt='photo' style='width:71px;height:71px;border-radius:5px;margin-right:10px'>"; } else { echo "<img src='images/user.png' alt='photo' style='width:71px;height:71px;border-radius:5px;margin-right:10px'>"; } 
        echo "$Usr->nom $Usr->prenom<br>Actif depuis $Usr->jour jours<br>$Usr->remindnb rappels crées !";
    ?>
    </div>
    <?php
}