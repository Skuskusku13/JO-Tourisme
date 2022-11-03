    <h2> Liste des Hotels </h2>

    <table class="table-affiche">
        <tr>
            <td> Catégorie </td>
            <td> Libellé </td>
            <td> Adresse </td>
            <td> Prix </td>
            <td> Téléphone </td>
            <td> Email </td>
        </tr>

        <?php
            foreach($lesHotels as $unHotel){
                echo 
                    "<tr>
                        <td>".$unHotel["Categorie"]."</td>",
                        "<td>".$unHotel["libelle"]."</td>",
                        "<td>".$unHotel["adresse"]."</td>",
                        "<td>".$unHotel["prix"]."</td>",
                        "<td>".$unHotel["tel"]."</td>",
                        "<td>".$unHotel["email"]."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</main>