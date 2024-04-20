USE employees;

-- Funzione IF
SELECT * FROM salaries ;

-- Mostrare una colonna con valore 'Alto' se il reddito è > 65.000, 'Basso' altrimenti
SELECT 
  *
  , IF(salary > 65000, 'Alto', IF (salary > 55000, 'Medio', 'Basso')) AS salary_label
FROM
  salaries
;

-- Funzione USER()
SELECT USER();
CREATE TABLE example (
	id INT(11) NOT NULL,
    label VARCHAR(50),
    creation_user VARCHAR(80),
    update_user VARCHAR(80)
);

INSERT INTO example VALUES (1, 'test', USER(), USER());

SELECT * FROM example;

-- Funzione  Lower
SELECT LOWER('HELLO WORLD');
-- Funzione Upper
SELECT UPPER('hello world');

-- Funzione Right
SELECT RIGHT('hello world', 5);

-- Funzione Left
SELECT LEFT('hello world', 7);

-- Funzione Locate
SELECT LOCATE('o', 'Hello World');

-- Funzione INSERT
SELECT INSERT('Hello World', 7, 0, 'My');

-- Funzione Repeat
SELECT REPEAT('-x', 3);



-- Funzione current_timestamp()
SELECT current_timestamp();

-- Funzinoe current_date()
SELECT current_date();

-- Funzione current_time();
SELECT current_time();

-- Funzione ADDDATE();
SELECT ADDDATE('2024-04-19', INTERVAL 5 day);
SELECT ADDDATE('2024-04-19', INTERVAL 5 month);
SELECT ADDDATE('2024-04-19', INTERVAL 5 year);
SELECT ADDDATE('2024-04-19', INTERVAL 5 week);

-- Funzioni per l'estrazione di parte della data
-- Funzione DAY
SELECT DAY('2024-04-19');
SELECT MONTH('2024-04-19');
SELECT YEAR('2024-04-19');
SELECT WEEK('2024-04-19');

-- Funzioni per l'estrazione di parte dell'orario
SELECT TIME(current_timestamp());
SELECT HOUR(current_time());
SELECT MINUTE(current_time());
SELECT SECOND(current_time());

-- Funzioni numeriche
-- Funzione Round()
SELECT ROUND(3.1415, 3);
-- Funzione ceil() e floor() numero intero successivo e precedente
SELECT CEIL(3.1415);
SELECT FLOOR(3.1415);

-- Funzione abs() per effettuare il valore assoluto
SELECT ABS(3), ABS(-3);

-- Funzione exp() per calcolare un esponenziale
SELECT EXP(2);

-- Funzione ln() per calcolare un logaritmo naturale
SELECT ln(exp(2));

-- Elenco delle funzioni disponibili su mysql https://dev.mysql.com/doc/refman/8.0/en/functions.html

