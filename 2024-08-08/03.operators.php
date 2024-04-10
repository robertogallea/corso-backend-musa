<?php

// Operatori aritmetici
// assegnazione =
$a = 1;

// somma/sottrazione/moltiplicazione/divisione (+ /- / * / (/) )
echo 10 + 5;
echo "\n";
echo 10 - 5;
echo "\n";
echo 10 * 5;
echo "\n";
echo 10 / 5;
echo "\n";

// modulo (%)
echo 12 % 5;
echo "\n";

// operatori incremento e decremento (++ / --)
echo "Incremento e decremento\n";
$a = 1;
echo $a++;
echo "\n";
echo ++$a;
echo "\n";

// operazione + assegnazione (+= / -= / *= / (/=) / %= )
echo "Operazione + assegnazione\n";
$a = 10;
$a += 2;
echo $a;
echo "\n";

$a = 10;
$a -= 2;
echo $a;
echo "\n";

$a = 10;
$a *= 2;
echo $a;
echo "\n";

$a = 10;
$a /= 2;
echo $a;
echo "\n";

$a = 10;
$a %= 2;
echo $a;
echo "\n";

// Operatore concatenazione stringhe (.)
echo "Concatenazione stringhe\n";
echo "Hello " . "World" . "\n";

// Operatore concatenazione e assegnazione stringhe (.)
$a = "Hello";
$a .= " World";
echo $a;
echo "\n";

// OPERATORI LOGICI
echo "Operatori logici\n";
// Operatore AND (&&)
echo (true && true);
echo "\n";
echo (false && true);
echo "\n";
echo (true && false);
echo "\n";
echo (false && false);
echo "\n";
// Operatore OR (||)
echo (true || true);
echo "\n";
echo (false || true);
echo "\n";
echo (true || false);
echo "\n";
echo (false || false);
echo "\n";
// Operatore NOT (!)
echo !true;
echo "\n";
echo !false;
echo "\n";

$a = 1;
$b = 0;

echo ($a > $b) || !a;
echo "\n";


// OPERATORI CONFRONTO
// Uguaglianza ( == )
$a = 1;
$b = 2;
echo $a == $b;
echo "\n";

$a = 1;
$b = "1";
echo $a == $b;
echo "\n";

// Uguaglianza strict ( === )
$a = 1;
$b = "1";
echo $a === $b;
echo "\n";

// Operatore di maggioranza / minoranza (> / < / >= / <= )
$a = 1;
$b = 0;
echo $a > $b;
echo "\n";
echo $a < $b;
echo "\n";

// Operatore disuguaglianza ( != )
$a = 1;
$b = 0;
echo $a != $b;
echo "\n";

$a = 1;
$b = "1";
echo $a != $b;
echo "\n";

$a = 1;
$b = "1";
echo $a !== $b;
echo "\n";

// Opratore ternario ( ? expr_1 : expr_2 )

$a = true;
echo $a ? "primo valore" : "secondo valore";
echo "\n";

$a = false;
echo $a ? "primo valore" : "secondo valore";
echo "\n";

$a = true;
echo $a ?: 5;
echo "\n";

$a = false;
echo $a ?: 5;
echo "\n";

// null coalescing (??)
$a = 1;
echo $a ?? 10;
echo "\n";

$a = 0;
echo $a ?? 10;
echo "\n";

$a = null;
echo $a ?? 10;
echo "\n";

echo $notExisting ?? 10;
echo "\n";

// spaceship operator ( <=> )
/*
* Restituisce: 
* 0 se operandi sono uguali
* -1 se primo operando < secondo
* 1 se primo operando > secondo
*/

$a = 1;
$b = 1;
echo $a <=> $b;
echo "\n";

$a = 0;
$b = 1;
echo $a <=> $b;
echo "\n";

$a = 1;
$b = 0;
echo $a <=> $b;
echo "\n";


$a = 15;
$b = 0b1110101;
echo $b;
echo "\n";
$c = 0o1343;
echo $c;
echo "\n";
$d = 0x23FF13;
echo $d;
echo "\n";

$a = 1752123429;
$b = 0.00000000002;

// notazione scientifica
$a = 1.752123429e9;
$b = 2e-11;

$a = 1_752_123_429;

?>