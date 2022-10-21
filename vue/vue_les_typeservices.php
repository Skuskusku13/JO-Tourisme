    <h2> Liste des typeservices </h2>

    <table class="table-affiche">
        <tr>
            <td> Id typeservices </td>
            <td> Libellé </td>
        </tr>

        <?php
            foreach($lesTypeservices as $unTypeservice){
                echo 
                    "<tr>
                        <td>".$unTypeservice["idtypeservices"]."</td>
                        <td>".$unTypeservice["libelle"]."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</main>