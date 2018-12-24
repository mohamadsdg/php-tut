about mySQL DBMS

PhpMyAdmin (local, cpanel, directadmin)


MyIsam vs InnoDB

Column Attributes (name, type , size , ...)

SQL Data Types (int, Char , Varchar ...)  
 
SQL Introduction (how to request database datas)

General CRUD operations :
  Create , Read , Update , Delete

-- standard : alwayse add semmicolon (;) after sql statements !

--------------- Create Database; ---------------  
CREATE DATABASE database_name;
--------------- Drop(Remove) Database; ---------------  
DROP DATABASE database_name;
-- show list of database in mySql console
show databases;
--************ show database files in disk

--------------- Describe Tables ------------+ Test in MySQL Console
USE database_name;
Describe table_name;




--------------- Create And Modify Tables ---------------  
-- Create Table:
 CREATE TABLE table_name
(
	column_name1 data_type(size) constraints,
	column_name2 data_type(size) constraints,
	column_name3 data_type(size) constraints,
	...
);

-- constraint types :
NOT NULL - Indicates that a column cannot store NULL value
UNIQUE - Ensures that each row for a column must have a unique value
PRIMARY KEY - A combination of a NOT NULL and UNIQUE. Ensures that a column (or combination of two or more columns) have an unique identity which helps to find a particular record in a table more easily and quickly
FOREIGN KEY - Ensure the referential integrity of the data in one table to match values in another table
CHECK - Ensures that the value in a column meets a specific condition
DEFAULT - Specifies a default value when specified none for this column


---- Table Persons
CREATE TABLE IF NOT EXISTS Persons
(
	person_id int(11) NOT NULL AUTO_INCREMENT,
	age int NOT NULL ,
	lastname varchar(255),
	firstname varchar(255),
	email varchar(255) UNIQUE,
	address varchar(255),
	city varchar(255),
	CHECK (person_id>0 AND age>9),
	PRIMARY KEY (person_id)
-- CONSTRAINT pk_person_id PRIMARY KEY (person_id)
);
-- alter add primary key
ALTER TABLE Persons
ADD CONSTRAINT pk_person_id PRIMARY KEY (person_id);
-- alter drop primary key
ALTER TABLE Persons
DROP PRIMARY KEY;

-- Alter Add Constraint
ALTER TABLE Persons
ADD CONSTRAINT ConstName constraint (field[,field]);

-- Alter Drop Constraint
ALTER TABLE Persons
DROP CONSTRAINT ConstName;

---- Table Orders
CREATE TABLE IF NOT EXISTS Orders
(
	order_id int NOT NULL AUTO_INCREMENT,
	order_qty int NOT NULL DEFAULT 1,
	person_id int(11) NOT NULL ,
	pay_amount int, -- Toomans
	PRIMARY KEY (order_id),
	FOREIGN KEY (person_id) REFERENCES Persons(person_id)
);

-- alter add foreign key 
ALTER TABLE Orders
ADD CONSTRAINT fk_order_person
FOREIGN KEY (person_id) REFERENCES Persons(person_id);
-- alter drop foreign key
ALTER TABLE Orders
DROP FOREIGN KEY fk_order_person;
-- or
ALTER TABLE Orders
DROP CONSTRAINT fk_order_person;



--------------- Drop(remove) Tables or Databases ------------
DROP TABLE table_name;

--------------- Delete some data from Tables ------------
DELETE FROM table_name
WHERE some_condition;
-- example 
DELETE FROM Persons
WHERE age<10 or age>60;

--------------- Delete all data from Tables ------------
TRUNCATE TABLE table_name ;
-- or :
DELETE FROM table_name;


--------------- insert data into Table ------------
INSERT INTO table_name
VALUES (value1, value2, value3,...);
-- example 
INSERT INTO Persons
VALUES (34, 26, "Avand","Loghman","avand.loghman@gmail.com","Shiraz - some address","Shiraz");

-- or
INSERT INTO table_name (column1, column2, column3,...)
VALUES (value1, value2, value3,...)
-- example
INSERT INTO Persons (age,lastname,firstname)
VALUES (26, "Avand","Loghman");  -- other culomns get default values or null


--------------- update data in a Table ------------
UPDATE table_name
SET column1=value1, column2=value2,...
WHERE some_condition
-- example : change all names to lowercase
UPDATE Persons
SET firstname=LOWER(firstname), lastname=LOWER(lastname)
WHERE 1 	-- optional
-- example : change Email of user 47
UPDATE Persons
SET email="aliAhmadi87654@gmail.com"
WHERE person_id=47
-- example : triple quantity and amount of orders with id #5 to #15
UPDATE Orders
SET order_qty=order_qty*3, pay_amount=pay_amount*3
WHERE order_id BETWEEN 5 AND 15  -- WHERE order_id>=5 and order_id<=15 


--------------- Select from Table ------------

SELECT columns FROM tables -- 1. entekhab filed(ya tavabeE ke roye column emal mishe) az che table E --
WHERE some_condition -- 2. shart vaghti ke chi beshe bere select kone ! --
GROUP BY columns
ORDER BY column_expr [ASC | DESC]
LIMIT offset,row_count ;


select operation
select *
select columns
where 1 cond
where more cond

select columns from multipleTables
where multiple tables (sum of product sales)

order by ...
limit i,n

group by ... (sum of product sales)






