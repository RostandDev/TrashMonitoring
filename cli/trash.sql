-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Trash
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `t_administrators`
--

DROP TABLE IF EXISTS `t_administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_administrators` (
  `_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `_uuid` varchar(40) NOT NULL,
  `_last_name` varchar(160) NOT NULL,
  `_first_name` varchar(160) NOT NULL,
  `_email` varchar(255) NOT NULL,
  `_identifier` varchar(32) NOT NULL,
  `_password` varchar(70) NOT NULL,
  `_access_level` enum('reader','editor') DEFAULT 'reader',
  `_inserted_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`_id`),
  UNIQUE KEY `u_administrators_uuid` (`_uuid`),
  UNIQUE KEY `u_administrators_email` (`_email`),
  UNIQUE KEY `u_administrators_identifier` (`_identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_administrators`
--

LOCK TABLES `t_administrators` WRITE;
/*!40000 ALTER TABLE `t_administrators` DISABLE KEYS */;
INSERT INTO `t_administrators` VALUES (2,'Admin','Admin','admin','admin@gmail.com','admin','$2y$12$eqIbtxxCkqsmpyF/tiIxle0J31d5oPOL9wdwpzFTmwY83YI5dTO5.','editor','2022-08-29 20:32:14'),(3,'User','user','user','user@gmail.com','user','$2y$12$QVrP0XX1rLMwkyHDr2U5PerJOUn/6V3OUTaxSMo7o7Yyq12ip8/YS','reader','2022-08-29 20:32:25'),(6,'e4154947-844f-427a-9cca-96169a512b99','k!dfkl','KDFLj','ekame-admin@gmail.com','ertyuiop','$2y$12$ECVO7XasgLm1JfN1E/2v.uyuwcSAqUfFMt.Yt9iPOad.uy4AZp8aW','editor','2022-08-29 20:37:50'),(7,'b63190b7-abd0-4c56-865f-a56da6aefd74','tyiu','arzr','ez@gmail.com','azeezz','$2y$12$L8c5ScgSGn2FsP4jUysU1OXMZRV717yVlp44bK53Sk8S6m7YZAomy','editor','2022-08-29 21:52:21');
/*!40000 ALTER TABLE `t_administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_trashStatus`
--

DROP TABLE IF EXISTS `t_trashStatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_trashStatus` (
  `_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `_full_level` int(3) NOT NULL,
  `_trash` bigint(20) NOT NULL,
  `_sent_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`_id`),
  KEY `fk_trashs` (`_trash`),
  CONSTRAINT `fk_trashs` FOREIGN KEY (`_trash`) REFERENCES `t_trashs` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_trashStatus`
--

LOCK TABLES `t_trashStatus` WRITE;
/*!40000 ALTER TABLE `t_trashStatus` DISABLE KEYS */;
INSERT INTO `t_trashStatus` VALUES (1,80,1,'2022-08-29 22:23:41'),(2,98,1,'2022-08-29 22:24:02'),(3,50,2,'2022-08-29 22:24:17');
/*!40000 ALTER TABLE `t_trashStatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_trashs`
--

DROP TABLE IF EXISTS `t_trashs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_trashs` (
  `_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `_uuid` varchar(40) NOT NULL,
  `_longitude` text NOT NULL,
  `_latitude` text NOT NULL,
  `_author` bigint(20) NOT NULL,
  `_address` varchar(160) NOT NULL,
  `_inserted_at` datetime DEFAULT current_timestamp(),
  `_updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`_id`),
  UNIQUE KEY `u_trashs_uuid` (`_uuid`),
  KEY `fk_trashs_administrators` (`_author`),
  CONSTRAINT `fk_trashs_administrators` FOREIGN KEY (`_author`) REFERENCES `t_administrators` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_trashs`
--

LOCK TABLES `t_trashs` WRITE;
/*!40000 ALTER TABLE `t_trashs` DISABLE KEYS */;
INSERT INTO `t_trashs` VALUES (1,'f82403d7-36e9-488b-befd-d22951d82201','  687555.885845 ','  4875.55855 ',2,'  Adomi ','2022-08-29 20:34:24','2022-08-29 20:34:24'),(2,'f70b2544-71ed-4198-aa2e-7497c32da9a2','687555.88','1.1817924',2,'  Lome2 ','2022-08-29 21:58:26','2022-08-29 21:58:26');
/*!40000 ALTER TABLE `t_trashs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-29 22:56:56
