-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 21, 2021 lúc 09:45 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db2007g2`
--
CREATE DATABASE IF NOT EXISTS `db2007g2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db2007g2`;

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `admin_insert` (IN `UserName` VARCHAR(50), IN `Password` VARCHAR(50), IN `AdminName` VARCHAR(50))  BEGIN 
	INSERT INTO admin(UserName,Password,AdminName)
		VALUES(UserName,Password,AdminName);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `admin_update` (IN `UserName` VARCHAR(50), IN `Password` VARCHAR(50))  BEGIN 
	UPDATE Admin SET Password = Password
		WHERE UserName = UserName;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Award_Insert` (IN `AwardName_Ip` VARCHAR(50), IN `AwardTitle_Ip` VARCHAR(50), IN `AwardInfo_Ip` VARCHAR(50), IN `AwardType_Ip` VARCHAR(50), IN `Description_Ip` VARCHAR(50))  BEGIN
	INSERT INTO Galery(AwardName,AwardTitle,AwardInfo,AwardType,Description)
		VALUES(AwardName_Ip,AwardTitle_Ip,AwardInfo_Ip,AwardType_Ip,Description_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CateringDescriptions_update` (IN `CateringName_Ip` VARCHAR(50), IN `Descriptions_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET Descriptions = Descriptions_Ip
		WHERE CateringName = CateringName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CateringInfo_update` (IN `CateringName_Ip` VARCHAR(50), IN `CateringInfo_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET CateringInfo = CateringInfo_Ip
		WHERE CateringName = CateringName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CateringPrice_update` (IN `CateringName_Ip` VARCHAR(50), IN `CateringPrice_Ip` INT)  BEGIN 
	UPDATE Images SET CateringPrice = CateringPrice_Ip
		WHERE CateringName = CateringName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CateringType_update` (IN `CateringName_Ip` VARCHAR(50), IN `CateringType_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET CateringType = CateringType_Ip
		WHERE CateringName = CateringName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Catering_Delete` (IN `CateringName_Ip` VARCHAR(50))  BEGIN
	DELETE FROM Catering
		WHERE CateringName = CateringName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Catering_Insert` (IN `CateringName_Ip` VARCHAR(50), IN `CateringInfo_Ip` VARCHAR(50), IN `CateringType_Ip` VARCHAR(50), IN `CateringPrice_Ip` VARCHAR(50), IN `Description_Ip` VARCHAR(50))  BEGIN
	INSERT INTO Galery(CateringName,CateringInfo,CateringType,CateringPrice,Description)
		VALUES(CateringName_Ip,CateringInfo_Ip,CateringType_Ip,CateringPrice_Ip,Description_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Contact_Insert` (IN `FullName_Ip` VARCHAR(50), IN `Email_Ip` VARCHAR(50), IN `Subject_Ip` VARCHAR(50), IN `Message_Ip` VARCHAR(50), IN `Description_Ip` VARCHAR(50))  BEGIN
	INSERT INTO Galery(FullName,Email,Subject,Message,Description)
		VALUES(FullName_Ip,Email_Ip,Subject_Ip,Message_Ip,Description_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `FeedbackDescription_update` (IN `NameFeedBack_Ip` VARCHAR(50), IN `Description_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET Description = Description_Ip
		WHERE NameFeedBack = NameFeedBack_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Feedback_Insert` (IN `FeedBackDetail_Ip` VARCHAR(50), IN `DayFeedBac_Ip` DATE, IN `NameFeedBack_Ip` VARCHAR(50), IN `Description_Ip` VARCHAR(50))  BEGIN
	INSERT INTO Galery(FeedBackDetail,DayFeedBac,NameFeedBack,Description)
		VALUES(FeedBackDetail_Ip,DayFeedBac_Ip,NameFeedBack_Ip,Description_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GaleryInfo_update` (IN `GaleryName_Ip` VARCHAR(50), IN `GaleryInfo_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET galeryInfo = GaleryInfo_Ip
		WHERE GaleryName = GaleryName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GaleryName_update` (IN `GaleryName_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET GaleryName = GaleryName_Ip
		WHERE GaleryName = GaleryName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GaleryTitle_update` (IN `GaleryName_Ip` VARCHAR(50), IN `GaleryTitle_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET GaleryTitle = GaleryTitle_Ip
		WHERE GaleryName = GaleryName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GaleryTypeDescription_update` (IN `GaleryName_Ip` VARCHAR(50), IN `Description_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET Description = Description_Ip
		WHERE GaleryName = GaleryName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GaleryType_update` (IN `GaleryName_Ip` VARCHAR(50), IN `GaleryType_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET galeryType = GaleryType_Ip
		WHERE GaleryName = GaleryName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Galery_Delete` (IN `GaleryName_Ip` VARCHAR(50))  BEGIN
	DELETE FROM Galery
		WHERE GaleryName = GaleryName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Galery_Insert` (IN `GaleryName_Ip` VARCHAR(50), IN `GaleryTitle_Ip` VARCHAR(50), IN `GaleryInfo_Ip` VARCHAR(50), IN `GaleryType_Ip` VARCHAR(50), IN `Description_Ip` VARCHAR(50))  BEGIN
	INSERT INTO Galery(GaleryName,GaleryTitle,GaleryInfo,GaleryType,Description)
		VALUES(GaleryName_Ip,GaleryTitle_Ip,GaleryInfo_Ip,GaleryType_Ip,Description_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ImagesAlt_update` (IN `ImageName_Ip` VARCHAR(50), IN `ImageAlt_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET ImageAlt = ImageAlt_Ip
		WHERE ImageName = ImageName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ImagesDescription__update` (IN `ImageName_Ip` VARCHAR(50), IN `Description_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET Description = Description_Ip
		WHERE ImageName = ImageName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ImagesName_update` (IN `ImagePath_Ip` VARCHAR(50), IN `ImageName_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET ImageName = ImageName
		WHERE ImagePath = ImagePath_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ImagesPath_update` (IN `ImageName_Ip` VARCHAR(50), IN `ImagePath_Ip` VARCHAR(50))  BEGIN 
	UPDATE Images SET ImagePath = ImagePath_Ip
		WHERE ImageName = ImageName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Images_Delete` (IN `ImageName_Ip` VARCHAR(50))  BEGIN
	DELETE FROM Images
		WHERE ImageName = ImageName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Images_insert` (IN `ImagePath_Ip` VARCHAR(50), IN `ImageName_Ip` VARCHAR(50), IN `ImageAlt_Ip` VARCHAR(50), IN `Description_Ip` VARCHAR(50))  BEGIN
	INSERT INTO images(ImagePath,ImageName,ImageAlt,Description)
		VALUES(ImagePath_Ip,ImageName_Ip,ImageAlt_Ip,Description_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MealDescription_update` (IN `MealName_Ip` VARCHAR(100), IN `Description_Ip` VARCHAR(100))  BEGIN 
	UPDATE Meal SET Description = Description_Ip
		WHERE MealName = MealName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MealImage_update` (IN `MealName_Ip` VARCHAR(100), IN `image_Ip` VARCHAR(100))  BEGIN 
	UPDATE Meal SET image = image_Ip
		WHERE MealName = MealName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MealInfo_update` (IN `MealName_Ip` VARCHAR(100), IN `MealInfo_Ip` VARCHAR(100))  BEGIN 
	UPDATE Meal SET MealInfo = MealInfo_Ip
		WHERE MealName = MealName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MealPrice_update` (IN `MealName_Ip` VARCHAR(100), IN `Price_Ip` INT)  BEGIN 
	UPDATE Meal SET Price = Price_Ip
		WHERE MealName = MealName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Meal_Delete` (IN `MealName_Ip` VARCHAR(100))  BEGIN
	DELETE FROM meal
		WHERE MealName = MealName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Meal_insert` (IN `MealName_Ip` VARCHAR(100), IN `MealInfo_Ip` VARCHAR(100), IN `Price_Ip` INT, IN `image_Ip` VARCHAR(100), IN `MealType_Ip` VARCHAR(100), IN `Description_Ip` VARCHAR(100))  BEGIN
	INSERT INTO meal(MealName,MealInfo,Price,image,MealType,Description)
		VALUES(MealName_Ip,MealInfo_Ip,Price_Ip,image_Ip,MealType_Ip,Description_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Meal_SelectByName` (IN `MealName_Ip` VARCHAR(100))  BEGIN
	SELECT MealName,MealInfo,Price
		FROM Meal
			WHERE MealName = MealName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Meal_SelectByType` (IN `MealType_Ip` VARCHAR(100))  BEGIN
	SELECT MealName,MealInfo,Price
		FROM Meal
			WHERE MealType = MealType_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RecipeDescription_update` (IN `RecipeName_Ip` VARCHAR(100), IN `Description_Ip` VARCHAR(10000))  BEGIN
	UPDATE recipe SET Description = Description_Ip
		WHERE RecipeName = RecipeName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RecipeInfo_update` (IN `RecipeName_Ip` VARCHAR(100), IN `RecipeInfo_Ip` VARCHAR(10000))  BEGIN
	UPDATE recipe SET RecipeInfo = RecipeInfo_Ip
		WHERE RecipeName = RecipeName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RecipeIsRecipeMonth_update` (IN `RecipeName_Ip` VARCHAR(100), IN `IsRecipeMonth_Ip` TINYINT)  BEGIN
	UPDATE recipe SET IsRecipeMonth = IsRecipeMonth_Ip
		WHERE RecipeName = RecipeName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Recipe_Delete` (IN `RecipeName_Ip` VARCHAR(100))  BEGIN
	DELETE FROM Recipe
		WHERE RecipeName = RecipeName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Recipe_insert` (IN `RecipeName_Ip` VARCHAR(100), IN `RecipeInfo_Ip` VARCHAR(10000), IN `Description_Ip` VARCHAR(100))  BEGIN
	INSERT INTO recipe(RecipeName,RecipeInfo,Description)
		VALUES(RecipeName_Ip,RecipeInfo_Ip,Description_Ip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Recipe_SelectByName` (IN `RecipeName_Ip` VARCHAR(100))  BEGIN
	SELECT RecipeName,RecipeInfo
		FROM Meal
			WHERE RecipeName = RecipeName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reservation_Delete` (IN `ReservationName` VARCHAR(50))  BEGIN
	DELETE FROM reservation
		WHERE ReservationName = ReservationName_Ip;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reservation_insert` (IN `ReservationName` VARCHAR(50), IN `ReservationEmail` VARCHAR(50), IN `ReservationPhone` VARCHAR(50), IN `ReservationDate` VARCHAR(50), IN `ReservationTime` VARCHAR(50), IN `ReservationPerson` VARCHAR(50))  BEGIN 
	INSERT INTO admin(UserName,Password,AdminName)
		VALUES(UserName,Password,AdminName);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AdminId`, `Username`, `Password`) VALUES
(3, 'chiendev111', '$2y$10$pXgbjSqbNTa46f1BjrJBQ.AZl66E5FCbYmdjyqx7aJAR7lmdGq7iy'),
(4, 'admin', '$2y$10$nSWsoGW9S/8x/uaVP2NJc.N44SeS.LxTMlWSJherLHVYzrHyHsCOO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `award`
--

CREATE TABLE `award` (
  `AwardId` int(11) NOT NULL,
  `AwardName` varchar(50) DEFAULT NULL,
  `AwardTitle` varchar(50) DEFAULT NULL,
  `AwardInfo` varchar(50) DEFAULT NULL,
  `AwardType` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catering`
--

CREATE TABLE `catering` (
  `CateringId` int(11) NOT NULL,
  `CateringName` varchar(50) DEFAULT NULL,
  `CateringInfo` varchar(50) DEFAULT NULL,
  `CateringType` varchar(50) DEFAULT NULL,
  `CateringPrice` int(11) DEFAULT NULL,
  `Descriptions` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configuration`
--

CREATE TABLE `configuration` (
  `ConfigurationId` int(11) NOT NULL,
  `ConfigurationKey` varchar(50) DEFAULT NULL,
  `ConfigurationValue` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `ContactId` int(11) NOT NULL,
  `FullName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` int(50) DEFAULT NULL,
  `Message` varchar(100) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`ContactId`, `FullName`, `Email`, `Phone`, `Message`, `Description`) VALUES
(1, 'Burger', 'beo73kg@gmail.com', 934757161, '', NULL),
(2, 'Burger', 'beo73kg@gmail.com', 934757161, '', NULL),
(3, 'Burger', 'beo73kg@gmail.com', 934757161, '', NULL),
(4, 'Burger', 'beo73kg@gmail.com', 934757161, '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackId` int(11) NOT NULL,
  `MealId` int(11) DEFAULT NULL,
  `FBPhone` int(50) DEFAULT NULL,
  `FBDate` varchar(50) DEFAULT NULL,
  `FBName` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `FBComment` varchar(500) DEFAULT NULL,
  `FBEmail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`FeedbackId`, `MealId`, `FBPhone`, `FBDate`, `FBName`, `Description`, `FBComment`, `FBEmail`) VALUES
(4, NULL, 0, '0000-00-00', 'Burger', NULL, '', '0934757161'),
(5, NULL, 0, '0000-00-00', 'Burger', NULL, 'abc', '0934757161'),
(6, NULL, 0, '0000-00-00', 'Đức huy', NULL, '', '0934757161'),
(7, NULL, 934757161, '12/5/2021', 'Đức huy', NULL, '', 'beo73kg@gmail.com'),
(8, NULL, 934757161, '12/5/2021', 'Đức huy', NULL, '', 'beo73kg@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `GaleryId` int(11) NOT NULL,
  `GaleryName` varchar(50) DEFAULT NULL,
  `GaleryTitle` varchar(50) DEFAULT NULL,
  `GaleryInfo` varchar(50) DEFAULT NULL,
  `GaleryType` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `ImageId` int(11) NOT NULL,
  `GaleryId` int(11) DEFAULT NULL,
  `ImagePath` varchar(50) DEFAULT NULL,
  `ImageName` varchar(50) DEFAULT NULL,
  `ImageAlt` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `meal`
--

CREATE TABLE `meal` (
  `MealId` int(11) NOT NULL,
  `MealName` varchar(100) DEFAULT NULL,
  `MealInfo` varchar(200) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `MealType` varchar(100) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `meal`
--

INSERT INTO `meal` (`MealId`, `MealName`, `MealInfo`, `Price`, `MealType`, `Image`) VALUES
(128, 'Beetroot Cured Salmon', 'Beetroot,salmon,cucumber,apple salad', 20, 'Lunch', 'uploaded/aa2Bbb5324-beetroot-cured-salmon-with-cucumber-and-apple-salad-40115-2.jpg'),
(129, 'Grilled Beef with potatoes', 'Meat, Potatoes, Rice, Tomatoe', 30, 'Regular', 'uploaded/21b829b802-breakfast-1.jpg'),
(130, 'Grilled Crab with Onion', 'Meat, Potatoes, Rice, Tomatoe', 50, 'Regular', 'uploaded/18B36d5A28-breakfast-2.jpg'),
(131, 'Crisp Pork Belly', 'Crisp, Pork, Bellyblack, Bean Sauce', 15, 'Lunch', 'uploaded/bA9b27d051-crisp-pork-belly-with-black-bean-sauce-46576-2.jpg'),
(132, 'Chargrilled Prawn', 'Prawn, Asparagus Skewers, burnt Orange', 60, 'Lunch', 'uploaded/9722205671-chargrilled-prawn-and-asparagus-skewers-with-burnt-orange-13957-1.jpg'),
(133, 'Chilli Soy Prawns with Ponzu Aioli', 'Chilli, Soy, Prawns, Ponzu Aioli', 70, 'Regular', 'uploaded/bd08401A47-chilli-soy-prawns-with-ponzu-aioli-14206-1.jpg'),
(134, 'Apple and ginger crumble pie', 'Apple,ginger,crumble pie', 10, 'Snacks', 'uploaded/7b5011A5Aa-apple-and-ginger-crumble-pie-29026-2.jpg'),
(135, 'Caramel Apple Pies', 'Caramel,Apple Pies', 12, 'Snacks', 'uploaded/988aa24b71-caramel-apple-pies-32153-2.jpg'),
(136, 'Adam Liaw\'s Green tea ice cream', 'Green tea,matcha powder, ice cream', 8, 'Snacks', 'uploaded/a25bB1ab1b-green-tea-ice-cream-15762-2.jpg'),
(137, 'Crispy tofu brown rice', 'Crispy tofu, brown rice, nori wraps, pickled cucumber', 22, 'Desserts', 'uploaded/51acd8B004-crispy-tofu-brown-rice-nori-wraps-with-pickled-cucumber-42360-2.jpg'),
(138, 'Matt Wilkinson\'s healthy edamame and crab soup', 'Edamame, crab soup', 15, 'Desserts', 'uploaded/32347aB010-edamame-and-crab-soup-47437-2.jpg'),
(139, 'Ginger miso with Chilli Beef', 'Ginger,miso, chilli beef', 25, 'Desserts', 'uploaded/1d5B029B64-ginger-miso-with-chilli-beef-32147-2.jpg'),
(140, 'Dr. Loosen Bernkasteler', 'Lay Riesling Kabinett, 2021, Mosel, Germany', 35, 'Beverages', 'uploaded/b0c75aB025-1b-148809-1.jpg'),
(141, 'Jamsheed Harem Le Blanc', 'Jamsheed Harem Le Blanc Plonk, 2021, Upper Goulburn, Victoria', 28, 'Beverages', 'uploaded/b21d9c801b-drink-7.jpg'),
(142, 'Mac Forbes Spring Riesling', 'Mac Forbes Spring Riesling, 2021, Yarra Valley', 27, 'Beverages', 'uploaded/B7732Bd333-drink-4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recipe`
--

CREATE TABLE `recipe` (
  `RecipeId` int(11) NOT NULL,
  `MealId` int(11) DEFAULT NULL,
  `RecipeName` varchar(100) DEFAULT NULL,
  `RecipeInfo` varchar(10000) DEFAULT NULL,
  `IsRecipeMonth` tinyint(4) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservation`
--

CREATE TABLE `reservation` (
  `ReservationId` int(11) NOT NULL,
  `ReservationName` varchar(50) DEFAULT NULL,
  `ReservationEmail` varchar(50) DEFAULT NULL,
  `ReservationPhone` int(11) DEFAULT NULL,
  `ReservationDate` varchar(50) DEFAULT NULL,
  `ReservationTime` varchar(50) DEFAULT NULL,
  `ReservationPerson` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `reservation`
--

INSERT INTO `reservation` (`ReservationId`, `ReservationName`, `ReservationEmail`, `ReservationPhone`, `ReservationDate`, `ReservationTime`, `ReservationPerson`) VALUES
(1, 'QuôC Chiến', 'dannychien1995@gmail.com', 394777901, '0000-00-00', '12:30am', '1'),
(2, 'QuôC Chiến', 'dannychien1995@gmail.com', 394777901, '0000-00-00', '12:30am', '3'),
(3, 'QuôC Chiến', 'dannychien1995@gmail.com', 394777901, '5/24/2021', '1:00am', '4+'),
(4, 'Đức huy', 'beo73kg@gmail.com', 934757161, '5/21/2021', '12:30am', '3'),
(5, 'Đức huy', 'beo73kg@gmail.com', 934757161, '5/21/2021', '12:30am', '3'),
(6, 'Đức huy', 'beo73kg@gmail.com', 934757161, '5/21/2021', '12:30am', '3'),
(7, 'Đức huy', 'beo73kg@gmail.com', 934757161, '5/20/2021', '12:30am', '2'),
(8, 'Đức huy', 'beo73kg@gmail.com', 934757161, '5/21/2021', '12:30am', '2'),
(9, 'Đức huy', 'beo73kg@gmail.com', 934757161, '5/20/2021', '12:30am', '2'),
(10, 'Burger', 'beo73kg@gmail.com', 934757161, '5/20/2021', '1:00am', '4+'),
(11, 'Burger', 'beo73kg@gmail.com', 934757161, '5/20/2021', '1:00am', '4+'),
(12, 'Đức huy', 'beo73kg@gmail.com', 934757161, '5/10/2021', '12:00am', '3'),
(13, 'Đức huy', 'beo73kg@gmail.com', 934757161, '5/21/2021', '12:30am', '2');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`) USING BTREE;

--
-- Chỉ mục cho bảng `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`AwardId`) USING BTREE;

--
-- Chỉ mục cho bảng `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`CateringId`) USING BTREE;

--
-- Chỉ mục cho bảng `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`ConfigurationId`) USING BTREE;

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactId`) USING BTREE;

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackId`) USING BTREE,
  ADD KEY `FK_Meal_FeedBack` (`MealId`);

--
-- Chỉ mục cho bảng `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`GaleryId`) USING BTREE;

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageId`) USING BTREE,
  ADD KEY `FK_Images_Galery` (`GaleryId`) USING BTREE;

--
-- Chỉ mục cho bảng `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`MealId`) USING BTREE;

--
-- Chỉ mục cho bảng `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`RecipeId`) USING BTREE,
  ADD KEY `FK_Meal_Recipe` (`MealId`);

--
-- Chỉ mục cho bảng `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationId`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `award`
--
ALTER TABLE `award`
  MODIFY `AwardId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `catering`
--
ALTER TABLE `catering`
  MODIFY `CateringId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `configuration`
--
ALTER TABLE `configuration`
  MODIFY `ConfigurationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `ImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `meal`
--
ALTER TABLE `meal`
  MODIFY `MealId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT cho bảng `recipe`
--
ALTER TABLE `recipe`
  MODIFY `RecipeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_Meal_FeedBack` FOREIGN KEY (`MealId`) REFERENCES `meal` (`MealId`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_Images_Galery` FOREIGN KEY (`GaleryId`) REFERENCES `galery` (`GaleryId`);

--
-- Các ràng buộc cho bảng `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `FK_Meal_Recipe` FOREIGN KEY (`MealId`) REFERENCES `meal` (`MealId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
