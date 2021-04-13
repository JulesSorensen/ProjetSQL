<?php
    include('Bdd.php'); // connexion à la base de donnée, objet -> $Bdd

    if (isset($_POST["p"])) { // système de page actuelle stockée dans la donnée de session "p"
        switch ($_POST["p"]) {
            case 'profil':          include('profil.php');          break;
            case 'connexion':       include('connexion.php');       break;
            case 'inscription':     include('inscription.php');     break;
            case 'accueil':         include('accueil.php');         break;
            default:                include('accueil.php');         break;
        }
    } else {
        include('accueil.php');
    }