-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2023 a las 13:27:07
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejercicio_diw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquilados`
--

CREATE TABLE `alquilados` (
  `Marca` varchar(20) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Fecha_alquiler` datetime NOT NULL,
  `Fecha_entrega` datetime NOT NULL,
  `Precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `Marca` varchar(20) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `Matricula` varchar(7) NOT NULL,
  `Bastidor` varchar(17) NOT NULL,
  `Alquilado` tinyint(1) NOT NULL,
  `Tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Numero_tarjeta` varchar(16) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Cargo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Username`, `Email`, `Password`, `DNI`, `Numero_tarjeta`, `Nombre`, `Apellidos`, `Cargo`) VALUES
(1, 'lkgoiug', 'pablomainezrodriguez@gmail.com', '$2y$10$EdeFKFNxNUea7.mIAdo61Oif9wImQ9l0UYwOrHei1V7RjWZRtfIzW', '49525854T', '2147483647', 'Pablo', 'Aaaaaaa Asfasffas', 'USER'),
(6, 'asdf', 'pablomainezrodriguez@gmail.com', '$2y$10$faaqHQceySOWLcfaj8xOj.B74LZT3Wct0iyAOTHDxDZnRfzMufV4W', '49525854T', '1234567890123456', 'Wqrqr', 'Asdf Ghjkl', 'USER');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
