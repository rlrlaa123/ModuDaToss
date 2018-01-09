-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: ModuDaToss
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin@naver.com','$2y$10$w/WtrGGTiPWgTRRYJCSdGehRAQl3b8TzEzVR7wj4qmpgQcq63F4xG','b3VCN56B3MylNMNDJ5MQ0Lx9YHj1kRkJtJ7m4dX9mpllniYjVU6Yc5HTBerM','2017-12-14 12:13:42','2017-12-14 12:13:42'),(2,'어드민','admin@nate.com','$2y$10$m12G1I5W5K1fi9i5EtJlKeFmhqkC3qidPeizfeR4xH8VhoqJN5h26',NULL,'2017-12-14 16:00:13','2017-12-14 16:00:13'),(3,'김성민','leaders-1@naver.com','$2y$10$ieExjjcujAcyUesOHVHRwemmtY32xPRMRy./szse9GzFh01/SYn8m',NULL,'2017-12-15 09:12:34','2017-12-15 09:12:34'),(4,'어드민테스트','admin@modudatoss.co.kr','$2y$10$eHkv5gXI74l5GiKxrEBeW.XqV8mqMnXRG0IsGfjW4yi38V01XT36a','9EPAIDMGZOoXsjBq81VPqxedlvcRvKltdZxJBERQiDwKenx7TyslLt5acux1','2017-12-27 07:49:43','2017-12-27 07:49:43');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_index` (`user_id`),
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,1,'게시글 테스팅','게시글 테스트 글입니다.','2017-12-15 01:10:32','2017-12-15 01:10:32'),(3,19,'테스트','테스트12345678','2017-12-27 07:48:35','2017-12-27 07:48:35');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commision` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'온라인교육',25,'2017-12-14 12:15:12','2018-01-02 05:31:17','<p>Admin 에서 부여하는 영업 분야에 대한 정보들 이미지, 비디오, 텍스트 등</p>',NULL),(2,'무인경비',150,'2017-12-14 12:15:53','2017-12-19 04:15:01','Admin 에서 부여하는 영업 분야에 대한 정보들 이미지, 비디오, 텍스트 등',NULL),(3,'테스팅 영업라인업',15,'2017-12-20 09:40:40','2017-12-20 09:40:40',NULL,NULL),(4,'테스팅2',15,'2018-01-03 08:10:37','2018-01-03 08:10:37','<p>1</p>',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_parent_id_foreign` (`parent_id`),
  KEY `comments_user_id_index` (`user_id`),
  CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,NULL,'App\\Article',1,'댓글 테스팅 입니다.','2017-12-15 01:10:47','2017-12-15 01:10:47'),(4,1,1,'App\\Article',1,'답글 테스팅 입니다','2017-12-20 08:08:56','2017-12-20 08:08:56'),(5,4,NULL,'App\\Article',3,'12','2017-12-28 07:20:51','2017-12-28 07:20:51'),(6,14,NULL,'App\\Article',1,'댓글 테스팅','2018-01-02 05:02:33','2018-01-02 05:02:33');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etc`
--

DROP TABLE IF EXISTS `etc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `front_img1` int(11) NOT NULL,
  `front_img2` int(11) NOT NULL,
  `front_img3` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etc`
--

LOCK TABLES `etc` WRITE;
/*!40000 ALTER TABLE `etc` DISABLE KEYS */;
INSERT INTO `etc` VALUES (1,94935,2034,2034);
/*!40000 ALTER TABLE `etc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_admin_users_table',1),(2,'2014_10_12_100000_create_admin_password_resets_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2017_11_21_082122_create_users_table',1),(5,'2017_11_21_145422_create_categories_table',1),(6,'2017_11_22_081809_create_withdrawal_infos_table',1),(7,'2017_11_23_065618_create_sales_info',1),(8,'2017_11_27_061627_create_savinghistories_table',1),(9,'2017_11_29_085804_create_articles_table',1),(10,'2017_11_30_021558_create_comments_table',1),(11,'2017_12_07_182919_alter_users_table_for_regular_members',1),(12,'2017_12_12_045330_create_servicecenter_table',1),(13,'2017_12_12_095508_add_column_content_in_category',1),(14,'2017_12_12_103954_add_column_to_savinghistory',1),(15,'2017_12_14_044459_add_image',1),(16,'2017_12_20_051235_add_image_to_categories',2),(17,'2017_12_20_112058_add_nullable_to_password_column_on_users_table',2),(18,'2017_12_22_054251_alter_pay_nullable_from_sales_infos',3),(19,'2017_12_22_060309_alter_pay_default_0_from_sales_infos',3),(20,'2017_12_28_024106_create_etc_table',4),(21,'2017_12_28_071225_alter_sales_infos_note_and_characteristics_to_nullable',5),(22,'2017_12_29_085220_alter_sales_infos_Customeremail_to_nullable',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('leaders-1@naver.com','$2y$10$.a16Jrnb0n9E6TYn9x8HiOjZ6IUnkxltHoaJ42N8bJlty.PEmMYzu','2018-01-04 00:22:36');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets_admin`
--

