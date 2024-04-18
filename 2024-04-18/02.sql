USE employees;

SELECT * FROM employees LIMIT 10; -- Seleziono solo i primi 10 record

SELECT * FROM employees LIMIT 1000, 10; -- Seleziono 10 record a partire dal 1000-imo

SELECT * FROM departments;

SELECT * FROM dept_emp;

-- | first_name | last_name | dept_name |

-- Selezionare nome, cognome e dipartimento di assegnazione di ciascun dipendente

-- Le tabelle coinvolte sono:
--  - employees
--  - dept_emp
--  - departments

SELECT
  e.first_name
  , e.last_name
  , d.dept_name
FROM
  employees e
    JOIN dept_emp de ON e.emp_no = de.emp_no
    JOIN departments d ON de.dept_no = d.dept_no
;

-- stessa query che visualizzi solo i dipendenti col cognome che inizi per 'Lo'
SELECT
  e.first_name
  , e.last_name
  , d.dept_name
FROM
  employees e
    JOIN dept_emp de ON e.emp_no = de.emp_no
    JOIN departments d ON de.dept_no = d.dept_no
WHERE
  1=1
  AND e.last_name LIKE 'Lo%' -- LIKE è case insensitive, la versione case sensitive è LIKE BINARY
;

-- ordiniamo tutti i dipendenti per cognome
SELECT * FROM employees ORDER BY last_name;

-- ordiniamo tutti i dipendenti per cognome decrescente
SELECT * FROM employees ORDER BY last_name DESC; -- ASC ordine crescente

-- ordiniamo per cognome e poi per nome
SELECT * FROM employees ORDER BY last_name, first_name;
SELECT * FROM employees ORDER BY last_name ASC, first_name ASC, birth_date DESC;

-- ordiniamo gli impiegati in ordine decrecente di salario, mostrando 
-- cognome, nome, salario, data inizio, data fine

SELECT
  e.first_name
  , e.last_name
  , s.salary
  , s.from_date
  , s.to_date
FROM
  employees e
    JOIN salaries s ON e.emp_no = s.emp_no
WHERE
  1=1
ORDER BY
  s.salary DESC  
;  


-- come prima, ma soltanto quelli con salario fra 50.000 e 100.000
SELECT
  e.first_name
  , e.last_name
  , s.salary
  , s.from_date
  , s.to_date
FROM
  employees e
    JOIN salaries s ON e.emp_no = s.emp_no
WHERE
  1=1
  -- AND s.salary <= 100000
  -- AND s.salary >= 50000
  AND s.salary BETWEEN 50000 AND 100000
ORDER BY
  s.salary DESC  
;  

-- Selezionamo tutti i dipendenti assunti dopo il 01/01/2000
SELECT
  *
FROM 
  employees
WHERE
  hire_date >= '2000-01-01' -- YYYY-MM-DD
ORDER BY
  hire_date DESC
;

-- Selezioniamo tutti i dipendenti che hanno la mansione "Engineer"
SELECT
  *
FROM
  employees e
    JOIN titles t ON e.emp_no = t.emp_no
WHERE
  1=1
  AND t.title LIKE '%Engineer%'
;

-- Estrarre tutte le mansioni di tipo ingegneristico eliminando le duplicazioni
SELECT DISTINCT
  title
FROM 
  titles 
WHERE 
  title LIKE '%Engineer%';

-- OPERAZIONI INSIEMISTICHE
  
-- Estrarre tutti i dipendenti (cognome, nome, hire_date) che sono stati assunti dopo il 01/01/2000  
-- E tutti i dipendenti che sono manager di dipartimento
SELECT
  *
FROM 
  employees
WHERE
  hire_date >= '2000-01-01' -- YYYY-MM-DD
-- TUTTI I DIPENDENTI ASSUNTI DOPO 01/01/2000
UNION
SELECT
  e.*
FROM
  employees e
    JOIN dept_manager dm ON e.emp_no = dm.emp_no
; -- TUTTI I MANAGER DI DIPARTIMENTO  

-- operazioni di gruppo
-- estrarre il numero di manager
SELECT COUNT(*) FROM dept_manager;

-- estrarre il salario massimo/minimo/medio, varianza, deviazione standard
SELECT MAX(salary) FROM salaries;
SELECT MIN(salary) FROM salaries;
SELECT AVG(salary) FROM salaries;
SELECT VARIANCE(salary) FROM salaries;
SELECT STD(salary) FROM salaries;

-- estrarre il salario medio di uomini e donne
SELECT
  avg(s.salary)
  , e.gender AS 'Sesso'
FROM
  employees e
    JOIN salaries s ON e.emp_no = s.emp_no
WHERE
  1=1
GROUP BY
  e.gender  
;    

-- estrarre il salario medio in base all'anno di assunzione
SELECT
  avg(s.salary)
  , YEAR(e.hire_date)
FROM
  employees e
    JOIN salaries s ON e.emp_no = s.emp_no
WHERE
  1=1
GROUP BY
  YEAR(e.hire_date)
ORDER BY 
  avg(salary) DESC  
;    

-- estrarre il salario medio in base sia al sesso che all'anno di assunzione
SELECT
  avg(s.salary)
  , e.gender
  , YEAR(e.hire_date)
FROM
  employees e
    JOIN salaries s ON e.emp_no = s.emp_no
WHERE
  1=1
GROUP BY
  e.gender
  , YEAR(e.hire_date)
ORDER BY 
  avg(salary) DESC  
;    

-- quanti dipendenti ha ciascun dipartimento?
SELECT
  dept_name
  , COUNT(*)
FROM
  departments d
    JOIN dept_emp de ON d.dept_no = de.dept_no
WHERE
  1=1
GROUP BY
  dept_name
ORDER BY
  COUNT(*) DESC  
;

-- quanti dipendenti ha ciascun dipartimento 
-- che abbia meno di 50.000 dipendenti?
SELECT
  dept_name
  , COUNT(*)
FROM
  departments d
    JOIN dept_emp de ON d.dept_no = de.dept_no
WHERE
  1=1
GROUP BY
  dept_name
HAVING  -- Filtraggio sulla funzione di gruppo
  COUNT(*) < 50000 
ORDER BY
  COUNT(*) DESC  
;

-- SUBQUERY
-- Estrarre tutti i salari dei manager
-- Versione senza subquery
SELECT
  salary
FROM
  salaries s
    JOIN employees e ON s.emp_no = e.emp_no
    JOIN dept_manager dm ON e.emp_no = dm.emp_no
;    


-- Versione con subquery
-- Equivalente a dire: Mostra tutti i salari dei dipendenti inclusi 
-- nella lista degli emp_no nella tabella dept_manager    
SELECT
  salary
FROM
  salaries
WHERE
  emp_no IN (
    SELECT DISTINCT emp_no FROM dept_manager
  );
