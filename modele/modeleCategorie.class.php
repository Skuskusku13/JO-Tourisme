<?php
require_once("modele/modeleMere.class.php");

class ModeleCategorie {

    private $pdo;

    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->pdo = ModeleMere::getPdo($serveur, $bdd, $user, $mdp);
    }

    public function insertCategorie($tab)
    {
        $requete = "insert into Categorie values (null, :libelle)";
        $donnees = array(
            ":libelle" => $tab['libelle'],
        );
        if ($this->pdo != null) {
            // on prépare la requete 
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        }
    }


    public function selectAllCategories()
    {
        $requete = "select * from Categorie;";

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