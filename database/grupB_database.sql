-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2016 at 03:55 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectxray2`
--

-- --------------------------------------------------------

--
-- Table structure for table `anomalia`
--

CREATE TABLE `anomalia` (
  `codian` int(11) NOT NULL,
  `noman` varchar(40) COLLATE utf8_bin NOT NULL,
  `descan` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `anomalia`
--

INSERT INTO `anomalia` (`codian`, `noman`, `descan`) VALUES
(1, 'Pírcings', ''),
(2, 'Arracades', ''),
(3, 'Pròtesis', ''),
(4, 'Ortodòncia', ''),
(5, 'Implants', ''),
(6, 'Elèctrodes', ''),
(7, 'Metralla', ''),
(8, 'Llimadures metàl·liques', ''),
(9, 'Marcapassos', ''),
(10, 'Altres objectes hospitalaris', ''),
(11, 'Altres objectes personals', '');

-- --------------------------------------------------------

--
-- Table structure for table `centratge`
--

CREATE TABLE `centratge` (
  `centratge_id` int(10) NOT NULL,
  `centratge_nom` varchar(60) COLLATE utf8_bin NOT NULL,
  `os_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `centratge`
--

INSERT INTO `centratge` (`centratge_id`, `centratge_nom`, `os_id`) VALUES
(1, 'Falange proximal', 1),
(2, 'Meitat del tercer metatarsià', 2),
(3, 'Meitat del peu', 2),
(4, 'Meitat dels dos peus', 3),
(5, 'Meitat del pont', 3),
(6, 'Meitat primera i segona art. Metatarsofalàngica', 4),
(7, 'Meitat calcani', 5),
(8, 'Mal·lèols', 6),
(9, 'Mal·lèol tibial', 6),
(10, 'Mal·lèol peroneal', 6),
(11, 'Mig turmell', 6),
(12, 'Articulació subastragalina', 6),
(13, 'Diàfisi tibial', 7),
(14, 'Pol inferior ròtula', 8),
(15, 'Forat poplítia', 8),
(16, 'Entre els dos genolls', 9),
(17, 'Còndils femorals', 9),
(18, 'Pol inferior ròtula', 10),
(19, 'Diàfisi femoral', 11),
(20, 'Angonal', 12),
(21, 'Angonal', 13),
(22, 'Meitat zona pèlvica', 14),
(23, '3 dits sota crestes il·líaques', 15),
(24, 'Crestes il·líaques', 15),
(25, 'Crestes il·líaques', 16),
(26, 'Línia mamària', 17),
(27, 'Línia axil·lomamària', 17),
(28, 'Nou', 18),
(29, 'Meitat de la boca', 18),
(30, 'Línia mitja sagital', 19),
(31, 'Crestes il·líaques', 19),
(32, 'Estèrnum', 20),
(33, 'Línia axil·lomamària', 20),
(34, 'Meitat del pit', 21),
(35, 'Línia axil·lomamària', 21),
(36, 'Línia axil·lomamària i 4 dits anterior', 22),
(37, 'Mig clavícula', 23),
(38, 'Mig escàpula', 24),
(39, 'Art. Acromio-clavicular', 25),
(40, 'Art. Acromio-clavicular', 26),
(41, 'Aixella', 26),
(42, 'Fosa supraespinosa', 26),
(43, 'Fosa glenoidea', 26),
(44, 'Diàfisi humeral', 27),
(45, '8 dits sota axil·la', 27),
(46, 'Flexora colze', 28),
(47, 'Mig colze', 28),
(48, 'Epicòndil', 28),
(49, 'Mig avantbraç', 29),
(50, 'Flexora canell', 30),
(51, 'Estiloides radial', 30),
(52, 'Mig carp', 30),
(53, 'Mig mà', 31),
(54, 'Mig dits', 32),
(55, 'Protuberància occipital ext', 33),
(56, '2cm davant CAE i 2cm per damunt', 33),
(57, 'Entrada cabell', 33),
(58, 'Sota mentó', 33),
(59, '4 dits sobre protuberància occipital ext', 34),
(60, 'Òrbita', 34),
(61, 'Arc zigomàtic', 35),
(62, 'Protuberància occipital ext', 36),
(63, 'Mig nas', 36),
(64, 'Protuberància cranial', 37),
(65, 'Sota orella', 38),
(66, 'Zona bucal', 39),
(67, '2cm davant CAE i 2cm per damunt', 40),
(68, '2cm davant CAE i 2cm per damunt', 41),
(69, '2cm davant CAE i 2cm per damunt', 42),
(70, '2cm davant CAE i 2cm per damunt', 43),
(71, 'Automàtic', 44),
(72, 'Automàtic', 45);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classid` int(11) NOT NULL,
  `classname` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `creationdate` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `curs`
--

CREATE TABLE `curs` (
  `curs_id` int(11) NOT NULL,
  `anyInici` year(4) NOT NULL,
  `anyFI` year(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `curs`
--

INSERT INTO `curs` (`curs_id`, `anyInici`, `anyFI`) VALUES
(4, 2016, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `disseny`
--

CREATE TABLE `disseny` (
  `disseny_id` int(11) NOT NULL,
  `nomdisseny` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nomfitxercss` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `disseny`
