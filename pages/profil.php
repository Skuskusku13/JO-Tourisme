<?php

// on récupère notre user qui a le rôle professionnel ou particulier en se servant de la variable de session
$unUser = $c_User->findByRole($_SESSION['role'], $_SESSION['iduser']);

$unClientPart=null;
$unClientPro=null;

if($unUser['role'] == 'clientPro') {
    $unClientPro = $c_User->selectClientPro($_SESSION['email']); //select * from vueclient where email =
    require_once("vue/vue_les_profilsPro.php");
} else if($unUser['role'] == 'clientPart') {
    $unClientPart = $c_User->selectClientPart($_SESSION['email']); 
    require_once("vue/vue_les_profilsPart.php");
}
?>