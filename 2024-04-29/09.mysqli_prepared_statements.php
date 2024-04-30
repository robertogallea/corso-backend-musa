<?php

require_once '06.mysqli_imported_connection.php';

$username = 'utente1';
$password = hash('sha256', 'pa$$word');

// si crea il modello della query
$query = $mysqli->prepare("SELECT * FROM login WHERE user = ? and password = ?");

// si collegano i parametri al prepared statement
$query->bind_param('ss', $username, $password);
// s: parametro di tipo stringa
// i: parametro di tipo intero
// d: parametri di tipo double
// b: parametri di tipo binario (BLOB)

// si esegue la query, come risultato l'esito della query (successo/insuccesso)
$result = $query->execute();

if ($result) {
    echo 'Prepared statament eseguito con successo' . "\n";
} else {
    echo 'Prepared statement fallito' . "\n";
}

// si ottiene il risultato della query
$result = $query->get_result();

if ($result->num_rows > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}



$username = 'utente2';
$password = hash('sha256', 'pa$$word');
$query->bind_param('ss', $username, $password); // cambio solo la parametrizzazione
$result = $query->execute();
$result = $query->get_result();
if ($result->num_rows > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}


$username = 'user2';
$password = hash('sha256', 'passwordXXX');
// $query->bind_param('ss', $username, $password); 
// non è necessario perchè il binding viene fatto non sul valore della variabile, ma sulla variabile stessa
// quindi, ogni volta che cambio le variabili, automaticamente sto riparametrizzando il prepared statement
$result = $query->execute();
$result = $query->get_result();
if ($result->num_rows > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}
