<?php

class  ModeleMere
{

    private static $pdo;

    public static function connexion($serveur, $bdd, $user, $mdp)
    {
        ModeleMere::$pdo = null;

        try {
            ModeleMere::$pdo = new PDO("mysql:host=" . $serveur . "; charset=UTF8; dbname=" . $bdd, $user, $mdp);
        } catch (PDOException $exp) {
            echo "Erreur de connexion à la bdd";
            echo $exp->getMessage();
        }
    }

    public static function getPdo($serveur, $bdd, $user, $mdp)
    {
        ModeleMere::connexion($serveur, $bdd, $user, $mdp);
        return ModeleMere::$pdo;
    }
}
