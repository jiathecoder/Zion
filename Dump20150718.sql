CREATE DATABASE  IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `library`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: library
-- ------------------------------------------------------
-- Server version	5.5.41-log

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Jan','2015-07-11 18:05:44','2015-07-11 18:05:44'),(2,'Pam','2015-07-11 18:09:41','2015-07-11 18:09:41'),(3,'Sam','2015-07-11 18:12:24','2015-07-11 18:12:24'),(4,'Dan','2015-07-11 18:12:59','2015-07-11 18:12:59'),(5,'Tan','2015-07-13 10:35:41','2015-07-13 10:35:41'),(6,'sd','2015-07-17 14:56:42','2015-07-17 14:56:42'),(7,'sd','2015-07-17 15:28:34','2015-07-17 15:28:34'),(8,'sd','2015-07-17 15:30:22','2015-07-17 15:30:22'),(9,'sd','2015-07-17 15:31:19','2015-07-17 15:31:19'),(10,'sd','2015-07-17 15:31:45','2015-07-17 15:31:45'),(11,'sd','2015-07-17 15:32:10','2015-07-17 15:32:10'),(12,'sd','2015-07-17 15:50:43','2015-07-17 15:50:43'),(13,'sd','2015-07-17 15:51:14','2015-07-17 15:51:14'),(14,'sd','2015-07-17 15:51:27','2015-07-17 15:51:27'),(15,'sd','2015-07-17 15:51:38','2015-07-17 15:51:38'),(16,'sd','2015-07-17 15:52:18','2015-07-17 15:52:18'),(17,'sd','2015-07-17 15:52:53','2015-07-17 15:52:53');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `category_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_books_categories1_idx` (`category_Id`),
  CONSTRAINT `fk_books_categories1` FOREIGN KEY (`category_Id`) REFERENCES `categories` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (3,'JavaScript',3,'2015-07-11 18:12:59','2015-07-11 18:12:59',2),(4,'Cindrella',2,'2015-07-13 10:35:41','2015-07-13 10:35:41',1),(5,'',1,'2015-07-16 22:56:24','2015-07-16 22:56:24',1),(6,'',1,'2015-07-16 22:56:30','2015-07-16 22:56:30',1),(7,'fddssd',1,'2015-07-17 14:40:10','2015-07-17 14:40:10',1),(8,'',1,'2015-07-17 14:40:35','2015-07-17 14:40:35',1),(9,'dasd',1,'2015-07-17 14:56:42','2015-07-17 14:56:42',1),(10,'dasd',1,'2015-07-17 15:28:34','2015-07-17 15:28:34',1),(11,'dasd',1,'2015-07-17 15:30:22','2015-07-17 15:30:22',1),(12,'dasd',1,'2015-07-17 15:31:19','2015-07-17 15:31:19',1),(13,'dasd',1,'2015-07-17 15:31:45','2015-07-17 15:31:45',1),(14,'dasd',1,'2015-07-17 15:32:10','2015-07-17 15:32:10',1),(15,'dasd',1,'2015-07-17 15:50:43','2015-07-17 15:50:43',1),(16,'dasd',1,'2015-07-17 15:51:14','2015-07-17 15:51:14',1),(17,'dasd',1,'2015-07-17 15:51:27','2015-07-17 15:51:27',1),(18,'dasd',1,'2015-07-17 15:51:38','2015-07-17 15:51:38',1),(19,'dasd',1,'2015-07-17 15:52:18','2015-07-17 15:52:18',1),(20,'dasd',1,'2015-07-17 15:52:53','2015-07-17 15:52:53',1),(21,'C',3,'2015-07-17 18:39:41','2015-07-17 18:39:41',2);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_has_authors`
--

DROP TABLE IF EXISTS `books_has_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books_has_authors` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `book_Id` int(11) NOT NULL,
  `author_Id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_books_has_authors_authors1_idx` (`author_Id`),
  KEY `fk_books_has_authors_books1_idx` (`book_Id`),
  CONSTRAINT `fk_books_has_authors_authors1` FOREIGN KEY (`author_Id`) REFERENCES `authors` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_books_has_authors_books1` FOREIGN KEY (`book_Id`) REFERENCES `books` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_has_authors`
--

LOCK TABLES `books_has_authors` WRITE;
/*!40000 ALTER TABLE `books_has_authors` DISABLE KEYS */;
INSERT INTO `books_has_authors` VALUES (1,3,1,NULL,NULL),(2,4,2,NULL,NULL),(3,5,1,NULL,NULL),(4,6,1,NULL,NULL),(5,7,1,NULL,NULL),(6,8,1,NULL,NULL),(7,9,5,NULL,NULL),(8,10,5,NULL,NULL),(9,11,5,NULL,NULL),(10,12,5,NULL,NULL),(11,13,5,NULL,NULL),(12,14,5,NULL,NULL),(13,15,5,NULL,NULL),(14,16,5,NULL,NULL),(15,17,5,NULL,NULL),(16,18,5,NULL,NULL),(17,19,5,NULL,NULL),(18,20,5,NULL,NULL),(19,21,6,NULL,NULL);
/*!40000 ALTER TABLE `books_has_authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Fiction',NULL,NULL),(2,'Computers',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `review` text,
  `book_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_reviews_books1_idx` (`book_Id`),
  KEY `fk_reviews_users1_idx` (`user_Id`),
  CONSTRAINT `fk_reviews_books1` FOREIGN KEY (`book_Id`) REFERENCES `books` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`user_Id`) REFERENCES `users` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,'Good',3,2,'2015-07-11 18:12:59','2015-07-11 18:12:59'),(2,'okay',4,1,'2015-07-13 10:35:41','2015-07-13 10:35:41'),(3,'Hello',4,1,'2015-07-15 19:13:01','2015-07-15 19:13:01'),(4,'',5,1,'2015-07-16 22:56:24','2015-07-16 22:56:24'),(5,'',6,1,'2015-07-16 22:56:30','2015-07-16 22:56:30'),(6,'dfddf',7,1,'2015-07-17 14:40:10','2015-07-17 14:40:10'),(7,'',8,1,'2015-07-17 14:40:35','2015-07-17 14:40:35'),(8,'ds',9,1,'2015-07-17 14:56:42','2015-07-17 14:56:42'),(9,'ds',10,1,'2015-07-17 15:28:34','2015-07-17 15:28:34'),(10,'ds',11,1,'2015-07-17 15:30:22','2015-07-17 15:30:22'),(11,'ds',12,1,'2015-07-17 15:31:19','2015-07-17 15:31:19'),(12,'ds',13,1,'2015-07-17 15:31:45','2015-07-17 15:31:45'),(13,'ds',14,1,'2015-07-17 15:32:10','2015-07-17 15:32:10'),(14,'ds',15,1,'2015-07-17 15:50:43','2015-07-17 15:50:43'),(15,'ds',16,1,'2015-07-17 15:51:14','2015-07-17 15:51:14'),(16,'ds',17,1,'2015-07-17 15:51:27','2015-07-17 15:51:27'),(17,'ds',18,1,'2015-07-17 15:51:38','2015-07-17 15:51:38'),(18,'ds',19,1,'2015-07-17 15:52:18','2015-07-17 15:52:18'),(19,'ds',20,1,'2015-07-17 15:52:53','2015-07-17 15:52:53'),(20,'sssssss',4,1,'2015-07-17 18:17:33','2015-07-17 18:17:33'),(21,'DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD',21,1,'2015-07-17 18:39:41','2015-07-17 18:39:41');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Poornima','Poornima','poornimavinay14@gmail.com','aaaaaaaa','2015-07-11 15:22:23','2015-07-11 15:22:23'),(2,'David','D','david@david.com','aaaaaaaa','2015-07-11 17:55:42','2015-07-11 17:55:42');
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

-- Dump completed on 2015-07-18 13:46:35
