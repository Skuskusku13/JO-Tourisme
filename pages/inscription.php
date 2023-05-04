<?php
require_once("controleur/controleurUser.class.php");
?>

<br>
<center>
    <h1> Veuillez selectionner votre profil utilisateur </h1>
    <br>

    <form action="#" method="POST">
        <table>
            <tr>
                <td><input type="submit" name="Particulier" value="Particulier"></td>
                <td><input type="submit" name="Professionnel" value="Professionnel"></td>
            </tr>
        </table>
    </form>
</center>

<?php

if (isset($_POST['Particulier'])) {
    require_once("composants/form_inscriptionPar.php");
}


if (isset($_POST['Professionnel'])) {

    require_once("composants/form_inscriptionPro.php");
}

if (isset($_POST['InscriptionPart'])) {
    $c_User->insertClientPar($_POST);
    // header("Location: index.php?page=1");
}

if (isset($_POST['InscriptionPro'])) {
    $c_User->insertClientPro($_POST);
}
?>