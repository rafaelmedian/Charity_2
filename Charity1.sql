CREATE DATABASE  IF NOT EXISTS `charity` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `charity`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: charity
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `event_id` varchar(45) NOT NULL,
  `event_type_code` varchar(45) DEFAULT NULL,
  `event_name` varchar(45) DEFAULT NULL,
  `event_place` varchar(45) DEFAULT NULL,
  `event_date` varchar(45) DEFAULT NULL,
  `event_entrance_fee` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES ('1','Africa','Presidente Al Poder','aSD','301','5000'),('23','123','123','123','123','213'),('3','2','3','4','5','6'),('4','546','654','654','54','564'),('564767','asd','asd','asd','asd','45');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `participant_id` varchar(45) NOT NULL,
  `participant_type_code` varchar(45) DEFAULT NULL,
  `participant_name` varchar(45) DEFAULT NULL,
  `participant_lastname` varchar(45) DEFAULT NULL,
  `participant_email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`participant_id`),
  KEY `participant_type_code_idx` (`participant_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES ('32','Gerente de tu vida','Francisco Alberto','del Rosario Sanchez','asdajsdhjas@gas.com'),('53','Vende Empanadas','Francis','De Oleo','asdajsdhjas@gas.com'),('546555555555555555','56454','56654','645','654@adsasd.com');
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants_in_events`
--

DROP TABLE IF EXISTS `participants_in_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants_in_events` (
  `participant_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `role_code` int(11) NOT NULL,
  PRIMARY KEY (`participant_id`,`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants_in_events`
--

LOCK TABLES `participants_in_events` WRITE;
/*!40000 ALTER TABLE `participants_in_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `participants_in_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_event_types`
--

DROP TABLE IF EXISTS `ref_event_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_event_types` (
  `event_type_code` varchar(45) NOT NULL,
  `event_description` varchar(45) NOT NULL,
  PRIMARY KEY (`event_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_event_types`
--

LOCK TABLES `ref_event_types` WRITE;
/*!40000 ALTER TABLE `ref_event_types` DISABLE KEYS */;
INSERT INTO `ref_event_types` VALUES ('455','Hola'),('545455','87'),('sad','5476asd');
/*!40000 ALTER TABLE `ref_event_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_transaction_types`
--

DROP TABLE IF EXISTS `ref_transaction_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_transaction_types` (
  `transaction_type_code` int(11) NOT NULL,
  `transaction_type_description` varchar(50) DEFAULT NULL,
  `P_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaction_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_transaction_types`
--

LOCK TABLES `ref_transaction_types` WRITE;
/*!40000 ALTER TABLE `ref_transaction_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_transaction_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `transactions_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `participant_id_1` int(11) DEFAULT NULL,
  `participant_id_2` int(11) DEFAULT NULL,
  `role_code_id_1` int(11) DEFAULT NULL,
  `role_code_id_2` int(11) DEFAULT NULL,
  `transaction_type_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`transactions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-20 16:00:46
