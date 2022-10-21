    <h2> Liste des catégories </h2>

    <table class="table-affiche">
        <tr>
            <td> Id Catégorie </td>
            <td> Libellé </td>
        </tr>

        <?php
            foreach($lesCategories as $uneCategorie){
                echo 
                "<tr>
                    <td>".$uneCategorie["idcategorie"]."</td>
                    <td>".$uneCategorie["libelle"]."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</main>