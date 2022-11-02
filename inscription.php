<br>
<center>
    <h1> Veuillez selectionner votre profil utilisateur </h1>
<br>
<tr>
    <td><input class="boutonP" type="submit" name="Particulier" value="Particulier"></td>
    <td><input class="boutonP" type="submit" name="Professionnel" value="Professionnel"></td>
</tr>
</center>  

<?php

if (isset($_POST['Particulier']))
{
    require_once("controleur/controleur.class.php");
    $controleur = new Controleur($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);

    echo '<main>
        <form method="post" action="#" class="form_connex" autocomplete="off">
            <h2>Veuillez remplir ce formulaire pour vous inscrire.</h2>
                <table class="table-insert">
                    <tr>
                        <td>Nom : </td>
                        <td class="tdtd"><input type="text" name="nom"></td>
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
                        <td>Tél : </td>
                        <td class="tdtd"><input type="text" name="tel"></td>
                    </tr>
                    <tr>
                        <td>Prénom : </td>
                        <td class="tdtd"><input type="text" name="prenom"></td>
                    </tr>
                    <tr>
                        <td><input class="boutonP" type="reset" name="Annuler" value="Annuler"></td>
                        <td><input class="boutonP" type="submit" name="Inscription" value="Inscription"></td>
                    </tr>';

                    if (isset($_POST['Inscription'])) {
                        echo $controleur->insertClientPar($_POST);
                    }

                echo '</table>
        </form>
    </main>';
}

if (isset($_POST['Professionnel']))
{
    require_once("controleur/controleur.class.php");
    $controleur = new Controleur($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);

    echo '<main>
        <form method="post" action="#" class="form_connex" autocomplete="off">
            <h2>Veuillez remplir ce formulaire pour vous inscrire.</h2>
                <table class="table-insert">
                    <tr>
                    <td>Nom : </td>
                    <td class="tdtd"><input type="text" name="nom"></td>
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
                        <td>Tél : </td>
                        <td class="tdtd"><input type="text" name="tel"></td>
                    </tr>
                    <tr>
                        <td>Numéro Siret : </td>
                        <td class="tdtd"><input type="text" name="num_Siret"></td>
                    </tr>
                    <tr>
                        <td>Adresse : </td>
                        <td class="tdtd"><input type="text" name="adresse"></td>
                    </tr>
                    <tr>
                        <td><input class="boutonP" type="reset" name="Annuler" value="Annuler"></td>
                        <td><input class="boutonP" type="submit" name="Inscription" value="Inscription"></td>
                    </tr>';

                    if (isset($_POST['Inscription'])) {
                        echo $controleur->insertClientPro($_POST);
                    }
   
                echo '</table>
        </form>

    </main>';
}
?>