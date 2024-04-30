<?php

// importo codice per effettuare la connessione al dbms e la selezione del db
require_once '06.mysqli_imported_connection.php';

// Se vogliamo leggere la lista degli utenti sul database
$query = "SELECT id, user FROM login";

$result = $mysqli->query($query);


$rows = $result->fetch_all(); // equivalente a fetch_all(MYSQLI_NUM)

var_dump($rows);

foreach ($rows as $row) {
    echo "Utente id=$row[0], username=$row[1] \n";
}


// fetch_all() come comportamento predefinito, fornisce
// un array indicizzato (le intestazioni delle colonne vengono perse)

$query = "SELECT id, user FROM login";

$result = $mysqli->query($query);

// Se uso MYSQLI_ASSOC gli array interni (colonne) sono array associativi
// le cui chiavi corrispondono ai nomi delle colonne
$rows = $result->fetch_all(MYSQLI_ASSOC);

var_dump($rows);
foreach ($rows as $row) {
    echo "Utente id={$row['id']}, username={$row['user']} \n";
}


// Vantaggi
// - Non devo ricordare l'ordine delle colonne

// Svantaggi
// - L'array associativo è "più pesante da gestire internamente"

$query = "SELECT id, user FROM login";

$result = $mysqli->query($query);

// Se uso MYSQLI_BOTH gli array interni (colonne) sono sia array associativi
// le cui chiavi corrispondono ai nomi delle colonne
// sia array indicizzati
$rows = $result->fetch_all(MYSQLI_BOTH);

var_dump($rows);

foreach ($rows as $row) {
    echo "Utente id={$row['id']}, username={$row['user']} \n";
    echo "Utente id={$row[0]}, username={$row[1]} \n";
}


// Vantaggi
// - Posso utilizzare la doppia indicizzazione

// Svantaggi
// - L'array occupa una dimensione doppia in memoria