CREATE database assur_m;

\c assur_m;
CREATE TABLE operateur(
   id SERIAL,
   nom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE assureur(
   id SERIAL,
   nom VARCHAR(50) ,
   commission NUMERIC(7,2)  ,
   num_telma VARCHAR(20) ,
   num_orange VARCHAR(20) ,
   num_airtel VARCHAR(20) ,
   PRIMARY KEY(id)
);

CREATE TABLE options(
   id SERIAL,
   nom VARCHAR(100)  NOT NULL,
   descri TEXT,
   valeur NUMERIC(12,2)   NOT NULL,
   id_assureur INTEGER,
   FOREIGN KEY(id_assureur) REFERENCES assureur(id),
   PRIMARY KEY(id)
);


CREATE TABLE utilisateur(
   id SERIAL,
   nom VARCHAR(50)  NOT NULL,
   prenom VARCHAR(50)  NOT NULL,
   adresse VARCHAR(100)  NOT NULL,
   naissance DATE NOT NULL,
   email VARCHAR(50)  NOT NULL,
   mdp VARCHAR(50)  NOT NULL,
   telephone VARCHAR(20)  NOT NULL,
   supprime BOOLEAN DEFAULT FALSE NOT NULL,
   id_operateur INT,
   solde DECIMAL(12,2),
   FOREIGN KEY(id_operateur) REFERENCES operateur(id),
   PRIMARY KEY(id)
);


CREATE TABLE type_vehicule(
   id SERIAL,
   nom VARCHAR(50) ,
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
   id_assureur INTEGER,
   id_options INTEGER,
   PRIMARY KEY(id),
   FOREIGN KEY(id_type) REFERENCES type_vehicule(id),
   FOREIGN KEY(id_options) REFERENCES options(id),
   FOREIGN KEY(id_assureur) REFERENCES assureur(id),
   FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id)
);

CREATE TABLE facture(
   id SERIAL,
   date_debut DATE NOT NULL,
   date_fin DATE NOT NULL,
   police_assurance VARCHAR(50)  NOT NULL,
   id_assureur INTEGER NOT NULL,
   id_vehicule INTEGER NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_assureur) REFERENCES assureur(id),
   FOREIGN KEY(id_vehicule) REFERENCES vehicule(id)
);

CREATE TABLE message(
   id SERIAL,
   id_envoyeur INTEGER NOT NULL,
   id_receveur INTEGER NOT NULL,
   message TEXT NOT NULL,
   moment TIMESTAMP NOT NULL,
   vue BOOLEAN,
   PRIMARY KEY(id)
);

CREATE TABLE service(
   id SERIAL,
   nom VARCHAR(100)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE carburant(
   id SERIAL,
   nom VARCHAR(50) ,
   prix NUMERIC(12,2)  ,
   id_assureur INTEGER,
   PRIMARY KEY(id),
   FOREIGN KEY(id_assureur) REFERENCES assureur(id)
);

CREATE TABLE annee_fabrication(
   id SERIAL,
   debut INTEGER,
   fin INTEGER,
   prix NUMERIC(12,2)  ,
   id_assureur INTEGER,
   PRIMARY KEY(id),
   FOREIGN KEY(id_assureur) REFERENCES assureur(id)
);

CREATE TABLE puissance(
   id SERIAL,
   prix_chevaux NUMERIC(12,2)  ,
   id_assureur INTEGER,
   PRIMARY KEY(id),
   FOREIGN KEY(id_assureur) REFERENCES assureur(id)
);

CREATE TABLE usage(
   id SERIAL,
   nom VARCHAR(100) ,
   valeur NUMERIC(8,2)  ,
   id_assureur INTEGER,
   PRIMARY KEY(id),
   FOREIGN KEY(id_assureur) REFERENCES assureur(id)
);

CREATE TABLE etat(
   id SERIAL,
   libelle VARCHAR(100) ,
   valeur NUMERIC(12,2)  ,
   id_assureur INTEGER,
   PRIMARY KEY(id),
   FOREIGN KEY(id_assureur) REFERENCES assureur(id)
);

CREATE TABLE options(
   id SERIAL,
   nom VARCHAR(100)  NOT NULL,
   descri TEXT,
   valeur NUMERIC(12,2)   NOT NULL,
   id_assureur INTEGER,
   PRIMARY KEY(id),
   FOREIGN KEY(id_assureur) REFERENCES assureur(id)
);

CREATE TABLE payement(
   id SERIAL,
   date_payement DATE NOT NULL,
   valeur NUMERIC(11,2)   NOT NULL,
   frequence INTEGER NOT NULL,
   id_vehicule INTEGER,
   id_utilisateur INTEGER,
   PRIMARY KEY(id),
   FOREIGN KEY(id_vehicule) REFERENCES vehicule(id),
   FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id)
);

