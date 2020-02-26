-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-02-2020 a las 05:30:39
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bolsatrabajo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL,
  `nombreEmpresa` varchar(45) NOT NULL,
  `descripcionEmpresa` varchar(140) NOT NULL,
  `rif` varchar(45) NOT NULL,
  `direccionEmpresa` varchar(45) NOT NULL,
  `areaEmpresa` varchar(45) NOT NULL,
  `correoEmpresa` varchar(45) NOT NULL,
  `webEmpresa` varchar(45) DEFAULT NULL,
  `contrasenaEmpresa` varchar(45) NOT NULL,
  `imagenEmpresa` varchar(1000) NOT NULL DEFAULT './img-empresa/perfil-predeterminado.png',
  `preguntaSeguridad` char(150) DEFAULT NULL,
  `respuestaSeguridad` char(150) DEFAULT NULL,
  `estado` varchar(150) DEFAULT NULL,
  `ciudad` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `nombreEmpresa`, `descripcionEmpresa`, `rif`, `direccionEmpresa`, `areaEmpresa`, `correoEmpresa`, `webEmpresa`, `contrasenaEmpresa`, `imagenEmpresa`, `preguntaSeguridad`, `respuestaSeguridad`, `estado`, `ciudad`) VALUES
(5, 'Colegio Adventista', 'colegio', 'j-123123', 'sierra maestra', 'EnseÃ±anza', 'adv@gmail.com', '', '123', './img-empresa/perfil-predeterminado.png', NULL, NULL, NULL, NULL),
(6, 'smartprocess', 'empresa dedicada a ingenieria', 'j-123123', 'tierra negra', 'IngenierÃ­a', 'smartprocess@sp.com', 'www.sp.com', '1234', './img-empresa/1572969657', NULL, NULL, 'Guarico', 'Zaraza'),
(7, 'asd', 'asd', 'asd', 'asd', 'Asesorias', 'sp@sp.com', 'asd', '1234', './img-empresa/perfil-predeterminado.png', NULL, NULL, NULL, NULL),
(9, 'JJ Inversion', 'educacion asdasdf', 'J-5555555', 'adsf', 'Informatica/Telecomunicaciones', 'urbe@gmail.com', 'urbe.com', 'urbe', './img-empresa/1581305473_9.jpg', 'Â¿Cual es tu color favorito?', 'rojo', 'Miranda', 'SimÃ³n BolÃ­var'),
(10, 'petma', 'empresa dedicada a la elaboracion de comida', 'j-123123', 'tierra negra', 'AlmacÃ©n', 'petma@gmail.com', 'www.petma.com', '1234', './img-empresa/perfil-predeterminado.png', 'Â¿Cual es tu color favorito?', 'negro', 'Amazonas', 'Maroa'),
(11, 'fullgustazo', 'empresa dedicada a la elaboracion de jugos', 'j-145234', 'tierra negra', 'Reparacion', 'fullgustazo@gmail.com', '', '1234', './img-empresa/perfil-predeterminado.png', 'Â¿Cual es el segundo apellido de tu padre?', 'pimentel', 'Guarico', 'Zaraza'),
(12, 'asdf', 'asdfas', 'J-000000000', 'adfads', 'Medicina/Saldud', 'j@gk.com', '', '123', './img-empresa/1581909567_12.jpg', 'Â¿Cual es tu color favorito?', 'Azul', ' disabled selected>Selecciona tu estado</option>\r\n                            <option value=', 'Caracas'),
(13, 'abc inversiones', 'sfgsf', 'J-8888888888', 'asdffffffffffffffffffffff', 'ConstrucciÃ³n y Obras', 'abc@inversiones.com', '', '123', './img-empresa/1581910052_13.jpg', 'Â¿Cual es tu color favorito?', 'aklsjdfklasjdkl', ' disabled selected>Selecciona tu estado</option>\r\n                            <option value=', 'Mellado'),
(14, 'super dupper', 'adfasd', 'akskasdf', 'asdfasdfa', 'Medicina/Saldud', 'asdlfk@lkas.com', 'www.google.com', '123', './img-empresa/perfil-predeterminado.png', 'Â¿Cual es el segundo apellido de tu padre?', 'asdf', 'Guarico', 'Chaguaramas'),
(15, 'f', 'ad', 'J', 'asd', 'AdministraciÃ³n/Oficinas', 'p@prueba.com', '', '123', './img-empresa/perfil-predeterminado.png', 'Â¿Cual es tu color favorito?', '123', 'Cojedes', 'RÃ³mulo Gallegos'),
(16, 'asdf', 'asdf', 'J-2222222', 'asdf', 'AdministraciÃ³n/Oficinas', 'ja@adsl.com', '', '123', './img-empresa/perfil-predeterminado.png', 'Â¿Cual es tu color favorito?', 'ds', 'Anzoategui', 'Aragua de Barcelona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `idexp` int(11) NOT NULL,
  `expEmpresa` varchar(100) NOT NULL,
  `expPais` varchar(100) NOT NULL,
  `expSector` varchar(100) NOT NULL,
  `expArea` varchar(100) NOT NULL,
  `expLabor` varchar(100) NOT NULL,
  `expFechaIni` date NOT NULL,
  `expFechaFin` date NOT NULL,
  `usuarios_idusuarios` int(11) NOT NULL,
  `yearExp` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`idexp`, `expEmpresa`, `expPais`, `expSector`, `expArea`, `expLabor`, `expFechaIni`, `expFechaFin`, `usuarios_idusuarios`, `yearExp`) VALUES
