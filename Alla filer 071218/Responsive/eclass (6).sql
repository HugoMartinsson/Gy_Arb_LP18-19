-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 21 mars 2019 kl 12:30
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
  `Name` varchar(50) NOT NULL,
  `Teacher` varchar(20) NOT NULL,
  `Students` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `courses`
--

INSERT INTO `courses` (`CourseID`, `Name`, `Teacher`, `Students`) VALUES
(1, 'Programmering_2_TE3', 'Henrik', 'huma0130, Gabriel, Joakim'),
(4, 'Nätverksteknologier_TE3', 'Henrik', 'Huma0130, Gabriel, Joakim'),
(5, 'Webbserverprogrammering_TE3', 'Henrik', 'Huma0130, Joakim, Gabriel'),
(6, 'Svenska_3_TE3B', 'Marja', 'Huma0130, Joakim, Gabriel'),
(7, 'Engelska_7_Jst', 'Jenny', 'Huma0130, Joakim, Gabriel'),
(8, 'Religion_1_TE3B', 'Marie', 'Huma0130, Gabriel, Joakim'),
(9, 'Matematik_5_TE3', 'Conny', 'Huma0130, Joakim, Gabriel');

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
(4, 'CISCO_LAB_1', 'Prgrm_2_Te3b'),
(5, 'Gästbok', 'Webbserverprogrammering_T'),
(6, 'Forum steg 1', 'Webbserverprogrammering_T'),
(7, 'Forum steg 2', 'Webbserverprogrammering_T'),
(8, 'Forum steg 3', 'Webbserverprogrammering_T'),
(9, 'Packet Tracer 7.1.5', 'Nätverksteknologier_TE3'),
(10, 'Talmanus', 'Svenska_3_TE3B'),
(11, 'Book Analysis', 'Engelska_7_Jst'),
(12, 'Polymorphem Up', 'Programmering_2_TE3');

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
(9, 'Prov', 'Prov idag!', 'Cisco', '2019-02-01 08:30:30'),
(10, 'Ingen lektion', 'Ingen lektion idag hej!', 'Nätverksteknologier_TE3', '2019-03-18 15:33:03'),
(11, 'Ingen lektion', 'WHAPPP', 'Programmering_2_TE3', '2019-03-18 15:51:26'),
(12, 'Datorer 21/3', 'Glöm inte att ta med er datorerna till lektionen idag 21/3 :)', 'Matematik_5_TE3', '2019-03-21 08:23:53'),
(13, 'Ingen lektion idag', 'Idag ska jag på studiebesök med tvåorna så lektionen är inställd! Ni läser texthäftet ni fick i torsdags!', 'Svenska_3_TE3B', '2019-03-21 08:36:42'),
(14, 'Finish the book', 'Remember you are supposed to have finished the book by Monday! :)))', 'Engelska_7_Jst', '2019-03-21 09:15:40');

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
(7, '7.PHP_LAB_1_APR2007_xinput_x64.cab', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'PHP_LAB_1', 'huma0130'),
(8, '8.PHP_LAB_1_', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'PHP_LAB_1', 'huma0130'),
(9, '9.PHP_LAB_1_forum_steg_4_hugo.zip', '/Uploaded_Files/', 'Prgrm_2_Te3b', 'PHP_LAB_1', 'Huma0130'),
(10, '10.Packet Tracer 7.1.5_6.3.1.8 Packet Tracer - Exp', '/Uploaded_Files/', 'Nätverksteknologier_TE3', 'Packet Tracer 7.1.5', 'Gabriel'),
(11, '11.Packet Tracer 7.1.5_', '/Uploaded_Files/', 'Nätverksteknologier_TE3', 'Packet Tracer 7.1.5', 'Gabriel'),
(12, '12.Talmanus_Uppgift Filhantering Programmering 2.p', '/Uploaded_Files/', 'Svenska_3_TE3B', 'Talmanus', 'Gabriel');

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
(18, '16.Webbserverprogrammering_T_ForumSteg1.pdf', 'Uploaded_Files/', 'Webbserverprogrammering_TE3', 'Henrik', '0000-00-00 00:00:00.000000', 'ForumSteg1.pdf'),
(19, '19.Webbserverprogrammering_T_ForumSteg2.pdf', 'Uploaded_Files/', 'Webbserverprogrammering_TE3', 'Henrik', '0000-00-00 00:00:00.000000', 'ForumSteg2.pdf'),
(20, '20.Webbserverprogrammering_T_ForumSteg3.pdf', 'Uploaded_Files/', 'Webbserverprogrammering_TE3', 'Henrik', '0000-00-00 00:00:00.000000', 'ForumSteg3.pdf'),
(22, '22.Matematik_5_TE3_formelblad_matematik_5.pdf', 'Uploaded_Files/', 'Matematik_5_TE3', 'Conny', '0000-00-00 00:00:00.000000', 'formelblad_matematik_5.pdf'),
(25, '23.Svenska_3_TE3B_HÅLLA TAL.docx', 'Uploaded_Files/', 'Svenska_3_TE3B', 'Marja', '2019-03-21 08:50:03.000000', 'HÅLLA TAL.docx'),
(26, '26.Svenska_3_TE3B_HT18 Sv3.docx', 'Uploaded_Files/', 'Svenska_3_TE3B', 'Marja', '2019-03-21 09:06:33.000000', 'HT18 Sv3.docx'),
(27, '27.Engelska_7_Jst_socratic-seminar-questions-on-to-kill-a-mockingbird (1).doc', 'Uploaded_Files/', 'Engelska_7_Jst', 'Jenny', '2019-03-21 09:16:21.000000', 'socratic-seminar-questions-on-to-kill-a-mockingbir');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `UserID` int(10) UNSIGNED NOT NULL,
  `Username` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `Password` varchar(255) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  `Backgroundid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Name`, `Type`, `Backgroundid`) VALUES
