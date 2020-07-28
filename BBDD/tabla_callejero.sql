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
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
