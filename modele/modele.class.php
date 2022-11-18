<?php

class Modele
{
    private $pdo;
    public function __construct($serveur, $serveur2, $bdd, $user, $mdp, $mdp2)
    {
        $this->pdo = null;

        try {
            //code qui peut poser des erreurs
            $this->pdo = new PDO("mysql:host=" . $serveur2 . ";charset=UTF8; dbname=" . $bdd, $user, $mdp2);
        
        } catch (PDOException $exp) {
            try {
                $this->pdo = new PDO("mysql:host=" . $serveur. ";dbname=" . $bdd, $user, $mdp);
            } catch (PDOException $exp) {
                echo "Erreur de connexion au serveur";
                echo $exp->getMessage();
            }
        }
    }

    //////////// Evenements //////////////

    public function insertEvenement($tab)
    {
        $requete = "insert into Evenement values (null, :type, :dateEvent, :nomEvenement, :description, :adresse, :horraireD, :horraireF, :capacite, :idcategorie)";
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
        $requete = "select * from Evenement;";

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

    public function selectWhereEvenement($idevenement)
    {
        $requete = "select * from Evenement where idevenement = :idevenement;";
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
        $requete = "delete from Evenement where idevenement = :idevenement;";
        $donnees = array(":idevenement" => $idevenement);
        if ($this->pdo != null) {
            //on prepare la requete
            $delete = $this->pdo->prepare($requete);
            $delete->execute($donnees);
        }
    }

    public function updateEvenement($tab)
    {
        $requete = "update Evenement set type=:type, dateEvent=:dateEvent, nomEvenement=:nomEvenement, description=:description, adresse=:adresse, horraireD=:horraireD, horraireF=:horraireF, capacite=:capacite, idcategorie=:idcategorie  where idevenement=:idevenement;";
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

    //////////// Services //////////////

    public function insertService($tab)
    {
        $requete = "insert into Service values (null, :libelle, :adresse, :prix, :tel, :email, :idtypeservices)";
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
        $requete = "select * from Service;";

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
        $requete = "delete from Service where idservice = :idservice;";
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


    //////////// Catégorie //////////////

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

    //////////// Typeservices //////////////

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

    /////////////// USER ////////////

    /*public function insertUser($tab)
    {
        $requete = "insert into user values (null, :nom, :prenom, :email, :mdp, :rolee)";
        $donnees = array(
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":email" => $tab['email'],
            ":mdp" => $tab['mdp'],
            ":rolee" => "user"
        );
        if ($this->pdo != null) {
            //on prepare la requete
            $insert = $this->pdo->prepare($requete);
            $insert->execute($donnees);
        }
    }*/
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


    public function selectAllHotels(){
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

    public function selectAllRestaurants(){
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

    public function selectAllLoisirs(){
        $requete = "SELECT * FROM vueLoisirs;";
        if ($this->pdo != null) {
            //on prepare la requete
            $select = $this->pdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        } else {
            return null;
        }
    }


    public function selectUser($email)
    {
        $requete = "SELECT * FROM user WHERE email=?";
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

    public function findByRole($role, $iduser)
    {
        // requête sql avec un WHERE, ça sera un fetch et non pas fetchAll
        $requete = "SELECT * FROM user WHERE role=? AND iduser=?";
        if ($this->pdo != null) {
            //  appel pdo avec la méthode prepare($sql) -> a mettre dans unevariable ex: select
            $select  = $this->pdo->prepare($requete);
            $donnees = array($role, $iduser); 
            var_dump($donnees);
            $select->execute($donnees);
            return $select->fetch();
        } else {
            return null;
        }
    }
  
}
