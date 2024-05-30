-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 29, 2024 lúc 12:21 PM
-- Phiên bản máy phục vụ: 8.0.21
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coki`
--

DELIMITER $$
--
-- Thủ tục
--
DROP PROCEDURE IF EXISTS `AddAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddAdmin` (IN `p_ad_name` VARCHAR(100), IN `p_ad_email` VARCHAR(100), IN `p_ad_password` VARCHAR(100), IN `p_ad_psw_email` VARCHAR(100))  BEGIN
    INSERT INTO admin (ad_name, ad_email, ad_password, ad_psw_email)
    VALUES (p_ad_name, p_ad_email, p_ad_password, p_ad_psw_email);
END$$

DROP PROCEDURE IF EXISTS `AddProduct`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddProduct` (IN `p_category_id` INT, IN `p_title` VARCHAR(100), IN `p_price` FLOAT, IN `p_discount` FLOAT, IN `p_thumbnail` VARCHAR(100), IN `p_description` VARCHAR(100), IN `p_quantity` INT)  BEGIN
    INSERT INTO product (category_id, title, price, discount, thumbnail, description, quantity)
    VALUES (p_category_id, p_title, p_price, p_discount, p_thumbnail, p_description, p_quantity);
END$$

DROP PROCEDURE IF EXISTS `UpdateOrderStatus`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateOrderStatus` (IN `p_order_id` INT, IN `p_order_status` INT)  BEGIN
    UPDATE giaodich
    SET order_status = p_order_status
    WHERE order_id = p_order_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ad_id` int NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ad_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ad_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ad_psw_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_email`, `ad_password`, `ad_psw_email`) VALUES
(1, 'admin', 'ruyelem@gmail.com', '123', '[value-5]');

--
-- Bẫy `admin`
--
DROP TRIGGER IF EXISTS `BeforeInsertAdmin`;
DELIMITER $$
CREATE TRIGGER `BeforeInsertAdmin` BEFORE INSERT ON `admin` FOR EACH ROW BEGIN
    IF EXISTS (SELECT 1 FROM admin WHERE ad_email = NEW.ad_email) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Admin email already exists';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `img`) VALUES
(1, 'Wood products ', 'spgo.png'),
(2, 'Wool product', 'splen.png'),
(3, 'Plastic products', 'spnhua.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodich`
--

