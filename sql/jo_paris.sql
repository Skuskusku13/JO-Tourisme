#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

CREATE TABLE Categorie(
        idcategorie Int NOT NULL ,
        libelle     Text NOT NULL
	,CONSTRAINT Categorie_PK PRIMARY KEY (idcategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        idclient Int NOT NULL ,
        nom      Varchar (50) NOT NULL ,
        email    Varchar (50) NOT NULL ,
        tel      Varchar (50) NOT NULL ,
        mdp      Varchar (50) NOT NULL
	,CONSTRAINT Client_PK PRIMARY KEY (idclient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Evenement
#------------------------------------------------------------

CREATE TABLE Evenement(
        idevenement  Int NOT NULL ,
        type         Varchar (50) NOT NULL ,
        dateEvent    Date NOT NULL ,
        nomEvenement Varchar (50) NOT NULL ,
        description  Text NOT NULL ,
        adresse      Varchar (50) NOT NULL ,
        horraireD    Time NOT NULL ,
        horraireF    Time NOT NULL ,
        capacite     Int NOT NULL ,
        idcategorie  Int NOT NULL
	,CONSTRAINT Evenement_PK PRIMARY KEY (idevenement)

	,CONSTRAINT Evenement_Categorie_FK FOREIGN KEY (idcategorie) REFERENCES Categorie(idcategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Media
#------------------------------------------------------------

CREATE TABLE Media(
        idmedia Int NOT NULL ,
        url     Varchar (100) NOT NULL
	,CONSTRAINT Media_PK PRIMARY KEY (idmedia)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Typeservice
#------------------------------------------------------------

CREATE TABLE Typeservice(
        idtypeservices Int NOT NULL ,
        libelle        Varchar (50) NOT NULL
	,CONSTRAINT Typeservice_PK PRIMARY KEY (idtypeservices)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Service
#------------------------------------------------------------

CREATE TABLE Service(
        idservice      Int NOT NULL ,
        libelle        Varchar (50) NOT NULL ,
        adresse        Varchar (50) NOT NULL ,
        prix           Float NOT NULL ,
        tel            Varchar (50) NOT NULL ,
        email          Varchar (50) NOT NULL ,
        idtypeservices Int NOT NULL
	,CONSTRAINT Service_PK PRIMARY KEY (idservice)

	,CONSTRAINT Service_Typeservice_FK FOREIGN KEY (idtypeservices) REFERENCES Typeservice(idtypeservices)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Client_Pro
#------------------------------------------------------------

CREATE TABLE Client_Pro(
        idclient  Int NOT NULL ,
        num_Siret Varchar (50) NOT NULL ,
        adresse   Varchar (50) NOT NULL ,
        nom       Varchar (50) NOT NULL ,
        email     Varchar (50) NOT NULL ,
        tel       Varchar (50) NOT NULL ,
        mdp       Varchar (50) NOT NULL
	,CONSTRAINT Client_Pro_PK PRIMARY KEY (idclient)

	,CONSTRAINT Client_Pro_Client_FK FOREIGN KEY (idclient) REFERENCES Client(idclient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Client_Particulier
#------------------------------------------------------------

CREATE TABLE Client_Particulier(
        idclient Int NOT NULL ,
        prenom   Varchar (50) NOT NULL ,
        nom      Varchar (50) NOT NULL ,
        email    Varchar (50) NOT NULL ,
        tel      Varchar (50) NOT NULL ,
        mdp      Varchar (50) NOT NULL
	,CONSTRAINT Client_Particulier_PK PRIMARY KEY (idclient)

	,CONSTRAINT Client_Particulier_Client_FK FOREIGN KEY (idclient) REFERENCES Client(idclient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Pub
#------------------------------------------------------------

CREATE TABLE Pub(
        idpub       Int  Auto_increment  NOT NULL ,
        typePub     Varchar (50) NOT NULL ,
        budget      Float NOT NULL ,
        dateDebut   Date NOT NULL ,
        dateFin     Date NOT NULL ,
        idevenement Int NOT NULL ,
        idclient    Int NOT NULL
	,CONSTRAINT Pub_PK PRIMARY KEY (idpub)

	,CONSTRAINT Pub_Evenement_FK FOREIGN KEY (idevenement) REFERENCES Evenement(idevenement)
	,CONSTRAINT Pub_Client_Pro0_FK FOREIGN KEY (idclient) REFERENCES Client_Pro(idclient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commenter
#------------------------------------------------------------

CREATE TABLE Commenter(
        idclient    Int NOT NULL ,
        idevenement Int NOT NULL ,
        contenu     Text NOT NULL ,
        note        Int NOT NULL ,
        dateCom     Date NOT NULL
	,CONSTRAINT Commenter_PK PRIMARY KEY (idclient,idevenement)

	,CONSTRAINT Commenter_Client_FK FOREIGN KEY (idclient) REFERENCES Client(idclient)
	,CONSTRAINT Commenter_Evenement0_FK FOREIGN KEY (idevenement) REFERENCES Evenement(idevenement)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Inscription
#------------------------------------------------------------

CREATE TABLE Inscription(
        idclient    Int NOT NULL ,
        idevenement Int NOT NULL ,
        dateD       Date NOT NULL ,
        commentaire Text NOT NULL ,
        statut      Varchar (50) NOT NULL
	,CONSTRAINT Inscription_PK PRIMARY KEY (idclient,idevenement)

	,CONSTRAINT Inscription_Client_FK FOREIGN KEY (idclient) REFERENCES Client(idclient)
	,CONSTRAINT Inscription_Evenement0_FK FOREIGN KEY (idevenement) REFERENCES Evenement(idevenement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Louer
#------------------------------------------------------------

CREATE TABLE Louer(
        idclient  Int NOT NULL ,
        idservice Int NOT NULL ,
        heureD TIME,
        heureF TIME,
        ,CONSTRAINT Louer_PK PRIMARY KEY (idclient, idservice)
)ENGINE=InnoDB;


create table user (
    iduser int(3) not null auto_increment,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email varchar(255),
    mdp varchar(255),
    rolee varchar(20),
    primary key(iduser)
);


#---------------------------------------------------------
# insertion de Categories dans la table Categorie
#--------------------------------------------------------
insert into Categorie values (NULL, "Epreuves");
insert into Categorie values (NULL, "Ceremonies");


#---------------------------------------------------------
# insertion de Typeservice dans la table Typeservice
#--------------------------------------------------------
insert into Typeservice values (NULL, "Hotels");
insert into Typeservice values (NULL, "Bars & Restaurants");
insert into Typeservice values (NULL, "Culture");
insert into Typeservice values (NULL, "Sport");


#---------------------------------------------------------
# insertion de `Service` dans la table `Service`
#--------------------------------------------------------


insert into `Service` values 
        (NULL, "Novotel Paris Vaugirart", "257 Rue de Vaugirard", 200, "0155689745", "NovotelVaugirard@gmail.com", 01),
        (NULL, "Hotel Molitor", "13 Rue Nungesser et Coli", 500, "0158451275", "HotelMolitor@gmail.com", 01),
        (NULL, "Hotel F1 Paris St Ouen", "29 Ruz Docteur Babinski ", 43, "0181247956", "HotelF1@gmail.com", 01),
        (NULL, "Le bouillon Chartier", "7 Rue du Faubourg Montmartre", 25, "0185695864", "bouillonChartier@gmail.com", 02),
        (NULL, "L'alchimiste", "9 Rue Nicolas Flamelle", 10, "0158851474", "Lalchimist@gmail.com", 02),
        (NULL, "Le train bleu", "Place Louis Armand", 60, "015887834", "Letrainbleu@gmail.com", 02),
        (NULL, "Musée Du Louvre", "1 Rue de Rivoli ", 20, "0188451236", "Musée-louvre@gmail.com", 03),
        (NULL, "Cinéma Pathé Opéra", "32 Rue Louis le Grand", 20, "0188584712", "Cinémapathé@gmail.com", 03),
        (NULL, "Muséum d'Histoire naturelle", "57 Rue Cuvier", 20, "015689521", "MuséH-Naturelle@gmail.com", 03),
        (NULL, "Fitness Park", "65 Rue de Bagnolet", 20, "0185496285", "Fitness20@gmail.com", 04),
        (NULL, "Picine Paris", "4 Rue Louis Armand", 7, "0181687415", "Picineparis@gmail.com", 04),
        (NULL, "Basic-Fit", "58 Av. Philippe Auguste", 20, "0145879254", "Basic-Fit@gmail.com", 04);

#---------------------------------------------------------
# insertion de Evenement dans la table Evenement
#--------------------------------------------------------

insert into `Evenement` values (NULL, "Epreuve natation", "2024-07-14","Epreuve natation masculine", "Piscine ouverte", "Centre Aquatique de Saint-Denis", "10:30", "12:00", 4000, 01);
insert into `Evenement` values (NULL, "Epreuve natation", "2024-07-15","Epreuve natation feminine", "Piscine ouverte", "Centre Aquatique de Saint-Denis", "10:30", "12:00", 4000, 01);
insert into `Evenement` values (NULL, "Epreuve course", "2024-07-16","Epreuve course feminine", "Stade ouvert", "Stade de Saint-Denis", "10:30", "12:00", 1600, 01);
insert into `Evenement` values (NULL, "Epreuve course", "2024-07-17","Epreuve course masculine", "Stade ouvert", "Stade de Saint-Denis", "10:30", "12:00", 2300, 01);
insert into `Evenement` values (NULL, "Epreuve Lancer de Disque", "2024-07-18","Epreuve force feminine", "Stade ouvert", "Stade de Saint-Denis", "10:30", "12:00", 3655, 01);
insert into `Evenement` values (NULL, "Epreuve Lancer de Disque", "2024-07-19","Epreuve force masculine", "Stade ouvert", "Stade de Saint-Denis", "10:30", "12:00", 5000, 01);


#---------------------------------------------------------
# insertion de USER dans la user Categorie
#--------------------------------------------------------
insert into user values (NULL, "Levy", "Dan", "d@gmail.com", "123", "admin");
insert into user values (NULL, "Akilal", "Amazigh", "m@gmail.com", "123", "admin");
insert into user values (NULL, "Housse", "Thomas", "t@gmail.com", "123", "admin");