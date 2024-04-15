<?php

if (session_status() == PHP_SESSION_ACTIVE) {
    echo "1. Sessione avviata" . "<br>";
} else {
    echo "1. Sessione non avviata" . "<br>";
}
// SESSIONI
session_start();

if (session_status() == PHP_SESSION_ACTIVE) {
    echo "2. Sessione avviata" . "\n";
} else {
    echo "2. Sessione non avviata" . "\n";
}


$_SESSION['number']++;
$number = $_SESSION['number'];

echo $number . "\n";

if ($_SESSION['number'] >= 10) {
    //session_destroy(); // cancello l'intera sessione
    //session_unset(); // cancello tutte le variabile di sessione
    unset($_SESSION['number']); // cancello una variabile specifica
}

if (isset($_SESSION['number'])) {
    echo 'La variabile number esiste' . "\n";
}


