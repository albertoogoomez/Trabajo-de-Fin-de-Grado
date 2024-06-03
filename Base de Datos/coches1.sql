-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2024 a las 21:42:20
-- Versión del servidor: 10.11.7-MariaDB-2ubuntu2
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coches1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Coche`
--

CREATE TABLE `Coche` (
  `IdCoche` int(11) NOT NULL,
  `Foto` varchar(1000) DEFAULT NULL,
  `Marca` varchar(15) DEFAULT NULL,
  `Modelo` varchar(20) DEFAULT NULL,
  `Año` int(4) DEFAULT NULL,
  `Precio` decimal(10,3) DEFAULT NULL,
  `Color` varchar(15) DEFAULT NULL,
  `Peso` double DEFAULT NULL,
  `Longitud` double DEFAULT NULL,
  `Anchura` double DEFAULT NULL,
  `Altura` double DEFAULT NULL,
  `Número_de_plazas` int(1) DEFAULT NULL,
  `Volumen_de_maletero` double DEFAULT NULL,
  `Puertas` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Coche`
--

INSERT INTO `Coche` (`IdCoche`, `Foto`, `Marca`, `Modelo`, `Año`, `Precio`, `Color`, `Peso`, `Longitud`, `Anchura`, `Altura`, `Número_de_plazas`, `Volumen_de_maletero`, `Puertas`) VALUES
(1, '1.png', 'Alfa Romeo', 'Giulia GTA', 2021, 194.000, 'Rojo', 1.605, 4.654, 1.923, 1.397, 5, 480, 4),
(2, '2.png', 'Mclaren', '765 LT', 2020, 545.000, 'Verde lima', 1.414, 4.6, 1.93, 1.193, 2, 210, 2),
(3, '3.png', 'Ferrari', '812 Superfast', 2017, 339.000, 'Rojo', 1.705, 4.657, 1.971, 1.276, 2, 320, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Motor`
--

CREATE TABLE `Motor` (
  `IdMotor` int(11) NOT NULL,
  `IdCoche` int(11) DEFAULT NULL,
  `Caballos_de_potencia` int(4) DEFAULT NULL,
  `Torque` int(4) DEFAULT NULL,
  `Cilindrada` int(5) DEFAULT NULL,
  `Tipo_de_motor` text DEFAULT NULL,
  `Consumo` text DEFAULT NULL,
  `Combustible` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Motor`
--

INSERT INTO `Motor` (`IdMotor`, `IdCoche`, `Caballos_de_potencia`, `Torque`, `Cilindrada`, `Tipo_de_motor`, `Consumo`, `Combustible`) VALUES
(1, 1, 540, 600, 3, 'V6', '10', 'Gasolina'),
(2, 2, 765, 800, 4, 'V8', '12', 'Gasolina'),
(3, 3, 799, 718, 6, 'V12', '16', 'Gasolina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Prestaciones`
--

CREATE TABLE `Prestaciones` (
  `IdPrestaciones` int(11) NOT NULL,
  `IdCoche` int(11) DEFAULT NULL,
  `Velocidad_máxima` varchar(10) DEFAULT NULL,
  `Aceleración` varchar(10) DEFAULT NULL,
  `Distintivo_medioambiental` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Prestaciones`
--

INSERT INTO `Prestaciones` (`IdPrestaciones`, `IdCoche`, `Velocidad_máxima`, `Aceleración`, `Distintivo_medioambiental`) VALUES
(1, 1, '300', '3', 'Etiqueta C'),
(2, 2, '330', '2', 'Etiqueta C'),
(3, 3, '340', '2', 'Etiqueta C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Transmisión`
--

CREATE TABLE `Transmisión` (
  `IdTransmisión` int(11) NOT NULL,
  `IdCoche` int(11) DEFAULT NULL,
  `Caja_de_cambios` varchar(10) DEFAULT NULL,
  `Número_de_velocidades` int(2) DEFAULT NULL,
  `Tracción` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Transmisión`
--

INSERT INTO `Transmisión` (`IdTransmisión`, `IdCoche`, `Caja_de_cambios`, `Número_de_velocidades`, `Tracción`) VALUES
(1, 1, 'Automático', 8, 'Trasera'),
(2, 2, 'Automática', 7, 'Trasera'),
(3, 3, 'Automática', 7, 'Trasera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Apellidos` varchar(30) DEFAULT NULL,
  `Email` varchar(40) NOT NULL,
  `Contrasena` text DEFAULT NULL,
  `Fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `es_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`IdUsuario`, `Nombre`, `Apellidos`, `Email`, `Contrasena`, `Fecha_registro`, `es_admin`) VALUES
(1, 'Alberto', 'Gómez Colina', 'alberto@gmail.com', '$2y$10$A8xX8xTqhov3fXapPKWjlueaDirM9WVJSaD2XhYIuF02c2zqLGvby', '2024-04-30 18:15:20', 1),
(2, 'Jesús', 'Bancora', 'jesus@gmail.com', '$2y$10$T9A80ALNMp5h3GynJUxYWe9uHoVEwsA8i8rlYwJpVn5.v4c0c6Kae', '2024-04-30 18:52:16', 0),
(3, 'Sara', 'García', 'sara@gmail.com', '$2y$10$E9oONlPFaA2HvI.oMe8zU.phUU.LIVIzLnW3C2chdkXV0qjQZzV5C', '2024-04-30 18:54:22', 0),
(4, 'Moises', 'Gómez Colina', 'moi@gmail.com', '$2y$10$NqXbiGVhUigfk7BNTM1u5.eD2X0SKyA4Nz7Ruy8bVNqQpCUU7dLq6', '2024-05-06 21:42:01', 0),
(5, 'Prueba', 'prueba', 'prueba@gmail.com', '$2y$10$taRkSimsw.sC9fF4YM3pM.w0fUZZWPxz/oMt4xNqYP2h.bqSp2Dci', '2024-05-28 18:42:56', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Coche`
--
ALTER TABLE `Coche`
  ADD PRIMARY KEY (`IdCoche`);

--
-- Indices de la tabla `Motor`
--
ALTER TABLE `Motor`
  ADD PRIMARY KEY (`IdMotor`),
  ADD KEY `IdCoche` (`IdCoche`);

--
-- Indices de la tabla `Prestaciones`
--
ALTER TABLE `Prestaciones`
  ADD PRIMARY KEY (`IdPrestaciones`),
  ADD KEY `IdCoche` (`IdCoche`);

--
-- Indices de la tabla `Transmisión`
--
ALTER TABLE `Transmisión`
  ADD PRIMARY KEY (`IdTransmisión`),
  ADD KEY `IdCoche` (`IdCoche`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Coche`
--
ALTER TABLE `Coche`
  MODIFY `IdCoche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Motor`
--
ALTER TABLE `Motor`
  ADD CONSTRAINT `Motor_ibfk_1` FOREIGN KEY (`IdCoche`) REFERENCES `Coche` (`IdCoche`);

--
-- Filtros para la tabla `Prestaciones`
--
ALTER TABLE `Prestaciones`
  ADD CONSTRAINT `Prestaciones_ibfk_1` FOREIGN KEY (`IdCoche`) REFERENCES `Coche` (`IdCoche`);

--
-- Filtros para la tabla `Transmisión`
--
ALTER TABLE `Transmisión`
  ADD CONSTRAINT `Transmisión_ibfk_1` FOREIGN KEY (`IdCoche`) REFERENCES `Coche` (`IdCoche`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
