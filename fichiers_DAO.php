<?php


require_once('configs/BDD.php');
require_once('fichiers_DO.php');


class BanqueDAO {
    private $conn;

    public function __construct() {
        $database = new BDD();
        $this->conn = $database->getConnection();
    }

    //operations Entite Banque
    public function getAll() {
        $query = "SELECT * FROM Banque";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $banques = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $banqueDO = new BanqueDO();
            $banqueDO->Banque_id = $row['Banque_id'];
            $banqueDO->Banque_nom = $row['Banque_nom'];
            $banques[] = $banqueDO;
        }

        return $banques;
    }

    public function getById($Banque_id) {
        $query = "SELECT * FROM Banque WHERE Banque_id = :Banque_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Banque_id", $Banque_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // Banque_iD n'a pas été trouvé
        }

        $banqueDO = new BanqueDO();
        $banqueDO->Banque_id = $row['Banque_id'];
        $banqueDO->Banque_nom = $row['Banque_nom'];

        return $banqueDO;
    }

    public function save(BanqueDO $banqueDO) {
        $query = "INSERT INTO Banque (Banque_nom) VALUES (:Banque_nom)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Banque_nom", $banqueDO->Banque_nom);

        if ($stmt->execute()) {
            return true;  
        } else {
            return false; // Echec Insert 
        }
    }

    public function update(BanqueDO $BanqueDO) {
        $query = "UPDATE Banque SET Banque_nom = :Banque_nom WHERE Banque_id = :Banque_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":Banque_id", $BanqueDO->Banque_id);
        $stmt->bindParam("Banque_nom", $BanqueDO->Banque_nom);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; // Echec de l'Update
        }
    }

    public function delete($Banque_id) {
        $query = "DELETE FROM Banque WHERE Banque_id = :Banque_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Banque_id", $Banque_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false; // Echec du Delete 
        }
    }
}

class AgenceDAO {
    private $conn;

    public function __construct() {
        $database = new BDD();
        $this->conn = $database->getConnection();
    }

    
    public function getAll() {
        $query = "SELECT * FROM Agence";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $agences = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $agenceDO = new AgenceDO();
            $agenceDO->Agence_id = $row['Agence_id'];
            $agenceDO->Agence_nom = $row['Agence_nom'];
            $agenceDO->Agence_adresse = $row['Agence_adresse'];

            $agences[] = $agenceDO;
        }

        return $agences;
    }

    public function getById($Agence_id) {
        $query = "SELECT * FROM Agence WHERE Agence_id = :Agence_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Agence_id", $Agence_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; 
        }

        $agenceDO = new AgenceDO();
        $agenceDO->Agence_id = $row['Agence_id'];
        $agenceDO->Agence_nom = $row['Agence_nom'];
        $agenceDO->Agence_adresse = $row['Agence_adresse'];

        return $agenceDO;
    }

    public function save(AgenceDO $AgenceDO) {
        $query = "INSERT INTO Agence (Agence_nom, Agence_adresse) VALUES (:Agence_nom, :Agence_adresse)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Agence_nom", $AgenceDO->Agence_nom);
        $stmt->bindParam(":adresse", $AgenceDO->Agence_adresse);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function update(AgenceDO $AgenceDO) {
        $query = "UPDATE Agence SET Agence_nom = :Agence_nom, Agence_adresse = :Agence_adresse WHERE Agence_id = :Agence_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":Agence_nom", $AgenceDO->Agence_nom);
        $stmt->bindParam(":Agence_adresse", $AgenceDO->Agence_adresse);
        $stmt->bindParam(":Agence_id", $AgenceDO->Agence_id);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function delete($Agence_id) {
        $query = "DELETE FROM Agence WHERE Agence_id = :Agence_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Agence_id", $Agence_id);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }
}


//Entite Client

class ClientDAO {
    private $conn;

    public function __construct() {
        $database = new BDD();
        $this->conn = $database->getConnection();
    }

   
    public function getAll() {
        $query = "SELECT * FROM Client";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $clients = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clientDO = new ClientDO();
            $clientDO->Client_id = $row['Client_id'];
            $clientDO->Nom_client = $row['Nom_client'];
            $clientDO->Type_client = $row['Type_client'];
            $clientDO->Situation_familiale = $row['Situation_familiale'];
            $clientDO->Adresse_client = $row['Adresse_client'];
            $clientDO->Code_postal = $row['Code_postal'];
            $clientDO->Ville = $row['Ville'];
            $clientDO->Tel = $row['Tel'];

            $clients[] = $clientDO;
        }

