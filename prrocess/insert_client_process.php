<?php
require_once('../fichiers_DO.php');
require_once('../fichiers_DAO.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nom = $_POST['Nom_client'];
    $Type_client = $_POST['Type_client'];
    $Situation_familiale = $_POST['Situation_familiale'];
    $Adresse_client = $_POST['Adresse_client'];
    $Code_postal = $_POST['Code_postal'];
    $Ville = $_POST['Ville'];
    $Tel= $_POST['Tel'];
    

    // ClientDTO object
    $clientDO = new ClientDO();
    $clientDO->Nom_client = $Nom_client;
    $clientDO->Type_client = $Type_client;
    $clientDO->Situation_familiale = $Situation_familiale;
    $clientDO->Adresse_client = $Adresse_client;
    $clientDO->Code_postal = $Code_postal;
    $clientDO->Ville = $Ville;
    $clientDO->Tel= $Tel;
  

    // Insert the client data into the database
    $clientDAO = new ClientDAO();
    $clientDAO->save($clientDO);

     // Check the result and redirect accordingly
    if ($clientDAO) {
        // Insert successful, redirect to a confirmation page
        header('Location: ../inserts/page_confirm.php');
        exit();
    } else {
        exit();
    }
}
?>
