-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: exoticars
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catalogo_carros`
--

DROP TABLE IF EXISTS `catalogo_carros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_carros` (
  `IDCarro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Imagen` varchar(256) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `Anio` smallint(5) unsigned NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `Precio` mediumint(8) unsigned NOT NULL,
  `NumPuertas` tinyint(3) unsigned NOT NULL,
  `TipoCombustible` varchar(20) NOT NULL,
  `TipoCarro` varchar(20) NOT NULL,
  `Usuario_ID` int(11) NOT NULL,
  PRIMARY KEY (`IDCarro`),
  KEY `ID_Usuario` (`Usuario_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_carros`
--

LOCK TABLES `catalogo_carros` WRITE;
/*!40000 ALTER TABLE `catalogo_carros` DISABLE KEYS */;
INSERT INTO `catalogo_carros` VALUES (2,'sedan-chevrolet-aveo.jpeg','Chevrolet','Aveo',2022,'Nuevo',242900,4,'Gasolina','Sedan',0),(3,'camioneta-ford-lobo.jpeg','Ford','Lobo',2022,'Nuevo',1083000,5,'Gasolina','Camioneta',0),(5,'coupe-audi-rs5.png','Audi','RS-5',2022,'Nuevo',3074900,2,'Gasolina','Coupe',0),(6,'camioneta-nissan-np300.png','Nissan','NP-300',2021,'Seminuevo',310000,3,'Gasolina','Camioneta',0),(7,'exotico-lamborghini-gallardo.jpg','Lamborghini','Gallardo',2020,'Nuevo',2290000,2,'Gasolina','Exotico',0);
/*!40000 ALTER TABLE `catalogo_carros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `IDUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(50) NOT NULL,
  `CtaUsuario` varchar(20) NOT NULL,
  `PassUsuario` varchar(18) NOT NULL,
  `IDCarro` int(10) unsigned NOT NULL,
  PRIMARY KEY (`IDUsuario`),
  KEY `IDCarro` (`IDCarro`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IDCarro`) REFERENCES `catalogo_carros` (`IDCarro`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Nicolas Dominguez','ndu0809','0809',2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-29 19:43:36
