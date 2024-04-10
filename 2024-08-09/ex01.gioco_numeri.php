<?php

// estrazione di un numero da 0 a 100

// RIPETERE
// Chiediamo all'utente di indovinare il numero
// Se indovina, comunichiamo all'utente che ha indovinato ed in quanti tentativi
// Se non indovina
// Se ha inserito un numero maggiore, comunichiamo che il numero da indovinare è più piccolo
// Se ha inserito un numero minore, comunichiamo che il numero da indovinare è più grande
// FINO A QUANDO si indovina il numero OPPURE sono stati superati 20 tentativi

do {

    echo "Inizio una nuova partita\n";

    $attempts = 0;

    $input = readline("Inserici il numero massimo di tentativi consentiti e il numero massimo estraibile separati da uno spazio\n");

    $inputArray = explode(' ', $input);

    $maxAttempts = $inputArray[0];
    $maxNumber = $inputArray[1];



    $secretNumber = rand(0, $maxNumber);

    do {
        $attempts++;
        $guess = readline("Inserisci un numero fra 0 e $maxNumber\n");
        

        if ($secretNumber == $guess) {
            echo "Complimenti! Hai indovinato in $attempts tentativi.";
            break;
        } elseif ($secretNumber > $guess) {
            echo "Il numero inserito è troppo piccolo\n";
        } elseif ($secretNumber < $guess) {
            echo "Il numero inserito è troppo grande\n";
        }


        if ($attempts == $maxAttempts) {
            echo "Numero di tentativi esauriti\n";
        }

    } while ($attempts < $maxAttempts);

} while (readline("Vuoi fare un'altra partita?\n") == 's');

echo "Grazie per avere giocato\n";
