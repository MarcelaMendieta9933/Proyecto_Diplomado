-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2023 a las 06:59:30
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
(1, 'Daniel armando cesares', 'Danielarmando@cesares.com', 'perdí la contraseña de mi sección.  ', '2023-10-14 04:58:58');

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

--
-- Volcado de datos para la tabla `emprendedores`
--

INSERT INTO `emprendedores` (`id`, `fk_id_usu`, `nombre_completo`, `ciudad`, `cedula`, `telefono`, `direccion`, `fecha_registro`) VALUES
(1, 48, 'Camila Reyes', 'Bogotá', '1236548975', '3164579635', 'cra 15a #18-45 sur', '2023-10-14 03:45:36'),
(2, 49, 'Marcela Mendieta ', 'Bogota', '10123456987', '314 2396611', 'calle100 av 68 norte', '2023-10-14 04:27:04'),
(3, 50, 'Jorge Sandoval ', 'Medellin', '123456569', '300 8279701', 'cra 15a #18-45 sur', '2023-10-14 04:33:23'),
(4, 51, 'Juan Aya', 'Miami', '1014569872', '31588661770', 'carrera 12k #28d 23 sur', '2023-10-14 04:42:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id` int(11) NOT NULL,
  `fk_id_empre` int(11) DEFAULT NULL,
  `title_emprendimiento` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `whatsapp` varchar(40) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` datetime DEFAULT NULL,
  `categorias` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id`, `fk_id_empre`, `title_emprendimiento`, `descripcion`, `video`, `whatsapp`, `logo`, `fecha_registro`, `fecha_actualizacion`, `categorias`) VALUES
(1, 48, 'Empresa de Productos de Belleza: \"Bellez', 'Belleza Radiante es tu destino para encontrar los secretos de la belleza interior y exterior. Nuestra gama de productos de alta calidad, desde maquillaje hasta cuidado de la piel, está diseñada para realzar tu belleza natural y hacerte sentir segura en tu propia piel. Descubre una amplia gama de opciones que te ayudarán a resaltar tu estilo único', 'vT-4tgS5ILg', '3226589567', '652a16cc56a42_phpA3D3.tmp', '2023-10-14 04:19:24', NULL, 'Belleza, Salud, Piel'),
(2, 49, 'Florería Encantada: \"Flores Eternas\"', 'En Flores Eternas, transformamos momentos especiales en experiencias inolvidables. Nuestra selección de flores frescas y hermosos arreglos florales refleja la pasión por la naturaleza y el arte floral. Cada flor es un poema en sí misma, y estamos aquí para ayudarte a expresar tus emociones más sinceras a través de la belleza efímera de las flores.', 'Bsg3GWnDnYA', '3142396611', '652a19303b2d1_phpFA07.tmp', '2023-10-14 04:29:36', NULL, 'Flores, Rosas, Jardín'),
(3, 50, 'Tienda de Licores : \"Sabor y Distinción\"', 'Sabor y Distinción es tu destino para los paladares más exigentes. Ofrecemos una exquisita variedad de licores premium, vinos y destilados que deleitarán tus sentidos. Descubre la elegancia y el carácter en cada botella, y encuentra el regalo perfecto para celebrar momentos inolvidables.', 'OzHNbIiB874', '300 8279701', '652a1ae2723f3_php9A23.tmp', '2023-10-14 04:36:50', '2023-10-13 23:40:00', 'Licor, Aguardiente, Ron, whisky'),
(4, 51, 'Hamburguesas Gourmet: \"Sabor a la Parril', 'Sabor a la Parrilla te lleva a un viaje culinario inolvidable con nuestras hamburguesas gourmet. Cada hamburguesa está hecha a mano con ingredientes frescos y sabores auténticos que te transportarán a la parrilla perfecta. Ven y descubre por qué nuestras hamburguesas son una experiencia única para tu paladar.', '2RmUBjfqDSY', '3158661770', '652a1cff4527b_phpDAC0.tmp', '2023-10-14 04:45:51', NULL, 'comida Rápida Hamburguesa '),
(5, 49, 'Tienda de Ropa de Moda: \"Estilo Atemporal\"', 'En Estilo Atemporal, la moda se encuentra con la comodidad. Nuestra colección de ropa de alta calidad abraza las últimas tendencias mientras se mantiene fiel a la elegancia clásica. Cada prenda está diseñada pensando en la versatilidad y el estilo personal, para que siempre te sientas seguro y con estilo.', 'kw6UTvMZkV4', '314 2396611', '652a1ddff27a6_php4880.tmp', '2023-10-14 04:49:35', '2023-10-13 23:51:08', 'Ropa Camisas  Busos '),
(6, 50, 'Rincón de Postres: \"Dulces Tentaciones\"', 'Dulces Tentaciones es el paraíso para los amantes de los postres. Nuestra colección de postres exquisitos incluye pasteles, helados, brownies y más. Cada bocado es una celebración de sabor y textura, diseñada para satisfacer tus antojos más dulces y endulzar tus momentos especiales.', 'aJC3PVLVaZ8', '300 8279701', '652a1f21c04c1_php3186.tmp', '2023-10-14 04:54:57', NULL, 'Pasteles ');

--
-- Disparadores `modelo`
--
DELIMITER $$
CREATE TRIGGER `actualiza_fecha_modelo` BEFORE UPDATE ON `modelo` FOR EACH ROW BEGIN
    SET NEW.fecha_actualizacion = NOW();
END
$$
DELIMITER ;

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
(41, 'CamilaAdimin', 'administrador', 'camila123@camila.com', '$2y$10$OCWo2p02j65iYZdrnhLDr.vKna4pO5awGdC0LJ05CC7fsppM/4PZC', NULL),
(48, 'Camila', 'usuario', 'camila123@camila.com', '$2y$10$fd.zRkHxMEhhyxRIqz74muNJEJ51Gx5RZm8yI3CY5wWJQuSSVJzVy', NULL),
(49, 'Marcela', 'usuario', 'marcela123@gmail.com', '$2y$10$/N69vuyMJQRuHeDz1wsql.aHBc1BwJR68DjcZomO5wlQZcFXjZbw.', NULL),
(50, 'Jorge', 'usuario', 'jorge12@gmail.com', '$2y$10$WDOojP5.7LDUy3UCt9gq2OENlz21PzV244IebOFKe9ggB3r9Ct.8q', NULL),
(51, 'Juan', 'usuario', 'juan@juan.com', '$2y$10$UdoI.DqoXTsRP349.raO6efXFCmVplenMLJQ3lauKwIBF1b82osJi', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `emprendedores`
--
ALTER TABLE `emprendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
