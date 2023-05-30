<?php

$lesCategories = $c_Categories->selectAllCategories();
$lesEvenements = $c_Event->selectAllEvenements();

$tab = isset($_SESSION['email']) ? $c_Event->selectOneInscri($_SESSION['iduser']) : array();
$lEvenement = null;
if (isset($_GET['action']) and isset($_GET['idevenement'])) {
    $action = $_GET['action'];
    $idevenement = $_GET['idevenement'];
    switch ($action) {
        case "sup":
            $c_Event->deleteEvenement($idevenement);
            break;
        case "edit":
            $lEvenement = $c_Event->selectWhereEvenement($idevenement);
            break;
        case "view":
            $selectEvent = $c_Event->selectWhereEvenement($idevenement);
            $lesInscris = $c_Event->selectAllInscris($idevenement);
            require_once("vue/vue_les_inscris.php");
            break;
        case "inscr":
            $c_Event->addInscris($idevenement); 
            header("Location: index.php?page=1");
            break;
    }
}

if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    require_once("vue/vue_insert_evenement.php");
    if (isset($_POST['Valider'])) {
        $c_Event->insertEvenement($_POST);
    }
    
    if (isset($_POST['Modifier'])) {
        $c_Event->updateEvenement($_POST);
        header("Location: index.php?page=1");
    }
}

$lesEvenements = $c_Event->selectAllEvenements();
require_once("vue/vue_les_evenements.php");
?>
