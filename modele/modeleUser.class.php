<?php
require_once("modele/modeleMere.class.php");

class ModeleUser
{

    private $pdo;

    public function __construct($serveur, $serveur2, $bdd, $user, $mdp, $mdp2)
    {
        $this->pdo = ModeleMere::getPdo($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);
    }

    public function insertClientPar($tab)
    {
        $requete = "call insertClientPar(:nom, :email, :mdp, :tel, :role, :prenom);";
        $donnees = array(
            ":nom" => $tab['nom'],
            ":email" => $tab['email'],
            ":mdp" => $tab['mdp'],
            ":tel" => $tab['tel'],
            ":role" => "clientPart",
            ":prenom" => $tab['prenom']
        );
        if ($this->pdo != null) {
            //on prepare la requete
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        }
    }


    public function insertClientPro($tab)
    {
        $requete = "call insertClientPro(:nom, :email, :mdp, :tel, :role, :num_Siret, :adresse);";
        $donnees = array(
            ":nom" => $tab['nom'],
            ":email" => $tab['email'],
            ":mdp" => $tab['mdp'],
            ":tel" => $tab['tel'],
            ":role" => "clientPro",
            ":num_Siret" => $tab['num_Siret'],
            ":adresse" => $tab['adresse']
        );
        if ($this->pdo != null) {
            //on prepare la requete
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        }
    }


    public function selectAllHotels()
    {
        $requete = "SELECT * FROM vueHotels;";
        if ($this->pdo != null) {
            //on prepare la requete
            $select = $this->pdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function selectAllRestaurants()
    {
        $requete = "SELECT * FROM vueRestaurants;";
        if ($this->pdo != null) {
            //on prepare la requete
            $select = $this->pdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function selectAllSports()
    {
        $requete = "SELECT * FROM vueSport;";
        if ($this->pdo != null) {
            //on prepare la requete
            $select = $this->pdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function selectAllCultures()
    {
        $requete = "SELECT * FROM vueCulture;";
        if ($this->pdo != null) {
            //on prepare la requete
            $select = $this->pdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function selectAllLoisirs()
    {
        $requete = "SELECT * FROM vueCulture;";
        if ($this->pdo != null) {
            //on prepare la requete
            $select = $this->pdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        } else {
            return null;
        }
    }

    public function checkUser($email)
    {
        $req = "SELECT * FROM user WHERE email=:email;";
        $donnees = array(
            ":email" => $email,
        );
        if ($this->pdo != null) {
            $select = $this->pdo->prepare($req);
            $select->execute($donnees);
            return $select->fetch();
        } else {
            return null;
        }
    }


    public function selectUser($email, $mdp)
    {
        $requete = "SELECT * FROM user WHERE email=? AND mdp=?";
        if ($this->pdo != null) {
            // on prépare la requete 
            $select  = $this->pdo->prepare($requete);
            $select->execute(array($email, $mdp));
            //extraction de tous les clients
            return $select->fetch();
        } else {
            return null;
        }
    }

    public function findByRole($role, $iduser)
    {
        // requête sql avec un WHERE, ça sera un fetch et non pas fetchAll
        $requete = "SELECT * FROM user WHERE role=? AND iduser=?";
        if ($this->pdo != null) {
            //  appel pdo avec la méthode prepare($sql) -> a mettre dans unevariable ex: select
            $select  = $this->pdo->prepare($requete);
            $donnees = array($role, $iduser);
            $select->execute($donnees);
            return $select->fetch();
        } else {
            return null;
        }
    }
    public function selectClientPro($email)
    {
        $requete = "SELECT * FROM vueClientPro WHERE email=?";
        if ($this->pdo != null) {
            // on prépare la requete 
            $select  = $this->pdo->prepare($requete);
            $select->execute(array($email));
            //extraction de tous les clients
            return $select->fetch();
        } else {
            return null;
        }
    }
    public function selectClientPart($email)
    {
        $requete = "SELECT * FROM vueClientPart WHERE email=?";
        if ($this->pdo != null) {
            // on prépare la requete 
            $select  = $this->pdo->prepare($requete);
            $select->execute(array($email));
            //extraction de tous les clients
            return $select->fetch();
        } else {
            return null;
        }
    }
}
