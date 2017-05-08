-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
INSERT INTO `client_profile` VALUES (1,'Keyser','Soze','Newark','AZ',56541,'usual@suspects.com'),(12,'Super','Man','Krptonite','NY',231,'superman@kryp.com'),(55,'das','fas','sad','fds',123,'sad@asd.com'),(365,'qwerty','zxcvb','asdfg','poiuy',789454,'lkjh'),(555,'af','shdf','sdfdsv','sfgdfv',354564,'sfgdfg'),(589,'Frist','LAst Name','Somewhere','state',9874,'asdasd'),(999,'A','B','Add','Sta',231,'asd@asd.com'),(1234,'John','Constantine','888 magician roan','New York',10001,'jconstantine@email.com'),(2001,'First1','Last1','Something','SomeState',5006,'asd@asd.com'),(2222,'Last','OFUS','asdf','fdsa',878945,'asfdsaf'),(2356,'poi','lkj','mnb','qwe',789,'123'),(4444,'Lucas','Hood','address','Pennsylvania',4044,'email'),(6549,'aff','Sher','Harrison','NJ',321,'aff@aff.com'),(6789,'Steven','Strange','address','Florida',500006,'email'),(112233,'First','Last','Here','This',0,'em@il.com');
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
INSERT INTO `insurableevent` VALUES (33,1234,'Broken Doorlock','I broke my door lock','Cannot lock the door',1,0,300,0),(40,1,'Hit and Run','Drunk driving','Headlights',1,1,2000,0),(41,1,'Hit and Run','Drunk driving','Headlights',0,1,2010,1),(54,1,'Accident','Break Failure','Front Bumper Broke',1,0,3000,0),(55,6789,'Stolen','My car was stolen last night','stolen car',0,1,15000,0),(56,12,'Wheel Alignment','Rear Wheel Alignment','No damage',0,1,500,0),(57,4444,'Tire Burst','My car tire punctured','Not My Fault',0,1,2500,1),(58,4444,'Gear Failure','Gear Failure','Car Crashed',0,1,5000,0),(66,1234,'Accident','Car crash yesterday at 2.30pm','broken window',0,1,10000,0),(100,6789,'Accident','Car crash yesterday at 2.30pm','broken window',1,0,15000,0),(4000,4444,'Tire puncture','My car tire was punctured yesterday','Someone else did it',0,1,250,0);
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
  `passcode` char(32) DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (8,897,'Corvette','LKU','TX','7ac87e42d0e28da672b0ad402cfa3934'),(66,897,'ford','Hexa13','OH','68e109f0f40ca72a15e05cc22786f8e6'),(321,1234,'Nissan','H3xA','IL','68e109f0f40ca72a15e05cc22786f8e6'),(635,12,'Ferrari','546','TX','68e109f0f40ca72a15e05cc22786f8e6'),(656,1,'Toyota','AlphaQ','NY','68e109f0f40ca72a15e05cc22786f8e6'),(661,8971,'ford','Hexa12','TX','68e109f0f40ca72a15e05cc22786f8e6'),(662,8972,'Hyundai','Hex12','TY','68e109f0f40ca72a15e05cc22786f8e6'),(663,8973,'Hyundai','Hex2','NJ','68e109f0f40ca72a15e05cc22786f8e6'),(664,8974,'Hyundai','Hex5','NY','68e109f0f40ca72a15e05cc22786f8e6'),(888,1234,'Ford','5555','Florida','68e109f0f40ca72a15e05cc22786f8e6'),(1003,1002,'Toyota','AlphaQ3','WA','68e109f0f40ca72a15e05cc22786f8e6'),(1004,1002,'Hyundai','ABCD','CA','68e109f0f40ca72a15e05cc22786f8e6'),(1005,1002,'Ford','H3xABC','NY','68e109f0f40ca72a15e05cc22786f8e6'),(1006,1002,'Honda','LOPQWE','Ar','68e109f0f40ca72a15e05cc22786f8e6'),(2001,2001,'Nissan','ABCD2','NY','e9ed1c3b34b6cc55f21ecc8d50556817'),(4490,4444,'Mustang','0040','Texas','68e109f0f40ca72a15e05cc22786f8e6'),(9999,6789,'Tesla','0000','new york','68e109f0f40ca72a15e05cc22786f8e6'),(96321,4444,'Lancer','789456','UT','68e109f0f40ca72a15e05cc22786f8e6'),(98765,12,'Nissan','654Hex','CA','68e109f0f40ca72a15e05cc22786f8e6'),(98789,555,'kdjfhgdfkj','jnkjh','jhkjbh','68e109f0f40ca72a15e05cc22786f8e6');
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

-- Dump completed on 2017-05-07 23:27:23
