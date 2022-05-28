-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2022 a las 01:31:18
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog-php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `dominio` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `palablas_claves` text NOT NULL,
  `portada` text NOT NULL,
  `email` text NOT NULL,
  `logo` text NOT NULL,
  `icono` text NOT NULL,
  `redes_sociales` text NOT NULL,
  `sobre_mi` text NOT NULL,
  `sobre_mi_completo` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `dominio`, `titulo`, `descripcion`, `palablas_claves`, `portada`, `email`, `logo`, `icono`, `redes_sociales`, `sobre_mi`, `sobre_mi_completo`, `fecha`) VALUES
(1, 'http://localhost/blog/\r\n', 'Juanito Travel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.\r\n', '[\r\njuanito,\r\ntravel,\r\nviajes,\r\nmochileros,\r\nvuelta al mundo,\r\namerica,\r\nnorte ameria\r\n]', 'vistas/img/articulos/articulo-01/articulo01/articulo01.png', 'edu@edu.com', 'vistas/img/logotipo-negativo.png', 'vistas/img/icono.jpg', '[{\r\n	\"red\":\"facebook\",\r\n	\"url\":\"www.facebook.com\",\r\n	\"icono\",\"fab fa-facebook-f\"\r\n}, {\r\n	\"red\":\"instagram\",\r\n	\"url\":\"www.instagram.com\",\r\n	\"icono\",\"fab fa-instagram\"\r\n}, {\r\n	\"red\":\"twitter\",\r\n	\"url\":\"www.twitter.com\",\r\n	\"icono\",\"fab fa-twitter\"\r\n}, {\r\n	\"red\":\"youtube\",\r\n	\"url\":\"www.youtube.com\",\r\n	\"icono\",\"fab fa-youtube\"\r\n}, {\r\n	\"red\":\"snapchap\",\r\n	\"url\":\"www.snapchap.com\",\r\n	\"icono\",\"fab fa-snapchat-ghost\"\r\n}\r\n]', '<div class=\"sobreMi\">\r\n					\r\n					<h4>Sobre Mi</h4>\r\n\r\n					<img src=\"vistas/img/sobreMi.jpg\" alt=\"Lorem ipsum dolor sit amet\" class=\"img-fluid my-1\">\r\n\r\n					<p class=\"small\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.</p>\r\n\r\n				</div>', '<div class=\"sobreMi\">\r\n	\r\n	<h4>Sobre Mi</h4>\r\n\r\n	<img src=\"vistas/img/sobreMi.jpg\" alt=\"Lorem ipsum dolor sit amet\" class=\"img-fluid my-1\">\r\n\r\n	<p class=\"small\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.</p>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.</p>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.</p>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.</p>\r\n\r\n</div>', '2022-04-13 23:30:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
