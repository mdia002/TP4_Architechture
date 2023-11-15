<?php
require_once('fichiersDAO.php');

// Affichage Liste clients
$clientDAO = new ClientDAO();

$clients = $clientDAO->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficage Clients</title>
</head>
<body>

    <h2>Liste des Clients</h2>
    <ul>
        <?php foreach ($clients as $client): ?>
            <li><?= "{$client->Nom_client}- <a href='views/view_client.php?id={$client->Client_id}'>View Details</a>" ?></li>
        <?php endforeach; ?>
    </ul>

    <?php
    // Id des clients
    $clientIds = array_column($clients, 'Client_id');
    ?>

    <h2>Selectionner les clients par ID</h2>
    <form action="views/view_client.php" method="get">
        <label for="clientId">Choisis un id client:</label>
        <select name="id" id="clientId">
            <?php foreach ($client_ids as $client_id): ?>
                <option value="<?= $client_id ?>"><?= $client_id ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="View Details">
    </form>
    <!-- Navigation Links -->
    <h2>Inserer des données</h2>
    <ul>
        <li><a href="views/insert_banque.php">Insert Donnees Banque </a></li>
        <li><a href="views/insert_client.php">Insert Donnees Client </a></li>
        <li><a href="views/insert_agence.php">Insert Donnees Agence </a></li>
    </ul>
</body>
</html>
