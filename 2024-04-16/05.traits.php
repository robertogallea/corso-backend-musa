<?php

// TRAITS

trait MotorVehicle
{
    public function startEngine()
    {
        echo "Accendo il motore \n";
    }
}

class Car
{
    use MotorVehicle;

}

class Airplane
{
    use MotorVehicle;

    public function fly()
    {
        echo "In volo\n";
    }
}

$car1 = new Car();
echo $car1->startEngine();

$airplane1 = new Airplane();
$airplane1->startEngine();


// DIFFERENZE FRA CLASSE ASTRATTA E TRAIT
// - Un trait NON è una classe
// - Un trait definisce metodi conreti, mentre una classe astratta deve definire almeno un metodo astratto
// - Una classe può usare più di un trait, mentre può estendere una sola classe

// DIFFERENZE FRA TRAIT E INTERFACCE
// - Le interfacce si implementano (implements), i trait si usano (use)
// - Le interfacce definiscono solo metodi astratti, i trait metodi concreti
// - Posso usare trait multipli e implementare interfacce multiple


//
// - Uso delle interfacce quando voglio definire un'interfaccia di utilizzo standard per una classe che definisce un concetto specifico (es: conversione in formato json)
// - Uso dei trait quando ho una classe con una definizione molto lunga/complessa che voglio spezzare in più parti (moduli)
// - Uso dei trait quando voglio riutilizzare delle funzionalità concrete (es: lettura dell'elenco di utenti da un database)
// - Uso le classi astratte quando voglio definire delle funzioni concrete ed altre astratte da riutilizzare/implementare in sottoclassi



