<?php

require_once('modele/modeleCategorie.class.php');

class ControleurCategorie  {

    private $mod;

    public function __construct($serveur, $serveur2, $bdd, $user, $mdp, $mdp2)
    {
        $this->mod = new ModeleCategorie($serveur, $serveur2,  $bdd, $user, $mdp, $mdp2);
    }

    public function insertCategorie($tab)
    {
        // on controle la validité des données 

        //appel au modèle pour l'insertion 
        $this->mod->insertCategorie($tab);
    }

    public function selectAllCategories()
    {
        $lesCategories = $this->mod->selectAllCategories();
        // s'il y a des traitements à faire

        // on renvoie les evenements 
        return $lesCategories;
    }
}

?>