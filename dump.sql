-- MySQL dump 10.13  Distrib 5.7.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: shop
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(45) NOT NULL,
  `browser_name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `cat_name`, `browser_name`) VALUES (1,'sets','Сеты'),(2,'sushi','Суши'),(3,'rolls','Роллы');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `good`
--

DROP TABLE IF EXISTS `good`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `good` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `composition` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `link_name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `good`
--

LOCK TABLES `good` WRITE;
/*!40000 ALTER TABLE `good` DISABLE KEYS */;
INSERT INTO `good` (`id`, `category`, `name`, `composition`, `price`, `descr`, `img`, `link_name`) VALUES (1,'sets','Сет Запеченный','запеченные роллы',800,'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga mollitia libero cupiditate pariatur fugit suscipit rem rerum vero blanditiis culpa quas recusandae voluptatum, obcaecati illo, quod eum unde! Aperiam, quod!','baked.jpg','baked_set'),(2,'sets','Сет Филамикс','три разных ролла Филадельфия',950,'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga mollitia libero cupiditate pariatur fugit suscipit rem rerum vero blanditiis culpa quas recusandae voluptatum, obcaecati illo, quod eum unde! Aperiam, quod!','philaset.jpg','phila_set'),(3,'rolls','Ролл Филадельфия','лосось, сливочный сыр',300,'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga mollitia libero cupiditate pariatur fugit suscipit rem rerum vero blanditiis culpa quas recusandae voluptatum, obcaecati illo, quod eum unde! Aperiam, quod!','phila.jpg','phila'),(4,'rolls','Ролл Калифорния','краб, огурец, масаго',200,'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga mollitia libero cupiditate pariatur fugit suscipit rem rerum vero blanditiis culpa quas recusandae voluptatum, obcaecati illo, quod eum unde! Aperiam, quod!','california.jpg','california'),(5,'sushi','Суши Лосось','лосось, рис',100,'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga mollitia libero cupiditate pariatur fugit suscipit rem rerum vero blanditiis culpa quas recusandae voluptatum, obcaecati illo, quod eum unde! Aperiam, quod!','salmon.jpg','salmon'),(6,'sushi','Суши Угорь','угорь, рис',110,'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga mollitia libero cupiditate pariatur fugit suscipit rem rerum vero blanditiis culpa quas recusandae voluptatum, obcaecati illo, quod eum unde! Aperiam, quod!','eel.jpg','eel');
/*!40000 ALTER TABLE `good` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sum` int(11) NOT NULL,
  `status` enum('Новый','Завершен') NOT NULL DEFAULT 'Новый',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`id`, `date`, `name`, `email`, `phone`, `address`, `sum`, `status`) VALUES (107,'2020-11-15 13:09:52','Игорь_1','ilg@mail.ru','+7126456789','Moscow',2400,'Завершен'),(112,'2020-12-02 16:47:15','Игорь','i@mail.ru','+777777777777','Moscow',950,'Новый'),(113,'2020-12-02 17:08:23','Игорь','i@mail.ru','+777777777777','Moscow',950,'Новый'),(115,'2020-12-02 17:38:06','Игорь','igor_test_2020@mail.ru','+777777777777','Moscow',300,'Новый'),(116,'2020-12-02 18:26:11','Игорь','i@mail.ru','+777777777777','Moscow',800,'Новый');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_good`
--

DROP TABLE IF EXISTS `order_good`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_good` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_good`
--

LOCK TABLES `order_good` WRITE;
/*!40000 ALTER TABLE `order_good` DISABLE KEYS */;
INSERT INTO `order_good` (`id`, `order_id`, `product_id`, `name`, `price`, `quantity`, `sum`) VALUES (1,12,1,'Сет Запеченный',800,1,800),(2,12,2,'Сет Филамикс',950,1,950),(3,12,3,'Ролл Филадельфия',300,2,600),(4,13,4,'Ролл Калифорния',200,2,400),(5,13,2,'Сет Филамикс',950,2,1900),(6,13,6,'Суши Угорь',110,1,110),(7,13,1,'Сет Запеченный',800,1,800),(8,13,3,'Ролл Филадельфия',300,5,1500),(9,14,2,'Сет Филамикс',950,1,950),(10,14,3,'Ролл Филадельфия',300,2,600),(11,15,5,'Суши Лосось',100,1,100),(12,15,6,'Суши Угорь',110,2,220),(13,16,2,'Сет Филамикс',950,1,950),(14,17,2,'Сет Филамикс',950,1,950),(15,17,3,'Ролл Филадельфия',300,1,300),(16,18,2,'Сет Филамикс',950,1,950),(17,19,2,'Сет Филамикс',950,1,950),(18,20,3,'Ролл Филадельфия',300,1,300),(19,21,3,'Ролл Филадельфия',300,1,300),(20,22,2,'Сет Филамикс',950,1,950),(21,23,3,'Ролл Филадельфия',300,1,300),(22,23,2,'Сет Филамикс',950,1,950),(23,24,2,'Сет Филамикс',950,1,950),(24,25,3,'Ролл Филадельфия',300,1,300),(25,26,3,'Ролл Филадельфия',300,1,300),(26,27,2,'Сет Филамикс',950,1,950),(27,28,3,'Ролл Филадельфия',300,1,300),(28,29,2,'Сет Филамикс',950,1,950),(29,30,1,'Сет Запеченный',800,2,1600),(30,31,2,'Сет Филамикс',950,1,950),(31,32,2,'Сет Филамикс',950,1,950),(32,33,1,'Сет Запеченный',800,1,800),(33,34,2,'Сет Филамикс',950,1,950),(34,35,3,'Ролл Филадельфия',300,1,300),(35,36,2,'Сет Филамикс',950,1,950),(36,37,1,'Сет Запеченный',800,1,800),(37,38,5,'Суши Лосось',100,1,100),(38,39,1,'Сет Запеченный',800,2,1600),(39,39,3,'Ролл Филадельфия',300,1,300),(40,40,2,'Сет Филамикс',950,1,950),(41,40,3,'Ролл Филадельфия',300,1,300),(42,110,2,'Сет Филамикс',950,2,1900),(43,110,3,'Ролл Филадельфия',300,1,300),(44,111,1,'Сет Запеченный',800,1,800),(45,111,5,'Суши Лосось',100,1,100),(46,111,4,'Ролл Калифорния',200,1,200),(47,112,2,'Сет Филамикс',950,1,950),(48,113,2,'Сет Филамикс',950,1,950),(49,114,1,'Сет Запеченный',800,1,800),(50,115,3,'Ролл Филадельфия',300,1,300),(51,116,1,'Сет Запеченный',800,1,800);
/*!40000 ALTER TABLE `order_good` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `is_admin`, `email`, `registration_date`) VALUES (1,'admin','$2y$13$OzahBu2mo8152R9lQdvagOXmQ3r26TENt42QjSDJFS2mReC16oUrC',NULL,1,'','2020-12-02 07:12:15'),(2,'demo','$2y$13$cakldcsmfadprIOWT5ocIueLc2QIBNjn0tr6p7uMUogNfZT8rGCkC',NULL,0,'','2020-12-02 07:12:15'),(3,'igor','$2y$13$TRswEUk28gt7jDwkqApUAOzwt9dbQNTLp28DhIZ4e51Yy6TX7Jsva',NULL,0,'igor_test@mail.ru','2020-12-02 07:34:25'),(4,'Nick','$2y$13$RafeAyy2qgbUMZZIHK2Qcu1rZdLD5WH1gGzMDgebtlmzb.2mFx2Ju',NULL,0,'nick@mail.ru','2020-12-02 12:05:50'),(5,'soyer','$2y$13$s2P8pYhMfsThtpdhcNJd/egvW8nOythP6PSIUc1jXAbQGq0DfBEe2','mu25buQRpijkTjPcDsyWz4UBkKL6_t_K',0,'tom@mail.ru','2020-12-02 14:55:40'),(6,'new','$2y$13$iROga9BXgs5O1AMzPbDBtuLFyPSzpWfNsaeLd6RJYu9GIxEszHJye','PLiFniNoOxch5dqtyQjGfEH6Rb8bx47L',0,'new@mail.ru','2020-12-02 15:25:23');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-03 11:56:03
