<?php

class Veicolo {
    protected string $marca;
    protected string $modello;

    public function __construct(string $marca, string $modello)
    {
        $this->marca = $marca;
        $this->modello = $modello;
    }

    public function getInfo(): string
    {
        return 'Marca: ' . $this->marca . ', Modello: ' . $this->modello;
    }
}

class Automobile extends Veicolo {
    private ?string $targa;

    public function __construct(string $marca, string $modello, ?string $targa = null) 
    {
        parent::__construct($marca, $modello);
        $this->targa = $targa;
    }

    public function getTarga(): string
    {
        return $this->targa;
    }

    public function setTarga(string $targa): void
    {
        $this->targa = $targa;
    }

    public function getInfo(): string
    {
        //return 'Marca: ' . $this->marca . ', Modello: ' . $this->modello . ', Targa: ' . $this->targa;
        return parent::getInfo() . ', Targa: ' . $this->targa;
    }
}

$veicolo1 = new Veicolo("Marca1", "Modello XXX");
echo $veicolo1->getInfo() . "\n";

$auto1 = new Automobile("Audi", "Q2");
$auto1->setTarga('AA123XY');
echo $auto1->getInfo() . "\n";



// Modalità precedente a PHP 8
class Foo 
{
    private int $a;
    protected string $b;

    public function __construct(int $a, string $b) {
        $this->a = $a;
        $this->b = $b;
    }

}

class Foo2
{
    public function __construct(private int $a, protected string $b) { }
}

