-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2024 lúc 03:22 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `maBinhLuan` int(11) NOT NULL,
  `maTaiKhoan` int(11) NOT NULL,
  `noiDung` varchar(255) NOT NULL,
  `ngayBinhLuan` date NOT NULL DEFAULT current_timestamp(),
  `maSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`maBinhLuan`, `maTaiKhoan`, `noiDung`, `ngayBinhLuan`, `maSanPham`) VALUES
(2, 2, 'Sản phẩm cực chu đáo', '2024-01-12', 1),
(7, 59, 'ship qua nhà tôi với shop ơi', '2024-01-24', 1),
(11, 59, 'San pham qua dep', '2024-01-24', 3),
(12, 2, 'MÀY THÍCH LỪA TAO KHÔNG HẢ SHOP', '2024-01-24', 2),
(13, 2, 'HÀNG ĐỂU VẬY HOÀN TIỀN TAO ĐI', '2024-01-24', 2),
(15, 2, 'ĐỂ TAO TÓM ĐƯỢC MÀY XEM', '2024-01-24', 2),
(17, 72, 'Sản phẩm hết chưa shop', '2024-01-28', 10),
(18, 73, 'ok', '2024-03-28', 3),
(19, 73, '', '2024-03-28', 10),
(20, 73, '', '2024-03-28', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `maDonHang` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `maGioHang` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `maDanhMuc` int(11) NOT NULL,
  `tenDanhMuc` varchar(255) NOT NULL,
  `maLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`maDanhMuc`, `tenDanhMuc`, `maLoai`) VALUES
(1, 'Áo', 1),
(2, 'Áo', 2),
(3, 'Quần', 1),
(4, 'Quần', 2),
(5, 'Đồ Mặc Ngoài', 1),
(6, 'Đồ Mặc Ngoài', 2),
(7, 'Đồ Bầu', 2),
(11, 'Áo Sơ Sinh', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `maDonHang` int(11) NOT NULL,
  `ngayDat` date NOT NULL,
  `tongGiaTri` decimal(30,2) NOT NULL,
  `trangThai` varchar(100) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `diaChi` varchar(200) NOT NULL,
  `soDienThoai` varchar(200) NOT NULL,
  `tienTrinh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `maGioHang` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`maGioHang`, `maKhachHang`) VALUES
(3, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `maKhachHang` int(11) NOT NULL,
  `hoVaTen` varchar(255) NOT NULL,
  `gioiTinh` varchar(10) NOT NULL,
  `ngaySinh` date NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `maTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`maKhachHang`, `hoVaTen`, `gioiTinh`, `ngaySinh`, `diaChi`, `maTaiKhoan`) VALUES
