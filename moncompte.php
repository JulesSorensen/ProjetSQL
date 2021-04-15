<link rel="stylesheet" href="css/moncompte.css">
<?php
    $ORes = $Bdd->query("SELECT * FROM users WHERE id = '$_SESSION[id]'");
    if ($users = $ORes->fetch()){ 
        ?>
        
        <div id='container'>
            <form action="" method="POST">
                <div class='signup'>
                    <input type='text' placeholder='<?php echo $users->prenom; ?>'  name="prenom"/>
                    <?php
                    if(empty($_POST["prenom"]) == FALSE) {
                        $nom = $_POST["prenom"];
                        $req2 = "UPDATE users SET prenom = '$nom' WHERE id = '$_SESSION[id]'";
                        $ORes2 = $Bdd->query($req2);
                        echo "Le prenom a bien été changé<br/>";
                    }?>
                    <input type='text' placeholder='<?php echo $users->nom; ?>'  name="nom"/>
                    <?php
                    if(empty($_POST["nom"]) == FALSE) {
                        $nom = $_POST["nom"];
                        $req2 = "UPDATE users SET nom = '$nom' WHERE id = '$_SESSION[id]'";
                        $ORes2 = $Bdd->query($req2);
                        echo "Le nom a bien été changé<br/>";
                    }?>
                    <input type='text' placeholder='<?php echo $users->email; ?>'  name="email"/>
                    <input type='submit' placeholder='SUBMIT' name="bouton"/>
                </div>
            </form>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class='whysign'>
                    <h1>PHOTO</h1>
                    <img src="<?php if(!empty($users->image)) { echo "user_picture/$users->image";} else { echo "images/user.png"; } ?>" alt="img" style="width:150px;height:150px">
                    <input type="file" name="fichier">
                    <input type='submit' placeholder='SUBMIT' name="boutonimg"/>
                </div>
            </form>
        </div>
        <?php
        
    }

    // changement de photo
    if(isset($_POST["boutonimg"])) {
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
                    $requp = "UPDATE users SET image = '$target_file' WHERE id = $_SESSION[id]";
                    $OResup = $Bdd->query($requp);
                    header("Refresh:0; url=index.php?p=compte");
                } else {
                    $erreur2 = "Une erreur s'est produite...";
                }
            }
        } else { // si l'utilisateur n'as pas mis d'image, on la reset
            $confirm2 = "Votre photo a bien été réinitialisé";
            $requp = "UPDATE users SET image = '' WHERE id = $_SESSION[id]";
            $OResup = $Bdd->query($requp);
            header("Refresh:0; url=index.php?p=compte");
        }
    }
?>

