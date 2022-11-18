<h2> Voici les informations de votre profil  </h2>

<table class="table-affiche">
    <tr>
        <td> Nom </td>
        <td> Prénom </td>
        <td> Email </td>
        <td> Mot de passe </td>
        <td> Tél </td>
    </tr>

    <?php
            echo 
                "<tr>
                    <td>" .$unClientPart["nom"]."</td>",
                    "<td>".$unClientPart["prenom"]."</td>",
                    "<td>".$unClientPart["email"]."</td>",
                    "<td>".$unClientPart["mdp"]."</td>",
                    "<td>".$unClientPart["tel"]."</td>";
            echo "</tr>";
    ?>
</table>
</main> 