(1, 'Nguyễn Hữu Huy', 'Nam', '2004-12-27', 'Tân Hội - Hà Nội', 2),
(3, 'Thái Hoàng', 'Nam', '1987-04-30', 'Hải Phòng', 59),
(15, 'Hiep', 'Nam', '2004-01-01', 'bbb', 72),
(16, 'ADMIN', 'Nam', '2025-12-27', 'Giấu', 75),
(17, 'Trần Quang Nghĩa', 'Nam', '2024-03-28', 'Đà nẵng', 73);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maLoai`, `tenLoai`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(54, 'Trẻ Con'),
(4, 'Trẻ Em');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `maSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `gia` decimal(20,2) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `moTa` text NOT NULL,
  `luotMua` int(11) NOT NULL DEFAULT 0,
  `trangThai` bit(1) NOT NULL,
  `maDanhMuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`maSanPham`, `tenSanPham`, `gia`, `soLuong`, `anh`, `moTa`, `luotMua`, `trangThai`, `maDanhMuc`) VALUES
(1, 'Áo Sơ Mi Extra Fine Cotton Dài Tay', 489000.00, 50, 'products/ao-1.avif', '- Được làm từ 100% sợi cotton siêu dài cho kết cấu mềm mại.\r\n- Quá trình giặt và hoàn thiện được lựa chọn cẩn thận để mang lại cảm giác mềm mại sang trọng và vẻ ngoài trang nhã, giản dị.\r\n- Cập nhật với các nút tròn để dễ dàng buộc chặt.\r\n- Lớp lót được cập nhật ở cổ áo, vạt áo và cổ tay áo giúp giảm nếp nhăn sau khi giặt.\r\n- Kiểu dáng vừa vặn hiện đại.\r\n- Cổ áo cài nút đa năng.\r\n- Rộng rãi ở vai và cơ thể, với đường cắt bóng mượt ở cánh tay và ngực.\r\n- Được thiết kế để cánh tay dễ dàng cử động, có viền dài hơn ở phía sau.\r\n- Chỉ khâu tạo thêm cảm giác giản dị hoàn hảo.\r\n- Lớp hoàn thiện có hình dáng đặc biệt giúp vải chồng lên nhau ở mép viền của vạt áo.\r\n- Hoàn hảo khi mặc dưới áo len, áo khoác hoặc bên ngoài áo phông.', 20, b'1', 1),
(2, 'Áo Polo Dry Vải Pique Ngắn Tay', 399000.00, 50, 'products/ao-2.avif', '- Tinh chỉnh chiều dài túi và khoảng cách giữa các nút.\r\n- Đường may hẹp hơn một chút ở cổ tay áo tạo kiểu dáng đẹp hơn.\r\n- Vừa vặn cho phép cử động dễ dàng ở phần vai.', 30, b'1', 1),
(3, 'Áo Thun Dáng Rộng Kẻ Sọc Cổ Tròn Tay Lỡ', 490000.00, 19, 'products/ao-3.avif', '- Chất liệu 100% cotton cực dày dặn.\r\n- Cảm giác sắc nét, mịn màng.\r\n- Được giặt trước một lần nước để có phong cách hoàn toàn giản dị.\r\n- Thiết kế tay lửng với kiểu dáng oversized mang lại cảm giác thoải mái.\r\n- Sọc bản lớn đa năng.', 50, b'1', 1),
(4, 'Quần Smart Pants Dài Đến Mắt Cá', 784000.00, 32, 'products/quan-1.avif', '- Chất thun co dãn 2 chiều mang lại cảm giác thoải mái.\r\n- Kiểu dáng thon gọn, dài đến mắt cá chân, vừa vặn.\r\n- Chống nhăn, dễ chăm sóc. * Định hình để khô sau khi giặt.\r\n- Cạp quần co giãn thoải mái mang đến vẻ ngoài cổ điển với phần trên được cài vào trong.\r\n- Nếp gấp ở giữa giữ nguyên hình dạng sau khi giặt.\r\n- Đường khâu và chỉ được lựa chọn cẩn thận để tạo nên vẻ ngoài trang nhã.', 22, b'1', 3),
(5, 'Quần Dài Vải Cotton Dáng Relax (Denim)', 588000.00, 50, 'products/quan-2.avif', '- Màu chàm đáng yêu sẽ giúp bạn trông đẹp hơn khi mặc.\r\n- Chất jeans co giãn mềm mại.\r\n- Kiểu dáng dài đến mắt cá chân thoải mái.\r\n- Thiết kế mở phía trước có khóa kéo.\r\n- Túi sau tiện dụng ở cả hai bên.\r\n- Cạp quần co giãn có dây rút điều chỉnh được.\r\n- Thích hợp mặc quanh năm trong nhà hoặc các hoạt động ngoài trời.', 40, b'1', 3),
(6, 'Quần Jeans Dáng Relax Dài Đến Mắt Cá', 986000.00, 40, 'products/quan-3.avif', '- Chất liệu vải mềm mại đặc biệt mang lại sự thoải mái khi mặc.\r\n- Được làm bằng sợi xoắn mềm và sợi hai lớp để tăng độ bền. Chất liệu vải mềm mại nhưng vẫn giữ được hình dáng giúp tránh bị phồng ở đầu gối.\r\n- Thiết kế cạp cao, rộng rãi ở đùi.\r\n- Dài đến mắt cá chân.\r\n- Thiết kế đa năng trông đẹp mắt khi bạn sơ vin hoặc không.\r\n- Thắt lưng dây rút cho phép điều chỉnh kích thước dễ dàng.\r\n- Công nghệ BLUE CYCLE JEANS giúp giảm lượng nước* sử dụng trong quá trình sản xuất. Mức độ tiết kiệm nước sẽ có sự chênh lệch giữa các sản phẩm.', 21, b'1', 3),
(7, 'Ultra Light Down Áo Khoác Siêu Nhẹ (3D Cut)', 980000.00, 22, 'products/ao-ngoai-1.avif', '- Vải taffeta xoắn mềm mại làm từ nylon nhẹ.\r\n- Lớp lót chống tĩnh điện.\r\n- Lớp phủ bền, không thấm nước.\r\n-750+ Fill Power * theo phương pháp đo lường IDFB\r\n-Trọng lượng siêu nhẹ.\r\n-Thiết kế có thể tháo rời. Bao gồm túi đựng riêng.\r\n- Thiết kế vừa vặn thoải mái để tạo kiểu đơn giản.\r\n- Kiểu dáng thời trang với lớp lót màu ton-sur-ton.\r\n- Túi áo có dây kéo và dễ sử dụng.\r\n- Khóa kéo phía trước để giữ ấm.\r\n- Đường cắt 3D giúp chuyển động ở phần vai dễ dàng, thiết kế tay áo raglan tạo vẻ ngoài đẹp mắt.\r\n- Lớp lót trên cổ áo phía trong tạo cảm giác mềm mại.\r\n- Một lớp áo khoác nhẹ và ấm áp để tạo kiểu hàng ngày.\r\n- Được cập nhật với thiết kế vừa vặn thoải mái làm cho sản phẩm có thể kết hợp với nhiều lớp áo hoặc là áo khoác ngoài.', 60, b'1', 5),
(8, 'Áo Khoác Coach', 980000.00, 10, 'products/ao-ngoai-2.avif', 'Vào những năm 1980, Keith Haring nhận được sự chú ý của công chúng nhờ loạt tác phẩm vẽ trên tàu điện ngầm tại Thành phố New York, với những bức vẽ đã làm sống lại khoảng không gian quảng cáo trống bằng những nét vẽ táo bạo và màu sắc sống động. Nghệ thuật của Haring truyền tải thông điệp mạnh mẽ về tính đoàn kết và tầm quan trọng của hoạt động xã hội. Những kiệt tác đầy ngẫu hứng này đã trở thành biểu tượng của nghệ thuật đường phố và tiếp tục truyền cảm hứng cho các nghệ sĩ ngày nay.\r\n\r\nKeith Haring\r\nLà nhân vật chủ chốt trong bối cảnh Làng Đông của New York vào cuối những năm 1970 và 1980, tác phẩm nghệ thuật của nghệ sĩ người Mỹ Keith Haring không chỉ được ưa chuộng phòng trưng bày nghệ thuật mà còn cả tàu điện ngầm, đường phố và vỉa hè của thành phố. Tác phẩm của ông thường kết hợp vốn từ vựng mang tính biểu tượng, bao gồm trái tim, đĩa bay, hình có cánh và “đứa bé rạng rỡ” đang bò với các dấu hiệu và hoa văn trừu tượng.', 20, b'1', 5),
(9, 'Áo Parka Chống UV Bỏ Túi (Họa Tiết)', 980000.00, 50, 'products/ao-ngoai-3.avif', '- Chất liệu vải có kết cấu sắc nét, phù hợp cho các hoạt động ngoài trời hoặc phong cách giản dị.\r\n- Với công nghệ chống tia cực tím.\r\n- Lớp hoàn thiện chống thấm nước. * Vải được phủ một chất chống thấm nước nên hiệu quả kéo dài hơn. Sự kết thúc không phải là vĩnh viễn.\r\n- Thiết kế có thể bỏ túi.\r\n- Đường cắt hình hộp vừa vặn thoải mái ở cơ thể, vai và tay áo.\r\n- Túi đựng được gắn vào một vòng ở bên trong bên trái.\r\n- Mẫu kiểm tra nhỏ.\r\n-Hoàn hảo cho trang phục thường ngày và các hoạt động ngoài trời nhẹ nhàng như cắm trại. *Sản phẩm không có khả năng chống cháy hoặc chống cháy. Hãy thận trọng nếu có ngọn lửa gần đó.', 60, b'1', 5),
(10, 'Áo Kiểu Vải Rayon Cổ Mở Tay Lửng 3/4', 489000.00, 10, 'products/ao-4.avif', '- Chống nhăn để dễ chăm sóc. *Tạo hình và phơi khô sau khi giặt.\r\n- Thiết kế cổ tròn tôn dáng.\r\n- Họa tiết sọc tinh tế.', 30, b'1', 2),
(11, 'AIRism Áo Thun Không Đường May Cổ V Dáng Dài', 399000.00, 10, 'products/ao-5.avif', '- Chất liệu vải tạo cảm giác sang trọng.\r\n- \'AIRism\' hiệu suất cao.\r\n- Chiều dài qua hông.\r\n- Thiết kế đuôi áo tôn dáng với thiết kế không đường may.\r\n- Thích hợp để tập yoga, chơi những môn thể thao nhẹ nhàng và mặc thường ngày.', 50, b'0', 2),
(12, 'AIRism Cotton Áo Thun Ngắn Tay', 399000.00, 60, 'products/ao-6.avif', '- Thân được làm từ vải \'AIRism\' mịn màng trông như cotton.\r\n- Đường viền cổ làm từ vải gân.\r\n- Đường viền cổ áo hơi hẹp và kết cấu mịn màng mang lại vẻ ngoài tinh tế.\r\n- Kiểu dáng thoải mái và chiều dài ngắn hơn một chút, hoàn hảo để mặc riêng.\r\n- Các đường xẻ bên hông và viền bất đối xứng tạo thêm điểm nhấn phong cách.\r\n- Thiết kế đơn giản, đa năng.\r\n- Kết hợp đầy phong cách với mọi loại quần.', 50, b'0', 2),
(13, 'Quần Jeans Dáng Suông Rộng', 100000000.00, 20, 'products/quan-4.avif', '- Chất jeans 100% cotton mềm mại.\r\n- Thiết kế 5 túi.\r\n- Cạp cao.\r\n- Ôm nhẹ ở hông với đường cắt thẳng, rộng từ đùi đến gấu quần.\r\n- Công nghệ BLUE CYCLE JEANS giúp giảm lượng nước* sử dụng trong quá trình sản xuất. Mức độ tiết kiệm nước sẽ có sự chênh lệch giữa các sản phẩm.\r\n\r\n*Lên đến 99%. Dữ liệu dựa trên sự so sánh giữa Quần Jeans Nam Regular Fit năm 2017 và năm 2018 với công nghệ do Trung Tâm Cải Tiến Quần Jeans của UNIQLO phát triển vào năm 2018.', 50, b'1', 4),
(14, 'Chân Váy Dài Vải Denim', 784000.00, 60, 'products/quan-5.avif', '- Chất jean 100% cotton.\r\n- Thiết kế 5 túi.\r\n- Thiết kế đa năng cho mọi dịp.', 20, b'1', 4),
(15, 'Quần Nỉ Túi Hộp (Cargo)', 588000.00, 50, 'products/quan-6.avif', '- Thân quần được làm bằng vải có lót lông thoải mái.\r\n- Thiết kế lưng thun co giãn dễ mặc.\r\n- Thiết kế unisex.\r\n- Bộ điều chỉnh ở gấu quần cho phép bạn tạo dáng áo suông thẳng hoặc dáng jogger.\r\n- Có túi bên hông và túi bên ngoài tiện lợi.\r\n- Có dây rút eo bên trong để điều chỉnh kích cỡ.\r\n- Quần túi hộp bằng vải jersey thoải mái.\r\n- Kết hợp với nhiều loại áo khác nhau.', 40, b'0', 4),
(16, 'Ultra Light Down Áo Khoác Siêu Nhẹ', 980000.00, 30, 'products/ao-ngoai-4.avif', '- Được làm bằng sợi siêu mịn cho độ nhẹ đáng kinh ngạc.\r\n- Ấm cao cấp với công suất lấp đầy 750*. *Đo bằng phương pháp IDFB\r\n- Được thiết kế đặc biệt không cần đóng gói để có trọng lượng siêu nhẹ.\r\n- Lớp lót chống tĩnh điện.\r\n- Lớp hoàn thiện chống thấm nước. * Vải được phủ một chất chống thấm nước nên hiệu quả kéo dài hơn. Sự kết thúc không phải là vĩnh viễn.\r\n- Cắt hình hộp có chiều dài ngắn hơn một chút.\r\n- Dây buộc có nắp giúp giữ không khí lạnh ra ngoài.\r\n- Thiết kế có thể bỏ túi.', 60, b'1', 6),
(17, 'PUFFTECH Áo Gi-Lê', 980000.00, 100, 'products/ao-ngoai-5.avif', '- Lớp đệm ấm, nhẹ và tiện dụng do UNIQLO và Toray cùng phát triển.\r\n- Lớp lót chống tĩnh điện.\r\n- Lớp hoàn thiện chống thấm nước. * Vải được phủ một chất chống thấm nước nên hiệu quả kéo dài lâu hơn. Bề mặt sản phẩm không chống nước vĩnh viễn.\r\n- Thiết kế có thể bỏ túi.\r\n- Thiết kế chần bông tạo nên một lớp bên trong hoặc bên ngoài tuyệt vời.\r\n- Túi, cổ áo và cổ tay áo được dán băng keo grosgrain để tăng độ bền.\r\n- Cổ áo gập vào trong để giấu dưới lớp áo cổ chữ V.\r\n- Hoàn hảo để tạo kiểu.\r\n\r\nCác sản phẩm Chần Bông nay đã được thay thế với tên mới, PUFFTECH.', 40, b'1', 6),
(18, 'Áo Khoác Vải Jersey Dáng Relax', 784000.00, 50, 'products/ao-ngoai-6.avif', '- Chất liệu vải jersey mềm mại với kiểu dáng dệt đặc biệt.\r\n- Thiết kế đa năng, giản dị.\r\n- Kiểu dáng hình hộp, thoải mái giúp bạn dễ dàng tạo nhiều lớp layer.\r\n- Chiều dài được thiết kế ngắn hơn kết hợp hoàn hảo với bất kỳ chiếc quần nào.', 40, b'1', 6),
(19, 'Quần Bầu Smart Pants Dài Đến Mắt Cá', 784000.00, 10, 'products/do-bau-1.avif', '- Chất thun co dãn 2 chiều.\r\n- Thiết kế eo kiểu bầu vừa vặn nhẹ nhàng.\r\n- Kiểu dáng ống ôm dần cổ điển.\r\n- Phù hợp với mọi phong cách.\r\n- Thiết kế sang trọng và tiện dụng.\r\n- Quần áo sử dụng vật liệu tái chế là một phần trong nỗ lực của chúng tôi nhằm hỗ trợ giảm thiểu chất thải và sử dụng vật liệu mới. Tỷ lệ vật liệu tái chế khác nhau tùy theo từng sản phẩm. Vui lòng kiểm tra “Vật liệu” trên tag giá hoặc nhãn chăm sóc để biết chi tiết.', 10, b'1', 7),
(20, 'Quần Jean Bầu Siêu Co Giãn', 980000.00, 19, 'products/do-bau-2.avif', '- Miếng đệm chống trượt giúp cố định những chiếc tất này.\r\n- Công nghệ BLUE CYCLE JEANS giúp giảm lượng nước* sử dụng trong quá trình sản xuất. Mức độ tiết kiệm nước sẽ có sự chênh lệch giữa các sản phẩm.\r\n\r\n*Lên đến 99%. Dữ liệu dựa trên sự so sánh giữa Quần Jeans Nam Regular Fit năm 2017 và năm 2018 với công nghệ do Trung Tâm Cải Tiến Quần Jeans của UNIQLO phát triển vào năm 2018.', 20, b'1', 7),
(21, 'Quần Leggings Bầu', 399000.00, 40, 'products/do-bau-3.avif', '- Nhãn giặt được in tạo cảm giác thoải mái.\r\n- Đường may tối giản cho cảm giác êm ái, nhẹ nhàng.\r\n- Chất vải co giãn tạo cảm giác nhẹ nhàng, không gò bó.\r\n- Vải hai lớp mang lại cảm giác ấm áp hơn.\r\n· Dây thắt lưng không để lại vết hằn sâu ở phần bụng bạn.\r\n- Thiết kế dài toàn thân phù hợp với mọi giai đoạn của thai kỳ.', 20, b'1', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `maTaiKhoan` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tenNguoiDung` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `quyen` bit(1) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'users/user-default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`maTaiKhoan`, `email`, `tenNguoiDung`, `matKhau`, `quyen`, `avatar`) VALUES
(2, 'huymixao@gmail.com', 'huy', '123456', b'1', 'users/user-default.png'),
(59, 'thaihoangofficial@gmail.com', 'thaihoang91', 'thoicom123', b'1', 'users/th.jpg'),
(72, 'nghiadaica@gmail.com', 'nghiadaica@gmail.com', 'vv', b'1', 'users/user-default.png'),
(73, 'quannmph46036@fpt.edu.vn', 'test', 'vv', b'0', 'users/user-default.png'),
(74, 'huynhph46090@fpt.edu.vn', 'huy123123', 'huylove123456', b'1', 'users/user-default.png'),
(75, 'admin@admin.com', 'admin', '123456', b'1', 'users/user-default.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`maBinhLuan`),
  ADD KEY `FK_binhluan_taikhoan` (`maTaiKhoan`),
  ADD KEY `FK_binhluan_sanpham` (`maSanPham`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD KEY `FK_chitietdonhang_donhang` (`maDonHang`);

--
-- Chỉ mục cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD KEY `FK_chitietgiohang_giohang` (`maGioHang`),
  ADD KEY `FK_chitietgiohang_sanpham` (`maSanPham`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`maDanhMuc`),
  ADD KEY `FK_danhmuc_loai` (`maLoai`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`maDonHang`),
  ADD KEY `FK_donhang_khachhang` (`maKhachHang`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`maGioHang`),
  ADD KEY `FK_giohang_khachhang` (`maKhachHang`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`maKhachHang`),
  ADD KEY `FK_khachhang_taikhoan` (`maTaiKhoan`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maLoai`),
  ADD UNIQUE KEY `tenLoai` (`tenLoai`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`maSanPham`),
  ADD UNIQUE KEY `tenSanPham` (`tenSanPham`),
  ADD KEY `FK_sanpham_danhmuc` (`maDanhMuc`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`maTaiKhoan`),
  ADD UNIQUE KEY `tenNguoiDung` (`tenNguoiDung`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `maBinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `maDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `maDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `maGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `maKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `maTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `FK_binhluan_sanpham` FOREIGN KEY (`maSanPham`) REFERENCES `san_pham` (`maSanPham`),
  ADD CONSTRAINT `FK_binhluan_taikhoan` FOREIGN KEY (`maTaiKhoan`) REFERENCES `tai_khoan` (`maTaiKhoan`);

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `FK_chitietdonhang_donhang` FOREIGN KEY (`maDonHang`) REFERENCES `don_hang` (`maDonHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `FK_chitietgiohang_giohang` FOREIGN KEY (`maGioHang`) REFERENCES `gio_hang` (`maGioHang`),
  ADD CONSTRAINT `FK_chitietgiohang_sanpham` FOREIGN KEY (`maSanPham`) REFERENCES `san_pham` (`maSanPham`);

--
-- Các ràng buộc cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD CONSTRAINT `FK_danhmuc_loai` FOREIGN KEY (`maLoai`) REFERENCES `loai` (`maLoai`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `FK_donhang_khachhang` FOREIGN KEY (`maKhachHang`) REFERENCES `khach_hang` (`maKhachHang`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `FK_giohang_khachhang` FOREIGN KEY (`maKhachHang`) REFERENCES `khach_hang` (`maKhachHang`);

--
-- Các ràng buộc cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `FK_khachhang_taikhoan` FOREIGN KEY (`maTaiKhoan`) REFERENCES `tai_khoan` (`maTaiKhoan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `FK_sanpham_danhmuc` FOREIGN KEY (`maDanhMuc`) REFERENCES `danh_muc` (`maDanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
