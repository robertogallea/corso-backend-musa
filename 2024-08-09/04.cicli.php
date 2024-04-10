<?php

// CICLO FOR
/*
for (<initialization>;<exit_condition>;<update>) {
    <statements>
}
*/

$maxNum = 50;

for ($i = 0; $i < $maxNum; $i++) {
    echo "i vale $i\n";

    $sensor = rand(0, 40);

    if ($sensor >= 35) {
        echo "Temperatura di $sensor gradi: surriscaldamento, arresto tutto\n";
        break;
    }

}

// CICLO WHILE
/*
while (<exit_condition>) {
    <statements>
}
*/

$i = 0;
while ($i < $maxNum) {
    echo "i vale $i\n";
    $i++;
}

// CICLO DO ... WHILE
/*

do {
    <statements>
} while (<exit_condition>);

*/

do {
    $command = readline("Inserisci un comando:\n");
    switch ($command) {
        case 'RUN': 
            echo "Eseguo le istruzioni\n";
            break;
        case 'SKIP':
            echo "Salto l'istruzione successiva\n";
            break;
        case 'STOP':
            echo "Interrompo l'esecuzione\n";
            break;
        default:
            echo "Comando non supportato\n";
    };
} while ($command != 'STOP');



$command = readline("Inserisci un comando:\n");

while ($command != 'STOP') {
    switch ($command) {
        case 'RUN': 
            echo "Eseguo le istruzioni\n";
            break;
        case 'SKIP':
            echo "Salto l'istruzione successiva\n";
            break;
        default:
            echo "Comando non supportato\n";
    };
    $command = readline("Inserisci un comando:\n");
}

echo "Interrompo l'esecuzione\n";
