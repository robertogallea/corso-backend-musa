<?php

/*
if (<expr>) {
    <statements>
}
*/

$a = rand(0, 10);

echo "a vale $a\n";

if ($a > 5) {
    echo "$a è maggiore di 5\n";
}

if (($a > 5) && ($a % 2 == 0)) {
    echo "$a è pari e maggiore di 5\n";
}


/*
if (<expr>) {
    <statements true>
} else {
    <statements false>
}
*/

if (($a > 5) && ($a % 2 == 0)) {
    echo "$a è pari e maggiore di 5\n";
} else {
    echo "$a è dispari e/o non è maggiore di 5\n";
}


/*
if (<expr1>) {
    <statements expr1 true>
} elseif (<expr2>) {
    <statements expr2 true>
} elseif (<exprN>) {
    <statements exprN true>    
} else {
    <statements false>
}
*/

if (($a > 5) && ($a % 2 == 0)) {
    echo "$a è pari e maggiore di 5\n";
} elseif ($a > 5) {
    echo "$a è maggioer di 5 MA non è pari\n";
} else {
    echo "$a è dispari e/o non è maggiore di 5\n";
}


if ($a > 5) {
    if ($a % 2 == 0) {
        echo "$a è pari e maggiore di 5\n";
    } else {
        echo "$a è maggiore di 5 MA non è pari\n";
    }
} else {
    echo "$a è dispari e/o non è maggiore di 5\n";
}


if ($a == 0) {
    // do somethinig
} elseif ($a == 1) {
    // do something else
} elseif ($a == 2) {
    // do something else
} elseif ($a == 3) {
    // do something else
} elseif ($a == 4) {
    // do something else
}


/*
switch (expression) {
    case <value>: <statements if (<expression> == <value>)
    ...
}
*/

switch ($a) {
    case 0: 
        echo("a vale 0\n");
        break;
    case 1: 
        echo("a ha valore 1\n");
        break;
    case 2: 
        echo("il valore di a è 2\n");
        break;
    case 3:
        echo("a è pari a 3\n");
        break;
    case 4: 
        echo("il contenuto di a è 4\n");
        break;
    default: 
        echo("a non ha un valore compreso fra 0 e 4");    
}

/*
    $returnValue = match(<expression>) {
        value1 => <return_expression_1>,
        value2 => <return_expression_2>,
        ...
        valuen => <return_expression_n>,
    };
*/

$result = match($a) {
    0 => "a vale 0\n",
    1 => "a ha valore 1\n",
    2 => "il valore di a è 2\n",
    3 => "a è pari a 3\n",
    4 => "il contenuto di a è 4\n",
    5,6,7,8,9,10 => "Il contenuto e maggiore di 4",
    default => "default",
};

echo $result;






/*
$a = 5;

if ($a % 2) {
  echo "Il numero è dispari\n";
}
*/

