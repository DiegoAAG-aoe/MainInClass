-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1

-- Tiempo de generación: 06-12-2022 a las 02:07:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reposteriakos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Adm_ID` int(2) NOT NULL,
  `Adm_Correo` varchar(50) NOT NULL,
  `Adm_Contraseña` varchar(20) NOT NULL,
  `Adm_Nombre` varchar(25) NOT NULL,
  `Adm_Apellido` varchar(30) NOT NULL,
  `Adm_Estado` bit(1) NOT NULL,
  `Car_ID` tinyint(2) NOT NULL,
  `Adm_Codpass` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Adm_ID`, `Adm_Correo`, `Adm_Contraseña`, `Adm_Nombre`, `Adm_Apellido`, `Adm_Estado`, `Car_ID`, `Adm_Codpass`) VALUES
(2, 'repo.test7890@gmail.com', 'contraseña', 'Reposteriakos', 'Prueba', b'1', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `Car_ID` tinyint(2) NOT NULL,
  `Car_Nombre` varchar(15) NOT NULL,
  `Car_Estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`Car_ID`, `Car_Nombre`, `Car_Estado`) VALUES
(1, 'Administrador d', b'1'),
(2, 'Gestor', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Cat_ID` tinyint(2) NOT NULL,
  `Cat_Nombre` varchar(15) NOT NULL,
  `Cat_Estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Cat_ID`, `Cat_Nombre`, `Cat_Estado`) VALUES