(10, 'CONTROVAL', 'Venezuela', 'Ingenieria', 'Logistica', 'Controlar procesos', '2016-01-01', '2020-01-29', 7, NULL),
(14, 'SMARTPROCESS', 'Venezuela', 'INGENIERIA', 'SOPORTE TECNICO', 'REPARAR TODO', '2015-01-01', '2020-11-18', 1, 5),
(39, 'holanormal', 'asdf', 'jasdkjfkl', 'jjj', 'klajsfkj', '2020-02-03', '2020-02-03', 44, 0),
(40, 'hola', 'kdj', 'jasdkjfkl', 'jjj', 'klajsfkj', '2020-02-11', '2020-02-07', 44, 0),
(41, 'funcionatodook', 'kdj', 'jasdkjfkl', 'jjjdasas', 'klajsfkj', '2020-02-10', '2020-02-04', 44, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `idHabilidad` int(11) NOT NULL,
  `nombreHabilidad` varchar(150) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nivelHabilidad` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`idHabilidad`, `nombreHabilidad`, `idusuario`, `nivelHabilidad`) VALUES
(3, 'ANGULAR', 1, 'Intermedio'),
(4, 'Guias Sada', 9, 'Avanzado'),
(5, 'Word', 9, 'Avanzado'),
(6, 'Excel', 9, 'Avanzado'),
(81, 'asdaf', 44, 'Intermedio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `idempresa` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpropuesta` int(11) NOT NULL,
  `idNotificacion` int(11) NOT NULL,
  `vista` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`idempresa`, `idusuario`, `idpropuesta`, `idNotificacion`, `vista`) VALUES
