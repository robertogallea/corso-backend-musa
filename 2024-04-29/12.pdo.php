<?php

$host = 'localhost'; // o 127.0.0.1
$username = 'root';
$password = 'password';
$database = 'mysqli_test';

try {
  $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
} catch (PDOException $e) {
  die($e->getMessage());  
} 

// Connessioni persistenti
/*
try {
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $password, [PDO::ATTR_PERSISTENT => true]);
} catch (PDOException $e) {
    die($e->getMessage());  
} 
*/
$username = 'utente1';
$password = hash('sha256', 'pa$$word');
$query = "SELECT * FROM login WHERE user = :username and password = :password";

$stmt = $db->prepare($query);

$stmt->bindParam(':password', $password, PDO::PARAM_STR);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);

$result = $stmt->execute();

var_dump($result);

// numero di righe nel risultato
if ($stmt->rowCount() > 0) {
    echo 'Accesso consentito' . "\n";
} else {
    echo 'Username e/o password errata' . "\n";
}

// $rows = $stmt->fetchAll();

// var_dump($rows);

while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    var_dump($row);
}

// PDO::FETCH_BOTH: indicizzato e associativo
// PDO::FETCH_NUM: indicizzato
// PDO::FETCH_ASSOC: associativo


$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);