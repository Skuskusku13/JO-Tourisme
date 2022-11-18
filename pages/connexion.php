<?php
require_once("controleur/controleur.class.php");
$controleur = new Controleur($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);

?>


<main>
    <form method="post" action="#" class="form_connex" autocomplete="off">
        <h2>Merci de vous connecter pour rentrer sur notre site</h2>
        <table class="table-insert">
            <tr>
                <td>Email : </td>
                <td class="tdtd"><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Mot de passe : </td>
                <td class="tdtd"><input type="password" name="mdp"></td>
            </tr>
            <tr>
                <td><input class="boutonP" type="reset" name="Annuler" value="Annuler"></td>
                <td><input class="boutonP" type="submit" name="seConnecter" value="Valider"></td>
            </tr>
            <?php
            if (isset($_POST['seConnecter'])) {
                if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
                    $email = $_POST['email'];
                    $mdp = $_POST['mdp'];
                    $unUser = $controleur->selectUser($email);
                    if ($unUser != null) {
                        $_SESSION['nom'] = $unUser['nom'];
                        $_SESSION['prenom'] = $unUser['prenom'];
                        $_SESSION['tel'] = $unUser['tel'];
                        $_SESSION['email'] = $unUser['email'];
                        $_SESSION['mdp'] = $unUser['mdp'];
                        $_SESSION['role'] = $unUser['role'];
                        $_SESSION['iduser'] = $unUser['iduser'];
                        header("Location: index.php?page=0");
                    } else {
                        echo "<p style='text-align: center;'>Veuillez verifier vos emails !</p>";
                    }
                } else {
                    echo "<p style='text-align: center;'>Les champs ne sont pas remplis</p>";
                }
            }

            ?>
        </table>
    </form>
</main>