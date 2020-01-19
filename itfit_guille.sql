-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2020 a las 13:43:02
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `itfit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `ID_Transaccion` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` text NOT NULL,
  `Importe` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activos`
--

INSERT INTO `activos` (`ID_Transaccion`, `Fecha`, `Descripcion`, `Importe`) VALUES
(1, '2020-01-18', 'Alquiler de pistas', 42190),
(9, '2020-01-02', 'nuevas inscripciones', 34000),
(12, '2020-01-08', 'nuevas inscripciones', 25000),
(13, '2020-01-05', 'nuevas inscripciones', 14000),
(38, '2020-01-10', 'Cursos No incluidos en la Tarjeta de socios', 50000),
(45, '2020-01-04', 'Cursos No incluidos en la Tarjeta de socios', 40330),
(53, '2020-01-16', 'Pagos mensuales de clientes', 80002),
(63, '2020-01-06', 'Pagos mensuales de clientes', 67980),
(69, '2020-01-01', 'Ganancias del merchandasing', 99318),
(78, '2020-01-19', 'Alquiler de pistas', 67212);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asocia`
--

CREATE TABLE `asocia` (
  `idCentro` varchar(4) NOT NULL,
  `idCadena` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asocia`
--

INSERT INTO `asocia` (`idCentro`, `idCadena`) VALUES
('CO4', 'Alemania'),
('CO5', 'Croacia'),
('CO1', 'España'),
('CO2', 'España'),
('CO0', 'Francia'),
('CO3', 'Francia'),
('CO6', 'Holanda'),
('CO7', 'Italia'),
('CO8', 'Marruecos'),
('CO9', 'Portugal'),
('CO10', 'Reino Unid'),
('CO11', 'Turquía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cadena`
--

CREATE TABLE `cadena` (
  `idCadena` varchar(10) NOT NULL,
  `NumCentros` int(11) NOT NULL CHECK (`NumCentros` >= 1),
  `Altas` int(11) NOT NULL CHECK (`Altas` >= 0),
  `Bajas` int(11) NOT NULL CHECK (`Bajas` >= 0),
  `NumEmpleados` int(11) NOT NULL,
  `Maxempleados` int(11) NOT NULL,
  `Vacantes` int(11) NOT NULL CHECK (`Vacantes` <= `Maxempleados`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cadena`
--

INSERT INTO `cadena` (`idCadena`, `NumCentros`, `Altas`, `Bajas`, `NumEmpleados`, `Maxempleados`, `Vacantes`) VALUES
('Alemania', 1, 0, 0, 3, 100, 97),
('Croacia', 1, 0, 0, 3, 100, 97),
('España', 2, 0, 0, 6, 100, 94),
('Francia', 2, 0, 0, 6, 100, 94),
('Holanda', 1, 0, 0, 3, 100, 97),
('Italia', 1, 0, 0, 3, 100, 97),
('Marruecos', 1, 0, 0, 3, 100, 97),
('Portugal', 1, 0, 0, 3, 100, 97),
('Reino Unid', 1, 0, 0, 3, 100, 97),
('Turquía', 1, 0, 0, 3, 100, 97);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE `centro` (
  `idCentro` varchar(4) NOT NULL,
  `Altas` int(11) DEFAULT NULL CHECK (`Altas` >= 0),
  `Bajas` int(11) DEFAULT NULL CHECK (`Altas` >= 0),
  `NumEmpleados` int(11) DEFAULT NULL CHECK (`NumEmpleados` >= 1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`idCentro`, `Altas`, `Bajas`, `NumEmpleados`) VALUES
('CO0', 0, 0, 3),
('CO1', 0, 0, 3),
('CO10', 0, 0, 3),
('CO11', 0, 0, 3),
('CO2', 0, 0, 3),
('CO3', 0, 0, 3),
('CO4', 0, 0, 3),
('CO5', 0, 0, 3),
('CO6', 0, 0, 3),
('CO7', 0, 0, 3),
('CO8', 0, 0, 3),
('CO9', 0, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `cliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`cliente`, `fecha`, `tipo`) VALUES
(1, '2020-02-19 12:30:00', 'Deportiva'),
(1, '2020-03-22 09:45:00', 'Nutricion'),
(3, '2020-01-22 10:30:00', 'Deportiva'),
(3, '2020-01-22 11:00:00', 'Nutricion'),
(4, '2020-01-26 10:45:00', 'Deportiva'),
(5, '2020-02-09 10:30:00', 'Deportiva'),
(6, '2020-01-30 18:00:00', 'Nutricion'),
(7, '2020-02-15 17:00:00', 'Deportiva'),
(8, '2020-01-21 17:30:00', 'Nutricion'),
(10, '2020-01-23 17:45:00', 'Nutricion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `fechaAlta` date NOT NULL,
  `correo` varchar(40) DEFAULT NULL,
  `telefono` varchar(11) NOT NULL,
  `cuentaBancaria` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `dni`, `nombre`, `apellidos`, `fechaAlta`, `correo`, `telefono`, `cuentaBancaria`) VALUES
(1, '73648365C', 'Francisco', 'Fernández García', '2020-01-10', 'ffg@gmail.com', '630285647', 'ES34898******'),
(2, '73648366K', 'Jose', 'Fernández García', '2020-01-10', 'jfg@gmail.com', '630285647', ''),
(3, '38174506L', 'Manuel', 'Ortega Melero', '2019-12-17', 'manuel22@hotmail.com', '620894567', 'ES49898******'),
(4, '3758411H', 'Pablo', 'Hinojosa Pérez', '2020-01-08', 'pablohp@gmail.com', '683874534', 'ES49667******'),
(5, '67322134F', 'Pedro', 'Gómez Gómez', '2019-11-20', 'pgogo@hotmail.es', '657845612', 'ES49112******'),
(6, '20202533Y', 'Ana', 'Bohueles Franco', '2020-01-14', 'anita@gmail.com', '633467851', 'ES49478******'),
(7, '43227824F', 'Beatriz', 'Ruiz Alonso', '2019-12-04', 'bea_ruiz@hotmail.com', '667538192', 'ES16867******'),
(8, '44677382P', 'Paco', 'Mermela Ceballos', '2020-01-08', 'pcmerce@gmail.com', '711239435', 'ES19237******'),
(9, '20452539Y', 'Julia', 'Leyva Buitrago', '2019-12-22', NULL, '711239435', 'ES49667******'),
(10, '45978728J', 'María', 'Simón Sánchez', '2019-12-03', 'MSS@gmail.com', '638289947', 'ES49752******');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `idFactura` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `da_acceso`
--

CREATE TABLE `da_acceso` (
  `idTarifa` int(11) NOT NULL,
  `idZona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleadostrabajan`
--

CREATE TABLE `empleadostrabajan` (
  `idEmpleado` varchar(8) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `IdCentro` varchar(4) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `Puesto` varchar(20) NOT NULL,
  `Jornada` int(11) DEFAULT NULL,
  `Estado` varchar(10) NOT NULL CHECK (`Estado` in ('Activo','Baja')),
  `Formación` varchar(20) DEFAULT NULL,
  `Incorporacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleadostrabajan`
--

INSERT INTO `empleadostrabajan` (`idEmpleado`, `nombre`, `apellidos`, `domicilio`, `IdCentro`, `correo`, `Telefono`, `dni`, `Puesto`, `Jornada`, `Estado`, `Formación`, `Incorporacion`) VALUES
('0000031', 'Marta', 'Martin ', 'c/Toro 15', 'CO11', 'mm@gmail.com', '444666777', '0000031Z', 'jefe sala', 0, 'Activo', NULL, NULL),
('0001144', 'Rodrigo', 'Perez ', 'c/Flor 8', 'CO9', 'rp@gmail.com', '764592102', '0001144I', 'Monitor', 0, 'Activo', NULL, NULL),
('1457345', 'Andrea', 'Sacaluga ', 'c/Pepe 9', 'CO9', 'mp@gmail.com', '112458367', '1457345H', 'jefe sala', 0, 'Activo', NULL, NULL),
('1512166', 'Andrea', 'Perez ', 'c/Felipe 8', 'CO4', 'ap@gmail.com', '111222333', '5846564R', 'Recepcionista', 0, 'Activo', NULL, NULL),
('1547892', 'Valeria', 'Garcia ', 'c/Fray 8', 'CO8', 'vg@gmail.com', '777666444', '1547892G', 'Recepcionista', 0, 'Activo', NULL, NULL),
('1598875', 'Maria', 'Ramos ', 'c/Navas 8', 'CO6', 'mr@gmail.com', '444555444', '1598875O', 'Recepcionista', 0, 'Activo', NULL, NULL),
('1645798', 'Paloma', 'Perez ', 'c/Luis 8', 'CO8', 'pp@gmail.com', '467542862', '1645798F', 'Monitor', 0, 'Activo', NULL, NULL),
('2151515', 'Soledad', 'Garcia ', 'c/Toro 8', 'CO11', 'sg@gmail.com', '444777222', '2151515X', 'Monitor', 0, 'Activo', NULL, NULL),
('2425250', 'Fernando', 'García ', 'c/Sol 8', 'CO5', 'fg@gmail.com', '555444999', '2425250Y', 'Monitor', 0, 'Activo', NULL, NULL),
('3121212', 'Miguel', 'Perez ', 'c/Toro 8', 'CO11', 'mp@gmail.com', '111000000', '3121212C', 'Recepcionista', 0, 'Activo', NULL, NULL),
('3698524', 'Antonio', 'Martinez ', 'c/Copo 18', 'CO7', 'am@gmail.com', '888997555', '3698524A', 'Monitor', 0, 'Activo', NULL, NULL),
('4567531', 'Federico', 'Alfaro ', 'c/Teja 6', 'CO7', 'fa@gmail.com', '555000111', '4567531S', 'Recepcionista', 0, 'Activo', NULL, NULL),
('45768214', 'Jose', 'Diaz', 'c/Azul 6', 'CO1', 'josed@gmail.com', '689126478', '45768214L', 'Monitor', 0, 'Activo', NULL, NULL),
('4679821', 'Leonardo', 'Alamagro ', 'c/Luna 8', 'CO5', 'la@gmail.com', '777555444', '4679821U', 'Recepcionista', 0, 'Activo', NULL, NULL),
('4785523', 'Rebeca', 'Garcia ', 'c/Melero 69', 'CO2', 'rg@gmail.com', '622357426', '4785523F', 'Monitor', 0, 'Activo', NULL, NULL),
('5454547', 'Felipe', 'Hurtado ', 'c/Tico 8', 'CO3', 'fh@gmail.com', '77744411', '7564454Q', 'Monitor', 0, 'Activo', NULL, NULL),
('6448481', 'Pedro', 'Martín ', 'c/Abeto ', 'CO4', 'pm@gmail.com', '666555222', '6448481E', 'jefe sala', 0, 'Activo', NULL, NULL),
('6521587', 'Eva', 'Jimenez ', 'c/Pintor 20', 'CO0', 'ej@gmail.com', '622357426', '6521587D', 'Recepcionista', 0, 'Activo', NULL, NULL),
('6521789', 'Luis', 'Jimenez ', 'c/Puentes 20', 'CO2', 'lj@gmail.com', '624857426', '6521789Q', 'jefe sala', 0, 'Activo', NULL, NULL),
('65547829', 'Julia', 'Ramirez', 'Avda. Francisco Romero 78', 'CO1', 'jr@gamil.com', '755764901', '65547829W', 'Recepcionista', 0, 'Activo', NULL, NULL),
('6667878', 'Alfredo', 'Madrid ', 'c/Fin 11', 'CO10', 'am@gmail.com', '222000111', '6667878L', 'Monitor', 0, 'Activo', NULL, NULL),
('7412589', 'Claudia', 'Perez ', 'c/Bendita 9', 'CO7', 'cp@gmail.com', '444557777', '7412589P', 'jefe sala', 0, 'Activo', NULL, NULL),
('7546454', 'Manuel', 'Perez ', 'c/Rebites 10', 'CO2', 'mp@gmail.com', '755357426', '5846564R', 'Recepcionista', 0, 'Activo', NULL, NULL),
('7548923', 'Francisco', 'Gutierrez ', 'c/Poeta 6', 'CO8', 'fg@gmail.com', '119443553', '7548923D', 'jefe sala', 0, 'Activo', NULL, NULL),
('7564454', 'Lucia', 'Garcia ', 'c/Pase 10', 'CO3', 'lg@gmail.com', '789456123', '5846564R', 'jefe sala', 0, 'Activo', NULL, NULL),
('7586522', 'Yolanda', 'Lopez ', 'c/Pinos 18', 'CO5', 'yl@gmail.com', '222333444', '1512166T', 'jefe sala', 0, 'Activo', NULL, NULL),
('7689315', 'Manuel', 'Tenorio ', 'c/Astral 88', 'CO6', 'mt@gmail.com', '555777444', '7689315I', 'jefe sala', 0, 'Activo', NULL, NULL),
('7777556', 'Paula', 'Jaen ', 'c/Fin 14', 'CO10', 'pj@gmail.com', '333444111', '7777556Ñ', 'Recepcionista', 0, 'Activo', NULL, NULL),
('7878623', 'Miguel', 'Fernandez ', 'c/Derecha 59', 'CO0', 'mf@gmail.com', '698854159', '7878623L', 'Monitor', 0, 'Activo', NULL, NULL),
('7889452', 'Alberto', 'Martin ', 'c/Flor 18', 'CO9', 'am@gmail.com', '132645789', '7889452J', 'Recepcionista', 0, 'Activo', NULL, NULL),
('7895623', 'Maria', 'Lopez ', 'c/Azafran 7', 'CO0', 'ml@gmail.com', '698754159', '7895623K', 'jefe sala', 0, 'Activo', NULL, NULL),
('7986431', 'Esperanza', 'Vazquez ', 'c/Benito 6', 'CO6', 'ev@gmail.com', '666444222', '7986431R', 'Monitor', 0, 'Activo', NULL, NULL),
('8556491', 'Lorenzo', 'García Ferrer', 'c/Federico nº6', 'CO1', 'lorenzo@gmail.com', '639752148', '8556491P', 'jefe sala', 0, 'Activo', NULL, NULL),
('8888455', 'Emilio', 'Castillo ', 'c/Fin 11', 'CO10', 'ec@gmail.com', '444888222', '8888455K', 'jefe sala', 0, 'Activo', NULL, NULL),
('9612214', 'Luisa', 'Sanchez ', 'c/Tico 26', 'CO4', 'ls@gmail.com', '445778221', '9612214R', 'Monitor', 0, 'Activo', NULL, NULL),
('9731154', 'Miguel', 'Fernandez ', 'c/Esquino 10', 'CO3', 'mf@gmail.com', '77755566', '9731154W', 'Recepcionista', 0, 'Activo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_hace`
--

CREATE TABLE `factura_hace` (
  `idFactura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion`
--

CREATE TABLE `formacion` (
  `idFormacion` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `duraciondias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formacion`
--

INSERT INTO `formacion` (`idFormacion`, `fecha`, `duraciondias`) VALUES
('+salud', '2020-01-30', 6),
('Aleman', '2020-02-03', 90),
('Dietetica', '2020-01-30', 7),
('Frances', '2020-02-02', 90),
('Ingles', '2020-03-30', 90),
('Italiano', '2020-04-10', 90),
('NewZumba', '2020-05-30', 15),
('Primeros auxilios', '2020-02-01', 7),
('Spinnin fusion', '2020-02-15', 10),
('Tecnofit', '2020-02-13', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `IdCentro` varchar(4) NOT NULL,
  `IdMaquina` int(3) NOT NULL,
  `IdInstancia` int(11) NOT NULL,
  `IdIncidencia` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `FechaIncidencia` date NOT NULL,
  `Estado` varchar(30) NOT NULL CHECK (`Estado` in ('Enviada','Inspeccionando','Arreglando','Completada'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`IdCentro`, `IdMaquina`, `IdInstancia`, `IdIncidencia`, `Descripcion`, `FechaIncidencia`, `Estado`) VALUES
('CO0', 1, 1, 1, '1', '2020-01-20', 'Enviada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `Usuario` varchar(30) NOT NULL,
  `Contrasena` varchar(30) NOT NULL,
  `Rol` varchar(30) NOT NULL CHECK (`Rol` in ('Admin','Ventas','RRHH','Contabilidad','Inventario','Clientes'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`Usuario`, `Contrasena`, `Rol`) VALUES
('Alberto', 'ITAlberto', 'Ventas'),
('Guillermo', 'ITGuillermo', 'Contabilidad'),
('Ivan', 'ITIvan', 'Inventario'),
('Migue', 'ITMigue', 'RRHH'),
('Octavio', 'ITOctavio', 'Clientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `IdCentro` varchar(4) NOT NULL,
  `IdMaquina` int(3) NOT NULL,
  `IdInstancia` int(11) NOT NULL,
  `Descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`IdCentro`, `IdMaquina`, `IdInstancia`, `Descripcion`) VALUES
('CO0', 1, 1, 'Cinta de correr'),
('CO1', 1, 1, 'Cinta de correr'),
('CO2', 2, 1, 'Pesas'),
('CO2', 9, 6, 'Extensor de piernas'),
('CO3', 5, 1, 'Bicicleta Eliptica'),
('CO3', 7, 8, 'Pecho'),
('CO6', 21, 1, 'Press banca'),
('CO7', 2, 2, 'Pesas'),
('CO8', 10, 8, 'Prensa militar'),
('CO9', 4, 5, 'Remo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofrece`
--

CREATE TABLE `ofrece` (
  `idCentro` varchar(4) NOT NULL,
  `idTarifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasivos`
--

CREATE TABLE `pasivos` (
  `ID_Transiccion` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` text NOT NULL,
  `Importe` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pasivos`
--

INSERT INTO `pasivos` (`ID_Transiccion`, `Fecha`, `Descripcion`, `Importe`) VALUES
(1, '2020-01-20', 'Pago de sueldos de empleados', 20000),
(2, '2020-01-02', 'Pago de sueldos', 12000),
(3, '2020-01-03', 'Pago de sueldos', 25000),
(4, '2020-01-06', 'Impuesto de sociedades', 62000),
(5, '2020-01-07', 'Declaracion de la renta', 75202),
(6, '2020-01-09', 'Mantenimiento de las maquinas', 10550),
(7, '2020-01-10', 'Pago de monitores', 9321),
(8, '2020-01-13', 'Reposición de inventario roto o perdido', 23000),
(9, '2020-01-19', 'Pago dela luz', 45000),
(10, '2020-01-18', 'Pago del agua', 9820);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL,
  `Descripcion` varchar(30) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `Descripcion`, `Cantidad`, `Precio`) VALUES
(1, 'Whey', 20, 35),
(2, 'LCarnitina', 49, 10),
(3, 'Sustitutivo Vainilla', 40, 10),
(4, 'Sustitutivo Fresa', 20, 10),
(5, 'Sustitutivo Chocolate', 50, 10),
(6, 'Barrita Proteina', 100, 1),
(7, 'test', 0, 10),
(8, 'test', 0, 10),
(9, 'test', 0, 10),
(10, 'test', 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `idTarifa` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `idZona` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`ID_Transaccion`);

--
-- Indices de la tabla `asocia`
--
ALTER TABLE `asocia`
  ADD PRIMARY KEY (`idCentro`) USING BTREE,
  ADD KEY `asocia_ibfk_2` (`idCadena`);

--
-- Indices de la tabla `cadena`
--
ALTER TABLE `cadena`
  ADD PRIMARY KEY (`idCadena`),
  ADD KEY `idCadena` (`idCadena`);

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`idCentro`),
  ADD KEY `idCentro` (`idCentro`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`cliente`,`fecha`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`idFactura`,`idProducto`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `da_acceso`
--
ALTER TABLE `da_acceso`
  ADD PRIMARY KEY (`idTarifa`,`idZona`),
  ADD KEY `idZona` (`idZona`);

--
-- Indices de la tabla `empleadostrabajan`
--
ALTER TABLE `empleadostrabajan`
  ADD PRIMARY KEY (`idEmpleado`) USING BTREE,
  ADD KEY `empleadostrabajan_ibfk_1` (`IdCentro`);

--
-- Indices de la tabla `factura_hace`
--
ALTER TABLE `factura_hace`
  ADD PRIMARY KEY (`idFactura`);

--
-- Indices de la tabla `formacion`
--
ALTER TABLE `formacion`
  ADD PRIMARY KEY (`idFormacion`) USING BTREE;

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`IdCentro`,`IdMaquina`,`IdInstancia`,`IdIncidencia`) USING BTREE,
  ADD KEY `IdMaquina` (`IdMaquina`),
  ADD KEY `IdInstancia` (`IdInstancia`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`Usuario`,`Contrasena`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`IdCentro`,`IdInstancia`,`IdMaquina`) USING BTREE,
  ADD KEY `IdMaquina` (`IdMaquina`),
  ADD KEY `IdInstancia` (`IdInstancia`);

--
-- Indices de la tabla `ofrece`
--
ALTER TABLE `ofrece`
  ADD PRIMARY KEY (`idCentro`,`idTarifa`),
  ADD KEY `idTarifa` (`idTarifa`);

--
-- Indices de la tabla `pasivos`
--
ALTER TABLE `pasivos`
  ADD PRIMARY KEY (`ID_Transiccion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`idTarifa`),
  ADD UNIQUE KEY `nombreTarifa` (`nombre`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZona`),
  ADD UNIQUE KEY `nombreZona` (`nombre`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asocia`
--
ALTER TABLE `asocia`
  ADD CONSTRAINT `asocia_ibfk_1` FOREIGN KEY (`idCentro`) REFERENCES `centro` (`idCentro`),
  ADD CONSTRAINT `asocia_ibfk_2` FOREIGN KEY (`idCadena`) REFERENCES `cadena` (`idCadena`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`idFactura`) REFERENCES `factura_hace` (`idFactura`) ON DELETE CASCADE,
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`IdProducto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `da_acceso`
--
ALTER TABLE `da_acceso`
  ADD CONSTRAINT `da_acceso_ibfk_1` FOREIGN KEY (`idTarifa`) REFERENCES `tarifa` (`idTarifa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `da_acceso_ibfk_2` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleadostrabajan`
--
ALTER TABLE `empleadostrabajan`
  ADD CONSTRAINT `empleadostrabajan_ibfk_1` FOREIGN KEY (`IdCentro`) REFERENCES `centro` (`idCentro`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`IdCentro`) REFERENCES `maquinas` (`IdCentro`),
  ADD CONSTRAINT `incidencias_ibfk_2` FOREIGN KEY (`IdMaquina`) REFERENCES `maquinas` (`IdMaquina`),
  ADD CONSTRAINT `incidencias_ibfk_3` FOREIGN KEY (`IdInstancia`) REFERENCES `maquinas` (`IdInstancia`);

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`IdCentro`) REFERENCES `centro` (`idCentro`);

--
-- Filtros para la tabla `ofrece`
--
ALTER TABLE `ofrece`
  ADD CONSTRAINT `ofrece_ibfk_1` FOREIGN KEY (`idCentro`) REFERENCES `centro` (`idCentro`) ON DELETE CASCADE,
  ADD CONSTRAINT `ofrece_ibfk_2` FOREIGN KEY (`idTarifa`) REFERENCES `tarifa` (`idTarifa`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
