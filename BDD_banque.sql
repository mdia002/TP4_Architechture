CREATE DATABASE IF NOT EXISTS Banque;

use Banque;

-- 1) Création des tables ----------

-- Table `Banque`

CREATE TABLE `Banque` (
  `Banque_id` int(50) NOT NULL,
  `Banque_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`Banque_id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table `Agence`

CREATE TABLE `Agence` (
  `Agence_id` int(50) NOT NULL,
  `Agence_nom` varchar(255) NOT NULL,
  `Agence_adresse` varchar(255) NOT NULL,
  PRIMARY KEY (`Agence_id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- Table `Conseiller`

CREATE TABLE `Conseiller` (
  `Conseiller_id` int(50) NOT NULL,
  `Conseiller_nom` varchar(255) NOT NULL,
   PRIMARY KEY (`Conseiller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table `Client`

CREATE TABLE `Client` (
  `Client_id` int(50) NOT NULL,
  `Compte_id` int(50) NOT NULL,
  `Nom_client` varchar(255),
  `Type_client` varchar(255),
  `Situation_familiale` varchar(255),
  `Adresse_client` varchar(255),
  `Code_postal` INT(5),
  `Ville` varchar(255),
  `Tel` varchar(255),
  PRIMARY KEY(`Client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table `Compte`

CREATE TABLE Compte (
  Compte_id INT NOT NULL,
  Client_id INT NOT NULL,
  date_ouvert DATE NOT NULL,
  Type_compte varchar(255), 
  PRIMARY KEY (Compte_id),
  FOREIGN KEY(Client_id) REFERENCES Client(Client_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table `Operation`

CREATE TABLE `Operation` (
  `Operation_id` int(50) NOT NULL,
  `Operation_libelle` varchar(255) NOT NULL,
  `Operation_date` Date,
  `montant_debit`  DECIMAL,
  `montant_credit` DECIMAL,
  PRIMARY KEY(`Operation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






------- 2) Les lignes de chaque table (INSERTS) ----------

-- Inserts pour la Table `Banque`
INSERT INTO Banque (Banque_id, Banque_nom) VALUES
(1, 'Banque A'),
(2, 'Banque B'),
(3, 'Banque C'),
(4, 'Banque D'),
(5, 'Banque E');

-- Inserts pour la table `Agence`
INSERT INTO Agence (Agence_id, Agence_nom, Agence_adresse) VALUES
(1, 'Agence 1', 'Adresse 1'),
(2, 'Agence 2', 'Adresse 2'),
(3, 'Agence 3', 'Adresse 3'),
(4, 'Agence 4', 'Adresse 4'),
(5, 'Agence 5', 'Adresse 5');

-- Inserts pour la table `Conseiller`

INSERT INTO Conseiller (Conseiller_id, Conseiller_nom) VALUES
(1, 'Conseiller A'),
(2, 'Conseiller B'),
(3, 'Conseiller C'),
(4, 'Conseiller D'),
(5, 'Conseiller E');

-- Inserts pour la table Client
INSERT INTO Client (Client_id, Compte_id, Nom_client, Type_client, Situation_familiale, Adresse_client, Code_postal, Ville, Tel) VALUES
(1, 1, 'Client A', 'Particulier', 'Célibataire', 'Adresse 1', 12345, 'Ville 1', '123-456-7890'),
(2, 2, 'Client B', 'Entreprise', 'Marié', 'Adresse 2', 23456, 'Ville 2', '234-567-8901'),
(3, 3, 'Client C', 'Particulier', 'Célibataire', 'Adresse 3', 34567, 'Ville 3', '345-678-9012'),
(4, 4, 'Client D', 'Entreprise', 'Marié', 'Adresse 4', 45678, 'Ville 4', '456-789-0123'),
(5, 5, 'Client E', 'Particulier', 'Célibataire', 'Adresse 5', 56789, 'Ville 5', '567-890-1234');

-- Inserts pour la table Compte
INSERT INTO Compte (Compte_id, Client_id, date_ouvert, Type_compte) VALUES
(1, 1, '2023-01-01', 'Épargne'),
(2, 2, '2023-02-15', 'Courant'),
(3, 3, '2023-03-10', 'Épargne'),
(4, 4, '2023-04-22', 'Courant'),
(5, 5, '2023-05-19', 'Épargne');


-- Inserts pour la table Opération
INSERT INTO Operation (Operation_id, Operation_libelle, Operation_date, montant_debit, montant_credit) VALUES
(1, 'Opération 1', '2023-01-01', 100.50, 0),
(2, 'Opération 2', '2023-02-15', 50, 0),
(3, 'Opération 3', '2023-03-10', 200, 0),
(4, 'Opération 4', '2023-04-22', 0, 75.25),
(5, 'Opération 5', '2023-05-19', 300, 0);
