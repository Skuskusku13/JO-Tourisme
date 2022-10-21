<?php
$lesCategories = $unControleur->selectALLCategories();
$lesEvenements = $unControleur->selectAllEvenements();


$lEvenement = null;
if (isset($_GET['action']) and isset($_GET['idevenement'])) {
    $action = $_GET['action'];
    $idevenement = $_GET['idevenement'];
    switch ($action) {
        case "sup":
            $unControleur->deleteEvenement($idevenement);
            break;
        case "edit":
            $lEvenement = $unControleur->selectWhereEvenement($idevenement);
            break;
    }
}


require_once("vue/vue_insert_evenement.php");
if (isset($_POST['Valider'])) {
    #if (!empty($_POST['description']) && !empty($_POST['dateinter']) && !empty($_POST['prix']) && !empty($_POST['idtechnicien']) && !empty($_POST['idvehicule'])) 
    $unControleur->insertEvenement($_POST);
}

if(isset($_POST['Modifier']))
        {
            $unControleur->updateEvenement($_POST);
            header("Location: index.php?page=1");
        } 

$lesEvenements = $unControleur->selectAllEvenements();
require_once("vue/vue_les_evenements.php");
