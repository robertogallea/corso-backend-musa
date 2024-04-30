<?php

require_once '06.mysqli_imported_connection.php';


$user10 = 'user10';
$pass10 = hash('sha256', 'xyz');
$user11 = 'user11';
$pass11 = hash('sha256', 'abc');
$user12 = 'user12';
$pass12 = hash('sha256', 'def');

$sql = "INSERT INTO login (user, password) VALUES ('$user10', '$pass10'); " . 
"INSERT INTO login (user, password) VALUES ('$user11', '$pass11'); " . 
"INSERT INTO login (user, password) VALUES ('$user12', '$pass12'); ";

$result = $mysqli->multi_query($sql);

if ($result) {
    echo "Query multipla eseguita correttamente \n";
} else {
    echo "Query multipla fallita: \n" . $mysqli->error;
}
