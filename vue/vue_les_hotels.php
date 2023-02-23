    <h2> Liste des Hotels </h2>

    <table class="affiche-tab">
        <?php
            foreach($lesHotels as $unHotel){
            
                echo 
                    "<tr>
                        <td><img class='images-hotel' src='images/imagesSQL/".$unHotel["image"]."' alt=''></td>",
                        "<td> <p class='libelle'>".$unHotel["libelle"]."</p><p class='adresse'>".$unHotel['adresse']."</p><p class='email'> ".$unHotel['email']."</p><p class='tel'> ".$unHotel['tel']."</p>",
                        "<td>".$unHotel["prix"]." €</td>",
                        "<td><input class='reservation' type='submit' name='reserver' value='Visiter le site'></td>",
                "</tr>";
            }
        ?>
    </table>
</main>