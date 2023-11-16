-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 01:45:40
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_aeroluna_luna`
--

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`) VALUES
(1, '2023-11-14 23:39:42', '5430.00'),
(2, '2023-11-14 23:40:05', '1280.00'),
(3, '2023-11-15 04:16:31', '3495.00'),
(4, '2023-11-15 20:13:40', '0.00'),
(5, '2023-11-15 20:14:08', '0.00'),
(6, '2023-11-15 21:02:24', '3282.34'),
(7, '2023-11-15 21:02:50', '7432.32'),
(8, '2023-11-15 21:06:53', '7432.32'),
(9, '2023-11-15 21:15:47', '29729.28'),
(11, '2023-11-16 01:35:53', '63420.32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `Capacidad_maletas` varchar(10) NOT NULL,
  `id_empleado` varchar(10) NOT NULL,
  `capacidad_pasajeros` varchar(10) NOT NULL,
  `tipo_avion` varchar(50) NOT NULL,
  `lugar_salida` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `peso_max` varchar(10) NOT NULL,
  `altura_max` varchar(10) NOT NULL,
  `disponible` int(5) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_acceso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `modelo`, `Capacidad_maletas`, `id_empleado`, `capacidad_pasajeros`, `tipo_avion`, `lugar_salida`, `destino`, `peso_max`, `altura_max`, `disponible`, `precio`, `id_acceso`) VALUES
(1, 'modelo-123', '123.5 t', 'PILOTO-1', '130', 'Turismo', 'Ciudad Juárez', 'Cancún', '124.65 t', '3452,3 ft', 139, '7432.32', 1),
(3, 'Modelo-456', '154.7 t', 'PILOT-123', '127', 'Turista', 'Juárez', 'Monterrey', '300 t', '1243.65 ft', 87, '3637.32', 1),
(6, 'Modelo-777', '123.4 t', 'PILOT-123', '153', 'Pasajeros', 'Monterrey', 'Chihuahua', '450t', '1943.5 ft', 121, '3282.34', 4),
(9, 'Modelo-654', '2322 t', 'PILOT-342', '143', 'Turista', 'CDMX', 'Acapulco', '5423 t', '1232 ft', 122, '4365.23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos_vendidos`
--

CREATE TABLE `vuelos_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_vuelo` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vuelos_vendidos`
--

INSERT INTO `vuelos_vendidos` (`id`, `id_vuelo`, `cantidad`, `id_venta`) VALUES
(9, 1, 4, 9),
(10, 1, 4, 10),
(11, 6, 2, 10),
(12, 1, 5, 11),
(13, 6, 8, 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelos_vendidos`
--
ALTER TABLE `vuelos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vuelo` (`id_vuelo`),
  ADD KEY `id_venta` (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `vuelos_vendidos`
--
ALTER TABLE `vuelos_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
