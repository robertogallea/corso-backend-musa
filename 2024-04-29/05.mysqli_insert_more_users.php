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


function insertUser($mysqli, string $username, string $password)
{
    $password = hash('sha256', $password);
    
    $query = "INSERT INTO login (user, password) VALUES ('$username', '$password')";

    $result = $mysqli->query($query);

    if ($result) {
        echo 'Record inserito correttamente' . "\n";
    } else {
        echo $mysqli->error . "\n";
    }
}

insertUser($mysqli, "user2", "passwordXXX");
insertUser($mysqli, "user3", "passwordXXX01");
insertUser($mysqli, "user4", "passwordXXX02");