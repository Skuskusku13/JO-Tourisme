<?php
require_once("modele/modeleUser.class.php");

class ControleurUser
{

    private $mod;

    public function __construct($serveur, $serveur2, $bdd, $user, $mdp, $mdp2)
    {
        $this->mod = new ModeleUser($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);
    }


    public function insertClientPar($tab)
    {
        // on controle la validité des données 
        foreach ($tab as $cle => $value) {
            $tab[$cle] = trim(htmlspecialchars($tab[$cle]));
            if ($value == "") {

                return null;
            }
        }

        if (isset($_POST['InscriptionPart'])) {
            $email = $_POST['email'];
            // on controle si le user existe déjà dans la base de donnée
            $unUser = $this->mod->checkUser($email);
            if (is_array($unUser)) {
                echo "<p style='text-align: center;'>Email déjà existante</p>";
                return null;
            } else {
                echo "<p style='text-align: center;'>Utilisateur enregistré !</p>";
                $this->mod->insertClientPar($tab);
            }
        }
    }

    public function insertClientPro($tab)
    {
        // on controle la validité des données 
        foreach ($tab as $cle => $value) {
            $tab[$cle] = trim(htmlspecialchars($tab[$cle]));
            if ($value == "") {
                echo "<p style='text-align: center;'>Veuillez remplir tous les champs</p>";
                return null;
            }
        }

        if (isset($_POST['InscriptionPro'])) {
            $email = $_POST['email'];
            // on controle si le user existe déjà dans la base de donnée
            $unUser = $this->mod->checkUser($email);
            if (is_array($unUser)) {
                echo "<p style='text-align: center;'>Email déjà existante</p>";
                return null;
            } else {
                echo "<p style='text-align: center;'>Utilisateur enregistré !</p>";
                $this->mod->insertClientPro($tab);
            }
        }
    }

    public function selectAllHotels()
    {
        $lesHotels = $this->mod->selectAllHotels();

        return $lesHotels;
    }

    public function selectAllRestaurants()
    {
        $lesRestaurants = $this->mod->selectAllRestaurants();

        return $lesRestaurants;
    }

    public function selectAllSports()
    {
        $lesSports = $this->mod->selectAllSports();

        return $lesSports;
    }

    public function selectAllCultures()
    {
        $lesCultures = $this->mod->selectAllCultures();

        return $lesCultures;
    }

    public function selectAllLoisirs()
    {
        $lesSports = $this->mod->selectAllLoisirs();

        return $lesSports;
    }

    public function checkUser($email)
    {
        return $this->mod->checkUser($email);
    }

    public function selectUser($email, $mdp)
    {
        $unUser = $this->mod->selectUser($email, $mdp);
        // on controle la validité des données 
        return $unUser;
    }

    public function findByRole($role, $iduser)
    {
        return $this->mod->findByRole($role, $iduser);
    }

    public function selectClientPart($email)
    {
        $unClientPart = $this->mod->selectClientPart($email);
        return $unClientPart;
    }

    public function selectClientPro($email)
    {
        $unClientPro = $this->mod->selectClientPro($email);
        return $unClientPro;
    }
}
