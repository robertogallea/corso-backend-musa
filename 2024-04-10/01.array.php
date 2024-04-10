<?php

// Array indicizzati

$array = [10, 5, 3, 1, 7];
var_dump($array);

$array2 = array(3, 4, 6, 1, 5, 2);
var_dump($array2);

print("Il terzo elemento dell'array è $array2[2]\n");
$array2[2] = 100;
print("Il terzo elemento dell'array adesso è $array2[2]\n");


// Array associativo

$assocArray = ['primo' => 1, 'secondo' => 4, 10 => 'xs'];
var_dump($assocArray);

print("Il primo elemento dell'array associativo è {$assocArray["primo"]}\n");
print("Il primo elemento dell'array associativo è " . $assocArray["primo"] . "\n");
$assocArray['primo'] = 25;
print("Il primo elemento dell'array associativo adesso è {$assocArray["primo"]}\n");


// Array multidimensionali (array di array)
$arrayOfArray = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12],
];

var_dump($arrayOfArray);
print("L'elemento in posizione 2,1 è {$arrayOfArray[2][1]} \n");
$arrayOfArray[2][1] = 50;
print("L'elemento in posizione 2,1 adesso è {$arrayOfArray[2][1]} \n");

$arrayOfArray[2] = [13, 14, 15, 16];
var_dump($arrayOfArray);


// Iterare un array
$array = [10, 5, 3, 1, 7];

for ($i = 0; $i<5; $i++) {
    print("Il valore $i-imo è $array[$i]\n");
}

$array[10] = 2;
var_dump($array);

// elemento in posizione 5 non esiste!
for ($i = 0; $i<6; $i++) {
    print("Il valore $i-imo è $array[$i]\n");
}

// elemento in posizione 5-6-7-8-9 non esistono!
for ($i = 0; $i<11; $i++) {
    print("Il valore $i-imo è $array[$i]\n");
}

// corretto modo di iterare un array
foreach ($array as $item) {
    print("Il valore dell'elemento è $item \n");
}

// accesso all'indice
foreach ($array as $i => $item) {
    print("Il valore $i-imo è $item \n");
}

// foreach va bene anche per gli array associativi
$assocArray = ['primo' => 1, 'secondo' => 4, 10 => 'xs'];

foreach ($assocArray as $key => $value) {
    print("Elemento con chiave $key e valore $value \n");
}


// cancellare un elemento
$array = [2, 5, 6];
var_dump($array);
unset($array[1]);
var_dump($array);

$assocArray = ['primo' => 1, 'secondo' => 4, 10 => 'xs'];
var_dump($assocArray);
unset($assocArray['secondo']);
var_dump($assocArray);


// unset può essere usato anche per rimuovere una variabile
$a = 1;
print($a . "\n");
unset($a);
// print($a); // genera un warning perchè la variabile non esiste più


// funzione list
$config = ['pippo', 'c14o'];

$username = $config[0];
$password = $config[1];
print($username . "\n");
print($password . "\n");


list($username, $password) = $config;
print($username . "\n");
print($password . "\n");

// funzione list con array associativo
$config = [
    'username' => 'pippo',
    'password' => 'c14o',
];
//var_dump( array_values($config));
list($username, $password) = array_values($config);
print($username . "\n");
print($password . "\n");

$config = [
    'username' => 'pippo',
    'password' => 'c14o',  
    'email' => 'pippo@pluto.it',
];

// se nell'array vi sono PIU' elementi di quelli richiesti, quelli in eccesso non vengono utilizzati
list($username, $password) = array_values($config);
var_dump($username);
var_dump($password);

// se nell'array vi sono MENO elementi di quelli richiesti, quelli mancanti vengono impostati con valore null e viene generato un warning
// list($username, $password, $email, $other) = array_values($config);



/*
FUNZIONI PER LA GESTIONE DEGLI ARRAY
*/

// Numero di elementi degli array
$array = [3, 4, 5, 6];
print('L\'array contiene ' . sizeof($array) . " elementi \n");
print('L\'array contiene ' . count($array) . " elementi \n");


// Mescolare gli array
$array = [3, 4, 5, 6];
shuffle($array);
var_dump($array);

// se ci interessa mantenere l'array originario conviene fare una copia prima di usare shuffle
$array = [3, 4, 5, 6];
$arrayShuffled = $array;
shuffle($arrayShuffled);
var_dump($array);
var_dump($arrayShuffled);

$arrayAssoc = ['a' => 1, 'b' => 2, 'c' => 3];
shuffle($arrayAssoc);
var_dump($arrayAssoc);


// Ordinamento
// array indicizzati
$array = [4, 6, 1, 5];
$sortResult = sort($array);
var_dump($array);
var_dump($sortResult);

// array indicizzati decrescente
rsort($array);
var_dump($array);


// array associativi
$arrayAssoc = ['a' => 1, 'b' => 5, 'c' => 2];
asort($arrayAssoc);
var_dump($arrayAssoc);

