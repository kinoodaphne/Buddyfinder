-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `friend_id` int(10) unsigned NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `friends_user_id_foreign` (`user_id`),
  KEY `friends_friend_id_foreign` (`friend_id`),
  CONSTRAINT `friends_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`),
  CONSTRAINT `friends_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (1,18,6,1,'2020-08-14 14:00:46','2020-08-14 14:41:17'),(2,21,6,0,'2020-08-14 14:02:43','2020-08-14 14:02:43'),(3,23,6,0,'2020-08-14 14:06:45','2020-08-14 14:06:45'),(4,20,6,1,'2020-08-14 14:10:51','2020-08-14 14:43:12'),(5,19,6,1,'2020-08-14 14:21:02','2020-08-14 14:41:31'),(7,7,18,1,'2020-08-14 14:49:42','2020-08-14 14:50:05'),(8,6,7,1,'2020-08-14 14:56:55','2020-08-14 14:59:55'),(9,7,6,1,'2020-08-14 15:02:02','2020-08-14 15:02:21');
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (39,'2020_05_02_134449_create_friend_requests_table',1),(73,'2014_10_12_000000_create_users_table',2),(74,'2014_10_12_100000_create_password_resets_table',2),(75,'2019_08_19_000000_create_failed_jobs_table',2),(76,'2020_05_02_095530_create_students_table',2),(77,'2020_05_02_122342_create_friends_table',2);
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
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `study_field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `music` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaming` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `books` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `travel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buddy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'buddy',
  `bio` text COLLATE utf8mb4_unicode_ci,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `study_field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `music` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `series` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaming` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `books` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `travel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buddy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'Daphne','Kinoo','r0701607@student.thomasmore.be','Hemiksem','3IMD','Development','Metal','Racing','Internationaal',NULL,'Detective','Europa','Buddy','Wanting to help a student out in these Corona times','1597235762.jpg',NULL,'$2y$10$UNzrQGpP8sF9xHomkuS2W.Sw/rVxrwD45DOxYgMCNIdjbfMvfrIyy',NULL,'2020-08-12 08:58:33','2020-08-14 13:30:56'),(7,'John','Doe','john@student.thomasmore.be','Antwerpen','1IMD','Development','Dubstep',NULL,'Quiz','Horror','Graphic novels','Noord-Amerika','Searcher',NULL,'1597413114.jpeg',NULL,'$2y$10$2M5I9IdkoazaDeJ.shoI/.cc.TiitejFTZGKhZVm0lurTS7HI4vpq',NULL,'2020-08-12 10:38:44','2020-08-14 13:52:17'),(18,'Vince','Van Alphen','vince@student.thomasmore.be','Antwerpen','3IMD','Development','Andere',NULL,'Internationaal','Shooter','Andere','Azië','Searcher','Het leven zoals het is.... Vince\r\n->amateur DJ/producer\r\n->AEM developer @capgeminibelgium','1597413593.jpg',NULL,'$2y$10$t2lryDSCTN5CGw8BPydCGOGFYTPyPPh.hZG.BSG.wPsuZDS59odF6',NULL,'2020-08-14 13:53:42','2020-08-14 14:00:24'),(19,'Chris','Ramsa','chris@student.thomasmore.be','Deurne','1IMD','Design','Rock',NULL,'Quiz','Horror','Drama','Afrika','Searcher','Probleem bij Databanken','1597414535.jpeg',NULL,'$2y$10$H4kvdYUVqTn8rgfxo4ZRxuFURmmjYPG4UYFZjsfwg2N.H9xOTwJfC',NULL,'2020-08-14 13:54:31','2020-08-14 14:20:25'),(20,'Masha','Raymers','masha@student.thomasmore.be','Aartselaar','2IMD','Design',NULL,NULL,NULL,NULL,NULL,NULL,'Searcher','Bijt niet ;) Stel maar gerust vragen','1597414194.jpeg',NULL,'$2y$10$SE.mr5ZK2AMT0.NOSzWYdO9b0KYfzQA7frvCe9xwxLNNbRNlmZqQW',NULL,'2020-08-14 13:55:06','2020-08-14 14:09:55'),(21,'Martin','Péchy','martin@student.thomasmore.be','Leuven','2IMD','Development','Electro',NULL,'Sport','First person','Thriller','Europa','Searcher','Hulp nodig bij PHP','1597413719.jpeg',NULL,'$2y$10$yxqt9ICQe6bJn3zm43E1Lul9.2hfHXF0QE70ZuynGEHK47Vvjt0f6',NULL,'2020-08-14 13:55:51','2020-08-14 14:02:21'),(22,'Isa','Sung','isa@student.thomasmore.be','Brugge','3IMD','Design','Pop',NULL,'Internationaal','Puzzle','Romantiek','Azië','Searcher','Kan helpen bij Photoshop','1597413826.jpeg',NULL,'$2y$10$LrzBvrNyza.GfslzunAYaODWgaFyrhScZnFT8qI4mBYbQ9etD0SFm',NULL,'2020-08-14 13:56:29','2020-08-14 14:04:12'),(23,'Kelly','Wasaka','kelly@student.thomasmore.be','Vorselaar','2IMD','UX','Indie',NULL,'Nationaal','Party','Graphic novels','Zuid-Amerika','Searcher','Illustrator | 3D graphics | front-end','1597413943.jpeg',NULL,'$2y$10$xIa4/yt.xXj/6YHCN0l.fOrLcjDO4lBTX3hYoMJmdjXLIGdlwPq0G',NULL,'2020-08-14 13:57:07','2020-08-14 14:06:22'),(24,'Erik','Mclean','erik@student.thomasmore.be','Antwerpen','1IMD','Design','Dubstep',NULL,'Internationaal','Racing','Avontuur','Noord-Amerika','Searcher','Reeds een diploma fotografie, kan helpen bij design-vakken','1597414092.jpeg',NULL,'$2y$10$Urit.xZAU0w2hQy649Szrejpo24AjNMXSWKsho5.if9O72KedGkMa',NULL,'2020-08-14 13:57:36','2020-08-14 14:08:34');
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

-- Dump completed on 2020-08-14 16:39:11
