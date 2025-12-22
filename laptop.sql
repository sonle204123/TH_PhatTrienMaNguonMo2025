-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 26, 2024 lúc 10:50 AM
-- Phiên bản máy phục vụ: 8.3.0
-- Phiên bản PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `ma_don_hang` int NOT NULL AUTO_INCREMENT,
  `ma_san_pham` int NOT NULL,
  `ma_khach_hang` int NOT NULL,
  `so_luong` int NOT NULL,
  `so_hoa_don` int NOT NULL,
  `trang_thai` varchar(255) NOT NULL,
  PRIMARY KEY (`ma_don_hang`),
  KEY `ma_don_hang` (`ma_don_hang`),
  KEY `ma_san_pham` (`ma_san_pham`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ma_don_hang`, `ma_san_pham`, `ma_khach_hang`, `so_luong`, `so_hoa_don`, `trang_thai`) VALUES
(1, 20, 0, 1, 1253624972, 'Đang xử lý'),
(2, 19, 0, 5, 380485142, 'Đang xử lý'),
(3, 29, 0, 1, 1365505993, 'Đang xử lý'),
(4, 18, 0, 1, 1365505993, 'Đang xử lý'),
(5, 14, 0, 3, 1120823864, 'Đang xử lý'),
(6, 33, 0, 1, 1120823864, 'Đang xử lý'),
(7, 15, 0, 1, 1781408759, 'Đang xử lý'),
(8, 32, 0, 5, 1781408759, 'Đang xử lý'),
(9, 26, 0, 1, 345540577, 'Đang xử lý'),
(10, 23, 0, 1, 487458958, 'Đang xử lý'),
(11, 20, 0, 1, 487458958, 'Đang xử lý'),
(12, 37, 0, 1, 463330044, 'Đang xử lý'),
(13, 1, 0, 1, 463330044, 'Đang xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

DROP TABLE IF EXISTS `danhgia`;
CREATE TABLE IF NOT EXISTS `danhgia` (
  `ma_danh_gia` int NOT NULL AUTO_INCREMENT,
  `ma_san_pham` int DEFAULT NULL,
  `ma_khach_hang` int DEFAULT NULL,
  `diem` int DEFAULT NULL,
  `binh_luan` text,
  `ngay_danh_gia` date DEFAULT NULL,
  PRIMARY KEY (`ma_danh_gia`),
  KEY `ma_san_pham` (`ma_san_pham`),
  KEY `ma_khach_hang` (`ma_khach_hang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `ma_danh_muc` int NOT NULL AUTO_INCREMENT,
  `ten_danh_muc` varchar(100) NOT NULL,
  `mo_ta` text,
  PRIMARY KEY (`ma_danh_muc`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ma_danh_muc`, `ten_danh_muc`, `mo_ta`) VALUES
(1, 'Văn phòng', 'Laptop dành cho nhu cầu văn phòng cơ bản'),
(2, 'Gaming', 'Laptop dành cho nhu cầu chơi game'),
(3, 'Đồ họa', 'Laptop cho nhu cầu thiết kế đồ họa'),
(4, 'Ultrabook', 'Laptop mỏng nhẹ, dễ mang theo'),
(5, 'Doanh nhân', 'Laptop dành cho doanh nhân'),
(6, 'Hiệu năng cao', 'Laptop có hiệu năng cao cho công việc nặng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `ma_don_hang` int NOT NULL AUTO_INCREMENT,
  `ma_khach_hang` int NOT NULL,
  `ngay_dat` timestamp NOT NULL,
  `tong_san_pham` int NOT NULL,
  `tong_tien` float NOT NULL,
  `so_hoa_don` int NOT NULL,
  `trang_thai` varchar(255) NOT NULL,
  PRIMARY KEY (`ma_don_hang`),
  KEY `ma_khach_hang` (`ma_khach_hang`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ma_don_hang`, `ma_khach_hang`, `ngay_dat`, `tong_san_pham`, `tong_tien`, `so_hoa_don`, `trang_thai`) VALUES
(1, 3, '2024-12-24 02:52:13', 1, 20000000, 1253624972, 'Đang xử lý'),
(2, 1, '2024-12-24 03:20:41', 5, 55000000, 380485142, 'Hoàn thành'),
(3, 1, '2024-12-26 03:56:20', 2, 62000000, 1365505993, 'Hoàn thành'),
(4, 1, '2024-12-26 03:56:36', 4, 60000000, 1120823864, 'Đang xử lý'),
(5, 1, '2024-12-26 03:57:12', 6, 195000000, 1781408759, 'Đang xử lý'),
(6, 1, '2024-12-26 03:58:17', 1, 25000000, 345540577, 'Đang xử lý'),
(7, 5, '2024-12-26 03:59:19', 2, 50000000, 487458958, 'Hoàn thành'),
(8, 1, '2024-12-26 04:02:33', 2, 75000000, 463330044, 'Đang xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `ma_san_pham` int NOT NULL,
  `so_luong` int NOT NULL,
  `ma_khach_hang` int NOT NULL,
  PRIMARY KEY (`ma_san_pham`),
  KEY `ma_san_pham` (`ma_san_pham`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `ma_khach_hang` int NOT NULL AUTO_INCREMENT,
  `ten_khach_hang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `dia_chi` text,
  `anh_url` varchar(255) NOT NULL,
  PRIMARY KEY (`ma_khach_hang`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ma_khach_hang`, `ten_khach_hang`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `anh_url`) VALUES
(1, 'huy', 'huy123@gmail.com', '$2y$10$kTcQqVUDyF3IXf7ofTRtBeu/mzTHl9z4PLcdYD6SqtHYlZVUdgw.6', '01234567810', 'hau giang', 'user1.jpg'),
(5, 'nguyen', 'nguyen@gmail.com', '$2y$10$UlHSnA4BzbwcS94v2mhIxuipUDby1xpuoWiwau1vBHEVB5H.av.Qa', '123455', 'hau giang', 'anh4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `ma_nguoi_dung` int NOT NULL AUTO_INCREMENT,
  `ten_nguoi_dung` varchar(255) NOT NULL,
  `mat_khau` int NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`ma_nguoi_dung`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`ma_nguoi_dung`, `ten_nguoi_dung`, `mat_khau`, `role`) VALUES
(1, 'admin', 123, 1),
(2, 'laptop', 123, 0),
(3, 'laptopstore', 123, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `ma_san_pham` int NOT NULL AUTO_INCREMENT,
  `ten_san_pham` varchar(255) NOT NULL,
  `mo_ta` text,
  `gia` decimal(10,2) NOT NULL,
  `ma_thuong_hieu` int DEFAULT NULL,
  `ma_danh_muc` int DEFAULT NULL,
  `so_luong_ton` int DEFAULT '0',
  `anh_url` varchar(255) DEFAULT NULL,
  `tu_khoa` text NOT NULL,
  PRIMARY KEY (`ma_san_pham`),
  KEY `ma_thuong_hieu` (`ma_thuong_hieu`),
  KEY `ma_danh_muc` (`ma_danh_muc`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ma_san_pham`, `ten_san_pham`, `mo_ta`, `gia`, `ma_thuong_hieu`, `ma_danh_muc`, `so_luong_ton`, `anh_url`, `tu_khoa`) VALUES
(1, 'Dell XPS ', 'Laptop cao cấp cho văn phòng, màn hình 14 inch, Core i5, RAM 16GB, SSD 512GB', 15000000.00, 1, 1, 10, 'dell_xps.jpg', 'dell xps\r\ndell xps 13\r\nxps\r\nlaptop dell\r\n'),
(2, 'HP Omen 15', 'Laptop chơi game cấu hình cao, i7-11800H, 16GB, 512GB,RTX 3060, màn hình Full HD', 25000000.00, 2, 2, 5, 'hp_omen.png', 'laptop hp \r\nhp omen\r\nhp omen 15'),
(3, 'Asus ZenBook', 'Ultrabook mỏng nhẹ, CPU Intel Core i7-1260P, RAM 16GB, SSD 1TB, màn hình 14 inch 2K', 18000000.00, 3, 4, 8, 'asus_zenbook.jpg', 'asus zenbook\r\nlaptop asus\r\nxenbook\r\nultrabook'),
(4, 'Acer Aspire 5', 'Laptop văn phòng giá rẻ, màn hình 14 inch, CPU Intel Core i5, RAM 16GB, SSD 512GB', 12000000.00, 4, 1, 20, 'acer_aspire.jpg', 'laptop acer\r\nacer spire 15\r\nacer spire\r\nlaptop văn phòng '),
(5, 'Lenovo LOQ', 'Laptop gaming bền bỉ,i7-11800H, RAM 16GB, SSD 512GB,RTX 3060, màn hình Full HD', 22000000.00, 5, 2, 7, 'lenovo_loq.jpg', 'laptop lenovo\r\nlenovo loq\r\nlaptop gaming'),
(6, 'MSI GE66 Raider', 'Laptop chơi game hiệu năng cao, Ryzen 5 5600H,16GB, 512GB,GTX 1650,Full HD', 30000000.00, 6, 2, 4, 'msi_raider.jpg', 'laptop msi\r\nmssi ge66 \r\nmsi raider\r\nlaptop gaming '),
(15, 'Dell Latitude 3420', 'Laptop văn phòng, màn hình 14 inch, CPU Intel Core i5, RAM 16GB, SSD 512GB', 20000000.00, 1, 1, 5, 'Dell_Latitude.jpg', 'laptop dell\r\ndell latitude \r\nlatitude 3420\r\nlaptop văn phòng '),
(14, 'Dell Vostro 3510', 'Laptop văn phòng, màn hình 15.6 inch, CPU Intel Core i5, RAM 8GB, SSD 512GB', 15000000.00, 1, 1, 8, 'dell_vostro.jpg', 'laptop dell\r\ndell vostro \r\ndell vostro 3510\r\nlaptop văn phòng '),
(13, 'Dell Inspiron 15 3000', 'Laptop văn phòng, màn hình 15.6 inch, CPU Intel Core i3, RAM 8GB, SSD 256GB', 12000000.00, 1, 1, 10, 'dell_inspiron.jpg', 'laptop dell \r\nlaptop văn phòng\r\ndell inspiron\r\nInspiron 15 3000\r\n'),
(16, 'Dell XPS 13', 'Laptop văn phòng cao cấp, màn hình 13.4 inch, CPU Intel Core i7, RAM 16GB, SSD 1TB', 35000000.00, 1, 1, 3, 'dell-xps.jpg', 'laptop dell\r\ndell xps\r\nlaptop văn phòng\r\nxps\r\nxps 13'),
(17, 'Dell Inspiron 14 5000', 'Laptop văn phòng, màn hình 14 inch, CPU Intel Core i5, RAM 8GB, SSD 256GB', 14000000.00, 1, 1, 7, 'DellInspiron145000i5.png', 'laptop dell\r\ndell inspiron\r\nDell Inspiron 14 5000\r\nlaptop văn phòng \r\nInspiron 14 5000'),
(18, 'Dell Precision 3560', 'Laptop văn phòng chuyên nghiệp, màn hình 15.6 inch, Core i7, RAM 16GB, SSD 1TB', 40000000.00, 1, 1, 2, 'Dell-Precision.jpg', 'laptop dell\r\nlaptop văn phòng \r\ndell precision\r\nPrecision 3560\r\ndell Precision 3560'),
(19, 'Dell Vostro 3400', 'Laptop văn phòng, màn hình 14 inch, CPU Intel Core i3, RAM 4GB, SSD 256GB', 11000000.00, 1, 1, 12, '42235_vostro.jpg', 'laptop dell\r\nlaptop văn phòng \r\nDell Vostro 3400\r\nvostro 3400'),
(20, 'Laptop HP Pavilion Gaming', 'Laptop gaming,Ryzen 5 5600H, RAM 16GB, SSD 512GB, GTX 1650, màn hình Full HD', 20000000.00, 2, 2, 30, 'hp_pavilion.png', 'laptop hp \r\nlaptop gaming \r\nLaptop HP Pavilion Gaming\r\nHP pavilion gaming'),
(21, 'Laptop Asus TUF Gaming', 'Laptop gaming,Core i7-11800H, RAM 16GB, SSD 512GB, GPU RTX 3060, màn hình Full HD', 25000000.00, 3, 2, 20, 'asus_tuf.png', 'laptop asus\r\nasus\r\nlaptop gaming\r\nlaptop asus tuf\r\ntuf\r\nasus tuf\r\n'),
(22, 'Laptop Acer Aspire 5', 'Laptop văn phòng, CPU AMD Ryzen 5 5500U, RAM 8GB, SSD 512GB, màn hình Full HD', 12000000.00, 4, 1, 40, 'acer-aspire.png', 'laptop acer\r\nacer\r\nlaptop văn phòng\r\nscer aspire 5'),
(23, 'Laptop Lenovo ThinkPad X1 Carbon', 'Ultrabook doanh nhân, Core i7-1260P, RAM 16GB, SSD 1TB, màn hình 14 inch 2K', 30000000.00, 5, 5, 15, 'lenovo_thinkpad_x1.png', 'laptop lenovo thinkpad x1 carbon\r\nlenovo thinkpad x1 arbon\r\nlaptop lenovo\r\nlenovo\r\nlenovo thinkpad\r\nthinkpad x1 carbon'),
(24, 'Laptop MSI Creator Z16', 'Laptop đồ họa, i9-11900H, RAM 32GB, SSD 1TB, GPU RTX 3060, màn hình 16 inch 4K', 45000000.00, 6, 3, 10, 'msi-creator.jpg', 'laptop msi creator z16\r\nmsi creator z16\r\nlaptop msi\r\nmsi\r\nlaptop đồ họa \r\n'),
(25, 'Laptop HP Envy 13', 'Ultrabook mỏng nhẹ, i5-1235U, RAM 8GB, SSD 512GB, màn hình 13.3 inch Full HD', 28000000.00, 2, 4, 30, 'hp-envy-13.jpg', 'laptop hp envy 13\r\nhp envy 13\r\nlaptop hp\r\nhp \r\nhp envy\r\nenvy 13\r\nultrabook'),
(26, 'Laptop Asus ZenBook 14', 'Ultrabook doanh nhân, Ryzen 7 5700U, RAM 16GB, SSD 1TB, màn hình 14 inch Full HD+', 25000000.00, 3, 5, 20, 'asus_zenbook1.jpg', 'laptop asus zenBook 14\r\n asus zenBook 14\r\nlaptop asus\r\nasus\r\nasus zenbook\r\nzenbook'),
(27, 'Laptop Acer Predator Helios 300', 'Laptop gaming, i7-12700H, RAM 16GB, SSD 1TB, GPU RTX 3070, màn hình 15.6 inch QHD', 40000000.00, 4, 2, 15, 'acer-predator.png', 'laptop acer predator helios 300\r\nacer predator helios 300\r\nlaptop gaming\r\nlaptop acer \r\nacer \r\n'),
(28, 'Laptop Lenovo IdeaPad 3', 'Laptop văn phòng, Core i3-1115G4, RAM 4GB, SSD 256GB, màn hình 14 inch HD', 10000000.00, 5, 1, 50, 'laptop-lenovo-ideapad-3.jpg', 'laptop lenovo \r\nlenovo\r\nlanovo ideapad 3\r\nideapad\r\nlaptop văn phòng '),
(29, 'Laptop MSI GF65 Thin', 'Laptop gaming,i5-10500H, RAM 16GB, SSD 512GB, GPU GTX 1660 Ti, màn hình Full HD', 22000000.00, 6, 2, 20, 'msi-thin-15.jpg', 'laptop msi\r\nmsi\r\nlaptop gaming \r\nlaptop msi gf65 thin\r\nmsi gf65 thin'),
(30, 'Laptop Dell Precision 5560', 'Laptop đồ họa, i9-11950H, RAM 32GB, SSD 2TB, GPU Quadro T1200, màn hình 15.6 inch ', 48000000.00, 1, 3, 8, '2479_laptopaz.jpg', 'laptop dell\r\nlaptop đồ họa\r\nlaptop dell precision 5560\r\ndell precision 5560'),
(31, 'Laptop HP ZBook Fury G8', 'Laptop đồ họa, CPU Intel Xeon W-11955M, RAM 32GB, SSD 1TB, GPU RTX A4000', 50000000.00, 2, 3, 12, 'hp_Zbook.jpg', 'laptop hp\r\nhp zenbook\r\nlaptop đồ họa \r\nLaptop HP ZBook Fury G8\r\nHP ZBook Fury G8'),
(32, 'Laptop Asus ROG Zephyrus G14', 'Laptop gaming, Ryzen 9 6900HS, RAM 16GB, SSD 1TB, GPU RTX 3060, màn hình QHD', 35000000.00, 3, 2, 18, 'asus-rog.jpg', ''),
(33, 'Laptop Acer Swift 3', 'Ultrabook, CPU Intel Core i5-1135G7, RAM 8GB, SSD 512GB, màn hình 14 inch Full HD', 15000000.00, 4, 4, 30, 'acer-swift-3.jpg', ''),
(34, 'Laptop Lenovo Legion 5', 'Laptop gaming, Ryzen 7 5800H, RAM 16GB, SSD 512GB, GPU RTX 3050, màn hình Full HD', 25000000.00, 5, 2, 25, 'lenovo-gaming-legion-5.jpg', ''),
(35, 'Laptop MSI Stealth 15M', 'Ultrabook gaming,i7-11375H, RAM 16GB, SSD 512GB, GPU RTX 3060, màn hình Full HD', 30000000.00, 6, 4, 15, 'laptop-msi-stealth.jpg', ''),
(36, 'Laptop HP EliteBook 840 G8', 'Laptop doanh nhân, i7-1165G7, RAM 16GB, SSD 512GB, màn hình 14 inch Full HD', 32000000.00, 2, 5, 12, '8512_hp_elitebook_840.png', ''),
(37, 'Laptop Dell XPS 17 9720', 'Laptop hiệu năng cao, i7-12700H, RAM 16GB, SSD 1TB, RTX 3050 Ti, màn hình UHD+', 60000000.00, 1, 6, 10, 'dell-xps1.jpg', ''),
(38, 'Laptop HP Omen 16', 'Laptop hiệu năng cao, Ryzen 7 5800H, RAM 16GB, SSD 1TB, RTX 3060, màn hình Full HD', 42000000.00, 2, 6, 15, 'hp_omen.jpg', ''),
(39, 'Laptop Asus ROG Strix Scar 17', 'Laptop hiệu năng cao, i9-12900H, RAM 32GB, SSD 1TB, GPU RTX 3080 Ti, màn hình QHD', 80000000.00, 3, 6, 8, 'Asus-ROG1.jpg', ''),
(40, 'Laptop Acer ConceptD 7 Ezel', 'Laptop hiệu năng cao, i7-10875H, RAM 32GB, SSD 1TB, RTX 2080 Super, màn hình 4K ', 75000000.00, 4, 6, 5, 'conceptd_7.png', ''),
(41, 'Laptop MSI Titan GT77', 'Laptop hiệu năng cao, i9-13980HX, 64GB, SSD 2TB, RTX 4090, màn hình UHD Mini LED', 99999999.99, 6, 6, 3, 'Laptop-MSI-Titan.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

DROP TABLE IF EXISTS `thanhtoan`;
CREATE TABLE IF NOT EXISTS `thanhtoan` (
  `ma_thanh_toan` int NOT NULL AUTO_INCREMENT,
  `ma_don_hang` int DEFAULT NULL,
  `so_hoa_don` int NOT NULL,
  `tong_tien` int NOT NULL,
  `ngay_thanh_toan` timestamp NOT NULL,
  `phuong_thuc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ma_thanh_toan`),
  KEY `ma_don_hang` (`ma_don_hang`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`ma_thanh_toan`, `ma_don_hang`, `so_hoa_don`, `tong_tien`, `ngay_thanh_toan`, `phuong_thuc`) VALUES
(1, 2, 380485142, 55, '2024-12-26 03:55:18', 'Thanh toán khi nhận hàng'),
(2, 3, 1365505993, 62, '2024-12-26 03:57:23', 'Thanh toán ngân hàng'),
(3, 7, 487458958, 50, '2024-12-26 03:59:24', 'Thanh toán ngân hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

DROP TABLE IF EXISTS `thuonghieu`;
CREATE TABLE IF NOT EXISTS `thuonghieu` (
  `ma_thuong_hieu` int NOT NULL AUTO_INCREMENT,
  `ten_thuong_hieu` varchar(100) NOT NULL,
  `quoc_gia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ma_thuong_hieu`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`ma_thuong_hieu`, `ten_thuong_hieu`, `quoc_gia`) VALUES
(1, 'Laptop Dell', 'Mỹ'),
(2, 'Laptop HP', 'Mỹ'),
(3, 'Laptop Asus', 'Đài Loan'),
(4, 'Laptop Acer', 'Đài Loan'),
(5, 'Laptop Lenovo', 'Trung Quốc'),
(6, 'Laptop MSI', 'Đài Loan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