(1, 'Torta', b'1'),
(2, 'Cupcake', b'1'),
(3, 'Dona', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumidor`
--

CREATE TABLE `consumidor` (
  `Con_ID` int(5) NOT NULL,
  `Con_Correo` varchar(50) NOT NULL,
  `Con_Contraseña` varchar(20) NOT NULL,
  `Con_Nombre` varchar(25) NOT NULL,
  `Con_Apellido` varchar(30) NOT NULL,
  `Con_Estado` bit(1) NOT NULL,
  `Con_Telefono` varchar(9) NOT NULL,
  `Con_Codpass` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consumidor`
--

INSERT INTO `consumidor` (`Con_ID`, `Con_Correo`, `Con_Contraseña`, `Con_Nombre`, `Con_Apellido`, `Con_Estado`, `Con_Telefono`, `Con_Codpass`) VALUES
(1, 'consumi.test7890@gmail.com', 'contraseña', 'Consumidor', 'Prueba', b'1', '9999999', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Est_ID` tinyint(2) NOT NULL,
  `Est_Nombre` varchar(15) NOT NULL,
  `Est_Condicion` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Est_ID`, `Est_Nombre`, `Est_Condicion`) VALUES
(1, 'Solicitado', b'1'),
(2, 'Aceptado', b'1'),
(3, 'Rechazado', b'1'),
(4, 'Pendiente', b'1'),
(5, 'Pagado', b'1'),
(6, 'Cancelado', b'1'),
(7, 'Finalizado', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pead_adm`
--

CREATE TABLE `pead_adm` (
  `Pead_Pedido` int(6) NOT NULL,
  `Pead_Administrador` int(2) NOT NULL,
  `Pead_Fecha` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pead_adm`
--

INSERT INTO `pead_adm` (`Pead_Pedido`, `Pead_Administrador`, `Pead_Fecha`) VALUES
(1, 2, '05-01-22'),
(2, 2, '10-12-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Ped_ID` int(6) NOT NULL,
  `Ped_Consumidor` int(5) NOT NULL,
  `Ped_Respuesta` varchar(500) DEFAULT NULL,
  `Ped_Comprobante` blob DEFAULT NULL,
  `Ped_Estado` tinyint(2) NOT NULL,
  `Ped_Precio` int(20) NOT NULL,
  `Ped_Codpago` int(4) DEFAULT NULL,
  `Ped_FechaEntrega` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Ped_ID`, `Ped_Consumidor`, `Ped_Respuesta`, `Ped_Comprobante`, `Ped_Estado`, `Ped_Precio`, `Ped_Codpago`, `Ped_FechaEntrega`) VALUES
(1, 1, NULL, NULL, 1, 5555, NULL, '10-02-23'),
(2, 1, NULL, NULL, 1, 5454, NULL, '20-03-2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Pro_ID` int(6) NOT NULL,
  `Pro_Nombre` varchar(25) NOT NULL,
  `Pro_Descripcion` varchar(1000) NOT NULL,
  `Pro_Categoria` tinyint(2) DEFAULT NULL,
  `Pro_Estado` bit(1) NOT NULL,
  `Pro_Tipo` tinyint(1) NOT NULL,
  `Pro_Imagen` longblob DEFAULT NULL,
  `Pro_Precio` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `Sol_ID` int(8) NOT NULL,
  `Sol_Pedido` int(6) NOT NULL,
  `Sol_Producto` int(6) NOT NULL,
  `Sol_Cantidad` int(3) NOT NULL,
  `Sol_Imagen` blob DEFAULT NULL,
  `Sol_Precio` int(6) NOT NULL,
  `Sol_Mensaje` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`Sol_ID`, `Sol_Pedido`, `Sol_Producto`, `Sol_Cantidad`, `Sol_Imagen`, `Sol_Precio`, `Sol_Mensaje`) VALUES
(1, 1, 2, 2, NULL, 10000, 'Por favor quiero un cupcake muy rosado.'),
(2, 1, 15, 1, NULL, 25000, 'La quiero con mucho manjar.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Adm_ID`),
  ADD KEY `Car_ID` (`Car_ID`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`Car_ID`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indices de la tabla `consumidor`
--
ALTER TABLE `consumidor`
  ADD PRIMARY KEY (`Con_ID`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Est_ID`);

--
-- Indices de la tabla `pead_adm`
--
ALTER TABLE `pead_adm`
  ADD PRIMARY KEY (`Pead_Pedido`,`Pead_Administrador`),
  ADD KEY `Adm_ID` (`Pead_Administrador`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Ped_ID`),
  ADD KEY `Con_ID` (`Ped_Consumidor`),
  ADD KEY `Est_ID` (`Ped_Estado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Pro_ID`),
  ADD KEY `Cat_ID` (`Pro_Categoria`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`Sol_ID`,`Sol_Pedido`,`Sol_Producto`),
  ADD KEY `Pro_ID` (`Sol_Producto`),
  ADD KEY `Ped_ID` (`Sol_Pedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `Adm_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `Car_ID` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Cat_ID` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `consumidor`
--
ALTER TABLE `consumidor`
  MODIFY `Con_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `Est_ID` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Ped_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Pro_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `Sol_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`Car_ID`) REFERENCES `cargo` (`Car_ID`);

--
-- Filtros para la tabla `pead_adm`
--
ALTER TABLE `pead_adm`
  ADD CONSTRAINT `pead_adm_ibfk_1` FOREIGN KEY (`Pead_Pedido`) REFERENCES `pedido` (`Ped_ID`),
  ADD CONSTRAINT `pead_adm_ibfk_2` FOREIGN KEY (`Pead_Administrador`) REFERENCES `administrador` (`Adm_ID`),
  ADD CONSTRAINT `pead_adm_ibfk_3` FOREIGN KEY (`Pead_Pedido`) REFERENCES `pedido` (`Ped_ID`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Ped_Consumidor`) REFERENCES `consumidor` (`Con_ID`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`Ped_Estado`) REFERENCES `estado` (`Est_ID`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Pro_Categoria`) REFERENCES `categoria` (`Cat_ID`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`Sol_Producto`) REFERENCES `producto` (`Pro_ID`),
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`Sol_Pedido`) REFERENCES `pedido` (`Ped_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Poblamiento de datos
--
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES
 ('Cupcake de Unicornio','Deliciosos Cupcakes de Vainilla decorados con crema y fondant. 6 porciones.',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcake de Unicornio','Deliciosos Cupcakes de Vainilla decorados con crema y fondant. 12 porciones.',02,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcake de Mariposa','Maravillosos Cupcakes de Vainilla decorados con crema y fondant. 6 porciones.',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcake de Mariposa','Maravillosos Cupcakes de Vainilla decorados con crema y fondant. 12 porciones.',02,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcakes Navideños','Fantasticos Cupcakes de Vainilla rellenos con manjar, decorados con crema y fondant. 6 porciones.',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcakes Navideños','Fantasticos Cupcakes de Vainilla rellenos con manjar, decorados con crema y fondant. 12 porciones.',02,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcakes de Halloween','Deliciosos Cupcakes de Chocolate rellenos con Ganache de Chocolate, decorados con crema y fondant. 6 porciones.',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcakes de Halloween','Deliciosos Cupcakes de Chocolate rellenos con Ganache de Chocolate, decorados con crema y fondant. 12 porciones.',02,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcakes de Graduación','Maravillosos Cupcakes de Vainilla decorados con crema y fondant. 6 porciones.',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcakes de Graduación','Maravillosos Cupcakes de Vainilla decorados con crema y fondant. 12 porciones.',02,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcake de San Valentin','Fantasticos Cupcakes de Vainilla rellenos con mermelada, decorados con crema y fondant. 6 porciones.',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcake de San Valentin','Fantasticos Cupcakes de Vainilla rellenos con mermelada, decorados con crema y fondant. 12 porciones.',02,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcake de Minnie','Deliciosos Cupcakes de Vainilla rellenos con Ganache de Chocolate, decorados con crema y fondant. 6 porciones.',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcake de Minnie','Deliciosos Cupcakes de Vainilla rellenos con Ganache de Chocolate, decorados con crema y fondant. 12 porciones.',02,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta de Tres Leches','Exquisita Torta de Tres Leches con relleno de manjar  y crema pastelera. 15 porciones',01,1,1,'25000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcakes de Rosa','Sabrosos cupcakes rellenos con mermelada de frutilla y crema de mantequilla. 12 porciones',02,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta de Manjar','Deliciosa torta rellena con manjar y nuez. 15 porciones.',01,1,1,'20000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta de Manjar','Deliciosa torta rellena con manjar y nuez. 30 porciones.',01,1,1,'35000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta Red Velvet','Sabrosa torta de red velvet rellena con crema de cheesecake. 15 porciones.',01,1,1,'30000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de Sirena','Hermosas donas de vainilla, decoradas con graseado de y fondant. 6 porciones.',03,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de Sirena','Hermosas donas de vainilla, decoradas con graseado de y fondant. 12 porciones.',03,1,1,'20000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de arcoiris','Hermosas donas de limon, decoradas con glaseado de colores. 6 porciones.',03,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de arcoiris','Hermosas donas de limon, decoradas con glaseado de colores. 12 porciones.',03,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de Manzana','Donas de vainilla con manzana, decorada con glaseado y fondant. 6 porciones.',03,1,1,'6000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de Manzana','Donas de vainilla con manzana, decorada con glaseado y fondant. 12 porciones.',03,1,1,'12000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de Estrellas','Hermosas donas de vainilla decoradas con glaseado y estrellas de azúcar. 6 porciones.',03,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de Estrellas','Hermosas donas de vainilla decoradas con glaseado y estrellas de azúcar. 6 porciones.',03,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de Halloween','Donas de chocolate, decoradas con glaseado de colores. 6 porciones.',03,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de Halloween','Donas de chocolate, decoradas con glaseado de colores. 6 porciones.',03,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas de Mantequilla de Maní.','Donas de vainilla rellenas con mantequilla de maní y decoradas con chocolate. 6 porciones.',03,1,1,'10000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas con blancas con detalles azules','15 Donas rellenas con manjar y cubiertas con un glaseado blanco con lineas de glaseado azul.',03,1,1,'3500');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas con glaseado rosado','30 Donas de vainilla cubiertas con glaseado celeste.',03,1,1,'6000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas con chispas de colores','15 Donas con glaseado gris y chispas de colores blanco y rosado.',03,1,1,'3500');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas blanco con glaseado blanco y negro','15 Donas con glaseado blanco y negro haciendo refencia al equipo de futbol colo colo.',03,1,1,'3500');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas con glaseado verde y mariposa blanca','15 donas con glaseado verde y un detalle de mariposa color blanca.',03,1,1,'3500');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcake para el dia de la madre','6 Cupcakes para el dia de la madre con crema color blanca y letras color burdeo.',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcake de Mario Bros','6 Cupcakes diseñados con tematica de Mario Bros.',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta con flores','Deliciosa torta con fondant blanco ademas de detalles florales y corazones de chocolate.',01,1,1,'40000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta con tematica de paw patreon','Deliciosa torta de dos pisos decorada con fondant rojo y azul, ademas de detalles de paw patreon.',01,1,1,'50000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta de Homero Simpson.','Deliciosa torta color base blanco de Homero Simpson.',01,1,1,'40000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta con rosas.','Deliciosa torta con fomdant blanco y rosas color rojo y rosado.',01,1,1,'35000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta con diseño de spider man','Deliciosa torta con decoración de spider man.',01,1,1,'35000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta de Encanto.','Torta con fondant morado y verde agua, con detalles de encantó  y flores.',01,1,1,'30000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta de Marvel.','Torta con fondant azul y rojo, con detalles de súper héroes  de Marvel.',01,1,1,'40000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta chocolate','Torta con chocolate y detalles de color amarillo y rosado.',01,1,1,'50000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas glaseadas blancas con mostacilla','15 donas con glaseado blanco sabor coco y mostacilla gourmet',03,1,1,'3500');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta Hot Wheels','1 Torta de Hot Wheels sabor chocolate relleno con frutillas 30 porciones',01,1,1,'35000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas glaseadas rosas con mostacilla','15 donas de vainilla con exquisito con glaseado rosa y mostacilla gourmet',03,1,1,'3500');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas glaseadas moradas con mostacilla','15 donas con glaseado morado sabor arandano y mostacilla azul y amarilla con forma de estrella',03,1,1,'3500');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta de frutilla y chocolate','15 porciones de torta con crema rosa y frutillas bañadas en chocolate  ',01,1,1,'30000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta de limon','15 porciones de torta de limon y crema batida',01,1,1,'35000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta Primavera con rosas y mariposas','15 porciones de torta con decoraciones comestibles de rosas y mariposas de fondant',01,1,1,'40000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcake de Age of Empires','6 cupcakes de chocolate rellenos con mermelada de frambuesa',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Cupcakes formales','6 cupcakes formales con diseño de corbata y rellenos con manjar',02,1,1,'5000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta de halloween con temática arañas ','15 porciones de torta de chocolate cubierta en fondane blanco y con arañas hechas de fondane negro y diseño de tela',01,1,1,'35000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta Navideña guirnalda','15 porciones de torta tres leches con diseño de guirnalda navideña hecho de fondane',01,1,1,'40000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Donas Cubiertas de Chocolate ','Exquisitas donas de vainilla cubiertas con una gruesa capa de chocolate',03,1,1,'3500');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta Navideña Bosque nevado','15 porciones de torta tres leches sabor menta refrescante con diseño de bosque nevado hecho de fondane blanco y verde',01,1,1,'35000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta halloween diseño calabaza','10 porciones de torta trufa manjar con diseño de calabaza hecho de fondane naranjo ',01,1,1,'30000');
INSERT INTO `producto`( `Pro_Nombre`, `Pro_Descripcion`, `Pro_Categoria`, `Pro_Estado`, `Pro_Tipo`,  `Pro_Precio`) VALUES 
('Torta para el día de la Madre','15 porciones de torta con crema blanca  con corazones rojos hechos de fondane',01,1,1,'$30.000');

--
-- Carga de imagenes a la base de datos
--
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD001.png')
WHERE Pro_ID=1;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\002.png')
WHERE Pro_ID=2;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\003.png')
WHERE Pro_ID=3;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\004.png')
WHERE Pro_ID=4;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\005.png')
WHERE Pro_ID=5;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\006.png')
WHERE Pro_ID=6;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\007.png')
WHERE Pro_ID=7;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\008.png')
WHERE Pro_ID=8;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\009.png')
WHERE Pro_ID=9;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\010.png')
WHERE Pro_ID=10;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\011.png')
WHERE Pro_ID=11;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\012.png')
WHERE Pro_ID=12;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\013.png')
WHERE Pro_ID=13;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\014.png')
WHERE Pro_ID=14;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\015.png')
WHERE Pro_ID=15;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\016.png')
WHERE Pro_ID=16;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\017.png')
WHERE Pro_ID=17;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\018.png')
WHERE Pro_ID=18;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\019.png')
WHERE Pro_ID=19;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\020.png')
WHERE Pro_ID=20;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\021.png')
WHERE Pro_ID=21;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\022.png')
WHERE Pro_ID=22;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\023.png')
WHERE Pro_ID=23;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\024.png')
WHERE Pro_ID=24;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\025.png')
WHERE Pro_ID=25;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\026.png')
WHERE Pro_ID=26;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\027.png')
WHERE Pro_ID=27;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\028.png')
WHERE Pro_ID=28;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\029.png')
WHERE Pro_ID=29;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\030.png')
WHERE Pro_ID=30;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\031.png')
WHERE Pro_ID=31;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\032.png')
WHERE Pro_ID=32;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\033.png')
WHERE Pro_ID=33;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\034.png')
WHERE Pro_ID=34;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\035.png')
WHERE Pro_ID=35;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\036.png')
WHERE Pro_ID=36;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\037.png')
WHERE Pro_ID=37;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\038.png')
WHERE Pro_ID=38;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\039.png')
WHERE Pro_ID=39;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\040.png')
WHERE Pro_ID=40;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\041.png')
WHERE Pro_ID=41;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\042.png')
WHERE Pro_ID=42;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\043.png')
WHERE Pro_ID=43;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\044.png')
WHERE Pro_ID=44;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\045.png')
WHERE Pro_ID=45;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\046.png')
WHERE Pro_ID=46;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\047.png')
WHERE Pro_ID=47;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\048.png')
WHERE Pro_ID=48;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\049.png')
WHERE Pro_ID=49;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\050.png')
WHERE Pro_ID=50;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\051.png')
WHERE Pro_ID=51;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\052.png')
WHERE Pro_ID=52;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\053.png')
WHERE Pro_ID=53;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\054.png')
WHERE Pro_ID=54;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\055.png')
WHERE Pro_ID=55;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\056.png')
WHERE Pro_ID=56;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\057.png')
WHERE Pro_ID=57;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\058.png')
WHERE Pro_ID=58;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\059.png')
WHERE Pro_ID=59;
UPDATE `producto` SET `Pro_Imagen`= LOAD_FILE('C:\xampp\htdocs\Reposteriakos\IMGPROD\060.png')
WHERE Pro_ID=60;

--
-- Carga de list_categoria
--
 INSERT INTO list_categoria (list_cat_id, list_cat_nombre, list_cat_estado)
  SELECT Cat_ID, Cat_Nombre, Cat_Estado 
  FROM categoria 
  Where Cat_ID BETWEEN 1 AND 99;

 --
 -- Carga de list_productos
 -- 
  INSERT INTO list_producto (list_pro_Id, list_pro_nombre, list_pro_tipo, list_pro_precio, list_pro_estado, list_pro_descrip)
  SELECT Pro_ID, Pro_Nombre, Pro_Tipo, Pro_Precio, Pro_Estado, Pro_Descripcion 
  FROM producto 
  Where Pro_ID BETWEEN 1 AND 999999;