#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

drop database if exists jo_paris; 
create database jo_paris; 
use jo_paris; 

#------------------------------------------------------------
# Table: user
#------------------------------------------------------------
create table user
(
    iduser int(3) NOT NULL auto_increment,
    nom VARCHAR(50) NOT NULL ,
    email varchar(255) NOT NULL ,
    mdp varchar(255) NOT NULL ,
    tel Varchar (50) NOT NULL ,
    role enum("admin", "clientPart", "clientPro"),
    primary key(iduser)
);

#------------------------------------------------------------
# Table: Client_Pro
#------------------------------------------------------------

CREATE TABLE Client_Pro
(
    iduser  Int NOT NULL ,
    num_Siret Varchar (50) NOT NULL ,
    adresse   Varchar (50) NOT NULL ,
    PRIMARY KEY (iduser) ,
    FOREIGN KEY (iduser) REFERENCES user(iduser)
);


#------------------------------------------------------------
# Table: Client_Particulier
#------------------------------------------------------------

CREATE TABLE Client_Particulier
(
    iduser Int NOT NULL ,
    prenom   Varchar (50) NOT NULL ,
    PRIMARY KEY (iduser) ,
    FOREIGN KEY (iduser) REFERENCES user(iduser)
);


#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

CREATE TABLE Categorie
(
    idcategorie Int (3) NOT NULL auto_increment,
    libelle     text NOT NULL ,
    PRIMARY KEY (idcategorie)
);

#------------------------------------------------------------
# Table: Evenement
#------------------------------------------------------------

CREATE TABLE Evenement
(
    idevenement  Int (3) NOT NULL auto_increment,
    type         Varchar (50) NOT NULL ,
    dateEvent    Date NOT NULL ,
    nomEvenement Varchar (50) NOT NULL ,
    description  Text NOT NULL ,
    adresse      Varchar (50) NOT NULL ,
    horraireD    Time NOT NULL ,
    horraireF    Time NOT NULL ,
    capacite     Int NOT NULL ,
    idcategorie  Int NOT NULL ,
    PRIMARY KEY (idevenement) ,
    FOREIGN KEY (idcategorie) REFERENCES Categorie(idcategorie)
);


#------------------------------------------------------------
# Table: Media
#------------------------------------------------------------

CREATE TABLE Media
(
    idmedia Int (3) NOT NULL auto_increment,
    url     Varchar (100) NOT NULL ,
    PRIMARY KEY (idmedia)
);


#------------------------------------------------------------
# Table: Typeservice
#------------------------------------------------------------

CREATE TABLE Typeservice
(
    idtypeservices Int (3) NOT NULL auto_increment,
    libelle        Varchar (50) NOT NULL,
    PRIMARY KEY (idtypeservices)
);


#------------------------------------------------------------
# Table: Service
#------------------------------------------------------------

CREATE TABLE Service
(
    idservice      Int (3) NOT NULL auto_increment,
    libelle        Varchar (50) NOT NULL ,
    adresse        Varchar (50) NOT NULL ,
    prix           Float NOT NULL ,
    tel            Varchar (50) NOT NULL ,
    email          Varchar (50) NOT NULL ,
    image          Varchar (200),
    idtypeservices Int NOT NULL,
    PRIMARY KEY (idservice),
    FOREIGN KEY (idtypeservices) REFERENCES Typeservice(idtypeservices)
);


#------------------------------------------------------------
# Table: Pub
#------------------------------------------------------------

CREATE TABLE Pub
(
    idpub       Int (3) NOT NULL auto_increment ,
    typePub     Varchar (50) NOT NULL ,
    budget      Float NOT NULL ,
    dateDebut   Date NOT NULL ,
    dateFin     Date NOT NULL ,
    idevenement Int NOT NULL ,
    iduser    Int NOT NULL , 
    PRIMARY KEY (idpub) ,
    FOREIGN KEY (idevenement) REFERENCES Evenement(idevenement) ,
    FOREIGN KEY (iduser) REFERENCES user(iduser)
);


#------------------------------------------------------------
# Table: Commenter
#------------------------------------------------------------

