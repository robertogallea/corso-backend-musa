<?php

$array = [5, 6, 3, 1, 8, 7, 2, 4];

$array2 = $array;
sort($array2);
echo "Ordine crescente funzione sort: " . implode(', ', $array2) . "\n";
echo "Array non ordinato: " . implode(', ', $array) . "\n";


// Codice di ordinamento
for ($j = 1; $j < count($array); $j++) {
    for ($i = 0; $i < count($array) - $j; $i++) {
        if ($array[$i] > $array[$i + 1]) {
            // scambiare l'elemento i-imo con quello (i+1)-imo
            $temp = $array[$i];
            $array[$i] = $array[$i + 1];
            $array[$i + 1] = $temp;
        }
    }
    echo "Array ordinato al passo $j con bubble sort: " . implode(', ', $array) . "\n";
}

echo "Array ordinato con bubble sort: " . implode(', ', $array) . "\n";


// Esempio di implementazione del merge sort (complessità log(n)) in PHP:
// https://notes.sohag.pro/divide-and-conquer-merge-sort-in-php