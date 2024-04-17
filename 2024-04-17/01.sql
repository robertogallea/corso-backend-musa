# Prima tipologia di commento

/* Seconda tipologia di commento */

/*
Commento multiriga
*/

-- Terza tipologia di commento

SHOW DATABASES; -- vedere la lista dei database presenti sul sistema
USE mysql; -- impostare il database correntemente in uso
SHOW TABLES; -- vedere la lista delle tabelle presenti sul database in uso
DESC user; -- vedere la struttura di una tabella in termini di colonne e relative proprietà

CREATE USER 'nomeutente'@'localhost' IDENTIFIED BY 'password2';

SELECT * FROM mysql.user; -- mostra tutto il contenuto della tabella user presente sul database mysql
SELECT * FROM user; -- basta il nome della tabella perchè il database mysql era stato precedentemente selezionato con il comando USE

DROP USER 'nomeutente'@'localhost'; -- cancello l'utente specificando anche l'host

CREATE USER 'nomeutente'@'%' IDENTIFIED BY 'password'; -- creo un utente che può collegarsi da qualunque ip/host della rete

DROP USER 'nomeutente'; -- se l'utente è valido su qualsiasi ip/host, non è necessario specificarlo

SELECT version(); -- Visualizza la versione di MySQL Server installata

ALTER USER 'nomeutente'@'%' IDENTIFIED BY 'new_password'; -- Modifica della password di un utente

-- GRANT <privilege> ON <objects> TO <account>;

-- ALL (PRIVILEGES) -- Fornisce tutti i privilegi ad eccezione di 'GRANT OPTION', 'PROXY'
-- ALTER -- Modificare un oggetto (struttura)
-- CREATE -- Creare un oggetto
-- INSERT -- Inserire dati
-- DELETE -- Cancellare un oggetto
-- SELECT -- Interrogare un oggetto
-- UPDATE -- Modifica un oggetto (dati)

CREATE DATABASE test; -- creo il database test
SHOW DATABASES;

-- Assegnare all'utente 'nomeutente'@'%' i privilegi di CREATE, INSERT, UPDATE e SELECT sul database test
GRANT CREATE, INSERT, UPDATE, SELECT ON test.* TO 'nomeutente'@'%';
GRANT CREATE, INSERT, UPDATE, SELECT ON test.* TO 'nomeutente'@'%' WITH GRANT OPTION;
/*
Senza GRANT OPTION l'utente riceve i privilegi ma NON PUO' assegnarli ad altri
Con GRANT OPTION l'utente ricevi i prievilegi e PUO' assegnarli ad altri
*/

-- Revoca dei privilegi
REVOKE CREATE ON test.* FROM 'nomeutente'@'%'; -- Revoco il solo permesso per il comando CREATE

SHOW GRANTS; -- Lista dei permessi per l'utente corrente
SHOW GRANTS FOR 'nomeutente'@'%'; -- Lista dei permessi per un utente specifico

USE test;

CREATE TABLE employees (
	id int NOT NULL,
	first_name char(50) NOT NULL,
    last_name char(50) NOT NULL DEFAULT 'XXX' 
);


SHOW TABLES;

DESC employees;

DROP TABLE employees; -- cancella una tabella


-- CHAR(size) -- Testo a lunghezza fissa
-- VARCHAR(size) -- Testo a lunghezza variabile
-- TEXT -- Tipo di dato alternativo per dati testuali
-- TINYTEXT
-- MEDIUMTEXT
-- LONGTEXT (max 4GB)
-- BLOB (Binary Lot of Bytes)
-- TINYBLOB
-- MEDIUMBLOB
-- LONGBLOB
-- BIT
-- INTEGER
-- FLOAT(p) se p > 25, il tipo diventa double
-- DOUBLE(p, d) p => precisione, d => numero di decimali dopo la virgola IEEE 754
-- DECIMAL|DEC(size, d) size => precisione, d => numero di decimali dopo la virgola
-- DATE data
-- DATETIME data/ora
-- TIMESTAMP numero che rappresenta il numero di secondi dal 01/01/1970 ore 00.00
-- YEAR
-- ENUM (val1, val2, val3, val4, val5) -- ogni record deve avere 1 e 1 solo valore
-- SET (val1, val2, val3, val4, val5) -- ogni record può avere da 0 a n valori

-- Lista completa https://dev.mysql.com/doc/refman/8.0/en/data-types.html

INSERT INTO employees VALUES (1, 'Mario', 'Bianchi');
INSERT INTO employees VALUES (2, 'Giueppe', 'Verdi');
-- I dati vanno specificati nella stessa quantità e ordine in cui sono definiti nella tabella
INSERT INTO employees (id, first_name) VALUES (3, 'Rosario');
-- Altrimenti, se sono meno o vario l'ordine, devo specificare le colonne per cui fonisco un valore
-- subito prima della clausola VALUES
INSERT INTO employees (id, first_name) VALUES (null, 'Francesco'); -- fallisce perchè la colonna id è NOT NULL
INSERT INTO employees (first_name) VALUES ('Francesco');  -- fallisce perchè la colonna id è NOT NULL e non esiste un valore di default

INSERT INTO employees VALUES (1, 'Mario', 'Bianchi'); -- cosa succede se provo a inserire un record uguale a uno esistente?
-- in assenza di vincoli specifici, l'operazione è consentita (!)

SELECT * FROM employees;

DROP TABLE employees; 

CREATE TABLE employees (
	id int NOT NULL,
	first_name char(50) NOT NULL,
    last_name char(50) NOT NULL DEFAULT 'XXX',
    PRIMARY KEY(id) -- id diventa univoco + creazione indice su id
);

DESC employees;

