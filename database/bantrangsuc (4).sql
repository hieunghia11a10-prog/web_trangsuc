-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2026 at 01:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bantrangsuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `MaBV` int(11) NOT NULL,
  `TieuDe` varchar(200) DEFAULT NULL,
  `NoiDung` text DEFAULT NULL,
  `HinhAnh` varchar(100) DEFAULT NULL,
  `NgayDang` date DEFAULT NULL,
  `TrangThai` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`MaBV`, `TieuDe`, `NoiDung`, `HinhAnh`, `NgayDang`, `TrangThai`) VALUES
(1, 'Quy trình chế tác trang sức bạc gồm những giai đoạn nào?', 'Quy trình chế tác trang sức bạc gồm những giai đoạn nào? Quy trình chế tác trang sức bạc là một hành trình tỉ mỉ, kết hợp giữa kỹ thuật thủ công và khối óc sáng tạo. Mỗi sản phẩm hoàn chỉnh đều trải qua nhiều công đoạn khác nhau, từ khâu lên ý tưởng, tạo hình, đến hoàn thiện chi tiết. Quá trình này đều đòi hỏi sự ch...', 'banner1.jpg', '2026-03-19', 1),
(10, 'Top 10 món quà tặng sinh nhật cho bạn gái ý nghĩa, tinh tế', 'Tặng quà sinh nhật cho bạn gái là dịp lý tưởng để thể hiện tình cảm và sự quan tâm. Vậy nên tặng quà sinh nhật gì cho bạn gái? Để giúp bạn làm cho ngày đặc biệt này trở nên đáng nhớ, Kat Jewelry đã tổng hợp danh sách Top 10 món quà tặng sinh nhật cho bạn gái ý nghĩa, tinh tế. Hãy cùng chúng tôi khám phá những ý tưởng...', 'banner2.jpg', '2026-03-19', 1),
(11, 'Hướng dẫn đo size dây chuyền đơn giản, chính xác', 'Hướng dẫn đo size dây chuyền đơn giản, chính xác Việc lựa chọn size dây chuyền đôi khi khiến bạn cảm thấy khá khó khăn. Tuy nhiên, với một chút kiến thức cơ bản về các độ dài dây chuyền và cách đo size, bạn hoàn toàn có thể tự tin lựa chọn và tạo nên những set đồ thời trang ấn tượng. Hãy để KaT Jewelry hướng dẫn bạn...', 'banner10.jpg', '2026-03-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaCT` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `Gia` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaCT`, `MaDH`, `MaSP`, `SoLuong`, `Gia`) VALUES
(1, 22, 4, 3, 2500000),
(2, 22, 4, 3, 2500000),
(3, 23, 4, 3, 2500000),
(4, 23, 4, 3, 2500000),
(5, 24, 2, 6, 3500000),
(6, 25, 2, 6, 3500000),
(7, 26, 5, 1, 5000000),
(8, 27, 5, 1, 5000000),
(9, 28, 5, 1, 5000000),
(10, 29, 3, 1, 1200000),
(11, 29, 2, 2, 1895000),
(12, 30, 2, 1, 1895000),
(13, 30, 8, 1, 5995000),
(14, 31, 6, 2, 35500000),
(15, 31, 1, 1, 1795000),
(16, 31, 3, 1, 1200000),
(17, 32, 1, 1, 1795000),
(18, 32, 3, 1, 1200000),
(19, 32, 8, 1, 5995000);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `TenKhach` varchar(200) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `DiaChi` varchar(200) DEFAULT NULL,
  `NgayDat` date DEFAULT NULL,
  `TongTien` double DEFAULT NULL,
  `TrangThai` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'Chưa thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDH`, `TenKhach`, `DienThoai`, `DiaChi`, `NgayDat`, `TongTien`, `TrangThai`) VALUES
(1, 'le hieu nghia', '0394.999.222', 'ghjghjghj', '2026-03-18', 1200000, 'paid'),
(6, 'sFsS', '0394.999.222', 'ghjghjghj', '2026-03-18', 35500000, 'paid'),
(10, 'sFsS', '5433636', 'ghjghjghj', '2026-03-19', 1795000, 'paid'),
(15, 'fFFsz', '5433636', 'ghjghjghj', '2026-03-19', 3500000, 'paid'),
(19, 'sFsS', '5433636', 'ghjghjghj', '2026-03-19', 3500000, 'pending'),
(22, 'sFsS', '5433636', 'ghjghjghj', '2026-03-19', 15000000, 'pending'),
(23, 'sFsS', '1', 'ghjghjghj', '2026-03-19', 15000000, 'pending'),
(24, 'fFFsz', '2', 'ghjghjghj', '2026-03-19', 21000000, 'pending'),
(25, 'sFsS', '1', 'ghjghjghj', '2026-03-19', 21000000, 'pending'),
(26, 'le hieu nghia', '5433636', 'ghjghjghj', '2026-03-20', 5000000, 'pending'),
(27, 'le hieu nghia', '5433636', 'ghjghjghj', '2026-03-20', 5000000, 'pending'),
(28, 'sFsS', '0394.999.222', 'ghjghjghj', '2026-03-20', 5000000, 'pending'),
(29, 'le hieu nghia', '5433636', 'ghjghjghj', '2026-03-20', 4990000, 'pending'),
(30, 'le hieu nghia', '0394.999.222', 'ghjghjghj', '2026-03-20', 7890000, 'paid'),
(31, 'le hieu nghia', '5433636', 'ghjghjghj', '2026-03-20', 73995000, 'paid'),
(32, 'aaaaaaaaaa', '1', 'ghjghjghj', '2026-03-20', 8990000, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoai`, `TenLoai`) VALUES
(1, 'Nhẫn'),
(2, 'Dây chuyền'),
(3, 'Bông tai'),
(4, 'Vòng tay');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `IDUser` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `PhanQuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`IDUser`, `Username`, `Password`, `PhanQuyen`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'hieunghia', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(200) DEFAULT NULL,
  `Gia` double DEFAULT NULL,
  `HinhAnh` varchar(100) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `MaLoai` int(11) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Gia`, `HinhAnh`, `MoTa`, `MaLoai`, `TrangThai`) VALUES
(1, 'Dây chuyền Vàng trắng Ý 75% (18K) PNJ 0000W001076', 1795000, 'daychuyen1.png', 'Chất liệu tiêu chuẩn: Chế tác từ Bạc Ý 925 cao cấp (92,5% bạc nguyên chất), mang lại độ cứng hoàn hảo để tạo hình các chi tiết thanh mảnh, sắc sảo.\r\n', 2, 1),
(2, 'Dây chuyền Bạc Ý PNJSilver 0000W060094', 1895000, 'daychuyen2.png', 'Chế tác từ vàng chuẩn tuổi (vàng 10K, 14K, 18K hoặc vàng 24K), đảm bảo giá trị tích lũy và vẻ ngoài rực rỡ, sang trọng.', 2, 1),
(3, 'Bông tai bạc SJC', 1200000, 'bongtai1.jpg', 'Bông tai bạc sang trọng', 3, 1),
(4, 'Vòng tay vàng DOJI', 2500000, 'vong1.png', 'Vòng tay vàng đẹp', 4, 1),
(5, 'Nhẫn Nam PNJ', 5000000, 'nhan2.png', 'Nhẫn nam kim cương vàng trắng, các chi tiết chạm khắc hình học, rồng phượng, hoặc đính đá chủ ở trung tâm để tạo điểm nhấn quyền lực.', 1, 1),
(6, 'Nhẫn Kim cương Vàng', 35500000, 'nhan3.png', 'Nhẫn Kim cương Vàng 58,5% (14K) Disney|PNJ Beauty & The Beast DDDDC001169', 1, 1),
(8, 'Bông tai Bạc đính đá STYLE By PNJ XMMXW060002', 5995000, 'bongtai2.png', 'Dạng bông tai sát tai với điểm nhấn là một viên đá Cubic Zirconia (CZ) lớn ở trung tâm, được bao quanh bởi dải đá nhỏ lấp lánh, tạo hình bông hoa thanh lịch.', 3, 1),
(9, 'Vòng tay Bạc đính đá STYLE By PNJ Feminine XMXMW060030', 6000000, 'vong2.png', 'Vàng trắng cao cấp, sáng bóng và bền màu, không gây kích ứng da.', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`MaBV`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaCT`),
  ADD KEY `MaDH` (`MaDH`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`IDUser`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `MaBV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaisanpham` (`MaLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
