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

-- Volcando estructura para tabla callejero_nae.tipo_solicitudes
CREATE TABLE IF NOT EXISTS `tipo_solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla callejero_nae.tipo_solicitudes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_solicitudes` DISABLE KEYS */;
INSERT INTO `tipo_solicitudes` (`id`, `Descripcion`) VALUES
	(0, 'Baja de calle'),
	(1, 'alta de calle'),
	(2, 'Modificacion'),
	(3, 'Analisis');
/*!40000 ALTER TABLE `tipo_solicitudes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
