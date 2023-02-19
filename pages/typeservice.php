<?php
            $lesTypeservices = $c_TypeService->selectALLTypeservices();
            require_once("vue/vue_insert_typeservice.php");
            if(isset($_POST['Valider']))
            {
                $c_TypeService->insertTypeservice($_POST);
            }
?>