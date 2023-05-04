<?php
require_once('modele/modeleService.class.php');

class ControleurService {

    private $mod;

    public function __construct($serveur, $serveur2, $bdd, $user, $mdp, $mdp2)
    {
        $this->mod = new ModeleService($serveur, $serveur2,  $bdd, $user, $mdp, $mdp2);
    }

    public function insertService($tab)
    {
        // on controle la validité des données 

        //appel au modèle pour l'insertion 
        $this->mod->insertService($tab);
    }

    public function selectAllServices()
    {
        $lesServices = $this->mod->selectAllServices();

        // s'il y a des traitements à faire

        // on renvoie les evenements 
        return $lesServices;
    }

    public function deleteService($idservice)
    {
        $this->mod->deleteService($idservice);
    }

    public function selectWhereService($idservice)
    {
        return $this->mod->selectWhereService($idservice);
    }

    public function updateService($tab)
    {
        $this->mod->updateService($tab);
    }


}

?>