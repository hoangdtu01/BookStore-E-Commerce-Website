-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 16, 2026 lúc 08:46 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `BookID` bigint UNSIGNED NOT NULL,
  `TacGiaID` bigint UNSIGNED NOT NULL,
  `TenSach` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoTa` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NXB` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` int NOT NULL,
  `Gia` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`BookID`, `TacGiaID`, `TenSach`, `MoTa`, `NXB`, `SoLuong`, `Gia`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh', 'Ta bắt gặp trong Tôi Thấy Hoa Vàng Trên Cỏ Xanh một thế giới đấy bất ngờ và thi vị non trẻ với những suy ngẫm giản dị thôi nhưng gần gũi đến lạ. Câu chuyện của Tôi Thấy Hoa Vàng Trên Cỏ Xanh có chút này chút kia, để ai soi vào cũng thấy mình trong đó, kiểu như lá thư tình đầu đời của cu Thiều chẳng hạ ngây ngô và khờ khạo.\r\n\r\nNhưng Tôi Thấy Hoa Vàng Trên Cỏ Xanh hình như không còn trong trẻo, thuần khiết trọn vẹn của một thế giới tuổi thơ nữa. Cuốn sách nhỏ nhắn vẫn hồn hậu, dí dỏm, ngọt ngào nhưng lại phảng phất nỗi buồn, về một người cha bệnh tật trốn nhà vì không muốn làm khổ vợ con, về một người cha khác giả làm vua bởi đứa con tâm thầm của ông luôn nghĩ mình là công chúa. Những bài học về luân lý, về tình người trở đi trở lại trong day dứt và tiếc nuối.', 'NXB Trẻ', 0, 141350, '2024-11-30 08:47:24', '2024-12-24 23:46:54'),
(2, 1, 'Ngày Xưa Có Một Chuyện Tình (Tái Bản)', 'NGÀY XƯA CÓ MỘT CHUYỆN TÌNH là tác phẩm mới tinh thứ 2 trong năm 2016 của nhà văn Nguyễn Nhật Ánh dài hơn 300 trang, được coi là tập tiếp theo của tập truyện Mắt biếc. Có một tình yêu dữ dội, với em, của một người yêu em hơn chính bản thân mình - là anh.\r\n\r\nNgày xưa có một chuyện tình có phải là một câu chuyện cảm động khi người ta yêu nhau, nỗi khát khao một hạnh phúc êm đềm ấm áp đến thế; hay đơn giản chỉ là chuyện ba người - anh, em, và người ấy…?\r\n\r\nBạn hãy mở sách ra, để chứng kiến làn gió tình yêu chảy qua như rải nắng trên khuôn mặt mùa đông của cô gái; nụ hôn đầu tiên ngọt mật, cái ôm đầu tiên, những giọt nước mắt và cái ôm xiết cuối cùng… rồi sẽ tìm thấy câu trả lời, cho riêng mình.', 'NXB Trẻ', 91, 93180, '2024-11-30 08:48:11', '2024-12-24 23:33:16'),
(4, 7, 'Thư Viện Nửa Đêm', 'Cuộc đời Nora Seed tràn ngập khổ sở và nuối tiếc. Cô có nhiều khả năng nhưng lại ít thành tựu, và luôn cảm thấy mình đã làm mọi người xung quanh mình thất vọng. Thế rồi, vào lúc chuông điểm nửa đêm trong ngày cuối cùng còn trên thế gian, Nora thấy mình xuất hiện ở Thư viện nửa đêm – một nơi “nằm giữa cõi sống và cõi chết”, với những dãy kệ trải dài bất tận và hằng hà sa số cuốn sách giúp Nora có thể sống một cuộc đời khác nếu cô đã lựa chọn cho mình những lối đi khác. Với sự giúp đỡ của một người quen cũ, Nora nắm trong tay cơ hội sửa chữa mọi sai lầm và xóa bỏ mọi hối tiếc để tìm kiếm một cuộc sống hoàn hảo cho riêng mình.\r\n\r\nVậy nhưng, với vô vàn chọn lựa như vậy, đâu mới là cách sống tốt nhất, và ta có nhờ thế mà hạnh phúc hơn chăng?', 'Nhà Xuất Bản Hội Nhà Văn', 70, 100000, '2024-12-23 12:34:25', '2024-12-23 18:46:44'),
(5, 3, 'Kafka bên bờ biển (Tái Bản 2020)', 'Kafka Tamura, mười lăm tuổi, bỏ trốn khỏi nhà ở Tokyo để thoát khỏi lời nguyền khủng khiếp mà người cha đã giáng xuống đầu mình.Ở phía bên kia quần đảo, Nakata, một ông già lẩm cẩm cùng quyết định dấn thân. Hai số phận đan xen vào nhau để trở thành một tấm gương phản chiếu lẫn nhau. Trong khi đó, trên đường đi, thực tại xào xạc lời thì thầm quyến rũ. Khu rừng đầy những người linh vừa thoát khỏi cuộc chiến tranh vừa qua, cá mưa từ trên trời xuống và gái điếm trích dẫn Hegel. Kafka bên bờ biển, câu chuyện hoang đường mở đầu thế kỷ XXI, cho chúng ta đắm chìm trong một chuyến du hành đầy sóng gió đầy chất hiện đại và mơ mộng trong lòng Nhật Bản đương đại.', 'Nhà Xuất Bản Hội Nhà Văn', 60, 144000, '2024-12-23 12:37:42', '2024-12-24 23:46:25'),
(6, 8, 'IT - Gã Hề Ma Quái - Tập 1', 'Cuộc điện thoại giữa đêm. Lời hứa thuở thơ ấu. Những ký ức day dứt, điên cuồng và chực trào. Gã hề trong ống cống.\r\n\r\nGiờ đây, những đứa trẻ lại tiếp tục bị sát hại, và những ký ức dồn nén của họ về mùa hè kinh khủng ấy trở lại khi một lần nữa phải chiến đấu với con quái vật ẩn nấp trong cống rãnh ở Derry.\r\n\r\nHành trình trở về quên hương của những đứa trẻ năm nào không phải để xoa dịu mà để đương đầu với cơn ác mộng từng khiến họ phải trốn chạy.', 'Nhà Xuất Bản Thanh Niên', 80, 305000, '2024-12-23 12:41:23', '2024-12-23 12:41:23'),
(7, 8, 'IT - Gã Hề Ma Quái - Tập 2', 'Derry, một thị trấn nhỏ ở Maine, một nơi quen thuộc đến ám ảnh. Chỉ ở Derry, ám ảnh là có thật.\r\n\r\nMột câu chuyện về bảy người lớn trở lại quê hương để đối mặt với cơn ác mộng mà họ gặp phải khi còn là những cô cậu thanh thiếu niên. 28 năm trước, họ đã chiến đấu với một sinh vật độc ác chuyên ăn thịt trẻ em. Giờ đây, những đứa trẻ lại tiếp tục bị sát hại, và những ký ức dồn nén của họ về mùa hè kinh khủng ấy trở lại khi một lần nữa phải chiến đấu với con quái vật ẩn nấp trong cống rãnh ở Derry.\r\n\r\nCuộc điện thoại giữa đêm. Lời hứa thời thơ ấu. Những ký ức day dứt, điên cuồng và chực trào. Gã hề trong ống cống. Hành trình trở về quê hương của bảy đứa trẻ năm nào không phải để xoa dịu mà để đương đầu với cơn ác mộng', 'Nhà Xuất Bản Thanh Niên', 70, 234200, '2024-12-23 12:44:08', '2024-12-23 12:44:08'),
(8, 9, 'Đắc Nhân Tâm', 'Không còn nữa khái niệm giới hạn Đắc Nhân Tâm là nghệ thuật thu phục lòng người, là làm cho tất cả mọi người yêu mến mình. Đắc nhân tâm và cái Tài trong mỗi người chúng ta. Đắc Nhân Tâm trong ý nghĩa đó cần được thụ đắc bằng sự hiểu rõ bản thân, thành thật với chính mình, hiểu biết và quan tâm đến những người xung quanh để nhìn ra và khơi gợi những tiềm năng ẩn khuất nơi họ, giúp họ phát triển lên một tầm cao mới. Đây chính là nghệ thuật cao nhất về con người và chính là ý nghĩa sâu sắc nhất đúc kết từ những nguyên tắc vàng của Dale Carnegie.\r\n\r\n30 Nguyên tắc vàng đối nhân xử thế của Đắc Nhân Tâm', 'Nhà Xuất Bản Tổng hợp TP.HCM', 100, 88000, '2024-12-23 12:48:57', '2024-12-23 12:48:57'),
(9, 10, 'Lâu Đài Bay Của Pháp Sư Howl (Tái Bản 2020)', 'Cô gái Sophie Hatter đang sống và làm việc yên ổn trong cửa hiệu bán mũ của bố mẹ ở Ingary, xứ sở của những đôi ủng bảy lý và áo tàng hình thì bỗng một ngày, mụ phù thuỷ xứ Waste xuất hiện biến cô thành bà già xấu xí. Quyết tâm giải cứu bản thân mình, Sophie đi tới lâu đài bay tìm kiếm sự giúp đỡ của Pháp sư Howl - kẻ vốn bị đồn là khoái “ăn tươi nuốt sống” trái tim của những cô gái trẻ.\r\n\r\n“…Sophie ngậm ngón tay bị bỏng nhẹ và lấy tay kia nhặt những lát thịt ba chỉ xông khói rơi trên váy, mắt chằm chằm nhìn Calcifer. Lão đang quật từ bên này sang bên kia lò sưởi. Những bộ mặt xanh lơ của lão gần như trắng bệch. Trong khoảnh khắc, lão có vô số những con mắt da cam, rồi khoảnh khắc sau đó đã có hàng dãy những con mắt bạc sáng như sao. Cô chưa bao giờ hình dung ra cái gì giống như thế.', 'Nhà Xuất Bản Hội Nhà Văn', 50, 70000, '2024-12-23 12:54:46', '2024-12-23 12:54:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_theloai`
--

