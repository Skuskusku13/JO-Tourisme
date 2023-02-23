    <h2> Liste des services sports et culture  </h2>

    <table class="affiche-tab">
        <?php
            foreach($lesSports as $unSport){
                echo 
                    "<tr>
                        <td><img class='images-hotel' src='images/imagesSQL/".$unSport["image"]."' alt=''></td>",
                        "<td> <p class='libelle'>".$unSport["libelle"]."</p><p class='adresse'>".$unSport['adresse']."</p><p class='email'> ".$unSport['email']."</p><p class='tel'> ".$unSport['tel']."</p>",
                        "<td>".$unSport["prix"]." €</td>",
                        "<td><input class='reservation' type='submit' name='reserver' value='Visiter le site'></td>",
                "</tr>";
            }

            foreach($lesCultures as $uneCulture){
                echo 
                    "<tr>
                        <td><img class='images-hotel' src='images/imagesSQL/".$uneCulture["image"]."' alt=''></td>",
                        "<td> <p class='libelle'>".$uneCulture["libelle"]."</p><p class='adresse'>".$uneCulture['adresse']."</p><p class='email'> ".$uneCulture['email']."</p><p class='tel'> ".$uneCulture['tel']."</p>",
                        "<td>".$uneCulture["prix"]." €</td>",
                        "<td><input class='reservation' type='submit' name='reserver' value='Visiter le site'></td>",
                "</tr>";
            }
        ?>
    </table>
</main>