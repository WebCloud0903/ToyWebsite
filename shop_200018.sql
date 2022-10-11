-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: shop_200018
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `Cart_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Product_ID` varchar(20) NOT NULL,
  `Pro_img` varchar(255) NOT NULL,
  `Product_Name` varchar(20) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`Cart_ID`),
  KEY `Pro_ID_FK` (`Product_ID`),
  KEY `User_ID_FK` (`Username`),
  CONSTRAINT `Pro_ID_FK` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`),
  CONSTRAINT `User_ID_FK` FOREIGN KEY (`Username`) REFERENCES `customer` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Fullname` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Birthday` date NOT NULL,
  `Type` enum('Admin','User') NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES ('chinh','fdf2896ab138499292e4ad879874f68a','Nguyen Nhat Chinh','Chinhnn@gmail.com','Thanh Binh, Dong Thap City','0246715329','Male','2002-06-12','User'),('huuduy','645dee90ed81e5ff91fbaba13716e400','Do Huu Duy','duydhgcc200018@fpt.edu.vn','Long Ho, Vinh Long City','0931927908','Male','2002-07-10','Admin'),('kimnga123','eeb94d7c90028cd9aed4a4d298f1fd4d','Nguyen Thi Kim Nga','ngantk@gmail.com','Chau Thanh, Dong Thap City','0942718429','Female','1983-05-18','User'),('minh2002','b6797e0389287f8684ed0450afddeebe','Truong Quang Minh','minhtq@gmail.com','Can Tho City','0346715249','Male','2022-05-07','User');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderdetail` (
  `Order_ID` int(11) NOT NULL,
  `Product_ID` varchar(20) NOT NULL,
  `Pro_qty` int(11) NOT NULL,
  PRIMARY KEY (`Order_ID`,`Product_ID`),
  KEY `PID_FK` (`Product_ID`),
  CONSTRAINT `OrderID_FK` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`),
  CONSTRAINT `PID_FK` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdetail`
--

LOCK TABLES `orderdetail` WRITE;
/*!40000 ALTER TABLE `orderdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `OrderDate` date NOT NULL,
  `DeliveryDate` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Order_ID`),
  KEY `User_FK` (`Username`),
  CONSTRAINT `User_FK` FOREIGN KEY (`Username`) REFERENCES `customer` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `Product_ID` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `Pro_img` varchar(255) DEFAULT NULL,
  `Pro_detail` text DEFAULT NULL,
  `Status` enum('Stocking','Out of stock') NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('P01','Balencia Black',20,'2.000.000','Balencia-black.jpg','The product made in Vietnamese at Huu Duy company. Sport shoe with high material,                    create a feeling of comfort for the user\'s feet. 12 months warranty.','Stocking'),('P02','Balencia White',20,'2.000.000','Balencia-white.jpg','The product made in Vietnamese at Huu Duy company. Sport shoe with high material,                    create a feeling of comfort for the user\'s feet. 12 months warranty.','Stocking'),('P03','Converse Red',30,'1.500.000','Converse-red.jpg','The product made in Vietnamese at Huu Duy company. Sport shoe with high material,                    create a feeling of comfort for the user\'s feet. 12 months warranty.','Stocking'),('P04','Converse Yellow',30,'1.500.000','Converse-yellow.jpg','The product made in Vietnamese at Huu Duy company. Sport shoe with high material,                    create a feeling of comfort for the user\'s feet. 12 months warranty.','Stocking'),('P05','Nike Air Force 1',25,'2.500.000','Nike-Air-1.jpg','The product made in Vietnamese at Huu Duy company. Sport shoe with high material,                    create a feeling of comfort for the user\'s feet. 12 months warranty.','Stocking'),('P06','Nike Air Jodan 2',25,'2.500.000','Nike-air-jodan.jpg','The product made in Vietnamese at Huu Duy company. Sport shoe with high material,                    create a feeling of comfort for the user\'s feet. 12 months warranty.','Stocking'),('P07','Vans Caro',15,'1.200.000','Vans-caro.jpg','The product made in Vietnamese at Huu Duy company. Sport shoe with high material,                    create a feeling of comfort for the user\'s feet. 12 months warranty.','Stocking'),('P08','Vans Navy',15,'1.200.000','Vans-navy.jpg','The product made in Vietnamese at Huu Duy company. Sport shoe with high material,                    create a feeling of comfort for the user\'s feet. 12 months warranty.','Stocking');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-09 11:39:15
