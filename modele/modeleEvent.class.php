<?php
require_once("modele/modeleMere.class.php");

class ModeleEvent
{
    private $pdo;
    public function __construct($serveur, $bdd, $user, $mdp)
    {
        $this->pdo = ModeleMere::getPdo($serveur, $bdd, $user, $mdp);
    }
    //////////// Evenements //////////////

    public function insertEvenement($tab)
    {
        $requete = "INSERT INT Evenement VALUES (null, :type, :dateEvent, :nomEvenement, :description, :adresse, :horraireD, :horraireF, :capacite, :idcategorie)";
        $donnees = array(
            ":type" => $tab['type'],
            ":dateEvent" => $tab['dateEvent'],
            ":nomEvenement" => $tab['nomEvenement'],
            ":description" => $tab['description'],
            ":adresse" => $tab['adresse'],
            ":horraireD" => $tab['horraireD'],
            ":horraireF" => $tab['horraireF'],
            ":capacite" => $tab['capacite'],
            ":idcategorie" => $tab['idcategorie'],
        );
        if ($this->pdo != null) {
            // on prépare la requete 
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        }
    }


    public function selectAllEvenements()
    {
        $requete = "SELECT * FROM Evenement;";

        if ($this->pdo != null) {
            // on prépare la requete 
            $select  = $this->pdo->prepare($requete);
            $select->execute();
            //extraction de tous les clients
            $lesEvenements = $select->fetchAll();
            return $lesEvenements;
        } else {
            return null;
        }
    }

    public function selectWhereEvenement($idevenement)
    {
        $requete = "SELECT * FROM Evenement WHERE idevenement = :idevenement;";
        if ($this->pdo != null) {
            $donnees = array(":idevenement" => $idevenement);
            //on prepare la requete
            $select = $this->pdo->prepare($requete);
            $select->execute($donnees);
            //extraction du service
            return $select->fetch();
        } else {
            return null;
        }
    }

    public function deleteEvenement($idevenement)
    {
        $requete = "DELETE FROM Evenement WHERE idevenement = :idevenement;";
        $donnees = array(":idevenement" => $idevenement);
        if ($this->pdo != null) {
            //on prepare la requete
            $delete = $this->pdo->prepare($requete);
            $delete->execute($donnees);
        }
    }

    public function updateEvenement($tab)
    {
        $requete = "UPDATE Evenement SET type=:type, dateEvent=:dateEvent, nomEvenement=:nomEvenement, description=:description, adresse=:adresse, horraireD=:horraireD, horraireF=:horraireF, capacite=:capacite, idcategorie=:idcategorie  WHERE idevenement=:idevenement;";
        $donnees = array(
            ":type" => $tab['type'],
            ":dateEvent" => $tab['dateEvent'],
            ":nomEvenement" => $tab['nomEvenement'],
            ":description" => $tab['description'],
            ":adresse" => $tab['adresse'],
            ":horraireD" => $tab['horraireD'],
            ":horraireF" => $tab['horraireF'],
            ":capacite" => $tab['capacite'],
            ":idcategorie" => $tab['idcategorie'],
            ":idevenement" => $tab['idevenement']
        );
        if ($this->pdo != null) {
            //on prepare la requete
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        }
    }

    public function addInscris($idevenement) {
        $req = "INSERT INTO Inscription VALUES(:iduser, :idevenement, sysdate(), :statut);";
        $donnees = array(
            ":iduser" => $_SESSION['iduser'],
            ":idevenement" => $idevenement,
            ":statut" => "Accepté",
        );
        if ($this->pdo != null) {
            //on prepare la requete
            $insert = $this->pdo->prepare($req);
            $insert->execute($donnees);
        }
    }

    public function selectAllInscris($idevenement) {
        $req = "SELECT * FROM Inscription INNER JOIN User ON user.iduser = Inscription.iduser WHERE idevenement=:idevenement;";
        $donnees = array(
            ":idevenement" => $idevenement,
        );
        if ($this->pdo != null) {
            //on prepare la requete
            $select = $this->pdo->prepare($req);
            $select->execute($donnees);
            $lesInscris = $select->fetchAll();
            return $lesInscris;
        } else {
            return null;
        }
    }

    public function selectOneInscri($iduser) {
        $req = "SELECT * FROM Inscription WHERE iduser=:iduser;";
        $donnees = array(
            ":iduser" => $iduser,
        );
        if ($this->pdo != null) {
            //on prepare la requete
            $select = $this->pdo->prepare($req);
            $select->execute($donnees);
            $unInscri = $select->fetchAll();
            $tab = array();
            foreach($unInscri as $inscr){
                $tab[]= $inscr["idevenement"];
            }
            return $tab;
        } else {
            return null;
        }
    }
}


?>