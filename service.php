<?php
$lesTypeservices = $unControleur->selectALLTypeservices();

$lesServices = $unControleur->selectAllServices();

$leService = null;
    if (isset($_GET['action']) and isset($_GET['idservice']))
    {
        $action = $_GET['action'];
        $idservice = $_GET['idservice'];
        switch ($action)
        {
            case "sup":$unControleur->deleteService($idservice);
            break;
            case "edit":
            $leService = $unControleur->selectWhereService($idservice);
            break;
        }
    }
    
require_once("vue/vue_insert_service.php");
if (isset($_POST['Valider'])) 
{
    #if (!empty($_POST['description']) && !empty($_POST['dateinter']) && !empty($_POST['prix']) && !empty($_POST['idtechnicien']) && !empty($_POST['idvehicule'])) 
    $unControleur->insertService($_POST);
    //var_dump($insertService);
}
if(isset($_POST['Modifier']))
        {
            $unControleur->updateService($_POST);
            header("Location: index.php?page=2");
        }   

$lesServices = $unControleur->selectAllServices();
require_once("vue/vue_les_services.php");
