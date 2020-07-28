-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para callejero_nae
CREATE DATABASE IF NOT EXISTS `callejero_nae` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `callejero_nae`;

-- Volcando estructura para tabla callejero_nae.callejero_nae_base_feb2020
CREATE TABLE IF NOT EXISTS `callejero_nae_base_feb2020` (
  `ID_REGISTRO` int(11) NOT NULL AUTO_INCREMENT,
  `PROVINCIA` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `MUNICIPIO` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `POBLACION` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `AGRUPACION` int(11) DEFAULT NULL,
  `TIPO_VIA` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CALLE` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CODIGO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `G12` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_GRABACION` datetime DEFAULT CURRENT_TIMESTAMP,
  `LATITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LONGITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `BAJA` int(1) DEFAULT NULL,
  `ID_INE` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `REFERENCIA_CATASTRAL` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `G17` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NUMERO` int(5) DEFAULT NULL,
  `N_HOGARES` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`ID_REGISTRO`),
  KEY `G12` (`G12`),
  KEY `PROVINCIA` (`PROVINCIA`),
  KEY `MUNICIPIO` (`MUNICIPIO`),
  KEY `POBLACION` (`POBLACION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla callejero_nae.callejero_nae_base_feb2020_old
CREATE TABLE IF NOT EXISTS `callejero_nae_base_feb2020_old` (
  `ID_REGISTRO` int(11) NOT NULL AUTO_INCREMENT,
  `PROVINCIA` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `MUNICIPIO` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `POBLACION` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `AGRUPACION` int(11) DEFAULT NULL,
  `TIPO_VIA` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CALLE` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NUMERO` int(5) DEFAULT NULL,
  `CODIGO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `G12` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_GRABACION` datetime DEFAULT CURRENT_TIMESTAMP,
  `LATITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LONGITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `BAJA` int(1) DEFAULT NULL,
  `ID_INE` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `REFERENCIA_CATASTRAL` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `G17` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `N_HOGARES` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`ID_REGISTRO`),
  KEY `G12` (`G12`),
  KEY `PROVINCIA` (`PROVINCIA`),
  KEY `MUNICIPIO` (`MUNICIPIO`),
  KEY `POBLACION` (`POBLACION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla callejero_nae.tabla_solicitudes
CREATE TABLE IF NOT EXISTS `tabla_solicitudes` (
  `ID_SOLICITUD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_NAE` int(11) NOT NULL DEFAULT '0',
  `ID_INE` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  `ID_INE_SOLICITUD` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  `PROVINCIA` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `MUNICIPIO` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `POBLACION` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `AGRUPACION` int(11) DEFAULT NULL,
  `TIPO_VIA` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CALLE` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NUMERO` int(5) DEFAULT NULL,
  `HOGARES` int(5) DEFAULT NULL,
  `CODIGO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `G12` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `G17` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CATASTRO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LATITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LONGITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `BAJA` int(1) DEFAULT NULL,
  `CALLE_SOLICITUD` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PROVINCIA_SOLICITUD` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `MUNICIPIO_SOLICITUD` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `POBLACION_SOLICITUD` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `AGRUPACION_SOLICITUD` int(11) DEFAULT NULL,
  `TIPO_VIA_SOLICITUD` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NUMERO_SOLICITUD` int(5) DEFAULT NULL,
  `HOGARES_SOLICITUD` int(5) DEFAULT NULL,
  `CODIGO_SOLICITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `G12_SOLICITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `G17_SOLICITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CATASTRO_SOLICITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LATITUD_SOLICITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LONGITUD_SOLICITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `BAJA_SOLICITUD` int(1) DEFAULT NULL,
  `FECHA_SOLICITUD` datetime DEFAULT CURRENT_TIMESTAMP,
  `USUARIO_SOLICITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `COMENTARIO_SOLICITUD` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ESTADO_SOLICITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `USUARIO_CIERRE` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TIPO_SOLICITUD` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FECHA_CIERRE` datetime DEFAULT NULL,
  `COMENTARIO_CIERRE` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`ID_SOLICITUD`),
  KEY `G12` (`G12`),
  KEY `PROVINCIA` (`PROVINCIA`),
  KEY `MUNICIPIO` (`MUNICIPIO`),
  KEY `POBLACION` (`POBLACION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla callejero_nae.tipos_estados_solicitud
CREATE TABLE IF NOT EXISTS `tipos_estados_solicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) COLLATE utf8_spanish2_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla callejero_nae.tipos_usuario
CREATE TABLE IF NOT EXISTS `tipos_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla callejero_nae.tipo_estados_calles
CREATE TABLE IF NOT EXISTS `tipo_estados_calles` (
  `id` int(11) DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `info` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla callejero_nae.tipo_solicitudes
CREATE TABLE IF NOT EXISTS `tipo_solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla callejero_nae.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipo` int(11) NOT NULL DEFAULT '2',
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_spanish2_ci DEFAULT '0',
  `telefono` varchar(50) COLLATE utf8_spanish2_ci DEFAULT '0',
  `Codigo_proyecto_Nae` varchar(50) COLLATE utf8_spanish2_ci DEFAULT '0',
  `Nombre_proyecto_Nae` varchar(50) COLLATE utf8_spanish2_ci DEFAULT '0',
  `BAJA` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
