-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2017 a las 19:22:03
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `cod_pelicula` varchar(6) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_alquiler` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `numero_tarjeta` int(11) NOT NULL,
  `password` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `numero_tarjeta`, `password`, `nombre`, `apellidos`, `telefono`, `direccion`) VALUES
(0, 555555, '5555', 'john', 'smith', 555555555, ''),
(3, 666666, '6666', 'max', 'star', 666666666, 'dirección');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Id` int(1) NOT NULL,
  `Nombre` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Id`, `Nombre`) VALUES
(1, 'Drama'),
(2, 'Aventuras'),
(3, 'Comedia'),
(4, 'Ciencia ficción'),
(5, 'Terror'),
(6, 'Thriller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `codigo_pelicula` varchar(6) COLLATE utf8mb4_spanish_ci NOT NULL,
  `titulo` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `director` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `protagonista` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_estreno` date NOT NULL,
  `genero` varchar(256) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `disponibilidad` tinyint(1) NOT NULL,
  `precio_alquiler` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`codigo_pelicula`, `titulo`, `director`, `protagonista`, `fecha_estreno`, `genero`, `disponibilidad`, `precio_alquiler`) VALUES
('1025', 'Indiana Jones y la calavera de cristal', 'Steven Spielberg', 'Harrison Ford', '2008-03-07', 'Aventuras', 7, 1.5),
('1230', 'Terminator', 'James Cameron', 'Arnold  Swarchzenegger', '1984-02-02', 'Sci-fi', 8, 2),
('1235', 'Quien enganio a Roger Rabbit', 'Robert Zemeckis', 'Bob Hoskins', '1988-03-03', 'Comedia', 7, 1.5),
('2369', 'Crash', 'Paul  Haggis', 'Mat Dillon', '2016-04-07', 'Drama', 5, 2.4),
('2546', 'El señor de los anillos', 'Peter Jackson', 'Martin Freeman', '2001-03-07', 'Aventuras', 5, 1.5),
('3210', 'La jungla 3.La venganza', 'Jon Mctiernan', 'Bruce Willis', '1995-06-05', 'thriller', 5, 1.5),
('4691', 'Scream', 'Wes Craven', 'Neve Campbell', '1996-06-15', 'Terror', 4, 1),
('4752', 'American Beauty', 'Sam Mendes', 'Kevin Spacey', '1999-04-14', 'Drama', 7, 1.2),
('5694', 'Gladiator', 'Ridley Scott', 'Russel Crowe', '2000-06-21', 'Aventuras', 5, 1.2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`codigo_pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `Id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
