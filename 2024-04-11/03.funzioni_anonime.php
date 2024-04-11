<?php

// FUNZIONI ANONIME
$array = [1, 2, 5, 6];

function isEven($number)
{
    return $number % 2 == 0;
}


var_dump(array_filter($array, 'isEven'));

// arrow function PHP >= 8.0
var_dump(array_filter($array, fn($item) => $item % 2 == 0));

// closure
var_dump(array_filter($array, function ($item) {
    echo '';
    $a = 1;
    return $item % 2 == 0;
}));



// funzione per il calcolo delle tasse
function calculateTaxes($income, $limits, $rates, $print) 
{
    // simula il calcolo delle tasse ma restituisce soltanto il valore di income moltiplicato per $rates[0]
    return $income * $rates[0];
}

$incomes = [
    10_000,
    15_000,
    80_000,
    32_000,
];

$limits = [28_000, 50_000, PHP_INT_MAX];

$rates = [0.23, 0.35, 0.43];

$print = true;

// utilizzo direttamente la funzione calculateTaxes dovendo necessariamente definire i parametri addizionali per l'esecuzione di array map
$taxesGT5000 = array_filter(
    array_map(
            'calculateTaxes', 
            $incomes, 
            array_fill(0, count($incomes), $limits), 
            array_fill(0, count($incomes), $rates),
            array_fill(0, count($incomes), $print),
        ), 
        fn($tax) => $tax > 5000
    );

// l'utilizzo di array_fill mi permette di non ripetere N volte ogni parametrizzazione, infatti
/*

$limits = [
    [28_000, 50_000, PHP_INT_MAX],
    [28_000, 50_000, PHP_INT_MAX],
    [28_000, 50_000, PHP_INT_MAX],
    [28_000, 50_000, PHP_INT_MAX],
];
var_dump($limits);

// equivale a 

$limits = array_fill(0, 4, [28_000, 50_000, PHP_INT_MAX]);

var_dump($limits);

*/    

// in alternativa, definisco una funzione wrapper per calculateTaxes con una parametrizzazione standard    
function calculateTaxesWithDefaultParameter($item)
{
    // se voglio utilizzare le variabili globali devo usare la direttiva global
    /*
    global $limits;
    global $rates;
    global $print;

    return calculateTaxes($item, $limits, $rates, $print);
    */
    
    // oppure utilizzo l'array $GLOBALS
    return calculateTaxes($item, $GLOBALS['limits'], $GLOBALS['rates'], $GLOBALS['print']);
}    



// in questo modo non c'è necessità di definire gli argomenti aggiuntivi per array_map
$taxesGT5000 = array_filter(
    array_map(
        'calculateTaxesWithDefaultParameter',
        $incomes,
    ), 
    fn($tax) => $tax > 5000      
);

// posso eliminare la necessità di definire la funzione wrapper utilizzando una arrow function
$taxesGT5000 = array_filter(
    array_map(
        fn($item) => calculateTaxes($item, $limits, $rates, $print),
        $incomes,
    ), 
    fn($tax) => $tax > 5000      
);

// potevo fare lo stesso con una closure ma...
$taxesGT5000 = array_filter(
    array_map(
        function ($item) use ($limits, $rates, $print) {
            return calculateTaxes($item, $limits, $rates, $print);
        },
        $incomes,
    ), 
    fn($tax) => $tax > 5000      
);




// VARIABILI STATIC
function nonStatic()
{
    $var += 1;
    echo $var . "\n";
}

nonStatic();
nonStatic();
nonStatic();

function staticVar()
{
    static $var = 0;
    $var += 1;
    echo $var . "\n";
}

staticVar();
staticVar();
staticVar();