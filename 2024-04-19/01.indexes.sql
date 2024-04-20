CREATE DATABASE index_test;

USE index_test;

-- Creiamo una tabella di esempio
CREATE TABLE employees (
  id INT NOT NULL,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  device_serial VARCHAR(15) NOT NULL,
  salary INT NOT NULL
);

INSERT INTO employees
VALUES (1, 'John', 'Smith', 'ABC123', 60000),
       (2, 'Jane', 'Doe', 'DEF456', 65000),
       (3, 'Bob', 'Johnson', 'GHI789', 70000),
       (4, 'Sally', 'Fields', 'JKL012', 75000),
       (5, 'Michael', 'Smith', 'MNO345', 80000),
       (6, 'Emily', 'Jones', 'PQR678', 85000),
       (7, 'David', 'Williams', 'STU901', 90000),
       (8, 'Sarah', 'Johnson', 'VWX234', 95000),
       (9, 'James', 'Brown', 'YZA567', 100000),
       (10, 'Emma', 'Miller', 'BCD890', 105000),
       (11, 'William', 'Davis', 'EFG123', 110000),
       (12, 'Olivia', 'Garcia', 'HIJ456', 115000),
       (13, 'Christopher', 'Rodriguez', 'KLM789', 120000),
       (14, 'Isabella', 'Wilson', 'NOP012', 125000),
       (15, 'Matthew', 'Martinez', 'QRS345', 130000),
       (16, 'Sophia', 'Anderson', 'TUV678', 135000),
       (17, 'Daniel', 'Smith', 'WXY901', 140000),
       (18, 'Mia', 'Thomas', 'ZAB234', 145000),
       (19, 'Joseph', 'Hernandez', 'CDE567', 150000),
       (20, 'Abigail', 'Smith', 'FGH890', 155000);
       
SELECT * FROM employees;       


SELECT * FROM employees WHERE salary = 100000;

EXPLAIN SELECT * FROM employees WHERE salary = 100000; -- EXPLAIN fornisce delle informazioni sulla esecuzione della query
-- possible_keys indica l'indice utilizzato
-- rows il numero di righe analizzate per produrre il risultato

SELECT * FROM employees WHERE salary < 70000;

EXPLAIN SELECT * FROM employees WHERE salary < 70000;


CREATE INDEX salary ON employees(salary); -- creo indice con nome 'salary' sulla tabella 'employees', colonna 'salary'

SELECT * FROM employees WHERE salary = 100000; -- il risultato naturalmente è lo stesso

EXPLAIN SELECT * FROM employees WHERE salary = 100000;

-- Gli indici da creare devono essere il meno possibile
-- e che realmente servono
-- In particolare gli indici andrebbero definiti sulle colonne utilizzate maggiormente per effettuare
-- filtri con WHERE
-- Ordinamento con ORDER BY
-- JOIN

SELECT * FROM employees WHERE salary < 70000;

EXPLAIN SELECT * FROM employees WHERE salary < 70000;


-- Indici su più colonne

CREATE INDEX names ON employees(last_name, first_name);

-- Ricerca su cognome e nome
SELECT * FROM employees WHERE last_name = 'Smith' AND first_name = 'John';

EXPLAIN SELECT * FROM employees WHERE last_name = 'Smith' AND first_name = 'John';

-- Ricerca sul solo cognome
SELECT * FROM employees WHERE last_name = 'Smith';

EXPLAIN SELECT * FROM employees WHERE last_name = 'Smith';

-- Ricerca sul solo nome
SELECT * FROM employees WHERE first_name = 'John';

EXPLAIN SELECT * FROM employees WHERE first_name = 'John'; -- L'indice non viene utilizzato!

-- Quando indicizzo una coppia su (col1, col2) equivale a indicizzare (col1), (col1, col2)
-- Non (col2)!
-- Sulle triple (col1, col2, col3)  equivale a indicizzare (col1), (col1, col2), (col1, col2, col3)

SHOW INDEXES FROM employees;