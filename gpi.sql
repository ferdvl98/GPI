-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2021 at 09:43 PM
-- Server version: 5.7.33
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nombre`, `total`) VALUES
(1, 'INDIRECTOS', 1900000);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `codigo` text CHARACTER SET latin1 NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `status` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `codigo`, `nombre`, `status`) VALUES
(1, 'A', 'ACERÍA', 'A'),
(2, 'B', 'LAMINACIÓN', 'A'),
(3, 'C', 'HORNO DE RECALENTAMIENTO', 'A'),
(4, 'D', 'PLANTA DE AGUAS', 'A'),
(5, 'E', 'SUBESTACIÓN', 'A'),
(6, 'F', 'TRATAMIENTO DE GASES', 'A'),
(7, 'G', 'PATIO DE CHATARRA', 'A'),
(8, 'H', 'ALIMENTADOR CONTINUO DE CHATARRA', 'A'),
(9, 'I', 'EDIFICIOS AUXILIARES', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `asig_priv`
--

CREATE TABLE `asig_priv` (
  `id` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `id_priv` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `asig_priv`
--

INSERT INTO `asig_priv` (`id`, `id_cuenta`, `id_priv`) VALUES
(71, 2, 15),
(48, 4, 12),
(51, 6, 1),
(52, 6, 2),
(53, 6, 3),
(54, 6, 4),
(55, 6, 5),
(56, 6, 6),
(57, 6, 7),
(58, 6, 8),
(59, 6, 9),
(60, 6, 10),
(61, 6, 11),
(62, 6, 12),
(64, 6, 13),
(66, 1, 12),
(67, 2, 14),
(68, 6, 14),
(69, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `as_puesto`
--

CREATE TABLE `as_puesto` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_puesto` int(11) NOT NULL,
  `status` varchar(1) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `as_puesto`
--

