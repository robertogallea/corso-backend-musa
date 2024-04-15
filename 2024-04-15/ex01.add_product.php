<?php

/*
Scrivere il codice per una pagina HTML/PHP che a partire da un modulo che preveda l'inserimento dei campi
- ID
- Nome
- Quantità
- Prezzo
Aggiunga un nuovo prodotto all'elenco dei prodotti presenti nel file csv di cui all'esercizio precedente.


- Creare il form con i 4 campi
- Scrivere il codice php per effettuare le seguenti operazioni:
    - Verificare la correttezza dei dati (se sono tutti presenti e hanno il formato corretto)
    - Aprire il file csv in modalità "append"
    - Scrivere una riga sul file contenente i valori inseriti sul form

*/

function validateData($values): array
{
    // validiamo i dati e per ogni errore aggiungiamo un elemento all'array da restituire come risultato
    $errors = [];

    if (!isset($_POST['price']) || (!filter_var($_POST['price'], FILTER_VALIDATE_FLOAT)) || ($_POST['price'] <= 0)) {
        $errors['price'] = 'Il prezzo deve essere un valore numerico positivo';
    }

    if (!isset($_POST['id']) || (!filter_var($_POST['id'], FILTER_VALIDATE_INT)) || ($_POST['id'] <= 0)) {
        $errors['id'] = 'L\'ID deve essere un numero intero positivo';
    }
    // equivale a isset($_POST['name']) && $_POST['name'] != null && $_POST['name'] == '', in generale l'operatore null-coalescing (simbolo ??)
    // resituisce il secondo operando se il primo non è definito o ha un valore vuoto (null, false, 0, stringa vuota, ...)
    if (!($_POST['name'] ?? null)) { 
        $errors['name'] = 'Nessun nome specificato';
    }

    if ((!$_POST['qty'] ?? null)) { 
        $errors['qty'] = 'Nessuna quantità specificata';
    }

    return $errors;
}

function addRecord(array $values, string $filename)
{
    
    $fp = fopen($filename, 'a');

    fputcsv($fp, $values);

    fclose($fp);
}

// I DATI SONO STATI INSERITI?
// SI:
//   I DATI SONO VALIDI?
//   SI: scriviamo un record sul file
//   NO: mostriamo uno o più errori all'utente
// 
// MOSTRARE FORM



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validateData($_POST);
    
    if (count($errors) == 0) {
        addRecord($_POST, "products.csv");
        echo 'Record inserito correttamente<br>';
    } 
}



?>



<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
ID: <input type="number" name="id" /> <?php echo $errors['id'] ?? ''; ?> <br/>
Nome: <input type="text" name="name" /> <?php echo $errors['name'] ?? ''; ?> <br/>
Q.t&agrave;: <input type="number" name="qty" /> <?php echo $errors['qty'] ?? ''; ?><br/>
Prezzo: <input type="number" name="price" /> <?php echo $errors['price'] ?? ''; ?><br/>
<button type="submit">Invia</button>
</form>