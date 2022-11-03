<?php
require_once("controleur/controleur.class.php");
require_once("controleur/config_bdd.php");
// instanciation du controleur 
$unControleur = new Controleur($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);

$lesHotels = $unControleur->selectAllHotels();
$lesRestaurants = $unControleur->selectAllRestaurants();
$lesLoisirs = $unControleur->selectAllLoisirs();

require_once("composants/carroussel-home.php");

    if(isset($_POST['Hotels'])){
        require_once("vue/vue_les_hotels.php");
        $unControleur->selectAllHotels();
    }

    if(isset($_POST['Restaurants'])){
        require_once("vue/vue_les_restaurants.php");
        $unControleur->selectAllRestaurants();
    }

    if(isset($_POST['Loisirs'])){
        require_once("vue/vue_les_loisirs.php");
        $unControleur->selectAllLoisirs();
    }

?>
