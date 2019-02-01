-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 01 feb 2019 kl 09:21
-- Serverversion: 10.1.37-MariaDB
-- PHP-version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `eclass`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `courses`
--

CREATE TABLE `courses` (
  `CourseID` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Teacher` varchar(20) NOT NULL,
  `Students` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `courses`
--

INSERT INTO `courses` (`CourseID`, `Name`, `Teacher`, `Students`) VALUES
(1, 'Prgrm_2_Te3b', 'Henrik', 'huma0130, gapa0505, joma0620,'),
(2, 'test', 'admin', ''),
(3, 'test2', 'admin', ''),
(4, 'Cisco', 'Henrik', 'Huma0130');

-- --------------------------------------------------------

--
-- Tabellstruktur `handin`
--

CREATE TABLE `handin` (
  `HandInID` int(11) NOT NULL,
  `HandInName` varchar(50) NOT NULL,
  `HandInCourse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `handin`
--

INSERT INTO `handin` (`HandInID`, `HandInName`, `HandInCourse`) VALUES
(1, 'PHP_MYSQL_LAB', 'Prgrm_2_Te3b'),
(2, 'PHP_LAB_1', 'Prgrm_2_Te3b'),
(3, 'TEST', 'test'),
(4, 'CISCO_LAB_1', 'Prgrm_2_Te3b');

-- --------------------------------------------------------

--
-- Tabellstruktur `news`
--

CREATE TABLE `news` (
  `NewsID` int(50) NOT NULL,
  `headline` varchar(30) NOT NULL,
  `news` text NOT NULL,
  `course` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `news`
--

INSERT INTO `news` (`NewsID`, `headline`, `news`, `course`, `datetime`) VALUES
(3, 'Fysik', 'Ingen mer fysik nu', 'Ingen mer fysik nu', '0000-00-00 00:00:00'),
(4, 'WHAPPAPP', 'whafkawfkawhdawdmkaehfajfoakwiahwfi', 'test2', '0000-00-00 00:00:00'),
(5, 'WHAPPAPP2', 'öoguoghpjh76t08pijhio', 'test2', '2018-12-17 12:39:05'),
(6, 'Nyhet 3', 'jjawdjawkdjakwjdwkjdkawjdkawjdkjw', 'Prgrm_2_Te3b', '2018-12-23 17:45:49'),
(7, 'Lektion inställd 1/1', 'Lektionen är inställd pga strög. Ha de!', 'Prgrm_2_Te3b', '2019-01-07 00:00:00'),
(8, 'Jaaaaap', 'qoefhosefkqabnaklfmqeöuohfvaoådögjowehpowejowhownvwjqoåegqievmfhoqiefqoenoengqoenqpeinqogvnegnweofnwoegnwoegnweiogweoignweognweiognweo', 'Prgrm_2_Te3b', '2019-01-15 11:38:55'),
(9, 'Prov', 'Prov idag!', 'Cisco', '2019-02-01 08:30:30');

-- --------------------------------------------------------

--
-- Tabellstruktur `studentfiles`
--

CREATE TABLE `studentfiles` (
  `FileID` int(11) NOT NULL,
  `FileName` varchar(50) NOT NULL,
  `FileFolder` varchar(50) NOT NULL,
  `FileCourse` varchar(50) NOT NULL,
  `FileHandInName` varchar(50) NOT NULL,
  `Uploader` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `studentfiles`
--

INSERT INTO `studentfiles` (`FileID`, `FileName`, `FileFolder`, `FileCourse`, `FileHandInName`, `Uploader`) VALUES
(1, '1.PHP_LAB_1_login.zip', '0', 'Prgrm_2_Te3b', 'PHP_LAB_1', ''),
(2, '2.PHP_LAB_1_login.zip', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'PHP_LAB_1', ''),
(3, '3.PHP_MYSQL_LAB_login.zip', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'PHP_MYSQL_LAB', 'huma0130'),
(4, '4.PHP_MYSQL_LAB_', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'PHP_MYSQL_LAB', 'huma0130'),
(5, '5.PHP_MYSQL_LAB_', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'PHP_MYSQL_LAB', 'huma0130'),
(6, '6.PHP_LAB_1_APR2007_xinput_x64.cab', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'PHP_LAB_1', 'huma0130'),
(7, '7.PHP_LAB_1_APR2007_xinput_x64.cab', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'PHP_LAB_1', 'huma0130');

-- --------------------------------------------------------

--
-- Tabellstruktur `teacherfiles`
--

CREATE TABLE `teacherfiles` (
  `FileID` int(255) NOT NULL,
  `Filename` varchar(100) NOT NULL,
  `Filefolder` varchar(50) NOT NULL,
  `Filecourse` varchar(50) NOT NULL,
  `Uploader` varchar(50) NOT NULL,
  `Uploaddate` datetime(6) NOT NULL,
  `Nametoshow` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `teacherfiles`
--

INSERT INTO `teacherfiles` (`FileID`, `Filename`, `Filefolder`, `Filecourse`, `Uploader`, `Uploaddate`, `Nametoshow`) VALUES
(1, 'login.zip', 'php/Uploaded_Files/', 'Prgrm_2_Te3b', 'Henrik', '0000-00-00 00:00:00.000000', ''),
(7, '7.Prgrm_2_Te3b_login.zip', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'Henrik', '0000-00-00 00:00:00.000000', ''),
(8, '8.Prgrm_2_Te3b_login.zip', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'Henrik', '0000-00-00 00:00:00.000000', ''),
(9, '9.Prgrm_2_Te3b_gästbok_hugo_martinsson.zip', 'Uploaded_Files/', 'Prgrm_2_Te3b', 'Henrik', '0000-00-00 00:00:00.000000', 'gästbok_hugo_martinsson.zip'),
(10, '10.Prgrm_2_Te3b_gästbok_hugo_martinsson2.zip', 'Uploaded_Files/', 'Prgrm_2_Te3b', 'Henrik', '2019-01-10 10:21:13.000000', 'gästbok_hugo_martinsson2.zip'),
(11, '11.Prgrm_2_Te3b_SO Utbud Efterfrågan.docx', 'Uploaded_Files/', 'Prgrm_2_Te3b', 'Henrik', '2019-01-10 12:49:36.000000', 'SO Utbud efterfrågan');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `UserID` int(10) UNSIGNED NOT NULL,
  `Username` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `Password` varchar(255) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Name`, `Type`) VALUES
(3, 'lärare1', '123', 'Anders', 'teacher'),
(6, 'admin', '$2y$10$hLhABKEESq8UtZXIPPlcb.D9GZhjvc2lx7utWlfNQt2enYMHH1sXq', 'Hugo', NULL),
(7, 'Henrik', '$2y$10$ApDrdKjXH94ricKRDoA.GuBrP5/FQEJN1sj1oMj.o30uL3ozDfGmm', 'Henrik', NULL),
(10, 'Jokim', '$2y$10$LoVRFqJGGIWzQ/c69re7f.4lSqgBTFeVNzEdmap3siIHaRCIdMpHm', 'Joakim Malmgren', 'student'),
(11, 'huma0130', '$2y$10$Du0kXnsKchf3144CdJvSDuVmmoBEjYlAl2UhcVr8R6D5lAbuehWbW', 'Hugo Martinsson', 'student');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`);

--
-- Index för tabell `handin`
--
ALTER TABLE `handin`
  ADD PRIMARY KEY (`HandInID`);

--
-- Index för tabell `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NewsID`);

--
-- Index för tabell `studentfiles`
--
ALTER TABLE `studentfiles`
  ADD PRIMARY KEY (`FileID`);

--
-- Index för tabell `teacherfiles`
--
ALTER TABLE `teacherfiles`
  ADD PRIMARY KEY (`FileID`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `handin`
--
ALTER TABLE `handin`
  MODIFY `HandInID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `news`
--
ALTER TABLE `news`
  MODIFY `NewsID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT för tabell `studentfiles`
--
ALTER TABLE `studentfiles`
  MODIFY `FileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `teacherfiles`
--
ALTER TABLE `teacherfiles`
  MODIFY `FileID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
