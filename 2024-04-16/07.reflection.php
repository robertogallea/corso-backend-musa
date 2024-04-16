<?php

// REFLECTION

class Persona {
    public $nome;
    private $eta;

    public function __construct($nome, $eta) {
        $this->nome = $nome;
        $this->eta = $eta;
    }

    public function saluta() {
        echo "Ciao, sono {$this->nome}!";
    }
}

$reflectionClass = new ReflectionClass('Persona');
echo "Nome della classe: " . $reflectionClass->getName() . "\n";
echo "Numero di metodi: " . count($reflectionClass->getMethods()) . "\n";
echo "Numero di proprietà: " . count($reflectionClass->getProperties()) . "\n";

foreach ($reflectionClass->getMethods() as $method) {
    echo $method->getName() . "\n";
}

foreach ($reflectionClass->getProperties() as $property) {
    echo $property->getName() . "\n";
}

$persona = new Persona('Antonio', 12);

$refMethod = new ReflectionMethod('Persona', 'saluta');
$refMethod->invoke($persona); // equivalente a $persona->saluta()



