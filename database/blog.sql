-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for osx10.14 (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

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
-- Table structure for table `entries`
--

DROP TABLE IF EXISTS `entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entries_id_unique` (`id`),
  KEY `entries_user_id_index` (`user_id`),
  KEY `entries_created_at_index` (`created_at`),
  CONSTRAINT `entries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entries`
--

LOCK TABLES `entries` WRITE;
/*!40000 ALTER TABLE `entries` DISABLE KEYS */;
INSERT INTO `entries` VALUES (1,1,'Test 1','<script>alert(\'hola\')</script>sada','2019-11-04 23:30:49','2019-11-05 00:15:43'),(2,1,'Test 2','Test 2','2019-11-04 23:30:54','2019-11-04 23:30:54'),(3,1,'Test 3','Test 3','2019-11-04 23:31:01','2019-11-04 23:31:01'),(4,1,'Test 4','Test 4','2019-11-04 23:31:07','2019-11-04 23:31:07'),(5,2,'qaniel2 test 1','qaniel2 test 1','2019-11-04 23:31:56','2019-11-04 23:31:56'),(6,2,'qaniel2 test 2','qaniel2 test 2','2019-11-04 23:32:01','2019-11-04 23:32:01'),(7,2,'qaniel2 test 3','qaniel2 test 3','2019-11-04 23:32:05','2019-11-04 23:32:05'),(8,2,'qaniel2 test 4','qaniel2 test 4','2019-11-04 23:32:11','2019-11-04 23:32:11'),(9,1,'test','Test this is a test\r\n\r\nWhit at least more lines wish me luck!','2019-11-05 00:00:17','2019-11-05 00:11:00'),(10,3,'Entry!','Wiju entri!','2019-11-07 21:18:27','2019-11-07 21:18:27'),(11,6,'asdads','asdadasdads','2019-11-08 01:54:53','2019-11-08 01:54:53'),(12,6,'asdasd','asdadas','2019-11-08 01:54:55','2019-11-08 01:54:55'),(13,6,'ttgg','1gqegegq','2019-11-08 01:54:58','2019-11-08 01:54:58'),(14,7,'dgfbnf','sfgbfds','2019-11-08 01:56:19','2019-11-08 01:56:19'),(15,7,'hnm jh','grhtn','2019-11-08 01:56:22','2019-11-08 01:56:22'),(16,8,'grebrgf3qewr','sfbasfdv','2019-11-08 02:00:56','2019-11-08 02:00:56'),(17,8,'2r31f','asdasda','2019-11-08 02:00:59','2019-11-08 02:00:59'),(18,8,'1r11','afaf','2019-11-08 02:01:02','2019-11-08 02:01:02');
/*!40000 ALTER TABLE `entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hidden_tweets`
--

DROP TABLE IF EXISTS `hidden_tweets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hidden_tweets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `tweet_id` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hidden_tweets_id_unique` (`id`),
  KEY `hidden_tweets_user_id_index` (`user_id`),
  KEY `hidden_tweets_tweet_id_index` (`tweet_id`),
  CONSTRAINT `hidden_tweets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hidden_tweets`
--

LOCK TABLES `hidden_tweets` WRITE;
/*!40000 ALTER TABLE `hidden_tweets` DISABLE KEYS */;
INSERT INTO `hidden_tweets` VALUES (9,1,'adasfqawfqagfaqgwq',NULL,NULL),(35,8,'1192577972319870976','2019-11-08 09:50:52','2019-11-08 09:50:52'),(39,8,'1192608171296264194','2019-11-08 09:52:04','2019-11-08 09:52:04'),(41,8,'1192517322738720769','2019-11-08 09:52:08','2019-11-08 09:52:08'),(42,8,'1192548545150234624','2019-11-08 09:52:11','2019-11-08 09:52:11');
/*!40000 ALTER TABLE `hidden_tweets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `last_three_entries_per_users`
--

DROP TABLE IF EXISTS `last_three_entries_per_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `last_three_entries_per_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `entry_id` bigint(20) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `last_three_entries_per_users_id_unique` (`id`),
  KEY `last_three_entries_per_users_entry_id_foreign` (`entry_id`),
  KEY `last_three_entries_per_users_user_id_entry_id_index` (`user_id`,`entry_id`),
  KEY `last_three_entries_per_users_user_id_index` (`user_id`),
  KEY `last_three_entries_per_users_created_at_index` (`created_at`),
  CONSTRAINT `last_three_entries_per_users_entry_id_foreign` FOREIGN KEY (`entry_id`) REFERENCES `entries` (`id`),
  CONSTRAINT `last_three_entries_per_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `last_three_entries_per_users`
--

LOCK TABLES `last_three_entries_per_users` WRITE;
/*!40000 ALTER TABLE `last_three_entries_per_users` DISABLE KEYS */;
INSERT INTO `last_three_entries_per_users` VALUES (3,1,3,'2019-11-04 23:31:01','2019-11-04 23:31:01'),(4,1,4,'2019-11-04 23:31:07','2019-11-04 23:31:07'),(6,2,6,'2019-11-04 23:32:01','2019-11-04 23:32:01'),(7,2,7,'2019-11-04 23:32:06','2019-11-04 23:32:06'),(8,2,8,'2019-11-04 23:32:11','2019-11-04 23:32:11'),(9,1,9,'2019-11-05 00:00:17','2019-11-05 00:00:17'),(10,3,10,'2019-11-07 21:18:27','2019-11-07 21:18:27'),(11,6,11,'2019-11-08 01:54:53','2019-11-08 01:54:53'),(12,6,12,'2019-11-08 01:54:55','2019-11-08 01:54:55'),(13,6,13,'2019-11-08 01:54:58','2019-11-08 01:54:58'),(14,7,14,'2019-11-08 01:56:19','2019-11-08 01:56:19'),(15,7,15,'2019-11-08 01:56:22','2019-11-08 01:56:22'),(16,8,16,'2019-11-08 02:00:56','2019-11-08 02:00:56'),(17,8,17,'2019-11-08 02:00:59','2019-11-08 02:00:59'),(18,8,18,'2019-11-08 02:01:02','2019-11-08 02:01:02');
/*!40000 ALTER TABLE `last_three_entries_per_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(6,'2019_11_04_230056_entries',2),(7,'2019_11_04_230825_last_three_entries_per_users',2),(8,'2019_11_06_021546_add_twitter_user',3),(9,'2019_11_07_231929_hidden_tweets',4),(10,'2019_11_08_014449_api_token',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `twitter_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'qaniel','dmendoza.jrtecnologia@gmail.com',NULL,'$2y$10$d7V5pRYJi5Rp8v.A/nuv.e/UL9.xgl6NLe.TDxGa38polfDQpexsG','hehgfq3gbr',NULL,'2019-11-01 21:23:14','2019-11-01 21:23:14','9GAG'),(2,'qaniel2','qanielmendoza@gmail.com',NULL,'$2y$10$aLlHKW85fk//f0CAlEgPfOrlJsMZi0uzi/mxCAnEHW134j9jYw/EK','gwarsbdfbz',NULL,'2019-11-03 23:57:20','2019-11-03 23:57:20','ThePSF'),(3,'qaniel4','daniel.mendoza@americavoice.com',NULL,'$2y$10$WiyZeWAlaHDcJ/NpNXbYJO3jGy4S6ptIqDIpq2CsVTvZ9lvyf1Fe.','gbswr',NULL,'2019-11-04 11:34:28','2019-11-04 11:34:28','unclebobcrypto'),(4,'qaniel','noquiero@profa.com',NULL,'$2y$10$73uoHPTOMCOw2Yc.HeldB.oPum7fVzm.9ayHg2vLAgQ5ZCwIRram6','ewagvewahbedhe',NULL,'2019-11-06 08:22:39','2019-11-06 08:22:39','laravelphp'),(5,'qaniel10','test@test.com',NULL,'$2y$10$XMqkP8J5944dACmbMGKDv.PStNQWJo9Kw9THqLoLXP1kG.enQsx1W','2rtyhwgq4e',NULL,'2019-11-06 08:24:31','2019-11-06 08:24:31','linuxfoundation'),(6,'tokenapi','token@api.com',NULL,'$2y$10$Ib/.J.0DAmL3byx/0m7wkeA5FaxEKM6VqRiV66AQiefALsiRKzqee','1tg13e',NULL,'2019-11-08 07:54:42','2019-11-08 07:54:42','zfmastery'),(7,'api','api@api.com',NULL,'$2y$10$ZbnqiDtTW/vpwM7uOGtLAu3SYbc7IjGkE9i1Up9oRcZDEVcONH0CC','y4gherh5e3h35wjh35',NULL,'2019-11-08 07:56:14','2019-11-08 07:56:14','zfdevteam'),(8,'Api','AP@i.com',NULL,'$2y$10$Ikq1mnB0z55P7/9du/dWZOfsv4k5NwMimQOT4/JWxZIbW5WIasrUe','Cm4446tJ6fCRvdPMxA9fUor9CW0d4heWMBhrZFCbwsMv7UKIExZq6zfagpxGYynMckvLWPTsfMkXnjjY',NULL,'2019-11-08 07:57:48','2019-11-08 07:57:48','official_php');
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

-- Dump completed on 2019-11-07 22:58:56
