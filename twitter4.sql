-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: twitter
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `useremail` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `useremail_UNIQUE` (`useremail`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `followers` (
  `fid` int NOT NULL AUTO_INCREMENT,
  `following` int NOT NULL,
  `follower` int NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `follower_idx` (`follower`,`following`),
  KEY `following_idx` (`following`),
  CONSTRAINT `follower` FOREIGN KEY (`follower`) REFERENCES `users` (`uid`),
  CONSTRAINT `following` FOREIGN KEY (`following`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` VALUES (6,7,6),(1,6,7),(2,8,7),(3,9,7),(4,10,7),(5,11,7),(7,7,8),(8,7,9),(9,7,10);
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tweets` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `content` varchar(45) NOT NULL,
  `likecnt` varchar(45) DEFAULT NULL,
  `retweetcnt` varchar(45) DEFAULT NULL,
  `uid` int NOT NULL,
  `timestamp` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `tid_UNIQUE` (`tid`),
  KEY `uid_idx` (`uid`),
  CONSTRAINT `uid` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweets`
--

LOCK TABLES `tweets` WRITE;
/*!40000 ALTER TABLE `tweets` DISABLE KEYS */;
INSERT INTO `tweets` VALUES (11,'second tweet from query','0','0',7,'1970-01-01 00:00:01'),(13,'second tweet from webpage with date','0','0',7,'2021-06-07 06:02:45pm'),(17,'new tweet test','0','0',7,'2021-06-07 06:22:37pm'),(19,'checking form resubmission issue','0','0',7,'2021-06-07 06:27:34pm'),(20,'tweet test\r\n','0','0',7,'2021-06-08 01:33:04pm'),(21,'first tweet from test1 ','0','0',9,'2021-06-08 01:47:32pm'),(22,'second tweet from test1','0','0',9,'2021-06-08 01:47:46pm'),(23,'first tweet from test2\r\n','0','0',10,'2021-06-08 01:48:15pm'),(24,'first tweet from test2','0','0',10,'2021-06-08 01:48:23pm'),(25,'first tweet from test3\r\n','0','0',11,'2021-06-08 01:48:49pm'),(26,'logout in home screen aint working\r\n','0','0',11,'2021-06-08 01:49:01pm'),(52,'delete this tweet\r\n','0','0',11,'2021-06-09 05:40:10pm'),(115,'3','0','0',7,'2021-06-09 09:22:05pm'),(116,'testests','0','0',11,'2021-06-09 10:31:41pm'),(117,'1','0','0',11,'2021-06-09 10:31:46pm'),(118,'2','0','0',11,'2021-06-09 10:31:51pm'),(121,'1','0','0',11,'2021-06-09 10:32:22pm'),(123,'3','0','0',11,'2021-06-09 10:32:27pm'),(142,'test','0','0',7,'2021-06-10 05:01:30pm'),(143,'test','0','0',7,'2021-06-10 05:03:45pm'),(144,'test','0','0',7,'2021-06-10 05:04:29pm'),(145,'test','0','0',7,'2021-06-10 05:05:29pm'),(146,'test','0','0',7,'2021-06-10 05:05:44pm'),(150,'test4','0','0',13,'2021-06-10 06:48:02pm');
/*!40000 ALTER TABLE `tweets` ENABLE KEYS */;
UNLOCK TABLES;



LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'user','user@mail.com','$2y$10$iyBSY5PmfqPkr4mFGag7CeccMIcC/87qh.phKp8OfhQFLkx3iPUKG','2021-06-10','user','user'),(7,'database','fail@database.com','$2y$10$IKmpyHDKcUOhOwF0wnykjeGZoc5tWYUFmjdoWadwxpKSu0ZWXGksu','2021-06-08','failed','database'),(8,'alerttest','alert@teset.com','$2y$10$4Qo0V.cRNcifA7sSF64CHO4vzaRXBffOvF/ym0kDKQmRU2qcbef66','2021-06-17','alert','test'),(9,'test1','test1@test.com','$2y$10$idYFCxFQ.8xDhQqgdZYfgOonlzeccUbt1ZbEjEnHguEJ3s/n7aIiO','2021-06-11','test','database'),(10,'test2','test2@test.com','$2y$10$Tw4Wx9T7hc0YPrfEIfAbQ.M1o0b9DNtSvAU9d5nwkm37x5.2klP..','2021-06-17','test','database'),(11,'test3','test3@test.com','$2y$10$Xb24D9meApajKoHb3rQCB.mbzL4YaNRdwNPh11zTolcYX0NSstALm','2021-06-12','test','database'),(12,'samir','idk@idk.com','$2y$10$EsFb/riOCAOrmpy0Y8gLfOsdy9OClTOHrSJgAOg6DnqWa60zJfD7S','2021-06-16','test4','samir'),(13,'test4','test4','$2y$10$3BNs0JVrAABdpuCjMReSC.B8whiryj.gBEcLv9apg/LMgkMNpkkiO','2021-06-18','test4','test4');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-11 11:55:01
