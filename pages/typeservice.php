<?php
            $lesTypeservices = $unControleur->selectALLTypeservices();
            require_once("vue/vue_insert_typeservice.php");
            if(isset($_POST['Valider']))
            {
                $unControleur->insertTypeservice($_POST);
            }
?>