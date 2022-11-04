<?php

    require_once("modele/modele.class.php");

    class Controleur{
        //objet de la classe modele
        private $unModele;
    
        public function __construct($serveur, $serveur2, $bdd, $user, $mdp, $mdp2){
            // instanciation du modele
            $this->unModele = new Modele($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);
        }

        ################ evenement ################

        public function insertEvenement($tab){
            // on controle la validité des données 

            //appel au modèle pour l'insertion 
            $this->unModele->insertEvenement($tab);
        }

        public function selectAllEvenements(){
            $lesEvenements = $this->unModele->selectAllEvenements();

            // s'il y a des traitements à faire

            // on renvoie les evenements 
            return $lesEvenements;
        }

        public function deleteEvenement($idevenement)
        {
            $this->unModele->deleteEvenement($idevenement);
        }

        public function selectWhereEvenement($idevenement)
        {
            return $this->unModele->selectWhereEvenement($idevenement);
        }

        public function updateEvenement($tab)
        {
            $this->unModele->updateEvenement($tab);
        }

        ################ Service ################

        public function insertService($tab){
            // on controle la validité des données 

            //appel au modèle pour l'insertion 
            $this->unModele->insertService($tab);
        }

        public function selectAllServices(){
            $lesServices = $this->unModele->selectAllServices();

            // s'il y a des traitements à faire

            // on renvoie les evenements 
            return $lesServices;
        }

        public function deleteService($idservice)
        {
            $this->unModele->deleteService($idservice);
        }

        public function selectWhereService($idservice)
        {
            return $this->unModele->selectWhereService($idservice);
        }

        public function updateService($tab)
        {
            $this->unModele->updateService($tab);
        }

        ################ Typeservice ################

        public function insertTypeservice($tab){
            // on controle la validité des données 

            //appel au modèle pour l'insertion 
            $this->unModele->insertTypeservice($tab);
        }

        public function selectAllTypeservices(){
            $lesTypeservices = $this->unModele->selectAllTypeservices();

            // s'il y a des traitements à faire

            // on renvoie les evenements 
            return $lesTypeservices;
        }

        ################ Catégorie ################
        
        public function insertCategorie($tab){
            // on controle la validité des données 

            //appel au modèle pour l'insertion 
            $this->unModele->insertCategorie($tab);
        }

        public function selectAllCategories(){
            $lesCategories = $this->unModele->selectAllCategories();

            // s'il y a des traitements à faire

            // on renvoie les evenements 
            return $lesCategories;
        }

        ################ user ################

       /* public function insertUser($tab){
            // on controle la validité des données 
            foreach($tab as $onevalue){
               if ($onevalue == ""){
                return "<p style='text-align: center;'>Veuillez remplir tous les champs</p>";
               } 
            }
            echo "<p style='text-align: center;'>Utilisateur enregistré !</p>";
            $this->unModele->insertUser($tab);
            
        }*/
        public function insertClientPar($tab){
            // on controle la validité des données 
            foreach($tab as $onevalue){
               if ($onevalue == ""){
                return "<p style='text-align: center;'>Veuillez remplir tous les champs</p>";
               } 
            }
            echo "<p style='text-align: center;'>Utilisateur enregistré !</p>";
            $this->unModele->insertClientPar($tab);
            
        }
        public function insertClientPro($tab){
            // on controle la validité des données 
            foreach($tab as $onevalue){
               if ($onevalue == ""){
                return "<p style='text-align: center;'>Veuillez remplir tous les champs</p>";
               } 
            }
            echo "<p style='text-align: center;'>Utilisateur enregistré !</p>";
            $this->unModele->insertClientPro($tab);
            
        }

        public function selectAllHotels(){
            $lesHotels = $this->unModele->selectAllHotels();

            return $lesHotels;
        }

        public function selectAllRestaurants(){
            $lesRestaurants = $this->unModele->selectAllRestaurants();

            return $lesRestaurants;
        }

        public function selectAllLoisirs(){
            $lesSports = $this->unModele->selectAllLoisirs();

            return $lesSports;
        }

        
        public function selectUser($email){
            // on controle la validité des données 
           return $this->unModele->selectUser($email);
            
        }

        public function findByRole($role, $iduser)
        {
            return $this->unModele->findByRole($role, $iduser);
        }

    }

?>