<?php
require_once("modele/modeleMere.class.php");

class ModeleService
{
    private $pdo;
    public function __construct($serveur, $serveur2, $bdd, $user, $mdp, $mdp2)
    {
        $this->pdo = ModeleMere::getPdo($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);
    }

    public function insertService($tab)
    {
        $requete = "INSERT INTO Service VALUES (NULL, :libelle, :adresse, :prix, :tel, :email, :idtypeservices);";
        $donnees = array(
            ":libelle" => $tab['libelle'],
            ":adresse" => $tab['adresse'],
            ":prix" => $tab['prix'],
            ":tel" => $tab['tel'],
            ":email" => $tab['email'],
            ":idtypeservices" => $tab['idtypeservices'],
        );
        if ($this->pdo != null) {
            // on prépare la requete 
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        }
    }


    public function selectAllServices()
    {
        $requete = "SELECT * FROM Service;";

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

    public function deleteService($idservice)
    {
        $requete = "DELETE FROM `Service` WHERE idservice = :idservice;";
        $donnees = array(":idservice" => $idservice);
        if ($this->pdo != null) {
            //on prepare la requete
            $delete = $this->pdo->prepare($requete);
            $delete->execute($donnees);
        }
    }

    public function selectWhereService($idservice)
    {
        $requete = "select * from Service where idservice = :idservice;";
        if ($this->pdo != null) {
            $donnees = array(":idservice" => $idservice);
            //on prepare la requete
            $select = $this->pdo->prepare($requete);
            $select->execute($donnees);
            //extraction du service
            return $select->fetch();
        } else {
            return null;
        }
    }

    public function updateService($tab)
    {
        $requete = "update Service set libelle=:libelle, adresse=:adresse, prix=:prix, tel=:tel, email=:email, idtypeservices=:idtypeservices  where idservice= :idservice;";
        $donnees = array(
            ":idservice" => $tab['idservice'],
            ":libelle" => $tab['libelle'],
            ":adresse" => $tab['adresse'],
            ":prix" => $tab['prix'],
            ":tel" => $tab['tel'],
            ":email" => $tab['email'],
            ":idtypeservices" => $tab['idtypeservices']
        );
        if ($this->pdo != null) {
            //on prepare la requete
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        }
    }
}
