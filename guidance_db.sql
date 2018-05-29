-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 08:18 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guidance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(2) NOT NULL,
  `sec_question` varchar(255) NOT NULL,
  `sec_ans` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(8) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cp_no` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `user_type`, `sec_question`, `sec_ans`, `fullname`, `dob`, `gender`, `address`, `cp_no`, `date_created`, `status`) VALUES
(99, 'user45', '$2y$10$ywZXyZsnVX4vJIHKtBV7qu1d1dOS3IQtXO/rlidhM8PmdcHZZygEy', 3, '', '', 'darwin c. pablo', '1998-01-22', 'male', '#234, Zone 1, Brgy. Pinili, San Jose City, N.E', '09753516933', '2018-03-07', 1),
(100, 'user2929', '$2y$10$6BV20hbrac9ZZP3wnOyz1uOXPg5uWjPrOHzK3O1n5goycBG9xPqAK', 2, 'What is the name of your favorite pet?', 'jordan', 'michael A. jordan', '2018-03-27', 'male', '#234, Zone 1, Brgy. Pinili, San Jose City, N.E', '09753516933', '2018-03-08', 1),
(101, 'usertest1', '$2y$10$NcGqWlQ6ZUUAc0NS.V7F1.rcPgarfLVXWVUVdAHr2fH.CA1QnCO3a', 2, 'What is your favorite movie?', 'starwars', 'jhon doeq', '2018-04-24', 'male', '#234, Zone 2, Porais, San Jose City, N.E', '09753516933', '2018-04-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(255) NOT NULL,
  `sec_question` varchar(255) NOT NULL,
  `sec_ans` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cp_no` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `user_type`, `sec_question`, `sec_ans`, `fullname`, `dob`, `gender`, `address`, `cp_no`) VALUES
