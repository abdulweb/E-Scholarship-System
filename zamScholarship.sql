-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: zamScholarship
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `application_document`
--

DROP TABLE IF EXISTS `application_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_document` (
  `document_id` int(10) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) DEFAULT NULL,
  `indigne_letter` varchar(255) DEFAULT NULL,
  `confirmation_letter` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_document`
--

LOCK TABLES `application_document` WRITE;
/*!40000 ALTER TABLE `application_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_tb`
--

DROP TABLE IF EXISTS `application_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_tb` (
  `user_id` int(2) DEFAULT NULL,
  `firstname` varchar(120) DEFAULT NULL,
  `lastname` varchar(120) DEFAULT NULL,
  `middlename` varchar(120) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `institute` varchar(120) DEFAULT NULL,
  `lga_id` int(2) DEFAULT NULL,
  `phoneNo` varchar(13) DEFAULT NULL,
  `admissionNo` varchar(13) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `religion` varchar(30) DEFAULT NULL,
  `maritalStatus` varchar(30) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`application_id`),
  KEY `document_id` (`document_id`),
  KEY `lga_id` (`lga_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `application_tb_ibfk_1` FOREIGN KEY (`lga_id`) REFERENCES `lga` (`lga_id`),
  CONSTRAINT `application_tb_ibfk_2` FOREIGN KEY (`document_id`) REFERENCES `application_document` (`document_id`),
  CONSTRAINT `application_tb_ibfk_3` FOREIGN KEY (`lga_id`) REFERENCES `lga` (`lga_id`),
  CONSTRAINT `application_tb_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user_tb` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_tb`
--

LOCK TABLES `application_tb` WRITE;
/*!40000 ALTER TABLE `application_tb` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banks` (
  `bank_id` int(10) NOT NULL AUTO_INCREMENT,
  `bankName` varchar(255) DEFAULT NULL,
  `accountName` varchar(255) DEFAULT NULL,
  `accountType` varchar(255) DEFAULT NULL,
  `accountNumber` varchar(100) DEFAULT NULL,
  `application_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`bank_id`),
  KEY `application_id` (`application_id`),
  CONSTRAINT `banks_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application_tb` (`application_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banks`
--

LOCK TABLES `banks` WRITE;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lga`
--

DROP TABLE IF EXISTS `lga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lga` (
  `name` varchar(255) DEFAULT NULL,
  `date_create` varchar(255) NOT NULL,
  `lga_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`lga_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lga`
--

LOCK TABLES `lga` WRITE;
/*!40000 ALTER TABLE `lga` DISABLE KEYS */;
INSERT INTO `lga` VALUES ('ANKA','2019-05-11',1),('BAKURA','2019-05-11',2),('TSAFE','2019-05-12',3),('TALATA MAFARA','2019-05-12',4),('SHINKAFI','2019-05-12',5),('MARU','2019-05-12',6),('MARADUN','2019-05-12',7),('KAURA NAMODA','2019-05-12',8);
/*!40000 ALTER TABLE `lga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_tb`
--

DROP TABLE IF EXISTS `question_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_tb` (
  `question` varchar(225) NOT NULL,
  `option1` varchar(225) NOT NULL,
  `option2` varchar(225) NOT NULL,
  `option3` varchar(225) NOT NULL,
  `option4` varchar(225) NOT NULL,
  `correctAnswer` varchar(225) NOT NULL,
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `lga_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`question_id`),
  KEY `lga_id` (`lga_id`),
  CONSTRAINT `question_tb_ibfk_1` FOREIGN KEY (`lga_id`) REFERENCES `lga` (`lga_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_tb`
--

LOCK TABLES `question_tb` WRITE;
/*!40000 ALTER TABLE `question_tb` DISABLE KEYS */;
INSERT INTO `question_tb` VALUES ('What is the Name of th mai angwa of your area','Abba','Abbass','Abdul','Abukaar','Abdul',1,NULL),('What is the name of Emir of Zamfara State','Ganduje','Lamido','Ladan','Muhammed','Muhammed',2,NULL),('What is the name of your district Head ','Aliyu','Abba','Adamu','Haruna','Adamu',3,NULL),('what is the name of your sec gen','isah','muhammed','Anas','Habiba','muhammed',4,NULL),('FGVDJBVGH','HH','HHH','HHHH','H','H',5,NULL),('aaaa','a','aa','aaa','aaaa','a',6,NULL);
/*!40000 ALTER TABLE `question_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_tb`
--

DROP TABLE IF EXISTS `test_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `testName` varchar(100) NOT NULL,
  `startDate` varchar(120) NOT NULL,
  `endDate` varchar(120) NOT NULL,
  `mark` int(10) NOT NULL,
  `releaseResult` int(1) NOT NULL,
  `year` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_tb`
--

LOCK TABLES `test_tb` WRITE;
/*!40000 ALTER TABLE `test_tb` DISABLE KEYS */;
INSERT INTO `test_tb` VALUES (1,'2018 Screening Test','11/11/2011 11:11:00','11/11/2011 11:11:00',10,1,'2017'),(2,'2017 SCREENING TEST','11/11/2011 11:11:00','11/11/2011 11:11:00',6,1,'2019');
/*!40000 ALTER TABLE `test_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tb`
--

DROP TABLE IF EXISTS `user_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_tb` (
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `date_create` varchar(100) NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tb`
--

LOCK TABLES `user_tb` WRITE;
/*!40000 ALTER TABLE `user_tb` DISABLE KEYS */;
INSERT INTO `user_tb` VALUES ('binraheem01@gmail.com',NULL,'08060415146','staff','2019-05-09','',1),('muhammadyahaya357@gmail.com',NULL,'30eda48a','staff','2019-05-11','08036423604',2),('olamide@gmail.com',NULL,'d3830a83f89191c09ffa44285ea8612b','student','2019-05-23',NULL,3),('student@udusok.edu.ng',NULL,'5f4dcc3b5aa765d61d8327deb882cf99','student','2019-05-23',NULL,4),('abdulrasheeda9@gmail.com',NULL,'d3830a83f89191c09ffa44285ea8612b','student','2019-05-23',NULL,5);
/*!40000 ALTER TABLE `user_tb` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-24 13:06:12
