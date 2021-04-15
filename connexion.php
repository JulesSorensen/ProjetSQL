<?php

  if(isset($_POST["bouton"])) {
    $ORes = $Bdd->query("SELECT * FROM users WHERE email = '$_POST[email]'");
    if ($Usr = $ORes->fetch()) {
      if ($Usr->mdp = $_POST['mdp']) {
        $_SESSION["online"] = TRUE;
        $_SESSION["id"] = $_POST['mdp'];
        // header("Refresh:0; url=index.php?p=accueil");
      } else {
        $err = "Mauvais mot de passe...";
      }
    } else {
      $err = "Le compte n'existe pas...";
    }
  }
?>
<link rel="stylesheet" href="css/connexion.css">
<div id='container'>
  <div class='signup'>
     <form action="" method="POST">
       <input type='text' placeholder='Email:'  name="email"/>
       <input type='password' placeholder='Mot de Passe:'  name="mdp"/>
       <input type='submit' placeholder='SUBMIT' name="bouton"/>
     </form>
  </div>
  <div class='whysign'>
    <h1>Libérez votre espace mental</h1>
    <p>Ayez l'esprit tranquille en ajoutant toutes vos tâches à votre to-do list (où que vous soyez ou quel que soit l'appareil utilisé).</p>
    <?php if(isset($err)) { echo "<p style='color:red;'>$err<p/>"; unset($err);}?>
  </div>
</div>