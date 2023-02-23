<?php

class  ModeleMere {

    private static $pdo;

    public static function connexion ($serveur, $serveur2, $bdd, $user, $mdp, $mdp2)
    {
        ModeleMere::$pdo = null;

        try {
            ModeleMere::$pdo= new PDO("mysql:host=".$serveur."; charset=UTF8; dbname=".$bdd, $user, $mdp);
        } catch(PDOException $exp) {
            try {
                ModeleMere::$pdo= new PDO("mysql:host=".$serveur2."; charset=UTF8; dbname=".$bdd, $user, $mdp2);
            } catch(PDOException $exp) {
                echo "Erreur de connexion à la bdd";
                echo $exp->getMessage();
            }
        }
    }
    public static function getPdo ($serveur, $serveur2, $bdd, $user, $mdp, $mdp2)
    {
        ModeleMere::connexion ($serveur, $serveur2, $bdd, $user, $mdp, $mdp2); 
        return ModeleMere::$pdo; 
    }
}