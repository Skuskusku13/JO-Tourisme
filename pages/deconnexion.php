<?php
if(isset($_SESSION['email'])){
    session_destroy();
    header('Location: index.php?page=0');
}


require_once("controleur/controleur.class.php");

?>