<?php

echo "Esempio di stringa\n";
echo "Esempio di stringa " . "concatenata\n";

var_dump("Esempio di stringa");
var_dump(null);
var_dump(1);

echo("Esempio di echo con parentesi\n");

print("Esempio di utilizzo di print\n");

var_dump(print('stampa'));

// echo è un costrutto del linguaggio
// mentre print è una funzione
// print ha un valore di ritorno (0 o 1)
// var_dump accetta qualunque tipo di argomento
// echo e print accettano stringhe o valori riconducibili a stringhe

$myArray = [1, 2, 3];

echo $myArray;
echo "\n";
print($myArray);
echo "\n";
var_dump($myArray);
echo "\n";
print_r($myArray);
echo "\n";

print_r("questa è una stringa\n");

// print_r stampa il contenuto del suo argomento in modo ricorsivo.

$age = 25;

print("La tua età è " . $age . "\n"); // concatenazione di stringhe
print("La tua età e $age\n"); // interoplazione (solo con apici doppi!)
print('La tua età e $age' . "\n"); // non funziona con apici singoli
printf("La tua età è %d\n", $age); // %d è per indicare il formato intero
printf("Il prezzo è Euro %d\n", 10.12); // se passo un valore decimale questo viene troncato
printf("Il prezzo è Euro %f\n", 10.12); // %f è per indicare il formato decimale
printf("Il prezzo è Euro %.1f\n", 10.16); // utilizzando .X arrotondo a X cifre decimali
printf("La tua età è %b\n", $age); // %b utilizza la rappresentazione binaria di un intero

$var = sprintf("La tua età è %d\n", $age); // come printf ma restituisce la stringa prodotta come risultato della funzione
echo $var;