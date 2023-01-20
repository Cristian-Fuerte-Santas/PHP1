-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2023 a las 20:17:35
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videoclub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `idpeliculas` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `duracion` int(20) NOT NULL,
  `cantidadDisponible` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idpeliculas`, `titulo`, `genero`, `duracion`, `cantidadDisponible`) VALUES
(1, 'Dune', 'Ciencia ficción', 155, -2),
(2, 'El Padrino', 'Drama', 175, 4),
(3, 'Pulp Fiction', 'Thriller', 153, 4),
(4, 'Jason Bourne', 'Acción', 123, 4),
(5, 'Aterriza como puedas', 'Comedia', 88, 4),
(6, 'Amanece que no es poco', 'Comedia', 106, 4),
(7, 'Uno de los nuestros', 'Thriller', 148, 4),
(8, 'Memento', 'Thriller', 113, 4),
(9, 'Avatar', 'Fantástico', 162, 4),
(10, 'Top Gun', 'Acción', 109, 4),
(32, 'Harry Potter 1', 'Fantasía', 128, 4),
(33, 'Harry Potter 2', 'Fantasía', 150, 4),
(34, 'Harry Potter 3', 'Fantasía', 143, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculasclientes`
--

CREATE TABLE `peliculasclientes` (
  `idpeliculasclientes` int(11) NOT NULL,
  `fidpeliculas` int(11) NOT NULL,
  `fidusuarios` int(11) NOT NULL,
  `devuelta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculasclientes`
--

INSERT INTO `peliculasclientes` (`idpeliculasclientes`, `fidpeliculas`, `fidusuarios`, `devuelta`) VALUES
(1, 2, 3, 0),
(2, 5, 2, 1),
(3, 6, 3, 0),
(4, 6, 2, 1),
(14, 7, 2, 1),
(16, 9, 2, 1),
(31, 1, 2, 0),
(32, 1, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contrasenia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `tipo`, `email`, `contrasenia`) VALUES
(1, 0, 'admin', 'admin'),
(2, 1, 'pepemartinez@gmail.com', 'root'),
(3, 1, 'sandramartinez@gmail.com', 'root2'),
(4, 1, 'manolo@hotmail.es', 'root3'),
(5, 1, 'paco@yahoo.com', 'root4'),
(26, 1, 'mmmmmm@gmail.com', 'aaaaa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`idpeliculas`);

--
-- Indices de la tabla `peliculasclientes`
--
ALTER TABLE `peliculasclientes`
  ADD PRIMARY KEY (`idpeliculasclientes`),
  ADD KEY `fidpeliculas` (`fidpeliculas`,`fidusuarios`),
  ADD KEY `fidusuarios` (`fidusuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `idpeliculas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `peliculasclientes`
--
ALTER TABLE `peliculasclientes`
  MODIFY `idpeliculasclientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculasclientes`
--
ALTER TABLE `peliculasclientes`
  ADD CONSTRAINT `peliculasclientes_ibfk_1` FOREIGN KEY (`fidusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculasclientes_ibfk_2` FOREIGN KEY (`fidpeliculas`) REFERENCES `peliculas` (`idpeliculas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