(6, 'admin', '$2y$10$hLhABKEESq8UtZXIPPlcb.D9GZhjvc2lx7utWlfNQt2enYMHH1sXq', 'Hugo', 'teacher', 0),
(7, 'Henrik', '$2y$10$ApDrdKjXH94ricKRDoA.GuBrP5/FQEJN1sj1oMj.o30uL3ozDfGmm', 'Henrik', 'teacher', 7),
(10, 'Jokim', '$2y$10$LoVRFqJGGIWzQ/c69re7f.4lSqgBTFeVNzEdmap3siIHaRCIdMpHm', 'Joakim Malmgren', 'student', 0),
(11, 'huma0130', '$2y$10$Du0kXnsKchf3144CdJvSDuVmmoBEjYlAl2UhcVr8R6D5lAbuehWbW', 'Hugo Martinsson', 'student', 5),
(12, 'Gabriel', '$2y$10$QvymILSwzcqtTZihfUQmv.VpIiZg71qtgPC2kg75cOPJ.qA6tg.UC', 'Gabriel Panarelii', 'student', 8),
(13, 'Joakim', '$2y$10$5TIjigErkZVbCxXoweIFnOuJtGLb4MQXwvhW.ecADZ2/VldCa6Rt.', 'Joakim Malmgren', 'student', 0),
(14, 'Jenny', '$2y$10$BrQwkTBI15pdSmZliSroy.j2XE8ncWkbRcygZdoVbxWXUjzD1c45O', 'Jenny Sundequist', 'teacher', 0),
(15, 'Conny', '$2y$10$e9rep7ya4v3wfCHu51sMturdo031P4slokIumQQZLPoDocSdLeyga', 'Conny Modig', 'teacher', 0),
(16, 'Marja', '$2y$10$OC72FafphiglRkraND/TvuTJr8VxhrY8c/scOhfpL6KRqvMNnsw.W', 'Marja Wigh', 'teacher', 0),
(17, 'Marie', '$2y$10$KJLfTH7VR10k.YtMFjgVPeD0m4W1qbhob8aBs5sHoXU9RLBOjMNf2', 'Marie Holgersson', 'teacher', 0);

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
  MODIFY `CourseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT för tabell `handin`
--
ALTER TABLE `handin`
  MODIFY `HandInID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT för tabell `news`
--
ALTER TABLE `news`
  MODIFY `NewsID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT för tabell `studentfiles`
--
ALTER TABLE `studentfiles`
  MODIFY `FileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT för tabell `teacherfiles`
--
ALTER TABLE `teacherfiles`
  MODIFY `FileID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
