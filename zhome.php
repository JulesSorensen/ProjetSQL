<!-- FICHIER DE TEST QUI SERA SUPPRIME, NE PAS TOUCHER MERCI -->

<?php
    $id;
    $ORes = $Bdd->query("SELECT * FROM reminds WHERE usersid = '$id'");
    while ($Rmd = $ORes->fetch()) {
        // liste des reminds de l'utilisateur
    }