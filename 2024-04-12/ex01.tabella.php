<?php

/*
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


 function readFromCsvFile(string $filename): array
 {
     $fp = fopen($filename, 'r');
 
     $data = [];
 
     $cols = fgetcsv($fp);
     while (($row = fgetcsv($fp, null, ',', "'")) !== false) {
         $data[] = $row;
     }
 
 
     $products = array_map(fn($item) => array_combine($cols, $item), $data);
 
     $products = array_map(function ($item) {
         $item['name'] = strtoupper($item['name']);
         $item['hash'] = md5($item['id'] . $item['name']);
         $item['available'] = match ((int)$item['qty']) {
             0 => 'Esaurito',
             1, 2, 3, 4, 5 => 'Scarsa',
             default => 'Disponibile',
         };
         return $item;
     }, $products);
 
     $cols[] = 'hash';
     $cols[] = 'available';
 
     return [$products, $cols];
 }
 
 list($products, $cols) = readFromCsvFile('ex01_data.txt')
 
 ?>
 <html>
 <head>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
 </head>
 <body>
 <table class="table table-striped">
     <thead class="thead-dark">
     <tr>
         <?php
         foreach ($cols as $label => $header) {
             ?>
             <th scope="col"><?php echo htmlentities($header) ?></th>
             <?php
         }
         ?>
     </tr>
     </thead>
     <tbody>
     <?php
     foreach ($products as $product) {
         ?>
         <tr>
            <?php
            foreach ($product as $label => $value) {
            ?>
                 <th><?php echo htmlentities($value) ?></th>
            <?php
            }
            ?>
         </tr>
         <?php
     }
     ?>
     </tbody>
 </table>
 </body>
 </html>