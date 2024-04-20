-- VISTE

USE employees;

CREATE VIEW employees_salaries AS
SELECT 
  e.emp_no
  , e.last_name
  , e.first_name
  , s.salary
FROM 
  employees e
    JOIN salaries s ON e.emp_no = s.emp_no
;



SELECT * FROM employees_salaries;
-- Posso usare la vista come una tabella di sola lettura

-- Definisco una vista a partire da un'altra vista
CREATE OR REPLACE VIEW employees_named_john AS
SELECT
  *
FROM
  employees_salaries
WHERE
  first_name = 'Mark';
;

SELECT * FROM employees_named_john;

-- ridefinisci la vista eliminando una colonna
CREATE OR REPLACE VIEW employees_salaries AS -- aggiugendo OR REPLACE posso sovrascrivere la vista qualora esista
SELECT 
  e.emp_no
  , e.last_name
  , s.salary
FROM 
  employees e
    JOIN salaries s ON e.emp_no = s.emp_no
;

  
-- la vista employees_named_john si rompe perchè fa riferimento
-- alla colonna first_name di employees_salaries che non esiste più
SELECT * FROM employees_named_john;


-- Viste materializzate
-- NON ESISTONO su MySQL ma si possono simulare

-- Sono delle fotografie di una query che vengono salvate su disco come tabelle vere e proprie
-- Aiutano a migliorare le performance di una query pesante
-- Ma non si aggiornano automaticamente, se voglio aggiornare i dati, devo aggiornare la vista

-- Creo la vista materializzata come se fosse una tabella normale
-- a partire dal risultato di una query
CREATE TABLE mv_employees_salary AS SELECT 
  e.emp_no
  , e.last_name
  , s.salary
FROM 
  employees e
    JOIN salaries s ON e.emp_no = s.emp_no
;

SELECT * FROM mv_employees_salary;

-- Poichè non si tratta di una vera vista materializzata
-- Non posso lanciare un comando di aggiornamento
-- ma lo posso simulare cancellando e ricreando la tabella
DROP TABLE mv_employees_salary;
CREATE TABLE mv_employees_salary AS SELECT 
  e.emp_no
  , e.last_name
  , s.salary
FROM 
  employees e
    JOIN salaries s ON e.emp_no = s.emp_no
;