-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2019 a las 22:21:02
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estadisticas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gastos` int(200) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `categoria` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gastos`, `fecha`, `descripcion`, `cantidad`, `categoria`) VALUES
(1, '2017-12-01', 'balanceado para pollos B.V. 497', '340.00', 4),
(2, '2017-12-01', 'Mantenimiento de picadora B.V. 824', '50.00', 3),
(3, '2017-12-04', 'Pernos para picadora B.V. 644', '20.00', 5),
(4, '2017-12-05', 'materiales para pintar local institucional B.V.14405', '100.00', 5),
(5, '2017-12-05', 'materiales para pintar B.V.14404', '396.00', 5),
(6, '2017-12-06', 'pago para cambiar vidrios B.V. 515', '178.00', 5),
(7, '2017-12-06', 'papel bond cuadernillos B.V. 3703', '90.00', 5),
(8, '2017-12-06', 'balanceado para pollos B.V. 499', '140.00', 5),
(9, '2017-12-07', 'pinturas para local B.V. 14413', '32.00', 5),
(10, '2017-12-07', 'florescentes para patio B.V. 14414', '30.00', 5),
(11, '2017-12-07', 'combustible para movilidad local B.V 17902', '5.00', 5),
(12, '2017-12-09', 'Balanceado para pollos B.V.795', '140.00', 5),
(13, '2017-12-11', 'Pintura esmalte y brocha para pintar rejas BV. 6213', '52.50', 5),
(14, '2017-12-12', 'Papel bond para fotocopias B.V. 3714', '30.00', 5),
(15, '2017-12-12', 'Balanceado para polloos B.V.794', '140.00', 5),
(16, '2017-12-12', 'Pago de autoavaluo 2017 R.N?6341-2017', '3.00', 5),
(17, '2017-12-12', 'Materiales para topico veterinario B.V.1620', '153.00', 5),
(18, '2017-12-13', 'Combustible transporte de arado B.V.16797', '25.00', 5),
(19, '2017-12-14', 'Biaticos curso capacitacion Amparo DJ', '130.00', 5),
(20, '2017-12-14', 'Petroleo para tractor B.V. 16809', '120.00', 5),
(21, '2017-12-15', 'Biaticos curso capacitacion Anibal DJ', '80.00', 5),
(22, '2017-12-15', 'Biaticos curso capacitacion Alex Pozo DJ', '80.00', 5),
(23, '2017-12-15', 'Jornal ensilado de chala Planilla N? ', '360.00', 5),
(24, '2017-12-15', 'Cintas de Embalaje y otros BV. 652', '27.00', 5),
(25, '2017-12-16', 'Pago por banderolas bordadas B.V. 37', '1300.00', 5),
(26, '2017-12-18', 'Biaticos curso capacitacion Pedro y Adelina DJ', '160.00', 5),
(27, '2017-12-18', 'por consumo firma con la filial B.V. 34053', '260.00', 5),
(28, '2017-12-18', 'Pintado y reparaci?n de puerta principal B.V. 183', '200.00', 5),
(29, '2017-12-19', 'Pernos y fierro para tractor B.V. 654', '39.00', 5),
(30, '2017-12-20', 'Detergente para limpieza laboratorios B.V. 2146', '12.00', 5),
(31, '2017-12-20', 'Papel bond fotocopias B.V. 16075', '30.00', 5),
(32, '2017-12-21', 'Bizcochos para chocolatada navide?a B.V. 63', '200.00', 5),
(33, '2017-12-21', 'Biaticos curso capacitacion MINEDU Amparo DJ.', '150.00', 5),
(34, '2017-12-22', 'Pago por levantamiento topografico B.V.1520', '350.00', 5),
(35, '2017-12-26', 'Pago por polos deportivos/estudiantes B.V.502', '950.00', 5),
(36, '2017-12-26', 'Bornes de bater?a y otros B.V. 14537', '15.60', 5),
(37, '2017-12-23', 'Compra de semilla de maiz para I campa?a BV.3299', '2996.00', 5),
(38, '2017-12-28', 'Actualizacion del estudio de planos R.H.E. N?E001-2', '3500.00', 5),
(39, '2017-12-28', 'Por consumo en aniversario de creacion B.V.133', '169.00', 5),
(40, '2017-12-28', 'Pasajes Comision Abancay-Curahuasi B.V.8007', '12.00', 5),
(41, '2017-12-28', 'Pasajes Comision Abancay-Curahuasi B.V.8008', '12.00', 5),
(42, '2017-12-28', 'Pasajes Comision Abancay-Curahuasi B.V.8009', '12.00', 5),
(43, '2017-12-28', 'Pasajes Comision Abancay-Curahuasi B.V.8010', '12.00', 5),
(44, '2017-12-29', 'Pasajes Comision Curahuasi-Abancay B.V.5521', '15.00', 5),
(45, '2017-12-31', 'Pago por dictado de clases extras Planilla N?', '2970.00', 5),
(46, '2017-12-31', 'Vi?ticos por viaje a filial IESTP Turpo planilla N?', '1400.00', 5),
(47, '2017-12-31', 'Vi?ticos en com a fiest del ni?o jesus planilla N? ', '500.00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id_ingresos` int(200) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` varchar(200) NOT NULL,
  `categoria` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id_ingresos`, `fecha`, `descripcion`, `cantidad`, `categoria`) VALUES
(1, '2017-12-01', 'A/C cuadernillo Santos caceres R. 6934', '20.00', 2),
(2, '2017-12-01', 'Examen de recuperacion Choccata Ovalle R. 6992', '30.00', 6),
(3, '2017-12-04', 'Sustentacion Exa. Mamani Reinoso R. 6949', '20.00', 6),
(4, '2017-12-04', 'Constancia aprobacion Mamani Reynoso R. 6950', '10.00', 6),
(5, '2017-12-04', 'Derecho examen Grado Mamani Reynoso R. 6951', '180.00', 6),
(6, '2017-12-04', 'Balotario Mamani Reynoso R. 6952', '20.00', 6),
(7, '2017-12-04', 'Sustentacion Exa. Jenni Morales R. 6945', '20.00', 6),
(8, '2017-12-04', 'Constancia aprovacion Prac. Jenni Morales R. 6946', '10.00', 6),
(9, '2017-12-04', 'Derecho examen grado Jenni Morales R. 6947', '180.00', 6),
(10, '2017-12-04', 'Balotario Jenni Morales R. 6948', '20.00', 6),
(11, '2017-12-04', 'Sustentacion Examen Sufic. Guardapucclla R. 6953', '20.00', 6),
(12, '2017-12-04', 'Const. Aprob. Prac. Guardapucclla R. 6954', '10.00', 6),
(13, '2017-12-04', 'Derecho examen de grado Guardapucclla R. 6955', '180.00', 6),
(14, '2017-12-04', 'Balotario Guradapucclla R. 6956', '20.00', 6),
(15, '2017-12-04', 'Balotario Marilin Huarto R. 6929', '20.00', 6),
(16, '2017-12-04', 'Balotario Honorato Huaman R. 6930', '20.00', 6),
(17, '2017-12-04', 'Balotario Victro Abel R. 6935', '20.00', 6),
(18, '2017-12-04', 'Balotario Luzma Jara R. 6942', '20.00', 6),
(19, '2017-12-04', 'Balotario Flor de Rosa Cuellar R. 6943', '20.00', 6),
(20, '2017-12-04', 'Balotario Rosmeri Borda R. 6944', '20.00', 6),
(21, '2017-12-04', 'Balotario Yajaida Reinoso R. 6959', '20.00', 6),
(22, '2017-12-04', 'Saldo olimpiadas R. 6960', '513.00', 6),
(23, '2017-12-04', 'Ex. Recup. July Ojeda R. 6996', '30.00', 6),
(24, '2017-12-04', 'Sust. Examen Suf. Hans Chacon R. 6980', '20.00', 6),
(25, '2017-12-04', 'Constancia Chacon Gutierrez R. 6981', '10.00', 6),
(26, '2017-12-04', 'Derecho examen de gradoHans Chacon R. 6978', '180.00', 6),
(27, '2017-12-04', 'Balotario Hans Chacon R. 6979', '20.00', 6),
(28, '2017-12-05', 'Suste. Exa. Suf. Celinda Duran R. 6961', '20.00', 6),
(29, '2017-12-05', 'Balotario Celinda Duran R. 6962', '20.00', 6),
(30, '2017-12-05', 'Cons. Aprob. Celinda Duran R. 6963', '10.00', 6),
(31, '2017-12-05', 'venta de cuyes Nancy Bravo R. 6964', '100.00', 6),
(32, '2017-12-06', 'Sust. Exa. Suf. Talia Cuellar R. 6969', '20.00', 6),
(33, '2017-12-06', 'Const. Aprob. Talia Cuellar R. 6970', '10.00', 6),
(34, '2017-12-06', 'Derecho examen de grado Talia Cuellar R. 6971', '180.00', 6),
(35, '2017-12-06', 'Balotario Odaliz Talia Cuellar R. 6972', '20.00', 6),
(36, '2017-12-06', 'Examen de Grado Tula Cunza R. 6965', '180.00', 6),
(37, '2017-12-06', 'Sustentacion Examen sufic. R. ', '20.00', 6),
(38, '2017-12-06', 'Const. Aprob. Practicas R.', '10.00', 6),
(39, '2017-12-06', 'Derecho Examen de grado R. ', '180.00', 6),
(40, '2017-12-06', 'Balotario Odaliz Talia R. ', '20.00', 6),
(41, '2017-12-06', 'Derecho de examen Tula Cunza R. 6965', '180.00', 6),
(42, '2017-12-06', 'Examen de suficiencia Tula Cunza R.6966', '20.00', 6),
(43, '2017-12-06', 'Carpeta de titulacion Tula cunza R. 6967', '75.00', 6),
(44, '2017-12-06', 'Certificado de estudios Tula cunza R. 6968', '130.00', 6),
(45, '2017-12-06', 'Venta de pollos Marleni Unsueta R. 6973', '300.00', 6),
(46, '2017-12-06', 'Venta de pollos Grimaneza Ovalle R. 6974', '70.00', 6),
(47, '2017-12-06', 'Venta de cuyes Tula Cunza R. 6975', '50.00', 6),
(48, '2017-12-06', 'Balotario Julieta Mediano R. 6976', '20.00', 6),
(49, '2017-12-06', 'A/C cuadernillo prac.  Bryan Espinoza R. 6977', '20.00', 6),
(50, '2017-12-07', 'Examen de recuperacion Ingrid Ascarza R. 6982', '30.00', 6),
(51, '2017-12-07', 'reiza mireya Arias R. ', '30.00', 6),
(52, '2017-12-09', 'Cuadernillo de Practicas Chojata Nelson R.6990', '60.00', 6),
(53, '2017-12-11', 'Suten. Exam. Suf. Cristian Asto R. 6983', '20.00', 6),
(54, '2017-12-11', 'Aprobacion de practicas Cristian Asto R. 6984 ', '10.00', 6),
(55, '2017-12-11', 'Examen de grado Cristian Asto R. 6985', '180.00', 6),
(56, '2017-12-11', 'Balotario Cristian Asto R. 6986', '20.00', 6),
(57, '2017-12-11', 'Venta de pollos Valeriano Aredondo R. 6987', '60.00', 6),
(58, '2017-12-11', 'Examen de grado Celinda Duran R. 6988', '180.00', 6),
(59, '2017-12-11', 'Cuadernillo de practicas Ronal Ovalle R. 6989', '60.00', 6),
(60, '2017-12-11', 'Examen de recuperacion Laura Valverde R. 6991', '30.00', 6),
(61, '2017-12-11', 'Examen de recuperacion Delia Pedraza R. 6993', '30.00', 6),
(62, '2017-12-11', 'Examen de recuperacion Delia Pedraza R. 6994', '30.00', 6),
(63, '2017-12-11', 'Cuadernillo Practicas Juli Ojeda R. 6995', '60.00', 6),
(64, '2017-12-11', 'Jocelin Avalos Monzon R. ', '20.00', 6),
(65, '2017-12-11', 'Jocelin Avalos Monzon R. ', '10.00', 6),
(66, '2017-12-11', 'Jocelin Avalos Monzon R. ', '180.00', 6),
(67, '2017-12-11', 'Jocelin Avalos Monzon R. ', '20.00', 6),
(68, '2017-12-11', 'Jocelin Avalos Monzon R. ', '75.00', 6),
(69, '2017-12-11', 'Hector Huaman Pe?a R. ', '35.00', 6),
(70, '2017-12-12', 'Examen de grado Honorato Huaman R. 6997', '180.00', 6),
(71, '2017-12-12', 'Sust. Examen suf. Honorato Huaman R. 6998', '20.00', 6),
(72, '2017-12-12', 'Const. aprovacion pract. Honorato Huaman R. 6999', '10.00', 6),
(73, '2017-12-12', 'Const. Aprobacion pract. Tul?a Cunza R. 7000', '10.00', 6),
(74, '2017-12-12', 'Cuadernillo de practicas Maria Sotelo R. 7001', '60.00', 6),
(75, '2017-12-12', 'Cuadernillo de prac. Reiza Arias R. 7002', '60.00', 6),
(76, '2017-12-12', 'Cuadernillo de prac. Estefania Aroni R. 7003', '60.00', 6),
(77, '2017-12-13', 'Cuadernillo de prac. Lourdes Arana R. 7004', '60.00', 6),
(78, '2017-12-13', 'Registro de titulo Guisela Huachaca R. 7005', '20.00', 6),
(79, '2017-12-13', 'Registro de titulo Benjamin Gabancho R. 7006', '20.00', 6),
(80, '2017-12-13', 'Cuadernillo de prac. Vladimir Alvaro R. 7007', '100.00', 6),
(81, '2017-12-14', 'Constancia de estudios Hector Huaman R. 7008', '15.00', 6),
(82, '2017-12-14', 'examen de recup. Rogelio Layme R. 7009', '30.00', 6),
(83, '2017-12-14', 'Constancia de estudios Rafael Mamani R. 7010', '15.00', 6),
(84, '2017-12-14', 'Constancia de estudios Rudi Huaywa R. 7011', '15.00', 6),
(85, '2017-12-14', 'Cuadernillo de prac. Marcela Lopez R. 7012', '60.00', 6),
(86, '2017-12-14', 'Cuadernillo de Prac. Ingrid Ascarza R. 7013 ', '60.00', 6),
(87, '2017-12-14', 'Cuadernillo de prac. Tania Huamani R. 7014', '60.00', 6),
(88, '2017-12-14', 'Cuadernillo de prac. Fiorela Cuellar R. 7015', '60.00', 6),
(89, '2017-12-14', 'Jackelin Cardenas cuadernillo Prac. R. 7016', '60.00', 6),
(90, '2017-12-15', 'Cuadernillo de prac. Jenni Jara R. 7017', '60.00', 6),
(91, '2017-12-15', 'Venta de cuyes Antonio Quin R. 7018', '100.00', 6),
(92, '2017-12-15', 'Certificado modular Fiorela Ovalle R. 7019', '300.00', 6),
(93, '2017-12-15', 'Venta de pollos Andres Avelino R. 7020', '40.00', 6),
(94, '2017-12-15', 'Cuadernillo de prac. Maria valentina R. 7021', '60.00', 6),
(95, '2017-12-15', 'Cuadernillo de prac. Jose Armando R. 7022', '60.00', 6),
(96, '2017-12-18', 'Venta de pollos Valeriano Aredondo R. 7023', '100.00', 6),
(97, '2017-12-18', 'Multa Fiorela Ovalle R. 7024', '30.00', 6),
(98, '2017-12-18', 'Utilidad de lacteos Fiorela Ovalle R. 7025', '84.00', 6),
(99, '2017-12-18', 'Sustenacion exam. Suf. Yuliza Calderon R. 7026', '20.00', 6),
(100, '2017-12-18', 'Aprob. Conts. De prac. Yuliza Calderon R. 7027', '10.00', 6),
(101, '2017-12-18', 'Examen de grado yuliza Calderon R. 7028', '180.00', 6),
(102, '2017-12-18', 'Exam. Suf.Marilin Wuarton R. 7029', '20.00', 6),
(103, '2017-12-18', 'Const. Aprob. Prac. Marilin Warton R. 7030', '10.00', 6),
(104, '2017-12-18', 'Carpeta de titulacion Marilin Warton R. 7031', '75.00', 6),
(105, '2017-12-18', 'Constan. De no adeudar Marilin Warton R. 7032', '15.00', 6),
(106, '2017-12-18', 'Foramto de titulo Marilin Warton R. 7033', '180.00', 6),
(107, '2017-12-18', 'Examen de grado Marilin Warton R. 7034', '180.00', 6),
(108, '2017-12-18', 'examen de suf. Fredi Salcedo R. 7035', '20.00', 6),
(109, '2017-12-18', 'const. Aprob. Prac. Freddy Salcedo R. 7036', '10.00', 6),
(110, '2017-12-18', 'carpeta de titulacion Fredy Salcedo R. 7037', '75.00', 6),
(111, '2017-12-18', 'Certificado de estudios Freddy Salcedo R. 7038', '130.00', 6),
(112, '2017-12-18', 'constancia de no adeudar Freddy Salcedo R. 7039', '15.00', 6),
(113, '2017-12-18', 'Certificado modular Freddy Salcedo R. 7040 ', '300.00', 6),
(114, '2017-12-18', 'tramite de titulacion Freddy Sakcedo R. 7041', '200.00', 6),
(115, '2017-12-18', 'Formato de titulo Freddy Salcedo R. 7042', '180.00', 6),
(116, '2017-12-18', 'Cuadernillo de prac. Vilma Mediano R. 7043', '60.00', 6),
(117, '2017-12-18', 'Cuadernillo de prac. Luz Marina Cruz R. 7044', '60.00', 6),
(118, '2017-12-18', 'Cuadernillo de prac. Paola Ramos R. 7045', '60.00', 6),
(119, '2017-12-18', 'Cuadernillo de prac. Rosalinda Mu?oz R. 7046', '60.00', 6),
(120, '2017-12-18', 'juramentacion Freddy Salcedo R. 7047', '200.00', 6),
(121, '2017-12-18', 'Cuadernillo de prac. Manuel Ramos R. 7048', '60.00', 6),
(122, '2017-12-18', 'Venta de pollos Valeriaqno Aredondo R. 7049', '150.00', 6),
(123, '2017-12-18', 'Cuadernillo de prac. Ana Maria Cuellar R. 7050', '60.00', 6),
(124, '2017-12-18', 'Tramite de titulacion Sonia Valderrama R. 7051', '210.00', 6),
(125, '2017-12-19', 'Venta de becerro faustino Dias R. 7053', '480.00', 6),
(126, '2017-12-19', 'Cuadernillo de prac. Edwin Mediano R. 7054', '100.00', 6),
(127, '2017-12-19', 'Matricula Extemporanea 2017-1 Jocelin R.7055', '120.00', 6),
(128, '2017-12-19', 'matricula extemporanea 2017-2 Jocelin R. 7056', '100.00', 6),
(129, '2017-12-19', 'Carpeta de titulacion Jocelin Avalos R. 7062', '75.00', 6),
(130, '2017-12-19', 'Cuadernillo de prac. Rolando Tapia R. 7069', '60.00', 6),
(131, '2017-12-20', 'Examen de recup. Jenny Jara R. 7090', '30.00', 6),
(132, '2017-12-20', 'Venta de pollos Andres Caceres R. 7070', '80.00', 6),
(133, '2017-12-20', 'Cuadernillo de prac. Sunilda Barrientos R. 7071', '60.00', 6),
(134, '2017-12-20', 'Constacia de egresado Michael Caceres R. 7073', '20.00', 6),
(135, '2017-12-20', 'Examen de recuperacion Nelson Chojata R. 7080', '30.00', 6),
(136, '2017-12-21', 'Examen de recuperacion Vilma mediano R.7075', '30.00', 6),
(137, '2017-12-21', 'Cuadernillo de prac. Hector Huaman R. 7074', '100.00', 6),
(138, '2017-12-21', 'Venta de pollos Hans Chacon R.7076', '303.00', 6),
(139, '2017-12-21', 'Cuadernillo de practicas Delia Pedraza R. 7077', '60.00', 6),
(140, '2017-12-21', 'Cuadernillo de prac. Carmen Rosa Alarcon R. 7078', '60.00', 6),
(141, '2017-12-21', 'Examen de recuperacion Carmen Rosa Alarcon R. 7079', '30.00', 6),
(142, '2017-12-22', 'Cuadernillo de prac. Enaida pezo R. 7081', '60.00', 6),
(143, '2017-12-22', 'Tramites dde titulacion Cristian Asto R: 7082-7089', '1115.00', 6),
(144, '2017-12-22', 'Alquiler de ambiente Nuevo Horizonte R. 7091 ', '100.00', 6),
(145, '2017-12-22', 'Reinozo Chac?n Yajaida S/V', '200.00', 6),
(146, '2017-12-22', 'Julieta mediano vargas S/V', '200.00', 6),
(147, '2017-12-22', 'Pago de Constancia de aprobaci?n S/V', '10.00', 6),
(148, '2017-12-22', 'Pago contancia de aprobaci?n S/V', '10.00', 6),
(149, '2017-12-22', 'Pago sustentaci?n de examen de suficiencia S/V', '20.00', 6),
(150, '2017-12-22', 'Pago de sustentaci?n de examen de suficiencia S/V', '20.00', 6),
(151, '2017-12-22', 'Pago examen de grado S/V', '180.00', 6),
(152, '2017-12-22', 'Formato de ti?tulo Yajaida Reynozo S/V', '180.00', 6),
(153, '2017-12-26', 'Examen de recuperaci?n Flor de Rosa Cuellar R 7092', '30.00', 6),
(154, '2017-12-26', 'Examen de recuperaci?n Yajaida Reinozo R. 7094', '30.00', 6),
(155, '2017-12-26', 'Examen de recuperaci?n Julieta Mediano R 7093', '30.00', 6),
(156, '2017-12-26', 'Venta de pollos Carlos molina R,7095', '70.00', 6),
(157, '2017-12-26', 'Examen de recuperaci?n Rosmery Borda R. 7096', '30.00', 6),
(158, '2017-12-26', 'Tr?mite de titulaci?n Luzma Jara R. 3097', '210.00', 6),
(159, '2017-12-26', 'Tr?mite de titulaci?n Rosmery Borda R. 7098', '210.00', 6),
(160, '2017-12-28', 'Pago Odalis Cuellar S/V', '20.00', 6),
(161, '2017-12-28', 'Constancia de egresado Fiorela Ovalle R. 7099', '20.00', 6),
(162, '2017-12-28', 'Constancia de egresado Yeni Morales R. 7100', '20.00', 6),
(163, '2017-12-28', 'Utilidad de granos S/V', '84.00', 6),
(164, '2017-12-29', 'Sustentaci?n examen de suficiencia S/V', '20.00', 6),
(165, '2017-12-29', 'Constancia de aprobaci?n de pr?cticas S/V', '10.00', 6),
(166, '2017-12-29', 'Carpeta de titulaci?n S/V', '75.00', 6),
(167, '2017-12-29', 'Constancia de no adeudar S/V', '15.00', 6),
(168, '2017-12-29', 'Tr?mite de titulaci?n S/V', '200.00', 6),
(169, '2017-12-29', 'Pago de derecho de examen de grado S/V', '180.00', 6),
(170, '2017-12-30', 'Pago de inter?s mensual ', '52.93', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gastos`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id_ingresos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gastos` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id_ingresos` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
