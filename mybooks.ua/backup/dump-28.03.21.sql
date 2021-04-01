-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: books-bd
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Андрей Богуславский'),(2,'Марк Саммерфильд'),(3,'М. Вильямс'),(4,'Уэс Маккинни'),(5,'Брюс Эккель'),(6,'Томас Кормен'),(7,'Чарльз Лейзерсон'),(8,'Рональд Ривест'),(9,'Клиффорд Штайн'),(10,'Дэвид Флэнаган'),(11,'Гэри Маклин Холл'),(12,'Джеймс Р. Грофф'),(13,'Люк Веллинг'),(14,'Сергей Мастицкий'),(15,'Джон Вудкок'),(16,'Джереми Блум'),(17,'А. Белов'),(18,'Сэмюэл Грингард'),(19,'Сет Гринберг'),(20,'Александр Сераков'),(21,'Тим Кедлек'),(22,'Пол Дейтел'),(23,'Харви Дейтел'),(24,'Роберт Мартин'),(25,'Энтони Грей'),(26,'Мартин Фаулер'),(27,'Прамодкумар Дж. Садаладж'),(28,'Джей Макгаврен'),(29,'Дрю Нейл'),(30,'Автор1'),(31,'Автор2'),(32,'Андрей Богуславский'),(33,'Форест Гамп'),(34,'Автор Мотивації'),(35,'Ментор Мотивації');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `sheets` int NOT NULL DEFAULT '0',
  `year_pub` int NOT NULL DEFAULT '0',
  `click_book` int NOT NULL DEFAULT '0',
  `click_get` int NOT NULL DEFAULT '0',
  `isbn` int DEFAULT NULL,
  `deleted` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА','Книга о програмировании на СИ',458,1999,5,1,NULL,NULL),(2,'Программирование на языке Go!','Книга о програмировании на СИ',444,2015,4,1,NULL,NULL),(3,'Толковый словарь сетевых терминов и аббревиатур','Книга о програмировании',356,2020,1,0,NULL,NULL),(4,'Python for Data Analysis','Книга о програмировании на СИ',458,2021,2,0,NULL,NULL),(5,'Thinking in Java (4th Edition)','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(6,'Introduction to Algorithms','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(7,'JavaScript Pocket Reference','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(8,'Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(9,'SQL: The Complete Reference','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(10,'PHP and MySQL Web Development','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(11,'Статистический анализ и визуализация данных с помощью R','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(12,'Computer Coding for Kid','Книга о програмировании на СИ',458,1999,1,0,NULL,NULL),(13,'Exploring Arduino: Tools and Techniques for Engineering Wizardry','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(14,'Программирование микроконтроллеров для начинающих и не только','Книга о програмировании на СИ',458,1999,1,0,NULL,NULL),(15,'The Internet of Things','Книга о програмировании на СИ',458,1999,1,0,NULL,NULL),(16,'Sketching User Experiences: The Workbook','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(17,'InDesign CS6','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(18,'Адаптивный дизайн. Делаем сайты для любых устройств','Книга о програмировании на СИ',458,1999,1,0,NULL,NULL),(19,'Android для разработчиков','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(20,'Clean Code: A Handbook of Agile Software Craftsmanship','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(21,'Swift Pocket Reference: Programming for iOS and OS X','Книга о програмировании на СИ',458,1999,0,0,NULL,NULL),(22,'NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence','Книга о програмировании на СИ',458,2014,0,0,NULL,NULL),(23,'Head First Ruby','Книга о програмировании на СИ',278,2014,0,0,NULL,NULL),(24,'Practical Vim','Книга о програмировании на СИ',111,2015,1,0,NULL,NULL),(34,'Мотиватор','Книга про мотивацію.',458,2015,1,0,NULL,NULL);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `sheets` int NOT NULL DEFAULT '0',
  `year_pub` int NOT NULL DEFAULT '0',
  `click_book` int NOT NULL DEFAULT '0',
  `click_get` int NOT NULL DEFAULT '0',
  `isbn` int DEFAULT NULL,
  `deleted` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА','Книга о програмировании на СИ','Андрей Богуславский',458,1999,0,0,NULL,NULL),(2,'Программирование на языке Go!','Книга о програмировании на СИ','Марк Саммерфильд',444,2015,0,0,NULL,NULL),(3,'Толковый словарь сетевых терминов и аббревиатур','Книга о програмировании','М. Вильямс',356,2020,0,0,NULL,NULL),(4,'Python for Data Analysis','Книга о програмировании на СИ','Уэс Маккинни',458,2021,0,0,NULL,NULL),(5,'Thinking in Java (4th Edition)','Книга о програмировании на СИ','Брюс Эккель',458,1999,0,0,NULL,NULL),(6,'Introduction to Algorithms','Книга о програмировании на СИ','Томас Кормен, Чарльз Лейзерсон, Рональд Ривест, Клиффорд Штайн',458,1999,0,0,NULL,NULL),(7,'JavaScript Pocket Reference','Книга о програмировании на СИ','Дэвид Флэнаган',458,1999,0,0,NULL,NULL),(8,'Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles','Книга о програмировании на СИ','Гэри Маклин Холл',458,1999,0,0,NULL,NULL),(9,'SQL: The Complete Reference','Книга о програмировании на СИ','Джеймс Р. Грофф',458,1999,0,0,NULL,NULL),(10,'PHP and MySQL Web Development','Книга о програмировании на СИ','Люк Веллинг',458,1999,0,0,NULL,NULL),(11,'Статистический анализ и визуализация данных с помощью R','Книга о програмировании на СИ','Сергей Мастицкий',458,1999,0,0,NULL,NULL),(12,'Computer Coding for Kid','Книга о програмировании на СИ','Джон Вудкок',458,1999,0,0,NULL,NULL),(13,'Exploring Arduino: Tools and Techniques for Engineering Wizardry','Книга о програмировании на СИ','Джереми Блум',458,1999,0,0,NULL,NULL),(14,'Программирование микроконтроллеров для начинающих и не только','Книга о програмировании на СИ','А. Белов',458,1999,0,0,NULL,NULL),(15,'The Internet of Things','Книга о програмировании на СИ','Сэмюэл Грингард',458,1999,0,0,NULL,NULL),(16,'Sketching User Experiences: The Workbook','Книга о програмировании на СИ','Сет Гринберг',458,1999,0,0,NULL,NULL),(17,'InDesign CS6','Книга о програмировании на СИ','Александр Сераков',458,1999,0,0,NULL,NULL),(18,'Адаптивный дизайн. Делаем сайты для любых устройств','Книга о програмировании на СИ','Тим Кедлек',458,1999,0,0,NULL,NULL),(19,'Android для разработчиков','Книга о програмировании на СИ','Пол Дейтел, Харви Дейтел',458,1999,0,0,NULL,NULL),(20,'Clean Code: A Handbook of Agile Software Craftsmanship','Книга о програмировании на СИ','Роберт Мартин',458,1999,0,0,NULL,NULL),(21,'Swift Pocket Reference: Programming for iOS and OS X','Книга о програмировании на СИ','Энтони Грей',458,1999,0,0,NULL,NULL),(22,'NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence','Книга о програмировании на СИ','Мартин Фаулер, Прамодкумар Дж. Садаладж',458,2014,0,0,NULL,NULL),(23,'Head First Ruby','Книга о програмировании на СИ','Джей Макгаврен',278,2014,0,0,NULL,NULL),(24,'Practical Vim','Книга о програмировании на СИ','Дрю Нейл',111,2015,0,0,NULL,NULL);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_authors`
--

DROP TABLE IF EXISTS `books_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books_authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author_id` int DEFAULT NULL,
  `book_id` int DEFAULT NULL,
  `deleted` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_authors`
--

LOCK TABLES `books_authors` WRITE;
/*!40000 ALTER TABLE `books_authors` DISABLE KEYS */;
INSERT INTO `books_authors` VALUES (1,1,1,NULL),(2,2,2,NULL),(3,3,3,NULL),(4,4,4,NULL),(5,5,5,NULL),(6,6,6,NULL),(7,6,6,NULL),(8,6,6,NULL),(9,6,6,NULL),(10,7,7,NULL),(11,8,8,NULL),(12,9,9,NULL),(13,10,10,NULL),(14,11,11,NULL),(15,12,12,NULL),(16,13,13,NULL),(17,14,14,NULL),(18,15,15,NULL),(19,16,16,NULL),(20,17,17,NULL),(21,18,18,NULL),(22,19,19,NULL),(23,19,19,NULL),(24,20,20,NULL),(25,21,21,NULL),(26,22,22,NULL),(27,22,22,NULL),(28,23,23,NULL),(29,24,24,NULL),(34,34,34,NULL),(35,35,34,NULL);
/*!40000 ALTER TABLE `books_authors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-28 22:25:01
