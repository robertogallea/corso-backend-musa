-- TABELLE TEMPORANEE
-- SU DISCO
CREATE TEMPORARY TABLE temp_test (
	a varchar(10) NOT NULL
);

SELECT * FROM temp_test;

DROP TABLE temp_test;

-- SULLA MEMORIA DI SISTEMA
CREATE TEMPORARY TABLE temp_test (
	a varchar(10) NOT NULL
) ENGINE=MEMORY;

SELECT * FROM temp_test;

-- Una tabella temporanea è privata per l'utente della sessione
