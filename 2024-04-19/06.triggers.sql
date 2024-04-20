-- TRIGGERS

USE employees;

-- creare un trigger che ad ogni inserimento di un nuovo dipendente
-- crei un salario per quel dipendente dalla data odierna,a tempo indeterminato 
-- e con un valore costante (es. 50000)
CREATE TRIGGER create_base_salary
AFTER INSERT ON employees
FOR EACH ROW
	INSERT INTO salaries (emp_no, salary, from_date, to_date) VALUES (NEW.emp_no, 50000, CURRENT_DATE, '9999-01-01');
    
    
DESC employees;

SELECT MAX(emp_no) FROM employees;

INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) 
	VALUES (500000, CURRENT_DATE, 'Mario', 'Bianchi', 'M', CURRENT_DATE);
    
SELECT * FROM salaries ORDER BY emp_no DESC;    


