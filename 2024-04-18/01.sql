USE test;

CREATE TABLE sales (
    id INT NOT NULL PRIMARY KEY,
    employee_id INT NOT NULL,
    net_amount DECIMAL(10,2)
);

INSERT INTO sales (id, employee_id, net_amount) VALUES (1, 2, 12000.15);
INSERT INTO sales (id, employee_id, net_amount) VALUES (2, 3, 5000);
INSERT INTO sales (id, employee_id, net_amount) VALUES (3, 1, 8200.50);
INSERT INTO sales (id, employee_id, net_amount) VALUES (4, 2, 9000);

SELECT * FROM sales;

SELECT * FROM sales, employees;  -- Prodotto cartesiano fra sales e employees

SELECT * FROM sales, employees WHERE employee_id = employees.id;  -- Applico un criterio di selezione per le righe in cui employee_id = employess.id

SELECT * FROM sales s, employees e WHERE employee_id = e.id;  -- Posso usare degli alias per le tabelle

SELECT e.*, s.net_amount FROM sales s, employees e WHERE s.employee_id = e.id;  -- Proietto solo alcune colonne

-- SELECT -- Operazioni di PROIEZIONE
-- WHERE --  Operazioni di SELEZIONE

-- JOIN fra tabelle

-- CROSS JOIN
SELECT * FROM sales CROSS JOIN employees;

-- INNER JOIN
SELECT * FROM sales JOIN employees ON sales.employee_id = employees.id;       -- mostra solo le righe per cui esiste una corrispondenza

-- LEFT JOIN
SELECT * FROM sales LEFT JOIN employees ON sales.employee_id = employees.id; 
-- mostra tutte le righe della tabella di sinistra mettendo valori null qualora non ci siano corrsipondenze con la tabella di destra

-- RIGHT JOIN
SELECT * FROM sales RIGHT JOIN employees ON sales.employee_id = employees.id;
-- mostra tutte le righe della tabella di destra mettendo valori null qualora non ci siano corrsipondenze con la tabella di sinistra

-- un'operazione di LEFT JOIN corrisponde a quella di RIGHT JOIN scambiando l'ordine delle tabelle


DROP TABLE SALES;

CREATE TABLE sales (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, -- AUTO_INCREMENT imposta un contatore per valorizzare la colonna automaticamente
    employee_id INT NOT NULL,
    net_amount DECIMAL(10,2)
);

INSERT INTO sales (employee_id, net_amount) VALUES (2, 12000.15);
INSERT INTO sales (employee_id, net_amount) VALUES (3, 5000);
INSERT INTO sales (employee_id, net_amount) VALUES (1, 8200.50);
INSERT INTO sales (employee_id, net_amount) VALUES (2, 9000);

SELECT * FROM sales;

-- Relazioni (1:1) (0..1:1)
CREATE TABLE Person (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    position_id INT NOT NULL UNIQUE -- se rimuovo la clausola NOT NULL ammetto la possibilità che nessuna posizione sia assegnato a una persona
);

CREATE TABLE Position (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    lat FLOAT NOT NULL,
    lng FLOAT NOT NULL
);

-- Relazioni (1:M)
CREATE TABLE sales (
    id INT NOT NULL PRIMARY KEY,
    employee_id INT NOT NULL, -- l'assenza della clausola UNIQUE implica che lo stesso employee_id può essere usato per M vendite diverse
    net_amount DECIMAL(10,2)
);

SHOW CREATE TABLE employees; -- seleziono il codice per ricreare una data tabella

CREATE TABLE `employees` (
  id int NOT NULL,
  first_name char(50) NOT NULL,
  last_name char(50) NOT NULL DEFAULT 'XXX'
);

-- Relazioni (N:M)
CREATE TABLE books (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(80)
);

CREATE TABLE authors (
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(80),
  last_name VARCHAR(80)
);

-- Creare una terza tabella che mantiene DUE relazioni (1..M) da un lato con authors, dall'altro con books

CREATE TABLE books_authors (
  id INT NOT NULL AUTO_INCREMENT,
  author_id INT NOT NULL,
  book_id INT NOT NULL
);
/*
| id | author_id | book_id |
  1        1          1
  2        1          2
  3        2          1
  4        3          1
  
  author(id=1) ha scritto books(id=1,2)
  author(id=2) ha scritto books(id=1)
  author(id=3) ha scritto books(id=1)
  */

-- Vincoli di integrità referenziale

DROP TABLE SALES;

CREATE TABLE sales (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, -- AUTO_INCREMENT imposta un contatore per valorizzare la colonna automaticamente
    employee_id INT NOT NULL,
    net_amount DECIMAL(10,2),
    CONSTRAINT fk_employee_id_id FOREIGN KEY (employee_id) REFERENCES employees(id) 
    -- il vincolo di chiava esterna sulla colonna employee_id fa riferimento alla tabella employees, colonna id
);

INSERT INTO sales (employee_id, net_amount) VALUES (2, 12000.15);
INSERT INTO sales (employee_id, net_amount) VALUES (3, 5000);
INSERT INTO sales (employee_id, net_amount) VALUES (1, 8200.50);
INSERT INTO sales (employee_id, net_amount) VALUES (2, 9000);

SELECT * FROM sales;
UPDATE employees SET id = 101 WHERE ID = 1; -- Operazione negata per via del vincolo di chiava esterna
DELETE FROM employees WHERE id = 1; -- Operazione negata per via del vincolo di chiava esterna

-- tipi di operazione in seguito a cancellazione o modifica di un record genitore (parent)

DROP TABLE SALES;

CREATE TABLE sales (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, -- AUTO_INCREMENT imposta un contatore per valorizzare la colonna automaticamente
    employee_id INT NOT NULL,
    net_amount DECIMAL(10,2),
    CONSTRAINT fk_employee_id_id FOREIGN KEY (employee_id) REFERENCES employees(id) 
      ON DELETE CASCADE
      ON UPDATE CASCADE
    -- il vincolo di chiava esterna sulla colonna employee_id fa riferimento alla tabella employees, colonna id
);

INSERT INTO sales (employee_id, net_amount) VALUES (2, 12000.15);
INSERT INTO sales (employee_id, net_amount) VALUES (3, 5000);
INSERT INTO sales (employee_id, net_amount) VALUES (1, 8200.50);
INSERT INTO sales (employee_id, net_amount) VALUES (2, 9000);

UPDATE employees SET id = 101 WHERE ID = 1; -- 
SELECT * FROM employees;
SELECT * FROM sales;

/*
Altre operazioni possibili:
- CASCADE Replica l'operazione di UPDATE/DELETE a cascata sui record che fanno riferimento a quello modificato/cancellato
- RESTRICT non permette l'operazione
- NO ACTION non intraprende nessuna azione (consente la modifica/cancellazione del record parent e non fa nient'altro)
- SET NULL (imposta a NULL il riferimento orfano)
- SET DEFAULT (imposta il valore di default definito per la colonna)