CREATE TABLE Commenter
(
    iduser    Int NOT NULL ,
    idevenement Int NOT NULL ,
    contenu     Text NOT NULL ,
    note        Int NOT NULL ,
    dateCom     Date NOT NULL ,   
    PRIMARY KEY (iduser,idevenement) ,
    FOREIGN KEY (iduser) REFERENCES user(iduser) ,
    FOREIGN KEY (idevenement) REFERENCES Evenement(idevenement)
);

#------------------------------------------------------------
# Table: Inscription
#------------------------------------------------------------

CREATE TABLE Inscription
(
    iduser    Int NOT NULL ,
    idevenement Int NOT NULL ,
    dateD       Date NOT NULL ,
    commentaire Text NOT NULL ,
    statut      Varchar (50) NOT NULL ,
    PRIMARY KEY (iduser,idevenement) ,
    FOREIGN KEY (iduser) REFERENCES user(iduser) ,
    FOREIGN KEY (idevenement) REFERENCES Evenement(idevenement)
);


#------------------------------------------------------------
# Table: Louer
#------------------------------------------------------------

CREATE TABLE Louer
(
    iduser  Int NOT NULL ,
    idservice Int NOT NULL ,
    heureD TIME,
    heureF TIME,
    PRIMARY KEY (iduser, idservice)
);

#------------------------------------------------------------
# Procedure stockee pour l_insertion d_un Client_Particulier
#------------------------------------------------------------

delimiter $
create procedure insertClientPar (IN c_nom varchar(50), IN c_email varchar(50), IN c_mdp varchar(50), 
IN c_tel varchar(50), IN c_role varchar(50), IN c_prenom varchar(50)) 
Begin 
        Declare c_iduser int(3); 
        
        insert into user values (null, c_nom, c_email, c_mdp, c_tel, c_role ); 
        select iduser into c_iduser 
        from user 
        where nom = c_nom and email =c_email and mdp=c_mdp and tel= c_tel; 
        insert into Client_Particulier values (c_iduser, c_prenom );
End $
delimiter  ;

#------------------------------------------------------------
# Procedure stockee pour l_insertion d_un Client_Pro
#------------------------------------------------------------

delimiter $
create procedure insertClientPro (IN c_nom varchar(50), IN c_email varchar(50), IN c_mdp varchar(50), 
IN c_tel varchar(50), IN c_role varchar(50), IN c_num_Siret varchar(50), IN c_adresse varchar(50) ) 
Begin 
        Declare c_iduser int(3); 
        
        insert into user values (null, c_nom, c_email, c_mdp, c_tel, c_role ); 
        select iduser into c_iduser 
        from user 
        where nom = c_nom and email =c_email and mdp=c_mdp and tel= c_tel; 
        insert into Client_Pro values (c_iduser, c_num_Siret, c_adresse);
End $
delimiter  ;

#------------------------------------------------------------
# Procedure stockee pour la supression d_un Client_Partivulier
#------------------------------------------------------------

delimiter $
create procedure deleteClientPar (IN c_iduser int(3) ) 
Begin 
        delete from Client_Particulier where iduser = c_iduser ;     
        delete from user where iduser = c_iduser ;   
End $
delimiter  ; 

#------------------------------------------------------------
# Procedure stockee pour la supression d_un Client_Pro
#------------------------------------------------------------

delimiter $
create procedure deleteClientPro (IN c_iduser int(3) ) 
Begin 
        delete from Client_Pro where iduser = c_iduser ;     
        delete from user where iduser = c_iduser ;   
End $
delimiter  ; 

#------------------------------------------------------------
# Procedure stockee pour la modification d_un Client_Particulier
#------------------------------------------------------------

delimiter $
create procedure updateClientPar (IN c_nom varchar(50), IN c_email varchar(50), 
	IN c_mdp varchar(50), IN c_tel varchar(50) , IN c_role varchar(50), 
	IN c_prenom varchar(50), IN c_iduser int(3)) 
Begin  
        update user set nom = c_nom, email = c_email, mdp = c_mdp, tel = c_tel, role =c_role 
        where iduser = c_iduser ; 

        update Client_Particulier set prenom = c_prenom where iduser = c_iduser ;
End $
delimiter  ; 

#------------------------------------------------------------
# Procedure stockee pour la modification d_un Client_Pro
#------------------------------------------------------------

