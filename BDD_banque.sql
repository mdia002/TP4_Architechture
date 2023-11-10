------------------------------------------------------------- Exercie 2: Base de données banque -------------------------------------------------------------

CREATE DATABASE IF NOT EXISTS Banque;

use Banque;

------- 1) Création des tables ----------

-- Table `Banque`

CREATE TABLE `Banque` (
  `banque_id` int(50) NOT NULL,
  `banque_nom` varchar(255) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table `Agence`

CREATE TABLE `Agence` (
  `agence_id` int(50) NOT NULL,
  'agence_nom' varchar(255), NOT NULL,
  `agence_adresse` varchar(255) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table `Conseiller`

CREATE TABLE `Conseiller` (
  `conseiller_id` int(50) NOT NULL,
  'conseiller_nom' varchar(255), NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table `Compte`

CREATE TABLE `Compte` (
  `compte_id` int(50) NOT NULL,
  'client_id' int(50), NOT NULL,
  'date_ouvert' Date, NOT NULL,
  'type_compte' varchar(255)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table `Client`

CREATE TABLE `Client` (
  `client_id` int(50) NOT NULL,
  'compte_id' int(50), NOT NULL,
  'nom_client' varchar(255),
  'type_client' varchar(255),
  'situation_familiale' varchar(255),
  'adresse_client' varchar(255),
  'code_postal' INT(5),
  'ville' varchar(255),
  'tel' varchar(255)


  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table `Operation`

CREATE TABLE `Operation` (
  `operation_id` int(50) NOT NULL,
  'operation_libelle' varchar(255), NOT NULL,
  'operation_date' Date,
  'montant_debit'  DECIMAL,
  'montant_credit' DECIMAL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
