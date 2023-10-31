-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: dbLukman
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.20.04.1

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
-- Table structure for table `Forum_user`
--

DROP TABLE IF EXISTS `Forum_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Forum_user` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(786) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Forum_user`
--

LOCK TABLES `Forum_user` WRITE;
/*!40000 ALTER TABLE `Forum_user` DISABLE KEYS */;
INSERT INTO `Forum_user` VALUES (4,'lukman.s@mail.biztechcs.com','$2y$10$.3mko4tzR6SC4z06r/Otou/wTNjtjfTqhaFRxOkgLD9tJ9gpLXho6','2023-10-26 16:45:03'),(5,'Dave@gmail.com','$2y$10$5cITgXWhw1tau9wGSA7XxedCkGhQRT4/siXLNDiqkHum/3vC/9IQu','2023-10-26 17:03:21'),(6,'lukman@gmail.com','$2y$10$AUJrJUwGv3YRXVlydxzJv.sXpaXEG6NXph7kaH.SugRBFb0FG3yze','2023-10-26 18:14:33'),(7,'Rahul.r@gmail.com','$2y$10$Y/cxj9QQxmPU/fiNpAZOuOa2oiFCHlffWzGqUcVyj5ia3imajQNXm','2023-10-27 18:46:41'),(8,'Lukman','$2y$10$8hr0jdJfKKkt/z7KsrUdPetYv9Tet8yZD8V9u2AeIaToHCSakY3De','2023-10-31 15:27:30'),(9,'Loki','$2y$10$U1hIt9gtjd/hNyMyfmFh8eS.kzhzXhkLbmZnWyOsldujqOloWL0qm','2023-10-31 15:33:37');
/*!40000 ALTER TABLE `Forum_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Treads`
--

DROP TABLE IF EXISTS `Treads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Treads` (
  `threads_id` int NOT NULL AUTO_INCREMENT,
  `threads_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `threads_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `threads_cat_id` int NOT NULL,
  `threads_user_id` int NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`threads_id`),
  FULLTEXT KEY `threads_title` (`threads_title`,`threads_desc`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Treads`
--

