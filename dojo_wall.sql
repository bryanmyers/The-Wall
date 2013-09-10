CREATE DATABASE  IF NOT EXISTS `dojo_wall` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dojo_wall`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: dojo_wall
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_messages1_idx` (`message_id`),
  KEY `fk_comments_users1_idx` (`user_id`),
  CONSTRAINT `fk_comments_messages1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (5,9,1,'Hush now baby, baby, dont you cry.\r\nMother\'s gonna make all your nightmares come true.','2013-07-15 16:35:22',NULL),(6,8,1,'Mother\'s gonna put all her fears into you.\r\nMother\'s gonna keep you right here under her wing','2013-07-15 16:35:51',NULL),(7,6,1,'She wont let you fly, but she might let you sing.\r\nMama will keep baby cozy and warm.','2013-07-15 16:36:05',NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_messages_users_idx` (`user_id`),
  CONSTRAINT `fk_messages_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,'If you don\'t eat your meat, you can\'t have any pudding!  How can you have any pudding if you don\'t eat yer meat?','2013-07-15 13:05:55',NULL),(6,1,'Daddy\'s flown across the ocean\r\nLeaving just a memory\r\nSnapshot in the family album\r\nDaddy what else did you leave for me?\r\nDaddy, what\'d\'ja leave behind for me?!?\r\nAll in all it was just a brick in the wall.\r\nAll in all it was all just bricks in the wall.','2013-07-15 14:07:58',NULL),(8,1,'So ya\r\nThought ya\r\nMight like to go to the show.\r\nTo feel the warm thrill of confusion\r\nThat space cadet glow.\r\nTell me is something eluding you, sunshine?\r\nIs this not what you expected to see?\r\nIf you wanna find out what\'s behind these cold eyes\r\nYou\'ll just have to claw your way through this disguise.','2013-07-15 16:32:57',NULL),(9,1,'Momma loves her baby\r\nAnd daddy loves you too.\r\nAnd the sea may look warm to you babe\r\nAnd the sky may look blue\r\nBut ooooh Baby\r\nOoooh baby blue\r\nOooooh babe.\r\n\r\nIf you should go skating\r\nOn the thin ice of modern life\r\nDragging behind you the silent reproach\r\nOf a million tear-stained eyes\r\nDon\'t be surprised when a crack in the ice\r\nAppears under your feet.\r\nYou slip out of your depth and out of your mind\r\nWith your fear flowing out behind you\r\nAs you claw the thin ice.','2013-07-15 16:33:31',NULL),(10,1,'Mother do you think they\'ll drop the bomb? \r\nMother do you think they\'ll like this song? \r\nMother do you think they\'ll try to break my balls?\r\nMother should I build the wall?\r\nMother should I run for president?\r\nMother should I trust the government?\r\nMother will they put me in the firing line?\r\nMother am I really dying?','2013-07-15 16:34:55',NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Roger','Waters','something@somewhere.com','437b930db84b8079c2dd804a71936b5f','2013-07-15 12:59:26',NULL);
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

-- Dump completed on 2013-08-28 20:38:58
