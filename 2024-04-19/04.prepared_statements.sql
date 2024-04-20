-- PREPARED STATEMENTS
-- Fase1: preparo lo statement, alcune ottimizzazioni possono essere già fatte (necessario solo una volta)
PREPARE statement_1 FROM 'SELECT last_name, first_name FROM employees WHERE emp_no > ?';

-- Fase2: imposto i parametri
SET @var1 = 10;
-- Fase3: eseguo lo statement passando i parametri
EXECUTE statement_1 USING @var1;

-- Eseguo nuovamente con nuovi parametri
SET @var1 = 100;
EXECUTE statement_1 USING @var1;

-- Fase4: rimuovo lo statement
DEALLOCATE PREPARE statament_1;


PREPARE statement_2 FROM 'SELECT last_name, first_name FROM employees WHERE emp_no > ? AND birth_date > ?';
SET @emp_no = 50;
SET @birth_date = '1954-02-12';

-- L'esecuzione dello statement assegna i parametri nello stesso ordine in cui vengono forniti
EXECUTE statement_2 USING @emp_no, @birth_date;

DEALLOCATE PREPARE statement_2;