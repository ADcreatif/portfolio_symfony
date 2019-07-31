-- MySQL dump 10.13  Distrib 5.7.23, for Win64 (x86_64)
--
-- Host: localhost    Database: portfolio
-- ------------------------------------------------------
-- Server version	5.7.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

CREATE TABLE portfolio
(
    id             INT AUTO_INCREMENT NOT NULL,
    title          VARCHAR(56)        NOT NULL,
    client         VARCHAR(32)  DEFAULT NULL,
    url            VARCHAR(255) DEFAULT NULL,
    image          VARCHAR(32)        NOT NULL,
    technos        VARCHAR(128) DEFAULT NULL,
    description    VARCHAR(512) DEFAULT NULL,
    published_date DATE         DEFAULT NULL,
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci
  ENGINE = InnoDB;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions`
(
    `version`     varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
    `executed_at` datetime                               NOT NULL COMMENT '(DC2Type:datetime_immutable)',
    PRIMARY KEY (`version`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions`
    DISABLE KEYS */;
INSERT INTO `migration_versions`
VALUES ('20190730104819', '2019-07-30 10:53:09');
/*!40000 ALTER TABLE `migration_versions`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio`
(
    `id`             int(11)                                NOT NULL AUTO_INCREMENT,
    `title`          varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
    `client`         varchar(32) COLLATE utf8mb4_unicode_ci  DEFAULT NULL,
    `url`            varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `image`          varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
    `technos`        varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `description`    varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `published_date` date                                    DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio`
    DISABLE KEYS */;
INSERT INTO `portfolio`
VALUES (1, 'Les langoustes, ces animaux merveilleux', NULL, NULL, 'default.jpg', NULL, NULL, NULL);
/*!40000 ALTER TABLE `portfolio`
    ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2019-07-31 18:09:26
