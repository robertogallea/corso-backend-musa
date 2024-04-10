<?php

// readline()
/*
$a = readline("Come ti chiami?\n");

printf("Ti chiami %s\n", $a);
*/
$line = readline("Inserisci un elenco di valori?\n");
$values = explode(',', $line);


var_dump($values);