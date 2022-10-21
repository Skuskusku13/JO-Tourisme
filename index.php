<?php
session_start();
require_once("controleur/controleur.class.php");
require_once("controleur/config_bdd.php");

// instanciation du controleur 
$unControleur = new Controleur($serveur, $bdd, $user, $mdp);


?>


<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <title>Jeux Olympiques 2024</title>
</head>

<body>
    <header>
        <nav class="navigation_navbar">
            <ul>
                <li>
                    <a href="index.php?page=0">
                        <img class="image-logo" src="images/logo.png" alt="logo jeux olympiques" />
                    </a>
                </li>
                <li>
                    <a href="index.php?page=1">Évènements</a>
                </li>
                <li>
                    <a href="index.php?page=2">Autres services</a>
                </li>
                <li>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo ' <a href="index.php?page=6">Mon profil</a>';
                    } else {
                        echo '<a href="index.php?page=3">S\'inscrire</a>';
                    }
                    ?>
                </li>
                <li>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo ' <a href="index.php?page=5">Se Déconnecter</a>';
                    } else {
                        echo '<a href="index.php?page=4">Se connecter</a>';
                    }
                    ?>

                </li>
            </ul>
        </nav>
    </header>
    <?php
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 0;
    }
    switch ($page) {
        case 0:
            require_once("home.php");
            break;
        case 1:
            require_once("evenement.php");
            break;
        case 2:
            require_once("service.php");
            break;
        case 3:
            require_once("inscription.php");
            break;
        case 4:
            require_once("connexion.php");
            break;
        case 5:
            require_once("deconnexion.php");
            break;
        case 6:
            require_once("monprofil.php");
            break;
    }
    ?>
    <?php require_once('footer.php'); ?>
</body>

</html>