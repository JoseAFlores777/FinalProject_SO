-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: SO1
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Vehiculo`
--

DROP TABLE IF EXISTS `Vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Vehiculo` (
  `codigo` varchar(7) DEFAULT NULL,
  `Marca` varchar(15) DEFAULT NULL,
  `Modelo` varchar(25) DEFAULT NULL,
  `Color` varchar(15) DEFAULT NULL,
  `Anio` int DEFAULT NULL,
  `Recorrido` float DEFAULT NULL,
  `Motor` varchar(15) DEFAULT NULL,
  `Traccion` varchar(15) DEFAULT NULL,
  `Precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vehiculo`
--

LOCK TABLES `Vehiculo` WRITE;
/*!40000 ALTER TABLE `Vehiculo` DISABLE KEYS */;
INSERT INTO `Vehiculo` VALUES ('Veh-001','Toyota','Hilux','Rojo Metalico',2001,255000,'2.8 Diesel','4x4 Trasera',400000),('Veh-002','Mazda','BT50','Verde Metalico',2015,50000,'2.5 Diesel','4x4 Trasera',350000),('Veh-003','Toyota','22R','Gris Metalico',1986,450000,'V4 Gasolina','4x4 Trasera',250000),('Veh-004','Jeep','Cherokee','Gris',2008,125000,'2.8 Diesel','4x4 Trasera',300000),('Veh-005','Suzuki','Jimny','Verde 2 Tonos',2019,50000,'1.5 Gasolina','4x4 Trasera',360000),('veh-110','Toyota','Hilux','gris',2014,25000,'diesel','4x4',300000),('veh-006','Toyota','Celica','Rojo',2000,25000,'gasolina','4x4',300000),('Veh-007','Toyota','C-HR','Blanco',2017,28903,'Gasolina','delantera',200000),('Veh-008','Toyota','AURIS','Azul',2012,30200,'Gasolina','delantera',300000),('Veh-009','Toyota','Aygo','Rojo Metalico',2020,2000,'Gasolina','trasera',400000),('Veh-011','FIAT','Tipo','Rojo',2019,30000,'Gasolina','Trasera',600000),('Veh-012','FIAT','500X','Azul',2001,40000,'gasolina','Trasera',403000),('Veh-013','FIAT','500L','Negro',2018,26000,'2.8 Diesel','Trasera',700000),('Veh-014','Renault','Clio','Blanco',2001,300000,'gasolina','Trasera',80000),('Veh-015','Renault','Megane','Rojo',2018,300000,'2.8 Diesel','4x4 Trasera',300000);
/*!40000 ALTER TABLE `Vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-22  5:39:35
