-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: influencers
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Current Database: `influencers`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `influencers` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `influencers`;

--
-- Table structure for table `influencer_mappings`
--

DROP TABLE IF EXISTS `influencer_mappings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `influencer_mappings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `influencer_id` bigint(20) unsigned NOT NULL,
  `area_id` bigint(20) unsigned NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `influencer_mappings`
--

LOCK TABLES `influencer_mappings` WRITE;
/*!40000 ALTER TABLE `influencer_mappings` DISABLE KEYS */;
INSERT INTO `influencer_mappings` VALUES (1,1,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(2,2,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(3,3,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(4,4,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(5,4,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(6,5,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(7,6,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(8,7,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(9,8,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(10,9,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(11,10,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(12,11,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(13,12,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(14,13,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(15,14,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(16,15,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(17,16,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(18,17,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(19,18,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(20,19,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(21,20,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(22,21,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(23,22,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(24,23,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(25,24,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(26,25,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(27,26,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(28,27,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(29,28,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(30,29,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(31,30,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(32,31,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(33,32,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(34,33,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(35,34,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(36,35,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(37,36,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(38,37,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(39,38,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(40,39,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(41,40,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(42,41,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(43,42,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(44,43,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(45,44,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(46,45,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(47,46,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(48,47,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(49,48,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(50,49,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(51,50,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(52,51,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(53,52,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(54,53,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(55,54,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(56,55,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(57,56,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(58,57,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(59,58,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(60,59,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(61,60,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(62,61,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(63,62,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(64,63,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(65,64,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(66,65,8,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(67,66,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(68,67,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(69,68,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(70,69,8,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(71,70,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(72,71,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(73,72,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(74,73,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(75,74,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(76,75,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(77,76,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(78,77,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(79,78,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(80,79,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(81,80,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33');
/*!40000 ALTER TABLE `influencer_mappings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `influencer_request_logs`
--

DROP TABLE IF EXISTS `influencer_request_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `influencer_request_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `request_id` bigint(20) unsigned NOT NULL,
  `label` varchar(50) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `influencer_request_logs`
--

LOCK TABLES `influencer_request_logs` WRITE;
/*!40000 ALTER TABLE `influencer_request_logs` DISABLE KEYS */;
INSERT INTO `influencer_request_logs` VALUES (1,1,'New Request','user','2025-05-19 01:35:16'),(2,2,'New Request','user','2025-06-28 13:56:27'),(3,2,'Approved','admin','2025-06-28 13:56:47'),(4,3,'New Request','user','2025-07-03 15:12:40'),(5,3,'Deleted','user','2025-07-03 15:23:52'),(6,4,'New Request','user','2025-07-03 15:43:15'),(7,4,'Deleted','user','2025-07-03 15:43:40'),(8,1,'Rejected','admin','2025-07-03 16:08:34'),(9,5,'New Request','user','2025-07-06 12:55:09'),(10,6,'New Request','user','2025-07-12 05:15:12'),(11,6,'Approved','admin','2025-07-12 05:15:55');
/*!40000 ALTER TABLE `influencer_request_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `influencer_requests`
--

DROP TABLE IF EXISTS `influencer_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `influencer_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `influencer_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `username_instagram` varchar(150) NOT NULL,
  `followers` int(11) NOT NULL,
  `engagement_rate` float NOT NULL,
  `note` text DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_by` varchar(50) DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `reject_note` text DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `influencer_requests`
--

LOCK TABLES `influencer_requests` WRITE;
/*!40000 ALTER TABLE `influencer_requests` DISABLE KEYS */;
INSERT INTO `influencer_requests` VALUES (1,21,'Kyranayda','kyranayda',286600,0.94,'tes','user','2025-05-19 01:35:16','admin','2025-07-03 16:08:34',NULL,NULL,'admin','2025-07-03 16:08:34',NULL,NULL,'-'),(2,29,'DJ Yasmin','dj_yasmin',1500000,2.4,'Campaign','user','2025-06-28 13:56:27','admin','2025-06-28 13:56:47','admin','2025-06-28 13:56:47',NULL,NULL,NULL,NULL,NULL),(3,8,'Sarah Ayu','sarahayuh_',450000,3,'campaign','user','2025-07-03 15:12:40','user','2025-07-03 15:23:52',NULL,NULL,NULL,NULL,'user','2025-07-03 15:23:52',NULL),(4,7,'Clara Devi','lucedaleco',300000,2.6,'campaign','user','2025-07-03 15:43:15','user','2025-07-03 15:43:40',NULL,NULL,NULL,NULL,'user','2025-07-03 15:43:40',NULL),(5,39,'DJ USA','dj_usa',246000,0.1,'campaign','user','2025-07-06 12:55:09','user','2025-07-06 12:55:09',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,21,'Kyranayda','kyranayda',286600,0.94,'campaign HNM Satrio Opening tanggal 29 sept 2025','user','2025-07-12 05:15:12','admin','2025-07-12 05:15:55','admin','2025-07-12 05:15:55',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `influencer_requests` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_influencer_requests_insert` AFTER INSERT ON `influencer_requests` FOR EACH ROW BEGIN
    INSERT INTO influencer_request_logs (
        request_id, label, created_by, created_at
    ) VALUES (
        NEW.id, 'New Request', NEW.created_by, NEW.created_at
    );
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_influencer_requests_update` AFTER UPDATE ON `influencer_requests` FOR EACH ROW BEGIN
    DECLARE log_label VARCHAR(50);
    DECLARE actor VARCHAR(50);

    IF OLD.approved_at IS NULL AND NEW.approved_at IS NOT NULL THEN
        SET log_label = 'Approved';
        SET actor = NEW.approved_by;
    ELSEIF OLD.rejected_at IS NULL AND NEW.rejected_at IS NOT NULL THEN
        SET log_label = 'Rejected';
        SET actor = NEW.rejected_by;
    ELSEIF OLD.deleted_at IS NULL AND NEW.deleted_at IS NOT NULL THEN
        SET log_label = 'Deleted';
        SET actor = NEW.deleted_by;
    ELSEIF OLD.updated_at <> NEW.updated_at THEN
        SET log_label = 'Updated Request';
        SET actor = NEW.updated_by;
    ELSE
        SET log_label = 'Updated';
        SET actor = NEW.updated_by;
    END IF;

    INSERT INTO influencer_request_logs (
        request_id, label, created_by, created_at
    ) VALUES (
        NEW.id, log_label, actor, NOW()
    );
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (20250511162210);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ms_areas`
--

DROP TABLE IF EXISTS `ms_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ms_areas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ms_areas`
--

LOCK TABLES `ms_areas` WRITE;
/*!40000 ALTER TABLE `ms_areas` DISABLE KEYS */;
INSERT INTO `ms_areas` VALUES (1,'Jakarta','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(2,'Berlin','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(3,'Bandung','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(4,'Surabaya','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(5,'Kediri','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(6,'Bekasi','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(7,'Pasuruan','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(8,'Yogyakarta','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33');
/*!40000 ALTER TABLE `ms_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ms_categories`
--

DROP TABLE IF EXISTS `ms_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ms_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ms_categories`
--

LOCK TABLES `ms_categories` WRITE;
/*!40000 ALTER TABLE `ms_categories` DISABLE KEYS */;
INSERT INTO `ms_categories` VALUES (1,'Fashion','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(2,'Makanan','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(3,'Hiburan','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(4,'Penyanyi Dangdut','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(5,'Penyanyi Pop','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(6,'Penyanyi Band','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(7,'Kecantikan','superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33');
/*!40000 ALTER TABLE `ms_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ms_influencers`
--

DROP TABLE IF EXISTS `ms_influencers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ms_influencers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username_instagram` varchar(150) NOT NULL,
  `followers` int(11) NOT NULL,
  `engagement_rate` float NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ms_influencers`
--

LOCK TABLES `ms_influencers` WRITE;
/*!40000 ALTER TABLE `ms_influencers` DISABLE KEYS */;
INSERT INTO `ms_influencers` VALUES (1,'Ayla Dimitri','ayladimitri',500000,2.5,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(2,'Anaz Siantar','anazsiantar',600000,2.8,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(3,'Sonia Eryka','soniaeryka',800000,2.7,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(4,'Gitta Savitri','gitasav',400000,3.2,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(5,'Patricia Gouw','patriciagouw',700000,2.9,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(6,'Rachel Theresia','racheltheresia',350000,3.1,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(7,'Clara Devi','lucedaleco',300000,2.6,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(8,'Sarah Ayu','sarahayuh_',450000,3,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(9,'Anastasia Siantar','anazsiantar',500000,2.8,1,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(10,'Devina Hermawan','devinahermawan',2000000,3.5,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(11,'Sisca Kohl','siscakohl',6000000,4,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(12,'Tanboy Kun','tanboy_kun',3500000,3.8,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(13,'Nex Carlos','nexcarlos',2800000,3.6,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(14,'Farida Nurhan','farida.nurhan',1500000,3.2,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(15,'Gerry Girianza','gerrygirianza',1000000,3,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(16,'Mgdalenaf','mgdalenaf',1200000,3.4,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(17,'Ria SW','riasukmawijaya',2000000,3.7,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(18,'William Gozali','willgoz',900000,2.9,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(19,'Arnold Poernomo','arnoldpo',1800000,3.3,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(20,'JKT Food Destination','jktfooddestination',1300000,0.07,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(21,'Kyranayda','kyranayda',286600,0.94,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(22,'Foodirectory','foodirectory',221100,0.88,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(23,'Buncit Foodies','buncitfoodies',205000,1.17,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(24,'Myfunfoodiary','myfunfoodiary',119200,0.21,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(25,'Maya Zikri','mayazikri',118100,1.01,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(26,'Temenin Makan','temeninmakan',76500,0.2,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(27,'Wiranurmansyah','wiranurmansyah',44200,13.62,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(28,'Riodjaja','riodjaja',43600,51.35,2,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(29,'DJ Yasmin','dj_yasmin',1500000,2.4,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(30,'DJ Winky Wiryawan','winkywiryawan',1200000,2.2,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(31,'DJ Dipha Barus','diphabarus',1800000,2.5,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(32,'DJ Riri Mestica','ririmestica',900000,2.1,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(33,'DJ Patricia Schuldtz','patriciaschuldtz',800000,2.3,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(34,'DJ Angger Dimas','anggerdimas',1000000,2.4,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(35,'DJ Jevin Julian','jevinjulian',1300000,2.2,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(36,'DJ Hogi Wirjono','hogiwirjono',700000,2,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(37,'DJ LTN','dj_ltn',600000,2.1,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(38,'DJ UNA','putriuna',1000000,1.75,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(39,'DJ USA','dj_usa',246000,0.1,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(40,'DJ Joana','dj.joana',1000000,3,3,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(41,'Ayu Ting Ting','ayutingting92',10000000,1.9,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(42,'Via Vallen','viavallen',8500000,2,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(43,'Nella Kharisma','nellakharisma',7000000,2.1,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(44,'Lesti Kejora','lestikejora',9000000,2.2,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(45,'Zaskia Gotik','zaskia_gotix',6500000,2,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(46,'Cita Citata','cita_rahayu',5500000,2.1,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(47,'Siti Badriah','sitibadriahh',6000000,2,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(48,'Dewi Perssik','dewiperssik9',4500000,1.8,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(49,'Inul Daratista','inul.d',5000000,1.9,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(50,'Ikke Nurjanah','ikkenurjanah0518',3000000,2,4,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(51,'Rossa','itsrossa910',12000000,1.8,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(52,'Maudy Ayunda','maudyayunda',11000000,2,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(53,'Raisa','raisa6690',10500000,1.9,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(54,'Isyana Sarasvati','isyanasarasvati',9000000,2.1,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(55,'Tulus','tulusmt',8000000,2,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(56,'Tiara Andini','tiaraandini',7500000,2.2,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(57,'Niki','nikizefanya',6500000,2.3,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(58,'Agnez Mo','agnezmo',14000000,1.7,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(59,'Afgan','afgan__',9500000,1.9,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(60,'Judika','jud1ka',8500000,2,5,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(61,'Ariel Noah','arielnoah',10000000,1.9,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(62,'Giring Ganesha','giring',1500000,2.1,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(63,'Tantri Kotak','tantrisyalindri',2000000,2.2,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(64,'Kaka Slank','slankdotcom',3000000,2,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(65,'Duta Sheila On 7','sheilaon7',4500000,2.1,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(66,'Armand Maulana','armandmaulana04',2500000,2,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(67,'Once Mekel','oncemekelofficial',2000000,1.9,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(68,'Endah N Rhesa','endahnrhesa',1000000,2.3,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(69,'Eross Candra','erosscandra',1500000,2.2,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(70,'David Bayu','davidbayudj',1200000,2.1,6,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(71,'Tasya Farasya','tasyafarasya',5000000,2.5,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(72,'Rachel Goddard','rachgoddard',3500000,2.6,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(73,'Sarah Ayu','sarahayu_',900000,3,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(74,'Abel Cantika','abellyc',2000000,2.4,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(75,'Suhay Salim','suhaysalim',1800000,2.3,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(76,'Nanda Arsyinta','nandaarsynt',2500000,2.2,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(77,'Jovi Adhiguna','joviadhiguna',1500000,2.5,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(78,'Kiara Leswara','kiaraleswara',1000000,2.7,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(79,'Vinna Gracia','vinnagracia',800000,2.8,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33'),(80,'Cindercella','cindercella',1200000,2.6,7,'superadmin','2025-05-19 01:34:33','superadmin','2025-05-19 01:34:33');
/*!40000 ALTER TABLE `ms_influencers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL,
  `auth_token` text DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'superadmin','Administrator','0','$2y$10$m9sjzKiTzWnUqFYcfgyExerwwqYt2zjmdBhNj4fYIf3x7WWhw3oJO',NULL,NULL,NULL,'SUPER ADMIN',1,'superadmin','2025-05-19 01:34:31','superadmin','2025-05-19 01:34:31'),(2,'admin','Admin','0','$2y$10$C.6KwcPwxDFJ56Vl6EbereMHIEUtJZEH9Jlh6zM7P7lHkG9rQMciq',NULL,NULL,'2025-07-12 09:15:36','ADMIN',1,'superadmin','2025-05-19 01:34:31','superadmin','2025-07-12 09:15:36'),(3,'user','User','0','$2y$10$dFOfs/j60VhvmPBb.GpCXeXxaVqE1qR0XJBucK6A35FAMJbD2waAe',NULL,NULL,'2025-07-12 10:24:44','USER',1,'superadmin','2025-05-19 01:34:31','superadmin','2025-07-12 10:24:44');
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

-- Dump completed on 2025-07-13 21:44:54
