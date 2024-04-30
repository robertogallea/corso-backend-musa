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

// Creiamo una tabella login
$result = $mysqli->query("CREATE TABLE IF NOT EXISTS login (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(40) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL
    )");

if ($result) {
    echo 'Tabella login creata correttamente' . "\n";
} else {    
    echo 'Impossible creare tabella login: ' . $mysqli->error . " Errore numero: " . $mysqli->errno. "\n";
}

// Creiamo una tabella books
$result = $mysqli->query("CREATE TABLE IF NOT EXISTS books (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(80) NOT NULL,
    author VARCHAR(80) NOT NULL,
    editor VARCHAR(80) NOT NULL,
    year SMALLINT NOT NULL
    )");

if ($result) {
    echo 'Tabella books creata correttamente' . "\n";
} else {    
    echo 'Impossible creare tabella books: ' . $mysqli->error . " Errore numero: " . $mysqli->errno. "\n";
}

// Creiamo una tabella users
$result = $mysqli->query("CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(80) NOT NULL,
    last_name VARCHAR(80) NOT NULL,
    birth_date DATE NOT NULL
    )");

if ($result) {
    echo 'Tabella users creata correttamente' . "\n";
} else {    
    echo 'Impossible creare tabella users: ' . $mysqli->error . " Errore numero: " . $mysqli->errno. "\n";
}    

// Creiamo una tabella lendings (prestiti)
$result = $mysqli->query("CREATE TABLE IF NOT EXISTS lendings (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    lended_at DATE NOT NULL,
    returned ENUM(\"0\", \"1\") NOT NULL    
    )");

if ($result) {
    echo 'Tabella lendings creata correttamente' . "\n";
} else {    
    echo 'Impossible lendings tabella users: ' . $mysqli->error . " Errore numero: " . $mysqli->errno. "\n";
}    
