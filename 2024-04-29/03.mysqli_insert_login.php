<?php

$host = 'localhost'; // o 127.0.0.1
$username = 'root';
$password = 'password';

mysqli_report(MYSQLI_REPORT_STRICT);

// connessione al database
$mysqli = new mysqli($host, $username, $password);
if ($mysqli->connect_error) {
    echo 'Errore di connessione al db' . "\n";
} else {
    echo 'Connessione al db avvenuta con successo' . "\n";
}

$db_name = 'mysqli_test';

if ($mysqli->select_db($db_name)) {
    echo "Database $db_name selezionato con successo\n";
} else {
    echo "Impossibile selezionare $db_name: " . $mysqli->error . "\n";
}


$username = 'utente1';
$password = 'pa$$word';
$password = hash('sha256', $password);

$query = "INSERT INTO login (user, password) VALUES ('$username', '$password')";

$result = $mysqli->query($query);

if ($result) {
    echo 'Record inserito correttamente' . "\n";
} else {
    echo $mysqli->error . "\n";
}

// Ultimo id inserito
echo "Id del record inserito: " . $mysqli->insert_id . "\n";

// Numero di righe affette dalla query
echo "Numero di righe affette dalla query: " . $mysqli->affected_rows . "\n";