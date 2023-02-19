<?php
class ModeleCategorie {

    private $pdo;

    public function __construct($serveur, $serveur2, $bdd, $user, $mdp, $mdp2)
    {
        $this->pdo = null;

        try {
            $this->pdo = new PDO("mysql:host=".$serveur.";charset=UTF8; dbname=".$bdd, $user, $mdp);
        } catch(PDOException $exp) {
            try {
                $this->pdo = new PDO("mysql:host=".$serveur2."; charset=UTF8; dbname=".$bdd, $user, $mdp2);
            } catch(PDOException $exp) {
                echo "Erreur de connexion à la base de données";
                echo $exp->getMessage();
            }
        }
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