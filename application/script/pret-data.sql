CREATE DATABASE pret;

USE PRET;

CREATE TABLE Utilisateur(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50) ,
   email VARCHAR(50)  NOT NULL,
   mdp VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id)
);

