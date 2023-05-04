<h2> Liste d'inscription à l'évenement : <?php echo $lEvenement['nomEvenement'] ?> </h2>

<table class="table-affiche">
    <tr>
        <td> Nom </td>
        <td> Email </td>
        <td> Date Inscription </td>
        <td> Statut </td>
        <?php                 
            if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                echo "<td> Opérations </td>";
            }
        ?>
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
        

        //Opération supprimer et modifier
        if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
        echo "<td>";
            echo "<a class='img-dif' href='index.php?page=2&action=sup&idservice=".$unInscris['idservice']."'>";
            echo "<img src='images/Delete.png' height='30' width='30'";
            echo "</a>";
            echo "<a class='img-dif' href='index.php?page=2&action=edit&idservice=".$unInscris['idservice']."'>";
            echo "<img src='images/Edit.png' height='30' width='30'";
            echo "</a>";
        echo "</td>";
        }


        echo "</tr> ";
    }

    ?>
</table>
