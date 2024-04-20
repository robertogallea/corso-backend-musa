CREATE DATABASE bank;

USE BANK;

CREATE TABLE accounts (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    iban VARCHAR(4) NOT NULL,
    balance DECIMAL(10,2) NOT NULL
);

CREATE TABLE payments (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    account_1_id INT NOT NULL,
    account_2_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL
);

INSERT INTO accounts (iban, balance) VALUES ('ABCD', 1000), ('1234', 500);

SELECT * FROM accounts;


-- contabilizzare un pagamento di importo 100 da 'ABCD' a '1234'
UPDATE accounts SET balance = balance - 100 WHERE id = 1;
INSERT INTO payments (account_1_id, account_2_id, amount) VALUES (1, 2, 100);
UPDATE accounts SET balance = balance + 100 WHERE id = 2;

SELECT * FROM accounts;
SELECT * FROM payments;

-- contabilizzare un pagamento di importo 50 da '1234' a 'ABCD', ma suppongo che fallisce l'accredito sul primo conto
UPDATE accounts SET balance = balance - 50 WHERE id = 2;
INSERT INTO payments (account_1_id, account_2_id, amount) VALUES (2, 1, 50);
-- UPDATE accounts SET balance = balance + 50 WHERE id = 1;

-- inverto le operazioni
DELETE FROM payments WHERE id = 2;
UPDATE accounts SET balance = balance + 50 WHERE id = 2;

SELECT * FROM accounts;
SELECT * FROM payments;

-- Utilizziamo le transazioni
-- Caso 1, una delle operazioni fallisce
START TRANSACTION;
  UPDATE accounts SET balance = balance - 50 WHERE id = 2;
  INSERT INTO payments (account_1_id, account_2_id, amount) VALUES (2, 1, 50);
  -- UPDATE accounts SET balance = balance + 50 WHERE id = 1;
  SELECT * FROM accounts;
  SELECT * FROM payments;
ROLLBACK;  -- Facendo rollback, tutte le modifiche effettuata da START TRANSACTION in poi, vengono eliminate

SELECT * FROM accounts;
SELECT * FROM payments;

-- Caso 2, tutte le operazioni vanno a buon fine
START TRANSACTION;
  UPDATE accounts SET balance = balance - 50 WHERE id = 2;
  INSERT INTO payments (account_1_id, account_2_id, amount) VALUES (2, 1, 50);
  UPDATE accounts SET balance = balance + 50 WHERE id = 1;
  SELECT * FROM accounts;
  SELECT * FROM payments;  
COMMIT;  -- le modifiche effettuate durante la transazione vengono applicate alle tabelle su disco

SELECT * FROM accounts;
SELECT * FROM payments;


INSERT INTO payments (account_1_id, account_2_id, amount) VALUES (2, 1, 50);

-- Se auto_commit è attivato equivale a scrivere
START TRANSACTION;
  INSERT INTO payments (account_1_id, account_2_id, amount) VALUES (2, 1, 50);
COMMIT;

SET AUTOCOMMIT=0;
INSERT INTO payments (account_1_id, account_2_id, amount) VALUES (2, 1, 50);

-- Se autocommit è off o 0, equivale a scrivere
START TRANSACTION;
  INSERT INTO payments (account_1_id, account_2_id, amount) VALUES (2, 1, 50);
  
SET AUTOCOMMIT=1;  