-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2021 lúc 11:05 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sk8`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(0, '(No brand)'),
(1, 'Element'),
(2, 'Baker'),
(4, 'Bdskateco'),
(5, 'Promade'),
(6, 'PlanB'),
(8, 'Nomad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `parents_category_id` bigint(20) NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `parents_category_id`, `category_name`) VALUES
(1, 1, 'Completes'),
(2, 1, 'Decks'),
(3, 1, 'Hardware'),
(4, 1, 'Grip Tape'),
(5, 1, 'Wheels'),
(6, 1, 'Trucks'),
(7, 2, 'T-Shirts'),
(8, 2, 'Hoodies & Sweatshirts'),
(9, 2, 'Jackets & Coats'),
(10, 3, 'Backpacks & Bags'),
(11, 3, 'Hats & Beanies'),
(12, 3, 'Wallets');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `TENKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DCKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `MASP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TENSP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SHIP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `COST` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_method` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `user_id`, `TENKH`, `DCKH`, `MASP`, `TENSP`, `SHIP`, `COST`, `quantity`, `payment_method`) VALUES
(87, 84, 'Trần Quốc Khánh', '122/13 Trần Quang Cơ', '39', 'Motif Complete Skateboard', '0', 2400000, 2, 'Thanh toán khi nhận hàng'),
(88, 84, 'Trần Quốc Khánh', '122/13 Trần Quang Cơ', '70', 'DROSHKY BLOCKS BABY BLUE GRIPTAPE', '50000', 249000, 1, 'Thanh toán khi nhận hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `user_id` bigint(20) NOT NULL,
  `TENKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DCKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DTKH` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MKKH` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `role` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`user_id`, `TENKH`, `DCKH`, `DTKH`, `MKKH`, `role`) VALUES
(84, 'Trần Quốc Khánh', '122/13 Trần Quang Cơ', '0338627330', '0338627330', NULL),
(90, 'Admin SK8', '-----', '0000000000', '0000000000', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `parents_category`
--

CREATE TABLE `parents_category` (
  `parents_category_id` bigint(20) NOT NULL,
  `parents_category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `parents_category`
--

INSERT INTO `parents_category` (`parents_category_id`, `parents_category_name`) VALUES
(1, 'Skateboards'),
(2, 'Clothing'),
(3, 'Accessories');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `HINHSP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TENSP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GIASP` int(11) DEFAULT NULL,
  `MASP` int(20) NOT NULL,
  `product_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `parents_category_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `luxury` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `sale_price` int(11) NOT NULL,
  `keyword` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`HINHSP`, `TENSP`, `GIASP`, `MASP`, `product_description`, `parents_category_id`, `category_id`, `brand_id`, `luxury`, `sale`, `sale_price`, `keyword`) VALUES
