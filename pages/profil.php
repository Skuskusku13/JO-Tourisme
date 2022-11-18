<?php

// on récupère notre user qui a le rôle professionnel ou particulier en se servant de la variable de session
$unUser = $unControleur->findByRole($_SESSION['role'], $_SESSION['iduser']);

$unClientPart=null;
$unClientPro=null;

if($unUser['role'] == 'clientPro') {
    require_once("vue/vue_les_profilsPro.php");
} else if($unUser['role'] == 'clientPart') {
    require_once("vue/vue_les_profilsPart.php");
}
?>