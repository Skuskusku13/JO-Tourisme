<main>
    <form method="post" action="#" class="form_connex" autocomplete="off">
        <h2>Veuillez remplir ce formulaire pour vous inscrire.</h2>
        <table class="table-insert">
            <tr>
                <td>Nom : </td>
                <td class="tdtd"><input type="text" name="nom" id="nom" onblur="traiterNom()"></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td class="tdtd"><input type="text" name="email" id="email" onblur="traiterEmail()"></td>
            </tr>
            <tr>
                <td>Mot de passe : </td>
                <td class="tdtd"><input type="password" name="mdp" id="mdp" onblur="traiterMdp()"></td>
            </tr>
            <tr>
                <td>Tél : </td>
                <td class="tdtd"><input type="text" name="tel" id="tel" onblur="traiterTel()"></td>
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
                <td><input class="boutonP" type="submit" name="InscriptionPro" value="Inscription"></td>
            </tr>';
        </table>
    </form>
  
</main>