DROP TABLE IF EXISTS `giaodich`;
CREATE TABLE IF NOT EXISTS `giaodich` (
  `giaodich_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `date_giaodich` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` float NOT NULL,
  `order_status` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`giaodich_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giaodich`
--

INSERT INTO `giaodich` (`giaodich_id`, `order_id`, `date_giaodich`, `title`, `quantity`, `price`, `order_status`, `product_id`) VALUES
(28, 12, '03:23 16/12/2023', 'Xe cau', 4, 1200000, 1, 3),
(29, 12, '03:23 16/12/2023', 'Bua ', 1, 180000, 1, 1),
(30, 12, '03:23 16/12/2023', 'Do choi hinh hoc', 4, 200000, 1, 5),
(31, 13, '03:25 16/12/2023', 'Do choi hinh hoc', 2, 100000, 1, 5),
(32, 14, '03:51 16/12/2023', 'Do choi hinh hoc', 5, 250000, 0, 5),
(33, 14, '03:51 16/12/2023', 'Cao 2', 3, 270000, 0, 13),
(34, 15, '09:34 16/12/2023', 'Dung cu bep', 2, 400000, 2, 2),
(35, 15, '09:34 16/12/2023', 'Nhim', 1, 370000, 2, 11),
(36, 16, '16:29 16/12/2023', 'Dung cu bep', 1, 200000, 2, 2),
(37, 16, '16:29 16/12/2023', 'Xe cau', 1, 300000, 2, 3),
(38, 17, '16:36 16/12/2023', 'Dung cu bep', 1, 200000, 0, 2),
(39, 17, '16:36 16/12/2023', 'Xe cau', 1, 300000, 0, 3),
(40, 18, '16:37 16/12/2023', 'Dung cu bep', 3, 600000, 2, 2),
(41, 19, '00:59 17/12/2023', 'Ban da bong', 4, 2000000, 2, 6),
(42, 20, '01:02 17/12/2023', 'Bua ', 1, 180000, 2, 1),
(43, 20, '01:02 17/12/2023', 'Dung cu bep', 4, 800000, 2, 2),
(44, 21, '20:04 21/12/2023', 'Dung cu bep', 2, 400000, 1, 2),
(45, 21, '20:04 21/12/2023', 'Bua ', 4, 720000, 1, 1);

--
-- Bẫy `giaodich`
--
DROP TRIGGER IF EXISTS `AfterInsertGiaodich`;
DELIMITER $$
CREATE TRIGGER `AfterInsertGiaodich` AFTER INSERT ON `giaodich` FOR EACH ROW BEGIN
    UPDATE product
    SET quantity = quantity - NEW.quantity
    WHERE product_id = NEW.product_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `BeforeInsertGiaodich`;
DELIMITER $$
CREATE TRIGGER `BeforeInsertGiaodich` BEFORE INSERT ON `giaodich` FOR EACH ROW BEGIN
    DECLARE available_quantity INT;
    SELECT quantity INTO available_quantity FROM product WHERE product_id = NEW.product_id;
    IF available_quantity < NEW.quantity THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Not enough quantity available for this product';
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `BeforeUpdateGiaodich`;
DELIMITER $$
CREATE TRIGGER `BeforeUpdateGiaodich` BEFORE UPDATE ON `giaodich` FOR EACH ROW BEGIN
    DECLARE available_quantity INT;
    SELECT quantity INTO available_quantity FROM product WHERE product_id = NEW.product_id;
    IF available_quantity + OLD.quantity < NEW.quantity THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Not enough quantity available for this product';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_date` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` float NOT NULL,
  `payment_method` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `email` (`email`),
  KEY `email_2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `quantity`, `price`, `payment_method`) VALUES
(12, 'Trần Quang Khánh', 'khanh@gmail.com', '123', '123', '123', '03:23 16/12/2023', 9, 1210000, 'Cash'),
(13, 'Trần Quang Khánh', 'khanh@gmail.com', '234', '567', '111', '03:25 16/12/2023', 2, 90000, 'Ship OCD'),
(14, 'DAO HAI DANG', 'dangby10a1@gmail.com', '123', '122222', '234', '03:51 16/12/2023', 8, 465000, 'Internet banking'),
(15, 'Trần Quang Khánh', 'khanh@gmail.com', '111', '111', '111', '09:34 16/12/2023', 3, 740000, 'Ship OCD'),
(16, 'Trần Quang Khánh', 'khanh@gmail.com', '333', '234', '3', '16:29 16/12/2023', 2, 415000, 'Internet banking'),
(17, 'Trần Quang Khánh', 'khanh@gmail.com', '', '', '', '16:36 16/12/2023', 2, 415000, ''),
(18, 'Trần Quang Khánh', 'khanh@gmail.com', '123', '123', '3', '16:37 16/12/2023', 3, 585000, 'Cash'),
(19, 'Trần Quang Khánh', 'khanh@gmail.com', '124', '123', '124', '00:59 17/12/2023', 4, 1800000, 'Cash'),
(20, 'Trần Quang Khánh', 'khanh@gmail.com', '345', '234', '124', '01:02 17/12/2023', 5, 930000, 'Cash'),
(21, 'Trần Quang Khánh', 'khanh@gmail.com', '', '', '', '20:04 21/12/2023', 6, 990000, 'Internet banking');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `thumbnail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `quantity`) VALUES
(1, 1, 'Bua ', 180000, 150000, 'bua-dap-tho-1.png', 'Suitable for all ages.', 100),
(2, 1, 'Dung cu bep', 200000, 195000, '71K0gCqKNiL._AC_SX569_.png', 'Suitable for all ages.', 100),
(3, 1, 'Xe cau', 300000, 220000, 'sphamgo4.png', 'Suitable for all ages.', 100),
(4, 1, 'Do choi xep hinh', 100000, 75000, 'sphamgo3.png', 'Suitable for all ages.', 100),
(5, 1, 'Do choi hinh hoc', 50000, 45000, 'sphamgo2.png', 'Suitable for all ages.', 100),
(6, 1, 'Ban da bong', 500000, 450000, 'sphamgo5.png', 'Suitable for all ages.', 100),
(7, 1, 'Hinh go', 300000, 150000, 'sphamgo1.png', 'Suitable for all ages.', 100),
(8, 1, 'Nha go', 370000, 330000, 'sphamgo1.png', 'Suitable for all ages.', 100),
(9, 2, 'Cao', 100000, 75000, 'big-friend-fox.png', 'Suitable for all ages.', 100),
(10, 2, 'Su tu', 500000, 490000, 'gau1.png', 'Suitable for all ages.', 100),
(11, 2, 'Nhim', 370000, 350000, 'hubert.png', 'Suitable for all ages.', 100),
(12, 2, 'Khi', 350000, 340000, 'khi_giohang.png', 'Suitable for all ages.', 100),
(13, 2, 'Cao 2', 90000, 80000, 'missy-fox.png', 'Suitable for all ages.', 100),
(14, 2, 'Cao 3', 120000, 110000, 'thalaboo-fox.png', 'Suitable for all ages.', 100),
(15, 3, 'Hoa qua', 700000, 690000, 'hoaqua.png', 'Suitable for all ages.', 100),
(16, 3, 'Dung cu lam vuon', 370000, 350000, 'lamvuon.png', 'Suitable for all ages.', 100),
(17, 3, 'Dung du lam vuon 2', 350000, 340000, 'spnhua.png', 'Suitable for all ages.', 100),
(18, 3, 'Bua ta', 90000, 80000, 'bua.png', 'Suitable for all ages. dung khong ?', 100),
(19, 3, 'Xe lua', 120000, 110000, 'OIP.png', 'Suitable for 18+', 100),
(20, 2, 'Chim canh cut', 1300000, 980000, 'chimcanhcut.webp', 'Sieu sieu dep ', 100);

