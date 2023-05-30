<h2> Liste d'inscription à l'évenement : <?php echo $lEvenement['nomEvenement'] ?> </h2>

<table class="table-affiche">
    <tr>
        <td> Nom </td>
       <?php
       if ($_SESSION['role'] == "admin") {
        echo "<td> Email </td>";
       }
       ?>
        <td> Date Inscription </td>
        <td> Statut </td>
    </tr>

    <?php
        foreach($lesInscris as $unInscris)
        {
            echo 
            "<tr>
                <td>".$unInscris["nom"]."</td>";
                if ($_SESSION['role'] == "admin") {
                   echo "<td>".$unInscris["email"]."</td>";
                }
            echo"
                <td>".$unInscris["dateD"]."</td>
                <td>".$unInscris["statut"]."</td>";
        echo "</tr> ";
    }

    ?>
</table>