(5, 1, 50, 1, 0),
(6, 1, 51, 2, 0),
(6, 1, 51, 3, 0),
(6, 1, 51, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propuesta`
--

CREATE TABLE `propuesta` (
  `idpropuesta` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `vacantes` int(11) NOT NULL,
  `sueldo` float NOT NULL,
  `localizacion` varchar(45) NOT NULL,
  `publicacion` datetime NOT NULL,
  `empresa_idempresa` int(11) NOT NULL,
  `funciones` text,
  `categoria` varchar(150) DEFAULT NULL,
  `aExp` int(10) DEFAULT NULL,
  `educacion` char(150) DEFAULT NULL,
  `viajes` char(100) DEFAULT NULL,
  `vehiculo` char(100) DEFAULT NULL,
  `estado` varchar(150) DEFAULT NULL,
  `ciudad` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `propuesta`
--

INSERT INTO `propuesta` (`idpropuesta`, `titulo`, `descripcion`, `vacantes`, `sueldo`, `localizacion`, `publicacion`, `empresa_idempresa`, `funciones`, `categoria`, `aExp`, `educacion`, `viajes`, `vehiculo`, `estado`, `ciudad`) VALUES
(50, 'programador', 'saber react', 3, 111, 'Maracaibo', '0000-00-00 00:00:00', 5, 'programar app con react', 'Ventas', NULL, NULL, NULL, NULL, 'Zulia', 'Maracaibo'),
(51, 'DESARROLLADOR WEB', 'SABER ANGULAR', 3, 222, 'CiudadOjeda', '0000-00-00 00:00:00', 6, 'REALIZAR APP CON ANGULAR', 'Mantenimiento', NULL, NULL, NULL, NULL, 'Zulia', NULL),
(56, 'ASISTENTE ADMINISTRATIVO', 'QUE SEPA SAINT', 3, 400, '', '0000-00-00 00:00:00', 6, 'SER ASISTENTE', 'Mantenimiento', 8, 'Bachiller', 'Si', 'Si', 'Zulia', 'Maracaibo'),
(60, 'asd', 'asd', 123, 12, '', '0000-00-00 00:00:00', 6, 'as', 'Ventas', 2, 'Bachiller', 'Si', 'Si', 'Guarico', 'Ortiz'),
(61, 'GERENTE', 'LIDERAR EQUIPO', 1, 500, '', '0000-00-00 00:00:00', 5, 'REALIZAR REUNIONES INNCESESARIAS', 'Ventas', 8, 'Universitario', 'Si', 'Si', 'Merida', 'Tovar'),
(74, 'ddd', 'asdf', 1, 1, '', '0000-00-00 00:00:00', 9, 'asdf', 'IngenierÃ­a', 1, 'Bachiller', 'Si', 'Si', 'Tachira', 'Panamericano'),
(75, 'prueba', 'asdf', 11, 11, '', '0000-00-00 00:00:00', 9, 'asdf', 'InvestigaciÃ³n y Calidad', 11, 'Tecnico Medio', 'Si', 'Si', 'Nueva Esparta', 'Antolin del Campo'),
(76, 'eee', 'dsg', 11, 11, '', '0000-00-00 00:00:00', 9, 'dfgs', 'DirecciÃ³n/GerencÃ­a', 1, 'Bachiller', 'Si', 'Si', 'Amazonas', 'Maroa'),
(77, 'eee', 'asa', 11, 11, '', '0000-00-00 00:00:00', 9, 'asdf', 'DiseÃ±o/Artes GrÃ¡ficas', 11, 'Tecnico Medio', 'Si', 'Si', 'Merida', 'Padre Noguera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccion`
--

CREATE TABLE `seleccion` (
  `idseleccion` int(11) NOT NULL,
  `idusuarios` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idpropuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seleccion`
--

INSERT INTO `seleccion` (`idseleccion`, `idusuarios`, `idempresa`, `idpropuesta`) VALUES
(7, 3, 9, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `ci` varchar(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `estadoCivil` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `num1` varchar(11) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `puestoDeseado` varchar(45) NOT NULL,
  `educacion` varchar(45) NOT NULL,
  `perfilProfesional` varchar(45) NOT NULL,
  `idioma` varchar(45) NOT NULL,
  `nivelIdioma` varchar(45) NOT NULL,
  `disponibilidadViajar` varchar(2) NOT NULL,
  `licencia` varchar(2) NOT NULL,
  `vehiculo` varchar(2) DEFAULT NULL,
  `expEmpresa` varchar(100) NOT NULL,
  `expPais` varchar(100) NOT NULL,
  `expSector` varchar(100) NOT NULL,
  `expArea` varchar(100) NOT NULL,
  `expLabor` varchar(100) NOT NULL,
  `expFechaIni` date NOT NULL,
  `expFechaFin` date NOT NULL,
  `curriculum` text,
  `descripcion` varchar(100) DEFAULT NULL,
  `fotoPerfil` varchar(1000) DEFAULT './img-perfil/perfil-predeterminado.png',
  `pregunta1` varchar(150) DEFAULT NULL,
  `resp1` char(150) DEFAULT NULL,
  `sueldoDeseado` char(100) DEFAULT NULL,
  `edad` int(100) DEFAULT NULL,
  `esAdmin` tinyint(1) DEFAULT '0',
  `estado` varchar(150) DEFAULT NULL,
  `ciudad` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nombre`, `apellido`, `ci`, `correo`, `contrasena`, `fechaNacimiento`, `estadoCivil`, `genero`, `num1`, `pais`, `direccion`, `puestoDeseado`, `educacion`, `perfilProfesional`, `idioma`, `nivelIdioma`, `disponibilidadViajar`, `licencia`, `vehiculo`, `expEmpresa`, `expPais`, `expSector`, `expArea`, `expLabor`, `expFechaIni`, `expFechaFin`, `curriculum`, `descripcion`, `fotoPerfil`, `pregunta1`, `resp1`, `sueldoDeseado`, `edad`, `esAdmin`, `estado`, `ciudad`) VALUES
(1, 'Yohesky', 'Pimentel', '26878565', 'yoheskyjpp@gmail.com', '1234', '1998-05-29', 'Casado/a', 'Hombre', '2147483647', 'venezuela', 'UrbanizaciÃ³n el Soler', 'programador', 'Universitario', '', 'Ingles', 'intermedio', 'Si', '', 'No', 'EEE', '', '', '', '', '0000-00-00', '0000-00-00', './curriculum/CVYOHESKY2019.pdf', 'angular', './img-perfil/yo.png', NULL, NULL, '400', 22, 0, 'Merida', 'Tovar'),
(3, 'joswsf', 'aladas', 'V-2554555', 'josealjuria@gmail.com', 'jose', '2002-02-25', 'Casado/a', 'Hombre', '32147483647', 'Venezuela', 'adasdf', 'Desarrollador', 'Universitario', '', 'ingles', 'intermedio', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', './curriculum/Fundamentos_de_jQuery.pdf', 'gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', './img-perfil/1582688129_3.jpg', NULL, NULL, '6', 18, 1, 'Zulia', 'MontalbÃ¡n'),
(4, 'luis', 'colmenarez', '2512345', 'luis@gmail.com', 'luis', '0000-00-00', '', '', '2147483647', 'tierra negra', 'Venezuela', 'tecnico', 'Universitario', '', 'ingles', 'basico', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, 'Persona responsable y autodidacta', './img-perfil/perfil-predeterminado.png', NULL, NULL, '', 2020, 0, 'Zulia', 'Maracaibo'),
(7, 'coral', 'portillo', '14901511', 'cportillo@gmail.com', 'coral', '0000-00-00', 'Casado/a', 'Hombre', '2147483647', 'Venezuela', 'Soler', 'LOGISTICA', 'Tecnico Superior Universitario', '', 'Ingles', 'intermedio', 'No', '', 'Si', '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, 'Asistente de logÃ­stica con 10 aÃ±os de experiencia en el mercado con alta responsabilidad y entrega', './img-perfil/1579706977_7', 'Â¿Como se llama tu mejor amigo de la infancia?', 'yohesky', '400', NULL, 0, 'Zulia', 'Maracaibo'),
(9, 'jecselys', 'torres', '25553618', 'jecselys17@gmail.com', '1234', '0000-00-00', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, NULL, './img-perfil/1580410567_9', 'Â¿Como se llama tu mejor amigo de la infancia?', 'yohesky', '', 2020, 0, 'Guarico', 'Santa MarÃ­a de Ipire'),
(40, 'prueba1', 'prueba2', '0', 'prueba1@prueba', '123', '0000-00-00', '', '', '0', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, NULL, './img-perfil/perfil-predeterminado.png', 'Â¿Como se llama tu mejor amigo de la infancia?', '123', NULL, NULL, 0, 'Zulia', 'Maracaibo'),
(42, 'jose', 'aljuria', '0', 'josejavier@gmail.com', '123', '0000-00-00', '', '', '0', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, NULL, './img-perfil/perfil-predeterminado.png', 'Â¿Como se llama tu mejor amigo de la infancia?', '123', NULL, NULL, 0, 'Amazonas', 'Maroa'),
(43, 'juan', 'perez', '0', 'juanPerez@gmail.com', '123', '0000-00-00', '', '', '0', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, NULL, './img-perfil/perfil-predeterminado.png', 'Â¿Como se llama tu mejor amigo de la infancia?', 'joo', NULL, NULL, 0, 'Apure', 'Biruaca'),
(44, 'john', 'smith', 'V-25802196', 'john@smit.com', '123', '1996-12-15', 'Casado/a', 'Hombre', '', '', 'jaklsdjfk', '', 'Tecnico Medio', '', '', '', '', '', 'Si', '', '', '', '', '', '0000-00-00', '0000-00-00', './curriculum/CartaPresentacion.pdf', NULL, './img-perfil/perfil-predeterminado.png', 'Â¿Como se llama tu mejor amigo de la infancia?', '123', '', 24, 0, 'Zulia', 'Maracaibo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_has_propuesta`
--

CREATE TABLE `usuarios_has_propuesta` (
  `usuarios_idusuarios` int(11) NOT NULL,
  `propuesta_idpropuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios_has_propuesta`
--

INSERT INTO `usuarios_has_propuesta` (`usuarios_idusuarios`, `propuesta_idpropuesta`) VALUES
(1, 50),
(4, 50),
(7, 51),
(9, 50),
(9, 56),
(4, 56),
(7, 56),
(1, 61),
(4, 61),
(9, 61),
(7, 61),
(1, 56),
(3, 50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`idexp`,`usuarios_idusuarios`),
  ADD KEY `fk_experiencia_usuarios_idx` (`usuarios_idusuarios`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`idHabilidad`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`idNotificacion`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idpropuesta` (`idpropuesta`);

--
-- Indices de la tabla `propuesta`
--
ALTER TABLE `propuesta`
  ADD PRIMARY KEY (`idpropuesta`,`empresa_idempresa`),
  ADD KEY `fk_propuesta_empresa1_idx` (`empresa_idempresa`);

--
-- Indices de la tabla `seleccion`
--
ALTER TABLE `seleccion`
  ADD PRIMARY KEY (`idseleccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- Indices de la tabla `usuarios_has_propuesta`
--
ALTER TABLE `usuarios_has_propuesta`
  ADD KEY `usuarios_idusuarios` (`usuarios_idusuarios`),
  ADD KEY `propuesta_idpropuesta` (`propuesta_idpropuesta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `idexp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `idHabilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `idNotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `propuesta`
--
ALTER TABLE `propuesta`
  MODIFY `idpropuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `seleccion`
--
ALTER TABLE `seleccion`
  MODIFY `idseleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD CONSTRAINT `fk_experiencia_usuarios1` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD CONSTRAINT `fk_habilidades_usuarios1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE CASCADE,
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  ADD CONSTRAINT `notificaciones_ibfk_3` FOREIGN KEY (`idpropuesta`) REFERENCES `propuesta` (`idpropuesta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `propuesta`
--
ALTER TABLE `propuesta`
  ADD CONSTRAINT `fk_propuesta_empresa1` FOREIGN KEY (`empresa_idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios_has_propuesta`
--
ALTER TABLE `usuarios_has_propuesta`
  ADD CONSTRAINT `usuarios_has_propuesta_ibfk_1` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuarios_has_propuesta_ibfk_2` FOREIGN KEY (`propuesta_idpropuesta`) REFERENCES `propuesta` (`idpropuesta`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
