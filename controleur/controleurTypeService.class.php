<?php
require_once("modele/modeleTypeService.class.php");

class ControleurTypeService {

    private $mod;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->mod = new ModeleTypeService($serveur, $bdd, $user, $mdp);
    }

       
   public function insertTypeservice($tab)
   {
       // on controle la validité des données 

       //appel au modèle pour l'insertion 
       $this->mod->insertTypeservice($tab);
   }

   public function selectAllTypeservices()
   {
       $lesTypeservices = $this->mod->selectAllTypeservices();

       // s'il y a des traitements à faire

       // on renvoie les evenements 
       return $lesTypeservices;
   }
}