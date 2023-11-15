<?php
require_once('BDD.php');

$database = new BDD();
$conn = $database->getConnection();

if ($conn) {
    echo "BDD connectée avec succés";
} else {
    echo "Connexion BDD échouée";
}
?>