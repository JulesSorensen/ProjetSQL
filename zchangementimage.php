<!-- FICHIER DE TEST QUI SERA SUPPRIME, NE PAS TOUCHER MERCI -->

<?php

// changement de photo
if(isset($_POST["validerimage"])) {
    if (basename($_FILES["fichier"]["name"]) != NULL) {
        $target_dir = "user_picture/";
        $target_file = $target_dir . basename($_FILES["fichier"]["name"]);
        $target_file =  substr($target_file, 0, -4) . 1 . substr($target_file, -4);
        $uploaderror = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fichier"]["tmp_name"]);
        if($check !== false) {
            $uploaderror = 1;
        } else {
            $uploaderror = 0;
        }
        // si le fichier existe déjà on ajoute + 1
        if (file_exists($target_file)) {
            while (file_exists($target_file)) {
                $lastchar = $target_file[strlen($target_file)-5];
                $numb = (int)$lastchar + 1;
                $target_file = substr($target_file, 0, -5) . "$numb" . substr($target_file, -4);
            }
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) {
            $uploaderror = 0;
        }

        // Si y'a une erreur
        if ($uploaderror == 0) {
            $erreur2 = "Votre fichier n'est pas valide";
        } else {
            if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
                $confirm2 = "Le fichier ". htmlspecialchars( basename( $_FILES["fichier"]["name"])). " a été mis à jour";
                $target_file = substr($target_file, 12, (strlen($target_file)-1));
                $requp = "UPDATE users SET photo = '$target_file' WHERE id = $_SESSION[userid]";
                $OResup = $Bdd->query($requp);
                // header("Refresh:0; url=index.php?p=moncompte");
            } else {
                $erreur2 = "Une erreur s'est produite...";
            }
        }
    } else { // si l'utilisateur n'as pas mis d'image, on la reset
        $confirm2 = "Votre photo a bien été réinitialisé";
        $requp = "UPDATE users SET photo = '' WHERE id = $_SESSION[userid]";
        $OResup = $Bdd->query($requp);
        // header("Refresh:0; url=index.php?p=moncompte");
    }
}