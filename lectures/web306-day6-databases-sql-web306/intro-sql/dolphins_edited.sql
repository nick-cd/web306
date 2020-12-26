-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 10:13 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dolphins`
--

-- --------------------------------------------------------

--
-- Table structure for table `dolphins`
--

CREATE TABLE `dolphins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dolphins`
--

INSERT INTO `dolphins` (`id`, `name`, `age`) VALUES
(1, 'Flipper', 3),
(2, 'Splashy', 5),
(3, 'Dorsal', 3);

-- This is an inline comment
/* Block SQL comments are the
same as PHP/CSS */

-- To make changes to our database using SQL we would use SQL statements
-- SQL statements are normally written in ALL CAPS but are not case-sensitive
-- There are multiple version of SQL with slightly different syntaxes but they mostly similar
-- This statement will select all rows from the `dolphins` table:
SELECT * FROM  `dolphins`;
-- Like most programming languages statements end with semicolons - in most versions
/*
SELECT - extracts data from a database
UPDATE - updates data in a database
DELETE - deletes data from a database
INSERT INTO - inserts new data into a database
CREATE DATABASE - creates a database
ALTER DATABASE - modifies a database
CREATE TABLE - creates a table
ALTER TABLE - modifies a table
CREATE INDEX - creates an index (search)
DROP INDEX - deletes an index
*/
-- The SELECT setatement selects data from a database
-- Select name and age from the `dolphins` table:
SELECT name, age FROM `dolphins`;

-- The WHERE clause filters rows which meet specific conditions
-- It works like an if statement
-- Select all from `dolphins` table where age is 3
SELECT * FROM `dolphins` WHERE age=3;
/*
These evaluators work with the WHERE clause:
= (equal)
<> (not equal, may be written as != in some SQL versions)
> (greater)
< (less than)
>= (greater than or equal)
<= (less than or equal)
BETWEEN (between an inclusive)
LIKE (search for a pattern)
IN (specify multiple possible values for a column)
*/
-- The AND, OR and NOT operators can be used in conjunction with the WHERE clause
-- The AND operator requires more than one condition to be met to dispaly a row
SELECT * FROM `dolphins` WHERE name='Flipper' AND age=3;
-- The OR operator specifies alternate parameters which could be met to display a row
SELECT * FROM `dolphins` WHERE name='Flipper' OR name='Splashy';
-- The NOT operator excludes a row from being displayed is a condition is met:
SELECT * FROM `dolphins` WHERE NOT name='Dorsal';
-- The INSERT INTO statement inserts new rows, or "instances" of an item into the table
-- INSERT INTO is used in combination with the VALUES statement to define column values for the new row
INSERT INTO `dolphins` (`id`, `name`, `age`) VALUES (4, 'Porpy', 1);
-- Like PHP variables, it is possible for an SQL field to have a value of null, meaning it has not value
-- A table field may only be allowed to be null if it is an optional field
-- You can check if a field is null by using the IS NULL and IS NOT NULL statements
SELECT * FROM `dolphins` WHERE age IS NULL;
-- Display rows if column IS NOT NULL
SELECT * FROM `dolphins` WHERE age IS NOT NULL;
-- The UPDATE statement is used to update rows in a table
-- It is used in conjunction with the SET statement to set new values for fields
UPDATE `dolphins` SET age=4 WHERE name='Flipper';
-- The DELETE statement deletes existing rows in the table
-- DELETE from table where this condition is met
DELETE FROM `dolphins` WHERE name='Dorsal';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dolphins`
--
ALTER TABLE `dolphins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dolphins`
--
ALTER TABLE `dolphins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