INSERT INTO `as_puesto` (`id`, `id_persona`, `id_puesto`, `status`) VALUES
(2, 4, 1, 'A'),
(3, 2, 6, 'A'),
(4, 5, 6, 'A'),
(6, 3, 6, 'A'),
(7, 6, 2, 'A'),
(8, 6, 4, 'B'),
(9, 7, 3, 'A'),
(10, 2, 2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `aux_admin`
--

CREATE TABLE `aux_admin` (
  `id_admin` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `unidad` text CHARACTER SET latin1 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iu` double NOT NULL,
  `ig` double NOT NULL,
  `a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_admin`
--

INSERT INTO `aux_admin` (`id_admin`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`, `a`) VALUES
(1, 2, 3, 'GERENTE DE TUBERÍAS', 'MES', 1, 140000, 140000, 1),
(1, 2, 3, 'SUBGERENTE DE TUBERÍAS', 'MES', 3, 80000, 240000, 2),
(1, 2, 3, 'SUPERVISOR TUBERÍAS', 'MES', 3, 65000, 195000, 3),
(1, 2, 3, 'JEFE DE SEGURIDAD', 'MES', 4, 40000, 160000, 4),
(1, 2, 3, 'SUPERVISOR SEGURIDAD', 'MES', 4, 25000, 100000, 5),
(1, 2, 3, 'CALIDAD', 'MES', 4, 45000, 180000, 6),
(1, 2, 3, 'AUXILIAR DE ALMACÉN', 'MES', 5, 25000, 125000, 7),
(1, 2, 3, 'VELADORES', 'MES', 5, 18000, 90000, 8),
(1, 2, 3, 'CHOFER', 'MES', 5, 18000, 90000, 9),
(1, 2, 3, 'ADMINISTRACIÓN', 'MES', 5, 40000, 200000, 10),
(1, 2, 3, 'LIMPIEZA OFICINAS', 'MES', 5, 11000, 55000, 11),
(1, 2, 3, 'GESTIÓN', 'MES', 5, 65000, 325000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `aux_aux`
--

CREATE TABLE `aux_aux` (
  `id` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `unidad` text CHARACTER SET latin1 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iu` double NOT NULL,
  `ig` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aux_aux_pre`
--

CREATE TABLE `aux_aux_pre` (
  `id` int(11) NOT NULL,
  `id_pre` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `total` double NOT NULL,
  `pres` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aux_co`
--

CREATE TABLE `aux_co` (
  `id_co` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `unidad` text CHARACTER SET latin1 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iu` double NOT NULL,
  `ig` double NOT NULL,
  `a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_co`
--

INSERT INTO `aux_co` (`id_co`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`, `a`) VALUES
(1, 2, 3, 'AGUA', 'HH', 1060, 160, 169600, 1),
(1, 2, 3, 'AIRE', 'HH', 84, 160, 13440, 2),
(1, 2, 3, 'LUBRICACIÓN', 'HH', 365, 160, 58400, 3),
(1, 2, 3, 'GRASA', 'HH', 224, 160, 35840, 4),
(1, 2, 3, 'TUBING', 'HH', 3454, 160, 552640, 5),
(1, 2, 3, 'HIDRÁULICO', 'HH', 1740, 160, 278400, 6),
(1, 2, 3, 'SOPORTES ESTRUCTURAS', 'HH', 269, 160, 43040, 7),
(1, 2, 3, 'SOPORTES CATÁLOGO', 'HH', 1260, 160, 201600, 8),
(1, 2, 3, 'ESPÁRRAGOS', 'HH', 302, 160, 48320, 9),
(1, 2, 3, 'PRUEBAS Y ETIQUETADO', 'HH', 1546, 160, 247360, 10),
(2, 2, 3, 'AGUA', 'HH', 129, 160, 20640, 11),
(2, 2, 3, 'AIRE', 'HH', 7, 160, 1120, 12),
(2, 2, 3, 'TUBING', 'HH', 1434, 160, 229440, 13),
(2, 2, 3, 'HIDRÁULICO', 'HH', 554, 160, 88640, 14),
(2, 2, 3, 'SOPORTES ESTRUCTURAS', 'HH', 81, 160, 12960, 15),
(2, 2, 3, 'SOPORTES CATÁLOGO', 'HH', 326, 160, 52160, 16),
(2, 2, 3, 'ESPÁRRAGOS', 'HH', 2, 160, 320, 17),
(2, 2, 3, 'PRUEBAS Y ETIQUETADO', 'HH', 370, 160, 59200, 18),
(3, 2, 3, 'AGUA', 'HH', 105, 160, 16800, 19),
(3, 2, 3, 'AIRE', 'HH', 179, 160, 28640, 20),
(3, 2, 3, 'AIRE-ACEITE', 'HH', 36, 160, 5760, 21),
(3, 2, 3, 'LUBRICACIÓN', 'HH', 130, 160, 20800, 22),
(3, 2, 3, 'GRASA', 'HH', 112, 160, 17920, 23),
(3, 2, 3, 'TUBING', 'HH', 4769, 160, 763040, 24),
(3, 2, 3, 'HIDRÁULICO', 'HH', 2053, 160, 328480, 25),
(3, 2, 3, 'SOPORTES ESTRUCTURAS', 'HH', 171, 160, 27360, 26),
(3, 2, 3, 'SOPORTES CATÁLOGO', 'HH', 1282, 160, 205120, 27),
(3, 2, 3, 'ESPÁRRAGOS', 'HH', 115, 160, 18400, 28),
(3, 2, 3, 'EQUIPO HIDRÁULICO', 'HH', 1100, 160, 176000, 29),
(3, 2, 3, 'PRUEBAS Y ETIQUETADO', 'HH', 1994, 160, 319040, 30),
(4, 2, 3, 'PREFABRICACIÓN Y PINTURA', 'LOTE', 1, 3957921.44, 3957921.44, 31);

-- --------------------------------------------------------

--
-- Table structure for table `aux_concepto`
--

CREATE TABLE `aux_concepto` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `tipo` text COLLATE utf8_unicode_ci NOT NULL,
  `id_pres` text COLLATE utf8_unicode_ci NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `concepto` text COLLATE utf8_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_concepto`
--

INSERT INTO `aux_concepto` (`id`, `id_proyecto`, `tipo`, `id_pres`, `id_area`, `id_dis`, `concepto`, `total`, `a`) VALUES
(122, 5, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'EQUIPO MAYOR', 117656, 7),
(123, 5, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 33000, 6),
(124, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'AGUA', 169600, 1),
(125, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'AIRE', 13440, 2),
(126, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'LUBRICACIÓN', 58400, 3),
(127, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'GRASA', 35840, 4),
(128, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'TUBING', 552640, 5),
(129, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'HIDRÁULICO', 278400, 6),
(130, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'SOPORTES ESTRUCTURAS', 43040, 7),
(131, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'SOPORTES CATÁLOGO', 201600, 8),
(132, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'ESPÁRRAGOS', 48320, 9),
(133, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'PRUEBAS Y ETIQUETADO', 247360, 10),
(134, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'AGUA', 20640, 11),
(135, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'AIRE', 1120, 12),
(136, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'TUBING', 229440, 13),
(137, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'HIDRÁULICO', 88640, 14),
(138, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'SOPORTES ESTRUCTURAS', 12960, 15),
(139, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'SOPORTES CATÁLOGO', 52160, 16),
(140, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'ESPÁRRAGOS', 320, 17),
(141, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'PRUEBAS Y ETIQUETADO', 59200, 18),
(142, 5, 'Costos Directos', 'KHSPM', 2, 3, 'AGUA', 16800, 19),
(143, 5, 'Costos Directos', 'KHSPM', 2, 3, 'AIRE', 28640, 20),
(144, 5, 'Costos Directos', 'KHSPM', 2, 3, 'AIRE-ACEITE', 5760, 21),
(145, 5, 'Costos Directos', 'KHSPM', 2, 3, 'LUBRICACIÓN', 20800, 22),
(146, 5, 'Costos Directos', 'KHSPM', 2, 3, 'GRASA', 17920, 23),
(147, 5, 'Costos Directos', 'KHSPM', 2, 3, 'TUBING', 763040, 24),
(148, 5, 'Costos Directos', 'KHSPM', 2, 3, 'HIDRÁULICO', 328480, 25),
(149, 5, 'Costos Directos', 'KHSPM', 2, 3, 'SOPORTES ESTRUCTURAS', 27360, 26),
(150, 5, 'Costos Directos', 'KHSPM', 2, 3, 'SOPORTES CATÁLOGO', 205120, 27),
(151, 5, 'Costos Directos', 'KHSPM', 2, 3, 'ESPÁRRAGOS', 18400, 28),
(152, 5, 'Costos Directos', 'KHSPM', 2, 3, 'EQUIPO HIDRÁULICO', 176000, 29),
(153, 5, 'Costos Directos', 'KHSPM', 2, 3, 'PRUEBAS Y ETIQUETADO', 319040, 30),
(154, 5, 'Equipos, Herramientas y Consumibles', 'DOWN COILER', 2, 3, 'EQUIPO MAYOR', 438536, 2),
(155, 5, 'Equipos, Herramientas y Consumibles', 'DOWN COILER', 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 123000, 1),
(156, 5, 'Equipos, Herramientas y Consumibles', 'DOWN COILER', 2, 3, 'CONSUMIBLES', 205000, 3),
(157, 5, 'Equipos, Herramientas y Consumibles', 'DOWN COILER', 2, 3, 'ETIQUETAS', 41000, 4),
(158, 5, 'Equipos, Herramientas y Consumibles', 'DOWN COILER', 2, 3, 'EPP', 41252, 5),
(159, 5, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'CONSUMIBLES', 55000, 8),
(160, 5, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'ETIQUETAS', 11000, 9),
(161, 5, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'EPP', 11068, 10),
(162, 5, 'Equipos, Herramientas y Consumibles', 'KHSPM', 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 144000, 11),
(163, 5, 'Equipos, Herramientas y Consumibles', 'KHSPM', 2, 3, 'EQUIPO  MAYOR', 513408, 12),
(164, 5, 'Equipos, Herramientas y Consumibles', 'KHSPM', 2, 3, 'CONSUMIBLES', 240000, 13),
(165, 5, 'Equipos, Herramientas y Consumibles', 'KHSPM', 2, 3, 'ETIQUETAS', 48000, 14),
(166, 5, 'Equipos, Herramientas y Consumibles', 'KHSPM', 2, 3, 'EPP', 48295, 15),
(167, 5, 'Administración de Proyecto', 'INDIRECTOS', 2, 3, 'SUPERVISOR TUBERÍAS', 195000, 3),
(168, 6, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 33000, 6),
(169, 5, 'Viajes y Traslados', 'INDIRECTOS', 2, 3, 'TRANSPORTE DE PERSONAL', 120000, 1),
(170, 5, 'Instalaciones Provicionales', 'INDIRECTOS', 2, 3, 'VEHÍCULO', 100000, 1),
(171, 5, 'AdministraciÃ³n de Proyecto', 'INDIRECTOS', 2, 3, 'JEFE DE SEGURIDAD', 160000, 4),
(172, 5, 'AdministraciÃ³n de Proyecto', 'INDIRECTOS', 2, 3, 'SUPERVISOR SEGURIDAD', 100000, 5),
(173, 5, 'AdministraciÃ³n de Proyecto', 'INDIRECTOS', 2, 3, 'CALIDAD', 180000, 6),
(174, 5, 'AdministraciÃ³n de Proyecto', 'INDIRECTOS', 2, 3, 'AUXILIAR DE ALMACÉN', 125000, 7),
(175, 5, 'AdministraciÃ³n de Proyecto', 'INDIRECTOS', 2, 3, 'VELADORES', 90000, 8),
(176, 5, 'AdministraciÃ³n de Proyecto', 'INDIRECTOS', 2, 3, 'CHOFER', 90000, 9),
(177, 5, 'AdministraciÃ³n de Proyecto', 'INDIRECTOS', 2, 3, 'ADMINISTRACIÓN', 200000, 10),
(178, 5, 'AdministraciÃ³n de Proyecto', 'INDIRECTOS', 2, 3, 'LIMPIEZA OFICINAS', 55000, 11),
(179, 5, 'AdministraciÃ³n de Proyecto', 'INDIRECTOS', 2, 3, 'GESTIÓN', 325000, 12),
(180, 5, 'Viajes y Traslados', 'INDIRECTOS', 2, 3, 'VISITAS', 160000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `aux_concepto2`
--

CREATE TABLE `aux_concepto2` (
  `id` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `presupuesto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_concepto2`
--

INSERT INTO `aux_concepto2` (`id`, `id_tarea`, `presupuesto`) VALUES
(10, 85, 318),
(11, 39, 0),
(12, 40, 0),
(13, 41, 0),
(14, 42, 0),
(15, 43, 0),
(16, 44, 0),
(17, 45, 0),
(18, 46, 0),
(19, 47, 0),
(20, 48, 0),
(21, 49, 0),
(22, 50, 0),
(23, 51, 0),
(24, 52, 0),
(25, 53, 0),
(26, 54, 0),
(27, 55, 0),
(28, 56, 0),
(29, 57, 0),
(30, 58, 0),
(31, 59, 0),
(32, 60, 0),
(33, 61, 0),
(34, 62, 0),
(35, 63, 0),
(36, 64, 0),
(37, 65, 0),
(38, 66, 0),
(39, 67, 0),
(40, 68, 0),
(41, 69, 0),
(42, 70, 0),
(43, 71, 0),
(44, 72, 0),
(45, 78, 0),
(46, 79, 0),
(47, 80, 0),
(48, 81, 0),
(49, 82, 0),
(50, 83, 0),
(51, 84, 0),
(52, 75, 0),
(53, 74, 0),
(54, 77, 0),
(55, 86, 160000);

-- --------------------------------------------------------

--
-- Table structure for table `aux_eq`
--

CREATE TABLE `aux_eq` (
  `id_eq` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `unidad` text CHARACTER SET latin1 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iu` double NOT NULL,
  `ig` double NOT NULL,
  `a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_eq`
--

INSERT INTO `aux_eq` (`id_eq`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`, `a`) VALUES
(1, 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 'LOTE', 1, 123000, 123000, 1),
(1, 2, 3, 'EQUIPO MAYOR', 'LOTE', 1, 438536, 438536, 2),
(1, 2, 3, 'CONSUMIBLES', 'LOTE', 1, 205000, 205000, 3),
(1, 2, 3, 'ETIQUETAS', 'LOTE', 1, 41000, 41000, 4),
(1, 2, 3, 'EPP', 'LOTE', 1, 41252, 41252, 5),
(2, 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 'LOTE', 1, 33000, 33000, 6),
(2, 2, 3, 'EQUIPO MAYOR', 'LOTE', 1, 117656, 117656, 7),
(2, 2, 3, 'CONSUMIBLES', 'LOTE', 1, 55000, 55000, 8),
(2, 2, 3, 'ETIQUETAS', 'LOTE', 1, 11000, 11000, 9),
(2, 2, 3, 'EPP', 'LOTE', 1, 11068, 11068, 10),
(3, 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 'LOTE', 1, 144000, 144000, 11),
(3, 2, 3, 'EQUIPO  MAYOR', 'LOTE', 1, 513408, 513408, 12),
(3, 2, 3, 'CONSUMIBLES', 'LOTE', 1, 240000, 240000, 13),
(3, 2, 3, 'ETIQUETAS', 'LOTE', 1, 48000, 48000, 14),
(3, 2, 3, 'EPP', 'LOTE', 1, 48295, 48295, 15);

-- --------------------------------------------------------

--
-- Table structure for table `aux_fya`
--

CREATE TABLE `aux_fya` (
  `id_fya` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `unidad` text CHARACTER SET latin1 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iu` double NOT NULL,
  `ig` double NOT NULL,
  `a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_fya`
--

INSERT INTO `aux_fya` (`id_fya`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`, `a`) VALUES
(2, 2, 3, 'DE HERRAMIENTA', 'VIAJE', 6, 50000, 300000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aux_hyc`
--

CREATE TABLE `aux_hyc` (
  `id_hyc` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `unidad` text CHARACTER SET latin1 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iu` double NOT NULL,
  `ig` double NOT NULL,
  `a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_hyc`
--

INSERT INTO `aux_hyc` (`id_hyc`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`, `a`) VALUES
(2, 2, 3, 'HOMOLOGACION Y CONTROLES ND', 'LOTE', 1, 200000, 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aux_ins`
--

CREATE TABLE `aux_ins` (
  `id_ins` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `unidad` text CHARACTER SET latin1 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iu` double NOT NULL,
  `ig` double NOT NULL,
  `a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_ins`
--

INSERT INTO `aux_ins` (`id_ins`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`, `a`) VALUES
(1, 2, 3, 'VEHÍCULO', 'MES', 5, 20000, 100000, 1),
(1, 2, 3, 'CASETA DE OFICINA', 'MES', 6, 15000, 90000, 2),
(1, 2, 3, 'COMPUTADORAS Y EQUIPO DE OFICINA', 'LOTE', 1, 84000, 84000, 3),
(1, 2, 3, 'COMEDOR', 'LOTE', 1, 80000, 80000, 4),
(1, 2, 3, 'CONTENEDOR HERRAMIMENTAS', 'LOTE', 1, 50000, 50000, 5),
(1, 2, 3, 'BAÑOS PORTATILES', 'LOTE', 1, 32000, 32000, 6),
(1, 2, 3, 'DISTRIBUCIÓN ELÉCTRICA', 'LOTE', 1, 100000, 100000, 7),
(1, 2, 3, 'MANTENIMIENTO EQUIIPOS', 'LOTE', 1, 100000, 100000, 8),
(1, 2, 3, 'CERCADOS', 'LOTE', 1, 100000, 100000, 9),
(1, 2, 3, 'DESMOVILIZACIÓN', 'LOTE', 1, 100000, 100000, 10),
(1, 2, 3, 'GASTOS DE OFICINA', 'LOTE', 1, 234000, 234000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `aux_noti`
--

CREATE TABLE `aux_noti` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `notifico` int(11) NOT NULL,
  `asunto` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_noti`
--

INSERT INTO `aux_noti` (`id`, `id_user`, `fecha`, `notifico`, `asunto`, `status`) VALUES
(242, 2, '2021-02-22', 2, ': 1', 'A'),
(243, 2, '2021-02-23', 2, ': 10', 'A'),
(244, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 'A'),
(245, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 13440', 'A'),
(246, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 58400', 'A'),
(247, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 35840', 'A'),
(248, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 552640', 'A'),
(249, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 278400', 'A'),
(250, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 43040', 'A'),
(251, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 201600', 'A'),
(252, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 48320', 'A'),
(253, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 247360', 'A'),
(254, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 20640', 'A'),
(255, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 1120', 'A'),
(256, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 229440', 'A'),
(257, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 88640', 'A'),
(258, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 12960', 'A'),
(259, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 52160', 'A'),
(260, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 320', 'A'),
(261, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 59200', 'A'),
(262, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 16800', 'A'),
(263, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 28640', 'A'),
(264, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE-ACEITE: 5760', 'A'),
(265, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 20800', 'A'),
(266, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 17920', 'A'),
(267, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 763040', 'A'),
(268, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 328480', 'A'),
(269, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 27360', 'A'),
(270, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 205120', 'A'),
(271, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 18400', 'A'),
(272, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - EQUIPO HIDRÁULICO: 176000', 'A'),
(273, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 319040', 'A'),
(274, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 123000', 'A'),
(275, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO MAYOR: 438536', 'A'),
(276, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: 205000', 'A'),
(277, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 41000', 'A'),
(278, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EPP: 11068', 'A'),
(279, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 144000', 'A'),
(280, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO  MAYOR: 513408', 'A'),
(281, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: 240000', 'A'),
(282, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 48000', 'A'),
(283, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EPP: 48295', 'A'),
(284, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Administración de Proyecto - LAMINACIÓN - TUBERÍAS - SUPERVISOR TUBERÍAS: 195000', 'A'),
(285, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 33000', 'A'),
(286, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO MAYOR: 117656', 'A'),
(287, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 11000', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `aux_pre`
--

CREATE TABLE `aux_pre` (
  `vyt` int(11) DEFAULT NULL,
  `co` int(11) DEFAULT NULL,
  `seg` int(11) DEFAULT NULL,
  `ins` int(11) DEFAULT NULL,
  `eq` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `fya` int(11) DEFAULT NULL,
  `hyc` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aux_seg`
--

CREATE TABLE `aux_seg` (
  `id_seg` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `unidad` text CHARACTER SET latin1 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iu` double NOT NULL,
  `ig` double NOT NULL,
  `a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_seg`
--

INSERT INTO `aux_seg` (`id_seg`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`, `a`) VALUES
(1, 2, 3, 'SEGURO-FIANZAS', 'MES', 1, 106835, 106835, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aux_superv`
--

CREATE TABLE `aux_superv` (
  `id` int(11) NOT NULL,
  `indentificacion` text COLLATE utf8_unicode_ci NOT NULL,
  `categoria` int(11) NOT NULL,
  `presupuesto` double NOT NULL,
  `tarea` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aux_tareas`
--

CREATE TABLE `aux_tareas` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `tipo` text CHARACTER SET latin1 NOT NULL,
  `id_pres` text CHARACTER SET latin1 NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_disc` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `id_per_pues` int(11) NOT NULL,
  `presupuesto` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `id_a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aux_tareas2`
--

CREATE TABLE `aux_tareas2` (
  `id` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `tarea` text COLLATE utf8_unicode_ci NOT NULL,
  `presupuesto` double NOT NULL,
  `id_a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aux_tareas3`
--

CREATE TABLE `aux_tareas3` (
  `id` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_res` int(11) NOT NULL,
  `id_je` int(11) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `hh` int(11) NOT NULL,
  `em` int(11) NOT NULL,
  `tarea` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aux_tareas3_2`
--

CREATE TABLE `aux_tareas3_2` (
  `id` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_res` int(11) NOT NULL,
  `id_je` int(11) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `hh` int(11) NOT NULL,
  `real_hh` int(11) DEFAULT NULL,
  `em` int(11) NOT NULL,
  `real_em` int(11) DEFAULT NULL,
  `tarea` text,
  `id_t` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aux_vty`
--

CREATE TABLE `aux_vty` (
  `id_vty` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `unidad` text CHARACTER SET latin1 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iu` double NOT NULL,
  `ig` double NOT NULL,
  `a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aux_vty`
--

INSERT INTO `aux_vty` (`id_vty`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`, `a`) VALUES
(1, 2, 3, 'TRANSPORTE DE PERSONAL', 'VIAJE', 3000, 40, 120000, 1),
(1, 2, 3, 'VISITAS', 'VIAJE', 16, 10000, 160000, 2),
(6, 1, 1, 'Manufactura', 'HH', 100, 150, 15000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `codigo` text CHARACTER SET latin1 NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `status` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `co`
--

CREATE TABLE `co` (
  `id_co` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `co`
--

INSERT INTO `co` (`id_co`, `nombre`, `total`) VALUES
(1, 'DOWN COILER', 1648640),
(2, 'COIL HANDLING', 464480),
(3, 'KHSPM', 1927360),
(4, 'TALLER', 3957921.44);

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `id_user` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `usuario` text CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL,
  `status` varchar(1) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cuentas`
--

INSERT INTO `cuentas` (`id_user`, `nombre`, `usuario`, `password`, `status`) VALUES
(2, 'Fernando DÃ¡vila Aguilar', 'ferdvl98@gmail.com', '$2y$10$aZDsuzZ4KQPpbquFicC63.4wQW7CW7635SU9d9H8s271k03SmNoy.', 'A'),
(3, 'Iasiri Ortiz', 'admin@gmail.com', '$2y$10$p.W1v0Tny6KwPoCEl8jaH.WNMcV3daBNKaO2uqYfsQSnPwXSuzADO', 'A'),
(4, 'DIEGO EDUARDO ZARATE ISLAS', 'dzarate@gpisa.com.mx', '$2y$10$irxhpM0YEFgN1H6dNqBAV.ySXeQHe36R.chTB1NJ1WH8pZslik8SC', 'A'),
(5, 'KARLA MARGARITA DOMINGUEZ NARVAEZ', 'kdominguez@gpisa.com.mx', '$2y$10$56g91LaZlaDJstXRaC6Rne.dt8Qhiqf0A/bBl56rWYyxOilOUzMF.', 'A'),
(6, 'ALEJANDRO PALAU MARTINEZ', 'apalau@gpisa.com.mx', '$2y$10$wIWrXJNFdwrcGFPFiw9PS.6EI7qq/dfC0VtMQJdk9sdgueZ/9yjsW', 'A'),
(7, 'RAMON EDUARDO MENDEZ BARAJAS', 'emendez@gpisa.com.mx', '$2y$10$oa5jqjKi4JWTzZ/oPZljgOp2XFzVxNZzD3ooQorWTR8yw//i2dLsu', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
--

CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL,
  `calle` text CHARACTER SET latin1 NOT NULL,
  `num_in` int(11) NOT NULL,
  `num_ex` int(11) NOT NULL,
  `colonia` text CHARACTER SET latin1 NOT NULL,
  `cp` int(11) NOT NULL,
  `ciudad` text CHARACTER SET latin1 NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `calle`, `num_in`, `num_ex`, `colonia`, `cp`, `ciudad`, `id_estado`) VALUES
(51, 'Paseo la Capilla', 1, 1, 'Manzana Primera', 50800, 'Jiquipilco', 11),
(52, 'CDMX', 1, 1, 'CMDX', 2710, 'CDMX', 7);

-- --------------------------------------------------------

--
-- Table structure for table `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `codigo` text CHARACTER SET latin1 NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `status` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `codigo`, `nombre`, `status`) VALUES
(1, '101', 'ELÉCTRICA', 'A'),
(2, '102', 'MECÁNICA', 'A'),
(3, '103', 'TUBERÍAS', 'A'),
(4, '104', 'ESTRUCTURAS', 'A'),
(5, '105', 'LÁMINA', 'A'),
(6, '106', 'OBRA CIVIL', 'A'),
(7, '107', 'INSTALACIONES', 'A'),
(8, '108', 'ACABADOS', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id_eq` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id_eq`, `nombre`, `total`) VALUES
(1, 'DOWN COILER', 848788),
(2, 'COIL HANDLING', 227724),
(3, 'KHSPM', 993703);

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` text CHARACTER SET latin1 NOT NULL,
  `status` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`, `status`) VALUES
(1, 'Aguascalientes', 'A'),
(2, 'Baja California', 'A'),
(3, 'Baja California Sur', 'A'),
(4, 'Campeche', 'A'),
(5, 'Chiapas', 'A'),
(6, 'Chihuahua', 'A'),
(7, 'Ciudad de México', 'A'),
(8, 'Coahuila', 'A'),
(9, 'Colima', 'A'),
(10, 'Durango', 'A'),
(11, 'Estado de México', 'A'),
(12, 'Guanajuato', 'A'),
(13, 'Guerrero', 'A'),
(14, 'Hidalgo', 'A'),
(15, 'Jalisco', 'A'),
(16, 'Michoacán', 'A'),
(17, 'Morelos', 'A'),
(18, 'Nayarit', 'A'),
(19, 'Nuevo León', 'A'),
(20, 'Oaxaca', 'A'),
(21, 'Puebla', 'A'),
(22, 'Querétaro', 'A'),
(23, 'Quintana Roo', 'A'),
(24, 'San Luis Potosí', 'A'),
(25, 'Sinaloa', 'A'),
(26, 'Sonora', 'A'),
(27, 'Tabasco', 'A'),
(28, 'Tamaulipas', 'A'),
(29, 'Tlaxcala', 'A'),
(30, 'Veracruz', 'A'),
(31, 'Yucatán', 'A'),
(32, 'Zacatecas', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `fya`
--

CREATE TABLE `fya` (
  `id_fya` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fya`
--

INSERT INTO `fya` (`id_fya`, `nombre`, `total`) VALUES
(2, 'INDIRECTOS', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `hyc`
--

CREATE TABLE `hyc` (
  `id_hyc` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hyc`
--

INSERT INTO `hyc` (`id_hyc`, `nombre`, `total`) VALUES
(2, 'INDIRECTOS', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `instalaciones`
--

CREATE TABLE `instalaciones` (
  `id_ins` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `instalaciones`
--

INSERT INTO `instalaciones` (`id_ins`, `nombre`, `total`) VALUES
(1, 'INDIRECTOS', 1070000);

-- --------------------------------------------------------

--
-- Table structure for table `mostrar_p`
--

CREATE TABLE `mostrar_p` (
  `id` int(11) NOT NULL,
  `id_pre` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `total` double NOT NULL,
  `pres` text CHARACTER SET latin1 NOT NULL,
  `id_proyecto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mostrar_p`
--

INSERT INTO `mostrar_p` (`id`, `id_pre`, `nombre`, `total`, `pres`, `id_proyecto`) VALUES
(131, 2, 'INDIRECTOS', 300000, 'Fletes y Acarreos', 5),
(132, 2, 'INDIRECTOS', 200000, 'Homologacion y Controles', 5),
(129, 3, 'KHSPM', 993703, 'Equipos, Herramientas y Consumibles', 5),
(130, 1, 'INDIRECTOS', 1900000, 'Administracion de Proyecto', 5),
(128, 2, 'COIL HANDLING', 227724, 'Equipos, Herramientas y Consumibles', 5),
(125, 1, 'INDIRECTO', 106835, 'Seguros y Fianzas', 5),
(126, 1, 'INDIRECTOS', 1070000, 'Instalaciones Provisionales', 5),
(127, 1, 'DOWN COILER', 848788, 'Equipos, Herramientas y Consumibles', 5),
(121, 1, 'DOWN COILER', 1648640, 'Costos Directos', 5),
(122, 2, 'COIL HANDLING', 464480, 'Costos Directos', 5),
(123, 3, 'KHSPM', 1927360, 'Costos Directos', 5),
(124, 4, 'TALLER', 3957921.44, 'Costos Directos', 5),
(120, 1, 'INDIRECTOS', 280000, 'Viajes y Traslados', 5),
(133, 2, 'COIL HANDLING', 227724, 'Equipos, Herramientas y Consumibles', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `notifico` int(11) NOT NULL,
  `asunto` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `id_user`, `fecha`, `notifico`, `asunto`, `status`) VALUES
(96, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - MECÁNICA - AGUA: $169,600', 'A'),
(97, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - MECÁNICA - AIRE: $13,440', 'A'),
(98, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - MECÁNICA - LUBRICACIÓN: $58,400', 'A'),
(99, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - MECÁNICA - GRASA: $35,840', 'A'),
(100, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - MECÁNICA - TUBING: $552,640', 'A'),
(101, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - MECÁNICA - HIDRÁULICO: $278,400', 'A'),
(102, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - MECÁNICA - SOPORTES ESTRUCTURAS: $43,040', 'A'),
(103, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - MECÁNICA - SOPORTES CATÁLOGO: $201,600', 'A'),
(104, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - MECÁNICA - ESPÁRRAGOS: $48,320', 'A'),
(105, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - MECÁNICA - PRUEBAS Y ETIQUETADO: $247,360', 'A'),
(106, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - MECÁNICA - AGUA: $20,640', 'A'),
(107, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - MECÁNICA - AIRE: $1,120', 'A'),
(108, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - MECÁNICA - TUBING: $229,440', 'A'),
(109, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - MECÁNICA - HIDRÁULICO: $88,640', 'A'),
(110, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - MECÁNICA - SOPORTES ESTRUCTURAS: $12,960', 'A'),
(111, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - MECÁNICA - SOPORTES CATÁLOGO: $52,160', 'A'),
(112, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - MECÁNICA - ESPÁRRAGOS: $320', 'A'),
(113, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - MECÁNICA - PRUEBAS Y ETIQUETADO: $59,200', 'A'),
(114, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - AGUA: $16,800', 'A'),
(115, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - AIRE: $28,640', 'A'),
(116, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - AIRE-ACEITE: $5,760', 'A'),
(117, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - LUBRICACIÓN: $20,800', 'A'),
(118, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - GRASA: $17,920', 'A'),
(119, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - TUBING: $763,040', 'A'),
(120, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - HIDRÁULICO: $328,480', 'A'),
(121, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - SOPORTES ESTRUCTURAS: $27,360', 'A'),
(122, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - SOPORTES CATÁLOGO: $205,120', 'A'),
(123, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - ESPÁRRAGOS: $18,400', 'A'),
(124, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - EQUIPO HIDRÁULICO: $176,000', 'A'),
(125, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - MECÁNICA - PRUEBAS Y ETIQUETADO: $319,040', 'A'),
(126, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - DOWN COILER - LAMINACIÓN - MECÁNICA - HERRAMIENTAS Y EQUIPO MENOR: $123,000', 'A'),
(127, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - DOWN COILER - LAMINACIÓN - MECÁNICA - EQUIPO MAYOR: $438,536', 'A'),
(128, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - DOWN COILER - LAMINACIÓN - MECÁNICA - CONSUMIBLES: $205,000', 'A'),
(129, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - DOWN COILER - LAMINACIÓN - MECÁNICA - ETIQUETAS: $41,000', 'A'),
(130, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - DOWN COILER - LAMINACIÓN - MECÁNICA - EPP: $41,252', 'A'),
(131, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - MECÁNICA - HERRAMIENTAS Y EQUIPO MENOR: $33,000', 'A'),
(132, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - MECÁNICA - EQUIPO MAYOR: $117,656', 'A'),
(133, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - MECÁNICA - CONSUMIBLES: $55,000', 'A'),
(134, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - MECÁNICA - ETIQUETAS: $11,000', 'A'),
(135, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - MECÁNICA - EPP: $11,068', 'A'),
(136, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - KHSPM - LAMINACIÓN - MECÁNICA - HERRAMIENTAS Y EQUIPO MENOR: $144,000', 'A'),
(137, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - KHSPM - LAMINACIÓN - MECÁNICA - EQUIPO  MAYOR: $513,408', 'A'),
(138, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - KHSPM - LAMINACIÓN - MECÁNICA - CONSUMIBLES: $240,000', 'A'),
(139, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - KHSPM - LAMINACIÓN - MECÁNICA - ETIQUETAS: $48,000', 'A'),
(140, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - KHSPM - LAMINACIÓN - MECÁNICA - EPP: $48,295', 'A'),
(158, 4, '2021-02-15', 3, 'CM-565 PM PQTE 1 - Administración de Proyecto - INDIRECTOS - LAMINACIÓN - MECÁNICA - SUPERVISOR TUBERÍAS: $195,000', 'A'),
(173, 6, '2021-02-16', 3, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - JEFE DE SEGURIDAD: $160,000', 'A'),
(174, 6, '2021-02-16', 3, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - SUPERVISOR SEGURIDAD: $100,000', 'A'),
(175, 6, '2021-02-16', 3, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - CALIDAD: $180,000', 'A'),
(176, 6, '2021-02-16', 3, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - AUXILIAR DE ALMACÉN: $125,000', 'A'),
(177, 6, '2021-02-16', 3, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - VELADORES: $90,000', 'A'),
(178, 6, '2021-02-16', 3, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - CHOFER: $90,000', 'A'),
(179, 6, '2021-02-16', 3, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - LIMPIEZA OFICINAS: $55,000', 'A'),
(180, 6, '2021-02-16', 3, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - GESTIÓN: $325,000', 'A'),
(185, 6, '2021-02-16', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÃ“N - TUBERÃAS - AGUA: 169600', 'A'),
(186, 6, '2021-02-16', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÃ“N - TUBERÃAS - AGUA: 169600', 'A'),
(187, 6, '2021-02-16', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÃ“N - TUBERÃAS - AIRE: 13000', 'A'),
(189, 2, '2021-02-22', 2, ': 1', 'A'),
(190, 2, '2021-02-23', 2, ': 10', 'A'),
(192, 2, '2021-02-22', 2, ': 1', 'A'),
(193, 2, '2021-02-23', 2, ': 10', 'A'),
(194, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 'A'),
(195, 2, '2021-02-22', 2, ': 1', 'A'),
(196, 2, '2021-02-23', 2, ': 10', 'A'),
(197, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 'A'),
(198, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 13440', 'A'),
(202, 2, '2021-02-22', 2, ': 1', 'A'),
(203, 2, '2021-02-23', 2, ': 10', 'A'),
(204, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 'A'),
(205, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 13440', 'A'),
(206, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 58400', 'A'),
(207, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 35840', 'A'),
(208, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 552640', 'A'),
(209, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 278400', 'A'),
(210, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 43040', 'A'),
(217, 2, '2021-02-22', 2, ': 1', 'A'),
(218, 2, '2021-02-23', 2, ': 10', 'A'),
(219, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 'A'),
(220, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 13440', 'A'),
(221, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 58400', 'A'),
(222, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 35840', 'A'),
(223, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 552640', 'A'),
(224, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 278400', 'A'),
(225, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 43040', 'A'),
(226, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 201600', 'A'),
(232, 2, '2021-02-22', 2, ': 1', 'A'),
(233, 2, '2021-02-23', 2, ': 10', 'A'),
(234, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 'A'),
(235, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 13440', 'A'),
(236, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 58400', 'A'),
(237, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 35840', 'A'),
(238, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 552640', 'A'),
(239, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 278400', 'A'),
(240, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 43040', 'A'),
(241, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 201600', 'A'),
(242, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 48320', 'A'),
(243, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 247360', 'A'),
(244, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 20640', 'A'),
(245, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 1120', 'A'),
(246, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 229440', 'A'),
(247, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 88640', 'A'),
(248, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 12960', 'A'),
(249, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 52160', 'A'),
(250, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 320', 'A'),
(251, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 59200', 'A'),
(263, 2, '2021-02-22', 2, ': 1', 'A'),
(264, 2, '2021-02-23', 2, ': 10', 'A'),
(265, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 'A'),
(266, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 13440', 'A'),
(267, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 58400', 'A'),
(268, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 35840', 'A'),
(269, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 552640', 'A'),
(270, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 278400', 'A'),
(271, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 43040', 'A'),
(272, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 201600', 'A'),
(273, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 48320', 'A'),
(274, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 247360', 'A'),
(275, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 20640', 'A'),
(276, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 1120', 'A'),
(277, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 229440', 'A'),
(278, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 88640', 'A'),
(279, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 12960', 'A'),
(280, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 52160', 'A'),
(281, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 320', 'A'),
(282, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 59200', 'A'),
(283, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 16800', 'A'),
(294, 2, '2021-02-22', 2, ': 1', 'A'),
(295, 2, '2021-02-23', 2, ': 10', 'A'),
(296, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 'A'),
(297, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 13440', 'A'),
(298, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 58400', 'A'),
(299, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 35840', 'A'),
(300, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 552640', 'A'),
(301, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 278400', 'A'),
(302, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 43040', 'A'),
(303, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 201600', 'A'),
(304, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 48320', 'A'),
(305, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 247360', 'A'),
(306, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 20640', 'A'),
(307, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 1120', 'A'),
(308, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 229440', 'A'),
(309, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 88640', 'A'),
(310, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 12960', 'A'),
(311, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 52160', 'A'),
(312, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 320', 'A'),
(313, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 59200', 'A'),
(314, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 16800', 'A'),
(315, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 28640', 'A'),
(316, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE-ACEITE: 5760', 'A'),
(317, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 20800', 'A'),
(318, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 17920', 'A'),
(319, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 763040', 'A'),
(320, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 328480', 'A'),
(325, 2, '2021-02-22', 2, ': 1', 'A'),
(326, 2, '2021-02-23', 2, ': 10', 'A'),
(327, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 'A'),
(328, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 13440', 'A'),
(329, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 58400', 'A'),
(330, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 35840', 'A'),
(331, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 552640', 'A'),
(332, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 278400', 'A'),
(333, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 43040', 'A'),
(334, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 201600', 'A'),
(335, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 48320', 'A'),
(336, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 247360', 'A'),
(337, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 20640', 'A'),
(338, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 1120', 'A'),
(339, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 229440', 'A'),
(340, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 88640', 'A'),
(341, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 12960', 'A'),
(342, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 52160', 'A'),
(343, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 320', 'A'),
(344, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 59200', 'A'),
(345, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 16800', 'A'),
(346, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 28640', 'A'),
(347, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE-ACEITE: 5760', 'A'),
(348, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 20800', 'A'),
(349, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 17920', 'A'),
(350, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 763040', 'A'),
(351, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 328480', 'A'),
(352, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 27360', 'A'),
(353, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 205120', 'A'),
(354, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 18400', 'A'),
(355, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - EQUIPO HIDRÁULICO: 176000', 'A'),
(356, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 319040', 'A'),
(357, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 123000', 'A'),
(358, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO MAYOR: 438536', 'A'),
(359, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: 205000', 'A'),
(360, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 41000', 'A'),
(361, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EPP: 11068', 'A'),
(362, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 144000', 'A'),
(363, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO  MAYOR: 513408', 'A'),
(364, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: 240000', 'A'),
(365, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 48000', 'A'),
(366, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EPP: 48295', 'A'),
(367, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Administración de Proyecto - LAMINACIÓN - TUBERÍAS - SUPERVISOR TUBERÍAS: 195000', 'A'),
(388, 2, '2021-02-22', 2, ': 1', 'A'),
(389, 2, '2021-02-23', 2, ': 10', 'A'),
(390, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 'A'),
(391, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 13440', 'A'),
(392, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 58400', 'A'),
(393, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 35840', 'A'),
(394, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 552640', 'A'),
(395, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 278400', 'A'),
(396, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 43040', 'A'),
(397, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 201600', 'A'),
(398, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 48320', 'A'),
(399, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 247360', 'A'),
(400, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 20640', 'A'),
(401, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 1120', 'A'),
(402, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 229440', 'A'),
(403, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 88640', 'A'),
(404, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 12960', 'A'),
(405, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 52160', 'A'),
(406, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 320', 'A'),
(407, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 59200', 'A'),
(408, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 16800', 'A'),
(409, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 28640', 'A'),
(410, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE-ACEITE: 5760', 'A'),
(411, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 20800', 'A'),
(412, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 17920', 'A'),
(413, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 763040', 'A'),
(414, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 328480', 'A'),
(415, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 27360', 'A'),
(416, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 205120', 'A'),
(417, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 18400', 'A'),
(418, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - EQUIPO HIDRÁULICO: 176000', 'A'),
(419, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 319040', 'A'),
(420, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 123000', 'A'),
(421, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO MAYOR: 438536', 'A'),
(422, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: 205000', 'A'),
(423, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 41000', 'A'),
(424, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EPP: 11068', 'A'),
(425, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 144000', 'A'),
(426, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO  MAYOR: 513408', 'A'),
(427, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: 240000', 'A'),
(428, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 48000', 'A'),
(429, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EPP: 48295', 'A'),
(430, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Administración de Proyecto - LAMINACIÓN - TUBERÍAS - SUPERVISOR TUBERÍAS: 195000', 'A'),
(431, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 33000', 'A'),
(432, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO MAYOR: 117656', 'A'),
(433, 6, '2021-03-03', 4, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 11000', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `id_telefono` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `status` varchar(2) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `id_direccion`, `id_telefono`, `id_usuario`, `status`) VALUES
(19, 'Fernando Dávila Aguilar', 51, 47, 46, 'A'),
(20, 'Iasiri Ortiz', 52, 48, 47, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `presupuestos`
--

CREATE TABLE `presupuestos` (
  `vyt` int(11) DEFAULT NULL,
  `co` int(11) DEFAULT NULL,
  `seg` int(11) DEFAULT NULL,
  `ins` int(11) DEFAULT NULL,
  `eq` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `fya` int(11) DEFAULT NULL,
  `hyc` int(11) DEFAULT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `presupuestos`
--

INSERT INTO `presupuestos` (`vyt`, `co`, `seg`, `ins`, `eq`, `admin`, `fya`, `hyc`, `id_proyecto`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 5),
(NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 5),
(NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 5),
(NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 5),
(NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 5),
(NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 5),
(NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 5),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `privilegios`
--

CREATE TABLE `privilegios` (
  `id_priv` int(11) NOT NULL,
  `privilegio` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `privilegios`
--

INSERT INTO `privilegios` (`id_priv`, `privilegio`) VALUES
(1, 'Crear Puestos'),
(2, 'Asignar Puestos'),
(3, 'Agregar Usuarios'),
(4, 'Crear Áreas'),
(5, 'Crear Disciplinas'),
(6, 'Crear Presupuestos'),
(7, 'Ver Presupuestos'),
(8, 'Asignar Presupuesto a Gerentes'),
(9, 'Crear Proyectos'),
(10, 'Ver Proyectos'),
(11, 'Otorgar Privilegios'),
(12, 'Asignar Presupuesto a Superintendente'),
(13, 'Ver Presupuestos Gerentes'),
(14, 'Ver Presupuestos Superintendente'),
(15, 'Asignar Presupuesto a Supervisor'),
(16, 'Ver Presupuesto Supervisor'),
(17, 'Crear Categoria');

-- --------------------------------------------------------

--
-- Table structure for table `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `presupuesto` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `nombre`, `presupuesto`) VALUES
(5, 'CM-565 PM PQTE 1', 13925451.44);

-- --------------------------------------------------------

--
-- Table structure for table `puesto`
--

CREATE TABLE `puesto` (
  `id_puesto` int(11) NOT NULL,
  `puesto` text CHARACTER SET latin1 NOT NULL,
  `status` varchar(1) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `puesto`
--

INSERT INTO `puesto` (`id_puesto`, `puesto`, `status`) VALUES
(1, 'GERENTE DE PRODUCCIÃ“N', 'A'),
(2, 'SUPERINTENDENTE', 'A'),
(3, 'SUPERVISOR', 'A'),
(4, 'GERENTE DE GESTIÃ“N', 'A'),
(5, 'COMPRAS Y ALMACENES', 'A'),
(6, 'ADMINISTRACIÃ“N', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `seguros`
--

CREATE TABLE `seguros` (
  `id_seg` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seguros`
--

INSERT INTO `seguros` (`id_seg`, `nombre`, `total`) VALUES
(1, 'INDIRECTO', 106835);

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `tipo` text CHARACTER SET latin1 NOT NULL,
  `id_pres` text CHARACTER SET latin1 NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_disc` int(11) NOT NULL,
  `concepto` text CHARACTER SET latin1 NOT NULL,
  `id_per_pues` int(11) NOT NULL,
  `presupuesto` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tareas`
--

INSERT INTO `tareas` (`id`, `id_proyecto`, `tipo`, `id_pres`, `id_area`, `id_disc`, `concepto`, `id_per_pues`, `presupuesto`, `nombre`) VALUES
(85, 6, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 2, 329, 'Prueba - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: $329'),
(39, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'AGUA', 4, 169600, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - TUBERÍAS - AGUA: $169,600'),
(40, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'AIRE', 4, 13440, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - TUBERÍAS - AIRE: $13,440'),
(41, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'LUBRICACIÓN', 4, 58400, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: $58,400'),
(42, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'GRASA', 4, 35840, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - TUBERÍAS - GRASA: $35,840'),
(43, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'TUBING', 4, 552640, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - TUBERÍAS - TUBING: $552,640'),
(44, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'HIDRÁULICO', 4, 278400, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: $278,400'),
(45, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'SOPORTES ESTRUCTURAS', 4, 43040, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: $43,040'),
(46, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'SOPORTES CATÁLOGO', 4, 201600, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: $201,600'),
(47, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'ESPÁRRAGOS', 4, 48320, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: $48,320'),
(48, 5, 'Costos Directos', 'DOWN COILER', 2, 3, 'PRUEBAS Y ETIQUETADO', 4, 247360, 'CM-565 PM PQTE 1 - Costos Directos - DOWN COILER - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: $247,360'),
(49, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'AGUA', 4, 20640, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - TUBERÍAS - AGUA: $20,640'),
(50, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'AIRE', 4, 1120, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - TUBERÍAS - AIRE: $1,120'),
(51, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'TUBING', 4, 229440, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - TUBERÍAS - TUBING: $229,440'),
(52, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'HIDRÁULICO', 4, 88640, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: $88,640'),
(53, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'SOPORTES ESTRUCTURAS', 4, 12960, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: $12,960'),
(54, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'SOPORTES CATÁLOGO', 4, 52160, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: $52,160'),
(55, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'ESPÁRRAGOS', 4, 320, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: $320'),
(56, 5, 'Costos Directos', 'COIL HANDLING', 2, 3, 'PRUEBAS Y ETIQUETADO', 4, 59200, 'CM-565 PM PQTE 1 - Costos Directos - COIL HANDLING - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: $59,200'),
(57, 5, 'Costos Directos', 'KHSPM', 2, 3, 'AGUA', 4, 16800, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - AGUA: $16,800'),
(58, 5, 'Costos Directos', 'KHSPM', 2, 3, 'AIRE', 4, 28640, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - AIRE: $28,640'),
(59, 5, 'Costos Directos', 'KHSPM', 2, 3, 'AIRE-ACEITE', 4, 5760, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - AIRE-ACEITE: $5,760'),
(60, 5, 'Costos Directos', 'KHSPM', 2, 3, 'LUBRICACIÓN', 4, 20800, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: $20,800'),
(61, 5, 'Costos Directos', 'KHSPM', 2, 3, 'GRASA', 4, 17920, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - GRASA: $17,920'),
(62, 5, 'Costos Directos', 'KHSPM', 2, 3, 'TUBING', 4, 763040, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - TUBING: $763,040'),
(63, 5, 'Costos Directos', 'KHSPM', 2, 3, 'HIDRÁULICO', 4, 328480, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: $328,480'),
(64, 5, 'Costos Directos', 'KHSPM', 2, 3, 'SOPORTES ESTRUCTURAS', 4, 27360, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: $27,360'),
(65, 5, 'Costos Directos', 'KHSPM', 2, 3, 'SOPORTES CATÁLOGO', 4, 205120, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: $205,120'),
(66, 5, 'Costos Directos', 'KHSPM', 2, 3, 'ESPÁRRAGOS', 4, 18400, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: $18,400'),
(67, 5, 'Costos Directos', 'KHSPM', 2, 3, 'EQUIPO HIDRÁULICO', 4, 176000, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - EQUIPO HIDRÁULICO: $176,000'),
(68, 5, 'Costos Directos', 'KHSPM', 2, 3, 'PRUEBAS Y ETIQUETADO', 4, 319040, 'CM-565 PM PQTE 1 - Costos Directos - KHSPM - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: $319,040'),
(69, 5, 'Equipos, Herramientas y Consumibles', 'DOWN COILER', 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 4, 123000, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - DOWN COILER - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: $123,000'),
(70, 5, 'Equipos, Herramientas y Consumibles', 'DOWN COILER', 2, 3, 'EQUIPO MAYOR', 4, 438536, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - DOWN COILER - LAMINACIÓN - TUBERÍAS - EQUIPO MAYOR: $438,536'),
(71, 5, 'Equipos, Herramientas y Consumibles', 'DOWN COILER', 2, 3, 'CONSUMIBLES', 4, 205000, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - DOWN COILER - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: $205,000'),
(72, 5, 'Equipos, Herramientas y Consumibles', 'DOWN COILER', 2, 3, 'ETIQUETAS', 4, 41000, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - DOWN COILER - LAMINACIÓN - TUBERÍAS - ETIQUETAS: $41,000'),
(73, 5, 'Equipos, Herramientas y Consumibles', 'DOWN COILER', 2, 3, 'EPP', 4, 41252, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - DOWN COILER - LAMINACIÓN - TUBERÍAS - EPP: $41,252'),
(74, 5, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 4, 33000, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: $33,000'),
(75, 5, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'EQUIPO MAYOR', 4, 117656, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - TUBERÍAS - EQUIPO MAYOR: $117,656'),
(76, 5, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'CONSUMIBLES', 4, 55000, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: $55,000'),
(77, 5, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'ETIQUETAS', 4, 11000, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - TUBERÍAS - ETIQUETAS: $11,000'),
(78, 5, 'Equipos, Herramientas y Consumibles', 'COIL HANDLING', 2, 3, 'EPP', 4, 11068, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - COIL HANDLING - LAMINACIÓN - TUBERÍAS - EPP: $11,068'),
(79, 5, 'Equipos, Herramientas y Consumibles', 'KHSPM', 2, 3, 'HERRAMIENTAS Y EQUIPO MENOR', 4, 144000, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - KHSPM - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: $144,000'),
(80, 5, 'Equipos, Herramientas y Consumibles', 'KHSPM', 2, 3, 'EQUIPO  MAYOR', 4, 513408, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - KHSPM - LAMINACIÓN - TUBERÍAS - EQUIPO  MAYOR: $513,408'),
(81, 5, 'Equipos, Herramientas y Consumibles', 'KHSPM', 2, 3, 'CONSUMIBLES', 4, 240000, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - KHSPM - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: $240,000'),
(82, 5, 'Equipos, Herramientas y Consumibles', 'KHSPM', 2, 3, 'ETIQUETAS', 4, 48000, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - KHSPM - LAMINACIÓN - TUBERÍAS - ETIQUETAS: $48,000'),
(83, 5, 'Equipos, Herramientas y Consumibles', 'KHSPM', 2, 3, 'EPP', 4, 48295, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - KHSPM - LAMINACIÓN - TUBERÍAS - EPP: $48,295'),
(84, 5, 'Administración de Proyecto', 'INDIRECTOS', 2, 3, 'SUPERVISOR TUBERÍAS', 4, 195000, 'CM-565 PM PQTE 1 - Administración de Proyecto - INDIRECTOS - LAMINACIÓN - TUBERÍAS - SUPERVISOR TUBERÍAS: $195,000'),
(86, 5, 'Administración de Proyecto', 'INDIRECTOS', 2, 3, 'JEFE DE SEGURIDAD', 6, 160000, 'CM-565 PM PQTE 1 - Administración de Proyecto - INDIRECTOS - LAMINACIÓN - TUBERÍAS - JEFE DE SEGURIDAD: $160,000'),
(87, 5, 'Administración de Proyecto', 'INDIRECTOS', 2, 3, 'SUPERVISOR SEGURIDAD', 6, 100000, 'CM-565 PM PQTE 1 - Administración de Proyecto - INDIRECTOS - LAMINACIÓN - TUBERÍAS - SUPERVISOR SEGURIDAD: $100,000'),
(88, 5, 'Administración de Proyecto', 'INDIRECTOS', 2, 3, 'CALIDAD', 6, 180000, 'CM-565 PM PQTE 1 - Administración de Proyecto - INDIRECTOS - LAMINACIÓN - TUBERÍAS - CALIDAD: $180,000'),
(89, 5, 'Administración de Proyecto', 'INDIRECTOS', 2, 3, 'AUXILIAR DE ALMACÉN', 6, 125000, 'CM-565 PM PQTE 1 - Administración de Proyecto - INDIRECTOS - LAMINACIÓN - TUBERÍAS - AUXILIAR DE ALMACÉN: $125,000'),
(90, 5, 'Administración de Proyecto', 'INDIRECTOS', 2, 3, 'VELADORES', 6, 90000, 'CM-565 PM PQTE 1 - Administración de Proyecto - INDIRECTOS - LAMINACIÓN - TUBERÍAS - VELADORES: $90,000'),
(91, 5, 'Administración de Proyecto', 'INDIRECTOS', 2, 3, 'CHOFER', 6, 90000, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - CHOFER: $90,000'),
(92, 5, 'Administración de Proyecto', 'INDIRECTOS', 2, 3, 'LIMPIEZA OFICINAS', 6, 55000, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - LIMPIEZA OFICINAS: $55,000'),
(93, 5, 'Administración de Proyecto', 'INDIRECTOS', 2, 3, 'GESTIÓN', 6, 325000, 'CM-565 PM PQTE 1 - AdministraciÃ³n de Proyecto - INDIRECTOS - LAMINACIÃ“N - MECÃNICA - GESTIÓN: $325,000');

-- --------------------------------------------------------

--
-- Table structure for table `tareas2`
--

CREATE TABLE `tareas2` (
  `id` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `tarea` text COLLATE utf8_unicode_ci NOT NULL,
  `presupuesto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tareas2`
--

INSERT INTO `tareas2` (`id`, `id_tarea`, `id_cuenta`, `tarea`, `presupuesto`) VALUES
(16, 85, 2, ': 1', 1),
(17, 85, 2, ': 10', 10),
(19, 39, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 169600', 169600),
(20, 40, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 13440', 13440),
(21, 41, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 58400', 58400),
(22, 42, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 35840', 35840),
(23, 43, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 552640', 552640),
(24, 44, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 278400', 278400),
(25, 45, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 43040', 43040),
(28, 46, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 201600', 201600),
(29, 47, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 48320', 48320),
(30, 48, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 247360', 247360),
(31, 49, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 20640', 20640),
(32, 50, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 1120', 1120),
(33, 51, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 229440', 229440),
(34, 52, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 88640', 88640),
(35, 53, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 12960', 12960),
(36, 54, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 52160', 52160),
(37, 55, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 320', 320),
(38, 56, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 59200', 59200),
(44, 57, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AGUA: 16800', 16800),
(45, 58, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE: 28640', 28640),
(46, 59, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - AIRE-ACEITE: 5760', 5760),
(47, 60, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - LUBRICACIÓN: 20800', 20800),
(48, 61, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - GRASA: 17920', 17920),
(49, 62, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - TUBING: 763040', 763040),
(50, 63, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - HIDRÁULICO: 328480', 328480),
(52, 64, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES ESTRUCTURAS: 27360', 27360),
(53, 65, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - SOPORTES CATÁLOGO: 205120', 205120),
(54, 66, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - ESPÁRRAGOS: 18400', 18400),
(55, 67, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - EQUIPO HIDRÁULICO: 176000', 176000),
(56, 68, 6, 'CM-565 PM PQTE 1 - Costos Directos - LAMINACIÓN - TUBERÍAS - PRUEBAS Y ETIQUETADO: 319040', 319040),
(57, 69, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 123000', 123000),
(58, 70, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO MAYOR: 438536', 438536),
(59, 71, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: 205000', 205000),
(60, 72, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 41000', 41000),
(61, 78, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EPP: 11068', 11068),
(62, 79, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 144000', 144000),
(63, 80, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO  MAYOR: 513408', 513408),
(64, 81, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - CONSUMIBLES: 240000', 240000),
(65, 82, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 48000', 48000),
(66, 83, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EPP: 48295', 48295),
(67, 84, 6, 'CM-565 PM PQTE 1 - Administración de Proyecto - LAMINACIÓN - TUBERÍAS - SUPERVISOR TUBERÍAS: 195000', 195000),
(83, 74, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - HERRAMIENTAS Y EQUIPO MENOR: 33000', 33000),
(84, 75, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - EQUIPO MAYOR: 117656', 117656),
(85, 77, 6, 'CM-565 PM PQTE 1 - Equipos, Herramientas y Consumibles - LAMINACIÓN - TUBERÍAS - ETIQUETAS: 11000', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `tareas3`
--

CREATE TABLE `tareas3` (
  `id` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_res` int(11) NOT NULL,
  `hh` int(11) NOT NULL,
  `hh_r` int(11) DEFAULT NULL,
  `em` int(11) NOT NULL,
  `em_t` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `telefono`
--

CREATE TABLE `telefono` (
  `id_telefono` int(11) NOT NULL,
  `telefono` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `telefono`
--

INSERT INTO `telefono` (`id_telefono`, `telefono`) VALUES
(47, '7123207529'),
(48, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `trabajador`
--

CREATE TABLE `trabajador` (
  `id` int(11) NOT NULL,
  `Fecha_de_Movimiento` text COLLATE utf8_unicode_ci NOT NULL,
  `NSS` text COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `Apellido_Paterno` text COLLATE utf8_unicode_ci NOT NULL,
  `Apellido_Materno` text COLLATE utf8_unicode_ci NOT NULL,
  `Movimiento` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trabajador`
--

INSERT INTO `trabajador` (`id`, `Fecha_de_Movimiento`, `NSS`, `Nombre`, `Apellido_Paterno`, `Apellido_Materno`, `Movimiento`) VALUES
(6, '2021-03-01', '67129415278', 'JULIO CESAR', 'MARTINEZ', 'MARTINEZ', 'Alta'),
(13, '01/03/2021', '67129415278', 'FERNANDO', 'DÁVILA', 'AGUILAR', 'Alta'),
(14, '01/03/2021', '13169683565', 'PATRICIO', 'PADUA', 'MARTINEZ', ''),
(15, '01/03/2021', '61937404962', 'ERICK GABRIEL', 'GARCIA', 'DE LOS ANGELES', ''),
(16, '01/03/2021', '67967955096', 'NAZARIO', 'CHONTAL', 'ATEN', ''),
(17, '01/03/2021', '67796209541', 'NATHAN', 'CHONTAL', 'ATEN', ''),
(18, '01/03/2021', '22130040359', 'IRVIN JOSMAR', 'GARCIA', 'CASTREJON', ''),
(19, '01/03/2021', '67058633966', 'VICTOR MANUEL', 'MOLINA', 'ACOSTA', ''),
(20, '01/03/2021', '73169411847', 'OSCAR', 'OVANDO', 'HERNANDEZ', ''),
(21, '01/03/2021', '13876930051', 'BENJAMIN', 'TREJO', 'RAMIREZ', ''),
(22, '01/03/2021', '13927703572', 'ROBERTO CARLOS', 'TREJO', 'RAMIREZ', ''),
(23, '01/03/2021', '27149171665', 'OSVALDO', 'ABURTO ', 'RUIZ', ''),
(24, '01/03/2021', '16927247888', 'JAVIER', 'JIMENEZ', 'SOTERO', ''),
(25, '01/03/2021', '67028408002', 'WILBERT ALFRIT', 'AGUILAR', 'GONZALEZ', ''),
(26, '01/03/2021', '67098405490', 'VICTOR ALFONSO', 'RAMOS', 'RIOS', ''),
(27, '01/03/2021', '61068802034', 'ALFONSO', 'Gonzalez', 'Sanchez', ''),
(28, '01/03/2021', '92149102839', 'RAMON EDUARDO', 'MENDEZ', 'BARAJAS', ''),
(29, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `password` text CHARACTER SET latin1,
  `email` text CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_user`, `password`, `email`) VALUES
(46, '$2y$10$9h8cRcJm5yjgNGJTUOu6KemfwvA2rk8s7EX5sYcnyqx3EyrfS3uKq', 'ferdvl98@gmail.com'),
(47, '$2y$10$0s8QCYmTQ1KlDqbOQdbS8OvCDZj9tarFBge0Oefq6wAhsAllVUeka', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vyt`
--

CREATE TABLE `vyt` (
  `id_vyt` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vyt`
--

INSERT INTO `vyt` (`id_vyt`, `nombre`, `total`) VALUES
(1, 'INDIRECTOS', 280000),
(6, 'Prueba', 15000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asig_priv`
--
ALTER TABLE `asig_priv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `as_puesto`
--
ALTER TABLE `as_puesto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aux_admin`
--
ALTER TABLE `aux_admin`
  ADD PRIMARY KEY (`a`);

--
-- Indexes for table `aux_aux`
--
ALTER TABLE `aux_aux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aux_aux_pre`
--
ALTER TABLE `aux_aux_pre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aux_co`
--
ALTER TABLE `aux_co`
  ADD PRIMARY KEY (`a`);

--
-- Indexes for table `aux_concepto`
--
ALTER TABLE `aux_concepto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aux_concepto2`
--
ALTER TABLE `aux_concepto2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aux_eq`
--
ALTER TABLE `aux_eq`
  ADD PRIMARY KEY (`a`);

--
-- Indexes for table `aux_fya`
--
ALTER TABLE `aux_fya`
  ADD PRIMARY KEY (`a`);

--
-- Indexes for table `aux_hyc`
--
ALTER TABLE `aux_hyc`
  ADD PRIMARY KEY (`a`);

--
-- Indexes for table `aux_ins`
--
ALTER TABLE `aux_ins`
  ADD PRIMARY KEY (`a`);

--
-- Indexes for table `aux_noti`
--
ALTER TABLE `aux_noti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aux_seg`
--
ALTER TABLE `aux_seg`
  ADD PRIMARY KEY (`a`);

--
-- Indexes for table `aux_tareas`
--
ALTER TABLE `aux_tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aux_tareas2`
--
ALTER TABLE `aux_tareas2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aux_tareas3`
--
ALTER TABLE `aux_tareas3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aux_tareas3_2`
--
ALTER TABLE `aux_tareas3_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aux_vty`
--
ALTER TABLE `aux_vty`
  ADD PRIMARY KEY (`a`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co`
--
ALTER TABLE `co`
  ADD PRIMARY KEY (`id_co`);

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `FK_estado` (`id_estado`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_eq`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `fya`
--
ALTER TABLE `fya`
  ADD PRIMARY KEY (`id_fya`);

--
-- Indexes for table `hyc`
--
ALTER TABLE `hyc`
  ADD PRIMARY KEY (`id_hyc`);

--
-- Indexes for table `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`id_ins`);

--
-- Indexes for table `mostrar_p`
--
ALTER TABLE `mostrar_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `FK-direccion` (`id_direccion`),
  ADD KEY `FK-telefono` (`id_telefono`),
  ADD KEY `FK-usuario` (`id_usuario`);

--
-- Indexes for table `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id_priv`);

--
-- Indexes for table `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indexes for table `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id_puesto`);

--
-- Indexes for table `seguros`
--
ALTER TABLE `seguros`
  ADD PRIMARY KEY (`id_seg`);

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tareas2`
--
ALTER TABLE `tareas2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tareas3`
--
ALTER TABLE `tareas3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id_telefono`);

--
-- Indexes for table `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vyt`
--
ALTER TABLE `vyt`
  ADD PRIMARY KEY (`id_vyt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `asig_priv`
--
ALTER TABLE `asig_priv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `as_puesto`
--
ALTER TABLE `as_puesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `aux_admin`
--
ALTER TABLE `aux_admin`
  MODIFY `a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `aux_aux`
--
ALTER TABLE `aux_aux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `aux_aux_pre`
--
ALTER TABLE `aux_aux_pre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `aux_co`
--
ALTER TABLE `aux_co`
  MODIFY `a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `aux_concepto`
--
ALTER TABLE `aux_concepto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `aux_concepto2`
--
ALTER TABLE `aux_concepto2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `aux_eq`
--
ALTER TABLE `aux_eq`
  MODIFY `a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `aux_fya`
--
ALTER TABLE `aux_fya`
  MODIFY `a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aux_hyc`
--
ALTER TABLE `aux_hyc`
  MODIFY `a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aux_ins`
--
ALTER TABLE `aux_ins`
  MODIFY `a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `aux_noti`
--
ALTER TABLE `aux_noti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `aux_seg`
--
ALTER TABLE `aux_seg`
  MODIFY `a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aux_tareas`
--
ALTER TABLE `aux_tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `aux_tareas2`
--
ALTER TABLE `aux_tareas2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `aux_tareas3`
--
ALTER TABLE `aux_tareas3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `aux_tareas3_2`
--
ALTER TABLE `aux_tareas3_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `aux_vty`
--
ALTER TABLE `aux_vty`
  MODIFY `a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `co`
--
ALTER TABLE `co`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_eq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `fya`
--
ALTER TABLE `fya`
  MODIFY `id_fya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hyc`
--
ALTER TABLE `hyc`
  MODIFY `id_hyc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instalaciones`
--
ALTER TABLE `instalaciones`
  MODIFY `id_ins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mostrar_p`
--
ALTER TABLE `mostrar_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id_priv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `puesto`
--
ALTER TABLE `puesto`
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seguros`
--
ALTER TABLE `seguros`
  MODIFY `id_seg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tareas2`
--
ALTER TABLE `tareas2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tareas3`
--
ALTER TABLE `tareas3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id_telefono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `vyt`
--
ALTER TABLE `vyt`
  MODIFY `id_vyt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
