<?php

// questo file verrà importato con require_once dai file che fanno uso del database

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