        return $clients;
    }

    public function getById($Client_id) {
        $query = "SELECT * FROM Client WHERE Client_id = :Client_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Client_id", $Client_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; 
        }

        $clientDO = new ClientDO();
        $clientDO->Client_id = $row['Client_id'];
        $clientDO->Nom_client = $row['Nom_client'];
        $clientDO->Type_client = $row['Type_client'];
        $clientDO->Situation_familiale = $row['Situation_familiale'];
        $clientDO->Adresse_client = $row['Adresse_client'];
        $clientDO->Code_postal = $row['Code_postal'];
        $clientDO->Ville = $row['Ville'];
        $clientDO->Tel = $row['Tel'];

        $clients[] = $clientDO;
        return $clientDO;
    }

    public function save(ClientDO $clientDO) {
        $query = "INSERT INTO Client (Nom_client, Type_client, Situation_familiale, Adresse_client, Code_postal, Ville, Tel) VALUES (:Nom_client, :Type_client, :Situation_familiale, :Adresse_client, :Code_postal, :Ville, :Tel)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":Nom_client", $clientDO->Nom_client);
        $stmt->bindParam(":Type_client", $clientDO->Type_client);
        $stmt->bindParam(":Situation_familiale", $clientDO->Situation_familiale);
        $stmt->bindParam(":Adresse_client", $clientDO->Adresse_client);
        $stmt->bindParam(":Code_postal", $clientDO->Code_postal);
        $stmt->bindParam(":Ville", $clientDO->Ville);
        $stmt->bindParam(":Tel", $clientDO->Tel);


        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function update(ClientDO $clientDO) {
        $query = "UPDATE Client SET Nom_client = :Nom_client, Type_client=:Type_client, Situation_familiale= :Situation_familiale, Adresse_client= :Adresse_client, Code_postal= :Code_postal, Ville= :Ville, Tel= :Tel WHERE Client_id = :Client_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":Nom_client", $clientDO->Nom_client);
        $stmt->bindParam(":Type_client", $clientDO->Type_client);
        $stmt->bindParam(":Situation_familiale", $clientDO->Situation_familiale);
        $stmt->bindParam(":Adresse_client", $clientDO->Adresse_client);
        $stmt->bindParam(":Code_postal", $clientDO->Code_postal);
        $stmt->bindParam(":Ville", $clientDO->Ville);
        $stmt->bindParam(":Tel", $clientDO->Tel);
        $stmt->bindParam(":Client_id", $clientDO->Client_id);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function delete($client_id) {
        $query = "DELETE FROM Client WHERE Client_id = :Client_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Client_id", $client_id);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
}


/*Entite Conseiller*/ 

class ConseillerDAO {
    private $conn;

    public function __construct() {
        $database = new BDD();
        $this->conn = $database->getConnection();
    }

    
    public function getAll() {
        $query = "SELECT * FROM Conseiller";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $agences = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $conseillerDO = new ConseillerDO();
            $conseillerDO->Conseiller_id = $row['Conseiller_id'];
            $conseillerDO->Conseiller_nom = $row['Conseiller_nom'];

            $conseillers[] = $conseillerDO;
        }

        return $conseillers;
    }

    public function getById($Conseiller_id) {
        $query = "SELECT * FROM Conseiller WHERE Conseiller_id = :Conseiller_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Conseiller_id", $Conseiller_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; 
        }

        $conseillerDO = new ConseillerDO();
        $conseillerDO ->Conseiller_id = $row['Conseiller_id'];
        $conseillerDO ->Conseiller_nom = $row['Conseiller_nom'];
        return $conseillerDO;
    }

    public function save(ConseillerDO $ConseillerDO) {
        $query = "INSERT INTO  (Conseiller_nom) VALUES (:Conseiller_nom)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Conseiller_nom", $ConseillerDO->Conseiller_nom);
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function update(ConseillerDO $ConseillerDO) {
        $query = "UPDATE Conseiller SET Conseiller_nom = :Conseiller_nom WHERE Conseiller_id = :Conseiller_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":Conseiller_nom", $ConseillerDO->Conseiller_nom);
        $stmt->bindParam(":Conseiller_id", $ConseillerDO->Conseiller_id);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function delete($Conseiller_id) {
        $query = "DELETE FROM Conseiller WHERE Conseiller_id = :Conseiller_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Conseiller_id", $Conseiller_id);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }
}


/*Entite Operation*/ 

class OperationDAO {
    private $conn;

    public function __construct() {
        $database = new BDD();
        $this->conn = $database->getConnection();
    }

    
    public function getAll() {
        $query = "SELECT * FROM Operation";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $agences = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $operationDO = new OperationDO();
            $operationDO->Operation_id = $row['Operation_id'];
            $operationDO->Operation_libelle = $row['Operation_libelle'];
            $operationDO->Operation_date = $row['Operation_date'];
            $operationDO->montant_debit= $row['montant_debit'];
            $operationDO->montant_credit= $row['montant_credit'];


            $operations[] = $operationDO;
        }

        return $operations;
    }

    public function getById($Operation_id) {
        $query = "SELECT * FROM Operation WHERE Operation_id = :Operation_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Operation_id", $Operation_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; 
        }

        $operationDO = new OperationDO();
        $operationDO ->Operation_id = $row['Operation_id'];
        $operationDO ->Operation_libelle = $row['Operation_libelle'];
        $operationDO ->Operation_date = $row['Operation_date'];
        $operationDO->montant_debit = $row['montant_debit'];
        $operationDO->montant_credit = $row['montant_credit'];
        return $operationDO;
    }

    public function save(OperationDO $OperationDO) {
        $query = "INSERT INTO  (Operation_libelle, Operation_date, montant_debit, montant_credit) VALUES (:Operation_libelle, :Operation_date, :montant_debit, :montant_credit)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Operation_libelle", $OperationDO->Operation_libelle);
        $stmt->bindParam("Operation_date", $OperationDO->Operation_date);
        $stmt->bindParam("montant_debit", $OperationDO->montant_debit);
        $stmt->bindParam("montant_credit", $OperationDO->montant_credit);
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function update(OperationDO $OperationDO) {
        $query = "UPDATE Operation SET Operation_libelle = :Operation_libelle, Operation_date= :Operation_date, montant_debit = :montant_debit, montant_credit =:montant_credit WHERE Operation_id = :Operation_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":Operation_libelle", $OperationDO->Operation_libelle);
        $stmt->bindParam(":Conseiller_date", $OperationDO->Operation_date);
        $stmt->bindParam("montant_debit", $OperationDO->montant_debit);
        $stmt->bindParam("montant_credit", $OperationDO->montant_credit);
        $stmt->bindParam(":Operation_id", $OperationDO->Operation_id);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

    public function delete($Operation_id) {
        $query = "DELETE FROM Operation WHERE Operation_id = :Operation_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":Operation_id", $Operation_id);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }
}








?>
