<link rel="stylesheet" href="css/moncompte.css">
<?php
    $ORes = $Bdd->query("SELECT * FROM users WHERE id = '$_SESSION[id]'");
    if ($users = $ORes->fetch()){ 
        ?>
        <form action="" method="POST">
            <div id='container'>
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
                <div class='whysign'>
                    <h1>PHOTO</h1>
                    <input type="file"  placeholder='Email:'  name="email">
                </div>
            </div>
        </form><?php
        
    }
?>

