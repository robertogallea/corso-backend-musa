<?php

// SERIALIZZAZIONE OGGETTI

class Persona
{
    public int $eta;
    public string $nome;
    
    public function __construct(int $eta, string $nome)
    {
        $this->eta = $eta;
        $this->nome = $nome;
    }
}

// creo un'istanza della classe Persona
$p1 = new Persona(25, "Mario");

var_dump($p1);

// serializzato l'oggetto in una stringa
$serializedP1 = serialize($p1);

var_dump($serializedP1);

// salvo la stringa su un file
file_put_contents('oggetto_serializzato.txt', $serializedP1);


// leggo la stringa dal file
$serializedP2 = file_get_contents('oggetto_serializzato.txt');

// deserializzo l'oggetto in una istanza dell'oggetto Persona
$p2 = unserialize($serializedP2);

var_dump($p2);




// serializzare solo alcune proprietà

class Vehicle
{
    public string $brand;
    public string $model;

    public function __construct(string $brand, string $model)
    {
        $this->brand = $brand;
        $this->model = $model;
    }

    // Se definita, invocata automaticamente quando faccio serialize() PRIMA della serializzazione effettiva
    public function __sleep()
    {        
        return ['brand'];
    }

    // Se definita, invocata automaticamente quando faccio unserialize() DOPO la deserializzazione effettiva
    public function __wakeup()
    {
        echo 'Deserializzo l\'oggetto' . "\n";
        $this->model = 'Sconosciuto';
    }
}

$v1 = new Vehicle("Audi", "Q2");

var_dump($v1);

$serializedV1 = serialize($v1);

echo $serializedV1 . "\n";

$v2 = unserialize($serializedV1);

var_dump($v2);