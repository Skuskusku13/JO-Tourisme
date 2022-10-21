<?php
require_once("controleur/controleur.class.php");
$controleur = new Controleur($serveur, $bdd, $user, $mdp);

?>


<main>
    <form method="post" action="#" class="form_connex" autocomplete="off">
        <h2>Veuillez remplir ce formulaire pour vous inscrire.</h2>
            <table class="table-insert">
                <tr>
                    <td>Nom : </td>
                    <td class="tdtd"><input type="text" name="nom"></td>
                </tr>
                <tr>
                    <td>Prenom : </td>
                    <td class="tdtd"><input type="text" name="prenom"></td>
                </tr>
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
                    <td><input class="boutonP" type="submit" name="Sinscrire" value="S'inscrire"></td>
                </tr>
                <?php
                if (isset($_POST['Sinscrire'])) {
                    echo $controleur->insertUser($_POST);
                }

                ?>
            </table>
    </form>
</main>