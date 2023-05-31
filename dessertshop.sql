-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 
-- 伺服器版本： 8.0.17
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `dessertshop`
--
CREATE DATABASE IF NOT EXISTS `dessertshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `dessertshop`;

-- --------------------------------------------------------

--
-- 資料表結構 `dessert`
--

CREATE TABLE `dessert` (
  `D_NAME` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int(10) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `dessert`
--

INSERT INTO `dessert` (`D_NAME`, `price`, `category`) VALUES
('可可大理石蛋糕', 60, '蛋糕'),
('提拉米蘇', 80, '蛋糕'),
('榛果巧克力熔岩軟餅乾', 45, '餅乾'),
('法式咖啡達克瓦茲', 70, '餅乾'),
('法式沙布列果醬餅乾', 35, '餅乾'),
('法式焦糖烤布雷', 50, '布丁'),
('法式軟芯巧克力塔', 45, '塔'),
('波本楓糖起士蛋糕', 70, '蛋糕'),
('焦糖布丁燒', 35, '布丁'),
('美式檸檬塔', 50, '塔'),
('美式酥皮布朗尼', 50, '蛋糕'),
('藏雪戚風蛋糕', 85, '蛋糕');

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE `employee` (
  `E_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `E_NAME` varchar(10) NOT NULL,
  `worktime` int(10) NOT NULL,
  `salary` int(10) NOT NULL,
  `S_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `employee`
--

INSERT INTO `employee` (`E_ID`, `E_NAME`, `worktime`, `salary`, `S_ID`) VALUES
('E_001', 'Will', 32, 34800, 'S001'),
('E_002', 'Jack', 30, 29800, 'S002'),
('E_003', 'Abigail', 12, 23000, 'S003'),
('E_004', 'Lecter', 32, 34800, 'S001'),
('E_005', 'Beverly', 20, 24000, 'S002'),
('E_006', 'Freddie', 28, 25500, 'S003'),
('E_007', 'Alana', 26, 31100, 'S002'),
('E_008', 'Chilton', 26, 25500, 'S003');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `D_NAME` varchar(10) NOT NULL,
  `S_ID` varchar(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`D_NAME`, `S_ID`, `quantity`) VALUES
('可可大理石蛋糕', 'S001', 15),
('提拉米蘇', 'S002', 40),
('榛果巧克力熔岩軟餅乾', 'S002', 40),
('榛果巧克力熔岩軟餅乾', 'S003', 40),
('法式咖啡達克瓦茲', 'S003', 50),
('法式沙布列果醬餅乾', 'S001', 50),
('法式焦糖烤布雷', 'S002', 30),
('法式焦糖烤布雷', 'S003', 25),
('法式軟芯巧克力塔', 'S001', 30),
('法式軟芯巧克力塔', 'S002', 30),
('法式軟芯巧克力塔', 'S003', 25),
('波本楓糖起士蛋糕', 'S001', 10),
('波本楓糖起士蛋糕', 'S003', 25),
('焦糖布丁燒', 'S001', 40),
('美式檸檬塔', 'S002', 25),
('美式酥皮布朗尼', 'S001', 30),
('美式酥皮布朗尼', 'S003', 40),
('藏雪戚風蛋糕', 'S003', 10);

-- --------------------------------------------------------

--
-- 資料表結構 `recipe`
--

CREATE TABLE `recipe` (
  `I_ID` int(10) NOT NULL,
  `D_NAME` varchar(15) NOT NULL,
  `ingredient` varchar(10) NOT NULL,
  `weight` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `recipe`
--

INSERT INTO `recipe` (`I_ID`, `D_NAME`, `ingredient`, `weight`) VALUES
(1, '法式軟芯巧克力塔', '中筋麵粉', '125g'),
(2, '法式軟芯巧克力塔', '杏仁粉', '15g'),
(3, '法式軟芯巧克力塔', '純糖粉', '50g'),
(4, '法式軟芯巧克力塔', '無鹽奶油', '70g'),
(5, '法式軟芯巧克力塔', '全蛋液', '25g'),
(6, '法式軟芯巧克力塔', '鮮奶油', '220g'),
(7, '法式軟芯巧克力塔', '苦甜巧克力', '200g'),
(8, '美式檸檬塔', '消化餅', '134g'),
(9, '美式檸檬塔', '糖', '8g'),
(10, '美式檸檬塔', '無鹽奶油', '54g'),
(11, '美式檸檬塔', '檸檬皮', '1.2g'),
(12, '美式檸檬塔', '蛋黃', '30g'),
(13, '美式檸檬塔', '煉乳', '178g'),
(14, '法式焦糖烤布雷', '牛奶', '75g'),
(15, '法式焦糖烤布雷', '鮮奶油', '75g'),
(16, '法式焦糖烤布雷', '香草莢', '5g'),
(17, '法式焦糖烤布雷', '蛋黃', '35g'),
(18, '法式焦糖烤布雷', '糖', '15g'),
(19, '可可大理石蛋糕', '奶油', '100g'),
(20, '可可大理石蛋糕', '純糖粉', '100g'),
(21, '可可大理石蛋糕', '中大型蛋', '80g'),
(22, '可可大理石蛋糕', '香草精', '1.3g'),
(23, '可可大理石蛋糕', '蜂蜜', '9g'),
(24, '可可大理石蛋糕', '中筋麵粉', '110g'),
(25, '可可大理石蛋糕', '可可粉', '9g'),
(26, '焦糖布丁燒', '砂糖', '60g'),
(27, '焦糖布丁燒', '水', '30g'),
(28, '焦糖布丁燒', '溫牛奶', '320g'),
(29, '焦糖布丁燒', '砂糖', '50g'),
(30, '焦糖布丁燒', '全蛋', '150g'),
(31, '焦糖布丁燒', '低筋麵粉', '30g'),
(32, '提拉米蘇', '蛋黃', '40g'),
(33, '提拉米蘇', '細砂糖', '53g'),
(34, '提拉米蘇', '馬斯卡邦起司', '340g'),
(35, '提拉米蘇', '蘭姆酒', '30g'),
(36, '提拉米蘇', '手指餅乾', '100g'),
(37, '提拉米蘇', '濃縮咖啡', '100g'),
(38, '波本楓糖起士蛋糕', '無鹽奶油', '20g'),
(39, '波本楓糖起士蛋糕', '消化餅乾', '65g'),
(40, '波本楓糖起士蛋糕', '鮮奶油', '30g'),
(41, '波本楓糖起士蛋糕', '奶油乳酪', '100g'),
(42, '波本楓糖起士蛋糕', '馬斯卡邦起士', '80g'),
(43, '波本楓糖起士蛋糕', '楓糖漿', '40g'),
(44, '波本楓糖起士蛋糕', '波本威士忌', '3g'),
(45, '美式酥皮布朗尼', '無鹽奶油', '85g'),
(46, '美式酥皮布朗尼', '苦甜巧克力', '100g'),
(47, '美式酥皮布朗尼', '無糖可可粉', '15g'),
(48, '美式酥皮布朗尼', '細砂糖', '100g'),
(49, '美式酥皮布朗尼', '黑糖', '50g'),
(50, '美式酥皮布朗尼', '香草精', '8g'),
(51, '美式酥皮布朗尼', '蛋', '80g'),
(52, '美式酥皮布朗尼', '中筋麵粉', '40g'),
(53, '藏雪戚風蛋糕', '蛋黃', '50g'),
(54, '藏雪戚風蛋糕', '細砂糖', '50g'),
(55, '藏雪戚風蛋糕', '無鹽奶油', '32g'),
(56, '藏雪戚風蛋糕', '全脂牛奶', '32g'),
(57, '藏雪戚風蛋糕', '低筋麵粉', '40g'),
(58, '藏雪戚風蛋糕', '無鋁泡打粉', '0.8g'),
(59, '藏雪戚風蛋糕', '鮮奶油', '150g'),
(60, '藏雪戚風蛋糕', '糖粉', '20g'),
(61, '榛果巧克力熔岩軟餅乾', '無鹽奶油', '120g'),
(62, '榛果巧克力熔岩軟餅乾', '黑糖', '60g'),
(63, '榛果巧克力熔岩軟餅乾', '細砂糖', '50g'),
(64, '榛果巧克力熔岩軟餅乾', '香草精', '5g'),
(65, '榛果巧克力熔岩軟餅乾', '中筋麵粉', '175g'),
(66, '榛果巧克力熔岩軟餅乾', '烘焙小蘇打粉', '2.8g'),
(67, '榛果巧克力熔岩軟餅乾', '鹽', '1.5g'),
(68, '榛果巧克力熔岩軟餅乾', '苦甜巧克力', '40g'),
(69, '法式咖啡達克瓦茲', '糖粉', '10g'),
(70, '法式咖啡達克瓦茲', '中筋麵粉', '8g'),
(71, '法式咖啡達克瓦茲', '即溶咖啡', '1g'),
(72, '法式咖啡達克瓦茲', '熱水', '4g'),
(73, '法式咖啡達克瓦茲', '蛋黃', '50g'),
(74, '法式咖啡達克瓦茲', '細砂糖', '45g'),
(75, '法式咖啡達克瓦茲', '冷水', '20g'),
(76, '法式咖啡達克瓦茲', '無鹽奶油', '80g'),
(77, '法式沙布列果醬餅乾', '中筋麵粉', '100g'),
(78, '法式沙布列果醬餅乾', '無鹽奶油', '60g'),
(79, '法式沙布列果醬餅乾', '糖粉', '30g'),
(80, '法式沙布列果醬餅乾', '杏仁粉', '13g'),
(81, '法式沙布列果醬餅乾', '蛋', '20g'),
(82, '法式沙布列果醬餅乾', '果醬', '80g');

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `S_ID` varchar(10) NOT NULL,
  `S_NAME` varchar(10) NOT NULL,
  `address` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `shop`
--

INSERT INTO `shop` (`S_ID`, `S_NAME`, `address`, `phone`) VALUES
('S001', '中正店', '台北市中正區中正街1號', '02-23445644'),
('S002', '輔大店', '新北市新莊區三泰路35號', '02-22798843'),
('S003', '板橋店', '新北市板橋區四維路104號', '02-29456991');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`D_NAME`);

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_ID`),
  ADD KEY `S_ID` (`S_ID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`D_NAME`,`S_ID`),
  ADD KEY `D_NAME` (`D_NAME`),
  ADD KEY `S_ID` (`S_ID`);

--
-- 資料表索引 `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`I_ID`),
  ADD KEY `D_NAME` (`D_NAME`);

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`S_ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `recipe`
--
ALTER TABLE `recipe`
  MODIFY `I_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`S_ID`) REFERENCES `shop` (`S_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 資料表的限制式 `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`D_NAME`) REFERENCES `dessert` (`D_NAME`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`S_ID`) REFERENCES `shop` (`S_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
