    <h2> Liste des services sports et culture  </h2>

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
            foreach($lesLoisirs as $unLoisir){
                echo 
                    "<tr>
                        <td>".$unLoisir["Categorie"]."</td>",
                        "<td>".$unLoisir["libelle"]."</td>",
                        "<td>".$unLoisir["adresse"]."</td>",
                        "<td>".$unLoisir["prix"]."</td>",
                        "<td>".$unLoisir["tel"]."</td>",
                        "<td>".$unLoisir["email"]."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</main>