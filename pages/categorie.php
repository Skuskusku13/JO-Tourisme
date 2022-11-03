<?php
            $lesCategrories = $unControleur->selectALLCategories();
            require_once("vue/vue_insert_categorie.php");
            if(isset($_POST['Valider']))
            {
                $unControleur->insertCategorie($_POST);
            }
?>