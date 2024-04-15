<?php

/*

Realizzare un sito le cui pagine web sono protette da un semplice sistema di login.
Prevedere le seguenti funzionalità:
- Elenco di utenti presenti su file csv con coppie di valori username,hash_md5_password
- Pagina di benvenuto da visualizzare solo se l'utente è loggato
- Pagina di login che contiene il form di autenticazione a cui portare l'utente nel caso cerchi di accedere alla pagina di benvenuto senza essere autenticato
  header('Location: login.php');
- Pagina di logout che termina la sessione dell'utente e lo "slogga" dal sistema. Dopo il logout rimandare l'utente al form di login

*/