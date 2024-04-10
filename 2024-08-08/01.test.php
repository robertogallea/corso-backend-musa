<?php


echo "Hello World!";

// Questo è un commento a riga singola



# Commento a singola riga, modalità alternativa



/*

Questo è un commento multiriga
seconda riga
terza riga

*/


/**
 * @param int $a primo parametro
 * @param int $b secondo parametro
 */
function test($a, $b) {
    return $a + $b;
}

test(1, 2);




// Utilizzo delle variabili

$var = 1;

// nomi validi
$a = 1;
$a1 = 'test';
$_a = 'x';
$_ = 1;
$__test = 'bla';
$b_ = 'x2';

// nomi non validi
// $1 = 'a';  // non può essere un numero
// $! = '1'; // non può iniziare con un simbolo
// $1a = 'b'; // non può iniziare con un numero
// $_2x = 'test'; // non può contenere cifre dopo il/i primo/i underscore
// $__2x = 'test'; // non può contenere cifre dopo il/i primo/i underscore

// PSR - PHP STANDARDS RECOMENDATION



// Convenzioni di nomenclatura variabili

// StudlyCaps 
$NomePersona = 'Roberto';

// camelCase
$nomePersona = 'Roberto';

// pascal_case
$nome_persona = 'Roberto';






?>