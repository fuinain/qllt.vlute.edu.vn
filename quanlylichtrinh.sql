-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2024 at 12:46 AM
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
-- Database: `quanlylichtrinh`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `EncryptIDs` ()   BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE tableName VARCHAR(100);
    DECLARE idColumn VARCHAR(100);
    DECLARE cur CURSOR FOR 
        SELECT TABLE_NAME, COLUMN_NAME
        FROM information_schema.columns
        WHERE TABLE_SCHEMA = 'quanlylichtrinh' AND COLUMN_NAME LIKE 'id_%';

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    OPEN cur;

    read_loop: LOOP
        FETCH cur INTO tableName, idColumn;
        IF done THEN
            LEAVE read_loop;
        END IF;

        SET @sql = CONCAT('UPDATE ', tableName, ' SET ', idColumn, '=AES_ENCRYPT(', idColumn, ', "fuinain2409@$)(");');
        PREPARE stmt FROM @sql;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;
    END LOOP;

    CLOSE cur;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `AES_DECRYPT_ID` (`input` VARBINARY(255)) RETURNS INT(11) DETERMINISTIC BEGIN
    DECLARE decrypted_value INT;
    SET decrypted_value = CAST(AES_DECRYPT(input, 'fuinain2409@$)(') AS UNSIGNED);
    RETURN decrypted_value;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `AES_ENCRYPT_ID` (`input` INT) RETURNS VARBINARY(255) DETERMINISTIC BEGIN
    RETURN AES_ENCRYPT(CAST(input AS CHAR), 'fuinain2409@$)(');
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `giang_vien`
--

CREATE TABLE `giang_vien` (
  `id_giang_vien` int(11) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `hoc_vi` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `cccd` varchar(12) NOT NULL,
  `ngay_sinh` datetime NOT NULL,
  `so_dien_thoai` varchar(10) NOT NULL,
  `id_khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoc_ky`
--

CREATE TABLE `hoc_ky` (
  `id_hoc_ky` int(11) NOT NULL,
  `hoc_ky` int(11) NOT NULL,
  `tu_nam` int(11) NOT NULL,
  `den_nam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoc_phan`
--

CREATE TABLE `hoc_phan` (
  `id_hoc_phan` int(11) NOT NULL,
  `ma_hoc_phan` varchar(50) NOT NULL,
  `ten_hoc_phan` varchar(50) NOT NULL,
  `so_tin_chi` int(11) NOT NULL,
  `so_gio_hoc` int(11) NOT NULL,
  `so_gio_ly_thuyet` int(11) NOT NULL,
  `ngay_hieu_luc` int(11) NOT NULL,
  `si_so` int(11) NOT NULL,
  `id_giang_vien` int(11) NOT NULL,
  `id_khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(11) NOT NULL,
  `ma_khoa` varchar(10) NOT NULL,
  `ten_khoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `ma_khoa`, `ten_khoa`) VALUES
(1, 'CTT', 'Công Nghệ Thông Tin');

-- --------------------------------------------------------

--
-- Table structure for table `lich_giang_day`
--

CREATE TABLE `lich_giang_day` (
  `id_lich` int(11) NOT NULL,
  `id_hoc_phan` int(11) NOT NULL,
  `id_giang_vien` int(11) NOT NULL,
  `thoi_gian_bat_dau` datetime NOT NULL,
  `thoi_gian_ket_thuc` datetime NOT NULL,
  `phong_hoc` varchar(10) NOT NULL,
  `hinh_thuc_giang_day` varchar(50) NOT NULL,
  `ngay_trong_tuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nhat_ky`
--

CREATE TABLE `nhat_ky` (
  `id_tai_khoan` int(11) NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id_tai_khoan` int(11) NOT NULL,
  `ho_ten` text NOT NULL,
  `email` text NOT NULL,
  `quyen` text NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id_tai_khoan`, `ho_ten`, `email`, `quyen`, `ngay_tao`) VALUES
(1, 'admin', 'huynhtuananh24092003@gmail.com', 'admin', '2024-04-01 12:49:10'),
(2, 'giang vien', '21004266@st.vlute.edu.vn', 'giangvien', '2024-04-01 12:49:10'),
(3, 'thu ky', 'fuinain4266@gmail.com', 'thuky', '2024-04-01 12:49:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD PRIMARY KEY (`id_giang_vien`),
  ADD KEY `FK_GV_Khoa` (`id_khoa`);

--
-- Indexes for table `hoc_ky`
--
ALTER TABLE `hoc_ky`
  ADD PRIMARY KEY (`id_hoc_ky`);

--
-- Indexes for table `hoc_phan`
--
ALTER TABLE `hoc_phan`
  ADD PRIMARY KEY (`id_hoc_phan`),
  ADD KEY `FK_HocPhan` (`id_khoa`),
  ADD KEY `FK_hocphan_giangvien` (`id_giang_vien`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`);

--
-- Indexes for table `lich_giang_day`
--
ALTER TABLE `lich_giang_day`
  ADD PRIMARY KEY (`id_lich`),
  ADD KEY `FK_LichGiangDay_HocPhan` (`id_hoc_phan`),
  ADD KEY `FK_LichGiangDay_GiangVien` (`id_giang_vien`);

--
-- Indexes for table `nhat_ky`
--
ALTER TABLE `nhat_ky`
  ADD KEY `fk_nhatky_taikhoan` (`id_tai_khoan`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id_tai_khoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giang_vien`
--
ALTER TABLE `giang_vien`
  MODIFY `id_giang_vien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoc_ky`
--
ALTER TABLE `hoc_ky`
  MODIFY `id_hoc_ky` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoc_phan`
--
ALTER TABLE `hoc_phan`
  MODIFY `id_hoc_phan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lich_giang_day`
--
ALTER TABLE `lich_giang_day`
  MODIFY `id_lich` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id_tai_khoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD CONSTRAINT `FK_GV_Khoa` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoc_phan`
--
ALTER TABLE `hoc_phan`
  ADD CONSTRAINT `FK_hocphan_giangvien` FOREIGN KEY (`id_giang_vien`) REFERENCES `giang_vien` (`id_giang_vien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_hocphan_khoa` FOREIGN KEY (`id_khoa`) REFERENCES `khoa` (`id_khoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lich_giang_day`
--
ALTER TABLE `lich_giang_day`
  ADD CONSTRAINT `FK_LichGiangDay_GiangVien` FOREIGN KEY (`id_giang_vien`) REFERENCES `giang_vien` (`id_giang_vien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LichGiangDay_HocPhan` FOREIGN KEY (`id_hoc_phan`) REFERENCES `hoc_phan` (`id_hoc_phan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nhat_ky`
--
ALTER TABLE `nhat_ky`
  ADD CONSTRAINT `fk_nhatky_taikhoan` FOREIGN KEY (`id_tai_khoan`) REFERENCES `tai_khoan` (`id_tai_khoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
