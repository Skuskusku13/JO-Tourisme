
<?php
require_once("modele/modeleEvent.class.php");

class ControleurEvent {

    private $mod;

    public function __construct($serveur, $serveur2,  $bdd, $user, $mdp, $mdp2)
    {
        $this->mod = new ModeleEvent($serveur, $serveur2,  $bdd, $user, $mdp, $mdp2);
    }

    public function insertEvenement($tab)
    {
        // on controle la validité des données 

        //appel au modèle pour l'insertion 
        $this->mod->insertEvenement($tab);
    }

    public function selectAllEvenements()
    {
        $lesEvenements = $this->mod->selectAllEvenements();
        // s'il y a des traitements à faire

        // on renvoie les evenements 
        return $lesEvenements;
    }

    public function deleteEvenement($idevenement)
    {
        $this->mod->deleteEvenement($idevenement);
    }

    public function selectWhereEvenement($idevenement)
    {
        return $this->mod->selectWhereEvenement($idevenement);
    }

    public function updateEvenement($tab)
    {
        $this->mod->updateEvenement($tab);
    }
}
?>