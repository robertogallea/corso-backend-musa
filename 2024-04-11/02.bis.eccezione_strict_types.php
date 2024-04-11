<?php

// la tipizzazione di default non è stretta e se è possibile php fa un cast implicito

// tuttavia, si può forzare una tipizzazione strict tramite
// declare(strict_types=1);

// l'eccezione alla tipizzazione stretta è nella conversione da int a float, la quale è consentita

declare(strict_types=1);

function testStrict(int $a) {
    echo $a . "\n";
}

//testStrict(1.1);

function testStrict2(float $a) {
    echo $a . "\n";
}

testStrict2(1);