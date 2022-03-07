-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 21, 2021 lúc 06:10 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

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
(3, 'chiendev111', '$2y$10$pXgbjSqbNTa46f1BjrJBQ.AZl66E5FCbYmdjyqx7aJAR7lmdGq7iy');

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
  `Subject` varchar(50) DEFAULT NULL,
  `Message` varchar(100) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackId` int(11) NOT NULL,
  `MealId` int(11) DEFAULT NULL,
  `FeedBackDetail` varchar(50) DEFAULT NULL,
  `DayFeedBack` date DEFAULT NULL,
  `NameFeedBack` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(124, '1123', '21312', 123213, 'lunch', 'uploaded/A28cBb402b-Screenshot (43).png'),
(126, 'banh mi xuc xich', 'okoko', 123213, 'Beverages', 'uploaded/52Ab80919A-Screenshot (42).png'),
(127, 'Polar Romper', 'okoko', 123, 'Lunch', 'uploaded/5A59a363cb-Capture.PNG');

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
(3, 'QuôC Chiến', 'dannychien1995@gmail.com', 394777901, '5/24/2021', '1:00am', '4+');

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
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `ImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `meal`
--
ALTER TABLE `meal`
  MODIFY `MealId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `recipe`
--
ALTER TABLE `recipe`
  MODIFY `RecipeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
