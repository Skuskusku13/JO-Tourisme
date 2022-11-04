<?php

// on récupère notre user qui a le rôle professionnel ou particulier en se servant de la variable de session
$unUser = $unControleur->findByRole($_SESSION['role'], $_SESSION['iduser']);

var_dump($unUser);

echo "eeeeeeeeeee";
?>