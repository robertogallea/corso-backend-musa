-- STORED FUNCTIONS

-- IF(salary > 65000, 'Alto', IF (salary > 55000, 'Medio', 'Basso'))
DELIMITER $$

CREATE FUNCTION SalaryLevel(salary DECIMAL(10,2)) 
RETURNS VARCHAR(5)
DETERMINISTIC -- NON DETERMINISTIC (default)
BEGIN
	DECLARE salaryLevel VARCHAR(5);
    
	IF (salary > 65000) THEN
      SET salaryLevel = 'Alto';
	ELSEIF (salary > 55000) THEN
      SET salaryLevel = 'Medio';
	ELSE 
      SET salaryLevel = 'Basso';
	END IF;
    
    RETURN (salaryLevel);
END $$

DELIMITER ;

-- Esecuzione funzione
SELECT SalaryLevel(70000); -- Alto
SELECT SalaryLevel(60000); -- Medio
SELECT SalaryLevel(30000); -- Basso

DROP FUNCTION SalaryLevel;

SELECT SalaryLevel(70000);



-- STORED PROCEDURES

DELIMITER //

CREATE PROCEDURE GetAllEmployees()
BEGIN
  SELECT * FROM employees;
END //

DELIMITER ;

CALL GetAllEmployees();




DELIMITER //

CREATE PROCEDURE GetMaxSalary(
  OUT max_salary DEC(10,2)
)
BEGIN
	SELECT MAX(salary) INTO max_salary FROM salaries;
END //

DELIMITER ;

CALL GetMaxSalary(@out);

SELECT @out;

DROP PROCEDURE GetMaxSalary;
DROP PROCEDURE GetAllEmployees;