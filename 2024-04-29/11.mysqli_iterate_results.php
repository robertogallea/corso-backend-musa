<?php

require_once '06.mysqli_imported_connection.php';

$query = "SELECT id, user FROM login";

$result = $mysqli->query($query);

// leggo le righe del risultato una alla volta
while ($row = $result->fetch_array()) {
    echo "Utente id=$row[0], username=$row[1] \n";
}

// fetch_array vs fetch_all
// fetch_array usa molta meno memoria di fetch_all
// ma richiede un overhead per leggere i risultati

// MYSQLI_NUM
// MYSQLI_ASSOC
// MYSQLI_BOTH // Valore predefinito