LOCK TABLES `Treads` WRITE;
/*!40000 ALTER TABLE `Treads` DISABLE KEYS */;
INSERT INTO `Treads` VALUES (1,'How can i purchase this case ?','This is some content from a media component. You can replace this with any content and adjust it as needed.\r\n...',1,7,'2023-10-25 13:26:13'),(2,'Can we have this in white color ?','I need this in white color is it possible to get ?',1,6,'2023-10-25 14:39:04'),(3,'loi','diohd',1,4,'2023-10-26 13:06:06'),(4,'loi','diohd',1,5,'2023-10-26 13:06:15'),(5,'demo','okay okay ',3,4,'2023-10-26 13:06:43'),(6,'I have To Give Order of 500 Calculator Bags ','I have To Give Order of 500 Calculator Bags please contact me in this no . 1234567890',1,4,'2023-10-31 15:16:36');
/*!40000 ALTER TABLE `Treads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Calculator Case','Test cases for calculator : In this article, we will discuss test cases for two types of calculator one of simple calculator and second scientific calculator. We include UI test cases, Functional test cases and Negative test cases for the calculators. We can apply functional test scenarios for calculator application.','2023-10-23 15:17:15'),(3,'Sadi Cover','Name : saree cover 12 flap saree bag dress bag closet wardrobe space saver underbed storage bag sadi cover\r\n\r\nSize : L\r\n\r\nNet Quantity (N) : 1\r\n\r\nProduct Length : 10 cm\r\n\r\nProduct Height : 10 cm\r\n\r\nProduct Breadth : 0.5 cm\r\n\r\n66 litre space saver storage underbed organiser\r\n\r\nCountry of Origin : India','2023-10-23 15:18:35'),(4,'Saree Covers','Stylish saree cover in Non Woven material with heavy plastic with capacity of 2 pieces each. This product is very helpful to keep all your heavy garments in gifting and regular use. Kuber Industries offers finest fashion accessories that incorporates contemporary designs and modern functions. Kuber Industries brings products for every woman who dreams of being unique and stylish.','2023-10-23 17:01:32'),(5,'Clothes Storage Bag','Clothes Storage Bag cover is a great organizing companion for your clothes in the wardrobe that keeps your clothes well maintained in one place. It also saves your efforts for finding right cloth at the right time. ','2023-10-23 17:04:15'),(6,'PLAIN BLOUSE COVER','4\" HEIGHT GEDGET WITH PVC BOX TRANSPERANT BLOUSE COVER, PROFESSIONAL USE AND BEST QUALITY COVER .','2023-10-23 17:04:15');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment_content` varchar(786) NOT NULL,
  `thread_id` int NOT NULL,
  `comment_by` int NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'This is a comment',1,4,'2023-10-26 13:39:01'),(2,'Yes please pick the call ',6,4,'2023-10-31 15:17:34');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactUs`
--

DROP TABLE IF EXISTS `contactUs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactUs` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactUs`
--

LOCK TABLES `contactUs` WRITE;
/*!40000 ALTER TABLE `contactUs` DISABLE KEYS */;
INSERT INTO `contactUs` VALUES (5,'Lukman','lukman@gmail.com','demo','2023-10-18 11:32:36'),(6,'Lukman','lukman@gmail.com','demo','2023-10-18 11:34:15'),(10,'Rahul','Rahul.r@gmail.com','Demo','2023-10-18 14:12:50'),(20,'Harsh','Dave@gmail.com','Oddo','2023-10-18 14:40:28'),(21,'Tony','Stark@gmail.com','Jarvis','2023-10-18 14:54:56'),(23,'Harsh','Dave@gmail.com','Oddo123','2023-10-18 15:07:12'),(24,'Hina','H@gmail.com','Math Teacher','2023-10-18 18:10:39'),(25,'Lukman','lukman.s@mail.biztechcs.com','edfsfsdf','2023-10-23 16:05:07');
/*!40000 ALTER TABLE `contactUs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (1,'Let s Do a Quick Meeting','Lukman , Need to Live CR O4 Today Only fsdfdf','2023-10-19 11:13:09'),(2,'Let s Do a Quick Meeting','Lukman Need to Live CR O4 Today Only','2023-10-19 11:13:09'),(8,'erfwaefwaef','sdfsfd','2023-10-19 11:38:04'),(9,'you have to eat','eatttt fdsfsdf','2023-10-19 11:41:58'),(10,'Nihil officia corporis ','Nihil officia corporis non eveniet optio velit voluptatem. Amet sed omnis illo eius. Est ullam modi iste sunt quod. Voluptatem autem aut possimus minima sapiente repudiandae est.','2023-10-19 11:45:52'),(11,'Autem architecto','Autem architecto ab voluptatum enim veniam. Sit sint dolorum magni et nesciunt et. Dolor vitae consequatur qui atque.\r\n','2023-10-19 11:45:58'),(12,'Saepe autem neque architecto ut','Saepe autem neque architecto ut. Rerum qui dolor quis repudiandae. Molestiae fugit facere unde quia et. Cupiditate ea et perferendis laudantium culpa nisi expedita. Quia eum et nihil deserunt autem.\r\n','2023-10-19 11:46:07'),(13,'Explicabo quos unde sed enim','Explicabo quos unde sed enim. Sed et ipsum doloribus occaecati quia quia praesentium eius. Dolorum harum omnis eos aut non laborum.\r\n','2023-10-19 11:46:15'),(15,'Eum officiis','Eum officiis distinctio in quibusdam. Eaque corporis laudantium deserunt saepe incidunt. Nihil qui assumenda placeat aut eligendi expedita.\r\n','2023-10-19 11:46:33'),(16,'Voluptatum quia dk','Voluptatum quia magnam esse. Corporis doloremque atque provident quaerat officiis. Sit nisi rerum enim sed aut.','2023-10-19 11:47:55');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phptrip`
--

DROP TABLE IF EXISTS `phptrip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phptrip` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dest` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phptrip`
--

LOCK TABLES `phptrip` WRITE;
/*!40000 ALTER TABLE `phptrip` DISABLE KEYS */;
INSERT INTO `phptrip` VALUES (1,'Lukman','Dharamshala'),(2,'Rahul','Vasna'),(3,'Om','Diu');
/*!40000 ALTER TABLE `phptrip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `username` varchar(26) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'admin','admin@123','2023-10-20 19:13:24'),(10,'loki','loki','2023-10-23 11:35:50'),(11,'Lukman','$2y$10$iaC.rEg/YNBFWvRfAoxF3OP0McbO8XScWLMYyVUu0XkoKXKF.LYPe','2023-10-23 12:57:00'),(12,'lol','$2y$10$mOKPFZ5gveijZkalhiYtOu0HGwYYh2Sz92JsgJHDADEsHrO.6m.M6','2023-10-23 13:06:49');
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

-- Dump completed on 2023-10-31 18:03:59
