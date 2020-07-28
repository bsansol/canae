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

-- Volcando datos para la tabla callejero_nae.usuarios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `usuario`, `password`, `id_tipo`, `Nombre`, `Apellidos`, `Email`, `telefono`, `Codigo_proyecto_Nae`, `Nombre_proyecto_Nae`, `BAJA`) VALUES
	(1, 'admin', 'admin', 1, 'admnistradormm', 'webmasternn', 'sdsdsd', '232323', '11111', 'callejero nae', 0),
	(2, 'Consulta', 'consulta', 2, '43', '434', '434', '434', '434', '34', 0),
	(3, 'webmaster', 'webmaster', 3, 'webmaster', 'webmaster', '0', '0', '0', '0', 0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
