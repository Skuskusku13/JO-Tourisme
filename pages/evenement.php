<?php

$lesCategories = $c_Categories->selectAllCategories();
$lesEvenements = $c_Event->selectAllEvenements();


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
    }
}


require_once("vue/vue_insert_evenement.php");
if (isset($_POST['Valider'])) {
    $c_Event->insertEvenement($_POST);
}

if (isset($_POST['Modifier'])) {
    $c_Event->updateEvenement($_POST);
    header("Location: index.php?page=1");
}

$lesEvenements = $c_Event->selectAllEvenements();
require_once("vue/vue_les_evenements.php");
