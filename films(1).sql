-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2025 a las 12:18:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `films`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_peliculas`
--

CREATE TABLE `t_peliculas` (
  `ID` int(20) NOT NULL,
  `titulo_pelicula` varchar(20) NOT NULL,
  `vista` tinyint(1) NOT NULL,
  `FK_ID_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_peliculas`
--

INSERT INTO `t_peliculas` (`ID`, `titulo_pelicula`, `vista`, `FK_ID_persona`) VALUES
(1, 'Amelie Poulain', 1, 1),
(2, 'Los amantes del círc', 0, 6),
(3, 'Suspiria', 1, 5),
(4, 'La vita è bella', 0, 4),
(5, 'Jurassic Park', 0, 2),
(6, 'Indiana Jones', 0, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`ID`, `nombre`) VALUES
(1, 'Rocío'),
(2, 'Sira'),
(3, 'Rocío'),
(4, 'Aimar'),
(5, 'Max'),
(6, 'Germán'),
(7, 'Sira'),
(8, 'Roberto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_peliculas`
--
ALTER TABLE `t_peliculas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_peliculas`
--
ALTER TABLE `t_peliculas`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
