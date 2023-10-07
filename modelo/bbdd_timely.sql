-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2023 a las 04:02:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbdd_timely`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactanos`
--

CREATE TABLE `contactanos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `correo` varchar(40) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactanos`
--

INSERT INTO `contactanos` (`id`, `nombre`, `correo`, `descripcion`, `fecha_registro`) VALUES
(1, 'Juan David Aya Pesca ', 'ayajuan0@gmail.com', 'jbhjxzclnkjhbncdjskhgundsmhnuihi', '2023-09-29 05:10:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emprendedores`
--

CREATE TABLE `emprendedores` (
  `id` int(11) NOT NULL,
  `fk_id_usu` int(11) DEFAULT NULL,
  `nombre_completo` varchar(40) DEFAULT NULL,
  `ciudad` varchar(40) DEFAULT NULL,
  `cedula` varchar(40) DEFAULT NULL,
  `telefono` varchar(40) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id` int(11) NOT NULL,
  `fk_id_empre` int(11) DEFAULT NULL,
  `title_emprendimiento` varchar(40) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `productos` text DEFAULT NULL,
  `imagenes` text DEFAULT NULL,
  `whatsapp` varchar(40) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `nivel` varchar(40) DEFAULT NULL,
  `correo` varchar(40) DEFAULT NULL,
  `contraseña` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nivel`, `correo`, `contraseña`, `token`) VALUES
(33, 'Daniela', 'usuario', 'Daniela123@gamil.com', '$2y$10$801PkXcrEsnFZJULUVuhwO9uclNQipNco6fMSZl4SS/ZRzi/QEBA6', NULL),
(34, 'Daniel', 'usuario', 'daniel123@gmail.com', '$2y$10$8bmvd62jpHDqMbuMSJOEAOSTYQVlRgLLV5hQMwdmHZkeRHkSNxUlC', NULL),
(35, 'Nubia', 'usuario', 'nubia123@gmail.com', '$2y$10$PDcb5SyGNY2MEv2bqvpwtuxPtsg76Bwh0xF.EsWmkOQPG31Ev/xpi', NULL),
(39, 'Juan Aya', 'usuario', 'ayajuan0@gmail.com', '$2y$10$atl/CLsehyPngNS8EqjFJ.1Ng9FgADe/rSSzQ5/ZfmPb6QtRWqrb2', NULL),
(40, 'Camila', 'usuario', 'camila123@camila.com', '$2y$10$NMMR/yOrTVSrq7VRpsIFoePVa5Lq75UEz.c6MxQ5/xN2K/4zVkSza', NULL),
(41, 'CamilaAdimin', 'administrador', 'camila123@camila.com', '$2y$10$OCWo2p02j65iYZdrnhLDr.vKna4pO5awGdC0LJ05CC7fsppM/4PZC', NULL),
(42, 'Marce.Mendienta', 'administrador', 'jtakeda@econtactsol.com', '$2y$10$gyT6rkLdJoNbIJi/3ZXt6.946taFsYf6D8/UxM.QInSPxJJKAL4lK', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emprendedores`
--
ALTER TABLE `emprendedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `emprendedores`
--
ALTER TABLE `emprendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