delimiter $
create procedure updateClientPro (IN c_nom varchar(50), IN c_email varchar(50), 
	IN c_mdp varchar(50), IN c_tel varchar(50) , IN c_role varchar(50), 
	IN c_num_Siret varchar(50), IN c_adresse varchar(50), IN c_iduser int(3)) 
Begin  
        update user set nom = c_nom, email = c_email, mdp = c_mdp, tel = c_tel, role =c_role 
        where iduser = c_iduser ; 

        update Client_Pro set num_Siret = c_num_Siret, adresse = c_adresse  where iduser = c_iduser ;
End $
delimiter  ; 

#---------------------------------------------------------
# insertion de USER dans la table user
#--------------------------------------------------------

insert into user values (NULL, "Akilal", "a@gmail.com", "123", "0605743353", "admin");

#----------------------------------------------------------------
# insertion de Client_Particulier dans la table Client_Particulier
#-----------------------------------------------------------------

call insertClientPar ("Levy", "l@gmail.com", "123", "0754862541", "clientPart", "Dan");

#---------------------------------------------------------
# insertion de Client_Pro dans la table Client_Pro
#--------------------------------------------------------

call insertClientPro ("Housset", "h@gmail.com", "123", "0875463251", "clientPro", "84351248751428", "12 rue de Cléry Paris");

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
# insertion de Service dans la table Service
#--------------------------------------------------------

-- hotel
insert INTO Service values  
        (NULL, "Novotel Paris Vaugirart", "257 Rue de Vaugirard", 200, "0155689745", "NovotelVaugirard@gmail.com", "novotel_paris_vaugirard.png",01),
        (NULL, "Hotel Molitor", "13 Rue Nungesser et Coli", 500, "0158451275", "HotelMolitor@gmail.com", "hotel_molitor.png", 01),
        (NULL, "Hotel F1 Paris St Ouen", "29 Ruz Docteur Babinski ", 43, "0181247956", "HotelF1@gmail.com", "hotel_f1.png", 01);
-- restaurant 
INSERT INTO Service values
        (NULL, "Le bouillon Chartier", "7 Rue du Faubourg Montmartre", 25, "0185695864", "bouillonChartier@gmail.com", "bouillon-chartier.png", 02),
        (NULL, "L'alchimiste", "9 Rue Nicolas Flamelle", 10, "0158851474", "Lalchimist@gmail.com", "alchimiste.png", 02),
        (NULL, "Le train bleu", "Place Louis Armand", 60, "015887834", "Letrainbleu@gmail.com", "le-train-bleu.png", 02);
-- loisir 
INSERT INTO Service values
        (NULL, "Musée Du Louvre", "1 Rue de Rivoli ", 20, "0188451236", "Musée-louvre@gmail.com", "", 03),
        (NULL, "Cinéma Pathé Opéra", "32 Rue Louis le Grand", 20, "0188584712", "Cinémapathé@gmail.com", "", 03),
        (NULL, "Muséum d'Histoire naturelle", "57 Rue Cuvier", 20, "015689521", "MuséH-Naturelle@gmail.com", "", 03),
        (NULL, "Fitness Park", "65 Rue de Bagnolet", 20, "0185496285", "Fitness20@gmail.com", "", 04),
        (NULL, "Piscine Paris", "4 Rue Louis Armand", 7, "0181687415", "Picineparis@gmail.com", "", 04),
        (NULL, "Basic-Fit", "58 Av. Philippe Auguste", 20, "0145879254", "Basic-Fit@gmail.com", "", 04);

#---------------------------------------------------------
# insertion de Evenement dans la table Evenement
#--------------------------------------------------------

insert into Evenement values 
        (NULL, "Epreuve natation", "2024-07-14","Epreuve natation masculine", "Piscine ouverte", "Centre Aquatique de Saint-Denis", "10:30", "12:00", 4000, 01),
        (NULL, "Epreuve natation", "2024-07-15","Epreuve natation feminine", "Piscine ouverte", "Centre Aquatique de Saint-Denis", "10:30", "12:00", 4000, 01),
        (NULL, "Epreuve course", "2024-07-16","Epreuve course feminine", "Stade ouvert", "Stade de Saint-Denis", "10:30", "12:00", 1600, 01),
        (NULL, "Epreuve course", "2024-07-17","Epreuve course masculine", "Stade ouvert", "Stade de Saint-Denis", "10:30", "12:00", 2300, 01),
        (NULL, "Epreuve Lancer de Disque", "2024-07-18","Epreuve force feminine", "Stade ouvert", "Stade de Saint-Denis", "10:30", "12:00", 3655, 01),
        (NULL, "Epreuve Lancer de Disque", "2024-07-19","Epreuve force masculine", "Stade ouvert", "Stade de Saint-Denis", "10:30", "12:00", 5000, 01);


