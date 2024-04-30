<?php

require_once '06.mysqli_imported_connection.php';

$username = 'utente1';
$password = hash('sha256', 'pa$$word');

$result = $mysqli->query("SELECT * FROM login WHERE user = '$username' AND password = '$password'");

if ($result->num_rows > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}

$username = 'utente1';
$password = hash('sha256', 'pa$$word2');

$result = $mysqli->query("SELECT * FROM login WHERE user = '$username' AND password = '$password'");

if ($result->num_rows > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}

$username = 'utente1';
$password = '\' or id > 0 or password = \'';

$result = $mysqli->query("SELECT * FROM login WHERE user = '$username' AND password = '$password'");

if ($result->num_rows > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}

// L'accesso è consentito perchè viene eseguita una query come la seguente
// SELECT * FROM login WHERE user = 'user1' AND password = '' or id < 100 or password = '';
// Questo rientra nella tipologia di attacchi definito SQL injection


// mysqli_real_escape_string effettua l'escaping dei caratteri speciali di mysql
// per evitare la sql injection
// è buona norma fare passare da questa funzione tutti i valori forniti
// in input dall'utente (es. da un form html)
$username = mysqli_real_escape_string($mysqli, 'utente1');
$password = mysqli_real_escape_string($mysqli, '\' or id > 0 or password = \'');

$result = $mysqli->query("SELECT * FROM login WHERE user = '$username' AND password = '$password'");

if ($result->num_rows > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}
