<?php


$host = 'localhost'; // o 127.0.0.1
$username = 'root';
$password = 'password';


// mysqli_report_error serve a definire il comportamento in caso di errori

// MYSQLI_REPORT_OFF  // disattivare il reporting degli errori
// MYSQLI_REPORT_ERROR // fornisce dei warning a seguito di errori sulle funzioni mysqli
// MYSQLI_REPORT_STRICT // fornisce delle eccezioni invece dei warning a seguito di errori 
// MYSQLI_REPORT_INDEX // fornisce indicazioni sul fatto che venga utilizzato un indice errato o nessun indice
// MYSQLI_REPORT_ALL // Impostare tutte le opzioni precedenti
mysqli_report(MYSQLI_REPORT_STRICT);

// connessione al database
$mysqli = new mysqli($host, $username, $password);
if ($mysqli->connect_error) {
    echo 'Errore di connessione al db' . "\n";
} else {
    echo 'Connessione al db avvenuta con successo' . "\n";
}

// connessione persistente
//$host = 'p:localhost';
// $mysqli = new mysqli($host, $username, $password);

// Vantaggi:
// - Riutilizzo della connessione con miglioramento dell'efficienza

// Svantaggi
// - Rischio di lock delle risorse del database se la connessione non viene chiusa
// - Rischio di esaurimento degli slot di connessione consentiti da mysql
// - Gestione più complessa


// selezionare un database
$db_name = 'employees';
// - fornire un quarto paramentro al costruttore dell'oggetto mysqli
// $mysqli = new mysqli($host, $username, $password, $db_name);

// - usare il metodo select_db
if ($mysqli->select_db($db_name)) {
    echo "Database $db_name selezionato con successo";
} else {
    echo "Impossibile selezionare $db_name: " . $mysqli->error . "\n";
}

// - usare una query esplicita
// $mysqli->query("USE $db_name");







