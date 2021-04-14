<!-- FICHIER DE TEST QUI SERA SUPPRIME, NE PAS TOUCHER MERCI -->

<?php
include("Bdd.php");
    $id;
    $ORes = $Bdd->query("SELECT * FROM reminds INNER JOIN users ON usersid = users.id"); // pour avoir toutes les infos de l'utilisateur à chaques lignes
    while ($Rmd = $ORes->fetch()) {
        // liste des reminds de l'utilisateur
        print_r($Rmd);
    }