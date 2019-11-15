-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-09-2019 a las 13:46:13
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jormatsystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `articulo` varchar(100) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `precio_venta` int(20) NOT NULL,
  `precio_minimo` int(20) NOT NULL,
  `precio_compra` int(20) NOT NULL,
  `existencia` int(200) NOT NULL,
  `proveedor` varchar(200) NOT NULL,
  PRIMARY KEY (`id_articulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `num_factura` int(11) NOT NULL AUTO_INCREMENT,
  `factura` int(11) DEFAULT NULL,
  `l_id_articulo` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `rebaja` int(100) DEFAULT NULL,
  `socio` varchar(100) DEFAULT NULL,
  `total_venta` int(200) DEFAULT NULL,
  `total_ganancia` int(200) DEFAULT NULL,
  `fecha_venta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`num_factura`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

DROP TABLE IF EXISTS `gastos`;
CREATE TABLE IF NOT EXISTS `gastos` (
  `id_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `socio` varchar(200) NOT NULL,
  `tipo_gasto` varchar(200) NOT NULL,
  `cantidad` int(255) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `fecha_gato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gasto`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

DROP TABLE IF EXISTS `ingreso`;
CREATE TABLE IF NOT EXISTS `ingreso` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `socio` varchar(200) NOT NULL,
  `tipo_ingreso` varchar(200) NOT NULL,
  `cantidad` int(255) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ingreso`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `clave` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_login`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `usuario`, `tipo`, `clave`) VALUES
(1, 'Jorge Mata', '1', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(2, 'Darlin Amparo', '2', 'b14361404c078ffd549c03db443c3fede2f3e534d73f78f77301ed97d4a436a9fd9db05ee8b325c0ad36438b43fec8510c204fc1c1edb21d0941c00e9e2c1ce2'),
(3, 'Joel Figuereo', '2', 'b14361404c078ffd549c03db443c3fede2f3e534d73f78f77301ed97d4a436a9fd9db05ee8b325c0ad36438b43fec8510c204fc1c1edb21d0941c00e9e2c1ce2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponche`
--

DROP TABLE IF EXISTS `ponche`;
CREATE TABLE IF NOT EXISTS `ponche` (
  `id_ponche` int(11) NOT NULL AUTO_INCREMENT,
  `l_usuario` varchar(200) NOT NULL,
  `entrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salida` varchar(20) DEFAULT NULL,
  `receso` varchar(20) DEFAULT NULL,
  `r_receso` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_ponche`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ponche`
--

INSERT INTO `ponche` (`id_ponche`, `l_usuario`, `entrada`, `salida`, `receso`, `r_receso`) VALUES
(19, 'defaul', '2019-09-29 12:51:22', '2019-09-29 09:39:43', '29-09-2019 16:27:59', '29-09-2019 16:27:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamo`
--

DROP TABLE IF EXISTS `reclamo`;
CREATE TABLE IF NOT EXISTS `reclamo` (
  `id_reclamo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_reclamo` varchar(200) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `socio` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `fecha_reclamo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reclamo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

DROP TABLE IF EXISTS `socio`;
CREATE TABLE IF NOT EXISTS `socio` (
  `cedula` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `edad` varchar(200) NOT NULL,
  `sexo` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `familiar` varchar(200) NOT NULL,
  `telefonof` varchar(200) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`cedula`, `nombre`, `apellido`, `edad`, `sexo`, `telefono`, `familiar`, `telefonof`, `fecha`) VALUES
('40239154277', 'Jorge', 'Mata', '21', 'Masculino', '8494575427', 'Justina', '8295803047', '2019-09-02 19:29:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
