<?php
require_once("modele/modeleMere.class.php");

class ModeleTypeService {

    private $pdo;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->pdo = ModeleMere::getPdo($serveur, $bdd, $user, $mdp);
    }

    public function insertTypeservice($tab)
    {
        $requete = "insert into Typeservice values (null, :libelle)";
        $donnees = array(
            ":libelle" => $tab['libelle'],
        );
        if ($this->pdo != null) {
            // on prépare la requete 
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        }
    }


    public function selectAllTypeservices()
    {
        $requete = "select * from Typeservice;";

        if ($this->pdo != null) {
            // on prépare la requete 
            $select  = $this->pdo->prepare($requete);
            $select->execute();
            //extraction de tous les clients
            return $select->fetchAll();
        } else {
            return null;
        }
    }
}