--
-- Bẫy `product`
--
DROP TRIGGER IF EXISTS `BeforeUpdateProductDiscount`;
DELIMITER $$
CREATE TRIGGER `BeforeUpdateProductDiscount` BEFORE UPDATE ON `product` FOR EACH ROW BEGIN
    IF NEW.discount < 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Discount must be greater than 0';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `star`
--

DROP TABLE IF EXISTS `star`;
CREATE TABLE IF NOT EXISTS `star` (
  `yellow_star` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `white_star` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `star`
--

INSERT INTO `star` (`yellow_star`, `white_star`) VALUES
('Star.svg', 'WhiteStar.svg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_password` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deleted` int NOT NULL,
  `avatar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`email`, `fullname`, `phone_number`, `password`, `code_password`, `deleted`, `avatar`) VALUES
('dangby10a1@gmail.com', 'DAO HAI DANG', '0347188593', '$2y$10$aafuOZM0CiGG4bRjw8qgK.9pMPmFNfiOvXXYaX5ki5z42gNLDmkX.', '341ef', 0, 'man.png'),
('khanh@gmail.com', 'Trần Quang Khánh', '0398878765', '$2y$10$rqsmdMsH/KRTHPVa/BM9W.zU/mbiZQ1U3eFHfD5g615XgPdjYVbj2', '38bdb', 0, 'man.png');

--
-- Bẫy `user`
--
DROP TRIGGER IF EXISTS `BeforeInsertUser`;
DELIMITER $$
CREATE TRIGGER `BeforeInsertUser` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
    IF EXISTS (SELECT 1 FROM user WHERE email = NEW.email) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'User email already exists';
    END IF;
END
$$
DELIMITER ;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `giaodich_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `giaodich_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
