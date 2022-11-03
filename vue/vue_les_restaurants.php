    <h2> Liste des Restaurants </h2>

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
            foreach($lesRestaurants as $unRestaurant){
                echo 
                    "<tr>
                        <td>".$unRestaurant["Categorie"]."</td>",
                        "<td>".$unRestaurant["libelle"]."</td>",
                        "<td>".$unRestaurant["adresse"]."</td>",
                        "<td>".$unRestaurant["prix"]."</td>",
                        "<td>".$unRestaurant["tel"]."</td>",
                        "<td>".$unRestaurant["email"]."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</main>