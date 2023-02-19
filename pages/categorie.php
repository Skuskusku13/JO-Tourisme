<?php
            $lesCategrories = $c_Categories->selectALLCategories();
            require_once("vue/vue_insert_categorie.php");
            if(isset($_POST['Valider']))
            {
                $c_Categories->insertCategorie($_POST);
            }
?>