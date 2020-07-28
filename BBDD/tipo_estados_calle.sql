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

-- Volcando estructura para tabla callejero_nae.tipo_estados_calles
CREATE TABLE IF NOT EXISTS `tipo_estados_calles` (
  `id` int(11) DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `info` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla callejero_nae.tipo_estados_calles: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_estados_calles` DISABLE KEYS */;
INSERT INTO `tipo_estados_calles` (`id`, `tipo`, `info`) VALUES
	(0, 'BAJA', 'calle dada de baja, sino coincide callejero con in'),
	(1, 'ALTA', 'calle correcta'),
	(2, 'MODIFICADO', 'Si ha sufrido algun tipo de modificacion'),
	(3, 'PE.ANALISIS', 'calles con datos no confirmados');
/*!40000 ALTER TABLE `tipo_estados_calles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
