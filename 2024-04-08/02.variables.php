<?php


$a = 1;
echo $a;
$a = "ciao";
echo $a;
$a = "1";

// 

$a = 1;
$b = "2";

echo $a . $b;

// TIPI SCALARI

$a = 10; // interi
$b = 1.5; // virgola mobile
$c = 'esempio di stringa'; // stringa
$d = "esempio di stringa";

$e = <<<TEXT
questo è un esempio di
stringa su
più righe
TEXT;

echo $c;
echo $d;
echo $e;

$f = "Stringa con\nritorno a capo";
echo $f;


$g = true;
$g = false;
$g = TRUE;
$g = FALSE;

echo "\n\n";

// TIPI COMPOSTI

// array indicizzati
$indexedArray = [0, 1, 5, 7, "testo"];
echo $indexedArray[2];
echo $indexedArray[10];

echo "\n";
echo $indexedArray . "\n";
var_dump($indexedArray);

// array associativi
$associativeArray = ['first' => 4, 'second' => 12, 'third' => 'test'];
echo $associativeArray['second'];
echo $associativeArray['pippo'];
var_dump($associativeArray);

echo "\n\n";

// scrittura su valori non esistenti
$indexedArray[10] = 8;
var_dump($indexedArray);

$associativeArray['new_key'] = 'value';
echo "\n\n";
var_dump($associativeArray);

echo $associativeArray[0];


// TIPI SPECIALI
// mixed - tipo di default
// callable
// null
// resource
// void
