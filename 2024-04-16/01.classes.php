<?php

// CLASSI E OGGETTI
class Persona {
    // Proprietà
    public string $nome;
    public string $cognome;

    // Costanti
    const TIPO = 'UMANO';

    // Metodi
    public function stampaInformazioni()
    {
        echo $this->nome . ' ' . $this->cognome . "\n";
    }
}

$persona1 = new Persona; // $persona1 conterrà un oggetto di tipo classe
$persona1->nome = "John";
$persona1->cognome = "Smith";

$persona1->stampaInformazioni();

$persona2 = new Persona;
$persona2->nome = "Tom";
$persona2->cognome = "Ford";

$persona2->stampaInformazioni();

echo $persona1->nome . "\n";
echo $persona2->cognome . "\n";

echo Persona::TIPO . "\n";

var_dump($persona1);

// classe è un modello di struttura dati
// oggetto è un'istanza del modello




// Modificatore di visibilità privato
class Automobile {
    private string $modello;
    private string $targa;



    // metodo setter
    public function setModello(string $modello)
    {
        if ($modello != '') {
            $this->modello = $modello;
        } else {
            echo 'Il modello deve essere una stringa non vuota!' . "\n";
        }
    }

    // metodo getter
    public function getModello(): string
    {
        return $this->modello;
    }
}

$auto1 = new Automobile;
// echo $auto1->modello; // errore, $modello è privato
$auto1->setModello("Audi");

var_dump($auto1);

echo $auto1->getModello() . "\n";

$auto1->setModello(''); // viene stampato il messaggio di errore

$auto1->setModello('Volvo'); // viene valorizzata correttamente la proprietà



// Modificatore di visibilità protected
class Veicolo {
    protected string $targa; 
    private string $ruote;  
}

class Autocarro extends Veicolo {
    // la proprietà $targa è visibile in quanto protetta
    // la proprietà $ruote NON è visibile perchè privata
}


// public => visibile dall'esterno, dall'interno e dalle classi derivate
// protected => NON visibile dall'esterno, visibile dall'interno e dalle classi derivate
// private => NON visibile dall'esterno e dalle classi derivate, visibile dall'interno



