    <h2> Liste des évènements </h2>

    <table class="table-affiche">
        <tr>
            <td> Id Evenement </td>
            <td> Type </td>
            <td> Date Evenement </td>
            <td> Nom Evenement </td>
            <td> Description </td>
            <td> Adresse </td>
            <td> Horraire Début </td>
            <td> Horraire Fin </td>
            <td> Capacite </td>
            <td> Idcategorie </td>
            <?php 
            if (isset($_SESSION['role'])){
                echo "<td> Informations </td>";
            }

            if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                echo "<td> Opérations </td>";
            }
            ?>
        </tr>

        <?php
        foreach ($lesEvenements as $unEvenement) {
            echo
            "<tr>
                    <td>" . $unEvenement["idevenement"] . "</td>
                    <td>" . $unEvenement["type"] . "</td>
                    <td>" . $unEvenement["dateEvent"] . "</td>
                    <td>" . $unEvenement["nomEvenement"] . "</td>
                    <td>" . $unEvenement["description"] . "</td>
                    <td>" . $unEvenement["adresse"] . "</td>
                    <td>" . $unEvenement["horraireD"] . "</td>
                    <td>" . $unEvenement["horraireF"] . "</td>
                    <td>" . $unEvenement["capacite"] . "</td>
                    <td>" . $unEvenement["idcategorie"] . "</td>";


            if (isset($_SESSION['role'])) {
                echo "<td>";
                    echo "<a class='img-dif' href='index.php?page=1&action=view&idevenement=".$unEvenement['idevenement']."'>";
                    echo "View</a>";
                    if((!in_array($unEvenement['idevenement'], $tab)) && $_SESSION['role'] != "admin"){
                        echo "<a class='img-dif' href='index.php?page=1&action=inscr&idevenement=".$unEvenement['idevenement']."'>";
                        echo "S'inscrire</a>";
                    }
                echo "</td>";
            }

            //Opération supprimer et modifier
            if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            
                echo "<td>";
                echo "<a class='img-dif' href='index.php?page=1&action=sup&idevenement=" . $unEvenement['idevenement'] . "'>";
                echo "<img src='images/Delete.png' height='30' width='30'";
                echo "</a>";
                echo "<a class='img-dif' href='index.php?page=1&action=edit&idevenement=" . $unEvenement['idevenement'] . "'>";
                echo "<img src='images/Edit.png' height='30' width='30'";
                echo "</a>";
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
</table>