DROP TABLE IF EXISTS `password_resets_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets_admin` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_admin_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets_admin`
--

LOCK TABLES `password_resets_admin` WRITE;
/*!40000 ALTER TABLE `password_resets_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_infos`
--

DROP TABLE IF EXISTS `sales_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BusinessName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerAddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerAddress_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CustomerAddress_extra` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PhoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ContactTime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Characteristic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'signature',
  `Category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '접수 완료',
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CustomerEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay` int(11) DEFAULT '0',
  `SalesPerson_id` int(10) unsigned NOT NULL,
  `Fail_reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `SP_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_infos_salesperson_id_index` (`SalesPerson_id`),
  CONSTRAINT `sales_infos_salesperson_id_foreign` FOREIGN KEY (`SalesPerson_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_infos`
--

LOCK TABLES `sales_infos` WRITE;
/*!40000 ALTER TABLE `sales_infos` DISABLE KEYS */;
INSERT INTO `sales_infos` VALUES (1,'김동현','코드바이스','경기도 고양시 덕양구 일영로 202-72','10574',NULL,'(오금동)','01071144542','2017-08-31','비고','signature','온라인교육','2017-12-14 12:16:32','2017-12-14 12:16:32','완료','비고','kimdonghyun3366@gmail.com',300000,1,'none','김동현','noimages.jpg'),(2,'이상문','리더스','경기도 성남시 분당구 문정로42번길 60','13580',NULL,'(분당동)','01098766789','2017-12-31','비고','signature','무인경비','2017-12-14 12:17:39','2017-12-14 12:17:39','진행중','비고','email@example.com',150000,1,'none','김동현','noimages.jpg'),(3,'테스터','클라우드','서울특별시 성동구 왕십리로 222','04763',NULL,'(사근동)','01012341234','2017-12-10','비고','signature','무인경비','2017-12-14 12:20:27','2017-12-14 12:20:27','진행중','비고','test@test.com',150000,3,'none','Test','noimages.jpg'),(4,'이윤석','그린나라','광주광역시 남구 봉선중앙로 64','61675',NULL,'(봉선동)','01098789777','2017-12-15','비고','signature','온라인교육','2017-12-14 12:21:08','2017-12-14 12:21:08','진행중','비고','tester@naver.com',150000,3,'none','Test','noimages.jpg'),(5,'이윤석','코드바이스','경기도 성남시 중원구 광명로 377','13174','창업관 507호','(금광동)','01054204793','2018-01-01','테스트','signature','온라인교육','2017-12-14 16:05:11','2017-12-14 16:05:11','완료','테스트2','stormkk@daum.net',1000000,4,'none','이윤석','noimages.jpg'),(6,'테스트','테스트','경기도 성남시 중원구 광명로 377','13174','507호','(금광동)','01054204793','2018-01-01','특이 사항','signature','온라인교육','2017-12-15 00:10:41','2017-12-15 00:10:41','완료','비고','stormkk@daum.net',1000000,4,'none','이윤석','noimages.jpg'),(7,'김동현','코드바이스','서울특별시 성동구 마조로1길 54-1','04759',NULL,'(마장동)','01071144543','1994-12-08','비고','signature','온라인교육','2017-12-19 06:23:47','2017-12-19 06:23:47','완료','비고','kimdonghyun3366@gmail.com',150000,1,'none','김동현','noimages.jpg'),(8,'테스팅','테스팅','경기도 성남시 중원구 광명로 377','13174',NULL,'(금광동)','01071717171','2017-12-20','비고','signature','테스팅 영업라인업','2017-12-20 10:14:31','2017-12-20 10:14:31','진행중','비고','kimdonghyun3366@gmail.com',100000,1,'none','김동현','noimages.jpg'),(9,'테스트','코드바이스','경기도 성남시 중원구 광명로 377','13174','창업관 507호','(금광동)','0317474709','2017-12-22','없음','signature','온라인교육','2017-12-21 07:11:38','2017-12-21 07:11:38','완료','없음','stan24@nate.com',1000000,4,'none','이윤석','_메인 사이즈변경_1513840298.jpg'),(10,'동현','중앙대','서울특별시 성동구 마조로1길 54-1','04759',NULL,'(마장동)','01071144543','2017-12-21','비고','signature','온라인교육','2017-12-22 04:41:06','2017-12-22 04:41:06','완료','비고','kimdonghyun3366@gmail.com',10000,17,'none','ABC','noimages.jpg'),(11,'동현','중앙대','서울특별시 성동구 마조로1길 54-1','04759',NULL,'(마장동)','01071144543','2017-12-21','비고','signature','무인경비','2017-12-22 04:41:07','2017-12-22 04:41:07','진행중','비고','kimdonghyun3366@gmail.com',10000,17,'none','ABC','noimages.jpg'),(12,'이윤석','코드바이스','경기도 성남시 중원구 광명로 377','13174','창업관 507호','(금광동)','0212345678','2017-12-28T17:07','특이사항','signature','온라인교육','2017-12-28 07:09:14','2017-12-28 07:09:14','진행중','비고','stan24@nate.com',1000000,4,'none','이윤석','noimages.jpg'),(13,'이윤석','코드바이스','경기도 성남시 중원구 광명로 377','13174','창업관 507호','(금광동)','0212345678','2017-12-28T17:07','특이사항','signature','무인경비','2017-12-28 07:09:14','2017-12-28 07:09:14','진행중','비고','stan24@nate.com',500000,4,'none','이윤석','noimages.jpg'),(14,'이윤석','코드바이스','경기도 성남시 중원구 광명로 377','13174','창업관 507호','(금광동)','0212345678','2017-12-28T17:07','특이사항','signature','테스팅 영업라인업','2017-12-28 07:09:14','2017-12-28 07:09:14','진행중','비고','stan24@nate.com',300000,4,'none','이윤석','noimages.jpg'),(15,'김동현','코드바이스','서울특별시 성동구 마조로1길 54-1','04759',NULL,'(마장동)','01071144542','2017-12-29T17:17',NULL,'signature','온라인교육','2017-12-29 08:17:54','2017-12-29 08:17:54','진행중',NULL,'kimdonghyun3366@gmail.com',300000,14,'none','Kim Dong Hyun','noimages.jpg'),(16,'테스트','코드바이스','경기도 성남시 중원구 광명로 377','13174','창업관 507호','(금광동)','0317474709','2018-01-02T18:35',NULL,'signature','온라인교육','2018-01-02 07:36:25','2018-01-02 07:43:21','완료',NULL,NULL,1500000,24,'none','테스트','noimages.jpg'),(17,'테스트','코드바이스','경기도 성남시 중원구 광명로 377','13174','창업관 507호','(금광동)','0317474709','2018-01-02T16:57',NULL,'signature','온라인교육','2018-01-02 07:57:24','2018-01-02 07:58:04','완료',NULL,NULL,2000000,25,'none','테스트2','noimages.jpg'),(18,'테스트','코드바이스','경기도 성남시 중원구 광명로 377','13174','창업관 507호','(금광동)','0212345678','2018-01-02T20:11',NULL,'signature','온라인교육','2018-01-02 08:11:22','2018-01-02 08:11:22','승인대기',NULL,NULL,5000000,25,'none','테스트2','noimages.jpg'),(19,'김동현','코드바이스','경기도 고양시 덕양구 일영로 202-90','10574',NULL,'(오금동)','01071144542','2018-01-03T15:09',NULL,'signature','온라인교육','2018-01-03 15:10:08','2018-01-03 15:10:08','진행중',NULL,NULL,300000,14,'none','김동현','Screenshot_2017-12-29-18-17-47_1514959808.png'),(20,'이상문','코드바이스','경기도 성남시 중원구 희망로 448','13180',NULL,'(금광동)','010122776639','2018-01-03T16:45',NULL,'5a4c8a15a7162.png','온라인교육','2018-01-03 16:45:25','2018-01-03 16:45:25','진행중',NULL,NULL,300000,14,'none','김동현','noimages.jpg'),(21,'테스트','코드바이스','경기도 성남시 중원구 광명로 377','13174','창업관 507호','(금광동)','01012345678','2018-01-24T22:15',NULL,'5a4d7370224b5.png','온라인교육','2018-01-04 09:21:04','2018-01-04 09:21:04','진행중',NULL,NULL,1000000,19,'none','YoonSuk Lee','05. 노인 의료비_1515025264.jpg'),(22,'김현미','리더스코리아','서울특별시 강남구 개포로22길 31','06308','4층','(개포동)','010-2226-4018','2018-01-04T11:27',NULL,'5a4d74dc7b8bc.png','온라인교육','2018-01-04 09:27:08','2018-01-04 00:47:59','완료',NULL,NULL,5000000,6,'none','변혜라','noimages.jpg'),(23,'테스트','코드바이스','경기도 성남시 중원구 광명로 377','13174','창업관 507호','(금광동)','0317474709','2018-01-24T22:00',NULL,'5a4d7a7cb98e1.png','온라인교육','2018-01-04 09:51:08','2018-01-04 00:51:52','완료',NULL,NULL,1000000,28,'none','테스트5','noimages.jpg');
/*!40000 ALTER TABLE `sales_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `savinghistories`
--

DROP TABLE IF EXISTS `savinghistories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `savinghistories` (
  `SalesPerson_id` int(11) NOT NULL,
  `SalesPerson_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoneyType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoneySum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `triggerid` int(11) DEFAULT NULL,
  `triggerName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `savinghistories`
--

LOCK TABLES `savinghistories` WRITE;
/*!40000 ALTER TABLE `savinghistories` DISABLE KEYS */;
INSERT INTO `savinghistories` VALUES (5,'파트너1','거래성사금액',1000000,'2017-12-14 16:08:27',NULL,NULL,NULL),(4,'이윤석','거래성사수수료',250000,'2017-12-14 16:08:27',NULL,4,'이윤석'),(5,'파트너1','거래성사금액',1000000,'2017-12-15 00:13:16',NULL,NULL,NULL),(4,'이윤석','거래성사수수료',250000,'2017-12-15 00:13:16',NULL,4,'이윤석'),(12,'teserVendor','거래성사금액',150000,'2017-12-20 10:42:17',NULL,NULL,NULL),(1,'김동현','거래성사수수료',37500,'2017-12-20 10:42:17',NULL,1,'김동현'),(5,'파트너1','거래성사금액',1000000,'2017-12-21 07:13:23',NULL,NULL,NULL),(4,'이윤석','거래성사수수료',250000,'2017-12-21 07:13:23',NULL,4,'이윤석'),(12,'teserVendor','거래성사금액',300000,'2017-12-22 04:37:16',NULL,NULL,NULL),(1,'김동현','거래성사수수료',75000,'2017-12-22 04:37:16',NULL,1,'김동현'),(12,'teserVendor','거래성사금액',10000,'2017-12-22 04:41:42',NULL,NULL,NULL),(17,'ABC','거래성사수수료',2500,'2017-12-22 04:41:42',NULL,17,'ABC'),(24,'테스트','거래성사수수료',375000,'2018-01-02 07:43:21',NULL,NULL,NULL),(23,'A클래스','추천인수수료',75000,'2018-01-02 07:43:21',NULL,24,'테스트'),(23,'A클래스','A클래스회원수수료',45000,'2018-01-02 07:43:21',NULL,24,'테스트'),(25,'테스트2','거래성사수수료',500000,'2018-01-02 07:58:04',NULL,NULL,NULL),(24,'테스트','추천인수수료',100000,'2018-01-02 07:58:04',NULL,25,'테스트2'),(23,'A클래스','A클래스회원수수료',60000,'2018-01-02 07:58:04',NULL,25,'테스트2'),(6,'변혜라','거래성사수수료',1250000,'2018-01-04 00:47:59',NULL,NULL,NULL),(28,'테스트5','거래성사수수료',250000,'2018-01-04 00:51:52',NULL,NULL,NULL),(6,'변혜라','추천인수수료',50000,'2018-01-04 00:51:52',NULL,28,'테스트5'),(6,'변혜라','A클래스회원수수료',30000,'2018-01-04 00:51:52',NULL,28,'테스트5');
/*!40000 ALTER TABLE `savinghistories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicecenter`
--

DROP TABLE IF EXISTS `servicecenter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicecenter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `servicecenter_user_id_index` (`user_id`),
  CONSTRAINT `servicecenter_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicecenter`
--

LOCK TABLES `servicecenter` WRITE;
/*!40000 ALTER TABLE `servicecenter` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicecenter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income` int(10) unsigned NOT NULL DEFAULT '0',
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` int(11) DEFAULT NULL,
  `bankName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `recommender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommend_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AclassRecommender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_code` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `Benefit` int(11) NOT NULL DEFAULT '0',
  `Commision` int(11) NOT NULL DEFAULT '0',
  `RecommenderCommision` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'김동현','kimdonghyun3366@gmail.com','$2y$10$1EbAygZx8tXQslsPmOCb1OQ.6su4Mu3o0pGW6HCHFeTnMLHYv3gCu','BbPnOU6gKjDjsjfT1xRahtKuFdjEmLbrIMI5CBboozsZF2l60X4R1MGiIbll',0,'남자',1071144542,'shinhan','110391404707',NULL,NULL,4,NULL,'xFi5EInw',NULL,NULL,'FshsnTzc9BQZf3u457qoTGODlyXKZSMzJcnLQUuV7jZZJQCUDTlCOz4U63kx',0,0,82500,0,'2017-12-14 11:26:20','2018-01-02 02:03:42'),(2,'이상문','sml162655@gmail.com','$2y$10$E2DEGLj0KbpRc93JGFHRveS4zXEuEO4ZVNqohdkEQyF/JfctYUnsm','p7L0DqCRnCtDlsboxTcHLF5F1yVkflZXrxGlMFRI99oH4H1662DRrz7tHgCD',0,'남자',1099771626,'농협','23492849384',NULL,NULL,1,NULL,'dKkvyeQF',NULL,NULL,'dRZHo5NG3OefDkbM1paTrTThDN9Kv9dGVxjDZjQnl9twdai3Lh4KDApDIKj1',0,0,0,0,'2017-12-14 11:26:49','2018-01-04 12:48:36'),(3,'Test','tester@naver.com','$2y$10$f1DDy/WaSTxoc3V9TCdxn.QC2.4G.nCOaUFs8HuXwH4IIoE8hNFim','a80HcemvZNaYxZ9evepxBkHvCIugR0UozrS52U7TWmYnk7eNAc7CdmTFl7ym',0,'남자',1078978988,'shinhan','113345533',NULL,NULL,4,'xFi5EInw','orm5jFUJ',NULL,NULL,'ej3NeM3eSQdIsjUAolrbCqPDqBPyeOd1Rldyf6mzkU7v8dAnbrlk2fnaBKtS',0,0,0,0,'2017-12-14 12:18:31','2017-12-22 04:35:08'),(4,'이윤석','stan24@nate.com','$2y$10$ViiiryJJyGOwLqr8LMttve.u4hdgUejCe.QOaeV6R/vARsspNkfdO','lQQm7MpNNI70fVtJgO4usv9x7WMRqfyiJvfPSPUaigXj4SsS7Qtt63xEORuj',0,'남자',1054204793,'신한은행','110268224126',NULL,NULL,4,NULL,'rfClOdY7',NULL,NULL,'j22fS9nAnKJCgUALnEBZwpqlKWuc0qcRS8ofweJQlKuaViIb3q7Zxo2BURsg',0,0,700000,0,'2017-12-14 15:51:03','2017-12-28 07:19:01'),(5,'파트너1','partner@naver.com','$2y$10$IF7KlubkqneTOxk2T4/UpehSWw52m9FJNoD699/EjeWbuOdoOQqau','Fhk3KV84EQOJU5YYKbuWD2rdhHnPnZ72JNKpIk17cqLVecOmjiuphCgIuFi1',0,'0',1054204793,'신한은행','110268224126','사진','서명',2,NULL,NULL,'온라인교육',NULL,NULL,1,3000000,0,0,'2017-12-14 16:06:40','2018-01-04 09:51:23'),(6,'변혜라','leaders-1@naver.com','$2y$10$0xWlCgatTTqelwzuGT2yNu56s1BNJ78aC//sRFghs/R4rbWQoVT1W','RUY7q89Edvfx8FuD0hYeR4HVmBNYNVsPDAs822c5uzxSyQX4MoHwrxP0CFvV',0,'여자',1022264018,'신한','86391008254407',NULL,NULL,4,NULL,'3QzsLBvb',NULL,NULL,'O9zaow5tNInGkVDcGDg0oVdsTnsk4OuDL1mAWaytk0Gwp85STfSlt6VgM2oF',0,0,1250000,80000,'2017-12-15 09:14:13','2018-01-04 00:51:52'),(7,'김영일','phy6456@naver.com','$2y$10$daGlVTQBUnBLmOwjSKJxIeDKnLzztkpHuOKreY5GqxNIm2t7xcbdq',NULL,0,'남자',1037829923,'씨티은행','1280884326701',NULL,NULL,4,NULL,'CLSiQCdb',NULL,NULL,'uxhdy08EZPl0EBsjhj6y7PcD3XsqGDiNTfaRbH4qi7KTX5RxsVV7N675CXMZ',0,0,0,0,'2017-12-15 09:16:15','2017-12-22 02:57:16'),(8,'박용택','ace9164@naver.com','$2y$10$EQm7hotg32YC2glpSrTow.EHkYBk9rMdlQ/SUiQG9DIt.7zLdnXRS',NULL,0,'남자',1023937093,'카카오뱅크','3333049020248',NULL,NULL,5,'3QzsLBvb','wUT2JUOx',NULL,NULL,'Cwh2rbLFn9mdAVwkcbKP6l9bDTaGqwePUAhvUAYEWUiOWujDftilMCRUusa1',0,0,0,0,'2017-12-15 09:19:36','2017-12-15 09:22:09'),(10,'김성민','dhkdzh1004@naver.com','$2y$10$SmitgmSHhYTRnrRBno.xoes/0HKMTgB0sSIdPzECcVadAHI13X4eG','ZY7uFpqlHI8DLhN5me1yxz3NJp6ECuWKJBcTUKiiOF4DAYkgG3dlwEmVL9F6',0,'0',1022264018,'하나','86391008254407',NULL,NULL,2,NULL,NULL,'온라인교육',NULL,NULL,1,0,0,0,'2017-12-15 09:23:12','2017-12-17 01:00:09'),(11,'코드바이스3','codvice@naver.com','$2y$10$36VsZCEdiRdrjTg0sglr3uqGJ9GK0Wy/dDb.2poCRov8LgaHR7INO','Lvp0JCJpNBZ7DQ4eMezAHPpMzO6yUnvU7asyzWKIhG1NmYm6CPIRszwvPXL4',0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'j3t0itl68BwFbGGTP2LfqTxMHbcROCTucv4acGBa34p9QgXNkpNqBZmv05q9',0,0,0,0,'2017-12-19 11:57:04','2017-12-20 08:46:22'),(12,'teserVendor','testervendor@naver.com','$2y$10$vKraq81x5UrntsqoN05TY.bcS22u12Ab8pc1JqARbHHw3x8d6Aqy6','ZXBIDPXOQh3uqAf2x38O0oBWUf0A1YChfWfAHMfLyc8aOpNC3md23PitncUx',0,'0',1071144542,'shinhan','110330302',NULL,NULL,2,NULL,NULL,'온라인교육',NULL,NULL,1,460000,0,0,'2017-12-20 10:12:23','2017-12-22 04:41:24'),(14,'김동현','dktmvkxm@naver.com','$2y$10$WTK0kMistGxYV98riikFeeKrJdWQc0gW/0QT.1kSiFouJtThhvdKS','wjmMF4sraSLDybDU0xJ6F5zdx0Lxp9SZNqins6P8grSrL8WoTSWnf37e6pnE',0,'남자',1071144542,'신한은행','110391404707',NULL,NULL,4,NULL,'VaN5O6SS',NULL,NULL,NULL,1,0,0,0,'2017-12-21 13:19:18','2018-01-05 00:52:00'),(15,'이상문','sml8648@naver.com',NULL,'QYLtA6OtgsMfZaKl5o11tmHarTqgZ6qfu6Fm5oIyNF4FN8Yw0gOPP2cVVukq',0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,1,0,0,0,'2017-12-22 02:54:43','2018-01-04 11:40:19'),(16,'이윤석','codvice@nate.com','$2y$10$2UqccgYzRd70D05lOnLDUeXM/hl0DA5AqVfPrFYSx0s91ER9pA/h.',NULL,0,'남자',1054204793,'신한','110268224126',NULL,NULL,4,NULL,'g2swsy5A',NULL,NULL,'rDF3DTVqW20wQ3jBGhpDz9SqGhz3q09PqPNRA7QblMUj3PAl7rvUjdiQsl8X',0,0,0,0,'2017-12-22 02:58:33','2017-12-22 02:59:21'),(17,'ABC','abc@naver.com','$2y$10$Xeo2Tdb8/9czwnaRCAWPx.pXUDV05euz96Ua29Di0Yw7GzNUAmlYa','d9QxybuF1pmRFSXAlk2e1VvGiTpEUwv4Qicu4TU7moOpEdqni167Ms7HXwWZ',0,'남자',1071144542,'shinhan','110391404707',NULL,NULL,1,NULL,'ODcdfQxC',NULL,NULL,'HyL5OfEHNHJRpGnOxpf1ry63Syh1HuDV40DrDxLUvWu1Wf1by0t9Xb0zGjdt',0,0,250,0,'2017-12-22 04:39:50','2017-12-22 04:42:07'),(18,'testvendor','testvendor@naver.com','$2y$10$dl518v92514gfuXks.x23.sgxpeQfjNZ65Cyg6TtxRfmOCTbvWJci',NULL,0,'0',1071144542,'shinahn','110319401010',NULL,NULL,2,NULL,NULL,'테스팅 영업라인업',NULL,NULL,1,0,0,0,'2017-12-22 04:48:39','2017-12-22 04:48:39'),(19,'YoonSuk Lee','stormkk@paran.com',NULL,'8HtKWGh0q9CnAkDUdrffRVsjFpjTkPaeVg4z1dz29IXpGQ3ACFoqcGc20ksd',0,'남자',1054204793,'신한은행','110268224126',NULL,NULL,1,NULL,'JShkfbpM',NULL,NULL,NULL,1,0,0,0,'2017-12-27 07:47:36','2018-01-04 09:15:25'),(20,'테스트','stormkk@daum.net','$2y$10$3nJXH4EXhn6SFqngV3M8P.AVJth6LPlBhPUqG573oecZsiiFGTbTa',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,'JShkfbpM',NULL,NULL,NULL,'fAusDWgee0UL7d7kzN9kwUTT4iay4sPuZU7VEezMqDUqFyHKgHD1hRJhGEwN',0,0,0,0,'2017-12-27 07:59:17','2017-12-27 07:59:17'),(21,'안드로이드2','android@modudatoss.co.kr','$2y$10$6i5bDFG5T2sIXuSChmHcFucFq1alUXrPHRqGyO6.1V25.eFg/vKRG','d1JFvx7LeXubrTOcpFIlrZPEGDCTMSZvDesgKbEBwn6wuLFll6i3X3wlcUb3',0,NULL,NULL,NULL,NULL,NULL,NULL,0,'rfClOdY7',NULL,NULL,'rfClOdY7','Iwq5HRKjY4zGCFs3x7izZYv75ytdqvhuIMRS7MB5icj66TIv80nTTGg8xTvC',0,0,0,0,'2017-12-28 06:52:07','2017-12-28 06:54:31'),(22,'유우정','amistad.ryu@gmail.com','$2y$10$5NbcviJNwzT3KnqPpVcBRuCKusJyyfp9cLCvgPhLdz5Lztcsr2ABi','MvMb3jcad3pCz7vnv8Dw17oSEiBRQ0HtyxdNPzWm2SJbv7LQoMbsLeVTuQFt',0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,'T7yjfAJcenaAgPcWKaJdI5ZHunrWbUbu9XAeZgJuh1legyJlsMWKLet337GH',0,0,0,0,'2018-01-02 02:18:36','2018-01-04 13:05:10'),(23,'A클래스','aclass@modudatoss.co.kr','$2y$10$614Wb2Gmk6SSB6/3lh1aau.tAiiz24TxidQtfv94ThmqK4HKd265e','WoGt8FBRFfuFA7uQfJYChVukdvEApy8C59tL7Ae93DbNxupioUqPsEDJf37H',0,'0',1054204793,'신한은행','110268224126','사진','서명',4,NULL,'HXBDSSEj',NULL,NULL,NULL,1,0,0,180000,'2018-01-02 05:32:13','2018-01-04 09:26:40'),(24,'테스트','test1@codvice.co.kr','$2y$10$3xpxQ/xSBtQZGL5r06hzfuZ6aT6mKyVUvdfFwu8YAHelHv5eYg0EW','CEFVzec3oJE40OShueFbULjcZMs1FEfqHFnRbZkA5azfVkGcSDycVUs6Vxjq',0,'남자',1054204793,'신한','110268224126',NULL,NULL,1,'HXBDSSEj ','KEYDGNQv',NULL,'HXBDSSEj','IFiy2GR8Wigcjflk8GaC8hQTIVvLPPIrkrUkrVkHVfM9MKUDTLNedjQuA0lV',0,0,375000,100000,'2018-01-02 05:35:29','2018-01-02 07:58:04'),(25,'테스트2','test2@codvice.co.kr','$2y$10$kGh91V6thF8rvOiSYGmEf.aEVHxmg7WSBJdSX4K9R1Xys1TCiMs8.','9OmhlXZWiDs4RsPf0WaAz90a8uvxI0NGEHUsZT8fU0YPclFFZmpecZAObTY3',0,'남자',1012345678,'신한','110268224126',NULL,NULL,1,'KEYDGNQv','gxz4JHik',NULL,'HXBDSSEj','N1AGHK8TwE2ujEteziBnXxJ9b7J7OVdr537Wt2egOx9IqYFvkKgYvPlH2l3y',0,0,500000,0,'2018-01-02 07:56:04','2018-01-04 09:27:46'),(26,'테스트3','test3@codvice.co.kr','$2y$10$NL.SjVtfKXuunalh3lpibOz27W5GDoYceo5KZ6/QS9GxDbjn79mTi',NULL,0,'남자',1012345678,'신한','110268224126',NULL,NULL,5,'gxz4JHik ','dc8PJ0gM',NULL,'HXBDSSEj','WEBY05aYCaJk9jCUefacPotLRSt3tMqdq2tbrqJVWelb6z4SYscT41ZyZKl2',0,0,0,0,'2018-01-02 17:34:29','2018-01-02 17:34:41'),(27,'테스트4','test4@codvice.co.kr','$2y$10$RrcbTN1cA3k6Hxa8qhQLpO9nJ8UfLdH4YqDCtZDcG1K7BJj3mpNB.','Og5kjr9aeX2nItM7yok7aNCfaGEEilJxMaBdqYH45CwwiePiDY9Fi7SjRTAK',0,'남자',1012345678,'신한','110268224126',NULL,NULL,1,'HXBDSSEj','jCKTU196',NULL,'HXBDSSEj','uv7NEzQzek5Bknt9DI8clS1HbGi30qHLJBPnMr3kIZ0bu5qf8I04r50h016D',0,0,0,0,'2018-01-04 09:32:31','2018-01-04 09:52:34'),(28,'테스트5','test5@codvice.co.kr','$2y$10$QKZcfRuKJAVyhGw9wHrYd.2SfTzccMlrg6qjbz.6PaPwt2RSccx5a','DIcbCVu7HUstGNyVjL83nsHO05lbcvntnSQVLqfgXMEZYfsRGrUtPHUMymcQ',0,'남자',1012345678,'신한','110268224126',NULL,NULL,1,'3QzsLBvb','7km97gKL',NULL,'3QzsLBvb','ZDc9uJWVvQ7fkhBN9inIjpSRUpEfKnCEjKYZoHcP9QbEK4ZFC82Xs4xxSwJh',0,0,250000,0,'2018-01-04 09:49:58','2018-01-04 13:06:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdrawal_infos`
--

DROP TABLE IF EXISTS `withdrawal_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `withdrawal_infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `memberID` int(11) NOT NULL,
  `memberName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requestmoney` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdrawal_infos`
--

LOCK TABLES `withdrawal_infos` WRITE;
/*!40000 ALTER TABLE `withdrawal_infos` DISABLE KEYS */;
INSERT INTO `withdrawal_infos` VALUES (1,1,'김동현','shinhan','110391404707',29010,'2017-12-20 10:43:53','2017-12-20 10:43:53'),(2,17,'ABC','shinhan','110391404707',2176,'2017-12-22 04:42:07','2017-12-22 04:42:07'),(3,4,'이윤석','신한은행','110268224126',48350,'2017-12-28 07:19:01','2017-12-28 07:19:01');
/*!40000 ALTER TABLE `withdrawal_infos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-09  0:37:40
