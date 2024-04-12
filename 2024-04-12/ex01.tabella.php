<?php

/**
 * 
Scrivere un programma che effettui le seguenti operazioni:

- Definisca una funzione `readFromCSVFile`, che, dato in ingresso il percorso di un file, restituisca come output un
  array associativo con un elenco di prodotti. Il file dovrà avere la seguente forma:

```
id,name,qty,price
1,'Maglietta',10,12.5
2,'Pantaloni',5,41.75
3,'Felpa',8,60
4,'Scarpe',7,65
5,'Calze',9,8
```

[
    [
        'id' => 1,
        'name' => 'Maglietta',
        'qty' => 10,
        'price' => 12.5
    ],

    ...
]

Nota: la prima riga corrisponde alle chiavi di ciascuna riga dell'array

- Converta in maiuscolo tutti i nomi dei prodotti
- aggiunga un campo `hash` che contenga l'hash md5 derivante dalla concatenazione di `id` e `name`
- stampi l'array ottenuto in una tabella html con formato a piacere (intestazioni comprese)
- In una colonna aggiuntiva "Disponibilità" che visualizzi 'Esaurito' se la quantità è 0, 'Scarsa' se è fra 1 e 5, 'Buona' se
  maggiore di 5.

 */