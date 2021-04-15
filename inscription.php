<?php

  if(isset($_POST["bouton"])) {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $err = "Vous devez rentrer un mail valide";
    }
    if (empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["mdp"])) {
      $err = "Vous devez rentrer toutes les informations";
    }
    if (!isset($err)) {
      $ORes = $Bdd->query("SELECT * FROM users WHERE email = '$_POST[email]'");
      if ($Usr = $ORes->fetch()) {
        $err = "Ce compte existe déjà...";
      } else {
        $ORes = $Bdd->query("INSERT INTO users (email, nom, prenom, mdp) VALUES ('$_POST[email]','$_POST[nom]','$_POST[prenom]','$_POST[mdp]')");
        $id = $Bdd->lastInsertId();
        $ORes2 = $Bdd->query("INSERT INTO stats (usersid, remindnb) VALUES ('$id',0)");
        header("Refresh:0; url=index.php?p=connexion");
      }
    }
  }
?>

<link rel="stylesheet" href="css/inscription.css">

<div id='container'>
  <div class='signup'>
     <form action="" method="POST">
       <input type='text' placeholder='Prenom:'  name="prenom"/>
       <input type='text' placeholder='Nom:'  name="nom"/>
       <input type='email' placeholder='Email:'  name="email"/>
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