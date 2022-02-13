-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2022 a las 20:15:46
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `fecha` date NOT NULL,
  `tipo_practica` varchar(4) NOT NULL,
  `total_horas` double(10,2) NOT NULL,
  `actividad_realizada` varchar(200) NOT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `alumno_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`fecha`, `tipo_practica`, `total_horas`, `actividad_realizada`, `observaciones`, `alumno_id`, `id`, `fecha_creacion`) VALUES
('2021-11-02', 'Dual', 4.50, 'Extender el comunismo', 'Todos debemos ser iguales.', 3, 1, '2021-11-20'),
('2022-03-30', 'Dual', 3.50, 'Robar Cutie Marks', 'Resulto una tarea ardua', 3, 6, '2022-02-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `contraseña` varchar(32) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` int(9) NOT NULL,
  `horas_dual` double(10,2) NOT NULL,
  `horas_fct` double(10,2) NOT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `dni` varchar(9) NOT NULL,
  `id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`nombre`, `apellidos`, `contraseña`, `fecha_nacimiento`, `email`, `telefono`, `horas_dual`, `horas_fct`, `observaciones`, `dni`, `id`, `fecha_creacion`, `empresa_id`, `profesor_id`) VALUES
('Peter', 'Parkulen', '51dc30ddc473d43a6011e9ebba6ca770', '2021-11-09', 'peter@gmail.com', 465825476, 100.00, 60.00, 'spideman, el espectular spideman xd', '56473829Y', 1, '2021-11-20', 3, 2),
('Starlight', 'Glimmer', '725d67c6060d549367b7da410ae79e68', '2021-11-08', 'starlight@gmail.com', 564734523, 150.00, 20.00, 'La mejor', '54874357P', 3, '2021-11-20', 2, 3),
('Peppa', 'Pig', '6e9a4d130a9b316e9201238844dd5124', '2021-12-07', 'pepa@gmail.com', 564867254, 100.00, 50.00, 'zerda', '75637634B', 5, '2021-12-19', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `nombre` varchar(40) NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(40) NOT NULL,
  `responsable` varchar(45) NOT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`nombre`, `telefono`, `email`, `responsable`, `observaciones`, `id`, `fecha_creacion`) VALUES
('Premmia Network', 123456789, 'premmia@premmia.com', 'Joselu Grande, El mejor', 'La empresa de Big Data más grande de España', 2, '2021-11-20'),
('Monstruos S.A.', 465836217, 'sustos@monstruos.com', 'James P. Sullyvan', 'Asustamos porque nos preocupamos', 3, '2021-11-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `contraseña` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`nombre`, `apellidos`, `contraseña`, `email`, `id`, `fecha_creacion`) VALUES
('Josan', 'Lara', 'a', 'josan@cesur.com', 2, '2021-11-20'),
('Francisco', 'Romero', 'a', 'francisco@cesur.com', 3, '2021-11-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`),
  ADD KEY `profesor_id` (`profesor_id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`);

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
