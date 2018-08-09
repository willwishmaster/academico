﻿-- Script was generated by Devart dbForge Studio for MySQL, Version 6.0.315.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 08/08/2018 19:49:09
-- Server version: 5.5.5-10.1.34-MariaDB
-- Client version: 4.1

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

-- 
-- Set default database
--
USE academico;

--
-- Definition for table estudiant
--
DROP TABLE IF EXISTS estudiant;
CREATE TABLE estudiant (
  id INT(11) NOT NULL AUTO_INCREMENT,
  DNI VARCHAR(15) DEFAULT NULL,
  paterno VARCHAR(30) DEFAULT NULL,
  materno VARCHAR(30) DEFAULT NULL,
  nombres VARCHAR(50) DEFAULT NULL,
  genero ENUM('M','F') DEFAULT 'M',
  email VARCHAR(45) DEFAULT NULL,
  telefono VARCHAR(50) DEFAULT NULL,
  fechaNacimiento DATE DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 33
AVG_ROW_LENGTH = 1092
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

--
-- Definition for table personal
--
DROP TABLE IF EXISTS personal;
CREATE TABLE personal (
  id INT(11) NOT NULL,
  nombres VARCHAR(35) NOT NULL,
  genero VARCHAR(1) NOT NULL,
  designado VARCHAR(35) NOT NULL,
  edad INT(5) NOT NULL,
  direccion VARCHAR(55) NOT NULL
)
ENGINE = INNODB
AVG_ROW_LENGTH = 1260
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

-- 
-- Dumping data for table estudiant
--
INSERT INTO estudiant VALUES
(1, '12345678', 'Paredes', 'Juarez', 'jorge luis', 'M', 'user@mail.com', '051323232', '2019-06-30'),
(2, '12345679', 'Paredes', 'Quispe', 'José Carlos', 'M', 'user@mail.com', '051323232', '1990-01-08'),
(3, '12345670', 'Mamani', 'Quispe', 'Juana María', 'F', 'user@mail.com', '051323232', '1998-05-12'),
(4, '42564835', 'Mamani', 'Quispe', 'Ruth Josefa', 'F', 'user@mail.com', '051323232', '1993-11-18'),
(5, '41657898', 'Jahuira', 'Paredes', 'Esmeralda', 'F', 'user@mail.com', '051323232', '1992-12-30'),
(6, '85326564', 'Zavala', 'Ramos', 'Juan Pedro', 'M', 'user@mail.com', '051323232', '1993-10-29'),
(7, '82326564', 'Mamani', 'Paredes', 'María Elena', 'F', 'user@mail.com', '051323232', '1999-10-29'),
(8, '84326164', 'Paredes', 'Quispe', 'Eleuterio', 'M', 'user@mail.com', '051323232', '1997-10-21'),
(9, '41627898', 'Cáceres', 'Paredes', 'Jorge', 'M', 'user@mail.com', '051323232', '1992-12-30'),
(10, '85126564', 'Quispe', 'Quispe', 'Pedro', 'M', 'user@mail.com', '051323232', '1993-10-29'),
(11, '82726564', 'Mamani', 'Zapana', 'Elena', 'F', 'user@mail.com', '051323232', '1999-10-29'),
(12, '84426164', 'Pilco', 'Quispe', 'Julio', 'M', 'user@mail.com', '051323232', '1997-10-21'),
(13, '12345678', 'Wilson', 'Perez', 'jorge luis', 'M', 'user@mail.com', '051323232', '2019-06-30'),
(31, '', 'Velasquez', 'Velasquez', 'Wilson', 'M', 'wilcvelasquez@hotmail.com', '994303777', '2018-08-15'),
(32, '', 'simpson', '', 'Asgeir', 'M', '', '', '2018-08-22');

-- 
-- Dumping data for table personal
--
INSERT INTO personal VALUES
(0, 'daniel', 'H', 'medico', 35, 'puno'),
(0, 'raul', 'H', 'electricista', 45, 'juliaca'),
(0, 'brayan', 'H', 'electronico', 36, 'puno '),
(0, 'javier', 'H', 'minas', 34, 'puno'),
(0, 'aliss', 'M', 'enfermera', 25, 'juliaca'),
(0, 'williams', 'H', 'gasfiteria', 34, 'arequipa'),
(0, 'Nestor', 'H', 'arquitectura', 36, 'juliaca'),
(0, 'Miguel', 'H', 'construccion ', 28, 'puno'),
(0, 'MIreya', 'M', 'asistenta', 31, 'Arequipa'),
(0, 'sdsdsd', 'M', 'saddsd', 21132, 'sadsadsd'),
(0, 'sdsdsd', 'H', 'werrew', 2324324, 'werewr'),
(0, 'beatiful', 'H', 'rst', 3434, 'ttest'),
(0, 'asd', 'H', 'ads', 0, 'assadsad');

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;