<?php
session_start();
require_once("controleur/controleurCategorie.class.php");
require_once("controleur/controleurEvent.class.php");
require_once("controleur/controleurService.class.php");
require_once("controleur/controleurTypeService.class.php");
require_once("controleur/controleurUser.class.php");
require_once("controleur/config_bdd.php");
// instanciation du controleur 
$c_Categories = new ControleurCategorie($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);
$c_Event = new ControleurEvent($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);
$c_Service = new ControleurService($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);
$c_TypeService = new ControleurTypeService($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);
$c_User = new ControleurUser($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);

?>

<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="images/olympic.ico"/>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <title>Jeux Olympiques 2024</title>
</head>

<body>
    <header>
        <?php require_once("composants/navbar.php"); ?>
    </header>

    <main>

        <?php

        isset($_GET['page']) ? $page =  $_GET['page'] : $page = 0;
        
        switch ($page) {
            case 0:
                require_once("pages/home.php");
                break;
            case 1:
                require_once("pages/evenement.php");
                break;
            case 2:
                require_once("pages/service.php");
                break;
            case 3:
                require_once("pages/inscription.php");
                break;
            case 4:
                require_once("pages/connexion.php");
                break;
            case 5:
                require_once("pages/deconnexion.php");
                break;
            case 6:
                require_once("pages/profil.php");
                break;
        }
        ?>
    </main>

    <footer>
        <?php require_once('composants/footer.php'); ?>
    </footer>


    <script src="js/script.js" defer></script>
</body>

</html>