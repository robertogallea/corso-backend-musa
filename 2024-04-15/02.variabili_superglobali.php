<?php

/*
$_SERVER
$_GET
$_POST
*/
echo '<pre>';
var_dump($_SERVER);

// argc => argument count
// argv => argument values

// $_GET contiene tutte le variabili presenti nella query string
echo "Contenuto di '_GET'\n" ;
var_dump($_GET);

echo "Contenuto di '_POST'\n" ;
var_dump($_POST);
echo '</pre>';
?>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="text" name="field1"/>
    <button type="submit">Invia</button>
</form>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Email: <input type="email" name="email" /><br>
    URL: <input type="text" name="url" /><br>
    Numero: <input type="text" name="number" /><br>
    <button type="submit">Invia</button>
</form>    

<?php

// funzione filter_var
if (!($email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
    echo('Email non valida<br>');
}

if (!($url = filter_var($_POST['url'], FILTER_VALIDATE_URL))) {
    echo('URL non valido<br>');
}

$number = filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT);



echo "Email inserita $email<br>";
echo "URL inserita $url<br>";
echo "Numero inserito $number<br>";

?>