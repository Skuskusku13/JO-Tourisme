<?php

$lesHotels = $c_User->selectAllHotels();
$lesRestaurants = $c_User->selectAllRestaurants();
$lesSports = $c_User->selectAllSports();
$lesCultures = $c_User->selectAllCultures();

require_once("composants/carroussel-home.php");

    if(isset($_POST['Hotels'])){
        require_once("vue/vue_les_hotels.php");
        $c_User->selectAllHotels();
    }

    if(isset($_POST['Restaurants'])){
        require_once("vue/vue_les_restaurants.php");
        $c_User->selectAllRestaurants();
    }

    if(isset($_POST['Loisirs'])){
        require_once("vue/vue_les_loisirs.php");
        $c_User->selectAllSports();
        $c_User->selectAllCultures();
    }

?>