#-----------------------------------------------------------------
# Creation d_une vue de services de la categorie Hotels
#-----------------------------------------------------------------

drop view if exists vueHotels;
create view vueHotels as (
	select t.libelle as Categorie, s.libelle, s.adresse, s.prix, s.tel, s.email, s.image
	from Service s, Typeservice t
	where s.idtypeservices = t.idtypeservices
    and s.idtypeservices = 1
);

#-----------------------------------------------------------------
# Creation d_une vue de services de la categorie restaurant et bar
#-----------------------------------------------------------------

drop view if exists vueRestaurants;
create view vueRestaurants as (
	select t.libelle as Categorie, s.libelle, s.adresse, s.prix, s.tel, s.email, s.image
	from Service s, Typeservice t
	where s.idtypeservices = t.idtypeservices
    and s.idtypeservices = 2
);

#-----------------------------------------------------------------
# Creation d_une vue de services de la categorie Culture 
#-----------------------------------------------------------------

drop view if exists vueCulture;
create view vueCulture as (
	select t.libelle as Categorie, s.libelle, s.adresse, s.prix, s.tel, s.email, s.image
	from Service s, Typeservice t
	where s.idtypeservices = t.idtypeservices
    and s.idtypeservices = 3
);

#-----------------------------------------------------------------
# Creation d_une vue de services de la categorie sport 
#-----------------------------------------------------------------

drop view if exists vueSport;
create view vueSport as (
	select t.libelle as Categorie, s.libelle, s.adresse, s.prix, s.tel, s.email, s.image
	from Service s, Typeservice t
	where s.idtypeservices = t.idtypeservices
    and s.idtypeservices = 4
);
#-----------------------------------------------------------------
# Creation d_une vue des Evenements de la categorie Epreuves 
#-----------------------------------------------------------------

drop view if exists vueEpreuves;
create view vueEpreuves as (
	select c.libelle as Categorie, e.type, e.dateEvent as Date , e.nomEvenement as Nom, e.description, e.adresse, e.horraireD as Debut, e.horraireF as Fin, e.capacite
	from Evenement e, Categorie c
	where e.idcategorie = c.idcategorie
    and e.idcategorie = 1
);

#-----------------------------------------------------------------
# Creation d_une vue des Evenements de la categorie Ceremonies 
#-----------------------------------------------------------------

drop view if exists vueCeremonies;
create view vueCeremonies as (
	select c.libelle as Categorie, e.type, e.dateEvent as Date , e.nomEvenement as Nom, e.description, e.adresse, e.horraireD as Debut, e.horraireF as Fin, e.capacite
	from Evenement e, Categorie c
	where e.idcategorie = c.idcategorie
    and e.idcategorie = 2
);



#-----------------------------------------------------------------
# Creation d_une vue de services de la categorie loisir 
#-----------------------------------------------------------------

drop view if exists vueLoisirs;
create view vueLoisirs as (
	select t.libelle as Categorie, s.libelle, s.adresse, s.prix, s.tel, s.email, s.image
	from Service s, Typeservice t
	where t.idtypeservices = s.idtypeservices and t.idtypeservices = 4 or t.idtypeservices = 3
);
#-----------------------------------------------------------------
# Creation d_une vue de user Part
#-----------------------------------------------------------------

drop view if exists vueClientPart;
create view vueClientPart as (
	select u.iduser, u.nom, c.prenom, u.email, u.mdp, u.tel, u.role
	from user u, Client_Particulier c
	where u.iduser = c.iduser
);

#-----------------------------------------------------------------
# Creation d_une vue de user Pro
#-----------------------------------------------------------------

drop view if exists vueClientPro;
create view vueClientPro as (
	select u.iduser, u.nom, u.email, u.mdp, u.tel, u.role, c.num_Siret, c.adresse
	from user u, Client_Pro c
	where u.iduser = c.iduser
);