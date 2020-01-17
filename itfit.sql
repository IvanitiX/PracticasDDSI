-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2020 a las 12:49:50
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
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE `centro` (
  `idCentro` varchar(3) NOT NULL,
  `Altas` int(11) DEFAULT NULL CHECK (`Altas` >= 0),
  `Bajas` int(11) DEFAULT NULL CHECK (`Altas` >= 0),
  `NumEmpleados` int(11) DEFAULT NULL CHECK (`NumEmpleados` >= 1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`idCentro`, `Altas`, `Bajas`, `NumEmpleados`) VALUES
('C01', 0, 0, 2),
('CO2', 1, 1, 3);

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
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `IdCentro` varchar(3) NOT NULL,
  `IdMaquina` int(3) NOT NULL,
  `IdInstancia` int(11) NOT NULL,
  `IdIncidencia` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `FechaIncidencia` date NOT NULL,
  `Estado` varchar(30) NOT NULL CHECK (`Estado` in ('Enviada','Inspeccionando','Arreglando','Completada'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('Iván', 'ITIvan', 'Admin'),
('Iván2', 'ITIvan2', 'Inventario'),
('Migue', 'ITMigue', 'RRHH'),
('Octavio', 'ITOctavio', 'Clientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `IdCentro` varchar(3) NOT NULL,
  `IdMaquina` int(3) NOT NULL,
  `IdInstancia` int(11) NOT NULL,
  `Descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`IdCentro`, `IdMaquina`, `IdInstancia`, `Descripcion`) VALUES
('C01', 1, 1, 'Cinta de correr'),
('C01', 1, 2, 'Cinta de Correr');

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
(2, 'LCarnitina', 49, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`idCentro`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `dni` (`dni`);

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
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`);

--
-- Restricciones para tablas volcadas
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