INSERT INTO employees VALUES (1, 'Mario', 'Bianchi');
INSERT INTO employees VALUES (2, 'Giueppe', 'Verdi');
INSERT INTO employees (id, first_name) VALUES (3, 'Rosario');
INSERT INTO employees VALUES (1, 'Mario', 'Bianchi'); -- Fallisce per violazione del vincolo di chiave primaria
INSERT INTO employees VALUES (4, 'Mario', 'Bianchi'); 

SELECT * FROM employees;

ALTER TABLE employees
  ADD COLUMN email VARCHAR(128) UNIQUE;
  
DESC employees; 

SELECT * FROM employees; 

ALTER TABLE employees
  DROP COLUMN email;
  
DESC employees;   

ALTER TABLE employees
  ADD COLUMN email VARCHAR(128) NOT NULL UNIQUE DEFAULT '-'; 
-- Il valore di default costante non può essere utilizzato per via del vincolo di unicità

-- Ipotesi realistica di flusso delle operazioni

-- Aggiungo la colonna senza vincoli aggiuntivi
ALTER TABLE employees
  ADD COLUMN email VARCHAR(128);
  
SELECT * FROM employees;

-- Completo i dati caricando le email per gli impiegati
UPDATE employees SET email = 'mario.bianchi@test.it' WHERE id = 1;  
UPDATE employees SET email = 'giuseppe.verdi@test.it' WHERE id = 2;  
UPDATE employees SET email = 'rosario.xxx@test.it' WHERE id = 3;  
UPDATE employees SET email = 'mario.bianchi01@test.it' WHERE id = 4;  

-- Aggiungo il vincolo di NOT NULL e unicità alla colonna email
ALTER TABLE employees
  MODIFY COLUMN email VARCHAR(128) NOT NULL UNIQUE;
  
-- Rinominare il campo email in email_address
-- 1. Creare una nuova colonna email_address con lo stesso tipo e gli stessi vincoli di email
ALTER TABLE employees
  ADD COLUMN email_address VARCHAR(128) UNIQUE;
  
-- 2. Copiare i dati da email a email_address
SET SQL_SAFE_UPDATES = 0; -- disabilito safe mode per potere effettuare operazioni di update su tutte le righe
UPDATE employees SET email_address = email; -- copio il valore di email su email_address
SET SQL_SAFE_UPDATES = 1; -- abilito nuovamente il safe mode
SELECT * FROM employees;

-- 3. Cancellare la colonna email  
ALTER TABLE employees
  DROP COLUMN email;

-- 4. Impostare email_addreess come NOT NULL
ALTER TABLE employees
  MODIFY COLUMN email_address VARCHAR(128) UNIQUE NOT NULL;  
  
SELECT * FROM employees;

-- Modo corretto di modificare una colonna:
ALTER TABLE employees
  RENAME COLUMN email_address TO email;  
  
SELECT * FROM employees;  

-- Aggiungere colonna per età
ALTER TABLE employees
  ADD COLUMN age INT,
  ADD CHECK (age >= 16);

-- se cerco di impostare una età minore di 16 l'UPDATE fallisce
UPDATE employees SET age = 1 WHERE ID = 1;

-- da 16 in poi i valori sono accettati
UPDATE employees SET age = 16 WHERE ID = 1;

-- modo alternativo di definire un check assegnando un nome
ALTER TABLE employees
  ADD CONSTRAINT age_between_16_and_75 CHECK (age BETWEEN 16 AND 75);
  
UPDATE employees SET age = 99 WHERE ID = 1;  

-- Copiare tabelle

-- Copiare solo la struttura
CREATE TABLE employees_copy LIKE employees;

DESC employees_copy;

DROP TABLE employees_copy;

-- Copiare struttura e dati
CREATE TABLE employees_copy AS 
  SELECT * FROM employees;

DESC employees_copy;
SELECT * FROM employees_copy;

DROP TABLE employees_copy;

-- Copiare struttura e parte dei dati (es. tutte le righe in cui age non è null)
CREATE TABLE employees_copy AS 
  SELECT * FROM employees WHERE age IS NOT null;
  
DESC employees_copy;  
SELECT * FROM employees_copy;

DROP TABLE employees_copy;

-- colonne enum
ALTER TABLE employees
  ADD COLUMN continent ENUM('Europe', 'Asia', 'America', 'Africa', 'Oceania');
  -- ADD COLUMN continent VARCHAR(7),
  -- ADD CHECK (continent IN ('Europe', 'Asia', 'America', 'Africa', 'Oceania'))
  -- Usare il check è equivalente in termini di funzionalità, ma differente in termini di rappresentazione interna
  
SELECT * FROM employees;

UPDATE employees SET continent = 'Europe' WHERE id = 1;
UPDATE employees SET continent = 'Moon' WHERE id = 2; -- valore non valido

-- colonne set
ALTER TABLE employees
  ADD COLUMN operativity SET('Europe', 'Asia', 'America', 'Africa', 'Oceania');
  
UPDATE employees SET operativity = 'Europe,America' WHERE id = 1;  
UPDATE employees SET operativity = 'Africa,America' WHERE id = 2;  
UPDATE employees SET operativity = '' WHERE id = 3;  
UPDATE employees SET operativity = 'Moon,America' WHERE id = 4;  -- valore non valido

SELECT * FROM employees;


-- Svuotare una tabella
CREATE TABLE employees_copy AS SELECT * FROM employees;
SELECT * FROM employees_copy;

TRUNCATE employees_copy;
SELECT * FROM employees_copy;

-- Eliminazione di tutti i valori da una colonna
UPDATE employees_copy SET age = null;

-- Seleziona solo alcune colonne
SELECT 
  id
  , first_name AS Nome
  , last_name AS Cognome
  , age AS Eta
FROM 
  employees
WHERE
  1=1
  AND age IS NOT NULL 
  AND age >= 16 
;