<?php
$lesTypeservices = $c_TypeService->selectAllTypeservices();
$lesServices = $c_Service->selectAllServices();

$leService = null;
    if (isset($_GET['action']) and isset($_GET['idservice']))
    {
        $action = $_GET['action'];
        $idservice = $_GET['idservice'];
        switch ($action)
        {
            case "sup":$c_Service->deleteService($idservice);
            break;
            case "edit":
            $leService = $c_Service->selectWhereService($idservice);
            break;
        }
    }
    
require_once("vue/vue_insert_service.php");
if (isset($_POST['Valider'])) 
{
    $c_Service->insertService($_POST);
}
if(isset($_POST['Modifier']))
        {
            $c_Service->updateService($_POST);
            header("Location: index.php?page=2");
        }   

$lesServices = $c_Service->selectAllServices();
require_once("vue/vue_les_services.php");