(1, 'admin', '$2y$10$dA5auadMls3iECY0yvDO9uzYBiCSxuMTWaRZcycmsLQzq.MVFd2c2', 1, 'What is the name of your favorite pet?', 'bronzon', 'Darwin C. Pablo', '1998-04-15', 'male', '#494, zone 2, Porais, San Jose City, Nueva Ecija', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `all_sec`
--

CREATE TABLE `all_sec` (
  `id` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_sec`
--

INSERT INTO `all_sec` (`id`, `section`, `adviser`) VALUES
(10, 'ANTIPOLO', 'FSR Cruz'),
(11, 'BACOLOD', 'HTBautista'),
(12, 'BAGUIO', 'RT Ariola'),
(13, 'BALER', 'AD Del Rosario'),
(14, 'BANAUE', 'RM Flores'),
(18, 'AMETHYST', 'LR Villanueva'),
(19, 'CITRINE', 'RVL Antolin'),
(20, 'CORAL', 'J Quiambao'),
(22, 'ACHIEVER', 'JC Lauriaga'),
(23, 'ADVENTURER', 'RB Baltazar'),
(24, 'BELIEVER', 'MS Yuzon'),
(25, 'DISCOVERER', 'CC Daypo'),
(30, 'ACTS', 'HB Cabie'),
(31, 'ARISTOTLE', 'MDC Domingo'),
(36, 'EMERALD', 'MA Domingo'),
(37, 'DIAMOND', 'JC Soriano'),
(38, 'FOLLOWER', 'GB Valdez'),
(39, 'EXPLORER', 'AMC Hidalgo'),
(40, 'BATANES', 'CAM Latina'),
(41, 'BOHOL', 'MLS MariÃ±as'),
(42, 'BORACAY', 'EA Yra'),
(43, 'CAMIGUIN', 'KM Espejo'),
(44, 'CEBU', 'RT Bandibas'),
(45, 'CORRIGIDOR', 'NT Domingo'),
(46, 'DAVAO', 'EL Peralta'),
(47, 'DUMAGUETE', 'MAB Baltazar'),
(48, 'EINSTEIN ', 'MVG Daileg'),
(49, 'EL NIDO', 'AA CasiÃ±o'),
(50, 'LAOAG', 'JAL Santos'),
(51, 'MACTAN', 'AJ Culala'),
(52, 'PAGSANJAN', 'JC Garcia'),
(53, 'PUERTO GALLERA', 'GM Pascual'),
(54, 'PUERTO PRINCESA', 'RM Mateo'),
(55, 'SPFL', 'RM Ramos'),
(56, 'SPA', 'CF Anaud'),
(57, 'SUBIC', 'ADC Rayos'),
(58, 'TAGAYTAY', 'EJ Bulawit'),
(59, 'VIGAN', 'GM Malunay'),
(60, 'GARNET', 'CR Mina'),
(61, 'IVORY', 'FR Marcelo'),
(62, 'JADE ', 'GC Tolentino'),
(63, 'JASPER', 'SJ Garcia'),
(64, 'LARIMAR', 'OR Nimes'),
(65, 'MOONSTONE', 'MHS Alejo'),
(66, 'NEWTON', 'V Santiago'),
(67, 'ONYX', 'RA Fedelis'),
(68, 'PEARL', 'D Monteagudo'),
(69, 'ROSE QUARTZ', 'PGC Valdez'),
(70, 'RUBY', 'GR Roldan'),
(71, 'SAPPHIRE', 'CP Sagun'),
(72, 'SHELL', 'M Palino'),
(73, 'SPA', 'CF Anaud'),
(74, 'SPFL', 'RM Ramos'),
(75, 'TANZANITE', 'CC Daypo'),
(76, 'TOPAZ', 'AJ Fernandez'),
(77, 'TOURMALINE', 'N Jasmine'),
(78, 'TURQUOISE', 'CG Verdoz'),
(79, 'DREAMER', 'VGL Soriano'),
(80, 'EXPOUNDER', 'MF Marquez'),
(81, 'GALILEO', 'JG Pablo'),
(82, 'GATHERER', 'AMD Samonte'),
(83, 'INVADER', 'MB Gonzales'),
(84, 'MANAGER', 'DR Francisco'),
(85, 'MODERNIZER', 'MS Gomez'),
(86, 'OBSERVER', 'M Villanueva'),
(87, 'ORGANIZER', 'RB Almirol'),
(88, 'PEACEKEEPER', 'MB Sison'),
(89, 'PERFORMER', 'RF Majaducon'),
(90, 'PROCESSER', 'MR Salvador'),
(91, 'RESEARCHER', 'JN Macadangdang'),
(92, 'SEEKER', 'CS Vicmudo'),
(93, 'SPA', 'CF Anaud'),
(94, 'STUNNER', 'EC Videz'),
(95, 'TRAILBLAZER', 'LL Simon Jr'),
(96, 'VOYAGER', 'ARQuiambao Jr.'),
(97, 'CHRONICLES', 'GGS Canda'),
(98, 'COLOSSIANS', 'EB Vizon'),
(99, 'CORINTHIANS', 'VMRigor'),
(100, 'ECCLESIASTES', 'LP Cabrillas'),
(101, 'EPHESIANS', 'MES Anicoche'),
(102, 'EXODUS', 'JC Allas'),
(103, 'GALATIANS', 'A Mejia'),
(104, 'GENESIS', 'IR Macabante'),
(105, 'HEBREWS', 'AV Lucas'),
(106, 'JUDGES', 'MMC Dasalla'),
(107, 'KINGS', 'HJ Pedro'),
(108, 'LEVITICUS', 'RG Arazas'),
(109, 'PHILIPPIANS', 'HR Santos'),
(110, 'PROVERBS', 'SS Cruz'),
(111, 'PSALMS', 'JAA Antalan'),
(112, 'ROMANS', 'MDC Lopez'),
(113, 'SPA', 'CF Anaud'),
(114, 'THESSALONIANS', 'CR Padilla');

-- --------------------------------------------------------

--
-- Table structure for table `all_violation`
--

CREATE TABLE `all_violation` (
  `violation_id` int(255) NOT NULL,
  `violation` varchar(255) NOT NULL,
  `violation_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_violation`
--

INSERT INTO `all_violation` (`violation_id`, `violation`, `violation_type`) VALUES
(1, 'smoking', 'major'),
(5, 'loitering', 'minor'),
(6, 'Gang Related Activities', 'major'),
(7, 'Gambling', 'major'),
(9, 'Improper Uniform', 'minor'),
(10, 'Absentism', 'major'),
(11, 'Alcohol Drinking', 'major'),
(12, 'Assault', 'major'),
(13, 'Bullying', 'major'),
(14, 'Cheating', 'major'),
(15, 'Extortion', 'major'),
(16, 'Fighting', 'major'),
(17, 'Forgery', 'major'),
(18, 'Indecent Exposure/Acts', 'major'),
(19, 'Insubordination', 'major'),
(20, 'Loitering', 'major'),
(21, 'Open Defiance', 'major'),
(22, 'Possession/Use of Drug  or Paraphernalia', 'major'),
(23, 'Possession of Deadly Weapon', 'major'),
(24, 'Theft', 'major'),
(25, 'Truancy', 'major'),
(26, 'Unauthorized or improper use of school properties', 'major'),
(27, 'Vandalism', 'major'),
(28, 'Classroom Disruption', 'minor'),
(29, 'Improper Uniform', 'minor'),
(30, 'Improper Haircut/Haircolor', 'minor'),
(31, 'Not wearing of ID', 'minor'),
(32, 'Tardiness', 'minor'),
(33, 'Technology /Cellular Phones, Radios (misuse/abuse/using inaapropriate times)', 'minor');

-- --------------------------------------------------------

--
-- Table structure for table `g7_advisers`
--

CREATE TABLE `g7_advisers` (
  `g7_adviser_id` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g7_advisers`
--

INSERT INTO `g7_advisers` (`g7_adviser_id`, `section`, `adviser`, `date_added`) VALUES
(10, 'ANTIPOLO', 'FSR Cruz', '2018-05-08'),
(11, 'BACOLOD', 'HTBautista', '2018-05-10'),
(12, 'BAGUIO', 'RT Ariola', '2018-05-10'),
(13, 'BALER', 'AD Del Rosario', '2018-05-10'),
(14, 'BANAUE', 'RM Flores', '2018-05-10'),
(15, 'BATANES', 'CAM Latina', '2018-05-10'),
(16, 'BOHOL', 'MLS MariÃ±as', '2018-05-10'),
(17, 'BORACAY', 'EA Yra', '2018-05-10'),
(18, 'CAMIGUIN', 'KM Espejo', '2018-05-10'),
(19, 'CEBU', 'RT Bandibas', '2018-05-10'),
(20, 'CORRIGIDOR', 'NT Domingo', '2018-05-10'),
(21, 'DAVAO', 'EL Peralta', '2018-05-10'),
(22, 'DUMAGUETE', 'MAB Baltazar', '2018-05-10'),
(23, 'EINSTEIN ', 'MVG Daileg', '2018-05-10'),
(24, 'EL NIDO', 'AA CasiÃ±o', '2018-05-10'),
(25, 'LAOAG', 'JAL Santos', '2018-05-10'),
(26, 'MACTAN', 'AJ Culala', '2018-05-10'),
(27, 'PAGSANJAN', 'JC Garcia', '2018-05-10'),
(28, 'PUERTO GALLERA', 'GM Pascual', '2018-05-10'),
(29, 'PUERTO PRINCESA', 'RM Mateo', '2018-05-10'),
(30, 'SPA', 'EA Arenas', '2018-05-10'),
(31, 'SPFL', 'MC Bermudes', '2018-05-10'),
(32, 'SUBIC', 'ADC Rayos', '2018-05-10'),
(33, 'TAGAYTAY', 'EJ Bulawit', '2018-05-10'),
(34, 'VIGAN', 'GM Malunay', '2018-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `g8_advisers`
--

CREATE TABLE `g8_advisers` (
  `g8_adviser_id` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g8_advisers`
--

INSERT INTO `g8_advisers` (`g8_adviser_id`, `section`, `adviser`, `date_added`) VALUES
(2, 'AMETHYST', 'LR Villanueva', '2018-05-09'),
(3, 'CITRINE', 'RVL Antolin', '2018-05-10'),
(4, 'CORAL', 'J Quiambao', '2018-05-10'),
(5, 'DIAMOND', 'JC Soriano', '2018-05-10'),
(6, 'EMERALD', 'MA Domingo', '2018-05-10'),
(7, 'GARNET', 'CR Mina', '2018-05-10'),
(8, 'IVORY', 'FR Marcelo', '2018-05-10'),
(9, 'JADE ', 'GC Tolentino', '2018-05-10'),
(10, 'JASPER', 'SJ Garcia', '2018-05-10'),
(11, 'LARIMAR', 'OR Nimes', '2018-05-10'),
(12, 'MOONSTONE', 'MHS Alejo', '2018-05-10'),
(13, 'NEWTON', 'V Santiago', '2018-05-10'),
(14, 'ONYX', 'RA Fedelis', '2018-05-10'),
(15, 'PEARL', 'D Monteagudo', '2018-05-10'),
(16, 'ROSE QUARTZ', 'PGC Valdez', '2018-05-10'),
(17, 'RUBY', 'GR Roldan', '2018-05-10'),
(18, 'SAPPHIRE', 'CP Sagun', '2018-05-10'),
(19, 'SHELL', 'M Palino', '2018-05-10'),
(20, 'SPA', 'CF Anaud', '2018-05-10'),
(21, 'SPFL', 'RM Ramos', '2018-05-10'),
(22, 'TANZANITE', 'CC Daypo', '2018-05-10'),
(23, 'TOPAZ', 'AJ Fernandez', '2018-05-10'),
(24, 'TOURMALINE', 'N Jasmine', '2018-05-10'),
(25, 'TURQUOISE', 'CG Verdoz', '2018-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `g9_advisers`
--

CREATE TABLE `g9_advisers` (
  `g9_adviser_id` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g9_advisers`
--

INSERT INTO `g9_advisers` (`g9_adviser_id`, `section`, `adviser`, `date_added`) VALUES
(2, 'ACHIEVER', 'JC Lauriaga', '2018-05-09'),
(3, 'ADVENTURER', 'RB Baltazar', '2018-05-10'),
(4, 'BELIEVER', 'MS Yuzon', '2018-05-10'),
(5, 'DISCOVERER', 'CC Daypo', '2018-05-10'),
(6, 'DREAMER', 'VGL Soriano', '2018-05-10'),
(7, 'EXPLORER', 'AMC Hidalgo', '2018-05-10'),
(8, 'EXPOUNDER', 'MF Marquez', '2018-05-10'),
(9, 'FOLLOWER', 'GB Valdez', '2018-05-10'),
(10, 'GALILEO', 'JG Pablo', '2018-05-10'),
(11, 'GATHERER', 'AMD Samonte', '2018-05-10'),
(12, 'INVADER', 'MB Gonzales', '2018-05-10'),
(13, 'MANAGER', 'DR Francisco', '2018-05-10'),
(14, 'MODERNIZER', 'MS Gomez', '2018-05-10'),
(15, 'OBSERVER', 'M Villanueva', '2018-05-10'),
(16, 'ORGANIZER', 'RB Almirol', '2018-05-10'),
(17, 'PEACEKEEPER', 'MB Sison', '2018-05-10'),
(18, 'PERFORMER', 'RF Majaducon', '2018-05-10'),
(19, 'PROCESSER', 'MR Salvador', '2018-05-10'),
(20, 'RESEARCHER', 'JN Macadangdang', '2018-05-10'),
(21, 'SEEKER', 'CS Vicmudo', '2018-05-10'),
(22, 'SPA  ', 'GL Pobre', '2018-05-10'),
(24, 'STUNNER', 'EC Videz', '2018-05-10'),
(25, 'TRAILBLAZER', 'LL Simon Jr', '2018-05-10'),
(26, 'VOYAGER', 'ARQuiambao Jr.', '2018-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `g10_advisers`
--

CREATE TABLE `g10_advisers` (
  `g10_adviser_id` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g10_advisers`
--

INSERT INTO `g10_advisers` (`g10_adviser_id`, `section`, `adviser`, `date_added`) VALUES
(2, 'ACTS', 'HB Cabie', '2018-05-09'),
(3, 'ARISTOTLE', 'MDC Domingo', '2018-05-10'),
(4, 'CHRONICLES', 'GGS Canda', '2018-05-10'),
(5, 'COLOSSIANS', 'EB Vizon', '2018-05-10'),
(6, 'CORINTHIANS', 'VMRigor', '2018-05-10'),
(7, 'ECCLESIASTES', 'LP Cabrillas', '2018-05-10'),
(8, 'EXODUS', 'JC Allas', '2018-05-10'),
(9, 'GALATIANS', 'A Mejia', '2018-05-10'),
(10, 'GENESIS', 'IR Macabante', '2018-05-10'),
(11, 'HEBREWS', 'AV Lucas', '2018-05-10'),
(12, 'JUDGES', 'MMC Dasalla', '2018-05-10'),
(13, 'KINGS', 'HJ Pedro', '2018-05-10'),
(14, 'PHILIPPIANS', 'HR Santos', '2018-05-10'),
(15, 'PROVERBS', 'SS Cruz', '2018-05-10'),
(16, 'PSALMS', 'JAA Antalan', '2018-05-10'),
(17, 'ROMANS', 'MDC Lopez', '2018-05-10'),
(18, 'SPA', 'MAG Yagin', '2018-05-10'),
(19, 'THESSALONIANS', 'CR Padilla', '2018-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `grd7`
--

CREATE TABLE `grd7` (
  `grd7_id` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grd7`
--

INSERT INTO `grd7` (`grd7_id`, `section`, `adviser`) VALUES
(13, 'ANTIPOLO', 'FSR Cruz'),
(14, 'BACOLOD', 'HTBautista'),
(15, 'BAGUIO', 'RT Ariola'),
(16, 'BALER', 'AD Del Rosario'),
(17, 'BANAUE', 'RM Flores'),
(18, 'BATANES', 'CAM Latina'),
(19, 'BOHOL', 'MLS MariÃ±as'),
(20, 'BORACAY', 'EA Yra'),
(21, 'CAMIGUIN', 'KM Espejo'),
(22, 'CEBU', 'RT Bandibas'),
(23, 'CORRIGIDOR', 'NT Domingo'),
(24, 'DAVAO', 'EL Peralta'),
(25, 'DUMAGUETE', 'MAB Baltazar'),
(26, 'EINSTEIN ', 'MVG Daileg'),
(27, 'EL NIDO', 'AA CasiÃ±o'),
(28, 'LAOAG', 'JAL Santos'),
(29, 'MACTAN', 'AJ Culala'),
(30, 'PAGSANJAN', 'JC Garcia'),
(31, 'PUERTO GALLERA', 'GM Pascual'),
(32, 'PUERTO PRINCESA', 'RM Mateo'),
(33, 'SPFL', 'MC Bermudes'),
(34, 'SPA', 'EA Arenas'),
(35, 'SUBIC', 'ADC Rayos'),
(36, 'TAGAYTAY', 'EJ Bulawit'),
(37, 'VIGAN', 'GM Malunay');

-- --------------------------------------------------------

--
-- Table structure for table `grd8`
--

CREATE TABLE `grd8` (
  `grd8_id` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grd8`
--

INSERT INTO `grd8` (`grd8_id`, `section`, `adviser`) VALUES
(9, 'AMETHYST', 'LR Villanueva'),
(10, 'CITRINE', 'RVL Antolin'),
(11, 'CORAL', 'J Quiambao'),
(12, 'EMERALD', 'MA Domingo'),
(13, 'DIAMOND', 'JC Soriano'),
(14, 'GARNET', 'CR Mina'),
(15, 'IVORY', 'FR Marcelo'),
(16, 'JADE ', 'GC Tolentino'),
(17, 'JASPER', 'SJ Garcia'),
(18, 'LARIMAR', 'OR Nimes'),
(19, 'MOONSTONE', 'MHS Alejo'),
(20, 'NEWTON', 'V Santiago'),
(21, 'ONYX', 'RA Fedelis'),
(22, 'PEARL', 'D Monteagudo'),
(23, 'ROSE QUARTZ', 'PGC Valdez'),
(24, 'RUBY', 'GR Roldan'),
(25, 'SAPPHIRE', 'CP Sagun'),
(26, 'SHELL', 'M Palino'),
(27, 'SPA', 'CF Anaud'),
(28, 'SPFL', 'RM Ramos'),
(29, 'TANZANITE', 'CC Daypo'),
(30, 'TOPAZ', 'AJ Fernandez'),
(31, 'TOURMALINE', 'N Jasmine'),
(32, 'TURQUOISE', 'CG Verdoz');

-- --------------------------------------------------------

--
-- Table structure for table `grd9`
--

CREATE TABLE `grd9` (
  `grd9_id` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grd9`
--

INSERT INTO `grd9` (`grd9_id`, `section`, `adviser`) VALUES
(6, 'ACHIEVER', 'JC Lauriaga'),
(7, 'ADVENTURER', 'RB Baltazar'),
(8, 'BELIEVER', 'MS Yuzon'),
(9, 'DISCOVERER', 'CC Daypo'),
(10, 'FOLLOWER', 'GB Valdez'),
(11, 'EXPLORER', 'AMC Hidalgo'),
(12, 'DREAMER', 'VGL Soriano'),
(13, 'EXPOUNDER', 'MF Marquez'),
(14, 'GALILEO', 'JG Pablo'),
(15, 'GATHERER', 'AMD Samonte'),
(16, 'INVADER', 'MB Gonzales'),
(17, 'MANAGER', 'DR Francisco'),
(18, 'MODERNIZER', 'MS Gomez'),
(19, 'OBSERVER', 'M Villanueva'),
(20, 'ORGANIZER', 'RB Almirol'),
(21, 'PEACEKEEPER', 'MB Sison'),
(22, 'PERFORMER', 'RF Majaducon'),
(23, 'PROCESSER', 'MR Salvador'),
(24, 'RESEARCHER', 'JN Macadangdang'),
(25, 'SEEKER', 'CS Vicmudo'),
(26, 'SPA  ', 'GL Pobre'),
(27, 'STUNNER', 'EC Videz'),
(28, 'TRAILBLAZER', 'LL Simon Jr'),
(29, 'VOYAGER', 'ARQuiambao Jr.');

-- --------------------------------------------------------

--
-- Table structure for table `grd10`
--

CREATE TABLE `grd10` (
  `grd10_id` int(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grd10`
--

INSERT INTO `grd10` (`grd10_id`, `section`, `adviser`) VALUES
(10, 'ACTS', 'HB Cabie'),
(11, 'ARISTOTLE', 'MDC Domingo'),
(12, 'CHRONICLES', 'GGS Canda'),
(13, 'COLOSSIANS', 'EB Vizon'),
(14, 'CORINTHIANS', 'VMRigor'),
(15, 'ECCLESIASTES', 'LP Cabrillas'),
(16, 'EPHESIANS', 'MES Anicoche'),
(17, 'EXODUS', 'JC Allas'),
(18, 'GALATIANS', 'A Mejia'),
(19, 'GENESIS', 'IR Macabante'),
(20, 'HEBREWS', 'AV Lucas'),
(21, 'JUDGES', 'MMC Dasalla'),
(22, 'KINGS', 'HJ Pedro'),
(23, 'LEVITICUS', 'RG Arazas'),
(24, 'PHILIPPIANS', 'HR Santos'),
(25, 'PROVERBS', 'SS Cruz'),
(26, 'PSALMS', 'JAA Antalan'),
(27, 'ROMANS', 'MDC Lopez'),
(28, 'SPA', 'MAG Yagin'),
(29, 'THESSALONIANS', 'CR Padilla');

-- --------------------------------------------------------

--
-- Table structure for table `other_sch`
--

CREATE TABLE `other_sch` (
  `school_id` int(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `other_sch_name` varchar(255) NOT NULL,
  `other_sy` varchar(45) NOT NULL,
  `other_grd` varchar(255) NOT NULL,
  `other_sec` varchar(45) NOT NULL,
  `other_cls_ad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_sch`
--

INSERT INTO `other_sch` (`school_id`, `lrn`, `other_sch_name`, `other_sy`, `other_grd`, `other_sec`, `other_cls_ad`) VALUES
(1, '433255675675', 'Pinili National High', '2011-2012', '7', 'Galileo', 'Joselito byro'),
(2, '121212121222', 'Pinili National High', '2010-2014', '7', 'Galileo', 'Joselito byro');

-- --------------------------------------------------------

--
-- Table structure for table `std_prf`
--

CREATE TABLE `std_prf` (
  `student_id` int(255) NOT NULL,
  `lrn` varchar(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `age` int(2) NOT NULL,
  `gen` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `nat` varchar(45) NOT NULL,
  `rel` varchar(45) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `tel` varchar(45) NOT NULL,
  `fathers_name` varchar(255) NOT NULL,
  `fathers_age` varchar(2) NOT NULL,
  `fathers_occu` varchar(255) NOT NULL,
  `mothers_name` varchar(255) NOT NULL,
  `mothers_age` int(2) NOT NULL,
  `mothers_occu` varchar(255) NOT NULL,
  `no_of_child` int(2) NOT NULL,
  `no_of_boys` int(2) NOT NULL,
  `no_of_girls` int(2) NOT NULL,
  `sib_pos` varchar(45) NOT NULL,
  `lvg_whom` varchar(45) NOT NULL,
  `elem_school` varchar(255) NOT NULL,
  `elem_sy` varchar(45) NOT NULL,
  `num_of_violation` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_prf`
--

INSERT INTO `std_prf` (`student_id`, `lrn`, `full_name`, `age`, `gen`, `dob`, `nat`, `rel`, `addr`, `tel`, `fathers_name`, `fathers_age`, `fathers_occu`, `mothers_name`, `mothers_age`, `mothers_occu`, `no_of_child`, `no_of_boys`, `no_of_girls`, `sib_pos`, `lvg_whom`, `elem_school`, `elem_sy`, `num_of_violation`) VALUES
(2, '121212121222', 'Elmer Santiago', 12, 'male', '1998-02-18', 'filipino', 'catholic', '#234, Zone 2, Porais, San Jose City, N.E', '09293990165', 'Joseph Santiago', '30', 'farmer', 'Emily Santiago', 30, 'teacher', 2, 1, 1, 'elder', 'grandmother', 'Pinili Elementary School', '2010-2011', 7),
(3, '343346224232', 'Justine Dela Cruz', 15, 'male', '2018-07-19', 'Filipino', 'catholic', '#234, Zone 1, Brgy. Pinili, San Jose City, N.E', '09218885329', 'Jayson  Dela Cruz', '56', 'farmer', 'Joycel  Dela Cruz', 55, 'housewife', 8, 5, 3, '2', 'parents', 'Pinili Elementary School', '2013-2014', 3),
(4, '152637283912', 'Jan Carlo Garcia', 14, 'male', '2018-04-18', 'Filipino', 'catholic', '#234, Zone 2, Porais, San Jose City, N.E', '09365448716', 'Ronie Garcia', '43', 'farmer', 'Joycel Garcia', 40, 'teacher', 2, 2, 0, '2', 'parents', 'porais elementary school', '2009-2010', 5),
(5, '127465422473', 'Joseph Gonzalez', 15, 'male', '2002-03-21', 'filipino', 'catholic', '#234, Zone 1, Brgy. Pinili, San Jose City, N.E', '09154292610', 'Baron Gonzalez', '48', 'farmer', 'Jenny Gonzalez', 46, 'housewife', 3, 2, 1, 'elder', 'parents', 'Porais Elementary  School', '2010-2011', 3),
(6, '433255675675', 'Rafael Delizo', 15, 'male', '2003-03-19', 'Filipino', 'catholic', '#234, Zone 2, Porais, San Jose City, N.E', '09365173136', 'Efren Delizo', '58', 'farmer', 'Emily Delizo', 57, 'housewife', 4, 2, 2, 'elder', 'parents', 'Porais Elementary  School', '2013-2014', 3);

-- --------------------------------------------------------

--
-- Table structure for table `std_violation`
--

CREATE TABLE `std_violation` (
  `violation_id` int(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `violation` varchar(255) NOT NULL,
  `v_grd` varchar(45) NOT NULL,
  `v_sec` varchar(45) NOT NULL,
  `v_type` varchar(255) NOT NULL,
  `v_date` date NOT NULL,
  `rfc_bk` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_violation`
--

INSERT INTO `std_violation` (`violation_id`, `lrn`, `violation`, `v_grd`, `v_sec`, `v_type`, `v_date`, `rfc_bk`, `status`) VALUES
(5, '343346224232', 'smoking', '9', 'FOLLOWER', 'major', '2018-02-23', 'G7 p300', 1),
(7, '343346224232', 'Gang Related Activities', '7', 'ANTIPOLO', 'major', '2018-03-21', 'G7 259', 1),
(9, '152637283912', 'Gang Related Activities', '7', 'SPFL', 'major', '2018-06-07', 'G7 p300', 1),
(10, '152637283912', 'Gambling', '8', 'SPFL', 'major', '2018-06-20', 'G7 p258', 1),
(11, '152637283912', 'smoking', '9', 'SPA', 'major', '2018-06-07', 'G7 p258', 1),
(12, '152637283912', 'loitering', '10', 'SPA', 'minor', '2018-08-21', 'G7 p300', 1),
(13, '433255675675', 'Technology /Cellular Phones, Radios (misuse/abuse/using inaapropriate times)', '7', 'SPA', 'minor', '2018-03-14', 'G7 p300', 1),
(16, '152637283912', 'Bullying', '7', 'ANTIPOLO', 'major', '2018-03-05', 'G7 p200', 0),
(28, '343346224232', 'Gambling', '8', 'RUBY', 'major', '2017-08-23', 'G7 p300', 0),
(40, '121212121222', 'smoking', '7', 'BOHOL', 'major', '2018-05-12', 'bag2018', 0),
(41, '433255675675', 'Gambling', '8', 'MOONSTONE', 'major', '2019-02-01', 'bag2019', 0),
(42, '121212121222', 'smoking', '8', 'SPA', 'major', '2020-01-01', 'G7 p300', 0),
(43, '121212121222', 'loitering', '7', 'SPA', 'minor', '2020-01-22', 'G7 p250', 1),
(48, '127465422473', 'Absentism', '7', 'LAOAG', 'major', '2020-05-06', 'G7 p300', 0),
(49, '127465422473', 'Absentism', '9', 'PROCESSER', 'major', '2018-05-03', 'G7 p258', 0),
(50, '127465422473', 'Unauthorized or improper use of school properties', '8', 'ROSE', 'major', '2023-05-31', 'G7 p300', 0),
(51, '433255675675', 'Vandalism', '10', 'SPA', 'major', '2020-05-28', 'G7 p259', 0),
(52, '121212121222', 'SMOKING', '7', 'DUMAGUETE', 'major', '2018-05-16', 'G7 p300', 1),
(53, '121212121222', 'loitering', '9', 'MODERNIZER', 'minor', '2018-05-16', 'G7 p300', 1),
(54, '121212121222', 'smoking', '8', 'ONYX', 'major', '2018-05-16', 'G7 p300', 1),
(55, '121212121222', 'Gang Related Activities', '8', 'PEARL', 'major', '2018-05-16', 'G7 p300', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_sec`
--
ALTER TABLE `all_sec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_violation`
--
ALTER TABLE `all_violation`
  ADD PRIMARY KEY (`violation_id`);

--
-- Indexes for table `g7_advisers`
--
ALTER TABLE `g7_advisers`
  ADD PRIMARY KEY (`g7_adviser_id`);

--
-- Indexes for table `g8_advisers`
--
ALTER TABLE `g8_advisers`
  ADD PRIMARY KEY (`g8_adviser_id`);

--
-- Indexes for table `g9_advisers`
--
ALTER TABLE `g9_advisers`
  ADD PRIMARY KEY (`g9_adviser_id`);

--
-- Indexes for table `g10_advisers`
--
ALTER TABLE `g10_advisers`
  ADD PRIMARY KEY (`g10_adviser_id`);

--
-- Indexes for table `grd7`
--
ALTER TABLE `grd7`
  ADD PRIMARY KEY (`grd7_id`);

--
-- Indexes for table `grd8`
--
ALTER TABLE `grd8`
  ADD PRIMARY KEY (`grd8_id`);

--
-- Indexes for table `grd9`
--
ALTER TABLE `grd9`
  ADD PRIMARY KEY (`grd9_id`);

--
-- Indexes for table `grd10`
--
ALTER TABLE `grd10`
  ADD PRIMARY KEY (`grd10_id`);

--
-- Indexes for table `other_sch`
--
ALTER TABLE `other_sch`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `std_prf`
--
ALTER TABLE `std_prf`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `std_violation`
--
ALTER TABLE `std_violation`
  ADD PRIMARY KEY (`violation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_sec`
--
ALTER TABLE `all_sec`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `all_violation`
--
ALTER TABLE `all_violation`
  MODIFY `violation_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `g7_advisers`
--
ALTER TABLE `g7_advisers`
  MODIFY `g7_adviser_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `g8_advisers`
--
ALTER TABLE `g8_advisers`
  MODIFY `g8_adviser_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `g9_advisers`
--
ALTER TABLE `g9_advisers`
  MODIFY `g9_adviser_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `g10_advisers`
--
ALTER TABLE `g10_advisers`
  MODIFY `g10_adviser_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `grd7`
--
ALTER TABLE `grd7`
  MODIFY `grd7_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `grd8`
--
ALTER TABLE `grd8`
  MODIFY `grd8_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `grd9`
--
ALTER TABLE `grd9`
  MODIFY `grd9_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `grd10`
--
ALTER TABLE `grd10`
  MODIFY `grd10_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `other_sch`
--
ALTER TABLE `other_sch`
  MODIFY `school_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `std_prf`
--
ALTER TABLE `std_prf`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `std_violation`
--
ALTER TABLE `std_violation`
  MODIFY `violation_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
