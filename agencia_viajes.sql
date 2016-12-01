-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-12-2016 a las 10:22:30
-- Versión del servidor: 5.7.16-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agencia_viajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excursiones`
--

CREATE TABLE `excursiones` (
  `codigo` varchar(5) COLLATE utf8_bin NOT NULL,
  `categoria` varchar(30) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(60) COLLATE utf8_bin NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `imagen` varchar(20) COLLATE utf8_bin NOT NULL,
  `oferta` varchar(2) COLLATE utf8_bin NOT NULL,
  `novedad` varchar(2) COLLATE utf8_bin NOT NULL,
  `detalle` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `excursiones`
--

INSERT INTO `excursiones` (`codigo`, `categoria`, `nombre`, `precio`, `imagen`, `oferta`, `novedad`, `detalle`) VALUES
('exc1', 'acuática', 'Mujeres', '1900.00', 'mujeres.jpg', 'si', 'no', 'Recibe su nombre gracias a ellas.'),
('exc2', 'acuática', 'Buceo', '2400.00', 'buceo.jpg', 'si', 'si', 'El mejor fondo marino.'),
('exc3', 'acuática', 'Canoa', '2850.00', 'canoa.jpeg', 'no', 'no', 'Capacidad para 2 personas.'),
('exc4', 'aérea', 'Tirolina', '1500.00', 'tirolina.jpg', 'no', 'si', 'No apto para personas con vértigo.'),
('exc5', 'acuatica', 'nado delfin', '1050.00', 'nado.jpg', 'si', 'no', 'Acariciar delfines, una pasada.'),
('exc6', 'aerea', 'Vuelo', '7500.00', 'vuelo.jpg', 'no', 'si', 'Vistas desde helicóptero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(2) NOT NULL,
  `nombre` varchar(10) COLLATE utf8_bin NOT NULL,
  `password` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'usuario', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `excursiones`
--
ALTER TABLE `excursiones`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
