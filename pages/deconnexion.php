<?php
if(isset($_SESSION['email'])){
    session_destroy();
    session_unset();
    header('Location: index.php?page=0');
}

require_once("controleur/controleur.class.php");

?>