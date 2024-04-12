<?php

/*
- fopen
- fread
- fwrite
- fclose
- fgetcsv
- fputcsv
*/

// CSV => comma separated values
// TSV => tabulation separated values

// apertura del file in modalità lettura
$fp = fopen('data.txt', 'r');

// lettura di 10 byte dal file
$data = fread($fp, 10);
echo $data . "\n";

// chiusura del file
fclose($fp);


// apertura del file in modalità lettura
$fp = fopen('data.txt', 'r');

$data = fgetcsv($fp, null, ' ');
var_dump($data);

fclose($fp);


// apertura del file in modalità lettura
$fp = fopen('data.txt', 'r');

$table = [];

while (($row = fgetcsv($fp, null, ' ')) !== false) { // analogo a explode(',', fgets($fp))
    $table[] = $row;
}


fclose($fp);

var_dump($table);


// scrittura di un array in format csv


// apro il file in modalità scrittura (cancella il contenuto pre-esistente)
$fp = fopen('data2.txt', 'w');

$table = [
    ["a", "b", "c"],
    ["d", "e", "f"],
    ["g", "h", "i"],
];

foreach ($table as $row) {
    fputcsv($fp, $row);
    // analogo a...
    //fputs($fp, implode(',', $row) . "\n");
}


fclose($fp);

// modalità di apertura file
// 'r' => sola lettura
// 'w' => sola scrittura
// 'a' => append, posiziona il cursore alla fine del file
// 'r+' => come append, ma posizione il cursore all'inizio del file
// 'w+' => apre in lettura e scrittura
// 'x' => sola scrittura, ma fallisce se il file esiste
// 'x+' => lettura e scrittura, ma fallisce se il file esiste

// https://www.php.net/manual/en/function.fopen.php





// fseek => spostarsi in un punto specifico del file