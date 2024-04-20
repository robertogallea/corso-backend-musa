-- VARIABILI GLOBALI E DI SESSIONE

-- mostrare le variabili di sessione
SHOW VARIABLES;
SHOW SESSION VARIABLES;
SHOW LOCAL VARIABLES;

-- mostrare le variabili globali
SHOW GLOBAL VARIABLES;

-- Cambiare il valore di una variabile locale
SET AUTOCOMMIT=0;

-- Cambiare il valore di una variabile globale
SET GLOBAL AUTOCOMMIT=1;

-- Cambia il valore di una variabile globale e lo rende persistente
SET PERSIST AUTOCOMMIT=0;

-- NON cambia il valore di una variabile ma lo modifica al livello di persistenza
SET PERSIST_ONLY AUTOCOMMIT=0;



-- Altre variabili di interesse
-- FOREIGN_KEY_CHECKS
SHOW VARIABLES LIKE 'FOREIGN_KEY_CHECKS';
SHOW VARIABLES LIKE '%CHECKS';

SET FOREIGN_KEY_CHECKS=0;
SET UNIQUE_CHECKS=0;
-- eseguire tutte le operazione non tutelate dai vincoli di chiavi esterna
SET FOREIGN_KEY_CHECKS=1;
SET UNIQUE_CHECKS=1;

-- Variabile read_only pone il database in stato di sola lettura ad eccezione che per gli utenti admin
SHOW VARIABLES LIKE 'READ%';
SET READ_ONLY=1;

-- Variabile super_read_only pone il database in stato di sola lettura anche per gli utenti admin
SHOW VARIABLES LIKE '%READ%';

-- Variabile che definisce il numero massimo di connessioni
SHOW VARIABLES LIKE '%CONNECTIONS%';
SET PERSIST MAX_CONNECTIONS=1000;

SET SUPER_READ_ONLY=1;