// array associativi decrescente
arsort($arrayAssoc);
var_dump($arrayAssoc);


// Secondo parametro delle funzioni di ordinamento
$array = [10, 4, 1, 2];

// valori considerati come numerici
sort($array, SORT_NUMERIC);
var_dump($array);

$array = [10, 4, 1, 2];

// valori considerati come stringa
sort($array, SORT_STRING);
var_dump($array);


// array associativi, in base alla chiave
$arrayAssoc = ['c' => 1, 'a' => 5, 'b' => 2];

ksort($arrayAssoc);
var_dump($arrayAssoc);

// array associativi, in base alla chiave, descrescente
$arrayAssoc = ['c' => 1, 'a' => 5, 'b' => 2];

krsort($arrayAssoc);
var_dump($arrayAssoc);



// Testare se un elemento è contenuto in un array
// in_array()
$array = [0, 4, 5, "ciao", 3];

if (in_array(0, $array)) {
    print("0 esiste nell'array\n");
} else {
    print("0 NON esiste nell'array\n");
}

if (in_array(2, $array)) {
    print("2 esiste nell'array\n");
} else {
    print("2 NON esiste nell'array\n");
}

// anche per array associativi
$arrayAssoc = ['c' => 1, 'a' => 5, 'b' => 2];

if (in_array(0, $arrayAssoc)) {
    print("0 esiste nell'array associativo\n");
} else {
    print("0 NON esiste nell'array associativo\n");
}

if (in_array(2, $arrayAssoc)) {
    print("2 esiste nell'array associativo\n");
} else {
    print("2 NON esiste nell'array associativo\n");
}

// Testare se un array contiene una chiave
// array_key_exists()
$arrayAssoc = ['c' => 1, 'a' => 5, 'b' => 2];

if (array_key_exists('c', $arrayAssoc)) {
    print("L'array contiene la chiave c\n");
} else {
    print("L'array NON contiene la chiave c\n");
}

if (array_key_exists('d', $arrayAssoc)) {
    print("L'array contiene la chiave d\n");
} else {
    print("L'array NON contiene la chiave d\n");
}

// array_key_exists funziona anche su array indicizzati
$array = [0, 1, 2, 3];
$array[10] = 5;
if (array_key_exists(5, $array)) {
    print("L'elemento con indice 5 esiste \n");
} else {
    print("L'elemento con indice 5 NON esiste \n");
}


if (array_key_exists(10, $array)) {
    print("L'elemento con indice 10 esiste \n");
} else {
    print("L'elemento con indice 10 NON esiste \n");
}


// terzo parametro della funzione in_array
$array = [1, 2, "3"];

if (in_array(3, $array)) {
    print("L'elemento con valore 3 esiste \n");
} else {
    print("L'elemento con valore 3 NON esiste \n");
}

if (in_array(3, $array, true)) {
    print("L'elemento con valore 3 esiste \n");
} else {
    print("L'elemento con valore 3 NON esiste \n");
}

// Estrazione di chiavi da un array
$array = [
    'key1' => 2,
    'key2' => 5,
    'key3' => 6,
    'key4' => 9,
];

// ['key1', 'key2', 'key3', 'key4'];

$keys = array_keys($array);
var_dump($keys);

// Combinare due array indiczzati in un array associativo

$keys = ['key1', 'key2', 'key3', 'key4'];
$values = [2, 5, 6, 9];
$combined = array_combine($keys, $values);

var_dump($combined);


// esempio: combinare un array a partire da un elenco di chiavi e valori dati da sotto array
$columns = ['id', 'nome', 'cognome'];
$id = [1, 2, 3];
$nomi = ['Roberto', 'Giambattista', 'George'];
$cognomi = ['Gallea', 'Pippo', 'Pluto'];

[
    'id' => [1, 2, 3],
    'nome' => ['Roberto', 'Giambattista', 'George'],
    'cognome' => ['Gallea', 'Pippo', 'Pluto'],
];

$combined = array_combine($columns, [$id, $nomi, $cognomi] );
var_dump($combined);



// Filtraggio di array
$array = [1, 2, 3, 4];

$even = array_filter($array, fn($item) => $item % 2 == 0); // prima array da filtrare, dopo criterio di filtraggio

var_dump($even);

// equivalente
foreach ($array as $item) {
    if ( $item % 2 == 0) {
        $result[] = $item;
    }
}

var_dump($result);


$names = ['Roberto', 'Giambattista', 'George'];

$filtered = array_filter($names, fn($name) => strlen($name) > 6);
var_dump($filtered);

$filtered = array_filter($names, fn($name) => $name[0] == 'G');
var_dump($filtered);


// transformare un array
$names = ['Roberto', 'Giambattista', 'George'];

$ucNames = array_map(fn($name) => strtoupper($name), $names); // prima funzione di trasformazione, dopo array da trasformare
var_dump($ucNames);

$rNames = array_map(fn($name) => strrev($name), $names);
var_dump($rNames);
