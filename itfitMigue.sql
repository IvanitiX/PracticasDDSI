-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2019 a las 22:59:18
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
('CO2', 0, 0, 3),
('CO3', 0, 0, 3),
('CO4', 0, 0, 3),
('CO5', 0, 0, 3),
('CO6', 0, 0, 3),
('CO7', 0, 0, 3),
('CO8', 0, 0, 3),
('CO9', 0, 0, 3),
('CO10', 0, 0, 3),
('CO11', 0, 0, 3);



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
('Alberto', 'ITAlberto', 'Clientes'),
('Guillermo', 'ITGuillermo', 'Contabilidad'),
('Iván', 'ITIvan', 'Admin'),
('Iván2', 'ITIvan2', 'Inventario'),
('Migue', 'ITMigue', 'RRHH'),
('Octavio', 'ITOctavio', 'Ventas');

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

--
--RECURSOS HUMANOS
--
CREATE TABLE  `empleadostrabajan`(
`idEmpleado` varchar(8) NOT NULL, 
`nombre` varchar(10) NOT NULL,
`apellidos` varchar (30) NOT NULL,
`domicilio` varchar(30) NOT NULL,
`IdCentro` varchar(3) NOT NULL,
`correo` varchar(100) NOT NULL,
`Telefono` varchar(9) NOT NULL,
`dni` varchar(9) NOT NULL,
`Puesto` varchar(20) NOT NULL,
`Jornada` INT DEFAULT NULL,
`Estado` varchar(10) NOT NULL CHECK (`Estado` in ('Activo','Baja')),
Formación varchar(20) DEFAULT NULL


)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `formacion`(
  `idFormacion` varchar(20) NOT NULL,
  `fecha`date NOT NULL,
  `duraciondias`  INT(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `formacion`
  ADD PRIMARY KEY (`idFormacion`) USING BTREE;

ALTER TABLE `empleadostrabajan`
  ADD PRIMARY KEY (`IdEmpleado`) USING BTREE,
  ADD CONSTRAINT `empleadostrabajan_ibfk_1` FOREIGN KEY (`IdCentro`) REFERENCES `centro` (`idCentro`)
  ADD CONSTRAINT `empleadostrabajan_ibfk_2` FOREIGN KEY (`Formación`) REFERENCES `formacion` (`idFormacion`);

ALTER TABLE `empleadostrabajan` ADD `incorporacion` date DEFAULT  NULL;



CREATE TABLE  `cadena`(
`idCadena` varchar(10) NOT NULL, 
`NumCentros` INT NOT NULL check(`NumCentros` >=1),
`Altas` INT NOT NULL check(`Altas` >= 0),
`Bajas` INT NOT NULL check(`Bajas` >= 0),
`NumEmpleados` INT NOT NULL,
`Maxempleados` INT NOT NULL,
`Vacantes` INT NOT NULL check (`Vacantes` <= `Maxempleados`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `cadena`
  ADD PRIMARY KEY (`IdCadena`) USING BTREE;
  

CREATE TABLE  `contiene`(
`idCentro` varchar(3) NOT NULL, 
`idCadena` varchar(10) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `contiene`
  ADD PRIMARY KEY (`IdCentro`) USING BTREE,
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`IdCentro`) REFERENCES `centro` (`idCentro`),
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`IdCadena`) REFERENCES `cadena` (`idCadena`);



INSERT INTO `cadena` (`idCadena`, `NumCentros`, `Altas`, `Bajas`, `NumEmpleados`, `Maxempleados`, `Vacantes`) VALUES 

;

INSERT INTO `cadena` (`idCadena`, `NumCentros`, `Altas`, `Bajas`, `NumEmpleados`, `Maxempleados`, `Vacantes`) VALUES 
('España', '2', '0', '0', '6', '100', '94'),
('Portugal', '1', '0', '0', '3', '100', '97'),
('Francia', '2', '0', '0', '6', '100', '94'),
('Marruecos', '1', '0', '0', '3', '100', '97'),
('Italia', '1', '0', '0', '3', '100', '97'),
('Reino Unido', '1', '0', '0', '3', '100', '97'),
('Alemania', '1', '0', '0', '3', '100', '97'),
('Croacia', '1', '0', '0', '3', '100', '97'),
('Turquía', '1', '0', '0', '3', '100', '97'),
('Holanda', '1', '0', '0', '3', '100', '97');

INSERT INTO `contiene` (`idCentro`, `idCadena`) VALUES 
('C01', 'España'),
('CO2', 'España'),
('CO0', 'Francia'),
('CO3', 'Francia'),
('CO4', 'Alemania'),
('CO5', 'Croacia'),
('CO6', 'Holanda'),
('CO7', 'Italia'),
('CO8', 'Marruecos'),
('CO9', 'Portugal'),
('CO10', 'Reino Unid'),
('CO11', 'Turquía');




INSERT INTO `empleadostrabajan`(`idEmpleado`, `nombre`, `apellidos`, `domicilio`, `IdCentro`, `correo`, `Telefono`, `dni`, `Puesto`, `Jornada`, `Estado`, `Formación`, `incorporacion`)VALUES
('45768214', 'Jose', 'Diaz', 'c/Azul 6', 'CO1', 'josed@gmail.com', '689126478', '45768214L', 'Monitor', '0', 'Activo', NULL,NULL),
('65547829', 'Julia', 'Ramirez', 'Avda. Francisco Romero 78', 'CO1', 'jr@gamil.com', '755764901', '65547829W', 'Recepcionista', '0', 'Activo', NULL,NULL),
('8556491', 'Lorenzo', 'García Ferrer', 'c/Federico nº6', 'CO1', 'lorenzo@gmail.com', '639752148', '8556491P', 'jefe sala', '0', 'Activo', NULL,NULL),
('7895623', 'Maria', 'Lopez ', 'c/Azafran 7', 'CO0', 'ml@gmail.com', '698754159', '7895623K', 'jefe sala', '0', 'Activo', NULL,NULL),
('7878623', 'Miguel', 'Fernandez ', 'c/Derecha 59', 'CO0', 'mf@gmail.com', '698854159', '7878623L', 'Monitor', '0', 'Activo', NULL,NULL),
('6521587', 'Eva', 'Jimenez ', 'c/Pintor 20', 'CO0', 'ej@gmail.com', '622357426', '6521587D', 'Recepcionista', '0', 'Activo', NULL,NULL),
('6521789', 'Luis', 'Jimenez ', 'c/Puentes 20', 'CO2', 'lj@gmail.com', '624857426', '6521789Q', 'jefe sala', '0', 'Activo', NULL,NULL),
('4785523', 'Rebeca', 'Garcia ', 'c/Melero 69', 'CO2', 'rg@gmail.com', '622357426', '4785523F', 'Monitor', '0', 'Activo', NULL,NULL),
('7546454', 'Manuel', 'Perez ', 'c/Rebites 10', 'CO2', 'mp@gmail.com', '755357426', '5846564R', 'Recepcionista', '0', 'Activo', NULL,NULL),
('7564454', 'Lucia', 'Garcia ', 'c/Pase 10', 'CO3', 'lg@gmail.com', '789456123', '5846564R', 'jefe sala', '0', 'Activo', NULL,NULL),
('5454547', 'Felipe', 'Hurtado ', 'c/Tico 8', 'CO3', 'fh@gmail.com', '77744411', '7564454Q', 'Monitor', '0', 'Activo', NULL,NULL),
('9731154', 'Miguel', 'Fernandez ', 'c/Esquino 10', 'CO3', 'mf@gmail.com', '77755566', '9731154W', 'Recepcionista', '0', 'Activo', NULL,NULL),
('6448481', 'Pedro', 'Martín ', 'c/Abeto ', 'CO4', 'pm@gmail.com', '666555222', '6448481E', 'jefe sala', '0', 'Activo', NULL,NULL),
('9612214', 'Luisa', 'Sanchez ', 'c/Tico 26', 'CO4', 'ls@gmail.com', '445778221', '9612214R', 'Monitor', '0', 'Activo', NULL,NULL),
('1512166', 'Andrea', 'Perez ', 'c/Felipe 8', 'CO4', 'ap@gmail.com', '111222333', '5846564R', 'Recepcionista', '0', 'Activo', NULL,NULL),
('7586522', 'Yolanda', 'Lopez ', 'c/Pinos 18', 'CO5', 'yl@gmail.com', '222333444', '1512166T', 'jefe sala', '0', 'Activo', NULL,NULL),
('2425250', 'Fernando', 'García ', 'c/Sol 8', 'CO5', 'fg@gmail.com', '555444999', '2425250Y', 'Monitor', '0', 'Activo', NULL,NULL),
('4679821', 'Leonardo', 'Alamagro ', 'c/Luna 8', 'CO5', 'la@gmail.com', '777555444', '4679821U', 'Recepcionista', '0', 'Activo', NULL,NULL),
('7689315', 'Manuel', 'Tenorio ', 'c/Astral 88', 'CO6', 'mt@gmail.com', '555777444', '7689315I', 'jefe sala', '0', 'Activo', NULL,NULL),
('7986431', 'Esperanza', 'Vazquez ', 'c/Benito 6', 'CO6', 'ev@gmail.com', '666444222', '7986431R', 'Monitor', '0', 'Activo', NULL,NULL),
('1598875', 'Maria', 'Ramos ', 'c/Navas 8', 'CO6', 'mr@gmail.com', '444555444', '1598875O', 'Recepcionista', '0', 'Activo', NULL,NULL),
('7412589', 'Claudia', 'Perez ', 'c/Bendita 9', 'CO7', 'cp@gmail.com', '444557777', '7412589P', 'jefe sala', '0', 'Activo', NULL,NULL),
('3698524', 'Antonio', 'Martinez ', 'c/Copo 18', 'CO7', 'am@gmail.com', '888997555', '3698524A', 'Monitor', '0', 'Activo', NULL,NULL),
('4567531', 'Federico', 'Alfaro ', 'c/Teja 6', 'CO7', 'fa@gmail.com', '555000111', '4567531S', 'Recepcionista', '0', 'Activo', NULL,NULL),
('7548923', 'Francisco', 'Gutierrez ', 'c/Poeta 6', 'CO8', 'fg@gmail.com', '119443553', '7548923D', 'jefe sala', '0', 'Activo', NULL,NULL),
('1645798', 'Paloma', 'Perez ', 'c/Luis 8', 'CO8', 'pp@gmail.com', '467542862', '1645798F', 'Monitor', '0', 'Activo', NULL,NULL),
('1547892', 'Valeria', 'Garcia ', 'c/Fray 8', 'CO8', 'vg@gmail.com', '777666444', '1547892G', 'Recepcionista', '0', 'Activo', NULL,NULL),
('1457345', 'Andrea', 'Sacaluga ', 'c/Pepe 9', 'CO9', 'mp@gmail.com', '112458367', '1457345H', 'jefe sala', '0', 'Activo', NULL,NULL),
('0001144', 'Rodrigo', 'Perez ', 'c/Flor 8', 'CO9', 'rp@gmail.com', '764592102', '0001144I', 'Monitor', '0', 'Activo', NULL,NULL),
('7889452', 'Alberto', 'Martin ', 'c/Flor 18', 'CO9', 'am@gmail.com', '132645789', '7889452J', 'Recepcionista', '0', 'Activo', NULL,NULL),
('8888455', 'Emilio', 'Castillo ', 'c/Fin 11', 'CO10', 'ec@gmail.com', '444888222', '8888455K', 'jefe sala', '0', 'Activo', NULL,NULL),
('6667878', 'Alfredo', 'Madrid ', 'c/Fin 11', 'CO10', 'am@gmail.com', '222000111', '6667878L', 'Monitor', '0', 'Activo', NULL,NULL),
('7777556', 'Paula', 'Jaen ', 'c/Fin 14', 'CO10', 'pj@gmail.com', '333444111', '7777556Ñ', 'Recepcionista', '0', 'Activo', NULL,NULL),
('0000031', 'Marta', 'Martin ', 'c/Toro 15', 'CO11', 'mm@gmail.com', '444666777', '0000031Z', 'jefe sala', '0', 'Activo', NULL,NULL),
('2151515', 'Soledad', 'Garcia ', 'c/Toro 8', 'CO11', 'sg@gmail.com', '444777222', '2151515X', 'Monitor', '0', 'Activo', NULL,NULL),
('3121212', 'Miguel', 'Perez ', 'c/Toro 8', 'CO11', 'mp@gmail.com', '111000000', '3121212C', 'Recepcionista', '0', 'Activo', NULL,NULL);



INSERT INTO `formacion` (`idFormacion`, `fecha`, `duraciondias`) VALUES 
('Tecnofit', '2020-02-13', '15'),
('+salud', '2020-01-30', '6'),
('Ingles', '2020-03-30', '90'),
('Frances', '2020-02-2', '90'),
('Italiano', '2020-04-10', '90'),
('Aleman', '2020-02-3', '90'),
('NewZumba', '2020-05-30', '15'),
('Primeros auxilios', '2020-02-1', '7'),
('Spinnin fusion', '2020-02-15', '10'),
('Dietetica', '2020-01-30', '7');







-------------------------------------------------------------
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
