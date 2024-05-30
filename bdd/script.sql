CREATE database assur_m;

\c assur_m;

CREATE TABLE utilisateur(
   id SERIAL,
   nom VARCHAR(50)  NOT NULL,
   prenom VARCHAR(50)  NOT NULL,
   adresse VARCHAR(100)  NOT NULL,
   naissance DATE NOT NULL,
   email VARCHAR(50)  NOT NULL,
   mdp VARCHAR(50)  NOT NULL,
   telephone VARCHAR(20)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE assurance(
   id SERIAL,
   nom VARCHAR(50) ,
   num_telma VARCHAR(20) ,
   num_orange VARCHAR(20) ,
   num_airtel VARCHAR(20) ,
   PRIMARY KEY(id)
);

CREATE TABLE type_vehicule(
   id SERIAL,
   nom VARCHAR(50) ,
   PRIMARY KEY(id)
);

CREATE TABLE operateur(
   id SERIAL,
   nom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE vehicule(
   id SERIAL,
   immatriculation VARCHAR(10)  NOT NULL,
   puissance NUMERIC(10,2)   NOT NULL,
   marque VARCHAR(50)  NOT NULL,
   place INTEGER NOT NULL,
   id_type INTEGER NOT NULL,
   id_utilisateur INTEGER NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_type) REFERENCES type_vehicule(id),
   FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id)
);

CREATE TABLE facture(
   id SERIAL,
   date_debut DATE NOT NULL,
   date_fin DATE NOT NULL,
   police_assurance VARCHAR(50)  NOT NULL,
   id_assurance INTEGER NOT NULL,
   id_vehicule INTEGER NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_assurance) REFERENCES assurance(id),
   FOREIGN KEY(id_vehicule) REFERENCES vehicule(id)
);
