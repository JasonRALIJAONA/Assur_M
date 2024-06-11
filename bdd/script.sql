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



CREATE TABLE operateur(
   id SERIAL,
   nom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE mvola (
    id_utilisateur SERIAL PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    numero VARCHAR(20) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    solde DECIMAL(10, 2) DEFAULT 0.00
);
CREATE TABLE orange_money (
    id_utilisateur SERIAL PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    numero VARCHAR(20) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    solde DECIMAL(10, 2) DEFAULT 0.00
);
CREATE TABLE airtel_money (
    id_utilisateur SERIAL PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    numero VARCHAR(20) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    solde DECIMAL(10, 2) DEFAULT 0.00
);

CREATE TABLE annee_fabrication (
    id INT PRIMARY KEY AUTO_INCREMENT,
    intervalle VARCHAR(20),
    prix DECIMAL(10, 2)
);

CREATE TABLE prix_puissance (
    id INT PRIMARY KEY AUTO_INCREMENT,
    puissance INT,
    prix DECIMAL(10, 2)
);

CREATE TABLE type_moteur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    moteur VARCHAR(20),
    pourcentage_prix DECIMAL(10, 2)
);

CREATE TABLE mode_usage (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    descri TEXT,
    pourcentage_prix DECIMAL(10, 2)
);

CREATE TABLE formule (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    descri TEXT,
    pourcentage_prix DECIMAL(10, 2)
);


CREATE TABLE vehicule (
    id INT PRIMARY KEY AUTO_INCREMENT,
    puissance NUMERIC(10,2) NOT NULL,
    place INTEGER,
    marque VARCHAR(50),
    modele VARCHAR(50),
    annee_fabrication_id INT,
    type_moteur_id INT,
    mode_usage_id INT,
    formule_id INT,
    FOREIGN KEY (annee_fabrication_id) REFERENCES annee_fabrication(id),
    FOREIGN KEY (type_moteur_id) REFERENCES type_moteur(id),
    FOREIGN KEY (mode_usage_id) REFERENCES mode_usage(id),
    FOREIGN KEY (formule_id) REFERENCES formule(id)
);

CREATE TABLE facture (
    id INT PRIMARY KEY AUTO_INCREMENT,
    utilisateur_id INT,
    vehicule_id INT,
    date_debut DATE,
    date_fin DATE,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    adresse TEXT,
    marque VARCHAR(50),
    immatriculation VARCHAR(20),
    puissance INT,
    place INT,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id),
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(id)
);


CREATE TABLE carte_grise (
  id SERIAL PRIMARY KEY,
   nom VARCHAR(50)  NOT NULL,
   prenom VARCHAR(50)  NOT NULL,
   adresse VARCHAR(100)  NOT NULL,
   naissance DATE NOT NULL,
  place int NOT NULL,
  immatriculation VARCHAR(10) NOT NULL UNIQUE, 
  marque VARCHAR(50) NOT NULL,
  modele VARCHAR(50) NOT NULL,
--   couleur VARCHAR(50) NOT NULL,
  puissance_administrative INTEGER NOT NULL,  
  annee_fabrication year NOT NULL,
  proprietaire_id INT NOT NULL,
   annee_fabrication_id INT,
   type_moteur_id INT,
   mode_usage_id INT,
--   FOREIGN KEY (proprietaire_id) REFERENCES utilisateur(id)
);