('element_1.jpg', 'Motif Complete Skateboard', 2250000, 39, 'Motif Complete Skateboard là sản phẩm hoàn chỉnh tiêu chuẩn có hình ảnh nghệ thuật về thương hiệu chữ ký của ELEMENT được đóng dấu trên mặt dưới của boong. Được thiết kế theo công thức tiêu chuẩn và nhiều năm am hiểu kỹ thuật của chúng tôi, sản phẩm hoàn chỉnh này mang lại một chuyến đi suôn sẻ cho những người thuộc tất cả các bộ kỹ năng. Có hai kích thước và với mọi thứ bạn mong đợi từ một cái hoàn chỉnh.', 1, 1, 1, 0, 1, 1200000, 'complete,\nskateboard,ván trượt'),
('element_2.jpg', 'Hiero Complete Skateboard', 0, 40, 'From best life to wild life: the Hotel Radio Paris Skateboard Deck is an exclusive collaboration with a French favorite that features a graphic of a campfire party on the underside. Made with ELEMENT’s standard 7-ply formula, developed with our decades of technical expertise, this deck delivers a high-grade and high-performance ride. Comes in one size.Giải mã mã chữ tượng hình được trang trí ở mặt dưới của Ván trượt hoàn chỉnh Hiero, một mô hình chuyên dụng được thiết kế theo công thức tiêu chuẩn và hàng chục năm chuyên môn kỹ thuật của chúng tôi. Đi kèm với trang bị mọi thứ bạn mong đợi từ một chiếc hoàn chỉnh và có hai kích thước.', 1, 1, 1, 1, 0, 3120000, 'complete,\nskateboard,ván trượt'),
('element_grip_tape_img.jpg', 'Classic Logo Grip Tape\n', 0, 41, 'From best life to wild life: the Hotel Radio Paris Skateboard Deck is an exclusive collaboration with a French favorite that features a graphic of a campfire party on the underside. Made with ELEMENT’s standard 7-ply formula, developed with our decades of technical expertise, this deck delivers a high-grade and high-performance ride. Comes in one size.Tất cả trở lại những điều cơ bản với Băng keo Grip Logo Cổ điển, một mặt hàng chủ lực của ELEMENT mang lại hiệu suất và độ tin cậy. Được thực hiện với nhiều thập kỷ cải tiến kỹ thuật của chúng tôi, làm nổi bật thương hiệu mang tính biểu tượng của chúng tôi ở phía bên trái.', 1, 4, 1, 0, 0, 499000, 'Giấy nhám, Grip tape, phụ kiện'),
('element_hardware_img.jpg', '7/8” Allen Hardware', 0, 42, 'Với gói Phần cứng Allen 7/8 \", bạn biết mình đang nhận được gì: những yếu tố cần thiết, được thực hiện với cam kết lâu dài của ELEMENT về các tiêu chuẩn kỹ thuật cao và thép cao cấp. Đi kèm với lựa chọn tiêu chuẩn gồm tám bu lông đen, một bu lông đỏ, chín đai ốc , và một công cụ allen.', 1, 3, 1, 0, 0, 460000, 'Phụ kiện, Ốc, hardware'),
('element_truck_img.jpeg', 'Component Bundle 5.25\" Trucks', 0, 43, 'Trong gần ba mươi năm, ELEMENT đã sản xuất phần cứng vượt trội và thiết kế của Gói linh kiện 5,25 ”Xe tải phản ánh cam kết cải tiến kỹ thuật đó. Được làm bằng thép cao cấp, đi kèm với bộ bánh xe 54mm 99A được chế tạo theo công thức tiêu chuẩn của chúng tôi và vòng bi ABEC 5. Kích thước cụ thể, phù hợp với boong 8.0 ”. Sẵn sàng cho đường phố và tập trung vào hiệu suất.', 1, 6, 1, 0, 0, 1300000, 'Truck, Skateboard'),
('element_wheels_img.jpeg', 'Timber Bound 54mm Wheels\n', 0, 44, 'Hành trình như sao chổi trên Bánh xe 54mm của Timber Bound. Được thiết kế theo công thức tiêu chuẩn của ELEMENT, những bánh xe mọi địa hình này có tác phẩm nghệ thuật độc quyền được thiết kế bởi Chad Eaton, hay còn gọi là Timber !. Được làm bằng polyurethane bền.', 1, 5, 1, 0, 0, 1200000, 'Wheel, Skate, Bánh'),
('alyzt00280_element,f_lms_frt1.jpg', 'Blazin’ Chest Tie‑Dye Short Sleeve T-Shirt', 0, 47, 'Cơ bản nhưng có chút ảo giác, Áo phông ngắn tay buộc dây Blazin ’Chest Tie-Dye là trang phục mặc hàng ngày có thương hiệu cổ điển của ELEMENT trên ngực và một vài tùy chọn giặt. Được làm bằng áo thun cotton hữu cơ, chiếc áo phông này nhẹ, thoáng khí và mang lại tính linh hoạt hàng ngày. Vừa vặn là tiêu chuẩn.', 2, 7, 1, 0, 0, 899000, 'Áo, Tshirt, thời trang'),
('element_fire_earth.jpg', 'Section Complete Skateboard', 0, 45, 'Đáng tin cậy và dễ nhận biết, Section Complete Skateboard cũng cổ điển như chúng. Cung cấp bốn kích thước, tất cả các tính năng kỹ thuật mà bạn mong đợi từ một bản hoàn chỉnh và thương hiệu đặc trưng của ELEMENT ở cuối trang.', 1, 1, 1, 1, 0, 2400000, 'skateboard, element, ván trượt'),
('element_nick_garcia.jpg', 'Space Case Nick Garcia Skateboard Deck', 0, 46, 'Vỏ ván không gian Nick Garcia Skateboard Deck là thiết bị chính của ELEMENT có một số tác phẩm nghệ thuật giữa các thiên hà và một mặt không gian ở mặt dưới, được trình bày bởi tay đua Nick Garcia. Được chế tạo theo công thức 7 lớp tiêu chuẩn của chúng tôi, được phát triển với chuyên môn kỹ thuật hàng thập kỷ của chúng tôi, bộ bài này mang đến một chuyến đi cao cấp, hiệu suất cao. Có một kích thước.', 1, 2, 1, 1, 0, 3000000, 'Skateboard, Deck, Element, Ván trượt'),
('alysf00114_element,f_lms_frt1.jpg', 'Blazin’ Chest Tie‑Dye Pullover Hoodie', 0, 49, 'Là một mặt hàng chủ lực của ELEMENT được thiết kế kỳ công, Blazin ’Chest Tie-Dye Hoodie có kiểu giặt nhuộm bằng cà vạt xoắn ốc hoàn toàn và một bản in màn hình nhỏ của thương hiệu đặc trưng của chúng tôi trên ngực. Được làm bằng bông chải dày, chiếc áo len này mang lại sự ấm áp chắc chắn, mũ trùm đầu có thể điều chỉnh thông qua dây kéo để tăng thêm sự thoải mái và tính linh hoạt hàng ngày. Vừa vặn là tiêu chuẩn.', 2, 8, 1, 0, 0, 1399000, 'Áo khoác, hoodie'),
('alyjk00135_element,f_fbk_frt1.jpg', 'Dulcey Explorer Parka Jacket', 0, 51, 'Hãy chuẩn bị để đi lang thang với Áo khoác thám hiểm Dulcey, nó giúp bạn được bảo vệ bất kể khoảng cách hay thời tiết. Được làm từ polyester tái chế thân thiện với môi trường, chiếc áo parka hạng trung này cung cấp khả năng giữ ấm tốt thông qua lớp chần bông dày và khả năng bảo vệ sẵn sàng khi mưa thông qua xử lý chống thấm nước bền ở bên ngoài. Với hai túi lớn phía trước để dễ dàng lấy ra, một túi bên trong ngực cho các vật có giá trị của bạn và mũ trùm đầu ấm áp với lông thú có thể tháo rời, là tiêu chuẩn vừa vặn.', 2, 9, 1, 1, 0, 2990000, 'Áo khoác, Jacket'),
('alybp00105_element,p_tha7_frt1.jpg', 'Mohave 30L Large Skate Backpack', 0, 52, 'Là thiết bị chính của ELEMENT xuyên suốt, Mohave Backpack là một vật dụng đáng tin cậy có dây đai có thể xếp gọn cho ván trượt của bạn ở mặt trước và nhiều không gian bên trong cho thiết bị của bạn. Cung cấp một ngăn chính với tay áo máy tính xách tay cho phần cứng có giá trị của bạn, một túi thả có khóa kéo phía trước để dễ dàng lấy ra và hai túi bên có khóa kéo để tăng thêm sự tiện lợi, ba lô này phục vụ cả nhu cầu đi lại hàng ngày và những chuyến đi dài hơn của bạn. Được làm bằng polyester bền chắc, được hỗ trợ bởi TPE, mang đến thể tích rộng rãi là 30 lít.', 3, 10, 1, 0, 0, 1799000, 'Ba lô, backpack, Accessories'),
('alyha00128_element,f_aah_frt1.jpg', 'Broker Beanie', 899000, 53, 'Broker Beanie là một món đồ cơ bản đáng tin cậy mà bạn có thể cất vào túi xách đi và lấy bất cứ khi nào bạn cần. Được làm bằng loại đan có gân phẳng tiêu chuẩn, chiếc mũ len này mang lại độ ấm tốt và có miếng dán ELEMENT dệt trên cổ tay áo. Có một kích thước.', 3, 11, 1, 0, 1, 499000, 'Mũ trùm, beanie, Accessories'),
('alyaa00105_element,p_cho_frt1.jpg', 'Daily Tri‑Fold Wallet', 0, 54, 'Là một trụ cột chính của ELEMENT, Ví hàng ngày là một vật dụng đáng tin cậy cung cấp nhiều không gian cho tất cả các vật dụng cần thiết của bạn: một khe chứa hóa đơn chính, một túi đựng tiền xu có khóa kéo tiện lợi, hai khe ẩn để tăng cường bảo mật và sáu khe cắm thẻ tiêu chuẩn. Với phần đính biểu tượng hình cây cổ điển của ELEMENT ở mặt trước, chiếc ví gấp ba lần này được làm bằng chất liệu giả da có kết cấu và được lót bằng polyester tái chế. Được thiết kế cho tiện ích.', 3, 12, 1, 0, 0, 699000, 'Accessories, Ví tiền, bóp, Wallet'),
('baker-hawk-ribbon-stack-deck-8-25-b2.png', 'BAKER HAWK RIBBON STACK B2 DECK 8.25', 0, 55, 'Thông tin sản phẩm đang được cập nhật.', 1, 2, 2, 0, 0, 1550000, 'Skateboard, deck, ván'),
('baker-sylla-judgement-day-deck-8-38.png', 'BAKER SYLLA JUDGEMENT DAY DECK 8.38', 0, 56, 'Thông tin sản phẩm đang được cập nhật', 1, 2, 2, 0, 0, 1550000, 'Skateboard, ván, deck'),
('baker-hawk-judgement-day-deck-8-0.png', 'BAKER HAWK JUDGEMENT DAY DECK 8.0', 0, 57, '\r\nThông tin sản phẩm đang được cập nhật', 1, 2, 2, 0, 0, 1550000, 'Skateboard, deck, ván'),
('img-9355-ad011f43-dc34-4d03-9c83-e40b4e6188d1.jpg', 'BDSKATECO SEBAS LEVIATAN BLACK CUSTOM COMPLETE 8.0', 2550000, 58, 'Thông tin sản phẩm đang được cập nhật', 1, 1, 4, 0, 1, 2299000, 'Skateboard ván trượt trọn bộ'),
('img-9347.jpg', 'BDSKATECO BLUE LIGHT TRUCKS 5.25', 0, 59, 'Thông tin sản phẩm đang được cập nhật', 1, 6, 4, 0, 0, 699000, 'Truck trục bánh xe skateboard'),
('bdskateco-polished-light-trucks-5-25-d771b1e8-bb16-49dd-b31d-22fe4d5b1652.jpg', 'BDSKATECO POLISHED LIGHT TRUCKS 5.0', 0, 60, 'Dùng cho DECK SIZE 7.3 đến 7.75', 1, 6, 4, 0, 0, 699000, 'Truck Trục bánh xe ván trượt'),
('img-9224-51476084-75a4-4731-82f6-15ef0a2203e7.jpg', 'BDSKATECO INK WHITE DECK 8.0', NULL, 61, 'Thông tin sản phẩm đang được cập nhật', 1, 2, 4, 0, 0, 899000, 'Deck Ván trượt Skateboard'),
('img-1533a.jpg', 'NOMAD VX CAMERA 101A WHEELS 53MM', 0, 62, 'Thông tin sản phẩm đang được cập nhật', 1, 5, 8, 0, 0, 499000, 'Wheels bánh xe ván trượt skateboard'),
('nomad-tattoo-logo-white-deck-2.jpg', 'NOMAD TATTOO LOGO WHITE DECK 8.25', 0, 63, 'Thông tin sản phẩm đang được cập nhật', 1, 2, 8, 0, 0, 899000, 'Deck ván trượt skateboard'),
('img-9000.jpg', 'NOMAD HASHTAG BLACK 101A WHEELS 52MM', 0, 64, 'Thông tin sản phẩm đang được cập nhật', 1, 5, 8, 0, 0, 499000, 'Wheels bánh ván trượt skateboard'),
('img-8691.jpg', 'NOMAD PU$$Y LICKING DECK - 8.0', 0, 65, 'Thông tin sản phẩm đang được cập nhật', 1, 2, 8, 0, 0, 899000, 'Deck ván trượt skateboard'),
('img-1838a.jpg', 'PLAN B MCCLUNG MOON SHOT CUSTOM COMPLETE 8.12', 0, 66, 'Thông tin sản phẩm đang được cập nhật', 1, 1, 6, 1, 0, 3299000, 'Ván trượt skateboard complete'),
('pxl-20210507-081512292-night.jpg', 'PLAN B SKULL PILOT GRIPTAPE', 0, 67, 'Thông tin sản phẩm đang được cập nhật', 1, 4, 6, 0, 0, 199000, 'Griptape giấy nhám ván trượt skateboard'),
('pxl-20210507-081559382-night.jpg', '2PAC BLANK GRIPTAPE', 0, 68, 'Thông tin sản phẩm đang được cập nhật', 1, 4, 6, 0, 0, 199000, 'Griptape giấy nhám ván trượt skateboard'),
('plan-b-giraud-roses-deck-8-0.png', 'PLAN B GIRAUD ROSES DECK 8.0', 0, 69, 'Thông tin sản phẩm đang được cập nhật', 1, 2, 6, 0, 0, 1499000, 'Deck ván trượt skateboard'),
('img-1660.jpg', 'DROSHKY BLOCKS BABY BLUE GRIPTAPE', 0, 70, 'Thông tin sản phẩm đang được cập nhật', 1, 4, NULL, 0, 0, 199000, 'Griptape Giấy nhám ván trượt skateboard'),
('img-8476.jpg', 'GRIZZLY MELTER GRIPTAPE', 0, 71, 'Thông tin sản phẩm đang được cập nhật', 1, 4, NULL, 0, 0, 220000, 'Griptape Giấy nhám ván trượt skateboard'),
('shorty-s-longboard-hardware-set-2-ph.png', 'SHORTY\'S LONGBOARD SET 2\" PHILLIPS HARDWARE', 0, 72, 'Thông tin sản phẩm đang được cập nhật', 1, 3, NULL, 0, 0, 220000, 'hardware ốc gắn ván trượt skateboard'),
('primitive-7-8-allen-hardware-set-gold-w-wrench-1.jpg', 'PRIMITIVE 7/8\" ALLEN HARDWARE GOLD W/WRENCH', 0, 73, 'Thông tin sản phẩm đang được cập nhật', 1, 3, NULL, 0, 0, 180000, 'hardware ốc gắn ván trượt skateboard'),
('bdskateco-1-allen-hardware-1.png', 'BDSKATECO 1\" ALLEN BLACK HARDWARE', 0, 74, 'Thông tin sản phẩm đang được cập nhật', 1, 3, 4, 0, 0, 100000, 'hardware ốc gắn ván trượt skateboard'),
('img-8334.jpg', 'BDSKATECO 1\" ALLEN MULTICOLOR HARDWARE', 0, 75, 'Thông tin sản phẩm đang được cập nhật', 1, 3, 4, 0, 0, 100000, 'hardware ốc gắn ván trượt skateboard'),
('wave-red.jpg', 'BDSKATECO WAVES RED WHEELS 52MM', 0, 76, 'Thông tin sản phẩm đang được cập nhật', 1, 5, 4, 0, 0, 499000, 'Wheel bánh xe cho ván trượt skateboard'),
('52120.jpg', 'KRUX K5 GALAXY STANDARD TRUCKS 8.0', 1599000, 77, 'Thông tin sản phẩm đang được cập nhật', 1, 6, NULL, 0, 1, 1299000, 'Truck trục bánh xe cho ván trượt skateboard'),
('alyzt00280_element,f_yel_frt1.jpg', 'Blazin’ Chest Tie‑Dye Short Sleeve T-Shirt', 0, 78, 'Cơ bản nhưng có chút ảo giác, Áo phông ngắn tay buộc dây Blazin ’Chest Tie-Dye là trang phục mặc hàng ngày có thương hiệu cổ điển của ELEMENT trên ngực và một vài tùy chọn giặt. Được làm bằng áo thun cotton hữu cơ, chiếc áo phông này nhẹ, thoáng khí và mang lại tính linh hoạt hàng ngày. Vừa vặn là tiêu chuẩn.', 2, 7, 1, 0, 0, 899000, 'Áo thun'),
('alykt00110_element,f_isg_frt1.jpg', 'Hovden Stripes Short Sleeve T‑Shirt', 0, 79, 'Cổ điển không bao giờ lỗi thời: Áo phông tay ngắn Hovden là trang phục thường ngày với các sọc nhuộm sợi nhiều màu trên toàn bộ. Mang đến vẻ ngoài trường tồn với thời gian, chiếc áo phông này có trọng lượng nhẹ, thoáng khí và được làm bằng bông hữu cơ. Vừa vặn là tiêu chuẩn.', 2, 7, 1, 0, 0, 599000, 'Áo thun'),
('alykt00121_element,f_otw_frt1.jpg', 'Basic Pocket Label Short Sleeve T‑Shirt', 0, 80, 'Bạn không bao giờ có thể có quá nhiều áo thun trơn màu trắng và Áo thun tay ngắn Basic Pocket Label là mặt hàng chủ lực hàng ngày có túi ngực nhỏ với miếng dán logo cây ELEMENT dệt. Được làm bằng bông hữu cơ nhẹ, chiếc áo thun này mang lại khả năng thở có ý thức về hoạt động và tính linh hoạt thông thường. Vừa vặn là tiêu chuẩn.', 2, 7, 1, 0, 0, 599000, 'Áo thun thời trang'),
('almzt00102_element,f_fam_frt1.jpg', 'Sunnett T‑Shirt', 0, 81, 'Đó là ánh nắng mặt trời và những sườn núi trong Áo phông Sunnett, một mặt hàng chủ lực ngắn tay có hình ảnh cảnh núi non tươi sáng ở lưng, ngang vai. Được làm bằng một chiếc áo nhẹ, chiếc áo này thoáng khí và mang lại cảm giác vừa vặn.', 2, 7, 1, 0, 0, 499000, 'Áo thun thời trang'),
('alyzt00350_element,f_fbk_frt1.jpg', 'Joint Tie‑Dye T-Shirt', 799000, 82, 'Được nhuộm bằng cà vạt, nhưng theo một cách tinh tế và bão hòa, Áo phông nhuộm màu chung là một chiếc áo thun tay ngắn cơ bản có hình in màn hình mountscape nhỏ trên ngực và một phiên bản lớn hơn ở mặt sau, ngang vai. Được làm bằng một chiếc áo đấu nhẹ, chiếc áo phông này mang lại khả năng thở chắc chắn và mang lại cảm giác vừa vặn tiêu chuẩn.', 2, 7, 1, 0, 1, 559000, 'Áo thun thời trang'),
('alyft00106_element,f_fbk_frt1.jpg', 'Cornell Classic Hoodie', 0, 83, 'Đơn giản và chắc chắn, Cornell Classic Hoodie là một chiếc áo len có trọng lượng trung bình mang lại tính linh hoạt và vẻ ngoài gọn gàng. Được làm bằng lông cừu chải, cũng có mũ trùm đầu có thể điều chỉnh được với dây rút tương phản và túi kangaroo. Phù hợp là thường xuyên.', 2, 8, 1, 0, 0, 1299000, 'Áo khoác thời trang hoodie'),
('alykt00116_element,f_lgh_frt1.jpg', 'Blazin’ Chest Ridge Pullover Hoodie', 1699000, 84, 'Là một sản phẩm chủ đạo của ELEMENT, Blazin ’Chest Ridge Hoodie được làm bằng đan bánh quế có trọng lượng trung bình, mang đến sự ấm áp chắc chắn và nét thẩm mỹ sạch sẽ, ấm cúng. Với mũ trùm đầu có thể điều chỉnh được với dây rút cũng như cổ tay áo và viền có gân, chiếc áo nỉ này có thể mặc hàng ngày. Vừa vặn là tiêu chuẩn.', 2, 8, 1, 0, 1, 1299000, 'Áo khoác thời trang hoodie'),
('alysf00144_element,f_tea_frt1.jpg', 'Star Wars™ x ELEMENT Yoda Pullover', 0, 85, 'Dù bạn đi bất cứ đâu, hãy mang theo Jedi Master: Star Wars ™ x ELEMENT Yoda Hoodie là một chiếc áo khoác cơ bản ấm cúng có tính năng giặt cà vạt toàn thân và đồ họa in lụa độc quyền từ sự hợp tác của chúng tôi với thương hiệu Star Wars ™ huyền thoại. Được làm bằng hỗn hợp bông hữu cơ và polyester tái chế thân thiện với môi trường, chiếc áo hoodie này mang đến sự ấm áp tập trung vào sự thoải mái và một chiếc mũ trùm có thể điều chỉnh để tăng thêm độ ấm. Vừa vặn là thư thái.', 2, 8, 1, 0, 0, 1280000, 'Áo khoác thời trang hoodie'),
('alysw00100_element,f_fbk_frt1.jpg', 'Danny Crew II Crewneck Sweater', 1899000, 86, 'Danny Crew II Crewneck Sweater là một thiết bị xoay vòng cần thiết. Linh hoạt và sắc nét về mặt thẩm mỹ, chiếc áo len mỏng nhẹ này mang lại sự ấm áp vững chắc cho thời tiết chuyển mùa và tiện ích hàng ngày. Vừa vặn là tiêu chuẩn.', 2, 8, 1, 0, 1, 1699000, 'Áo khoác thời trang sweatshirt'),
('alyjk00146_element,f_isg_frt1.jpg', 'DULCEY CORDUROY JACKET', 2299000, 87, 'Là một mặt hàng chủ lực của ELEMENT được thiết kế theo phong cách cổ điển, Áo khoác Dulcey Corduroy mang đến vẻ ngoài thoải mái với thiết kế sạch sẽ. Được làm từ cotton nhung lót vải sherpa, chiếc áo khoác này có trọng lượng nặng và cung cấp độ ấm đáng tin cậy, cộng với hai túi phía trước để khi tay bạn cảm thấy lạnh. Được xử lý bằng lớp sơn chống thấm nước bền bỉ, sẵn sàng cho các chuyến du ngoạn trong mọi thời tiết, vừa vặn là tiêu chuẩn.', 2, 9, 1, 0, 1, 2000000, 'Áo khoác mùa đông thời trang'),
('alyjk00140_element,f_fnh_frt1.jpg', 'Wolfe Vest', 0, 88, 'Vest Wolfe là vật dụng cần thiết trong thời tiết chuyển mùa, mang lại tính linh hoạt hàng ngày và vẻ thẩm mỹ sạch sẽ. Được làm bằng nylon tái chế bền, chiếc áo vest này mang đến sự ấm áp chắc chắn và lớp đệm bông nhẹ. Có thể đảo ngược hoàn toàn, có bảng điều khiển ngực tương phản ở một mặt và mặt khác in lưới toàn bộ, tất cả đều được phủ một lớp xử lý chống thấm nước cho tiện ích sẵn sàng đi mưa. Vừa vặn là tiêu chuẩn.', 2, 9, 1, 0, 0, 1220000, 'Áo khoác mùa đông'),
('alyjk00138_element,f_fnh_frt1.jpg', 'Alder Puff Fundamental Jacket', 1450000, 89, 'Khi bạn làm việc theo đúng nghĩa đen của thời tiết, Alder Puff cơ bản là sản phẩm không cần suy nghĩ để bảo vệ khỏi mưa và gió. Được làm bằng ripstop trọng lượng trung bình với phần thân có đệm, chiếc áo parka này mang lại sự ấm áp chắc chắn và có lớp phủ chống thấm nước bền bỉ. Mang đến một cái nhìn sắc nét và chặn màu theo xu hướng và một mui xe có thể điều chỉnh để tăng thêm độ ôm, vừa vặn là tiêu chuẩn.', 2, 9, 1, 0, 1, 1299000, 'Áo khoác thời trang mùa đông'),
('alyft00148_element,f_oat_frt1.jpg', 'Gros Jack Zip‑Up Fleece', 0, 90, 'Gros Jack Fleece là một chiếc áo pull zip đầy đủ linh hoạt được thiết kế với sự hợp tác của Hotel Radio Paris. Được làm bằng loại vải giống như polartec sherpa ấm cúng, bộ lông cừu này mang lại sự ấm áp chắc chắn và kiểu dáng thoải mái, hợp xu hướng. Có nhiều không gian túi, bao gồm cả trên ngực, để tạo sự thuận tiện và cho các vật dụng cần thiết của bạn, sự vừa vặn là thoải mái.', 2, 9, 1, 1, 0, 4899000, 'Áo lông áo khoác thời trang'),
('alybp00117_element,p_ind_frt1.jpg', 'Mohave Venture 30L Large Skate Backpack', 0, 91, 'Cuộc phiêu lưu đang chờ đợi với Mohave Venture Backpack. Được làm bằng nylon bền, được hỗ trợ bởi TPE, catchall này cung cấp một ngăn chính với một ống bọc đệm cho phần cứng có giá trị của bạn, một túi có khóa kéo phía trước để tạo sự thuận tiện, túi hai bên để truy cập khi đang di chuyển và một túi đựng kính râm của bạn tại đứng đầu. Với mặt sau bằng lưới thoát khí tập trung vào sự thoải mái và dây đai ván trượt có thể xếp gọn dễ dàng, chiếc ba lô này rất linh hoạt và đáng tin cậy. Thể tích là ba mươi lít rộng rãi.', 3, 10, 1, 0, 0, 1450000, 'Ba lô ván trượt'),
('alyaa00111_element,p_rqj0_frt1.jpg', 'Trail Tri‑Fold Wallet\r\n', 499000, 92, 'Là một mặt hàng chủ lực của ELEMENT, Trail Wallet là loại ví gấp ba tiêu chuẩn có cấu trúc nylon bền và chặn màu trên các nếp gấp. Cung cấp một khe hóa đơn chính, ba khe cắm thẻ tiêu chuẩn, một túi đựng tiền xu có khóa kéo, một vòng vòng D bên ngoài cho dây chuyền hoặc carabiner và lớp lót chống trộm, chiếc ví này đáng tin cậy vì nó rất tiện lợi. Có một kích thước.', 3, 12, 1, 0, 1, 280000, 'Ví tiền thời trang ellement accessories'),
('alyha00125_element,p_fbk_frt1.jpg', 'Nook Hat', 0, 93, 'Mũ Nook là một chiếc mũ đa năng có cấu trúc năm bảng điều khiển riêng biệt và vành phẳng đặc trưng. Được làm bằng sợi bông bền, chiếc mũ này mang đến khả năng đeo có ý thức về hoạt động và có thể điều chỉnh độ vừa vặn thông qua khóa cài ở phía sau, có một kích cỡ.', 3, 11, 1, 0, 0, 199000, 'Nón thể thao đường phố'),
('alyxe03020_element,p_ast_frt1.jpg', 'Section 52mm All‑Terrain Wheel', 0, 94, 'Là một trụ cột chính của ELEMENT, Bánh xe Section 52mm có thương hiệu đặc trưng của chúng tôi ở bên ngoài và mang lại một chuyến đi êm ái trên mọi địa hình. Được sản xuất với công thức tiêu chuẩn và polyurethane cao cấp của chúng tôi.', 1, 5, 1, 0, 0, 499000, 'Wheels bánh xe ván trượt'),
('acsttbnd_element,f_ast_frt2.jpg', 'Component Trucks Bundle', 0, 95, 'Đã thử và đúng: Gói xe tải thành phần bền, dễ thích ứng và cung cấp nhiều kích cỡ. Tất cả các gói đều đi kèm với bánh xe 54MM / 99A.', 1, 6, 1, 0, 0, 899000, 'Truck trục bánh xe ván trượt'),
('plan-b-patch-8-25-complete.jpg', 'Plan B Patch 8.25″ Complete', 0, 96, 'Thông tin sản phẩm đang được cập nhật', 1, 1, 6, 1, 0, 3299000, 'Ván trượt skateboard'),
('plan-b-joslin-fades-8-125-complete.jpg', 'Plan B Joslin Fades 8.125″ Complete', 0, 97, 'Thông tin sản phẩm đang được cập nhật', 1, 1, 6, 0, 0, 2299000, 'ván trượt skateboard hoàn thành'),
('plan-b-joslin-one-offs-8-125-complete.jpg', 'Plan B Joslin One Offs 8.125″ Complete', 2899000, 98, 'Thông tin sản phẩm đang được cập nhật', 1, 1, 6, 0, 1, 2199000, 'ván trượt skateboard hoàn thành'),
('plan-b-team-chain-8-0-complete-1.jpg', 'Plan B Team Chain 8.0″ complete', 0, 99, 'Thông tin sản phẩm đang được cập nhật', 1, 1, 6, 0, 0, 2899000, 'ván trượt skateboard hoàn thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` bigint(20) NOT NULL,
  `TENKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MASP` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parents_category_id` (`parents_category_id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MASP` (`MASP`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `parents_category`
--
ALTER TABLE `parents_category`
  ADD PRIMARY KEY (`parents_category_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `parents_category_id` (`parents_category_id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `TENKH` (`TENKH`),
  ADD KEY `MASP` (`MASP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MAHD` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `parents_category`
--
ALTER TABLE `parents_category`
  MODIFY `parents_category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MASP` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