CREATE TABLE `book_theloai` (
  `id` bigint UNSIGNED NOT NULL,
  `BookID` bigint UNSIGNED NOT NULL,
  `TheLoaiID` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_theloai`
--

INSERT INTO `book_theloai` (`id`, `BookID`, `TheLoaiID`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 2, 2, NULL, NULL),
(5, 4, 4, NULL, NULL),
(6, 5, 4, NULL, NULL),
(7, 5, 7, NULL, NULL),
(8, 6, 4, NULL, NULL),
(9, 6, 5, NULL, NULL),
(10, 7, 4, NULL, NULL),
(11, 7, 5, NULL, NULL),
(12, 8, 2, NULL, NULL),
(13, 9, 1, NULL, NULL),
(14, 9, 2, NULL, NULL),
(15, 9, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `CmtID` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `BookID` bigint UNSIGNED NOT NULL,
  `NoiDung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sao` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`CmtID`, `user_id`, `BookID`, `NoiDung`, `Sao`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Sách <b>Hay</b>', 5, '2024-12-23 12:05:27', '2024-12-23 12:05:27'),
(2, 2, 1, 'Sách rất Hay', 4, '2024-12-23 12:14:52', '2024-12-23 12:14:52'),
(3, 2, 1, 'Giao hàng <b>trễ</b>', 3, '2024-12-23 12:19:52', '2024-12-23 12:19:52'),
(4, 2, 1, '<i>Sách</i> bị bẻ góc', 3, '2024-12-23 12:22:05', '2024-12-23 12:22:05'),
(5, 2, 2, 'Giao <b>nhanh</b>', 5, '2024-12-23 12:24:57', '2024-12-23 12:24:57'),
(6, 2, 2, 'Sách hơi cũ', 4, '2024-12-23 12:25:43', '2024-12-23 12:25:43'),
(7, 2, 2, 'Sách <i><b>hay</b></i>', 5, '2024-12-23 12:27:12', '2024-12-23 12:27:12'),
(8, 2, 2, 'Tác giả hay quá', 5, '2024-12-23 12:29:02', '2024-12-23 12:29:02'),
(9, 2, 1, 'Hay', 4, '2024-12-23 20:23:10', '2024-12-23 20:23:10'),
(10, 2, 1, 'Hay', 5, '2024-12-24 23:48:26', '2024-12-24 23:48:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detaildh`
--

CREATE TABLE `detaildh` (
  `ItemID` bigint UNSIGNED NOT NULL,
  `OrderID` bigint UNSIGNED NOT NULL,
  `BookID` bigint UNSIGNED NOT NULL,
  `Gia` int NOT NULL,
  `SoLuong` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detaildh`
--

INSERT INTO `detaildh` (`ItemID`, `OrderID`, `BookID`, `Gia`, `SoLuong`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 141350, 2, '2024-12-22 01:30:41', '2024-12-22 01:30:41'),
(2, 1, 2, 93180, 2, '2024-12-22 01:30:41', '2024-12-22 01:30:41'),
(5, 4, 1, 141350, 3, '2024-12-23 20:15:24', '2024-12-23 20:15:24'),
(6, 4, 2, 93180, 1, '2024-12-23 20:15:24', '2024-12-23 20:15:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `OrderID` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `NgayMua` date NOT NULL,
  `TrangThai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`OrderID`, `user_id`, `NgayMua`, `TrangThai`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-12-22', 2, '2024-12-22 01:30:41', '2024-12-23 07:29:01'),
(4, 2, '2024-12-24', 1, '2024-12-23 20:15:24', '2024-12-23 20:21:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `CartID` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `BookID` bigint UNSIGNED NOT NULL,
  `SoLuong` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`CartID`, `user_id`, `BookID`, `SoLuong`, `created_at`, `updated_at`) VALUES
(17, 2, 1, 45, '2024-12-24 23:33:10', '2024-12-24 23:46:54'),
(18, 2, 2, 1, '2024-12-24 23:33:16', '2024-12-24 23:33:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `ImgID` bigint UNSIGNED NOT NULL,
  `BookID` bigint UNSIGNED NOT NULL,
  `ImgPath` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`ImgID`, `BookID`, `ImgPath`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/umrvMwbA3La5a0AuOMvdJg9Wtza6JUQy0zPOuKNe.webp', '2024-12-21 21:33:50', '2024-12-21 21:33:50'),
(2, 1, 'images/3eSZfHMcckbCadzoOatEPtQGmwT2AxjclWu2Ucvp.webp', '2024-12-21 21:33:50', '2024-12-21 21:33:50'),
(3, 1, 'images/mMMSWYC9UKlSdK7cdziJMN2B6yVvYVUWF3TRgvkL.webp', '2024-12-21 21:33:50', '2024-12-21 21:33:50'),
(5, 2, 'images/avQD6vE9ZVVvZ6TABxzBtjiW0yj4bF32g9QFQo1y.webp', '2024-12-21 21:34:11', '2024-12-21 21:34:11'),
(6, 2, 'images/163wRzWblOktBTHI51pBsgFPX0xLhTX5kX5t3joN.webp', '2024-12-21 21:34:11', '2024-12-21 21:34:11'),
(7, 2, 'images/uXL0t0ao7nFtn6LYhrkUEFOJYfQWsbbEzr9Nz0xE.webp', '2024-12-21 21:34:11', '2024-12-21 21:34:11'),
(8, 2, 'images/PHqJg8rOhu9HGEDAUdkPa9FMMqBix3xFtFsSyUz7.webp', '2024-12-21 21:34:11', '2024-12-21 21:34:11'),
(10, 4, 'images/AmV0YHwVXQZbVycRZPqtEg66oDzZT4J0pYuDXsD9.webp', '2024-12-23 12:34:26', '2024-12-23 12:34:26'),
(11, 4, 'images/kjs4ekxGmc8WuepjjcwJ0VSf7SYaWfviPpy5qv6j.webp', '2024-12-23 12:34:26', '2024-12-23 12:34:26'),
(12, 4, 'images/zpuskfyj1KNoAf7QbqBEIfAZMQfujH7LBe4PsMQA.webp', '2024-12-23 12:34:26', '2024-12-23 12:34:26'),
(13, 5, 'images/1iO1e8RyxDZudaPtka0NUb1zGqKz5QPvogDPh3iT.webp', '2024-12-23 12:37:42', '2024-12-23 12:37:42'),
(14, 5, 'images/zGmDbPzwhbRNLXA7mUbJjpf9rGtohGBo04DYV5CC.webp', '2024-12-23 12:37:42', '2024-12-23 12:37:42'),
(15, 5, 'images/lqVfD2kc9ZRPbqR2BX0ewexrydsXvhlCYA0XnVSC.webp', '2024-12-23 12:37:42', '2024-12-23 12:37:42'),
(16, 5, 'images/j7y39foyjZ3VP224S48oYYiKeDrD1rEF2SjBd1wZ.webp', '2024-12-23 12:37:42', '2024-12-23 12:37:42'),
(17, 6, 'images/e6Wmwa1Sf5jTV3EZgfoXI0zMyWQmEJMrnQdTGYWj.webp', '2024-12-23 12:41:23', '2024-12-23 12:41:23'),
(18, 6, 'images/eeX3kzZQnWB8X2icdYwn2ijhaNL0HJKtU0TMYhGu.webp', '2024-12-23 12:41:23', '2024-12-23 12:41:23'),
(19, 6, 'images/1RPby47qAYf0L4frjiV8s38tX9nKZmFgzAXkWQQ8.webp', '2024-12-23 12:41:23', '2024-12-23 12:41:23'),
(20, 6, 'images/RsGXpNE89eYmKN6gPVkcg6STyM8GhX8HOGr431Kr.webp', '2024-12-23 12:41:23', '2024-12-23 12:41:23'),
(21, 6, 'images/tjzuzS1TnzJ5prBGOISHXvIx3tmKevFiH8f1MX5A.webp', '2024-12-23 12:41:23', '2024-12-23 12:41:23'),
(22, 6, 'images/EInlCewp5EIDggvla9sGE3JIyBUEdnEhROF1OWOq.webp', '2024-12-23 12:41:23', '2024-12-23 12:41:23'),
(23, 7, 'images/78Ndb06nbMNgvObs58VvHpjzqhpt6U5z7EfVpKOP.webp', '2024-12-23 12:44:08', '2024-12-23 12:44:08'),
(24, 7, 'images/x01E1qYUmufhSbWzzuajDDD1fpHllMav3xnIBRHo.webp', '2024-12-23 12:44:08', '2024-12-23 12:44:08'),
(25, 7, 'images/RwzMgyyXZzMnCV0hesiEWJj6FecSfGHauoNxw8YT.webp', '2024-12-23 12:44:08', '2024-12-23 12:44:08'),
(26, 7, 'images/Z8WbgVd6dlaWqPBvdjs6gii8Ox54NOJiCzl5pvaD.webp', '2024-12-23 12:44:08', '2024-12-23 12:44:08'),
(27, 8, 'images/onpKfS3WMe0IrCAG6jal2xXdc2mo9CE90gQsDdSw.webp', '2024-12-23 12:48:57', '2024-12-23 12:48:57'),
(28, 8, 'images/GGdzEfH5RLTvRdB2Auqmn7mXCRhlCOznQ87ZMygU.webp', '2024-12-23 12:48:57', '2024-12-23 12:48:57'),
(29, 8, 'images/e7dP8UBc7aCqXEGWTjUdn9a0aVTPaY24wdnKHC9q.webp', '2024-12-23 12:48:57', '2024-12-23 12:48:57'),
(30, 8, 'images/3UBK0D4VllAMbaQ6rNU41M3Ea5qwi1wELiul6vUQ.webp', '2024-12-23 12:48:57', '2024-12-23 12:48:57'),
(31, 9, 'images/nzcHTIEjX2jYrkq1jMptETBZ7BWWnNi1cBQRLamQ.webp', '2024-12-23 12:54:46', '2024-12-23 12:54:46'),
(32, 9, 'images/1p1KRxFMXNdpSVSi3zut1u5qU4AMto39zQcMkdFu.webp', '2024-12-23 12:54:46', '2024-12-23 12:54:46'),
(33, 9, 'images/6S2YZSkpdLHMNf0RLJ1kL6IBk1EUf600iOfAiodH.webp', '2024-12-23 12:54:46', '2024-12-23 12:54:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_30_145341_theloai', 1),
(5, '2024_11_30_145427_tacgia', 1),
(6, '2024_11_30_145448_books', 1),
(7, '2024_11_30_145535_books_theloai', 1),
(8, '2024_11_30_145545_giohang', 1),
(9, '2024_11_30_145552_donhang', 1),
(10, '2024_11_30_145602_comments', 1),
(13, '2024_11_30_145611_images', 2),
(14, '2024_12_22_042246_detail_d_h', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('E8kDadj7bRO9W4uXqCXh5bhLsxLCfSG8MWRb5c9V', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVENwQVdPZTR4NEo3M2VNbGtac0wzUkVYSWdGaU9CcW5nZENLb0FOVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG9wLzEiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1735109654),
('fYVuRe10xgPPWIkTJuG1gFOcwe41SYDfeM6zmHvs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGxuaUd3UHl6SWlsYm02OGpzcVFsZmI1dHg5YzVxNzlMRk14cHBETiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735070099),
('QRcff2sHt2L8mHpxiHZBHLJmgW7BRYfWO0bE6Vh9', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidkNvcmhmQ1NKaWFaNE40YUdWY2JTQ1Y3bzB4MHZVVXZOTnZ0bE5JYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG9wLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE3OiJ2ZXJpZmljYXRpb25fY29kZSI7aTo5Nzg3NjY7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1735010590),
('UcOFFFlldfoWHQziwDJ5hiQCdwCugj4K2LKyM4rD', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaEhCSnRmVG93NjYxeFZ1SmNaYThma1BrdVFPVkI0TXloSXpQRENPUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjI6e2k6MDtzOjc6InVzZXJfaWQiO2k6MTtzOjc6InN1Y2Nlc3MiO31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo3OiJ1c2VyX2lkIjtpOjI7czo3OiJzdWNjZXNzIjtzOjI3OiLEkMSDbmcgbmjhuq1wIHRow6BuaCBjw7RuZyEiO30=', 1735108513),
('XQILhO3OOWD8bOlL9WUzfQSeMVmS8psdk6j6uG8M', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibTFhZ2JrZUN6S3ByNVFhMWhsQ0VjUUtha2hDeHdDaWtCWFNTSDdQOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1735108509);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `TacGiaID` bigint UNSIGNED NOT NULL,
  `TenTacGia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`TacGiaID`, `TenTacGia`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Nhật Ánh', '2024-11-30 08:42:41', '2024-11-30 08:42:41'),
(2, 'J.K. Rowling', '2024-11-30 08:42:51', '2024-11-30 08:42:51'),
(3, 'Haruki Murakami', '2024-11-30 08:42:57', '2024-11-30 08:42:57'),
(7, 'Matt Haig', '2024-12-23 12:33:30', '2024-12-23 12:33:30'),
(8, 'Stephen King', '2024-12-23 12:38:10', '2024-12-23 12:38:10'),
(9, 'Dale Carnegie', '2024-12-23 12:47:44', '2024-12-23 12:47:44'),
(10, 'Diana Wynne Jones', '2024-12-23 12:49:59', '2024-12-23 12:49:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `TheLoaiID` bigint UNSIGNED NOT NULL,
  `TenTheLoai` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`TheLoaiID`, `TenTheLoai`, `created_at`, `updated_at`) VALUES
(1, 'Khoa học viễn tưởng', '2024-11-30 08:43:30', '2024-11-30 08:43:30'),
(2, 'Tâm lí, tình cảm', '2024-11-30 08:43:38', '2024-11-30 08:43:38'),
(3, 'Hài hước', '2024-11-30 08:43:44', '2024-11-30 08:43:44'),
(4, 'Trinh thám', '2024-11-30 08:43:50', '2024-11-30 08:43:50'),
(5, 'Kinh dị', '2024-11-30 08:43:56', '2024-11-30 08:43:56'),
(7, 'Hư cấu', '2024-12-23 12:35:11', '2024-12-23 12:35:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DienThoai` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `DienThoai`, `DiaChi`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'hoangtv.23it@vku.udn.vn', NULL, '$2y$12$7BowMln2N9JuaOXK6/M0aetSg4WY0qHfvKUHVQ1Kp8pSS0/wDAt5G', '0912654451', '470 Trần Đại Nghĩa, Hòa Quý, Ngũ Hành Sơn, Đà Nẵng', NULL, '2024-11-30 09:00:23', '2024-11-30 09:00:23'),
(2, 'Hoàng', 'hoangdtu01@gmail.com', NULL, '$2y$12$xN1GETkPMqFYZEBCfLvSzu4GX/P/rGBkAxMfZTg/QHbUsrSQwvE4y', '0912654451', '15 Nguyễn Thái Học, Tam Kỳ, Quảng Nam', NULL, '2024-11-30 09:01:04', '2024-12-24 12:54:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `books_tacgiaid_foreign` (`TacGiaID`);

--
-- Chỉ mục cho bảng `book_theloai`
--
ALTER TABLE `book_theloai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_theloai_bookid_foreign` (`BookID`),
  ADD KEY `book_theloai_theloaiid_foreign` (`TheLoaiID`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CmtID`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_bookid_foreign` (`BookID`);

--
-- Chỉ mục cho bảng `detaildh`
--
ALTER TABLE `detaildh`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `detaildh_orderid_foreign` (`OrderID`),
  ADD KEY `detaildh_bookid_foreign` (`BookID`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `donhang_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `giohang_user_id_foreign` (`user_id`),
  ADD KEY `giohang_bookid_foreign` (`BookID`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImgID`),
  ADD KEY `images_bookid_foreign` (`BookID`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`TacGiaID`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`TheLoaiID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `BookID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `book_theloai`
--
ALTER TABLE `book_theloai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `CmtID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `detaildh`
--
ALTER TABLE `detaildh`
  MODIFY `ItemID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `OrderID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `CartID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `ImgID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `TacGiaID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `TheLoaiID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_tacgiaid_foreign` FOREIGN KEY (`TacGiaID`) REFERENCES `tacgia` (`TacGiaID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `book_theloai`
--
ALTER TABLE `book_theloai`
  ADD CONSTRAINT `book_theloai_bookid_foreign` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_theloai_theloaiid_foreign` FOREIGN KEY (`TheLoaiID`) REFERENCES `theloai` (`TheLoaiID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_bookid_foreign` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `detaildh`
--
ALTER TABLE `detaildh`
  ADD CONSTRAINT `detaildh_bookid_foreign` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`),
  ADD CONSTRAINT `detaildh_orderid_foreign` FOREIGN KEY (`OrderID`) REFERENCES `donhang` (`OrderID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_bookid_foreign` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`) ON DELETE CASCADE,
  ADD CONSTRAINT `giohang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_bookid_foreign` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
