<?php

// GESTIONE DATA/ORA

// cos'è il timestamp

// timestamp è un intero che rappresenta il numero di secondi passati dalla mezzanotte del 01/01/1970

echo $start = time() . "\n";

sleep(2);

echo $end = time() . "\n";
$elapsed = $end-$start;

echo "Sono passati {$elapsed} secondi\n";


// calcolo di un timestamp a partira da una data/ora specificata

echo strtotime("2024-04-10 10:00:50") . "\n";

// ora, minuti, secondi, mese, giorno, anno
echo mktime(10, 0, 50, 4, 10, 2024) . "\n";


echo date('d/m/Y - H:i:s') . "\n";
// Y: anno a 4 cifre
// m: mese numerico a 2 cifre
// d: giorno numero a 2 cifre
// H: ora numerica col formato a 24 ore
// i: minuti numerici
// s: secondi numerici

// elenco dei caratteri per la funzione date: https://www.php.net/manual/en/datetime.format.php

// funzione date con 2 argomenti
echo date('d/m/Y - H:i:s', 0) . "\n";
echo date('d/m/Y - H:i:s', strtotime("2020-01-05 12:00:00")) . "\n";

echo date('d/m/Y', strtotime("2020-01-05 12:00:00")) . "\n";

echo 'Copyright 2001-' . date('Y') . "\n";


// data non valida
if ($date = strtotime("questa non è una data")) {
    echo "La data $date è valida\n";
} else {
    echo "La data non è valida\n";
}


// analogamente con l'operatore ternario
echo (
    $date = strtotime("questa non è una data") ? 
    "La data $date è valida\n" :  
    "La data non è valida\n"
);


// funzione hrtime(): high-resolution time
$start = hrtime();
var_dump($start);

$start = hrtime(true);
sleep(2);
$end = hrtime(true);
echo "Sono passati " . (($end-$start) / 1e9) . " nanosecondi\n" ; // nano->micro->milli->secondi