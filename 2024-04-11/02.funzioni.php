<?php



// la funzione si definisce con la parola chiave function seguita dal nome della funzione
// il codice della funzione viene racchiuso fra {}
function myFunction()
{
    echo 'Questo è un primo esempio di definizione di funzione' . "\n";
}

myFunction();
myFunction();
myFunction();

$b = myFunction();
var_dump($b);


// l'eventuale valore di ritorno si indica con return
// qualora non venisse esplicitato il valore di ritorno è comunque NULL
function funcWithResult() 
{
    return rand() + 10;
}

$a = funcWithResult();

echo $a . "\n";



// definizione di parametri
function somma3Numeri($x, $y, $z)
{
    return $x + $y + $z;
}

echo somma3Numeri(1, 2, 3) . "\n";

$a = rand();
echo somma3Numeri($a, $a * 2, $a % 3) . "\n";


// definizione dei valori predefiniti per i parametri
function somma2o3Numeri($x, $y, $z = 0)
{
    return somma3Numeri($x, $y, $z);
}

echo somma2o3Numeri($a, $a * 2) . "\n";

// e se è il secondo parametro ad essere opzionale?
function somma2o3NumeriBis($x, $y = 0, $z)
{
    return somma3Numeri($x, $y, $z);
}

// echo somma2o3NumeriBis($a, 2) . "\n"; // non va bene perche $z resta senza valore
echo somma2o3NumeriBis($a, 0, 2) . "\n"; // prima di php 8

//echo somma2o3NumeriBis(x: $a, z: 2) . "\n"; // da php 8
echo somma2o3NumeriBis(z: 2, x: $a, y: 1) . "\n"; 


// tipizzazione degli argomenti e del valore di ritorno
function sommaInteri(int $x, int $y, int $z): int
{
    return $x + $y + $z;
}

$d = sommaInteri(1, 2, 4);
var_dump($d);

// se il tipo non è rispettato, viene convertito qualora possibile
$d2 = sommaInteri(2.2, 3, 5);
var_dump($d2);

$d3 = sommaInteri("2", 1, 3);
var_dump($d3);

//$d4 = sommaInteri("ciao", 1, 3);
//var_dump($d4);



// la tipizzazione di default non è stretta e se è possibile php fa un cast implicito

// tuttavia, si può forzare una tipizzazione strict tramite
// declare(strict_types=1);

// l'eccezione alla tipizzazione stretta è nella conversione da int a float, la quale è consentita

// esempio sul file 02.bis..eccezione_strict_types.php


function sommaNNumeri(array $numbers)
{
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

echo sommaNNumeri([1, 2, 3, 4, 5]) . "\n";


function sommaVariadic(...$numbers)
{
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

echo sommaVariadic(1, 2, 3, 4, 5) . "\n";

// printf è un esempio di funzione con argomenti variadic
printf("valore 1 %d, valore 2 %d %d %d", 1, 2, 5, 7);

/*
function printf(string $string, mixed ...$arguments): void
{
    //....

}
*/

// l'argomento variadico DEVE essere necessariamente l'ultimo
/* la funzione seguente NON è valida
function invalidVariadic(...$arguments, string $x = "a")
{
    echo '...';
}

invalidVariadic(4,2,90,3,2);
*/

// argomenti nullable
function testNullable(int $a)
{
    echo '...';
}

testNullable(1);

// non accetta valori null o non assegnati
// testNullable();     // errore!
// testNullable(null); // errore!

// valore nullable
function testNullable2(?int $a)
{
    echo '...';
}

testNullable2(null);
// testNullable2(); // errore!

// valore nullable o predefinito null
function testNullable3(?int $a = null)
{
    echo '...';
}

testNullable3(null);
testNullable3(); 



// tipizzazione multiple
// sia sui parametri che sul valore di ritorno
function multipleTypes(string|int $a): string|int
{
    return $a . '!!!';
}


echo multipleTypes(1) . "\n";
echo multipleTypes("ciao") . "\n";
// echo multipleTypes(null) . "\n";     // errore!



// Annotazione PHPDoc

/**
 * 
 * 
 * @param int $a Valore di base per il calcolo
 * @param int $b Tasso di incremento
 * 
 * @return bool Indica se l'operazione ha avuto successo
 * 
 */
function someFunction(int $a, ?string $b): bool
{
    echo '....' . "\n";

    return true;
}

$a = someFunction(1, "ciao");

// Riferimenti annotazioni PHPDoc: https://docs.phpdoc.org/3.0/guide/references/phpdoc/index.html#phpdoc-reference