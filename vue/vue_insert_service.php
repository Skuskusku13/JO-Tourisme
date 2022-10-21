<main>
    <h2> Insertion d'un service </h2>

    <form method="post" action="">
        <table class="table-insert">
            <tr>
                <td> Libellé </td>
                <td><input type="text" name="libelle" value="<?= ($leService != null) ? $leService['libelle'] : '' ?>"></td>
            </tr>
            <tr>
                <td> Adresse </td>
                <td><input type="text" name="adresse" value="<?= ($leService != null) ? $leService['adresse'] : '' ?>"></td>
            </tr>
            <tr>
                <td> Prix (moyen) </td>
                <td><input type="number" name="prix" value="<?= ($leService != null) ? $leService['prix'] : '' ?>"></td>
            </tr>
            <tr>
                <td> Téléphone </td>
                <td><input type="text" name="tel" value="<?= ($leService != null) ? $leService['tel'] : '' ?>"></td>
            </tr>
            <tr>
                <td> Email </td>
                <td><input type="text" name="email" value="<?= ($leService != null) ? $leService['email'] : '' ?>"></td>
            </tr>
            <tr>
                <td> Id type-services </td>
                <td>
                    <select name="idtypeservices">
                        <?php
                        foreach ($lesTypeservices as $unTypeservice) {
                            echo "<option value='" . $unTypeservice['idtypeservices'] . "'>" . $unTypeservice['libelle'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input class="boutonP" type="reset" name="Annuler" value="Annuler"></td>
                <td><input class="boutonP" type="submit" <?= ($leService != null) ? 'name="Modifier" value = "Modifier"' : 'name="Valider" value="Valider"' ?>>
                    <?= ($leService != null) ? "<input type='hidden' name ='idservice' value ='" . $leService['idservice'] . "'>" : "" ?> </td>
            </tr>
        </table>
    </form>