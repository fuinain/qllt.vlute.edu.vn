-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2024 at 09:11 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qllt`
--

-- --------------------------------------------------------

--
-- Table structure for table `crawl`
--

CREATE TABLE `crawl` (
  `magv` int(11) NOT NULL,
  `hocky` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_crawl_from_vlute_ems`
--

CREATE TABLE `data_crawl_from_vlute_ems` (
  `thu` text NOT NULL,
  `ma_hoc_phan` varchar(255) NOT NULL,
  `key_thu` int(11) DEFAULT NULL,
  `ten_hoc_phan` text NOT NULL,
  `giang_vien` text NOT NULL,
  `phong` text NOT NULL,
  `tuan_hoc` text NOT NULL,
  `ngay_hoc` text,
  `id_giang_vien` int(11) NOT NULL,
  `id_hoc_ky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_crawl_from_vlute_ems`
--

INSERT INTO `data_crawl_from_vlute_ems` (`thu`, `ma_hoc_phan`, `key_thu`, `ten_hoc_phan`, `giang_vien`, `phong`, `tuan_hoc`, `ngay_hoc`, `id_giang_vien`, `id_hoc_ky`) VALUES
('Thứ 2', '241_1TH1338_(BT)_KS2A_01_tructiep (30 sv)', 2, 'TH1338_(BT) - Lập trình ứng dụng cho thiết bị di động (BT) (0.0)', 'GV:Trần Thị Kim Ngân', 'Phòng:A0201-Máy tính 1(Ca 3 - 4,12g30 - 17g30)', 'Tuần học: ----- 42- 43- 44- 45- 46- 47- 48- 49- 50- 51', 'Ngày học: 14/10, 21/10, 28/10, 04/11, 11/11, 18/11, 25/11, 02/12, 09/12, 16/12', 411, 42),
('Thứ 3', '241_1TH1338_(BT)_KS2A_05_tructiep (25 sv)', 3, 'TH1338_(BT) - Lập trình ứng dụng cho thiết bị di động (BT) (0.0)', 'GV:Trần Thị Kim Ngân', 'Phòng:A0206-Máy tính 6(Ca 1 - 2,06g30 - 11g30)', 'Tuần học: ----- 42- 43- 44- 45- 46- 47- 48- 49- 50- 51', 'Ngày học: 15/10, 22/10, 29/10, 05/11, 12/11, 19/11, 26/11, 03/12, 10/12, 17/12', 411, 42),
('Thứ 5', '241_1TH1338_KS2A_01_tructiep (51 sv)', 5, 'TH1338 - Lập trình ứng dụng cho thiết bị di động (2.2)', 'GV:Trần Thị Kim Ngân', 'Phòng:C0404(Tiết 1 - 2,07g00 - 08g20)', 'Tuần học: 37-38- 39- 40- 41- 42- 43- 44- 45- 46- 47- 48- 49- 50- 51', 'Ngày học: 12/09,19/09, 26/09, 03/10, 10/10, 17/10, 24/10, 31/10, 07/11, 14/11, 21/11, 28/11, 05/12, 12/12, 19/12', 411, 42),
('Thứ 5', '241_1TH1338_KS2A_02_tructiep (53 sv)', 5, 'TH1338 - Lập trình ứng dụng cho thiết bị di động (2.2)', 'GV:Trần Thị Kim Ngân', 'Phòng:C0606(Tiết 6 - 7,13g00 - 14g20)', 'Tuần học: 37-38- 39- 40- 41- 42- 43- 44- 45- 46- 47- 48- 49- 50- 51', 'Ngày học: 12/09,19/09, 26/09, 03/10, 10/10, 17/10, 24/10, 31/10, 07/11, 14/11, 21/11, 28/11, 05/12, 12/12, 19/12', 411, 42),
('Thứ 6', '241_1TH1338_KS2A_03_tructiep (53 sv)', 6, 'TH1338 - Lập trình ứng dụng cho thiết bị di động (2.2)', 'GV:Trần Thị Kim Ngân', 'Phòng:C0705(Tiết 1 - 2,07g00 - 08g20)', 'Tuần học: 37-38- 39- 40- 41- 42- 43- 44- 45- 46- 47- 48- 49- 50- 51', 'Ngày học: 13/09,20/09, 27/09, 04/10, 11/10, 18/10, 25/10, 01/11, 08/11, 15/11, 22/11, 29/11, 06/12, 13/12, 20/12', 411, 42),
('Thứ 6', '241_1TH1338_KS2A_04_tructiep (29 sv)', 6, 'TH1338 - Lập trình ứng dụng cho thiết bị di động (2.2)', 'GV:Trần Thị Kim Ngân', 'Phòng:C0606(Tiết 6 - 7,13g00 - 14g20)', 'Tuần học: 37-38- 39- 40- 41- 42- 43- 44- 45- 46- 47- 48- 49- 50- 51', 'Ngày học: 13/09,20/09, 27/09, 04/10, 11/10, 18/10, 25/10, 01/11, 08/11, 15/11, 22/11, 29/11, 06/12, 13/12, 20/12', 411, 42),
('Thứ 2', '241_1TH1376_(BT)_KS2A_01_tructiep (30 sv)', 2, 'TH1376_(BT) - Sensor và ứng dụng (BT) (0.0)', 'GV:Trần Thị Kim Ngân', 'Phòng:A0205-Phòng thực tập mạng(Ca 1 - 2,06g30 - 11g30)', 'Tuần học: ----- 42- 43- 44- 45- 46- 47- 48- 49- 50- 51', 'Ngày học: 14/10, 21/10, 28/10, 04/11, 11/11, 18/11, 25/11, 02/12, 09/12, 16/12', 411, 42),
('Thứ 5', '241_1TH1376_KS2A_01_tructiep (61 sv)', 5, 'TH1376 - Sensor và ứng dụng (1.2)', 'GV:Trần Thị Kim Ngân', 'Phòng:C0606(Tiết 3 - 5,08g40 - 10g50)', 'Tuần học: 37-38- 39- 40- 41', 'Ngày học: 12/09,19/09, 26/09, 03/10, 10/10', 411, 42),
('Thứ 5', '241_1TH1376_KS2A_02_tructiep (34 sv)', 5, 'TH1376 - Sensor và ứng dụng (1.2)', 'GV:Trần Thị Kim Ngân', 'Phòng:C0804(Tiết 8 - 10,14g40 - 16g50)', 'Tuần học: 37-38- 39- 40- 41', 'Ngày học: 12/09,19/09, 26/09, 03/10, 10/10', 411, 42),
('Thứ 6', '241_1TH1388_KS2A_tructiep (23 sv)', 6, 'TH1388 - Xử lý video (2.2)', 'GV:Trần Thị Kim Ngân', 'Phòng:C0201(Tiết 8 - 10,14g40 - 16g50)', 'Tuần học: 37-38- 39- 40- 41- 42- 43- 44- 45- 46', 'Ngày học: 13/09,20/09, 27/09, 04/10, 11/10, 18/10, 25/10, 01/11, 08/11, 15/11', 411, 42),
('Ngoài giờ học', '241_1TH1512_KS3A_09_ngoaigio (12 sv)', 1, 'TH1512 - Đồ án CNTT 2 (0.2)', 'GV:Trần Thị Kim Ngân', 'Phòng:SV LH GV hướng dẫn(Tiết 1 - 3,07g00 - 09g20)', 'Tuần học: 37-38- 39- 40- 41- 42- 43- 44- 45- 46- 47- 48- 49- 50- 51', NULL, 411, 42);

-- --------------------------------------------------------

--
-- Table structure for table `don_vi`
--

CREATE TABLE `don_vi` (
  `id` int(11) NOT NULL,
  `ma_don_vi` varchar(10) NOT NULL,
  `ten_don_vi` varchar(50) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `don_vi`
--

INSERT INTO `don_vi` (`id`, `ma_don_vi`, `ten_don_vi`, `ngay_tao`) VALUES
(2, 'Khoa CNTT', 'Công nghệ thông tin', '2024-08-22 08:19:02'),
(3, 'CTP', 'Công nghệ thực phẩm', '2024-04-21 20:46:58'),
(4, 'BTY', 'Thú y', '2024-04-21 20:47:21'),
(5, 'DLH', 'Du lịch', '2024-04-21 20:48:25'),
(6, 'KTN', 'Công nghệ kỹ thuật nhiệt', '2024-04-21 20:55:41'),
(7, 'OTO', 'Công nghệ kỹ thuật ô tô', '2024-04-21 20:54:49'),
(8, 'TDH', 'Công nghệ kỹ thuật điều khiển và tự động hóa', '2024-04-21 20:54:49'),
(9, 'CCK', 'Công nghệ kỹ thuật cơ khí', '2024-04-21 20:54:49'),
(10, 'CTM', 'Công nghệ chế tạo máy', '2024-04-21 20:54:49'),
(11, 'KMT', 'Công nghệ khoa học máy tính', '2024-04-21 20:54:49'),
(12, 'DDT', 'CNKT Điện, điện tử', '2024-04-21 20:54:49'),
(13, 'CDT', 'Công nghệ kỹ thuật cơ điện tử', '2024-04-21 20:54:49'),
(14, 'LAW', 'Luật', '2024-04-21 20:54:49'),
(15, 'QDL', 'Quản trị dịch vụ du lịch và lữ hành', '2024-04-21 20:54:49'),
(16, 'CKD', 'Công nghệ cơ khí động lực', '2024-04-21 20:54:49'),
(17, 'KXD', 'CNKT Công trình xây dựng', '2024-04-21 20:54:49'),
(18, 'QT', 'QT', '2024-08-22 03:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `giang_vien`
--

CREATE TABLE `giang_vien` (
  `id_giang_vien` int(11) NOT NULL,
  `ho_ten` text NOT NULL,
  `hoc_vi` text NOT NULL,
  `email` text NOT NULL,
  `cccd` text,
  `ngay_sinh` date DEFAULT NULL,
  `so_dien_thoai` text,
  `id_don_vi` int(11) NOT NULL,
  `quyen` text NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giang_vien`
--

INSERT INTO `giang_vien` (`id_giang_vien`, `ho_ten`, `hoc_vi`, `email`, `cccd`, `ngay_sinh`, `so_dien_thoai`, `id_don_vi`, `quyen`, `ngay_tao`) VALUES
(122, 'Lê Hoàng An', 'Thạc sĩ', 'anlh@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(123, 'Trần Thái Bảo', 'Thạc sĩ', 'baott@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(125, 'Nguyễn Văn Hiếu', 'Thạc sĩ', 'hieunv@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(126, 'Trần Thị Tố Loan', 'Thạc sĩ', 'loanttt@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(127, 'Trần Thu Mai', 'Thạc sĩ', 'maitt@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(128, 'Nguyễn Vạn Năng', 'Thạc sĩ', 'nangnv@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(129, 'Nguyễn Ngọc Nga', 'Thạc sĩ', 'ngann@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(130, 'Nguyễn Thị Mỹ Nga', 'Thạc sĩ', 'ngantm@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(134, 'Nguyễn Thị Hồng Yến', 'Thạc sĩ', 'yennth@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(135, 'Lê Thị Hoàng Yến', 'Thạc sĩ', 'yenlth@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(169, 'Lê Thị Hạnh Hiền', 'Thạc sĩ', 'hienlth@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(171, 'Phan Anh Cang', 'Thạc sĩ', 'cangpa@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(290, 'Trần Hồ Đạt', 'Thạc sĩ', 'datth@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(299, 'Trần Thị Cẩm Tú', 'Thạc sĩ', 'tuttc@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(344, 'Nguyễn Hoàng Anh', 'Thạc sĩ', 'anhnh96@vlute.edu.vn', NULL, NULL, NULL, 2, 'giangvien', '2024-04-27 16:13:06'),
(374, 'Trần Phan An Trường', 'Thạc sĩ', 'truongtpa@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(384, 'Mai Thiên Thư', 'Thạc sĩ', 'thumt@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(411, 'Trần Thị Kim Ngân', 'Thạc sĩ', 'nganttk@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(1485, 'Nguyễn Ngọc Hoàng Quyên', 'Thạc sĩ', 'quyennnh@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(1513, 'Hồ Chí Hưng', 'Thạc sĩ', 'hunghc@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(1514, 'Lê Thị Mỹ Tiên', 'Thạc sĩ', 'tienltm@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(1515, 'Nguyễn Khắc Tường', 'Thạc sĩ', 'tuongnk@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(1521, 'Nguyễn Công Kha', 'Thạc sĩ', 'khanc@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(1561, 'Lê Duy Linh', 'Thạc sĩ', 'linhld@vlute.edu.vn', '', NULL, '', 2, 'giangvien', '2024-04-23 17:51:37'),
(99997, 'Tài khoản thư ký', '', 'fuinain4266@gmail.com', NULL, NULL, NULL, 2, 'thuky', '2024-04-23 18:08:56'),
(99998, 'Tài khoản giảng viên', '', '21004266@st.vlute.edu.vn', NULL, NULL, NULL, 2, 'giangvien', '2024-04-23 18:08:15'),
(99999, 'Tài khoản Admin', '', 'huynhtuananh24092003@gmail.com', NULL, NULL, NULL, 2, 'admin', '2024-04-23 18:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `hoc_ky`
--

CREATE TABLE `hoc_ky` (
  `id` int(11) NOT NULL,
  `ma_hoc_ky` text NOT NULL,
  `ten_hoc_ky` text NOT NULL,
  `ngay_bat_dau` text NOT NULL,
  `ngay_ht` text NOT NULL,
  `nam_hoc` int(11) NOT NULL,
  `tuan_bat_dau` int(11) NOT NULL,
  `so_tuan` int(11) NOT NULL,
  `loai_hoc_ky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoc_ky`
--

INSERT INTO `hoc_ky` (`id`, `ma_hoc_ky`, `ten_hoc_ky`, `ngay_bat_dau`, `ngay_ht`, `nam_hoc`, `tuan_bat_dau`, `so_tuan`, `loai_hoc_ky`) VALUES
(1, '132', 'Học kỳ 2, 2013 - 2014', '2013-12-17T00:00:00', '2013-12-17T00:00:00', 2013, 19, 30, 2),
(2, '131', 'Học kỳ 1, 2013-2014', '2014-10-01T00:00:00', '2014-10-01T00:00:00', 2013, 1, 32, 1),
(3, '152', 'Học kỳ 2, 2015 - 2016', '2015-12-21T00:00:00', '2015-12-21T00:00:00', 2015, 20, 30, 2),
(4, '141', 'Học kỳ 1, 2014-2015', '2014-08-15T00:00:00', '2014-08-15T00:00:00', 2014, 1, 16, 1),
(5, '142', 'Học kỳ 2, 2014-2015', '2015-01-10T00:00:00', '2015-01-10T00:00:00', 2014, 19, 16, 2),
(6, '151', 'Học kỳ 1, 2015-2016', '2015-09-05T00:00:00', '2015-09-05T00:00:00', 2015, 1, 32, 1),
(8, '153', 'Học kỳ phụ, 2015-2016, K39', '2016-05-23T00:00:00', '2016-05-23T00:00:00', 2015, 41, 11, 3),
(9, '161', 'Học kỳ 1, 2016-2017', '2016-08-15T00:00:00', '2016-08-15T00:00:00', 2016, 1, 23, 1),
(10, '143', 'Học kỳ phụ, 2014-2015', '2015-05-23T00:00:00', '2015-05-23T00:00:00', 2014, 0, 11, 3),
(11, '163', 'Học kỳ phụ, 2016-2017, K39-40', '2016-12-19T00:00:00', '2016-12-19T00:00:00', 2016, 19, 10, 3),
(12, '162', 'Học kỳ 2, 2016-2017', '2017-02-13T00:00:00', '2017-02-13T00:00:00', 2016, 27, 21, 2),
(13, '164', 'Học kỳ phụ, 2016-2017, K41, K42', '2017-07-03T00:00:00', '2017-07-03T00:00:00', 2016, 47, 11, 4),
(14, '171', 'Học kỳ 1, 2017-2018', '2017-08-28T00:00:00', '2017-08-28T00:00:00', 2017, 35, 24, 1),
(15, '173', 'Học kỳ phụ, 2017-2018', '2018-01-01T00:00:00', '2018-01-01T00:00:00', 2017, 1, 9, 3),
(16, '172', 'Học kỳ 2, 2017-2018', '2018-02-26T00:00:00', '2018-02-26T00:00:00', 2017, 9, 20, 2),
(17, '174', 'Học kỳ phụ, 2017-2018, K42 và K43', '2018-07-09T00:00:00', '2018-07-09T00:00:00', 2017, 28, 12, 4),
(18, '181', 'Học kỳ 1, 2018-2019', '2018-09-03T00:00:00', '2018-09-03T00:00:00', 2018, 36, 21, 1),
(19, '182', 'Học kỳ 2, 2018-2019', '2019-02-11T00:00:00', '2019-02-11T00:00:00', 2018, 7, 23, 2),
(20, '183', 'Học kỳ phụ, 2018-2019', '2019-01-14T00:00:00', '2019-01-14T00:00:00', 2018, 3, 8, 3),
(21, '184', 'Học kỳ phụ, 2018-2019, K43 và K44', '2019-07-01T00:00:00', '2019-07-01T00:00:00', 2018, 27, 12, 4),
(22, '191', 'Học kỳ 1, 2019-2020', '2019-09-02T00:00:00', '2019-09-02T00:00:00', 2019, 36, 18, 1),
(23, '193', 'Học kỳ phụ, 2019-2020', '2020-01-06T00:00:00', '2020-01-06T00:00:00', 2019, 2, 9, 3),
(24, '192', 'Học kỳ 2, 2019-2020', '2020-03-09T00:00:00', '2020-03-09T00:00:00', 2019, 11, 24, 2),
(25, '201', 'Học kỳ 1, 2020-2021', '2020-08-24T00:00:00', '2020-08-24T00:00:00', 2020, 35, 20, 1),
(26, '203', 'Học kỳ phụ, 2020-2021', '2021-01-11T00:00:00', '2021-01-11T00:00:00', 2020, 3, 9, 3),
(27, '202', 'Học kỳ 2, 2020-2021', '2021-03-15T00:00:00', '2021-03-15T00:00:00', 2020, 12, 18, 2),
(28, '204', 'Học kỳ hè, 2020-2021', '2021-07-12T00:00:00', '2021-07-12T00:00:00', 2020, 29, 8, 4),
(29, '211', 'Học kỳ 1, 2021-2022', '2021-08-02T00:00:00', '2021-08-02T00:00:00', 2021, 32, 30, 1),
(30, '213', 'Học kỳ phụ, 2021-2022', '2021-12-27T00:00:00', '2021-12-27T00:00:00', 2021, 1, 12, 3),
(31, '212', 'Học kỳ 2, 2021-2022', '2022-03-14T00:00:00', '2022-03-14T00:00:00', 2021, 12, 24, 2),
(32, '214', 'Học kỳ hè, 2021-2022', '2022-07-18T00:00:00', '2022-07-18T00:00:00', 2021, 30, 7, 4),
(33, '221', 'Học kỳ 1, 2022-2023', '2022-09-05T00:00:00', '2022-09-05T00:00:00', 2022, 37, 19, 1),
(34, '223', 'Học kỳ phụ, 2022-2023', '2023-01-30T00:00:00', '2023-01-30T00:00:00', 2022, 6, 6, 3),
(35, '222', 'Học kỳ 2, 2022-2023', '2023-03-13T00:00:00', '2023-03-13T00:00:00', 2022, 12, 19, 2),
(36, '224', 'Học kỳ hè, 2022-2023', '2023-07-03T00:00:00', '2023-07-03T00:00:00', 2022, 28, 9, 4),
(37, '231', 'Học kỳ 1, 2023-2024', '2023-08-07T00:00:00', '2023-08-07T00:00:00', 2023, 33, 25, 1),
(39, '233', 'Học kỳ phụ, 2023-2024', '2024-01-15T00:00:00', '2024-01-15T00:00:00', 2023, 4, 8, 3),
(40, '232', 'Học kỳ 2, 2023-2024', '2024-02-19T00:00:00', '2024-02-19T00:00:00', 2023, 9, 22, 2),
(41, '234', 'Học kỳ hè, 2023-2024', '2024-07-22T00:00:00', '2024-07-22T00:00:00', 2023, 31, 7, 4),
(42, '241', 'Học kỳ 1, 2024-2025', '2024-09-09T00:00:00', '2024-02-20T00:00:00', 2024, 37, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoc_phan`
--

CREATE TABLE `hoc_phan` (
  `id_hoc_phan` int(11) NOT NULL,
  `ma_hoc_phan` text NOT NULL,
  `ten_hoc_phan` text NOT NULL,
  `so_tin_chi` int(11) NOT NULL,
  `tin_chi_ly_thuyet` int(11) NOT NULL,
  `tin_chi_thuc_hanh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoc_phan`
--

INSERT INTO `hoc_phan` (`id_hoc_phan`, `ma_hoc_phan`, `ten_hoc_phan`, `so_tin_chi`, `tin_chi_ly_thuyet`, `tin_chi_thuc_hanh`) VALUES
(1, 'TH1201', 'Tin học cơ sở', 2, 2, 0),
(2, 'TH1203', 'Toán rời rạc', 2, 2, 0),
(3, 'TH1204', 'Lập trình căn bản', 3, 2, 1),
(4, 'TH1205', 'Cấu trúc máy tính', 3, 2, 1),
(5, 'TH1206', 'Cấu trúc dữ liệu và giải thuật', 3, 2, 1),
(6, 'TH1207', 'Cơ sở dữ liệu', 3, 2, 1),
(7, 'TH1208', 'Hệ điều hành', 3, 2, 1),
(8, 'TH1209', 'Lập trình hướng đối tượng', 3, 2, 1),
(9, 'TH1210', 'Đồ họa máy tính', 3, 2, 1),
(10, 'TH1211', 'Lý thuyết ngôn ngữ hình thức & tính toán', 2, 2, 0),
(11, 'TH1212', 'Phân tích & thiết kế thuật toán', 2, 2, 0),
(12, 'TH1213', 'Web – Internet', 3, 2, 1),
(13, 'TH1214', 'Mạng máy tính', 3, 2, 1),
(14, 'TH1215', 'Truyền số liệu', 2, 2, 0),
(15, 'TH1216', 'Phần mềm mã nguồn mở', 2, 1, 1),
(16, 'TH1217', 'An toàn và vệ sinh lao động trong lĩnh vực CNTT', 1, 1, 0),
(17, 'TH1218', 'Toán rời rạc nâng cao', 2, 2, 0),
(18, 'TH1219', 'Lập trình căn bản', 4, 2, 2),
(19, 'TH1220', 'Cấu trúc dữ liệu và giải thuật', 4, 2, 2),
(20, 'TH1221', 'Lập trình hướng đối tượng', 4, 2, 2),
(21, 'TH1222', 'Phân tích và thiết kế thuật toán', 3, 2, 1),
(22, 'TH1223', 'Nhập môn truyền thông đa phương tiện', 3, 3, 0),
(23, 'TH1224 ', 'Tác phẩm báo chí', 3, 3, 0),
(24, 'TH1227', 'Biên tập và soạn thảo văn bản', 2, 1, 1),
(25, 'TH1229', 'Nhập môn truyền thông đa phương tiện', 3, 2, 1),
(26, 'TH1301', 'Lập trình Windows', 3, 2, 1),
(27, 'TH1302', 'Trí tuệ nhân tạo', 2, 2, 0),
(28, 'TH1303', 'Phát triển phần mềm mã nguồn mở', 3, 2, 1),
(29, 'TH1304', 'Ngôn ngữ lập trình', 3, 2, 1),
(30, 'TH1305', 'Phân tích thiết kế hệ thống thông tin', 3, 2, 1),
(31, 'TH1306', 'Xử lý ảnh', 2, 2, 0),
(32, 'TH1307', 'Hệ quản trị cơ sở dữ liệu', 3, 2, 1),
(33, 'TH1308', 'Lập trình Web', 3, 2, 1),
(34, 'TH1309', 'Lập trình Java', 3, 2, 1),
(35, 'TH1310', 'Lập trình cơ sở dữ liệu', 3, 2, 1),
(36, 'TH1311', 'Quản trị mạng máy tính', 3, 2, 1),
(37, 'TH1312', 'Hệ thống phân tán', 2, 2, 0),
(38, 'TH1313', 'An toàn hệ thống và an ninh mạng', 3, 2, 1),
(39, 'TH1314', 'Lập trình mạng', 3, 2, 1),
(40, 'TH1315', 'Xây dựng ứng dụng phân tán', 3, 2, 1),
(41, 'TH1316', 'Thiết kế mạng máy tính', 3, 2, 1),
(42, 'TH1317', 'Xử lý tiếng nói', 3, 2, 1),
(43, 'TH1318', 'Agent và hệ agent', 2, 2, 0),
(44, 'TH1319', 'Nguyên lý máy học', 3, 2, 1),
(45, 'TH1320', 'Thị giác máy tính', 3, 2, 1),
(46, 'TH1321', 'Nhập môn công nghệ phần mềm', 3, 2, 1),
(47, 'TH1322', 'Đảm bảo chất lượng phần mềm', 3, 2, 1),
(48, 'TH1323', 'Kiểm thử phần mềm', 3, 2, 1),
(49, 'TH1324', 'Phân tích thiết kế hướng đối tượng', 3, 2, 1),
(50, 'TH1325', 'Phát triển phần mềm hướng dịch vụ', 2, 1, 1),
(51, 'TH1326', 'Tương tác người máy', 3, 2, 1),
(52, 'TH1327', 'Quản trị dự án', 3, 2, 1),
(53, 'TH1328', 'Cơ sở dữ liệu phân tán', 3, 2, 1),
(54, 'TH1329', 'Hệ thống thông tin quản lý', 3, 2, 1),
(55, 'TH1330', 'Hệ cơ sở dữ liệu đa phương tiện', 3, 2, 1),
(56, 'TH1331', 'Khai phá dữ liệu', 2, 2, 0),
(57, 'TH1332', 'Hệ trợ giúp quyết định', 3, 2, 1),
(58, 'TH1333', 'Trí tuệ nhân tạo', 3, 2, 1),
(59, 'TH1334', 'Ngôn ngữ lập trình', 2, 2, 0),
(60, 'TH1335', 'Xử lý ảnh', 3, 2, 1),
(61, 'TH1336', 'Lập trình Web', 4, 2, 2),
(62, 'TH1337', 'Lập trình DotNET', 4, 2, 2),
(63, 'TH1338', 'Lập trình ứng dụng cho thiết bị di động', 4, 2, 2),
(64, 'TH1339', 'Quản trị mạng máy tính', 3, 1, 2),
(65, 'TH1340', 'Hệ thống phân tán', 3, 2, 1),
(66, 'TH1341', 'An toàn và an ninh thông tin', 3, 2, 1),
(67, 'TH1342', 'Công nghệ mạng không dây', 2, 1, 1),
(68, 'TH1343', 'Xử lý âm thanh', 3, 2, 1),
(69, 'TH1345', 'Mô hình hóa hình học 3D', 3, 2, 1),
(70, 'TH1346', 'Khai phá dữ liệu', 3, 2, 1),
(71, 'TH1347', 'Xử lý dữ liệu lớn', 3, 2, 1),
(72, 'TH1349', 'Quản lý dự án phần mềm', 3, 2, 1),
(73, 'TH1350', 'Phát triển phần mềm nhúng', 2, 1, 1),
(74, 'TH1354', 'Anh văn chuyên ngành', 2, 2, 0),
(75, 'TH1355', 'Hệ thống nhúng', 3, 1, 2),
(76, 'TH1356', 'Mạng trong IoT', 3, 2, 1),
(77, 'TH1358', 'Bảo mật ứng dụng Web', 3, 2, 1),
(78, 'TH1359', 'Internet vạn vật', 3, 2, 1),
(79, 'TH1361', 'Ứng dụng máy học trong IoT', 2, 1, 1),
(80, 'TH1369', 'Phát triển ứng dụng IoT', 3, 1, 2),
(81, 'TH1370', 'Triển khai hệ thống mạng văn phòng', 3, 1, 2),
(82, 'TH1371', 'Công nghệ phần mềm', 2, 2, 0),
(83, 'TH1372', 'Kiểm thử và đảm bảo chất lượng phần mềm', 3, 2, 1),
(84, 'TH1373', 'Phát triển ứng dụng Web', 3, 1, 2),
(85, 'TH1374', 'Phát triển ứng dụng cho thiết bị di động', 3, 1, 2),
(86, 'TH1375', 'Lập trình game', 3, 1, 2),
(87, 'TH1376', 'Sensor và ứng dụng', 3, 1, 2),
(88, 'TH1381', 'Thị giác máy tính', 4, 2, 2),
(89, 'TH1382', 'Học sâu - Deep Learning', 4, 2, 2),
(90, 'TH1386', 'Robotic', 4, 2, 2),
(91, 'TH1390', 'Phát triển ứng dụng IoT', 4, 2, 2),
(92, 'TH1391', 'Nguyên lý máy học ', 4, 2, 2),
(93, 'TH1392', 'Phát triển phần mềm nhúng', 3, 1, 2),
(94, 'TH1395', 'Điện toán đám mây', 3, 2, 1),
(95, 'TH1396', 'Cơ sở dữ liệu phân tán', 4, 2, 2),
(96, 'TH1397', 'Lập trình .NET', 4, 2, 2),
(97, 'TH1401', 'Anh văn chuyên ngành truyền thông', 2, 2, 0),
(98, 'TH1402', 'Thiết kế Web truyền thông', 3, 2, 1),
(99, 'TH1407', 'Thiết kế ấn phẩm báo chí', 4, 2, 2),
(100, 'TH1501', 'Đồ án cơ sở ngành', 1, 0, 1),
(101, 'TH1502', 'Đồ án chuyên ngành', 1, 0, 1),
(102, 'TH1503', 'Đồ án Mạng và truyền thông', 1, 0, 1),
(103, 'TH1504', 'Đồ án Khoa học máy tính', 1, 0, 1),
(104, 'TH1505', 'Đồ án Công nghệ phần mềm', 1, 0, 1),
(105, 'TH1506', 'Đồ án Hệ thống thông tin', 1, 0, 1),
(106, 'TH1514 ', 'Thiết kế đồ họa', 3, 1, 2),
(107, 'TH1517', 'Đồ họa quảng cáo', 2, 0, 2),
(108, 'TH1518', 'Tin học ứng dụng', 3, 0, 3),
(109, 'TH1521', 'Lắp ráp cài đặt máy tính', 2, 0, 2),
(110, 'TH1522', 'Tin học ứng dụng', 2, 0, 2),
(111, 'TH1525', 'Thiết kế diễn đàn trực tuyến', 2, 0, 2),
(112, 'TH1526', 'Hệ thống thông tin quang', 2, 0, 2),
(113, 'TH1601', 'Thực tập tốt nghiệp', 2, 0, 2),
(114, 'TH1602', 'Khóa luận tốt nghiệp', 10, 6, 4),
(115, 'TH1603', 'Phát triển hệ thống thương mại điện tử', 3, 2, 1),
(116, 'TH1604', 'Phát triển ứng dụng cho thiết bị di động', 4, 2, 2),
(117, 'TH1605', 'Kiến trúc và thuật toán song song', 3, 2, 1),
(118, 'TH1606', 'Thương mại điện tử', 3, 2, 1),
(119, 'TH1607', 'Cơ sở dữ liệu phân tán', 3, 2, 1),
(120, 'TH1512', 'Đồ án CNTT 2', 2, 0, 2),
(121, 'TH1507', 'Đồ án CNTT 1', 1, 0, 1),
(122, 'TH1388', 'Xử lý video ', 4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lich_day`
--

CREATE TABLE `lich_day` (
  `ma_hoc_phan` varchar(255) DEFAULT NULL,
  `id_hoc_phan` int(11) NOT NULL,
  `noi_dung_giang_day` text,
  `bai_giang` int(11) DEFAULT NULL,
  `bai_tap` int(11) DEFAULT NULL,
  `thuc_hanh` int(11) DEFAULT NULL,
  `thoi_gian_thuc_te` int(11) DEFAULT NULL,
  `cong_viec_chuan_bi` text,
  `ghi_chu` text,
  `id_don_vi` int(11) NOT NULL,
  `id_hoc_ky` int(11) NOT NULL,
  `id_giang_vien` int(11) NOT NULL,
  `gv_giang_day_chinh` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lich_day`
--

INSERT INTO `lich_day` (`ma_hoc_phan`, `id_hoc_phan`, `noi_dung_giang_day`, `bai_giang`, `bai_tap`, `thuc_hanh`, `thoi_gian_thuc_te`, `cong_viec_chuan_bi`, `ghi_chu`, `id_don_vi`, `id_hoc_ky`, `id_giang_vien`, `gv_giang_day_chinh`) VALUES
('224_1TH1526_KS2A_tructiep (33 sv)', 112, 'Chương 1', 2, 1, 1, NULL, 'Đề cương bài giảng\nSlide bài giảng', NULL, 2, 36, 344, 'Nguyễn Hoàng Anh'),
('224_1TH1526_KS2A_tructiep (33 sv)', 112, 'Chương 2', 2, 1, 1, NULL, 'Đề cương bài giảng\nSlide bài giảng', '01 tiết trực tuyến', 2, 36, 344, 'Nguyễn Hoàng Anh'),
('224_1TH1526_KS2A_tructiep (33 sv)', 112, 'Chương 3', 2, 1, 1, NULL, 'Đề cương bài giảng\nSlide bài giảng', NULL, 2, 36, 344, 'Nguyễn Hoàng Anh'),
('224_1TH1526_KS2A_tructiep (33 sv)', 112, 'Chương 4', 2, 1, 1, NULL, 'Đề cương bài giảng\nSlide bài giảng', NULL, 2, 36, 344, 'Nguyễn Hoàng Anh'),
('224_1TH1526_KS2A_tructiep (33 sv)', 112, 'Chương 5', 2, 1, 1, NULL, 'Đề cương bài giảng\nSlide bài giảng', '01 tiết trực tuyến', 2, 36, 344, 'Nguyễn Hoàng Anh'),
('223_1TH1526_KS2A_tructiep (19 sv)', 112, 'Chương 1', 2, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 34, 344, 'Nguyễn Hoàng Anh'),
('223_1TH1526_KS2A_tructiep (19 sv)', 112, 'Chương 2', 2, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', '01 tiết trực tuyến', 2, 34, 344, 'Nguyễn Hoàng Anh'),
('223_1TH1526_KS2A_tructiep (19 sv)', 112, 'Chương 3', 2, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 34, 344, 'Nguyễn Hoàng Anh'),
('223_1TH1526_KS2A_tructiep (19 sv)', 112, 'Chương 4', 2, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 34, 344, 'Nguyễn Hoàng Anh'),
('223_1TH1526_KS2A_tructiep (19 sv)', 112, 'Chương 5', 2, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', '01 tiết trực tuyến', 2, 34, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', '01 tiết trực tuyến', 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', '01 tiết trực tuyến', 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', '01 tiết trực tuyến', 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', '01 tiết trực tuyến', 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', '01 tiết trực tuyến', 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', '01 tiết trực tuyến', 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 37, 344, 'Nguyễn Hoàng Anh'),
('231_1TH1342_KS2A_tructiep (21 sv)', 67, NULL, NULL, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng', NULL, 2, 37, 344, 'Nguyễn Hoàng Anh'),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221D_1TH1338_K46_VL (20 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('221_1TH1338_KS2A_03_tructiep (72 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('222_1TH1338_KS2A_tructiep (12 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_01_tructiep (63 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_02_tructiep (62 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('231_1TH1338_KS2A_03_tructiep (52 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('232_1TH1338_KS2A_tructiep (38 sv)', 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 33, 411, NULL),
('TH1309', 34, '123', NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, '123', NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, '123', NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, '123', NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, '123', NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1336', 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, '123', NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('TH1309_(BT)', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, NULL),
('233_1TH1373_KS2A_tructiep (4 sv)', 84, '21312313131', NULL, NULL, NULL, NULL, NULL, NULL, 2, 39, 411, NULL),
('233_1TH1373_KS2A_tructiep (4 sv)', 84, '13131313', NULL, NULL, NULL, NULL, NULL, NULL, 2, 39, 411, NULL),
('233_1TH1373_KS2A_tructiep (4 sv)', 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 39, 411, NULL),
('233_1TH1373_KS2A_tructiep (4 sv)', 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 39, 411, NULL),
('233_1TH1373_KS2A_tructiep (4 sv)', 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 39, 411, NULL),
('TH1373', 84, '21312313', NULL, NULL, NULL, NULL, '123', NULL, 2, 39, 411, NULL),
('TH1373', 84, '123', NULL, NULL, NULL, NULL, NULL, NULL, 2, 39, 411, NULL),
('TH1373', 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 39, 411, NULL),
('TH1373', 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 39, 411, NULL),
('TH1373', 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 39, 411, NULL),
('TH1307', 32, '123', NULL, NULL, NULL, NULL, NULL, 'abc', 2, 40, 411, ''),
('TH1307', 32, '123', NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, 'abvc', NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1307', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 411, ''),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, 'ávdsav', NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1525', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 40, 1513, NULL),
('TH1369', 80, 'CHƯƠNG 1: TỔNG QUAN VỀ INTERNET VÀ INTERNET OF THINGS\r\nCHƯƠNG 2: KIẾN THỨC NỀN TẢNG', 3, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'TRẦN PHAN AN TRƯỜNG, TRẦN HỒ ĐẠT, TRẦN THU MAI'),
('TH1369', 80, 'CHƯƠNG 2: KIẾN THỨC NỀN TẢNG (tt)\r\nCHƯƠNG 3: GIỚI THIỆU VỀ CÁC BOARD MẠCH IOT PHỔ BIẾN', 3, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'TRẦN PHAN AN TRƯỜNG, TRẦN HỒ ĐẠT, TRẦN THU MAI'),
('TH1369', 80, 'CHƯƠNG 3: GIỚI THIỆU VỀ CÁC BOARD MẠCH IOT PHỔ BIẾN (tt)', 3, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', NULL, 2, 40, 374, 'TRẦN PHAN AN TRƯỜNG, TRẦN HỒ ĐẠT, TRẦN THU MAI'),
('TH1369', 80, 'CHƯƠNG 3: GIỚI THIỆU VỀ CÁC BOARD MẠCH IOT PHỔ BIẾN (tt)\r\nCHƯƠNG 4: PHÁT TRIỂN ỨNG DỤNG IOT', 2, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'TRẦN PHAN AN TRƯỜNG, TRẦN HỒ ĐẠT, TRẦN THU MAI'),
('TH1369', 80, 'CHƯƠNG 4: PHÁT TRIỂN ỨNG DỤNG IOT', 2, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', NULL, 2, 40, 374, 'TRẦN PHAN AN TRƯỜNG, TRẦN HỒ ĐẠT, TRẦN THU MAI'),
('TH1361', 79, 'CHƯƠNG 1: TỔNG QUAN ỨNG DỤNG TRÍ TUỆ NHÂN TẠO TRONG IOT', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'Trần Phan An Trường; Trần Thị Cẩm Tú'),
('TH1361', 79, 'CHƯƠNG 2: TẦM QUAN TRỌNG CỦA MACHINE LEARNING TRONG IOT', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'Trần Phan An Trường; Trần Thị Cẩm Tú'),
('TH1361', 79, 'CHƯƠNG 3: LẬP TRÌNH MACHINE LEARNING TRONG IOT', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'Trần Phan An Trường; Trần Thị Cẩm Tú'),
('TH1361', 79, 'CHƯƠNG 4: MỘT SỐ ỨNG DỤNG MACHINE LEARNING TRONG IOT', 1, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '', 2, 40, 374, 'Trần Phan An Trường; Trần Thị Cẩm Tú'),
('TH1361', 79, 'CHƯƠNG 4: MỘT SỐ ỨNG DỤNG MACHINE LEARNING TRONG IOT (tt)', 1, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '', 2, 40, 374, 'Trần Phan An Trường; Trần Thị Cẩm Tú'),
('TH1356', 76, 'CHƯƠNG 1: TỔNG QUAN VỀ HỆ THỐNG MẠNG IOT\r\n- Giới thiệu\r\n- Một số mô hình mạng IoT', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 1: TỔNG QUAN VỀ HỆ THỐNG MẠNG IOT (tt)\r\n- So sánh các kiến trúc mạng IoT\r\n- Đơn giản hóa kiến trúc IoT', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 1: TỔNG QUAN VỀ HỆ THỐNG MẠNG IOT (tt)\r\nCHƯƠNG 2: ĐỐI TƯỢNG THÔNG MINH\r\n-  Cảm biến\r\n- Actuators', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 2: ĐỐI TƯỢNG THÔNG MINH (tt)\r\n-  Micro-Electro-Mechanical Systems (MEMS)', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 3: THIẾT KẾ VÀ KIẾN TRÚC MẠNG IOT\r\n- Kiến trúc mạng IoT', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 3: THIẾT KẾ VÀ KIẾN TRÚC MẠNG IOT (tt)\r\n- Các tính năng quan trọng trong kiến trúc bảo mật IoT', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 3: THIẾT KẾ VÀ KIẾN TRÚC MẠNG IOT (tt)\r\n- Các nguyên tắc kiến trúc bảo mật IoT trên lớp thiết bị', 1, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 3: THIẾT KẾ VÀ KIẾN TRÚC MẠNG IOT (tt)\r\n- An toàn bảo mật trên lớp giao tiếp', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 3: THIẾT KẾ VÀ KIẾN TRÚC MẠNG IOT (tt)\r\n- Các nguyên tắc kiến trúc an toàn bảo mật IoT trên lớp giao tiếp\r\n- So sánh kiến trúc IoT', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 4: MẠNG KỸ THUẬT IOT\r\n- Cảm biến, cơ cấu kích động và các đối tượng thông minh.', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 4: MẠNG KỸ THUẬT IOT (tt)\r\n- Cảm biến, cơ cấu kích động và các đối tượng thông minh.', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '1 tiết trực tuyến', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 4: MẠNG KỸ THUẬT IOT (tt)\r\n- Mạng cảm biến', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 4: MẠNG KỸ THUẬT IOT (tt)\r\n- Các tiêu chuẩn truyền thông\r\n- Kỹ thuật truy cập IoT', 1, 1, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'CHƯƠNG 4: MẠNG KỸ THUẬT IOT (tt)\r\n- Giao thức ứng dụng IoT\r\n- Dữ liệu và phân tích dữ liệu IoT', 2, NULL, NULL, NULL, 'Đề cương bài giảng\r\nSlide bài giảng\r\nVideo bài giảng', '', 2, 40, 374, 'Trần Thái Bảo'),
('TH1356', 76, 'Kiểm tra và đánh giá', 2, NULL, NULL, NULL, '', '', 2, 40, 374, 'Trần Thái Bảo'),
('TH1376', 87, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1376', 87, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1376', 87, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1376', 87, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1376', 87, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, 'abc', 10, 10, 10, NULL, 'abc', '3 giờ trực tuyến', 2, 42, 411, NULL),
('TH1338', 63, 'abc', NULL, NULL, NULL, NULL, '', '3 giờ trực tuyến', 2, 42, 411, NULL),
('TH1338', 63, 'abc', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, 'abc', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '1111', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL),
('TH1338', 63, '', NULL, NULL, NULL, NULL, '', '', 2, 42, 411, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lich_day_th`
--

CREATE TABLE `lich_day_th` (
  `ma_hoc_phan` text,
  `id_hoc_phan` int(11) DEFAULT NULL,
  `id_don_vi` int(11) DEFAULT NULL,
  `id_hoc_ky` int(11) DEFAULT NULL,
  `id_giang_vien` int(11) DEFAULT NULL,
  `gv_giang_day_chinh` text,
  `ghi_chu` text,
  `noi_dung` text,
  `ten_de_muc` text,
  `so_gio_quy_dinh` text,
  `thu_tu_bai_hoc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lich_day_th`
--

INSERT INTO `lich_day_th` (`ma_hoc_phan`, `id_hoc_phan`, `id_don_vi`, `id_hoc_ky`, `id_giang_vien`, `gv_giang_day_chinh`, `ghi_chu`, `noi_dung`, `ten_de_muc`, `so_gio_quy_dinh`, `thu_tu_bai_hoc`) VALUES
('TH1314_(BT)', 39, 2, 40, 411, '123123321', 'ưqeqưeqe', NULL, 'ưeqưeqưe', NULL, NULL),
('TH1314_(BT)', 39, 2, 40, 411, '123123321', 'eqeqeqe', NULL, 'eqeqeqe', 'eqeqeq', NULL),
('TH1314_(BT)', 39, 2, 40, 411, '123123321', NULL, NULL, 'eqeqe', NULL, NULL),
('TH1314_(BT)', 39, 2, 40, 411, '123123321', NULL, NULL, NULL, NULL, NULL),
('TH1314_(BT)', 39, 2, 40, 411, '123123321', NULL, NULL, NULL, NULL, NULL),
('TH1314_(BT)', 39, 2, 40, 411, '123123321', NULL, NULL, NULL, NULL, NULL),
('TH1314_(BT)', 39, 2, 40, 411, '123123321', NULL, NULL, NULL, NULL, NULL),
('TH1314_(BT)', 39, 2, 40, 411, '123123321', NULL, NULL, NULL, NULL, NULL),
('TH1314_(BT)', 39, 2, 40, 411, '123123321', NULL, NULL, NULL, NULL, NULL),
('TH1314_(BT)', 39, 2, 40, 411, '123123321', NULL, NULL, NULL, NULL, NULL),
('TH1607_(BT)', 119, 2, 37, 411, 'abc', '123', 'bád', 'abc', 'abc', NULL),
('TH1607_(BT)', 119, 2, 37, 411, 'abc', '123', 'bád', 'abc', 'abc', NULL),
('TH1607_(BT)', 119, 2, 37, 411, 'abc', '123', 'bád', 'abc', 'abc', NULL),
('TH1607_(BT)', 119, 2, 37, 411, 'abc', '123', 'bád', 'abc', 'abc', NULL),
('TH1607_(BT)', 119, 2, 37, 411, 'abc', '123', 'bád', 'abc', 'abc', NULL),
('TH1607_(BT)', 119, 2, 37, 411, 'abc', '123', 'bád', 'abc', 'abc', NULL),
('TH1607_(BT)', 119, 2, 37, 411, 'abc', '123', NULL, 'abc', 'abc', NULL),
('TH1607_(BT)', 119, 2, 37, 411, 'abc', '123', NULL, 'abc', NULL, NULL),
('TH1607_(BT)', 119, 2, 37, 411, 'abc', '123', NULL, 'abc', NULL, NULL),
('TH1373_(BT)', 84, 2, 39, 411, 'Trần Thị Kim Ngân', 'nghỉ', 'ád', '12321', '123', NULL),
('TH1373_(BT)', 84, 2, 39, 411, 'Trần Thị Kim Ngân', NULL, 'ád', '123312', '1sdf', NULL),
('TH1373_(BT)', 84, 2, 39, 411, 'Trần Thị Kim Ngân', NULL, NULL, '12312', 'sadfsadf', NULL),
('TH1373_(BT)', 84, 2, 39, 411, 'Trần Thị Kim Ngân', NULL, NULL, '123123', 'fsda', NULL),
('TH1373_(BT)', 84, 2, 39, 411, 'Trần Thị Kim Ngân', NULL, NULL, '123', '123', NULL),
('TH1219_(BT)', 18, 2, 40, 1513, NULL, NULL, NULL, 'sdbsfb', NULL, NULL),
('TH1219_(BT)', 18, 2, 40, 1513, NULL, NULL, NULL, NULL, NULL, NULL),
('TH1219_(BT)', 18, 2, 40, 1513, NULL, NULL, NULL, NULL, NULL, NULL),
('TH1219_(BT)', 18, 2, 40, 1513, NULL, NULL, NULL, NULL, NULL, NULL),
('TH1219_(BT)', 18, 2, 40, 1513, NULL, NULL, NULL, NULL, NULL, NULL),
('TH1219_(BT)', 18, 2, 40, 1513, NULL, NULL, NULL, NULL, NULL, NULL),
('TH1219_(BT)', 18, 2, 40, 1513, NULL, NULL, NULL, NULL, NULL, NULL),
('TH1219_(BT)', 18, 2, 40, 1513, NULL, NULL, NULL, NULL, NULL, NULL),
('TH1219_(BT)', 18, 2, 40, 1513, NULL, NULL, NULL, NULL, NULL, NULL),
('TH1219_(BT)', 18, 2, 40, 1513, NULL, NULL, NULL, NULL, NULL, NULL),
('TH1356_(BT)', 76, 2, 40, 374, 'Trần Phan An Trường', '1 giờ\r\ntrực tuyến', 'Tìm hiểu và cài đặt về các phần mền lập trình, mô phỏng mạng trong IoT', 'TÌM HIỂU VÀ CÀI ĐẶT MỘT SỐ ĐỐI TƯỢNG THÔNG MINH TRONG MẠNG IOT', '3', NULL),
('TH1356_(BT)', 76, 2, 40, 374, 'Trần Phan An Trường', '1 giờ\r\ntrực tuyến', 'Tìm hiểu và cài đặt một số đối tượng thông minh mạng trong IoT', 'TÌM HIỂU VÀ CÀI ĐẶT MỘT SỐ ĐỐI TƯỢNG THÔNG MINH TRONG MẠNG IOT  (tt)', '3', NULL),
('TH1356_(BT)', 76, 2, 40, 374, 'Trần Phan An Trường', '1 giờ\r\ntrực tuyến', 'Tìm hiểu và thiết kế một số kiến trúc mạng IoT phổ biến', 'THIẾT KẾ MỘT SỐ KIẾN TRÚC MẠNG IOT PHỔ BIẾN', '3', NULL),
('TH1356_(BT)', 76, 2, 40, 374, 'Trần Phan An Trường', '', 'Tìm hiểu và thiết kế một số kiến trúc mạng IoT phổ biến (tt)', 'THIẾT KẾ MỘT SỐ KIẾN TRÚC MẠNG IOT PHỔ BIẾN (tt)', '3', NULL),
('TH1356_(BT)', 76, 2, 40, 374, 'Trần Phan An Trường', '1 giờ\r\ntrực tuyến', 'Tìm hiểu và xây dựng mô hình mạng truyền thông không dây', 'TÌM HIỂU VÀ XÂY DỰNG MÔ HÌNH MẠNG TRUYỀN THÔNG KHÔNG DÂY', '3', NULL),
('TH1356_(BT)', 76, 2, 40, 374, 'Trần Phan An Trường', '', 'Tìm hiểu và xây dựng mô hình mạng truyền thông không dây (tt)', 'TÌM HIỂU VÀ XÂY DỰNG MÔ HÌNH MẠNG TRUYỀN THÔNG KHÔNG DÂY (tt)', '3', NULL),
('TH1356_(BT)', 76, 2, 40, 374, 'Trần Phan An Trường', '1 giờ\r\ntrực tuyến', 'Xây dựng giao thức truyền thông của mạng cảm biến không dây', 'XÂY DỰNG GIAO THỨC TRUYỀN THÔNG CỦA MẠNG CẢM BIẾN KHÔNG DÂY', '3', NULL),
('TH1356_(BT)', 76, 2, 40, 374, 'Trần Phan An Trường', '', 'Xây dựng giao thức truyền thông của mạng cảm biến không dây (tt)', 'XÂY DỰNG GIAO THỨC TRUYỀN THÔNG CỦA MẠNG CẢM BIẾN KHÔNG DÂY (tt)', '3', NULL),
('TH1356_(BT)', 76, 2, 40, 374, 'Trần Phan An Trường', '1 giờ\r\ntrực tuyến', 'Vận dụng các kỹ thuật truy cập IoT thực hiện truy cập và lấy dữ liệu từ các thiết bị cảm biến', 'VẬN DỤNG CÁC KỸ THUẬT TRUY CẬP IOT THỰC HIỆN TRUY CẬP VÀ LẤY DỮ LIỆU TỪ CÁC THIẾT BỊ CẢM BIẾN', '3', NULL),
('TH1356_(BT)', 76, 2, 40, 374, 'Trần Phan An Trường', '', 'Vận dụng các kỹ thuật truy cập iot thực hiện truy cập và lấy dữ liệu từ các thiết bị cảm biến (tt)', 'VẬN DỤNG CÁC KỸ THUẬT TRUY CẬP IOT THỰC HIỆN TRUY CẬP VÀ LẤY DỮ LIỆU TỪ CÁC THIẾT BỊ CẢM BIẾN (tt)', '3', NULL),
('TH1338_(BT)', 63, 2, 42, 411, NULL, '1', '', '', '1', '1'),
('TH1338_(BT)', 63, 2, 42, 411, NULL, '', '', '', '1', '1'),
('TH1338_(BT)', 63, 2, 42, 411, NULL, '', '', '', NULL, NULL),
('TH1338_(BT)', 63, 2, 42, 411, NULL, '', '', '', NULL, NULL),
('TH1338_(BT)', 63, 2, 42, 411, NULL, '', '', '', NULL, NULL),
('TH1338_(BT)', 63, 2, 42, 411, NULL, '', '', '', NULL, NULL),
('TH1338_(BT)', 63, 2, 42, 411, NULL, '', '', '', NULL, NULL),
('TH1338_(BT)', 63, 2, 42, 411, NULL, '', '', '', NULL, NULL),
('TH1338_(BT)', 63, 2, 42, 411, NULL, '', '', '', NULL, NULL),
('TH1338_(BT)', 63, 2, 42, 411, NULL, '', '', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crawl`
--
ALTER TABLE `crawl`
  ADD PRIMARY KEY (`magv`);

--
-- Indexes for table `data_crawl_from_vlute_ems`
--
ALTER TABLE `data_crawl_from_vlute_ems`
  ADD PRIMARY KEY (`ma_hoc_phan`),
  ADD KEY `fk1` (`id_giang_vien`),
  ADD KEY `fk2` (`id_hoc_ky`);

--
-- Indexes for table `don_vi`
--
ALTER TABLE `don_vi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD PRIMARY KEY (`id_giang_vien`),
  ADD KEY `FK_GV_Khoa` (`id_don_vi`);

--
-- Indexes for table `hoc_ky`
--
ALTER TABLE `hoc_ky`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoc_phan`
--
ALTER TABLE `hoc_phan`
  ADD PRIMARY KEY (`id_hoc_phan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `don_vi`
--
ALTER TABLE `don_vi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hoc_phan`
--
ALTER TABLE `hoc_phan`
  MODIFY `id_hoc_phan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_crawl_from_vlute_ems`
--
ALTER TABLE `data_crawl_from_vlute_ems`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_giang_vien`) REFERENCES `giang_vien` (`id_giang_vien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_hoc_ky`) REFERENCES `hoc_ky` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD CONSTRAINT `FK_GV_DV` FOREIGN KEY (`id_don_vi`) REFERENCES `don_vi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
