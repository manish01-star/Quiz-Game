-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2026 at 09:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `score` int(11) DEFAULT 0,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `score`, `profile_image`, `created_at`) VALUES
(1, 'manish ', 'manish@gmail.com', '$2y$10$0UvhFREM6USnfVFpHI3IAuSGqCt1XcffcFm7rfBGw9jhVKSFskUhe', 0, 'uploads/WhatsApp Image 2024-11-03 at 9.02.50 AM.jpeg', '2024-11-09 06:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `coding`
--

CREATE TABLE `coding` (
  `id` int(11) NOT NULL,
  `quizid` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `opt1` varchar(255) DEFAULT NULL,
  `opt2` varchar(255) DEFAULT NULL,
  `opt3` varchar(255) DEFAULT NULL,
  `opt4` varchar(255) DEFAULT NULL,
  `ans` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coding`
--

INSERT INTO `coding` (`id`, `quizid`, `subject`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`, `created_at`, `updated_at`) VALUES
(1, 1, 'coding', 'Which of the following is a JavaScript data type?', 'Number', 'Integer', 'String', 'All of the above', 'opt4', '2024-11-11 12:31:28', '2024-11-11 12:31:28'),
(2, 1, 'coding', 'HTML stands for?', 'HyperText Markup Language', 'HyperText Machine Language', 'HighText Markup Language', 'HyperText Modeling Language', 'opt1', '2024-11-09 09:56:02', '2024-11-11 12:34:44'),
(3, 1, 'coding', 'Which of the following is the correct way to declare a variable in JavaScript?', 'let x = 5;', 'int x = 5;', 'var x : 5;', 'x = 5;', 'opt1', '2024-11-09 09:56:02', '2024-11-09 09:56:02'),
(4, 1, 'coding', 'What is the main purpose of CSS?', 'To structure the content', 'To style the appearance of a webpage', 'To make a webpage interactive', 'To manage databases', 'opt2', '2024-11-09 09:56:02', '2024-11-09 09:56:02'),
(5, 1, 'coding', 'Which of the following is used to create a hyperlink in HTML?', '<link>', '<a>', '<href>', '<url>', 'opt2', '2024-11-09 09:56:02', '2024-11-09 09:56:02'),
(6, 2, 'coding', 'Which method is used to append an element to an array in JavaScript?', 'append()', 'add()', 'push()', 'insert()', 'opt3', '2024-11-09 09:56:02', '2024-11-12 14:15:50'),
(7, 2, 'coding', 'Which of the following is used to create a class in Python?', 'class MyClass:', 'new MyClass:', 'class: MyClass', 'MyClass class:', 'opt1', '2024-11-09 09:56:02', '2024-11-12 14:15:50'),
(8, 2, 'coding', 'What does SQL stand for?', 'Standard Query Language', 'Structured Query Language', 'Simple Query Language', 'Structured Question Language', 'opt2', '2024-11-09 09:56:02', '2024-11-12 14:15:50'),
(9, 2, 'coding', 'Which of the following is a valid JavaScript function declaration?', 'function = myFunction()', 'function myFunction()', 'def myFunction()', 'myFunction() function', 'opt2', '2024-11-09 09:56:02', '2024-11-12 14:15:50'),
(10, 2, 'coding', 'Which of the following HTML tags is used to display a table?', '<table>', '<tr>', '<td>', '<th>', 'opt1', '2024-11-09 09:56:02', '2024-11-12 14:15:50'),
(11, 2, 'coding', 'In which year was JavaScript first released?', '1995', '1990', '2000', '2005', 'opt1', '2024-11-09 09:56:02', '2024-11-12 14:15:50'),
(12, 2, 'coding', 'Which HTML attribute is used to define the character encoding for a webpage?', '', 'encoding', 'char', 'encoding-type', 'opt1', '2024-11-09 09:56:02', '2024-11-12 14:15:50'),
(13, 2, 'coding', 'Which of the following is a correct syntax for creating an object in JavaScript?', 'var obj = {name: \"John\", age: 30};', 'var obj = (name: \"John\", age: 30);', 'object obj = {name: \"John\", age: 30};', 'var obj: name = \"John\", age = 30;', 'opt1', '2024-11-09 09:56:02', '2024-11-12 14:17:49'),
(14, 2, 'coding', 'What does the Python `len()` function do?', 'Returns the length of a string or list', 'Returns the type of a variable', 'Converts data types', 'None of the above', 'opt1', '2024-11-09 09:56:02', '2024-11-09 09:56:02'),
(15, 2, 'coding', 'In CSS, what is the purpose of the `z-index` property?', 'Controls the font size of elements', 'Specifies the stacking order of elements', 'Sets the background color of an element', 'None of the above', 'opt2', '2024-11-09 09:56:02', '2024-11-09 09:56:02'),
(16, 2, 'coding', 'Which of the following is the correct syntax for a for loop in JavaScript?', 'for (i = 0; i < 10; i++) { }', 'for i = 0; i < 10; i++ { }', 'for (i, 0, 10) { }', 'None of the above', 'opt1', '2024-11-09 09:56:02', '2024-11-09 09:56:02'),
(17, 2, 'coding', 'Which of the following is the correct syntax to call a function in Python?', 'myFunction()', 'call myFunction()', 'call function myFunction()', 'None of the above', 'opt1', '2024-11-09 09:56:02', '2024-11-09 09:56:02'),
(18, 2, 'coding', 'Which operator is used for concatenation in JavaScript?', '+', '-', '*', '&', 'opt1', '2024-11-09 09:56:02', '2024-11-09 09:56:02'),
(19, 2, 'coding', 'Which of the following is a valid JavaScript array method?', 'array.push()', 'array.add()', 'array.insert()', 'array.popout()', 'opt1', '2024-11-09 09:56:02', '2024-11-09 09:56:02'),
(20, 2, 'coding', 'Which of the following is a JavaScript data type?', 'Number', 'Integer', 'String', 'All of the above', 'opt4', '2024-11-11 12:30:46', '2024-11-12 14:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `gk`
--

CREATE TABLE `gk` (
  `id` int(11) NOT NULL,
  `quizid` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `opt1` varchar(255) DEFAULT NULL,
  `opt2` varchar(255) DEFAULT NULL,
  `opt3` varchar(255) DEFAULT NULL,
  `opt4` varchar(255) DEFAULT NULL,
  `ans` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gk`
--

INSERT INTO `gk` (`id`, `quizid`, `subject`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`, `created_at`, `updated_at`) VALUES
(1, 1, 'gk', 'What is the capital of France?', 'Berlin', 'Madrid', 'Paris', 'Rome', 'opt3', '2024-11-09 09:58:03', '2024-11-09 09:58:03'),
(2, 1, 'gk', 'Which is the largest continent by area?', 'Asia', 'Africa', 'Europe', 'North America', 'opt1', '2024-11-09 09:58:03', '2024-11-09 09:58:03'),
(3, 1, 'gk', 'Who invented the telephone?', 'Thomas Edison', 'Alexander Graham Bell', 'Nikola Tesla', 'Benjamin Franklin', 'opt2', '2024-11-09 09:58:03', '2024-11-09 09:58:03'),
(4, 1, 'gk', 'Which planet is known as the Red Planet?', 'Earth', 'Venus', 'Mars', 'Jupiter', 'opt3', '2024-11-09 09:58:03', '2024-11-09 09:58:03'),
(5, 1, 'gk', 'What is the longest river in the world?', 'Amazon River', 'Nile River', 'Yangtze River', 'Mississippi River', 'opt2', '2024-11-09 09:58:03', '2024-11-12 14:34:38'),
(6, 2, 'gk', 'What is the largest ocean on Earth..', 'Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean', 'opt4', '2024-11-09 09:58:03', '2024-11-15 05:17:15'),
(7, 2, 'gk', 'Who was the first President of the United States?', 'Abraham Lincoln', 'George Washington', 'Thomas Jefferson', 'John Adams', 'opt2', '2024-11-09 09:58:03', '2024-11-09 09:58:03'),
(9, 2, 'gk', 'What is the smallest country in the world by land area?', 'Monaco', 'Vatican City', 'San Marino', 'Liechtenstein', 'opt2', '2024-11-09 09:58:03', '2024-11-09 09:58:03'),
(10, 2, 'gk', 'In what year did World War II end?', '1942', '1944', '1945', '1946', 'opt3', '2024-11-09 09:58:03', '2024-11-09 09:58:03'),
(11, 2, 'gk', 'who is dhan', 'money', 'ukfyguh', 'yvuhj', 'fgh', 'opt1', '2024-11-13 08:10:43', '2024-11-13 08:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `math`
--

CREATE TABLE `math` (
  `id` int(11) NOT NULL,
  `quizid` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `opt1` varchar(255) DEFAULT NULL,
  `opt2` varchar(255) DEFAULT NULL,
  `opt3` varchar(255) DEFAULT NULL,
  `opt4` varchar(255) DEFAULT NULL,
  `ans` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `math`
--

INSERT INTO `math` (`id`, `quizid`, `subject`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`, `created_at`, `updated_at`) VALUES
(1, 1, 'math', 'What is 5 + 7?', '10', '12', '15', '13', 'opt2', '2024-11-09 09:59:47', '2024-11-09 09:59:47'),
(2, 1, 'math', 'What is the square root of 64?', '6', '8', '10', '12', 'opt2', '2024-11-09 09:59:47', '2024-11-09 09:59:47'),
(3, 1, 'math', 'What is 9 x 8?', '72', '64', '56', '78', 'opt1', '2024-11-09 09:59:47', '2024-11-09 09:59:47'),
(4, 1, 'math', 'What is the value of pi (π)?', '3.14', '3.16', '3.18', '3.12', 'opt1', '2024-11-09 09:59:47', '2024-11-09 09:59:47'),
(5, 1, 'math', 'What is 25 divided by 5?', '3', '5', '6', '7', 'opt2', '2024-11-09 09:59:47', '2024-11-09 09:59:47'),
(6, 2, 'math', 'What is the perimeter of a square with side length 4?', '16', '12', '18', '20', 'opt1', '2024-11-09 09:59:47', '2024-11-09 09:59:47'),
(7, 2, 'math', 'What is the area of a rectangle with length 10 and width 5?', '50', '60', '40', '45', 'opt1', '2024-11-09 09:59:47', '2024-11-09 09:59:47'),
(8, 2, 'math', 'What is the value of 2 to the power of 3?', '6', '7', '8', '9', 'opt3', '2024-11-09 09:59:47', '2024-11-09 09:59:47'),
(9, 2, 'math', 'What is the sum of the interior angles of a triangle?', '180°', '90°', '360°', '270°', 'opt1', '2024-11-09 09:59:47', '2024-11-09 09:59:47'),
(10, 2, 'math', 'What is the value of 15 % 4....', '3', '4', '2', '1', 'opt1', '2024-11-09 09:59:47', '2024-11-15 06:30:47'),
(12, 2, 'math', 'who is dhan', 'money', 'ukfyguh', 'yvuhj', 'fgh', 'opt1', '2024-11-15 06:31:29', '2024-11-15 06:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `opt1` varchar(50) DEFAULT NULL,
  `opt2` varchar(50) DEFAULT NULL,
  `opt3` varchar(50) DEFAULT NULL,
  `opt4` varchar(50) DEFAULT NULL,
  `ans` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `quizid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`, `subject`, `quizid`) VALUES
(1, 'Markup language stands for?', 'HTML', 'CSS', 'JS', 'PHP', 'opt1', 'coding', 1),
(2, 'Object based languages', 'HTML', 'CSS', 'JS', 'PHP', 'opt3', 'gk', 3),
(3, 'whats your namess??', 'manish', 'alfa', 'bita', 'gama', 'opt1', 'gk', 3),
(4, 'hdfjlhdsuifsdhjfbsd', 'manish', 'alfa', 'bita', 'gama', 'manish', 'coding', 2),
(5, 'whats your name ?dfji', 'dsfdsdf', 'fxcgh', 'yvuhj', 'dxfcgh', 'dsfdsdf', 'gk\r\n', 4),
(6, 'hdfjlhdsu', 'manish', 'alfa', 'bita', 'gama', 'manish', 'coding', 2),
(7, 'helloooo', 'manish', 'alfa', 'bita', 'gama', 'manish', 'gk', 5),
(8, 'What is the capital of France?', 'Paris', 'London', 'Berlin', 'Madrid', 'Paris', 'gk', 1),
(9, 'Who wrote \"Hamlet\"?', 'Shakespeare', 'Dickens', 'Hemingway', 'Austen', 'Shakespeare', 'gk', 1),
(10, 'What does HTML stand for?', 'HyperText Markup Language', 'HighText Markup Language', 'HyperText Making Language', 'HighText Making Language', 'HyperText Markup Language', 'coding', 1),
(11, 'Which programming language is known as the language of the web?', 'Python', 'C++', 'JavaScript', 'Java', 'JavaScript', 'coding', 1),
(12, 'Which of these is not a JavaScript framework?', 'React', 'Vue', 'Angular', 'Laravel', 'Laravel', 'coding', 2),
(13, 'What does CSS stand for?', 'Cascading Style Sheets', 'Creative Style Sheets', 'Computer Style Sheets', 'Cascading Sheet Styles', 'Cascading Style Sheets', 'coding', 2),
(14, 'What is the correct HTML element for inserting a line break?', '<break>', '<br>', '<lb>', '<hr>', 'opt2', 'coding', 1),
(15, 'Which of the following is a JavaScript data type?', 'Number', 'Integer', 'String', 'All of the above', 'opt4', 'coding', 1),
(16, 'Which of the following is the correct way to declare a variable in JavaScript?', 'let x = 5;', 'int x = 5;', 'var x : 5;', 'x = 5;', 'opt1', 'coding', 1),
(17, 'What is the main purpose of CSS?', 'To structure the content', 'To style the appearance of a webpage', 'To make a webpage interactive', 'To manage databases', 'opt2', 'coding', 1),
(18, 'Which of the following is used to create a hyperlink in HTML?', '<link>', '<a>', '<href>', '<url>', 'opt2', 'coding', 1),
(19, 'Which method is used to append an element to an array in JavaScript?', 'append()', 'add()', 'push()', 'insert()', 'opt3', 'coding', 1),
(20, 'Which of the following is used to create a class in Python?', 'class MyClass:', 'new MyClass:', 'class: MyClass', 'MyClass class:', 'opt1', 'coding', 1),
(21, 'What does SQL stand for?', 'Standard Query Language', 'Structured Query Language', 'Simple Query Language', 'Structured Question Language', 'opt2', 'coding', 1),
(22, 'Which of the following is a valid JavaScript function declaration?', 'function = myFunction()', 'function myFunction()', 'def myFunction()', 'myFunction() function', 'opt2', 'coding', 1),
(23, 'Which of the following HTML tags is used to display a table?', '<table>', '<tr>', '<td>', '<th>', 'opt1', 'coding', 1),
(24, 'In which year was JavaScript first released?', '1995', '1990', '2000', '2005', 'opt1', 'coding', 1),
(25, 'Which HTML attribute is used to define the character encoding for a webpage?', 'charset', 'encoding', 'char', 'encoding-type', 'opt1', 'coding', 1),
(26, 'Which of the following is a correct syntax for creating an object in JavaScript?', 'var obj = {name: \"John\", age: 30};', 'var obj = (name: \"John\", age: 30);', 'object obj = {name: \"John\", age: 30};', 'var obj: name = \"John\", age = 30;', 'opt1', 'coding', 1),
(27, 'What does the Python `len()` function do?', 'Returns the length of a string or list', 'Returns the type of a variable', 'Converts data types', 'None of the above', 'opt1', 'coding', 2),
(28, 'In CSS, what is the purpose of the `z-index` property?', 'Controls the font size of elements', 'Specifies the stacking order of elements', 'Sets the background color of an element', 'None of the above', 'opt2', 'coding', 2),
(29, 'Which of the following is the correct syntax for a for loop in JavaScript?', 'for (i = 0; i < 10; i++) { }', 'for i = 0; i < 10; i++ { }', 'for (i, 0, 10) { }', 'None of the above', 'opt1', 'coding', 2),
(30, 'Which of the following is the correct syntax to call a function in Python?', 'myFunction()', 'call myFunction()', 'call function myFunction()', 'None of the above', 'opt1', 'coding', 2),
(31, 'Which operator is used for concatenation in JavaScript?', '+', '-', '*', '&', 'opt1', 'coding', 2),
(32, 'Which of the following is a valid JavaScript array method?', 'array.push()', 'array.add()', 'array.insert()', 'array.popout()', 'opt1', 'coding', 2),
(33, 'What is the correct HTML element for inserting a line break?', '<break>', '<br>', '<lb>', '<hr>', 'opt2', 'coding', 1),
(34, 'Which of the following is a JavaScript data type?', 'Number', 'Integer', 'String', 'All of the above', 'opt4', 'coding', 1),
(35, 'Which of the following is the correct way to declare a variable in JavaScript?', 'let x = 5;', 'int x = 5;', 'var x : 5;', 'x = 5;', 'opt1', 'coding', 1),
(36, 'What is the main purpose of CSS?', 'To structure the content', 'To style the appearance of a webpage', 'To make a webpage interactive', 'To manage databases', 'opt2', 'coding', 1),
(37, 'Which of the following is used to create a hyperlink in HTML?', '<link>', '<a>', '<href>', '<url>', 'opt2', 'coding', 1),
(38, 'Which method is used to append an element to an array in JavaScript?', 'append()', 'add()', 'push()', 'insert()', 'opt3', 'coding', 1),
(39, 'Which of the following is used to create a class in Python?', 'class MyClass:', 'new MyClass:', 'class: MyClass', 'MyClass class:', 'opt1', 'coding', 1),
(40, 'What does SQL stand for?', 'Standard Query Language', 'Structured Query Language', 'Simple Query Language', 'Structured Question Language', 'opt2', 'coding', 1),
(41, 'Which of the following is a valid JavaScript function declaration?', 'function = myFunction()', 'function myFunction()', 'def myFunction()', 'myFunction() function', 'opt2', 'coding', 1),
(42, 'Which of the following HTML tags is used to display a table?', '<table>', '<tr>', '<td>', '<th>', 'opt1', 'coding', 1),
(43, 'In which year was JavaScript first released?', '1995', '1990', '2000', '2005', 'opt1', 'coding', 1),
(44, 'Which HTML attribute is used to define the character encoding for a webpage?', 'charset', 'encoding', 'char', 'encoding-type', 'opt1', 'coding', 1),
(45, 'Which of the following is a correct syntax for creating an object in JavaScript?', 'var obj = {name: \"John\", age: 30};', 'var obj = (name: \"John\", age: 30);', 'object obj = {name: \"John\", age: 30};', 'var obj: name = \"John\", age = 30;', 'opt1', 'coding', 1),
(46, 'What does the Python `len()` function do?', 'Returns the length of a string or list', 'Returns the type of a variable', 'Converts data types', 'None of the above', 'opt1', 'coding', 2),
(47, 'In CSS, what is the purpose of the `z-index` property?', 'Controls the font size of elements', 'Specifies the stacking order of elements', 'Sets the background color of an element', 'None of the above', 'opt2', 'coding', 2),
(48, 'Which of the following is the correct syntax for a for loop in JavaScript?', 'for (i = 0; i < 10; i++) { }', 'for i = 0; i < 10; i++ { }', 'for (i, 0, 10) { }', 'None of the above', 'opt1', 'coding', 2),
(49, 'Which of the following is the correct syntax to call a function in Python?', 'myFunction()', 'call myFunction()', 'call function myFunction()', 'None of the above', 'opt1', 'coding', 2),
(50, 'Which operator is used for concatenation in JavaScript?', '+', '-', '*', '&', 'opt1', 'coding', 2),
(51, 'Which of the following is a valid JavaScript array method?', 'array.push()', 'array.add()', 'array.insert()', 'array.popout()', 'opt1', 'coding', 2),
(52, 'What is the correct HTML element for inserting a line break?', '<break>', '<br>', '<lb>', '<hr>', 'opt2', 'coding', 1),
(53, 'Which of the following is a JavaScript data type?', 'Number', 'Integer', 'String', 'All of the above', 'opt4', 'coding', 1),
(54, 'Which of the following is the correct way to declare a variable in JavaScript?', 'let x = 5;', 'int x = 5;', 'var x : 5;', 'x = 5;', 'opt1', 'coding', 1),
(55, 'What is the main purpose of CSS?', 'To structure the content', 'To style the appearance of a webpage', 'To make a webpage interactive', 'To manage databases', 'opt2', 'coding', 1),
(56, 'Which of the following is used to create a hyperlink in HTML?', '<link>', '<a>', '<href>', '<url>', 'opt2', 'coding', 1),
(57, 'Which method is used to append an element to an array in JavaScript?', 'append()', 'add()', 'push()', 'insert()', 'opt3', 'coding', 1),
(58, 'Which of the following is used to create a class in Python?', 'class MyClass:', 'new MyClass:', 'class: MyClass', 'MyClass class:', 'opt1', 'coding', 1),
(59, 'What does SQL stand for?', 'Standard Query Language', 'Structured Query Language', 'Simple Query Language', 'Structured Question Language', 'opt2', 'coding', 1),
(60, 'Which of the following is a valid JavaScript function declaration?', 'function = myFunction()', 'function myFunction()', 'def myFunction()', 'myFunction() function', 'opt2', 'coding', 1),
(61, 'Which of the following HTML tags is used to display a table?', '<table>', '<tr>', '<td>', '<th>', 'opt1', 'coding', 1),
(62, 'In which year was JavaScript first released?', '1995', '1990', '2000', '2005', 'opt1', 'coding', 1),
(63, 'Which HTML attribute is used to define the character encoding for a webpage?', 'charset', 'encoding', 'char', 'encoding-type', 'opt1', 'coding', 1),
(64, 'Which of the following is a correct syntax for creating an object in JavaScript?', 'var obj = {name: \"John\", age: 30};', 'var obj = (name: \"John\", age: 30);', 'object obj = {name: \"John\", age: 30};', 'var obj: name = \"John\", age = 30;', 'opt1', 'coding', 1),
(65, 'What does the Python `len()` function do?', 'Returns the length of a string or list', 'Returns the type of a variable', 'Converts data types', 'None of the above', 'opt1', 'coding', 2),
(66, 'In CSS, what is the purpose of the `z-index` property?', 'Controls the font size of elements', 'Specifies the stacking order of elements', 'Sets the background color of an element', 'None of the above', 'opt2', 'coding', 2),
(67, 'Which of the following is the correct syntax for a for loop in JavaScript?', 'for (i = 0; i < 10; i++) { }', 'for i = 0; i < 10; i++ { }', 'for (i, 0, 10) { }', 'None of the above', 'opt1', 'coding', 2),
(68, 'Which of the following is the correct syntax to call a function in Python?', 'myFunction()', 'call myFunction()', 'call function myFunction()', 'None of the above', 'opt1', 'coding', 2),
(69, 'Which operator is used for concatenation in JavaScript?', '+', '-', '*', '&', 'opt1', 'coding', 2),
(70, 'Which of the following is a valid JavaScript array method?', 'array.push()', 'array.add()', 'array.insert()', 'array.popout()', 'opt1', 'coding', 2);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `score` int(11) DEFAULT 0,
  `profile_image` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`, `score`, `profile_image`, `date`) VALUES
(16, 'manish', 'manish@gmail.com', '12345678', 20, 'uploads/OIP (1).jpg', '2024-11-20 16:13:19'),
(17, 'dhankumar', 'dhankumar@gmail.com', '12345', 0, NULL, '2024-11-20 16:14:04'),
(19, 'hello', 'hello@gmail.com', '12345678', 0, NULL, '2024-11-21 09:45:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coding`
--
ALTER TABLE `coding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gk`
--
ALTER TABLE `gk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `math`
--
ALTER TABLE `math`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coding`
--
ALTER TABLE `coding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gk`
--
ALTER TABLE `gk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `math`
--
ALTER TABLE `math`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
