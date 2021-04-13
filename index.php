<?php
    session_start();
    include('Bdd.php'); // connexion à la base de donnée, objet -> $Bdd
    include('header.php'); // notre barre de naviguation
    

    if (isset($_GET["p"])) { // système de page actuelle stockée dans la donnée de session "p"
        if (!isset($_POST["online"])) {
            switch ($_GET["p"]) {
                case 'compte':
                case 'reminds':     $_GET["p"] = "accueil"; echo "*nécéssite d'être connecté pour y accéder*<br>";
                default:            break;
            }
        }
        switch ($_GET["p"]) {
            case 'compte':          include('moncompte.php');       break;
            case 'reminds':         include('reminds.php');         break;
            case 'connexion':       include('connexion.php');       break;
            case 'inscription':     include('inscription.php');     break;
            default:                include('accueil.php');         break;
        }
    } else {
        include('accueil.php');
    }