--

INSERT INTO `disseny` (`disseny_id`, `nomdisseny`, `nomfitxercss`) VALUES
(1, 'default', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grups`
--

CREATE TABLE `grups` (
  `grup_id` int(11) NOT NULL,
  `grup_nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `curs_curs_id` int(11) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `grup_col` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `llico`
--

CREATE TABLE `llico` (
  `llico_id` int(11) NOT NULL,
  `llico_nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `percentatge` int(11) DEFAULT NULL,
  `tema_tema_id` int(11) NOT NULL,
  `ordre_llico` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `tipusllico_id` int(11) NOT NULL,
  `descripcio` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `llicogrup`
--

CREATE TABLE `llicogrup` (
  `llico_grup_id` int(11) NOT NULL,
  `temagrup_temagrup_id` int(11) NOT NULL,
  `llico_llico_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `ordre` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE `os` (
  `os_id` int(10) NOT NULL,
  `os_nom` varchar(35) COLLATE utf8_bin NOT NULL,
  `zona_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`os_id`, `os_nom`, `zona_id`) VALUES
(1, 'Dits del peu', 2),
(2, 'Peus', 2),
(3, 'Peus en càrrega', 2),
(4, 'Sesamoideos', 2),
(5, 'Calcani', 2),
(6, 'Turmell', 2),
(7, 'Tibia i peroné', 3),
(8, 'Genoll', 4),
(9, 'Genoll en càrrega', 4),
(10, 'Ròtula', 4),
(11, 'Fèmur', 5),
(12, 'Maluc', 6),
(13, 'Forat obturatriu', 6),
(14, 'Pelvis', 6),
(15, 'Sacre i còxis', 7),
(16, 'Lumbar', 7),
(17, 'Dorsal', 7),
(18, 'Cervical', 7),
(19, 'Abdomen', 8),
(20, 'Tórax', 9),
(21, 'Costelles', 9),
(22, 'Estèrnum', 9),
(23, 'Clavicula', 10),
(24, 'Escàpula', 10),
(25, 'Acromio-clavicular', 10),
(26, 'Muscle', 11),
(27, 'Húmer', 12),
(28, 'Colze', 13),
(29, 'Avantbraç', 14),
(30, 'Canell', 15),
(31, 'Mà', 16),
(32, 'Dits', 17),
(33, 'Crani', 18),
(34, 'Òrbites', 18),
(35, 'Ós zigomàtic', 18),
(36, 'Ossos propis', 18),
(37, 'Sins paranasals', 18),
(38, 'Càvum', 18),
(39, 'Maxil·lar inferior', 18),
(40, 'Maxil·lar', 18),
(41, 'ATM', 18),
(42, 'ATM tancada', 18),
(43, 'ATM oberta', 18),
(44, 'Ortopantomografia', 18),
(45, 'Telemetria', 18);

-- --------------------------------------------------------

--
-- Table structure for table `posicio`
--

CREATE TABLE `posicio` (
  `posicio_id` int(11) NOT NULL,
  `posicio_nom` varchar(40) COLLATE utf8_bin NOT NULL,
  `os_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `posicio`
--

INSERT INTO `posicio` (`posicio_id`, `posicio_nom`, `os_id`) VALUES
(1, 'AP', 1),
(2, 'Obliqua', 1),
(3, 'AP', 2),
(4, 'Perfil', 2),
(5, 'Obliqua interna', 2),
(6, 'AP', 3),
(7, 'Perfil', 3),
(8, 'Axial', 4),
(9, 'Axial', 5),
(10, 'Lateral', 5),
(11, 'AP', 6),
(12, 'Lateral', 6),
(13, 'Obliqua interna', 6),
(14, 'Obliqua externa', 6),
(15, 'Varo', 6),
(16, 'Valgo', 6),
(17, 'Subastragalina', 6),
(18, 'AP', 7),
(19, 'Lateral', 7),
(20, 'Obliqua externa', 7),
(21, 'Obliqua interna', 7),
(22, 'AP', 8),
(23, 'Perfil', 8),
(24, 'Obliqua externa', 8),
(25, 'Obliqua interna', 8),
(26, 'Fick', 8),
(27, 'AP', 9),
(28, 'Perfil', 9),
(29, 'Axials', 10),
(30, 'AP', 11),
(31, 'Lateral', 11),
(32, 'Front', 12),
(33, 'Axial', 12),
(34, 'Alar', 12),
(35, 'AP', 13),
(36, 'AP', 14),
(37, 'Inlet', 14),
(38, 'Outlet', 14),
(39, 'AP', 15),
(40, 'Perfil', 15),
(41, 'AP', 16),
(42, 'Perfil', 16),
(43, 'Obliqua', 16),
(44, 'Funcional', 16),
(45, 'AP', 17),
(46, 'Perfil', 17),
(47, 'Obliqua', 17),
(48, 'Funcional', 17),
(49, 'AP', 18),
(50, 'Perfil', 18),
(51, 'Obliqua', 18),
(52, 'Funcional', 18),
(53, 'Transoral', 18),
(54, 'Decúbit supí', 19),
(55, 'Bipedestació', 19),
(56, 'Decúbit lateral', 19),
(57, 'PA', 20),
(58, 'AP', 20),
(59, 'Perfil', 20),
(60, 'Lordòtica', 20),
(61, 'Decúbit lateral', 20),
(62, 'AP', 21),
(63, 'Obliqua', 21),
(64, 'Perfil', 22),
(65, 'Front', 23),
(66, 'Desenfilada', 23),
(67, 'AP', 24),
(68, 'Perfil', 24),
(69, 'AP', 25),
(70, 'Axilar', 26),
(71, 'Axial', 26),
(72, 'Outlet', 26),
(73, 'Rotació neutra', 26),
(74, 'Rotació interna', 26),
(75, 'Rotació externa', 26),
(76, 'AP', 27),
(77, 'Transtoràcica', 27),
(78, 'Perfil', 27),
(79, 'AP', 28),
(80, 'Obliqua interna', 28),
(81, 'Obliqua externa', 28),
(82, 'Perfil', 28),
(83, 'AP', 29),
(84, 'Perfil', 29),
(85, 'Gaynor Hart', 30),
(86, 'Mètode Labarta', 30),
(87, 'Sneck', 30),
(88, 'Obliqua externa', 30),
(89, 'Obliqua interna', 30),
(90, 'Funcional flexió palmar', 30),
(91, 'Funcional flexió dorsal', 30),
(92, 'Funcional desviació cubital', 30),
(93, 'Funcional desviació radial', 30),
(94, 'PA', 30),
(95, 'Perfil', 30),
(96, 'Norgaard', 31),
(97, 'Perfil', 31),
(98, 'Obliqua', 31),
(99, 'PA', 31),
(100, 'Perfil', 32),
(101, 'PA', 32),
(102, 'PA', 33),
(103, 'Perfil', 33),
(104, 'Towne', 33),
(105, 'Hirtz', 33),
(106, 'PA', 34),
(107, 'Rhese PA', 34),
(108, 'Variant Hirtz', 35),
(109, 'PA', 36),
(110, 'Perfil', 36),
(111, 'PA', 37),
(112, 'Perfil', 38),
(113, 'PA', 39),
(114, 'Perfil', 40),
(115, 'Obliqua', 41),
(116, 'Perfil', 42),
(117, 'Perfil', 43),
(118, 'NULL', 44),
(119, 'NULL', 45);

-- --------------------------------------------------------

--
-- Table structure for table `preguntes`
--

CREATE TABLE `preguntes` (
  `preguntes_id` int(11) NOT NULL,
  `anunciat` mediumtext COLLATE utf8_bin,
  `percentatge` int(11) DEFAULT NULL,
  `llico_llico_id` int(11) NOT NULL,
  `ordre_pregunta` int(11) DEFAULT NULL,
  `xray_codi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `respostes`
--

CREATE TABLE `respostes` (
  `resposta_id` int(11) NOT NULL,
  `nota` int(11) DEFAULT NULL,
  `comentaris` mediumtext COLLATE utf8_bin,
  `temps` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `preguntes_preguntes_id` int(11) NOT NULL,
  `corrector` int(11) DEFAULT NULL,
  `usuaris_usuari_id` int(11) NOT NULL,
  `p1` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `p2` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `p3` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `p4` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `camleft` int(1) DEFAULT NULL,
  `camcenter` int(1) DEFAULT NULL,
  `camright` int(1) DEFAULT NULL,
  `bucky` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `focus` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `zona` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `os` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `posicio` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `centratge` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `buscat` tinyint(1) DEFAULT NULL,
  `xray_codi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `tema_id` int(11) NOT NULL,
  `tema_nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `creador` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `data` date DEFAULT NULL,
  `descripcio` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `temagrup`
--

CREATE TABLE `temagrup` (
  `temagrup_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `tema_tema_id` int(11) NOT NULL,
  `grups_grup_id` int(11) NOT NULL,
  `ordre` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tipusllico`
--

CREATE TABLE `tipusllico` (
  `tipusllico_id` int(11) NOT NULL,
  `tipusllico_nom` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tipusllico`
--

INSERT INTO `tipusllico` (`tipusllico_id`, `tipusllico_nom`) VALUES
(1, 'sense_prof_sense_nota'),
(2, 'sense_prof_amb_nota'),
(3, 'amb_prof_amb_nota'),
(4, 'amb_prof_examen');

-- --------------------------------------------------------

--
-- Table structure for table `tipususuari`
--

CREATE TABLE `tipususuari` (
  `rol_id` int(11) NOT NULL,
  `rol_nom` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tipususuari`
--

INSERT INTO `tipususuari` (`rol_id`, `rol_nom`) VALUES
(1, 'administrador'),
(2, 'professor'),
(3, 'alumne'),
(4, 'betatester');

-- --------------------------------------------------------

--
-- Table structure for table `usuaricurs`
--

CREATE TABLE `usuaricurs` (
  `usuaricurs_id` int(11) NOT NULL,
  `curs_curs_id` int(11) NOT NULL,
  `usuaris_usuari_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `usuarigrup`
--

CREATE TABLE `usuarigrup` (
  `usuarigrup_id` int(11) NOT NULL,
  `usuari_id` int(11) NOT NULL,
  `grup_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `usuaris`
--

CREATE TABLE `usuaris` (
  `usuari_id` int(11) NOT NULL,
  `usuari_nom` varchar(45) COLLATE utf8_bin NOT NULL,
  `usuari_cognom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(45) COLLATE utf8_bin NOT NULL,
  `userpass` varchar(45) COLLATE utf8_bin NOT NULL,
  `tipususuari_rol_id` int(11) NOT NULL,
  `correu` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `disseny_disseny_id` int(11) NOT NULL DEFAULT '1',
  `validat` int(1) NOT NULL DEFAULT '0',
  `validator` enum('si','no') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `usuaris`
--

INSERT INTO `usuaris` (`usuari_id`, `usuari_nom`, `usuari_cognom`, `username`, `userpass`, `tipususuari_rol_id`, `correu`, `disseny_disseny_id`, `validat`, `validator`) VALUES
(3, 'professor', 'test', 'prof', 'noprof', 2, 'professor@professor.com', 1, 0, 'si'),
(4, 'alumne', 'test', 'alu', 'noalu', 3, 'alumne@alumne.com', 1, 0, 'si'),
(10, 'aaaaaaa', 'bbbbbbbb', 'ccccccccc', '1111111111', 2, '', 1, 0, 'si'),
(11, 'aaaaa', 'aaaaaaa', 'wwwwwwww', '11111', 2, '', 1, 0, 'si'),
(12, 'aaaaaaa', 'aaaaaaa', 'rrrrrrrrrrr', '222222222', 2, '', 1, 0, 'si'),
(13, 'aaaaaaa', 'aaaaaaa', 'ttttttttttt', '11111', 2, '', 1, 0, 'si');

-- --------------------------------------------------------

--
-- Table structure for table `xray`
--

CREATE TABLE `xray` (
  `codi` int(10) NOT NULL,
  `p1` varchar(10) COLLATE utf8_bin NOT NULL,
  `p2` varchar(10) COLLATE utf8_bin NOT NULL,
  `p3` varchar(10) COLLATE utf8_bin NOT NULL,
  `ext` varchar(6) COLLATE utf8_bin NOT NULL,
  `camleft` int(1) DEFAULT NULL,
  `camcenter` int(1) DEFAULT NULL,
  `camright` int(1) DEFAULT NULL,
  `bucky` varchar(35) COLLATE utf8_bin NOT NULL,
  `focus` varchar(35) COLLATE utf8_bin NOT NULL,
  `zona` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `validada` enum('no','si') COLLATE utf8_bin NOT NULL,
  `userid` int(10) NOT NULL,
  `posicio_posicio_id` int(11) NOT NULL,
  `centratge_centratge_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `xray`
--

INSERT INTO `xray` (`codi`, `p1`, `p2`, `p3`, `ext`, `camleft`, `camcenter`, `camright`, `bucky`, `focus`, `zona`, `os`, `data`, `validada`, `userid`, `posicio_posicio_id`, `centratge_centratge_id`) VALUES
(1, '110', '64', '0.75', 'jpg', 0, 1, 0, 'directe', 'fi', 2, 2, '2016-04-30 11:44:43', 'si', 2, 11, 6),
(2, '100', '38', '0.5', 'jpg', 0, 0, 1, 'taula', 'fi', 0, 8, '2016-04-30 11:49:47', 'si', 2, 23, 14),
(3, '50', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 0, 0, '2016-04-30 11:55:20', 'si', 2, 6, 4),
(4, '46', '8', '0.25', 'jpg', 0, 0, 0, 'taula', 'gruixut', 0, 0, '2016-04-30 12:00:41', 'si', 2, 3, 3),
(5, '60', '22', '0.5', 'jpg', 1, 1, 1, 'mural', 'gruixut', 9, 21, '2016-04-30 12:03:31', 'si', 2, 62, 34),
(6, '60', '36', '0.5', 'jpg', 0, 1, 0, 'taula', 'gruixut', 6, 12, '2016-05-19 23:18:55', 'si', 2, 34, 20),
(7, '50', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 14, 29, '2016-05-19 23:22:27', 'si', 2, 84, 49),
(8, '60', '32', '0.25', 'jpg', 0, 0, 0, 'taula', 'gruixut', 4, 8, '2016-05-19 23:26:35', 'si', 2, 22, 14),
(9, '46', '12', '0.25', 'jpg', 0, 0, 0, 'directe', 'fi', 15, 30, '2016-05-19 23:29:11', 'si', 2, 94, 50),
(10, '50', '40', '0.25', 'jpg', 0, 1, 0, 'mural', 'gruixut', 2, 2, '2016-05-19 23:34:00', 'si', 2, 11, 5),
(11, '40', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'fi', 17, 32, '2016-05-19 23:39:06', 'si', 2, 100, 54),
(12, '56', '40', '0.25', 'jpg', 0, 1, 0, 'mural', 'gruixut', 7, 18, '2016-05-19 23:47:50', 'si', 2, 50, 28),
(13, '42', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 16, 31, '2016-05-20 00:08:50', 'si', 2, 99, 53),
(14, '86', '112', '0.75', 'jpg', 0, 1, 0, 'mural', 'gruixut', 7, 16, '2016-05-20 00:14:50', 'si', 2, 42, 25),
(15, '44', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'fi', 15, 30, '2016-05-20 00:25:17', 'si', 2, 89, 52),
(16, '60', '50', '0.5', 'jpg', 0, 1, 0, 'mural', 'gruixut', 10, 23, '2016-05-20 00:41:23', 'si', 2, 65, 37),
(17, '50', '16', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 2, 6, '2016-05-20 00:45:02', 'si', 2, 11, 11),
(18, '56', '16', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 13, 28, '2016-05-20 01:03:11', 'si', 2, 81, 47),
(19, '50', '48', '0.25', 'jpg', 0, 1, 0, 'mural', 'gruixut', 9, 22, '2016-05-20 01:07:52', 'si', 2, 64, 36),
(20, '46', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 2, 2, '2016-05-20 01:10:14', 'si', 2, 5, 2),
(21, '48', '16', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 2, 6, '2016-05-20 01:16:16', 'si', 2, 12, 9),
(22, '58', '48', '0.25', 'jpg', 0, 1, 0, 'mural', 'gruixut', 12, 27, '2016-05-20 01:19:26', 'si', 2, 77, 44),
(23, '68', '64', '0.5', 'jpg', 0, 1, 0, 'mural', 'gruixut', 11, 26, '2016-05-20 01:31:22', 'si', 2, 71, 41),
(24, '60', '64', '0.5', 'jpg', 0, 1, 0, 'mural', 'gruixut', 11, 26, '2016-05-20 01:36:39', 'si', 2, 75, 40),
(25, '60', '50', '0.5', 'jpg', 1, 0, 1, 'mural', 'gruixut', 10, 23, '2016-05-20 01:39:00', 'si', 2, 65, 37),
(26, '50', '48', '0.25', 'jpg', 0, 1, 0, 'mural', 'gruixut', 18, 36, '2016-05-20 01:47:31', 'si', 2, 110, 63),
(27, '58', '16', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 13, 28, '2016-05-20 01:54:00', 'si', 2, 79, 46),
(28, '40', '6', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 2, 1, '2016-05-20 01:57:19', 'si', 2, 1, 1),
(29, '60', '36', '0.5', 'jpg', 1, 1, 1, 'mural', 'gruixut', 9, 21, '2016-05-20 02:00:40', 'si', 2, 63, 35),
(30, '48', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 3, 7, '2016-05-20 02:03:00', 'si', 2, 18, 13),
(31, '44', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'fi', 2, 5, '2016-05-20 02:07:47', 'si', 2, 8, 6),
(32, '48', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 14, 29, '2016-05-20 02:10:49', 'si', 2, 83, 49),
(33, '50', '48', '0.25', 'jpg', 0, 1, 0, 'mural', 'fi', 18, 36, '2016-05-20 02:16:00', 'si', 2, 110, 63),
(34, '80', '60', '0.5', 'jpg', 0, 0, 0, 'taula', 'gruixut', 8, 19, '2016-05-20 02:18:42', 'si', 2, 54, 30),
(35, '60', '40', '0.25', 'jpg', 0, 1, 0, 'mural', 'gruixut', 7, 18, '2016-05-20 02:20:27', 'si', 2, 49, 28),
(36, '60', '72', '0.25', 'jpg', 0, 0, 0, 'taula', 'gruixut', 6, 12, '2016-05-20 02:22:04', 'si', 2, 34, 20),
(37, '44', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 15, 30, '2016-05-20 02:25:45', 'si', 2, 87, 51),
(38, '42', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 2, 2, '2016-05-20 02:30:46', 'si', 2, 4, 3),
(39, '42', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 17, 32, '2016-05-20 02:36:11', 'si', 2, 101, 54),
(40, '70', '72', '0.25', 'jpg', 0, 1, 0, 'mural', 'gruixut', 18, 33, '2016-05-20 02:39:39', 'si', 2, 102, 55),
(41, '58', '48', '0.25', 'jpg', 0, 1, 0, 'mural', 'gruixut', 12, 27, '2016-05-20 02:49:22', 'si', 2, 78, 44),
(42, '46', '20', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 3, 7, '2016-05-20 02:51:57', 'si', 2, 19, 13),
(43, '0', '0', '0', 'jpg', 0, 0, 0, 'taula', 'gruixut', 5, 11, '2016-05-20 02:54:08', 'si', 2, 31, 19),
(44, '60', '60', '0.25', 'jpg', 0, 0, 0, 'taula', 'gruixut', 6, 12, '2016-05-20 02:55:29', 'si', 2, 33, 20),
(45, '70', '72', '0.25', 'jpg', 0, 0, 0, 'mural', 'gruixut', 18, 34, '2016-05-20 02:57:48', 'si', 2, 106, 59),
(46, '60', '60', '0.25', 'jpg', 0, 0, 0, 'taula', 'gruixut', 6, 12, '2016-05-20 02:59:57', 'si', 2, 32, 20),
(47, '44', '8', '0.25', 'jpg', 0, 0, 0, 'directe', 'gruixut', 16, 31, '2016-05-20 03:01:28', 'si', 2, 98, 53),
(48, '68', '66', '0.5', 'jpg', 0, 1, 0, 'mural', 'gruixut', 11, 26, '2016-05-20 03:04:06', 'si', 2, 71, 41),
(49, '82', '80', '0.25', 'jpg', 0, 0, 0, 'directe', 'fi', 2, 3, '2016-10-15 18:34:40', 'si', 3, 2, 1),
(50, '82', '80', '0.25', 'jpg', 0, 0, 0, 'directe', 'fi', 2, 3, '2016-10-15 18:35:46', 'si', 3, 2, 1),
(51, '0', '0', '0', 'jpg', 0, 0, 0, 'directe', 'fi', 17, 32, '2016-10-15 18:58:35', 'si', 3, 101, 54),
(52, '0', '0', '0', 'jpg', 0, 0, 0, 'directe', 'fi', 2, 2, '2016-10-15 19:23:38', 'si', 3, 2, 1),
(53, '0', '0', '0', 'jpg', 0, 0, 0, 'directe', 'fi', 2, 2, '2016-10-15 19:33:02', 'si', 3, 2, 1),
(54, '106', '68', '0.5', 'jpg', 0, 0, 0, 'directe', 'gruixut', 2, 2, '2016-10-15 19:34:26', 'si', 3, 1, 1),
(55, '0', '0', '0', 'jpg', 0, 0, 0, 'directe', 'fi', 2, 2, '2016-10-15 19:38:32', 'si', 3, 2, 1),
(56, '80', '56', '0.25', 'jpg', 0, 0, 0, 'taula', 'fi', 2, 2, '2016-10-15 21:40:21', 'si', 3, 2, 1),
(57, '80', '56', '0.25', 'jpg', 0, 0, 0, 'taula', 'fi', 3, 7, '2016-10-15 21:43:19', 'si', 3, 19, 13),
(58, '0', '0', '0', 'jpg', 0, 0, 0, 'directe', 'gruixut', 2, 5, '2016-10-16 02:27:08', 'si', 3, 17, 12),
(59, '42', '44', '0.5', 'jpg', 0, 0, 0, 'directe', 'fi', 3, 7, '2016-10-27 15:27:49', 'si', 3, 18, 13);

-- --------------------------------------------------------

--
-- Table structure for table `xrayanom`
--

CREATE TABLE `xrayanom` (
  `codixa` int(11) NOT NULL,
  `codixray` int(10) NOT NULL,
  `codianom` int(11) NOT NULL,
  `userid` int(10) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `xrayanom`
--

INSERT INTO `xrayanom` (`codixa`, `codixray`, `codianom`, `userid`, `data`) VALUES
(1, 3, 10, 2, '2016-04-30 11:55:36'),
(2, 24, 11, 2, '2016-05-20 01:37:19'),
(4, 16, 11, 2, '2016-05-20 01:41:13'),
(6, 45, 5, 2, '2016-05-20 02:58:17'),
(8, 49, 2, 3, '2016-10-15 18:57:21'),
(9, 49, 4, 3, '2016-10-15 18:57:25'),
(10, 51, 6, 3, '2016-10-15 18:58:42'),
(13, 52, 1, 3, '2016-10-15 19:41:08'),
(14, 59, 3, 3, '2016-10-27 15:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `zona`
--

CREATE TABLE `zona` (
  `zona_id` int(10) NOT NULL,
  `zona_nom` varchar(35) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `zona`
--

INSERT INTO `zona` (`zona_id`, `zona_nom`) VALUES
(1, 'Selecciona una zona'),
(2, 'EEII - Peus'),
(3, 'EEII - Cama inferior'),
(4, 'EEII - Genoll'),
(5, 'EEII - Fèmur'),
(6, 'Cintura pèlvica'),
(7, 'Columna'),
(8, 'Abdomen'),
(9, 'Caixa toràcica'),
(10, 'Cintura escapular'),
(11, 'EESS - Muscle'),
(12, 'EESS - Húmer'),
(13, 'EESS - Colze'),
(14, 'EESS - Avantbraç'),
(15, 'EESS - Canell'),
(16, 'EESS - Mà'),
(17, 'EESS - Dits'),
(18, 'Crani');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anomalia`
--
ALTER TABLE `anomalia`
  ADD PRIMARY KEY (`codian`);

--
-- Indexes for table `centratge`
--
ALTER TABLE `centratge`
  ADD PRIMARY KEY (`centratge_id`),
  ADD KEY `os_id` (`os_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `curs`
--
ALTER TABLE `curs`
  ADD PRIMARY KEY (`curs_id`),
  ADD UNIQUE KEY `anyInici` (`anyInici`),
  ADD UNIQUE KEY `anyFI` (`anyFI`);

--
-- Indexes for table `disseny`
--
ALTER TABLE `disseny`
  ADD PRIMARY KEY (`disseny_id`);

--
-- Indexes for table `grups`
--
ALTER TABLE `grups`
  ADD PRIMARY KEY (`grup_id`),
  ADD KEY `curs_curs_id` (`curs_curs_id`);

--
-- Indexes for table `llico`
--
ALTER TABLE `llico`
  ADD PRIMARY KEY (`llico_id`),
  ADD KEY `tema_tema_id` (`tema_tema_id`),
  ADD KEY `tipusllico_id` (`tipusllico_id`);

--
-- Indexes for table `llicogrup`
--
ALTER TABLE `llicogrup`
  ADD PRIMARY KEY (`llico_grup_id`),
  ADD KEY `temagrup_temagrup_id` (`temagrup_temagrup_id`),
  ADD KEY `llico_llico_id` (`llico_llico_id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`os_id`),
  ADD KEY `zona_id` (`zona_id`);

--
-- Indexes for table `posicio`
--
ALTER TABLE `posicio`
  ADD PRIMARY KEY (`posicio_id`),
  ADD KEY `os_id` (`os_id`);

--
-- Indexes for table `preguntes`
--
ALTER TABLE `preguntes`
  ADD PRIMARY KEY (`preguntes_id`),
  ADD KEY `llico_llico_id` (`llico_llico_id`),
  ADD KEY `xray_codi` (`xray_codi`);

--
-- Indexes for table `respostes`
--
ALTER TABLE `respostes`
  ADD PRIMARY KEY (`resposta_id`),
  ADD KEY `preguntes_preguntes_id` (`preguntes_preguntes_id`),
  ADD KEY `usuaris_usuari_id` (`usuaris_usuari_id`),
  ADD KEY `xray_codi` (`xray_codi`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`tema_id`);

--
-- Indexes for table `temagrup`
--
ALTER TABLE `temagrup`
  ADD PRIMARY KEY (`temagrup_id`),
  ADD KEY `tema_tema_id` (`tema_tema_id`),
  ADD KEY `grups_grup_id` (`grups_grup_id`);

--
-- Indexes for table `tipusllico`
--
ALTER TABLE `tipusllico`
  ADD PRIMARY KEY (`tipusllico_id`);

--
-- Indexes for table `tipususuari`
--
ALTER TABLE `tipususuari`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indexes for table `usuaricurs`
--
ALTER TABLE `usuaricurs`
  ADD PRIMARY KEY (`usuaricurs_id`),
  ADD KEY `curs_curs_id` (`curs_curs_id`),
  ADD KEY `usuaris_usuari_id` (`usuaris_usuari_id`);

--
-- Indexes for table `usuarigrup`
--
ALTER TABLE `usuarigrup`
  ADD PRIMARY KEY (`usuarigrup_id`),
  ADD KEY `usuari_id` (`usuari_id`),
  ADD KEY `grup_id` (`grup_id`);

--
-- Indexes for table `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`usuari_id`),
  ADD KEY `tipus_usuari_rol_id` (`tipususuari_rol_id`),
  ADD KEY `disseny_disseny_id` (`disseny_disseny_id`);

--
-- Indexes for table `xray`
--
ALTER TABLE `xray`
  ADD PRIMARY KEY (`codi`),
  ADD KEY `posicio_posicio_id` (`posicio_posicio_id`),
  ADD KEY `centratge_centratge_id` (`centratge_centratge_id`);

--
-- Indexes for table `xrayanom`
--
ALTER TABLE `xrayanom`
  ADD PRIMARY KEY (`codixa`),
  ADD KEY `codixray` (`codixray`),
  ADD KEY `codianom` (`codianom`);

--
-- Indexes for table `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`zona_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anomalia`
--
ALTER TABLE `anomalia`
  MODIFY `codian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `centratge`
--
ALTER TABLE `centratge`
  MODIFY `centratge_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `curs`
--
ALTER TABLE `curs`
  MODIFY `curs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `disseny`
--
ALTER TABLE `disseny`
  MODIFY `disseny_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grups`
--
ALTER TABLE `grups`
  MODIFY `grup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `llico`
--
ALTER TABLE `llico`
  MODIFY `llico_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `os_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `posicio`
--
ALTER TABLE `posicio`
  MODIFY `posicio_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `preguntes`
--
ALTER TABLE `preguntes`
  MODIFY `preguntes_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respostes`
--
ALTER TABLE `respostes`
  MODIFY `resposta_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `tema_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temagrup`
--
ALTER TABLE `temagrup`
  MODIFY `temagrup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipusllico`
--
ALTER TABLE `tipusllico`
  MODIFY `tipusllico_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipususuari`
--
ALTER TABLE `tipususuari`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuaricurs`
--
ALTER TABLE `usuaricurs`
  MODIFY `usuaricurs_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarigrup`
--
ALTER TABLE `usuarigrup`
  MODIFY `usuarigrup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `usuari_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `xray`
--
ALTER TABLE `xray`
  MODIFY `codi` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `xrayanom`
--
ALTER TABLE `xrayanom`
  MODIFY `codixa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `zona`
--
ALTER TABLE `zona`
  MODIFY `zona_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `centratge`
--
ALTER TABLE `centratge`
  ADD CONSTRAINT `centratge_ibfk_1` FOREIGN KEY (`os_id`) REFERENCES `os` (`os_id`);

--
-- Constraints for table `grups`
--
ALTER TABLE `grups`
  ADD CONSTRAINT `grups_ibfk_1` FOREIGN KEY (`curs_curs_id`) REFERENCES `curs` (`curs_id`) ON DELETE CASCADE;

--
-- Constraints for table `llico`
--
ALTER TABLE `llico`
  ADD CONSTRAINT `llico_ibfk_1` FOREIGN KEY (`tema_tema_id`) REFERENCES `tema` (`tema_id`),
  ADD CONSTRAINT `llico_ibfk_2` FOREIGN KEY (`tipusllico_id`) REFERENCES `tipusllico` (`tipusllico_id`);

--
-- Constraints for table `llicogrup`
--
ALTER TABLE `llicogrup`
  ADD CONSTRAINT `llicogrup_ibfk_1` FOREIGN KEY (`temagrup_temagrup_id`) REFERENCES `temagrup` (`temagrup_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `llicogrup_ibfk_2` FOREIGN KEY (`llico_llico_id`) REFERENCES `llico` (`llico_id`) ON DELETE CASCADE;

--
-- Constraints for table `os`
--
ALTER TABLE `os`
  ADD CONSTRAINT `os_ibfk_1` FOREIGN KEY (`zona_id`) REFERENCES `zona` (`zona_id`);

--
-- Constraints for table `posicio`
--
ALTER TABLE `posicio`
  ADD CONSTRAINT `posicio_ibfk_1` FOREIGN KEY (`os_id`) REFERENCES `os` (`os_id`);

--
-- Constraints for table `preguntes`
--
ALTER TABLE `preguntes`
  ADD CONSTRAINT `preguntes_ibfk_1` FOREIGN KEY (`llico_llico_id`) REFERENCES `llico` (`llico_id`),
  ADD CONSTRAINT `preguntes_ibfk_2` FOREIGN KEY (`xray_codi`) REFERENCES `xray` (`codi`);

--
-- Constraints for table `respostes`
--
ALTER TABLE `respostes`
  ADD CONSTRAINT `respostes_ibfk_1` FOREIGN KEY (`preguntes_preguntes_id`) REFERENCES `preguntes` (`preguntes_id`),
  ADD CONSTRAINT `respostes_ibfk_2` FOREIGN KEY (`usuaris_usuari_id`) REFERENCES `usuaris` (`usuari_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `respostes_ibfk_3` FOREIGN KEY (`xray_codi`) REFERENCES `xray` (`codi`);

--
-- Constraints for table `temagrup`
--
ALTER TABLE `temagrup`
  ADD CONSTRAINT `temagrup_ibfk_1` FOREIGN KEY (`tema_tema_id`) REFERENCES `tema` (`tema_id`),
  ADD CONSTRAINT `temagrup_ibfk_2` FOREIGN KEY (`grups_grup_id`) REFERENCES `grups` (`grup_id`);

--
-- Constraints for table `usuaricurs`
--
ALTER TABLE `usuaricurs`
  ADD CONSTRAINT `usuaricurs_ibfk_1` FOREIGN KEY (`curs_curs_id`) REFERENCES `curs` (`curs_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuaricurs_ibfk_2` FOREIGN KEY (`usuaris_usuari_id`) REFERENCES `usuaris` (`usuari_id`) ON DELETE CASCADE;

--
-- Constraints for table `usuarigrup`
--
ALTER TABLE `usuarigrup`
  ADD CONSTRAINT `usuarigrup_ibfk_1` FOREIGN KEY (`usuari_id`) REFERENCES `usuaris` (`usuari_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarigrup_ibfk_2` FOREIGN KEY (`grup_id`) REFERENCES `grups` (`grup_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `usuaris`
--
ALTER TABLE `usuaris`
  ADD CONSTRAINT `usuaris_ibfk_2` FOREIGN KEY (`disseny_disseny_id`) REFERENCES `disseny` (`disseny_id`),
  ADD CONSTRAINT `usuaris_ibfk_3` FOREIGN KEY (`tipususuari_rol_id`) REFERENCES `tipususuari` (`rol_id`);

--
-- Constraints for table `xray`
--
ALTER TABLE `xray`
  ADD CONSTRAINT `xray_ibfk_1` FOREIGN KEY (`posicio_posicio_id`) REFERENCES `posicio` (`posicio_id`),
  ADD CONSTRAINT `xray_ibfk_2` FOREIGN KEY (`centratge_centratge_id`) REFERENCES `centratge` (`centratge_id`);

--
-- Constraints for table `xrayanom`
--
ALTER TABLE `xrayanom`
  ADD CONSTRAINT `xrayanom_ibfk_2` FOREIGN KEY (`codianom`) REFERENCES `anomalia` (`codian`),
  ADD CONSTRAINT `xrayanom_ibfk_3` FOREIGN KEY (`codixray`) REFERENCES `xray` (`codi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
