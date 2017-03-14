-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: IT635Project
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `client_profile`
--

DROP TABLE IF EXISTS `client_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_profile` (
  `id` int(15) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` text NOT NULL,
  `state` text NOT NULL,
  `zip` int(20) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_profile`
--

LOCK TABLES `client_profile` WRITE;
/*!40000 ALTER TABLE `client_profile` DISABLE KEYS */;
INSERT INTO `client_profile` VALUES (1234,'John','Constantine','888 magician roan','New York',10001,'jconstantine@email.com'),(4444,'Lucas','Hood','address','Pennsylvania',4044,'email'),(6789,'Steven','Strange','address','Florida',500006,'email');
/*!40000 ALTER TABLE `client_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurableevent`
--

DROP TABLE IF EXISTS `insurableevent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurableevent` (
  `incident_id` int(10) NOT NULL,
  `client_id` int(15) NOT NULL,
  `incident_type` text NOT NULL,
  `description` text NOT NULL,
  `outcome` text NOT NULL,
  `owner_fault` int(5) NOT NULL,
  `other_fault` int(5) NOT NULL,
  `cost` int(15) NOT NULL,
  `resolved` int(3) NOT NULL,
  PRIMARY KEY (`incident_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurableevent`
--

LOCK TABLES `insurableevent` WRITE;
/*!40000 ALTER TABLE `insurableevent` DISABLE KEYS */;
INSERT INTO `insurableevent` VALUES (33,1234,'Broken Doorlock','I broke my door lock','Cannot lock the door',1,0,300,1),(55,6789,'Stolen','My car was stolen last night','stolen car',0,1,15000,0),(66,1234,'Accident','Car crash yesterday at 2.30pm','broken window',0,1,10000,0),(100,6789,'Accident','Car crash yesterday at 2.30pm','broken window',1,0,15000,0),(4000,4444,'Tire puncture','My car tire was punctured yesterday','Someone else did it',0,1,250,1);
/*!40000 ALTER TABLE `insurableevent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurancecost`
--

DROP TABLE IF EXISTS `insurancecost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurancecost` (
  `client_id` int(15) NOT NULL,
  `total_incident` int(15) NOT NULL,
  `total_ownfault` int(15) NOT NULL,
  `total_otherfault` int(15) NOT NULL,
  `total_cost` int(15) NOT NULL,
  `total_resolved` int(15) NOT NULL,
  `insurance_cost` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurancecost`
--

LOCK TABLES `insurancecost` WRITE;
/*!40000 ALTER TABLE `insurancecost` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurancecost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle` (
  `vehicle_id` int(10) NOT NULL,
  `client_id` int(15) NOT NULL,
  `vehicle_name` text NOT NULL,
  `vehicle_number` text NOT NULL,
  `state` text NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (888,1234,'Ford','5555','Florida'),(4490,4444,'Mustang','0040','Texas'),(9999,6789,'Tesla','0000','new york');
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-14 14:23:29
