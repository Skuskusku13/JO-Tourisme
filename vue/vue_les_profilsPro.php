<h2> Voici les informations de votre profil </h2>

<table class="table-affiche">
    <tr>
        <td> Nom </td>
        <td> Email </td>
        <td> Mot de passe </td>
        <td> Tél </td>
        <td> Numéro Siret </td>
        <td> Adresse </td>
    </tr>

    <?php
            echo 
                "<tr>
                    <td>" .$unClientPro["nom"]."</td>",
                    "<td>".$unClientPro["email"]."</td>",
                    "<td>".$unClientPro["mdp"]."</td>",
                    "<td>".$unClientPro["tel"]."</td>",
                    "<td>".$unClientPro["num_Siret"]."</td>",
                    "<td>".$unClientPro["adresse"]."</td>";
            echo "</tr>";
    ?>
</table>
</main> 