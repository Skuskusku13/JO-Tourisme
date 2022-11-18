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
                    <td>" .$_SESSION["nom"]."</td>",
                    "<td>".$_SESSION["prenom"]."</td>",
                    "<td>".$_SESSION["email"]."</td>",
                    "<td>".$_SESSION["mdp"]."</td>",
                    "<td>".$_SESSION["tel"]."</td>";
            echo "</tr>";
    ?>
</table>
</main> 