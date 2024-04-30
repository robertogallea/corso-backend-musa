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


// credenziali corrette
$username = 'utente1';
$password = hash('sha256', 'pa$$word');

$result = $mysqli->query("SELECT * FROM login WHERE user = '$username' AND password = '$password'");

if ($result->num_rows > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}

// username errato
$username = 'utente10';
$password = hash('sha256', 'pa$$word');

$result = $mysqli->query("SELECT * FROM login WHERE user = '$username' AND password = '$password'");

if ($result->num_rows > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}

// password errata
$username = 'utente1';
$password = hash('sha256', 'wrong_pa$$word');

$result = $mysqli->query("SELECT * FROM login WHERE user = '$username' AND password = '$password'");

if ($result->num_rows > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}


