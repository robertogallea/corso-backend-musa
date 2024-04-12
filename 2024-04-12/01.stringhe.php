<?php

$string = 'esempio di stringa';

// accesso all'i-imo carattere
echo $string[2] . "\n";

// è un esempio syntactic sugar

// equivale a scrivere
echo substr($string, 2, 1) . "\n";



// conversione del case delle stringhe

// lower case
echo strtolower($string) . "\n";

// upper case
echo strtoupper($string) . "\n";

// soltanto la prima lettera in maiuscolo
echo ucfirst($string) . "\n";

// tutte le iniziali in maiuscolo
echo ucwords($string, ) . "\n";

// posso modificare i caratteri separatori
$string2 = 'Ehi,come,stai';
echo ucwords($string2, ',') . "\n";

// pulitura degli spazi
$string2 = '       test        ';

// eliminare spazi all'inizio
echo '-' . ltrim($string2) . "-\n";

// eliminare spazi alla fine
echo '-' . rtrim($string2) . "-\n";

// eliminare spazi all'inizio e alla fine
echo '-' . trim($string2) . "-\n";

// gli spazi intermedi non vengono mai rimossi
$string3 = '   ciao come stai   ';
echo '-' . trim($string3) . "-\n";

// confronto fra stringhe
$string1 = 'bla';
$string2 = 'blaa';
echo strcmp($string1, $string2) . "\n"; // $string1 < $string2 perchè a parità dei primi caratteri $string1 non contiene il 4°

$string1 = 'blab';
$string2 = 'blaa';
echo strcmp($string1, $string2) . "\n"; 
// $string1 > $string2 perchè a parità dei primi caratteri, il 4° carattere di 
// $string2 ha un codice ASCII superiore a quello di $string1

$string1 = 'B';
$string2 = 'a';
echo strcmp($string1, $string2) . "\n"; // il codice ASCII di 'A' è 66, quello di 'b' è 98, quindi $string1 < $string2

$string1 = 'B';
$string2 = 'A';
echo strcmp($string1, $string2) . "\n"; // il codice ASCII di 'A' è 66, quello di 'b' è 98, quindi $string1 < $string2


// estrazione di una sottostringa
$string = 'Ciao come ti chiami?';
echo substr($string, 5) . "\n"; // se non specifico il terzo parametro estraggo tutti i caratteri fino alla fine della stringa

echo substr($string, 5, 4) . "\n"; // il terzo parametro indica il numero di caratteri da estrarre

// funzioni di ricerca
$string = 'Ciao come ti chiami?';
echo strstr($string, 'ti') . "\n"; // estrae una stringa a partire da un testo di ricerca

echo strstr($string, 'ti', true) . "\n"; // estrae una stringa a partire da un testo di ricerca


$string = 'Ciao come ti chiami? Ti chiami Giuseppe';
echo strstr($string, 'ti') . "\n";
echo strstr($string, 'Ti') . "\n";
echo strstr($string, 'TI') . "\n";

echo stristr($string, 'TI') . "\n"; // versione case insensitive

// alias di strstr
echo strchr($string, 'ti') . "\n";


// conversione dei new line in tag <br>
$string = "questa è una stringa
con ritorni\na capo";
echo nl2br($string) . "\n";

// conversione da e a carattere
$a = 'A';
echo ord($a) . "\n";

echo chr(65) . "\n";


// Esplosione di una stringa in array
$csv = 'Ciao,come,stai ?,benissimo   ,  grazie';

var_dump(explode(',', $csv)); // l'array risultato contiene spazi spuri
var_dump(array_map('trim', explode(',', $csv))); // li rimuovo applicando array_map
var_dump(array_map('ucfirst', array_map('trim', explode(',', $csv)))); // li rimuovo applicando array_map

$str = 'a:b,c:,d,:e';
var_dump(explode(':,', $str)); 
// se uso una stringa con più caratteri, l'esplosione viene fatta solo in corrispondenza di tutti i caratteri
// nella stessa sequenza indicata

// posso ottenere lo stesso risultato usando una arrow function che esegue le due operazioni
var_dump(array_map(fn($item) => ucfirst(trim($item)), explode(',', $csv))); 


// Implosione di un array in una stringa
$array = [1, 2, 3, "ciao"];
echo implode('::', $array) . "\n";
echo join('::', $array) . "\n"; // alias di implode

// rimozione di tag html dalle stringhe
$htmlCode = "<b><i>Esempio</i> di stringa con html</b>";
echo strip_tags($htmlCode) . "\n";

// funzione per la codifica di caratteri speciali in html
$str = "Questa è una & funzione con caratteri <speciali>";
echo htmlspecialchars($str) . "\n";

// funzione per la decodifica da carattere speciale html a testo semplice

$str = 'Questa è " \' una &amp; funzione con caratteri &lt;speciali&gt;';
echo html_entity_decode($str, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401) . "\n"; 
// opzioni generalmente non necessarie, ma applicabili in congiunizione tramite or binario (carattere '|' )

// trasformare una stringa in un array
$str = 'test x';
var_dump(str_split($str));

// esempio: mescolare una stringa
$split = str_split($str);
shuffle($split);
echo join('', $split) . "\n";

// funzione di distanza di levenshtein
// calcola il numero di caratteri da inserire, cancellare o modificare per rendere due stringhe uguali
$str1 = 'ciao';
$str2 = 'cioa';
echo levenshtein($str1, $str2) . "\n";

$str1 = 'prova';
$str2 = 'prva';
echo levenshtein($str1, $str2) . "\n";


$db = [
    'ciao',
    'prova',
    'test',
    'esempio',
];

$keyword = 'est';

$res = array_filter($db, fn($item) => !strcmp($item, $keyword));
var_dump($res);

$res = array_filter($db, fn($item) => levenshtein($item, $keyword) <= 2);
var_dump($res);


// funzioni di hashing
$a = "1";
echo sha1($a) . "\n";
echo sha1("2") . "\n";
/*
Proprietà funzioni hashing:
1. A lunghezza fissa e predefinita
2. Non invertibili
3. Due valori simili devono produrre hash molto differenti
*/

$username = "roberto";
$password = "pippo";

$account = [
    'username' => $username,
    'password' => sha1($password),
];

var_dump($account);

function login($username, $password, $account) {
    if (($username == $account['username']) && (sha1($password) == $account['password'])) {
        return true;
    }

    return false;
} 

echo 'Test login' . "\n";
echo login('roberto', 'pip', $account) . "-\n";
echo login('roberto', 'pippo', $account) . "-\n";

$a = "1";
echo md5($a) . "\n";
echo md5("2") . "\n";

// equivalenti a sha1 e md5 ma operano su file
echo count(sha1_file('01.stringhe.php')) . "\n"; // bae02b80a8ea269876a4915c1a357d88e89fa22e
echo count(md5_file('01.stringhe.php')) . "\n"; // 6a53cd7d8a46e54ae6d6258ad607a656


// Elenco completo funzioni per le stringhe: https://www.php.net/manual/en/ref.strings.php









