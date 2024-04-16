<?php

// Scrivere una classe Calculator che abbia una proprietà privata $result e implementi dei metodi per effettuare le seguenti operazioni:
// - Somma
// - Sottrazione
// - Prodotto
// - Divisione
// - Radice quadrata
// - Elevamento a potenza
// - Stampa del risultato
//
// Definire inoltre un costruttore per definire il valore di partenza.

class Calculator 
{
    private float $result;

    public function __construct(float $value = 0)
    {
        $this->result = $value;
    }

    public function print(): Calculator
    {
        echo $this->result . "\n";

        return $this;
    }

    public function sum(float $value): Calculator
    {
        $this->result += $value;

        return $this;
    }

    public function diff(float $value): Calculator
    {
        $this->sum(-$value);

        return $this;
    }

    public function multiply(float $value): Calculator
    {
        $this->result *= $value;

        return $this;
    }

    public function divide(float $value): Calculator
    {
        $this->multiply(1/$value);

        return $this;
    }

    public function pow(float $value): Calculator
    {
        $this->result = pow($this->result, $value);

        return $this;
    }

    public function sqrt(): Calculator
    {
        $this->pow(0.5);

        return $this;
    }
}

$c = new Calculator(4);
$c->print();        // 4
$c->sum(10);
$c->print();        // 14
$c->diff(3);        
$c->print();        // 11
$c->multiply(3.1);
$c->print();        // 34.1
$c->divide(3.1);    
$c->print();        // 11
$c->pow(2.1);       
$c->print();        // 153.7888
$c->sqrt();
$c->print();        // 12.4012

$c1 = new Calculator(4);


// fluent method
$c1->sum(10)->divide(2)->pow(1.5)->sqrt()->print();