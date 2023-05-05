<h2> Liste d'inscription à l'évenement : <?php echo $lEvenement['nomEvenement'] ?> </h2>

<table class="table-affiche">
    <tr>
        <td> Nom </td>
        <td> Email </td>
        <td> Date Inscription </td>
        <td> Statut </td>
    </tr>

    <?php
        foreach($lesInscris as $unInscris)
        {
            echo 
            "<tr>
                <td>".$unInscris["nom"]."</td>
                <td>".$unInscris["email"]."</td>
                <td>".$unInscris["dateD"]."</td>
                <td>".$unInscris["statut"]."</td>";
        echo "</tr> ";
    }

    ?>
</table>
