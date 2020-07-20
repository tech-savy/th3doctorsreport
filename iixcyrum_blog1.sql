-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: iixcyrum_blog1
-- ------------------------------------------------------
-- Server version	5.7.30-cll-lve

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `post_id` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `post_id`, `comment`, `username`) VALUES (1,1,'',''),(2,1,'',''),(3,1,'',''),(4,2,'',''),(5,2,'',''),(6,2,'',''),(7,2,'',''),(8,2,'',''),(9,2,'',''),(10,2,'',''),(11,2,'',''),(12,2,'',''),(13,2,'',''),(14,2,'',''),(15,2,'',''),(16,2,'',''),(17,2,'',''),(18,2,'',''),(19,2,'',''),(20,2,'',''),(21,2,'This is nice!','Sue Ndichu');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `body` text,
  `published` int(4) DEFAULT '1',
  `created_at` varchar(255) DEFAULT NULL,
  `likes` int(255) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `image1`, `image2`, `image3`, `body`, `published`, `created_at`, `likes`, `views`, `username`) VALUES (2,NULL,2,'TH3DOCTORâ€™S REPORT ','1594973003_524490A2-62CB-4742-9823-5564D5A6360E.jpeg','1594973003_','1594973003_','1594973003_','<p><br>Welcome to the Doctorâ€™s Report where we share basketball activities around East Africa. Our focus here is taking sports writing to the next level. For years, East African basketball has not received the great coverage it deserves from various media platforms and The Doctorâ€™s Report is here to change that. Our players now have a site where they can share their stories on all matters basketball. East Africa has talent and its our duty to share those gifts with the world. Th3doctorâ€™s report, your go to source. Grow with us.</p>',1,'2020-07-17 11:03:23',2,269,'Ariel Okall ');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`id`, `name`, `description`) VALUES (2,'News','<p>all basketball news are found here.&nbsp;</p>'),(3,'One on one','<p>one on one interviews with athletes&nbsp;</p>'),(4,'Scoreboard ','<p>Game reports, schedule,stats and results&nbsp;</p>'),(5,'Hardwood ','<p>house of highlights. Dunks, crossover, blocks etc</p>'),(8,'Tournaments','<p>Competitons</p>'),(9,'Fan zone','<p>For the fans&nbsp;</p>'),(10,'Guests','<p>content from guests&nbsp;</p>'),(11,'Archives ','<p>Photos and videos&nbsp;</p>'),(12,'Doctorâ€™s office ','<p>More than an athlete. All philanthropic activities in the community&nbsp;</p>');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES (26,1,'Ariel Okall ','arielokall@gmail.com','$2y$10$ljIG.1ZgBE0NmeyF2n1XxeZ4vlUDGywC57x3gIVXpVTyqOjOpxxym','2020-07-15 20:38:38'),(32,0,'Ndellah_fitness','Ndellahdj@gmail.com','$2y$10$vBed3LNZ.c4bLM5SksfB6.9/5uCNuIdDFwyzTFnBP6i93LzhmWrhW','2020-07-18 07:50:55'),(33,1,'Sue Ndichu','suendicu@gmail.com','$2y$10$.9I23DCkzX7eYLYxi4dc4u9tNr27Hw/Apc/3qNJQBDOQhGE9q8qcW','2020-07-18 09:00:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'iixcyrum_blog1'
--

--
-- Dumping routines for database 'iixcyrum_blog1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-20 15:34:29
