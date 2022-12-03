-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2022 lúc 12:42 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `email`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'myb1910105@student.ctu.edu.vn', 'NgocMy', '$2y$10$X2.XsToGkOlwJjqWzcbyP.fM7/vnK98XO/LYvwYSIYDnq5LN2Q6TS', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `tags_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `detail_header` text DEFAULT NULL,
  `detail_footer` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `slug`, `cat_id`, `tags_id`, `title`, `detail_header`, `detail_footer`, `image`, `created_at`, `updated_at`) VALUES
(1, 'cac-nhom-cung-cap-duong-chat-cho-da-ban-nen-biet', 3, 4, 'Các nhóm cung cấp dưỡng chất cho da bạn nên biết', 'Lão hóa da phần lớn do rối loạn chức năng nguyên bào sợi và giảm hoạt động sinh tổng hợp của chúng. Bất kể nguyên nhân gì, lão hóa cũng bắt đầu từ sự giảm sản xuất các thành phần quan trọng của ngoại bào với số lượng dưới mức cần thiết đê’ duy trì diện mạo trẻ trung của làn da.', 'Mục tiêu của phương pháp mesotherapy chủ yếu là làm chậm những thay đổi và phục hổi những thương tổn ở da do quá trình lão hóa. Lý do cho việc phát triển các phức hợp đa thành phần trong điểu trị được dựa trên nguyên tắc rằng: lão hóa da sẽ xảy ra nếu các thành phần cần thiết trong cơ thể giảm sút, làm giảm quá trình tổng hợp các yêu tố quan trọng để duy trì sự trẻ trung. Các phức hợp đó bao gồm các vitamin, khoáng chất, acid amin, nucleotide, coenzym và chất chống oxy hóa cũng như acid hyaluronic được sử dụng đê’ giúp nguyên bào sợi hoạt động có hiệu quả hơn, cung cấp một môi trường tối ưu cho các quá trình sinh hóa, chuyển hóa năng lượng cũng như chóng lại các tác động của quá trình oxy hóa. Trong thí nghiệm in vitro cho thấy rằng có một sự gia tăng đáng kể trong tổng hợp và hoạt động của nguyên bào sợi.', 'nhom-chat-dinh-duong83.jpg', '2022-08-04 12:45:55', '2022-08-04 19:45:55'),
(2, 'ket-qua-se-ra-sao-neu-10-ngay-su-dung-thuc-pham-organic-huu-co', 5, 6, 'Kết quả sẽ ra sao nếu 10 ngày sử dụng thực phẩm Organic hữu cơ', 'Một chế độ ăn hữu cơ giúp giảm nhanh chóng phôi nhiễm thuốc trừ sâu chỉ trong một tuần. Mức độ giảm trung bình là 60,5%, phạm vi từ 37% đến 95% tùy thuộc vào hợp chất.\r\n\r\nCó 16 loại thuốc trừ sâu và hóa chất do quá trình phân hủy tạo ra, được gọi là chất chuyển hóa tìm thấy trong cơ thể, bao gồm glyphosate, organophosphates, pyrethroids, neonicotinoid clothianidin và thuốc diệt cỏ phenoxy 2,4-D.', 'Cái khó ở chính là làm sao đưa sản phẩm Organic hữu cơ dễ dàng tiếp cận nhiều người hơn với mức giá, chất lượng phù hợp.\r\n\r\nVới một ước mơ và mong muốn mang đến những sản phẩm Organic tốt nhất trên thế giới về Việt Nam để phục vụ và lan tỏa lối Sống Hữu Cơ cho tất cả chúng ta.', 'maxresdefault-1334.jpg', '2022-10-17 05:25:50', '2022-10-17 12:25:50'),
(3, '15-cach-giam-huyet-ap-tu-nhien', 4, 6, '15 cách giảm huyết áp tự nhiên', 'Dạo những năm gần đây, chúng ta gặp phải những trường hợp nghệ sỹ lớn mất vì đột quỵ và mọi người mới bắt đầu để ý nhiều hơn về vấn đề này. Đột quỵ sẽ không chừa một ai, một đối tượng nào cả và ngày càng có xu hướng trẻ hóa.Có rất nhiều nguyên nhân dẫn đến đột quỵ như máu nhiễm mỡ, tiểu đường, hút thuốc lá nhưng phần lớn là có liên quan đến các về bệnh tim mạch và tăng huyết áp (đã được cảnh báo từ lâu 2015).', 'Bạn có biết, hơn 25% dân số Việt nam có vấn đề về huyết áp. Tức là cứ 4 người thì có 1 người bị. Cứ 2 người bệnh không biết mình bị bệnh. Nó cũng được xem là căn bệnh “GIẾT NGƯỜI THẦM LẶNG”. Gánh nặng kinh tế là rất lớn nếu để lại di chứng suốt đời.\r\nQuay trở lại với vấn đề huyết áp cao. Đó là dấu hiệu rất nguy hiểm, làm tăng nguy cơ mắc các chứng bệnh giết người hàng đầu như đau tim và đột quỵ, cũng như chứng phình động mạch, suy giảm nhận thức và suy thận.\r\nHầu hết mọi người sẽ dùng thuốc để có thể làm giảm huyết áp, nhưng nó có thể gây ra các tác dụng phụ như chuột rút ở chân, chóng mặt và mất ngủ', 'pexels-thirdman-5327647-1851x277678.jpg', '2022-08-04 12:54:53', '2022-08-04 19:54:53'),
(4, 'bat-ngo-ve-cach-tu-duy-doc-la-kho-luong-cua-nguoi-do-thai', 8, 10, 'Bất ngờ về cách tư duy độc lạ, khó lường của người Do Thái', 'Với những cách tư duy độc lạ của người Do Thái trong các mẩu chuyện sau sẽ mang lại cho bạn bài học cuộc sống vô cùng giá trị có thể theo bạn suốt cuối cuộc đời.', 'Có thể thấy, cách tư duy độc lạ của người Do Thái trong câu chuyện trên chỉ ra rằng, đừng quá tin tưởng ai đó tới mức không thèm suy nghĩ hay tính toán, dù là người bạn cảm thấy vô cùng tin tưởng. Với bất cứ điều gì bạn cũng phải tự suy nghĩ vấn đề xảy ra chứ không hoàn toàn tin vào người mà bạn nghĩ rằng họ giỏi hơn bạn mà chẳng có chút nghi ngờ nào cả.', 'cach-tu-duy-doc-la-cua-nguoi-Do-Thai31.jpg', '2022-08-04 13:02:19', '2022-08-04 20:02:19'),
(5, 'cuc-chan-nuoi-len-tieng-giai-thich-vi-sao-thit-lon-khong-giam-gia', 1, 6, 'Cục Chăn nuôi lên tiếng giải thích vì sao thịt lợn không giảm giá', 'Chia sẻ tại hội nghị trực tuyến bàn giải pháp thúc đẩy chăn nuôi lợn do Bộ NN-PTNT tổ chức sáng nay, 6.5, Cục Chăn nuôi đã lý giải vì sao giá lợn thịt liên tục tăng cao trong thời gian qua dù Chính phủ và Bộ NN-PTNT đã có các biện pháp can thiệp, chỉ đạo bình ổn giá.\r\nTheo Cục Chăn nuôi, do dịch bệnh, dẫn đến nguồn cung lợn giảm mạnh, làm giá tăng. Báo cáo của các địa phương cho thấy, đến hết tháng 2 năm nay, tổng đàn lợn của cả nước đạt gần 24 triệu con, chỉ tương đương 74% so với tổng đàn lợn trước khi có dịch tả lợn châu Phi.', 'Cục Chăn nuôi cho rằng, một nguyên nhân khác khiến thịt lợn khó giảm giá là lợn hơi xuất chuồng đến tay người tiêu dùng phải qua 2 – 5 khâu trung gian, làm giá tăng (gần 43%).\r\nBên cạnh đó, giá nguyên liệu thức ăn chăn nuôi nhập khẩu tăng làm giá thức ăn chăn nuôi hỗn hợp tăng trên 10%; chi phí phòng chống dịch bệnh tăng cao do phải áp dụng các biện pháp chăn nuôi an toàn sinh học, thuốc sát trùng… cũng làm giá lợn hơi tăng.\r\nTheo Cục Chăn nuôi, chịu tác động từ dịch tả lợn châu Phi, giá lợn hơi của Trung Quốc tăng quá cao, ở mức 120.000 đồng/kg nên vẫn có hiện tượng thẩm lậu lợn thịt, lợn giống và sản phẩm thịt lợn qua biên giới.', 'thit-heo80.jpg', '2022-08-04 13:04:04', '2022-08-04 20:04:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tags_id`) VALUES
(12, 1, 4),
(13, 1, 5),
(14, 2, 6),
(15, 2, 7),
(16, 3, 6),
(17, 3, 7),
(18, 3, 8),
(19, 4, 10),
(20, 5, 6),
(21, 5, 7),
(22, 2, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'trai-cay-tuoi', 'Trái cây tươi', 'pexels-pixabay-4617413.jpg', 1, '2022-10-30 13:31:47', '2022-10-30 13:31:47'),
(2, 'thit-tuoi-cac-loai', 'Thịt tươi các loại', 'image__10__14d7855a6ca148e79829afc09235a2d3_master99.jpeg', 1, '2022-10-30 13:33:25', '2022-10-30 13:33:25'),
(3, 'hai-san-tuoi-song', 'Hải sản tươi sống', '1_52616a8d520f48e9aa855811bbec3406_master73.jpeg', 1, '2022-10-30 13:35:12', '2022-10-30 13:35:12'),
(4, 'rau-cu-cac-loai', 'Rau củ các loại', 'pexels-anthony-13243021.jpg', 1, '2022-10-30 13:36:13', '2022-10-30 13:36:13'),
(5, 'bo-sua-pho-mai-trung', 'Bơ, Sửa, Phô mai - Trứng', 'image__56__26ef5a019db94e098beeca623b5d7f6f_master15.jpg', 1, '2022-10-30 13:37:59', '2022-10-30 13:37:59'),
(6, 'dau-an-va-gia-vi', 'Dầu ăn và Gia vị', '1_0086f92a5c6a42698449e3a2174baeed_master79.jpg', 1, '2022-10-30 13:39:43', '2022-10-30 13:39:43'),
(7, 'gao-va-ngu-coc', 'Gạo và ngũ cốc', 'image_fc1664d6349449c5a3cd773680f17724_master90.jpg', 1, '2022-10-30 13:42:28', '2022-10-30 13:42:28'),
(8, 'danh-cho-buoi-an-sang', 'Dành cho buổi ăn sáng', 'banh_mi_hoa_cuc_harrys_-_500g_c2_0ec75b02e5fd4dda9812704d65c89f3a_master18.jpg', 1, '2022-10-30 13:52:58', '2022-10-30 13:52:58'),
(9, 'do-uong-cac-loai', 'Đồ uống các loại', 'kom-10_247d8c4f84e546dc8c387652b4fad754_master5.jpg', 1, '2022-10-30 13:54:19', '2022-10-30 13:54:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_of_blog`
--

CREATE TABLE `category_of_blog` (
  `id` int(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category_of_blog`
--

INSERT INTO `category_of_blog` (`id`, `slug`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'food', 'Food', 1, '2022-11-01 07:50:04', '2022-08-04 17:20:51'),
(3, 'beauty', 'Beauty', 1, '2022-11-01 07:50:06', '2022-08-04 17:22:11'),
(4, 'life-style', 'Life style', 1, '2022-11-01 07:53:54', '2022-08-04 17:22:31'),
(5, 'travel', 'Travel', 1, '2022-11-01 07:53:55', '2022-08-04 19:12:36'),
(7, 'health', 'Health', 1, '2022-11-01 07:53:57', '2022-08-04 19:57:52'),
(8, 'technology', 'Technology', 1, '2022-11-01 07:53:58', '2022-11-01 14:35:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_pro`
--

CREATE TABLE `comment_pro` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment_pro`
--

INSERT INTO `comment_pro` (`id`, `user_id`, `product_id`, `content`, `created_at`, `updated_at`) VALUES
(6, 2, 1659702929, 'Hello ca nha yeu ca kem', '2022-09-29 07:28:29', '2022-09-29 14:28:29'),
(10, 7, 1667234988, 'Sản phẩm rất tuyệt vời', '2022-11-17 07:22:39', '2022-11-17 14:22:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` bigint(100) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `product_id`, `image`) VALUES
(1, 1659429868, 'cat-167.jpg'),
(2, 1659429868, 'cat-263.jpg'),
(3, 1659429868, 'cat-316.jpg'),
(4, 1659429868, 'cat-417.jpg'),
(5, 1659429868, 'cat-577.jpg'),
(6, 1659429891, 'cat-147.jpg'),
(7, 1659429891, 'cat-27.jpg'),
(8, 1659429891, 'cat-334.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_08_143622_loyal_customers', 2),
(6, '2022_08_10_094713_loyal_customers', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price_unit` bigint(20) NOT NULL,
  `price_promotion` bigint(20) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `top_rate` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `slug`, `name`, `price_unit`, `price_promotion`, `description`, `status`, `quantity`, `image`, `cat_id`, `top_rate`, `created_at`, `updated_at`) VALUES
(1667230401, 'du-du-malaysia-depaco', 'Đu Đủ Malaysia Depaco', 35200, 0, 'Cũng giống như Đu Đủ Giống Nhật, Đu Đủ Giống Malaysia được trồng hoàn toàn theo hướng hữu cơ vỏ xanh láng đẹp, thời gian bảo quản lâu hơn các giống đu đủ khác, khi chín tự nhiên thịt chắc hương vị rất thơm ngọt và nhiều nước.\r\nĐu Đủ Sạch Ruột Vàng Depaco Farm với đặc điểm có vị ngọt đậm, thịt chắc, dày thịt, thịt có màu vàng đẹp và đặc biệt là chịu được vận chuyển xa và bảo quản được lâu nên trưng cúng rất tiện, ăn lại rất ngon nên được người tiêu dùng rất ưa chuộng.\r\nĐu Đủ Giống Malaysia Ruột Vàng có trọng lượng trái vừa phải, bình quân 1kg - 1,8kg/trái rất tiện lợi và phù hợp cho gia đình 3,4 người ăn hoặc cho các nhà máy chế biến.\r\nĐu Đủ Ruột Vàng Giống Malaysia do MP Fruits cung cấp là Đu Đủ trồng tại vùng Thanh Sơn - Định Quán, giống đu đủ này do Chú Cón nghiên cứu và lai tạo ( Chú Cón là bậc thầy trong việc gìn giữ, nghiên cứu, lai tạo, phát triển các giống đủ đủ ngon nhất từ xưa đến nay ) có thương hiệu từ rất lâu.', 1, 120, 'image__81__e1befcd558714c6d92ce224ffd01ae2c_master74.jpg', 1, 1, '2022-10-31 15:33:21', '2022-10-31 22:33:21'),
(1667230510, 'dua-cat-hinh-non-gtj', 'Dừa Cắt Hình Nón Gtj', 23000, 0, 'Dừa là loại trái cây giúp giải khát, nước dừa cung cấp lượng muối khoáng dồi dào và hỗ trợ hệ miễn dịch cho cơ thể.\r\n\r\nGiá trị dinh dưỡng cho mỗi 100 g (3,5 oz) dừa: Năng lượng 354 kcal (1.480 kJ), Cacbohydrat 15.23 g, Chất béo 33.49g, Chất đạm 3.33g, Vitamin Thiamine (B1) 0.066 mg, Riboflavin (B2) 0.020mg, Niacin (B3) 0.540mg, Pantothenic acid (B5) 0.300mg, Vitamin B6 0.054mg, Vitamin B9 26μg, Vitamin C 3.3mg, Vitamin E 0.24mg, Vitamin K 0.2μg.\r\n\r\nChất khoáng: Canxi 14mg, Sắt 2.43mg, Magiê 32mg, Mangan 1.500mg, Phốt pho 113mg, Kali 356mg, Natri 20mg, Kẽm 1.10mg, Nước 46.99g…\r\n\r\nCông dụng của Dừa:\r\n\r\nDừa có rất nhiều lợi ích cho sức khỏe như: tăng cường hệ tiêu hóa, tăng cường hệ miễn dịch, hạn chế bệnh tim mạch, ngăn ngừa bệnh tiểu đường,…\r\nTrong nước dừa chứa nhiều kali và khoáng chất giúp giải khát, bổ sung nước cho cơ thể, trị khô miệng, sưng phù do bệnh tim,…\r\nHiện nay, dừa là loại quả đang được rất nhiều người yêu thích dùng chế biến thành món sinh tố dừa, một món uống mang lại rất nhiều lợi ích cho sức khỏe như:\r\n\r\nHỗ trợ hệ tiêu hóa, bù lại lượng nước đã mất cho cơ thể khi bị tiêu chảy.\r\nSinh ra năng lượng bổ sung, cân bằng chất lỏng trong cơ thể, giúp cơ thể tràn đầy năng lượng.\r\nGiúp xương chắc khỏe, bổ sung nhiều chất khoáng tốt cho xương.\r\nGiúp phụ nữ mang thai giảm tình trạng táo bón, ợ hơi, nóng trong người,…\r\nUống sinh tố dừa thường xuyên có thể làm đẹp da, trị nám, ngăn ngừa lão hóa và giúp giảm cân.', 1, 120, '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 1, 1, '2022-10-31 15:35:10', '2022-10-31 22:35:10'),
(1667230603, 'dua-gao-troc-xiem-xanh-ben-tre-dka', 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', 19000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, '2_04043e295213456796b1e5566973cfe8_master74.jpg', 1, 1, '2022-10-31 15:36:43', '2022-10-31 22:36:43'),
(1667230741, 'dua-hau-khong-hat', 'Dưa Hấu Không Hạt', 39000, 0, 'Dưa hấu ruột đỏ không hạt là loại giống dưa đã được lai tạo nhằm tạo ra giống mới có những đặc tính vượt trội hơn.\r\n\r\nSức sinh trưởng, phát triển khỏe, dễ trồng, dễ đậu quả.\r\n Độ đường cao, thịt quả chắc, màu sắc thịt đỏ đẹp…\r\nDưa hấu chứa nhiều lycopene-chất chống oxy hóa có tác dụng chống lại ung thư ngực ở phụ nữ và ung thư tuyến tiền liệt ở nam giới. Ngoài ra còn là nguồn cung cấp các chất dinh dưỡng như các sinh tố A, B1 (Tbiamin), B6 (Pyridoxine), C, E, Magnesium và Potassium.\r\n\r\nVới cơ thể yếu, ăn dưa hấu sẽ giúp cơ thể đề kháng được virus xâm nhập, tăng cường miễn dích, nâng cao thị lực. Dưa hấu còn là một trong những loại thực phẩm hiếm hoi cung cấp chất citrulin, loại chất axit-amin có tác dụng làm lành vết thương. Chất này có nhiều hơn ở phần vỏ của dưa hấu nhưng mọi người thường hay bỏ đi.\r\n\r\nDưa hấu cung cấp đủ các dưỡng chất cho phụ nữ, giúp họ có làn da mịn màng hơn, dùng dưa hấu ăn kiêng, không những giúp giảm cân mà còn đào thải các chất độc ra khỏi cơ thể vì loại quả này có khả năng nhanh làm no mà lại cung cấp rất ít năng lượng.\r\n\r\nTrước đây khi ăn dưa hấu chúng ta thường có cảm giác không thoải mái khi vừa ăn vừa phải lừa nhả hạt ra, với dưa hấu không hạt chúng ta không còn cảm giác khó chịu phải nhả hạt ra nữa.\r\n\r\nTrước đây nhiều bà mẹ không muốn cho con mình ăn dưa hấu vì sợ con mình bị hóc hạt. Hiện nay với dưa hấu không hạt, các bà mẹ hoàn toàn yên tâm khi cho trẻ em ăn mà không sợ bị hóc hạt.', 1, 120, '2_f834144867884b29a2f5a4c615090b02_master98.jpg', 1, 1, '2022-10-31 15:39:01', '2022-10-31 22:39:01'),
(1667230843, 'dua-hau-ruot-do', 'Dưa Hấu Ruột Đỏ', 72000, 0, 'Dưa hấu có tên khoa học là Citrullus lanatus, là một loại thực vật thuộc họ bầu bí, vỏ cứng, chứa nhiều nước, có nguồn gốc từ miền nam Châu Phi. Dưa hấu được được nhiều người ưa chuộng bởi tính ngọt mát và nhiều nước, đồng thời còn giúp cung cấp nhiều vitamin và các nguyên tố vi lượng cho cơ thể.', 1, 120, '2_8e2d378661cd46008b0e502f265a9e0b_master80.jpg', 1, 1, '2022-10-31 15:40:43', '2022-10-31 22:40:43'),
(1667230927, 'dua-luoi-tron-vo-xanh-ruot-cam-tl3', 'Dưa Lưới Tròn Vỏ Xanh Ruột Cam Tl3', 128700, 0, 'Là loại trái cây được rất nhiều người ưa thích vì màu sắc đẹp mắt và vị ngon ngọt, mang giá trị dinh dưỡng cao và nhiều công dụng tuyệt vời cho sức khỏe như ngừa ung thư, bổ mắt, chống viêm khớp và làm đẹp da… Dưa lưới với vị ngọt vừa phải, giúp người dùng giải khát trong ngày hè.\r\n\r\nLà một trong những giống dưa lưới được nhiều người ưa chuộng. Đặc điểm của giống dưa này là quả có dáng tròn, vỏ dày có hình gân lưới bên ngoài. Bên trong có phần thịt và hạt dưa màu đỏ cam, giòn ngọt, thanh mát. Đây là loại  được yêu thích bởi màu sắc đẹp mắt và vị ngon ngọt. Ngoài ra, dưa lưới có giá trị dinh dưỡng cao và nhiều công dụng tuyệt vời cho sức khỏe như ngừa ung thư, bổ mắt, chống viêm khớp và làm đẹp da…\r\n\r\nChống oxy hóa ngừa ung thư và lão hóa\r\nGiàu folate và vitamin nhóm B, rất cần thiết cho sự phát triển của thai nhi và ngừa bệnh thiếu máu, giảm nguy cơ bệnh tật cho não, dị tật thần kinh bẩm sinh và chậm phát triển ở trẻ em.\r\nGiàu nước và chất xơ, giúp ngăn ngừa táo bón, thúc đẩy và duy trì hệ tiêu hóa khỏe mạnh.\r\nNgăn ngừa sự oxy hóa các khớp xương, giảm viêm nhờ chất phytochemical có trong dưa.\r\nGiúp cơ thể giải độc, điều tiết tốt hơn, ngoài ra còn có tác dụng bảo vệ da khỏi tia UV.', 1, 120, '1_801c5af7c0a74b978908ba8d2fc9e133_master35.jpg', 1, 1, '2022-10-31 15:42:07', '2022-10-31 22:42:07'),
(1667231042, 'dua-tuoi-tien-loi-safe-fruits-gtj-trai', 'Dừa Tươi Tiên Lợi Safe Fruits Gtj (Trái)', 26000, 0, 'Dừa xiêm Safe Fruit chất lượng, dừa tươi nguyên trái 100%Dừa xiêm tươi tự nhiên, nhiều nước, ngọt thanh, sảng khoái. Nước dừa cung cấp vitamin, khoáng chất tốt cho sức khỏeSử dụng để uống giải khát, pha chế các món nước, nấu ăn.\r\n\r\nNơi xuất xứ: Việt Nam\r\n\r\nMục đích sử dụng: Uống nước trực tiếp.Cách thức bảo quản Giữ lạnh từ 5 đến 15 độ Clà sản phẩm dừa tươi nguyên trái, đã được gọt sạch phần vỏ ngoài. Đây là sản phẩm dừa xiêm trái tiện lợi, có thể dùng ngay khi khui mở sản phẩm. Vỏ mỏng, nhiều nước, ngọt thanh, mát dịu. Có thể dùng dừa ướp lạnh để uống trực tiếp hoặc sử dụng nước dừa để pha chế hay nấu ăn. \r\n\r\nThành phần của nước dừa tươi chứa nhiều chất dinh dưỡng thiết yếu cho cơ thể. Uống nước dừa giúp bổ sung năng lượng, tốt cho tim mạch, tiêu hóa, hỗ trợ giảm cân, chống mất nước, làm đẹp da,...được bảo quản lạnh ở nhiệt độ từ 5 đến 15 độ C. \r\n\r\nNên sử dụng hết lượng nước dừa bên trong sau khi khui mở sản phẩm. Tuyệt đối không uống nước dừa chua thiu hay có dấu hiệu hư hỏng, biến chất. Cam kết cung cấp các mặt hàng tươi sống, sạch sẽ, nguyên vị, đạt mọi tiêu chuẩn về chất lượng.', 1, 120, '1_0d4f22b060da48d6b49bccb8b64841aa_master28.jpg', 1, 1, '2022-10-31 15:44:02', '2022-10-31 22:44:02'),
(1667231141, 'dua-xiem-got-xanh-cdk', 'Dừa Xiêm Gọt Xanh C.D.K', 23000, 0, 'Dừa Xiêm Gọt Xanh C.D.K được tuyển chọn rất kỹ từ những quả dừa xiêm xanh ngon, cơm dừa có độ non vừa phải không có bị già, nước ngọt và có mùi hương thơm mát. Dừa xiêm gọt trọc tự nhiên nói không với chất tẩy trắng và chất bảo quản.\r\n\r\nDừa xiêm gọt trọc sẵn siêu tiện lợi, dễ bảo quản, nhỏ gọn nhưng lại có võ uống đến đâu thấm đến đó, nước dừa ngọt mát lịm, mùi hương thơm mát làm cho người uống có cảm giác tươi mát và xua tan đi bao mệt mỏi.\r\n\r\nNước dừa xiêm thuần khiết, hoàn toàn tự nhiên có tác dụng giải nhiệt, làm đẹp, tốt cho tim mạch, tiêu hóa, chống oxy hóa.', 1, 120, '1_5e68977153524e5c8dc9a67dc5d9cdd4_master69.jpg', 1, 1, '2022-10-31 15:45:41', '2022-10-31 22:45:41'),
(1667231221, 'dua-xiem-tien-loi-cdk', 'Dừa Xiêm Tiện Lợi C.D.K', 29000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, '1_467bc22c76cf43cdbb845574238f5a29_master39.jpg', 1, 1, '2022-10-31 15:47:01', '2022-10-31 22:47:01'),
(1667231360, 'dua-xiem-tl-loc-3', 'Dừa Xiêm TL Lốc 3', 51000, 0, 'Dừa Xiêm TL lốc 3 tái tiện lợi\r\n\r\nXuất xứ: Việt Nam\r\nQuy cách: 3 trái\r\nTiêu chuẩn chất lượng: Sản phẩm dừa Xiêm tiện lợi được chọn lọc hoàn toàn tự nhiên, không sử dụng hóa chất ngâm tẩy.\r\nĐặc điểm nổi bật:\r\nKích thước quả dừa Xiêm nhỏ, chứa được khoảng 200-300mi nước dừa\r\nQuả dừa để càng già thì nước dừa càng ngọt\r\nCơm dừa mỏng, màu trắng trong và có vị ngọt thanh\r\nNước dừa thơm, vị ngọt thanh tự nhiên\r\nQuầy dừa Xiêm rất sai quả, thông thường sẽ có khoảng 15-25 trái/quầy\r\nHướng dẫn sử dụng:\r\n\r\nNgon hơn khi dùng trực tiếp từ quả\r\nCó thể nạo cơm dừa uống chung hoặc dùng cơm dừa xay sinh tố\r\nPhụ nữ có thai 3 tháng đầu và người có thể trạng hàn không nên uống nước dừa\r\nHướng dẫn bảo quản: Nên bảo quản trong tủ lạnh để dùng được lâu hơn.', 1, 120, '1_24fad3cb1ee741e586e57e8712ca7ab0_master13.jpg', 1, 1, '2022-10-31 15:49:20', '2022-10-31 22:49:20'),
(1667231421, 'dua-xiem-xanh-size-lon-ufo', 'Dừa Xiêm Xanh Size Lớn UFO', 25000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'dua_1ac034ee55c8471aa24057fdd6ce77e8_master67.jpg', 1, 1, '2022-10-31 15:50:21', '2022-10-31 22:50:21'),
(1667231503, 'hong-xiem-mehico', 'Hồng Xiêm Mehico', 74500, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'sapoche_e6d650308567454a8f88c70f2634a3a2_master15.jpg', 1, 1, '2022-10-31 15:51:43', '2022-10-31 22:51:43'),
(1667231580, 'long-mut-sapoche', 'Lồng Mứt (Sapoche)', 32500, 0, 'Sapoche hay Sapôchê (còn gọi là Hồng xiêm) thường được biết đến như một loại cây ăn trái được dùng để làm nước giải khát, món tráng miệng trong bữa cơm hằng ngày. Với vị ngọt thanh thơm ngon, loại quả này còn mang lại rất nhiều lợi ích cho sức khỏe.\r\n\r\nQuả hồng xiêm thuộc loại quả mọng, hình cầu hoặc thon dài và chứa từ 2 - 10 hạt. Lớp vỏ ngoài có màu nâu cho đến màu đất vàng nhạt. Cùi thịt bên trong có màu nâu ánh đỏ, kết cấu mịn cùng với hạt dài và dẹp có màu đen. Hương vị của quả hồng xiêm được ví như mùi vị của đường đen, rất dễ ăn.', 1, 120, '1_c96e4846c89e45479dd2e67d280f452b_master2.jpg', 1, 1, '2022-10-31 15:53:00', '2022-10-31 22:53:00'),
(1667231662, 'man-an-phuoc-vi-6-trai', 'Mận An Phước (vỉ 6 trái)', 45000, 0, 'Mận An Phước, hay còn gọi là mận đỏ. Mận có kích thước lớn, vỏ quả màu đỏ tím có sọc trắng rất đẹp mắt. Cùi mận màu trắng xanh giòn, ngọt và không hạt.\r\n\r\nGiá trị dinh dưỡng:\r\n\r\nĐiều chỉnh đường huyết trong máu.\r\nGiúp tiêu hóa tốt.\r\nChống oxy hóa, ngăn ngừa ung thư.\r\nHỗ trợ giảm sốt tự nhiên.\r\nGiúp giải độc gan, thận.\r\nGiảm gia tăng cholesterol xấu.\r\nTăng cường sức đề kháng.', 1, 120, '1_bc6e4b1ce7fb48769a064fc5c2126d7c_master42.jpg', 1, 1, '2022-10-31 15:54:22', '2022-10-31 22:54:22'),
(1667231746, 'man-hong-dao-vi-6-trai', 'Mận hồng đào (vỉ 6 trái)', 39000, 0, 'Mận Hồng Đào có màu da hồng nhạt, trái không thon hình quả chuông như các loại mận khác, mà hình dáng hơi \"mũm mĩm\". Đặc biệt là mình mận cứng, ăn giòn, ít nước nhưng vị ngọt, đậm đà. Mận hồng đào là loại quả chứa nhiều nước, chất xơ giúp giải nhiệt và có lợi cho hệ tiêu hóa. Đồng thời, chứa nhiều vitamin A, C tăng thị lực cho mắt, tăng cường khả năng miễn dịch, chống oxy hóa.', 1, 120, '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 1, 1, '2022-10-31 15:55:46', '2022-10-31 22:55:46'),
(1667231830, 'man-xanh-duong-vi-6-trai', 'Mận xanh đường (vỉ 6 trái)', 34000, 0, 'Quả mận xanh đường có màu xanh, kích thước nhỏ, vị ngọt mát và hương thơm tự nhiên. Loại mận này có ruột đặc, thịt giòn xốp đặc trưng, độ mọng nước vừa phải và hầu như là không có hạt to.', 1, 120, '1_57b0017982ca46dab89a7b8e666aeb60_master7.jpg', 1, 1, '2022-10-31 15:57:10', '2022-10-31 22:57:10'),
(1667231938, 'mang-cau-na-thai-hoang-hau-depaco', 'Mãng Cầu Na Thái Hoàng Hậu Depaco', 129000, 0, 'Mãng Cầu Na Thái Hoàng Hậu Depaco\r\n\r\nKhông phải tự nhiên mà \"Em ấy\" lại có cái tên mỹ miều như vậy! - Khoác lên mình chiếc áo quyến rũ và sang trọng, \"Em ấy\" đã khiến bao người \"phải lòng\" từ cái nhìn đầu tiên!\r\n\r\nĐược vun trồng theo tiêu chuẩn VietGap\r\nDạng trái hình tháp, nở rộng phần trên, phần đáy thu hẹp\r\nTrọng lượng khủng từ 450gr trở lên\r\nVị ngọt đậm, thịt dai, ít hạt lại giàu dinh dưỡng\r\nRất thích hợp để làm Quà biếu tặng, mâm ngũ quả trong những dịp Lễ cúng hoặc Lễ Tết. Trong lĩnh vực tâm linh, Na Hoàng Hậu có tính đơn cực. Thu hút bình an, may mắn, tiên tài, danh vọng, địa vị và kỳ vọng về một tương lai tốt lành!', 1, 120, '1_f8d054a59d7d46ffa9e8a0321ad36af3_master0.jpg', 1, 1, '2022-10-31 15:58:58', '2022-10-31 22:58:58'),
(1667232066, 'me-thai-hop-400gr', 'Me Thái (Hộp 400gr)', 69000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'me_thai_d3e038fd8faf4f0dbf687d3d5113ad5a_master39.jpg', 1, 1, '2022-10-31 16:01:06', '2022-10-31 23:01:06'),
(1667232134, 'nhan-ido-hop-500g', 'Nhãn Ido (Hộp 500g)', 37000, 0, 'Nhãn Ido là Giống Nhãn Thái Lan được du nhập về nước ta trồng những năm gần đây. Đây là Giống Nhãn rất phù hợp với vùng đất của nhiều địa phương, cho trái to, cơm dầy, hạt nhỏ, vỏ cứng, dễ thu hoạch và được thị trường ưa chuộng. \r\n\r\nNhãn ido có ưu điểm là sinh trưởng và phát triển mạnh, ít bị sâu bệnh và loại nhãn này có thể xử lý ra hoa cho trái theo ý muốn. Đặc biệt, trong khi nhiều giống nhãn khác bị bệnh chổi rồng thì nhãn ido vẫn phát triển tốt và cho năng suất cao. Nhãn Ido có tính thích nghi trên nhiều loại đất nước ngọt hay nhiễm mặn. \r\n\r\nTrên vùng đất đỏ Bazan, đất cát pha, cát giồng, đất cồn và phù sa ven sông, đất có độ pH từ 5- 7 đều thích hợp với Cây Nhãn IDO. Đất sét nặng thoát nước kém dễ làm bộ rễ hư thối, cây còi cọc chậm phát triển', 1, 120, 'image_07f908d24f7649adae0876575566ab50_master13.jpg', 1, 1, '2022-10-31 16:02:14', '2022-10-31 23:02:14'),
(1667232200, 'nhan-xuong-hop-1kg', 'Nhãn Xuồng (Hộp 1KG)', 75000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'nhan_xuong_c5e154ac590b4b5dbbe0a1e73afe5142_master56.jpg', 1, 1, '2022-10-31 16:03:20', '2022-10-31 23:03:20'),
(1667232286, 'oi-dai-loan-vi-11-12kg', 'Ổi Đài Loan (Vỉ 1.1-1.2Kg)', 37000, 0, 'Ổi Đài Loan quả to, xanh, giòn, ăn vào có vị chua ngọt, hạt rất ít. Một đĩa Ổi Nữ Hoàng kèm chèn muối ớt cay nồng sẽ là sự kết hợp hoàn hảo cho bữa ăn vặt thơm ngon, tốt cho sức khỏe.', 1, 120, '1_5a48725f38974cb08c5e511d1b2e67de_master72.jpg', 1, 1, '2022-10-31 16:04:46', '2022-10-31 23:04:46'),
(1667232388, 'oi-nu-hoang-vi-09-1kg', 'Ổi Nữ Hoàng (Vỉ 0.9-1Kg)', 40000, 0, 'Ổi nữ hoàng quả to, xanh, giòn, ăn vào có vị chua ngọt, hạt rất ít. Một đĩa Ổi Nữ Hoàng kèm chèn muối ớt cay nồng sẽ là sự kết hợp hoàn hảo cho bữa ăn vặt thơm ngon, tốt cho sức khỏe. Ổi nữ hoàng chứa nhiều vitamin, khoáng chất và các dưỡng chất có lợi cho sức khỏe như vitamin C, A, K, b2, kẽm, kali, mangan, chất chống oxy hóa, chất xơ…', 1, 120, '1_bffe3aa8e4f64ffba462196b4a342603_master55.jpg', 1, 1, '2022-10-31 16:06:28', '2022-10-31 23:06:28'),
(1667232549, 'quyt-duong', 'Quýt Đường', 34500, 0, 'Quýt đường hay còn gọi là quýt vỏ xanh, là đặc sản của miền Tây Nam Bộ.\r\n\r\nTuy có cùng tên gọi và có hình dáng tương đối giống trái quýt thường, nhưng quýt đường có những đặc điểm riêng dễ nhận thấy như:\r\n\r\nVỏ mỏng, trơn láng, rất dễ bóc.\r\nKhi còn non sẽ có màu xanh đậm, khi quýt chín sẽ ngả dần sang màu vàng.\r\nQuả mọng nước, ít xơ, vị ngọt thanh, mùi thơm dịu đặc trưng kích thích vị giác, làm luyến lưu mãi không thôi.\r\nMột múi thường có 2, 3 hạt và không quá nhỏ nên dễ lấy ra trước khi cho trẻ ăn.', 1, 120, '1_e50530f054d847b78502bde7239eb00b_master78.jpg', 1, 1, '2022-10-31 16:09:09', '2022-10-31 23:09:09'),
(1667232663, 'tao-hong-hop-1kg', 'Táo Hồng (Hộp 1Kg)', 49000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'image__65__e17d67ed6ff7474e9911e484d27733b5_master93.jpg', 1, 1, '2022-10-31 16:11:03', '2022-10-31 23:11:03'),
(1667232759, 'thanh-long-ruot-do', 'Thanh Long Ruột Đỏ', 34200, 0, 'Cách lựa chọn\r\n\r\nĐể mua được quả thanh long ruột đỏ ngon, bạn quan sát vỏ trái và núm quả phải còn tươi, không bị nứt hoặc bầm dập là được.\r\nRuột có màu sắc đỏ tự nhiên, khi ăn có vị ngọt thanh\r\nCách bảo quản\r\n\r\nĐể bảo quản thanh long ruột đỏ được lâu, bạn nên bọc kín trái bằng túi nilon và bảo quản trong ngăn mát tủ lạnh. Nếu bạn không có tủ lạnh thì bạn đặt trái ở nhiệt độ phòng ( không bọc túi nilon)\r\nTác dụng của thanh long đỏ đối với sức khỏe\r\n\r\nTốt cho hệ tiêu hóa\r\nTốt cho tim và những người bị bệnh tiểu đường\r\nGiúp cung cấp hàm lượng vitamin C, vitamin nhóm B, protein, chất chống oxy hóa và chất béo có lợi \r\nNgăn ngừa tình trạng táo bón\r\nKiểm soát đường huyết, ổn định huyết áp\r\nTrung hòa độc tố\r\nCải thiện thị lực, tốt cho mắt\r\nGiảm tình trạng bị suyễn, ho', 1, 120, '2_88977781286e40aebf73abb565da5fcb_master24.jpg', 1, 1, '2022-10-31 16:12:39', '2022-10-31 23:12:39'),
(1667232853, 'thanh-long-ruot-trang', 'Thanh Long Ruột Trắng', 34200, 0, 'Có thành phần chất xơ rất cao, trung bình 100 gram chứa 0,7-0,9 gam chất xơ, rất tốt cho cơ thể, đặc biệt là cholesterol, tốt cho tiêu hóa, hạn chế táo bón giải độc cơ thể. Mỗi ngày một người nên ăn khoảng 20-30 gam chất xơ, đây là mức tối ưu có thể giúp ngăn ngừa nhiều loại bệnh nan y như ung thư, bệnh tim, tiểu đường Ngoài chất xơ, thanh long ruột trắng cũng giàu chất beta carotene, đây là một chất giúp cho cơ thể chuyển hóa thành vitamin provitamin, giúp loại bỏ các tế bào mà không dẫn đến nhiễm trùng.', 1, 120, '1_5da68a4d6e124259919fcd5565ef50d4_master51.jpg', 1, 1, '2022-10-31 16:14:13', '2022-10-31 23:14:13'),
(1667233337, 'cam-cara', 'Cam Cara', 89500, 65335, 'Xuất xứ, nguồn gốc:\r\n\r\nCam Cara( tên khoa học là Citrus sinensis) còn có tên gọi khác là cam ruột đỏ. Có xuất xứ từ Venezuela. Tới thế kỷ 18, Cam Cara được trồng tại Mỹ. Sau đó là Úc. Hiện nay đã có lai tạo và trồng tại VN và Trung Quốc. Cam Cara Úc được trồng nhiều ở bang Victoria, Úc.\r\n\r\nMùa vụ:\r\n\r\nCam Cara Úc thu hoạch từ cuối tháng 6 cho đến hết tháng 9. Thật ấn tượng khi bạn đứng giữa cánh đồng cam. Thơm lừng một mùi hương ngây ngất. Những trái cam vàng ươm chín mọng, trĩu nặng trên cành. Khi cắt đôi qủa cam, một màu đỏ tươi rất đẹp. Bạn sẽ cảm nhận được sự giòn dai, ngọt dịu, thơm nhẹ, không gắt, hương không nồng. Từ từ ngấm vào cổ, rồi đọng lại dư hậu. Phẩm chất tuyệt đỉnh của nó không lẫn với bất kỳ thứ cam nào có được.', 1, 120, '1_e027ff9ad555488fba2ea410d7758816_master40.jpg', 1, 1, '2022-10-31 16:22:17', '2022-10-31 23:22:17'),
(1667233400, 'cam-dolci-uc', 'Cam Dolci Úc', 49500, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'dolci-1_fb042fc4acb140699843205dc8c9973a_master53.jpg', 1, 1, '2022-10-31 16:23:20', '2022-10-31 23:23:20'),
(1667233564, 'cam-vang-uc', 'Cam Vàng Úc', 72500, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'cam_vang_-_kg_c3_374a9ba11ec94ad3b1e105df98ca8e34_master61.jpg', 1, 1, '2022-10-31 16:26:04', '2022-10-31 23:26:04'),
(1667234796, 'kiwi-vang-zespri-nzl-hop-2-trai', 'Kiwi vàng Zespri NZL hộp 2 trái', 84000, 79000, 'Kiwi Vàng (Hộp 2 Trái) \r\n\r\nCó đài ở đầu quả và quả thuôn dài hơn kiwi xanh. Chúng có vỏ màu nâu vàng, trơn nhẵn, không có lông xù xì như kiwi xanh.\r\nKiwi vàng có thịt quả màu vàng trong rất đẹp mắt, với nhiều hạt đen tạo thành 1 vòng tròn xung quanh trục dọc của quả.\r\nKiwi vàng có vị ngọt mát rất đặc trưng.\r\nKiwi Vàng New Zealand ngoài những chất khoáng tương tự như Kiwi xanh, nó còn cung cấp thêm cho cơ thể chất sắt là 4% và 15% vitamin E, 13% axit folate.\r\nKiwi vàng cũng chứa kali, acid folic và chất xơ, giúp bồi dưỡng sức khỏe cho trẻ em và phụ nữ sau khi sinh.\r\nĐặc biệt, hàm lượng vitamin C của kiwi vàng đạt 270% giúp cải thiện chức năng của hệ miễn dịch, phòng ngừa những tác động của chứng viêm gan và sự tấn công của virus và vi khuẩn, nâng cao sự miễn dịch, chống lại bệnh liệt dương.\r\nKiwi vàng rất giàu dinh dưỡng và vitamin E.\r\nDo đó, chỉ cần hai quả kiwi là bạn đã có thể cung cấp được 1/3 năng lượng cần cho một ngày.\r\nCác bà bầu ăn kiwi khi đang mang thai cũng giúp làn da đẹp hơn.\r\nĐặc biệt, Kiwi Vàng (Hộp 2 Trái) còn có tác dụng hỗ trợ cho người giảm cân mà không gây ảnh hưởng xấu tới sức khỏe, bảo vệ ADN không bị đột biến, cung cấp hàm lượng chất chống ôxy hóa cho cơ thể.\r\n\r\nNên chọn những quả Kiwi vàng da căng, quả lớn và sáng màu, chắc tay. Kiwi vàng ăn sẽ ngon và ngọt hơn khi chín mềm tay.', 1, 120, 'image_-_2022-02-17t02583954.jpg', 1, 1, '2022-10-31 16:46:36', '2022-10-31 23:46:36'),
(1667234896, 'le-han-quoc', 'Lê Hàn Quốc', 74500, 0, 'Xuất xứ: Hàn Quốc\r\n\r\nMùa vụ: Các giống lê với quả chín trong mùa hè và mùa thu là các giống có tốc độ hô hấp cao khi quả chín nên được thu hái sớm. Mùa vụ được thu hoạch theo truyền thống vào 3 khoảng thời gian khác nhau: lần một khoảng 2 tuần trước khi lê chín, lần hai khoảng 1 tuần hay 10 ngày sau khi lê chín, và lần ba khi lê chín già. Những quả lê thu hoạch lần một sẽ được ăn cuối cùng, và vì thế vụ lê có thể kéo dài đáng kể.\r\n\r\nQuả lê tính lạnh, bình hòa không độc hại, rất giàu vitamin C và pectin là chất giúp làm tăng độ xốp và men vi sinh giúp hệ tiêu hóa ổn định, nhu động ruột thải bã dễ dàng.\r\nVỏ quả lê có giá trị chữa bệnh cao, có lợi cho tim và phổi, giúp tiêu độc hạ nhiệt.\r\nLê chứa vitamin A, B, C, D và E.\r\nMột trái lê có thể cung cấp 10% hàm lượng vitamin C và hàm lượng canxi khá lớn.\r\nLê mặc dù rất ngọt, song độ nóng và độ ngọt gây béo rất thấp, rất thích hợp với những ai thích ăn ngọt nhưng sợ tăng cân. \r\nLưu ý bảo quản và sử dụng\r\n\r\nLê thường được ăn tươi hoặc ép nước, không dùng để nướng bánh vì chúng có hàm lượng nước cao.\r\nNên bảo quản trong tủ lạnh, cần nhẹ tay vì lê rất dễ bị dập, thâm bên trong.\r\nLê có thể được bảo quản trong tủ lạnh khoảng vài tuần.', 1, 120, '1_08ab65dc2bd84bc2a73fe7f79ac1a309_master99.jpg', 1, 1, '2022-10-31 16:48:16', '2022-10-31 23:48:16'),
(1667234988, 'le-nam-phi', 'Lê Nam Phi', 74500, 54500, 'Lê nhập khẩu 100% từ Nam Phi (giấy chứng nhận nguồn gốc xuất xứ). Đạt tiêu chuẩn xuất khẩu toàn cầu. Bảo quản tươi ngon đến tận tay khách hàng. Quả hình chuông, tròn và thon đều. Vỏ màu xanh xen lẫn vàng và đỏ rực rỡ. Trái chín: chắc thịt, mọng nước, ngọt dịu, thơm mát\r\n\r\nLê Nam Phi giòn, ngọt, mọng nước, là loại trái cây nhập khẩu rất được yêu thích, lê Nam Phi bổ sung nhiều chất xơ, vitamin và khoáng chất cho cơ thể khoẻ và da đẹp, dáng chuẩn hơn.', 1, 120, '1_a0306f026ce74a7dbafd5f0965a33b70_master26.jpg', 1, 1, '2022-10-31 16:49:48', '2022-10-31 23:49:48'),
(1667235060, 'luu-thai-lan', 'Lựu Thái Lan', 229000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'luu_thai_7ab1677424374b21b37ff74e472ed726_master98.jpg', 1, 1, '2022-10-31 16:51:00', '2022-10-31 23:51:00'),
(1667235146, 'nho-den-khong-hat', 'Nho Đen Không Hạt', 239000, 0, 'Đặc điểm\r\n\r\nNho đen không hạt có hình thuôn, màu đen sẫm, vỏ mỏng. Ăn rất giòn,ngọt,đến ngọt sắt,có thể hơi khé cổ nếu ăn lần đầu, nhưng vẫn có vị thanh mát đặc biệt là nho không có hạt\r\n\r\nCông dụng\r\n\r\nNho đen không hạt là loại hoa quả nhập khẩu rất giàu dinh dưỡng, có tác dụng bổ tì, ích khí, giúp cơ thể khỏe mạnh, miễn dịch tốt và làm chậm quá trình lão hóa\r\nCanxi, kali, photpho, sắt, vitamin B1, B2, B6, C và các loại axit amin cần thiết tốt cho người suy nhược thần kinh và có lợi cho tiêu hóa\r\nHợp chất Resveratrol trong nho đen không hạt mỹ đặc biệt là phần vỏ giúp giải độc tốt, giảm máu nhiễm mỡ, chống tụ huyết, phòng chống xơ vỡ động mạch và tăng cường hệ thống miễn dịch của cơ thể.', 1, 120, '1_61035c793bcc4bdd9adf97bfda668219_master62.jpg', 1, 1, '2022-10-31 16:52:27', '2022-10-31 23:52:27'),
(1667235241, 'nho-do-keo-vi-vai-sweet-scarlet-hop-450gr', 'Nho Đỏ Kẹo Vị Vải Sweet Scarlet (Hộp 450gr)', 259000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'eb72e93709dace8497cb_fd152b04e9ab48c8a96c7074e31cb8fd_master95.jpg', 1, 1, '2022-10-31 16:54:01', '2022-10-31 23:54:01'),
(1667235323, 'nho-mau-don-han-quoc-hop-450gram', 'Nho Mẫu Đơn Hàn Quốc (Hộp 450gram)', 419000, 0, 'Chuẩn nội địa Hàn Quốc.\r\nVị ngọt đậm nhất trong các dòng mẫu đơn, thoảng hương sữa ngọt ngào.\r\nChùm to kín trái rất bắt mắt.\r\nChùm nho đẹp thích hợp dùng làm quà tặng cho đồng nghiệp, người thân, người lớn tuổi.', 1, 120, '1_cf45d4192bb64ccfa07b5612c850d16d_master40.jpg', 1, 1, '2022-11-01 03:53:51', '2022-11-01 10:53:51'),
(1667235448, 'nho-xanh-khong-hat', 'Nho Xanh Không Hạt', 174500, 0, 'Nho xanh không hạt được trồng tại nơi có khí hậu ôn đới nơi không khí khô và nhiều nắng. Bởi như thế mới không bị sâu bệnh tấn công và tạo điều kiện phát triển ra quả nho ngon nhất.\r\n\r\nNho xanh không hạt quả thuôn dài, to, vỏ mịn, trơn bóng và có màu hổ phách bắt mắt\r\nNho xanh không có hạt và rất mọng nước.\r\nVị ngọt thanh mát chạy từ đầu lưỡi đến tận cổ,có vị hơi chua.​', 1, 120, '1_c99dca30af134c4783fdecebf2a23224_master40.jpg', 1, 1, '2022-10-31 16:57:28', '2022-10-31 23:57:28'),
(1667235613, 'ba-roi-heo', 'Ba Rọi Heo', 72000, 0, 'Ba Rọi Heo hay còn gọi là thịt ba chỉ, nằm ở phần thịt bụng của heo, có lớp thịt và lớp mỡ xen kẽ đẹp mắt. Với hương vị thịt béo hài hòa đặc trưng, thịt ba rọi đặc biệt được ưa chuộng để chế biến nhiều món ăn khác nhau như luộc, chiên, nướng đều phù hợp.\r\n\r\nPhương pháp sản xuất: Heo được nuôi theo quy trình khép kín từ heo ông bà đến heo bố mẹ, heo con và heo thịt thương phẩm. Thức ăn là ngũ cốc được lên men vi sinh E.M công nghệ Nhật Bản. Trang trại hoàn toàn kiểm soát được nguồn thức ăn, chất lượng con giống, quy trình nuôi và chất lượng thịt. Heo được giết mổ trong môi trường lạnh và vận chuyển thịt tươi về cửa hàng mỗi ngày. Heo tươi được cửa hàng bảo quản đúng nhiệt độ (20 độ C – 40 độ C) để không bị nhiễm vi sinh.', 1, 120, 'image__10__14d7855a6ca148e79829afc09235a2d3_master16.jpg', 2, 1, '2022-11-01 03:56:01', '2022-11-01 10:56:01'),
(1667235698, 'ba-roi-heo-meat-master-400g-khay', 'Ba Rọi Heo Meat Master 400g (Khay)', 91000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'ba_roi_heo_f1b83a29d1c54c49b0e9be7951f6dec0_master95.jpg', 2, 1, '2022-11-01 03:55:53', '2022-11-01 10:55:53'),
(1667273735, 'demo111', 'demo111', 89500, 0, NULL, 1, 1200, 'pexels-alleksana-411389871.jpg', 1, 1, '2022-11-01 03:53:43', '2022-11-01 10:53:43'),
(1667275158, 'ba-roi-heo-rut-suon', 'Ba Rọi Heo Rút Sườn', 216000, 0, 'Ba Rọi Rút Sườn Heo là khúc thịt nằm ở tảng bụng của con heo, còn dính phần sườn non nhưng phần sườn được rút hết cọng xương sườn. Phần thịt còn lại thấy rõ ít nhất hai chỉ nạc. Mỡ và nạc liên kết chặt với nhau thành một khối, không sót mỡ sa. Lớp mỡ dưới da dày từ 1 - 1,5 cm. Ba Rọi Rút Xương là phần thịt nằm gần phần sườn của heo và là phần ba rọi nhiều thịt nhất. Ba rọi rút sườn của 3S có phần thịt, phần mỡ và phần bì nằm hài hòa với nhau nên ăn rất ngon, mềm thơm và không hề bị khô như những loại thịt khác\r\n\r\nPhương pháp sản xuất: Heo được nuôi theo quy trình khép kín từ heo ông bà đến heo bố mẹ, heo con và heo thịt thương phẩm. Thức ăn là ngũ cốc được lên men vi sinh E.M công nghệ Nhật Bản. Trang trại hoàn toàn kiểm soát được nguồn thức ăn, chất lượng con giống, quy trình nuôi và chất lượng thịt. Heo được giết mổ trong môi trường lạnh và vận chuyển thịt tươi về cửa hàng mỗi ngày. Heo tươi được cửa hàng bảo quản đúng nhiệt độ (20 độ C – 40 độ C) để không bị nhiễm vi sinh.', 1, 120, 'image__14__d1e45f803ed442548d277c89cd8221d5_master96.jpg', 2, 1, '2022-11-01 05:50:33', '2022-11-01 12:50:33'),
(1667275240, 'bao-tu-da-day-heo', 'Bao Tử (Dạ Dày) Heo', 87000, 0, 'Bao tử heo là món ăn quen thuộc được rất nhiều người yêu thích vì độ giòn, dai, ngon miệng. Có thể chế biến thành nhiều món ngon khó cưỡng.\r\n\r\nKết quả nghiên cứu hiện đại cho thấy, bao tử heo rất giàu chất đạm, đường, mỡ, các nguyên tố vi lượng như canxi, sắt, phốt pho và các vitamin A, B1 và B2. Ngoài ra còn có một số men như pepsin, gastrin và gastric mucoitin.', 1, 120, '1_af734256351d46ad957ee179c88f129c_master70.jpg', 2, 1, '2022-11-01 05:50:21', '2022-11-01 12:50:21'),
(1667275323, 'bap-gio-heo-rut-xuong', 'Bắp giò Heo rút xương', 210000, 0, 'Bắp giò heo rút xương là phần thịt ở trên bắp đùi heo, giá trị dinh dưỡng cao và tỷ lệ nạc nhiều. Ngọt thịt, thường có gân, khi ăn giòn sần sật.\r\n\r\nBắp giò heo rút xương thường được dùng để chế biến các món ngon như bắp giò nấu hạt sen, bắp giò luộc sống trộn sốt tương, bắp giò nướng,...', 1, 120, 'image__1__c37cd23cd8954f4eb4e22ed105c9d539_master92.jpg', 2, 1, '2022-11-01 05:50:11', '2022-11-01 12:50:11'),
(1667275426, 'cot-let-heo', 'Cốt Lết Heo', 55800, 0, 'Cốt Lết Heo là phần thịt ở lưng heo, còn được gọi là sườn cốt lết vì miếng thịt hay được cắt kèm với phần đầu xương sườn. Bao gồm cả xương sống, mang bao cơ và có một ít mỡ phủ trên bề mặt. Nhiều nạc nhưng vẫn giữ được độ mềm ẩm cần thiết. Phù hợp để làm ram mặn, nướng, chiên xù...\r\n\r\nPhương pháp sản xuất: Heo được nuôi theo quy trình khép kín từ heo ông bà đến heo bố mẹ, heo con và heo thịt thương phẩm. Thức ăn là ngũ cốc được lên men vi sinh E.M công nghệ Nhật Bản. Trang trại hoàn toàn kiểm soát được nguồn thức ăn, chất lượng con giống, quy trình nuôi và chất lượng thịt. Heo được giết mổ trong môi trường lạnh và vận chuyển thịt tươi về cửa hàng mỗi ngày. Heo tươi được cửa hàng bảo quản đúng nhiệt độ (20 độ C – 40 độ C) để không bị nhiễm vi sinh.', 1, 120, '2_27246b2a2b6d40b1b07faff6df829de9_master82.jpg', 2, 1, '2022-11-01 05:50:02', '2022-11-01 12:50:02'),
(1667275539, 'cot-let-heo-meat-master-400g-khay', 'Cốt Lết Heo Meat Master 400g (Khay)', 67000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'cot_let_1_72a324df142f4c338d9ee0467cb44330_master45.jpg', 2, 1, '2022-11-01 05:49:50', '2022-11-01 12:49:50'),
(1667275626, 'dau-rong-heo', 'Đầu Rồng Heo', 59700, 0, 'Đầu rồng là phần thịt nối giữa thịt mông và thịt thăn. Thịt đầu rồng rất mềm, không quá mỡ và không quá khô, do có cả lớp da và nạc đi kèm. Chẳng hạn khi luộc, kho tàu hay nướng có thể thay ba rọi thành đầu rồng sẽ có ít mỡ hơn và thịt thăn đầu rồng thường giòn hơn. \r\n\r\nNguồn gốc: Trang trại tại huyện Vĩnh Cửu, tỉnh Đồng Nai.\r\n\r\nPhương pháp sản xuất: Heo được nuôi theo quy trình khép kín từ heo ông bà đến heo bố mẹ, heo con và heo thịt thương phẩm. Thức ăn là ngũ cốc được lên men vi sinh E.M công nghệ Nhật Bản. Trang trại hoàn toàn kiểm soát được nguồn thức ăn, chất lượng con giống, quy trình nuôi và chất lượng thịt. Heo được giết mổ trong môi trường lạnh và vận chuyển thịt tươi về cửa hàng mỗi ngày. Heo tươi được cửa hàng bảo quản đúng nhiệt độ (20 độ C – 40 độ C) để không bị nhiễm vi sinh.', 1, 120, '1_242f6e8d7bec4cfe959217490b86c59e_master12.jpg', 2, 1, '2022-11-01 05:49:40', '2022-11-01 12:49:40'),
(1667275778, 'dui-go-heo', 'Đùi Gọ Heo', 59400, 0, 'Đùi gọ heo là lớp nạc và mỡ dày chắc chắn. Trong phần thịt mông thì còn có một phần được gọi cụ thể hơn là thịt mông sấn. Phần thịt này thì lớp bì, mỡ và  thịt được phân tách rõ ràng, phần thịt nạc rất dày, không còn các phần gân, xương hay sụn.\r\n\r\nCũng y hệt tên gọi của nó, phần thịt này nằm ở mông con heo, gồm cả thịt cả mỡ. Thịt mông hay được sử dụng làm nên món luộc, kho, nướng…\r\n\r\nPhương pháp sản xuất: Heo được nuôi theo quy trình khép kín từ heo ông bà đến heo bố mẹ, heo con và heo thịt thương phẩm. Thức ăn là ngũ cốc được lên men vi sinh E.M công nghệ Nhật Bản. Trang trại hoàn toàn kiểm soát được nguồn thức ăn, chất lượng con giống, quy trình nuôi và chất lượng thịt. Heo được giết mổ trong môi trường lạnh và vận chuyển thịt tươi về cửa hàng mỗi ngày. Heo tươi được cửa hàng bảo quản đúng nhiệt độ (20 độ C – 40 độ C) để không bị nhiễm vi sinh.', 1, 120, '1_83e1d5ef7eb24cc0943944aadc7f8d83_master81.jpg', 2, 1, '2022-11-01 05:49:30', '2022-11-01 12:49:30'),
(1667275858, 'dung-heo-meat-master-400g-khay', 'Dựng Heo Meat Master 400g (Khay)', 65000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'dung_heo_1_36c9172ebf794ee09e36f029f492d18e_master100.jpg', 2, 1, '2022-11-01 05:49:21', '2022-11-01 12:49:21'),
(1667275992, 'dung-mong-heo', 'Dựng Móng Heo', 94500, 0, 'Dựng heo hay móng heo là phần cẳng chân trước, tính từ đầu gối xuống đến móng. Dựng heo chủ yếu là gân, một ít mỡ, da và xương. Khi nấu chín ăn rất giòn, vị béo ngậy, nhiều người rất thích món bún bò giò heo hay hủ tíu giò heo.\r\n\r\nPhương pháp sản xuất: Heo được nuôi theo quy trình khép kín từ heo ông bà đến heo bố mẹ, heo con và heo thịt thương phẩm. Thức ăn là ngũ cốc được lên men vi sinh E.M công nghệ Nhật Bản. Trang trại hoàn toàn kiểm soát được nguồn thức ăn, chất lượng con giống, quy trình nuôi và chất lượng thịt. Heo được giết mổ trong môi trường lạnh và vận chuyển thịt tươi về cửa hàng mỗi ngày. Heo tươi được cửa hàng bảo quản đúng nhiệt độ (20 độ C – 40 độ C) để không bị nhiễm vi sinh.', 1, 120, '2_763e9780261d49c6a083813643ca83ea_master21.jpg', 2, 1, '2022-11-01 05:49:06', '2022-11-01 12:49:06'),
(1667276093, 'duoi-heo', 'Đuôi Heo', 92100, 0, 'Đuôi Heo là phần nối dài của cột sống heo, có da bao bọc. Pha lóc nguyên cái, cắt ngang qua khớp cuối cột sống, không dính phần xương đuôi phía trên, không sót lông. Đuôi heo có tác dụng bồi bổ thận tinh, ích não tủy, bổ âm, làm mạnh tỳ vị, làm mạnh xương sống và thắt lưng.\r\n\r\nPhương pháp sản xuất: Heo được nuôi theo quy trình khép kín từ heo ông bà đến heo bố mẹ, heo con và heo thịt thương phẩm. Thức ăn là ngũ cốc được lên men vi sinh E.M công nghệ Nhật Bản. Trang trại hoàn toàn kiểm soát được nguồn thức ăn, chất lượng con giống, quy trình nuôi và chất lượng thịt. Heo được giết mổ trong môi trường lạnh và vận chuyển thịt tươi về cửa hàng mỗi ngày. Heo tươi được cửa hàng bảo quản đúng nhiệt độ (20 độ C – 40 độ C) để không bị nhiễm vi sinh.', 1, 120, '1_6a61719c44154af880a893078de19942_master63.jpg', 2, 1, '2022-11-01 05:48:56', '2022-11-01 12:48:56'),
(1667276199, 'duoi-heo-meat-master-400g-khay', 'Đuôi Heo Meat Master 400g (Khay)', 96000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'duoi_heo_1_c007102ac5234ce39906a48cad410584_master22.jpg', 2, 1, '2022-11-01 05:48:46', '2022-11-01 12:48:46'),
(1667280654, 'nac-lung-heo', 'Nạc Lưng Heo', 129500, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, '1_fecd0504ddf948b7a6d5b43a1955eded_master77.jpg', 2, 1, '2022-11-01 05:48:38', '2022-11-01 12:48:38'),
(1667280789, 'nac-vai-heo', 'Nạc Vai Heo', 60600, 0, 'Nạc vai heo là phần thịt nằm ở khúc giữa cổ và vai heo, đã lọc bỏ xương, da và mỡ thừa. Đây cũng là một khúc thịt heo rất ngon vì có tỷ lệ nạc mỡ cân bằng hòa lẫn vào nhau, không quá khô mà cũng không ngấy mỡ. ... Phần thịt này có độ dai hơn và giòn hơn, nên được dùng nhiều trong các món kho, chiên rán, nướng.\r\n\r\nPhương pháp sản xuất: Heo được nuôi theo quy trình khép kín từ heo ông bà đến heo bố mẹ, heo con và heo thịt thương phẩm. Thức ăn là ngũ cốc được lên men vi sinh E.M công nghệ Nhật Bản. Trang trại hoàn toàn kiểm soát được nguồn thức ăn, chất lượng con giống, quy trình nuôi và chất lượng thịt. Heo được giết mổ trong môi trường lạnh và vận chuyển thịt tươi về cửa hàng mỗi ngày. Heo tươi được cửa hàng bảo quản đúng nhiệt độ (20 độ C – 40 độ C) để không bị nhiễm vi sinh.', 1, 120, '1_27b8625ba85d42dea49bf0fd351f2c96_master36.jpg', 2, 1, '2022-11-01 05:48:21', '2022-11-01 12:48:21'),
(1667280888, 'sun-goi-luoi-liem-heo', 'Sụn Gối Lưỡi Liềm Heo', 92100, 0, 'Sụn Gối Lưỡi Liềm Heo là phần sụn được lóc ra từ phần đầu xương giá, phần sụn gối, còn sót 1 lớp nạc mỏng trên bề mặt. Phần sụn giòn tạo cảm giác kích thích khi ăn.\r\n\r\nPhương pháp sản xuất: Heo được nuôi theo quy trình khép kín từ heo ông bà đến heo bố mẹ, heo con và heo thịt thương phẩm. Thức ăn là ngũ cốc được lên men vi sinh E.M công nghệ Nhật Bản. Trang trại hoàn toàn kiểm soát được nguồn thức ăn, chất lượng con giống, quy trình nuôi và chất lượng thịt. Heo được giết mổ trong môi trường lạnh và vận chuyển thịt tươi về cửa hàng mỗi ngày. Heo tươi được cửa hàng bảo quản đúng nhiệt độ (20 độ C – 40 độ C) để không bị nhiễm vi sinh.', 1, 120, '1_d22629f88a8b4bc287a3162e08113645_master95.jpg', 2, 1, '2022-11-01 05:48:12', '2022-11-01 12:48:12'),
(1667280982, 'suon-gia-heo', 'Sườn Già Heo', 68100, 0, 'Sườn già heo bao gồm 3 - 4 cọng sườn tính từ chóp sườn, có xương ức không lấy phần sườn sống cổ. Phần thịt ở mặt ngoài miếng sườn săn chắc ( tỷ lệ mỡ < 5% ).\r\n\r\nPhương pháp sản xuất: Heo được nuôi theo quy trình khép kín từ heo ông bà đến heo bố mẹ, heo con và heo thịt thương phẩm. Thức ăn là ngũ cốc được lên men vi sinh E.M công nghệ Nhật Bản. Trang trại hoàn toàn kiểm soát được nguồn thức ăn, chất lượng con giống, quy trình nuôi và chất lượng thịt. Heo được giết mổ trong môi trường lạnh và vận chuyển thịt tươi về cửa hàng mỗi ngày. Heo tươi được cửa hàng bảo quản đúng nhiệt độ (20 độ C – 40 độ C) để không bị nhiễm vi sinh.', 1, 120, '2_51f1afbcb5a44a5393b1d0e6af87c7f9_master28.jpg', 2, 1, '2022-11-01 05:48:05', '2022-11-01 12:48:05'),
(1667281090, 'bo-cau-con', 'Bồ Câu (Con)', 105000, 0, 'Chim bồ câu ngày nay đã trở thành một món ăn ngon, quen thuộc xuất hiện rất nhiều trong các bữa cơm gia đình. Thịt chim bồ câu có thể chế biến thành rất nhiều món ăn, chẳng hạn như: hầm, hấp, luộc, quay, nhúng lẩu, chiên, xào hành răm hay rang tương,...', 1, 120, '1_132e0bf221d045f7865cf87c705076f8_master50.jpg', 2, 1, '2022-11-01 05:47:56', '2022-11-01 12:47:56'),
(1667281157, 'canh-chu-v-chill-cp-khay-500gr', 'Cánh Chữ V Chill Cp (Khay 500Gr)', 65000, 0, 'Thịt gà CP tươi ngon, được bao gói cẩn thận, bảo quản nhiệt độ 0-4 độ C và thời hạn sử dụng trong 4 ngày nên luôn đảm bảo được độ tươi và ngọt của thịt.\r\n\r\nKhông chất tăng trọng.\r\nKhông cúm gia cầm.\r\nHệ thống chăn nuôi khép kín.\r\nSử dụng thức ăn chất lượng cao.\r\nTruy suất được nguồn gốc.', 1, 120, '1_12fa7c59f36b47e982033a953191f7d5_master1.jpg', 2, 1, '2022-11-01 05:47:47', '2022-11-01 12:47:47'),
(1667281244, 'canh-ga-3f-khay-500gr', 'Cánh Gà 3F ~ Khay 500Gr', 57500, 0, 'Gà được nuôi dưỡng và chăm sóc trong chuồng kín với hệ thống tự động hiện đại. Trải qua quá trình giết mổ khép kín, đóng gói và bảo quản bằng công nghệ tiên tiến giúp sản phẩm được giao đến khách hàng trong tình trạng tươi ngon và an toàn.\r\n\r\nCánh gà 3F được pha lóc từ những con gà thịt đạt chuẩn. Một khay 500g cánh khoảng 4 - 5 cánh tùy trọng lượng, phù hợp để chế biến các bữa ăn giàu dinh dưỡng.', 1, 120, '1_0dccdd49c4a644e58bb998f60ad0d740_master16.jpg', 2, 1, '2022-11-01 05:47:39', '2022-11-01 12:47:39'),
(1667281347, 'canh-ga-tp', 'Cánh Gà Tp', 75000, 0, 'Cánh gà ít mỡ, xương mềm hơn các bộ phận khác.\r\nThịt có vị ngọt và thơm tự nhiên.\r\nĐược đóng gói đúng quy trình, dễ dàng sử dụng.\r\nPhù hợp để chế biến cánh gà nướng, chiên nước mắm, chiên mật ong, sốt me, xào chua ngọt.', 1, 120, '1_393a43c1ac45410ea16aa39f06dd1776_master70.jpg', 2, 1, '2022-11-01 05:47:30', '2022-11-01 12:47:30'),
(1667281441, 'canh-ga-tuoi-cp-khay-500gr', 'Cánh Gà Tươi CP (Khay 500Gr)', 56000, 0, 'Thịt gà CP tươi ngon, được bao gói cẩn thận, bảo quản nhiệt độ 0-4 độ C và thời hạn sử dụng trong 4 ngày nên luôn đảm bảo được độ tươi và ngọt của thịt.\r\n\r\nKhông chất tăng trọng.\r\nKhông cúm gia cầm.\r\nHệ thống chăn nuôi khép kín.\r\nSử dụng thức ăn chất lượng cao.\r\nTruy suất được nguồn gốc.', 1, 120, '1_0ec5b355c5794f05844fcd6606f9891d_master62.jpg', 2, 1, '2022-11-01 05:47:23', '2022-11-01 12:47:23'),
(1667281515, 'canh-giua-chill-cp-khay-500gr', 'Cánh Giữa Chill Cp (Khay 500Gr)', 89000, 0, 'Với quy trình sản xuất từ khâu chăn nuôi, nguồn thức ăn đến chế biến đều nghiêm ngặt cùng với hệ thống cơ sở vật chất và hệ thống máy móc tiên tiến, thịt gà CP đã đạt được chứng nhận GMP, đảm bảo nhà máy đạt chuẩn các yêu cầu của Bộ Y tế và WTO như thiết bị, quá trình sản xuất, nhà xưởng,...\r\n\r\nThịt gà CP tươi ngon, thời hạn sử dụng trong 4 ngày nên đảm bảo được chất lượng thịt luôn tươi và ngon. Mỗi sản phẩm được bao gói sạch sẽ và bảo quản ở 0-4 độ C\r\n\r\nNgoài ra thịt gà CP còn đạt chứng nhận HACCP, ISO 22000, ISO 9001, ISO 14002 để chứng minh sản phẩm đảm bảo an toàn vệ sinh thực phẩm.\r\n\r\nTrên mỗi sản phẩm thịt gà CP đều có 2 mã QR để khách hàng truy xuất nguồn gốc của thịt. Từ đó có thể biết được thịt gà CP được sản xuất ở đâu, cơ sở chế biến nào, trại giống, trại chăn nuôi nào,...', 1, 120, '1_0394531b441f49d3b272f955a40622bc_master85.jpg', 2, 1, '2022-11-01 05:47:16', '2022-11-01 12:47:16'),
(1667281607, 'chan-ga-tuoi-cp-khay-500gr', 'Chân Gà Tươi CP (Khay 500Gr)', 39000, 0, 'Thịt gà CP tươi ngon, được bao gói cẩn thận, bảo quản nhiệt độ 0-4 độ C và thời hạn sử dụng trong 4 ngày nên luôn đảm bảo được độ tươi và ngọt của thịt.\r\n\r\nKhông chất tăng trọng.\r\nKhông cúm gia cầm.\r\nHệ thống chăn nuôi khép kín.\r\nSử dụng thức ăn chất lượng cao.\r\nTruy suất được nguồn gốc.', 1, 120, '1_98dd94018d47405896d210c208030bb0_master99.jpg', 2, 1, '2022-11-01 05:47:08', '2022-11-01 12:47:08'),
(1667282112, 'dui-canh-chill-cp-khay-500gr', 'Đùi Cánh Chill Cp (Khay 500Gr)', 50000, 0, 'Thịt gà CP tươi ngon, được bao gói cẩn thận, bảo quản nhiệt độ 0-4 độ C và thời hạn sử dụng trong 4 ngày nên luôn đảm bảo được độ tươi và ngọt của thịt.\r\n\r\nKhông chất tăng trọng.\r\nKhông cúm gia cầm.\r\nHệ thống chăn nuôi khép kín.\r\nSử dụng thức ăn chất lượng cao.\r\nTruy suất được nguồn gốc.', 1, 120, '1_63114cf3f6ed43c6b066b13b4f2fd604_master9.jpg', 2, 1, '2022-11-01 05:55:12', '2022-11-01 12:55:12'),
(1667282187, 'dui-ga-thao-khop-tuoi-cp-khay-500gr', 'Đùi gà tháo khớp tươi CP (Khay 500Gr)', 47000, 0, '​​​​​​​Thịt gà CP tươi ngon, được bao gói cẩn thận, bảo quản nhiệt độ 0-4 độ C và thời hạn sử dụng trong 4 ngày nên luôn đảm bảo được độ tươi và ngọt của thịt.\r\n\r\nKhông chất tăng trọng.\r\nKhông cúm gia cầm.\r\nHệ thống chăn nuôi khép kín.\r\nSử dụng thức ăn chất lượng cao.\r\nTruy suất được nguồn gốc.', 1, 120, '1_dbfe3a66052d47b1889808166a09d107_master8.jpg', 2, 1, '2022-11-01 05:58:08', '2022-11-01 12:58:08'),
(1667282279, 'dui-goc-tu-tp', 'Đùi Góc Tư Tp', 87500, 0, 'Đùi gà góc tư chắc thịt, thơm ngon nên có thể chế biến thành nhiều món ăn ngon miệng như: đùi gà nướng, đùi gà rán, đùi gà luộc, đùi gà kho, đùi gà sốt, đùi gà quay, đùi gà áp chảo, cháo gà, món súp hoặc canh hầm,...', 1, 120, '1_710b150d949f41debddaf9fb21123914_master4.jpg', 2, 1, '2022-11-01 05:57:59', '2022-11-01 12:57:59'),
(1667283341, 'bap-bo-shank-pacow-goi-250gr', 'Bắp Bò Shank Pacow (Gói 250Gr)', 105000, 0, 'Thịt bò Pacow được sản xuất theo quy trình khép kín từ nông trại tới bàn ăn. Tuân thủ tiêu chuẩn về nhập khẩu, truy xuất nguồn gốc và phúc lợi động vật (ESCAS) của chính phủ Úc. Thịt bò mát Pacow đạt được các chứng nhận quốc tế về Vệ Sinh An Toàn Thực Phẩm và Chất Lượng: ISO 22000:2018, GLOBAL GAP, HALAL\r\n\r\nBắp bò là phần thịt nằm ở bắp đùi của con bò, có nhiều gân phân bố đều trên toàn bề mặt bắp, thịt bắp đùi ăn rất giòn, ngọt. Lựa chọn tuyệt vời để nấu món lẩu, nhúng, phở, nhúng dấm, luộc, súp, canh…\r\nVỉ 250g được đóng gói theo công nghệ tiên tiến, giúp thịt được bảo quản lên tới 21 ngày (ở nhiệt độ 0-4 độ C).\r\nThịt sạch đảm bảo an toàn tuyệt đối, không cần rửa lại với nước.', 1, 120, 'image__1__8417d346008648b9976fe16604241d75_master89.jpg', 2, 1, '2022-11-01 06:15:41', '2022-11-01 13:15:41'),
(1667283517, 'bit-tet-dui-bo-uc-pacow-goi-250gr', 'Bít Tết Đùi Bò Úc Pacow (Gói 250Gr)', 129000, 0, 'Phần thịt nạc nguyên quả nằm ngay phía trên bắp chân sau của con bò. Miếng thịt rất nạc và hơi khô phù hợp với chiên hoặc nướng theo tảng. Đặc biệt với món beefsteak, một món ăn ưa thích. Bít tết đùi bò Úc Pacow khay 250g được sản xuất ở Úc bởi Pacow, đã được kiểm duyệt chặt chẽ nên đảm bảo an toàn.', 1, 120, 'image__1__cdb373a3a52144dbb64f9e22f48b8ca1_master53.jpg', 2, 1, '2022-11-01 06:18:37', '2022-11-01 13:18:37'),
(1667283634, 'thit-bap-hoa-pacow-goi-250gr', 'Thịt Bắp Hoa Pacow (Gói 250Gr)', 209000, 0, 'Thịt bắp hoa là phần cơ nhỏ, nằm bên trong bắp chân trước của con bò. Thịt bắp hoa không hề có một chút mỡ nào mà chỉ nguyên phần cơ nạc màu đỏ đậm, với các đường gân xen kẽ và một lớp màng gân dai bao bọc phía ngoài cùng, đặc biệt phần trên cùng miếng thịt là một cuống gân lớn, hầm nên rất mềm và ngọt. Thịt Bắp Hoa Pacow khay 250g được sản xuất ở Úc bởi Pacow, đã được kiểm duyệt chặt chẽ nên đảm bảo an toàn.', 1, 120, '1_de4a20d5806f48c39ad7bf794536a128_master88.jpg', 2, 1, '2022-11-01 06:20:34', '2022-11-01 13:20:34'),
(1667283749, 'thit-bo-uc-xay-pacow-goi-250gr', 'Thịt Bò Úc Xay Pacow (Gói 250Gr)', 82000, 0, 'Rất thuận tiện chế biến nhiều món ngon. Thịt có cả nạc và mỡ xen lẫn cho hương vị béo ngậy tăng thêm phần hấp dẫn cho các món ăn. thích hợp để làm các món như hamburger, cháo, súp, bò viên. Thịt bò Úc xay khay 250g tươi ngon được sản xuất ở Úc bởi Pacow, đã được kiểm duyệt chặt chẽ nên đảm bảo an toàn.', 1, 120, '1_646ed83ddeb849b2a9c439297ba382b1_master79.jpg', 2, 1, '2022-11-01 17:00:20', '2022-11-01 13:22:29'),
(1667283870, 'ca-bac-ma-size-5-8-conkg', 'Cá Bạc Má Size 5-8 Con/Kg', 99500, 0, 'Cá bạc má là một trong những thức ăn hải sản được người tiêu dùng ưa chuộng bởi độ lành tính và vị béo đặc trưng khó có thể nhầm lẫn. Vốn thịt mềm, ngọt tự nhiên nên rất dễ để có thể chế biến cá bạc má thành những món ăn từ quen thuộc như kho, hấp, chiên, nấu canh tới những món khác cầu kì hơn trong khâu chế biến.', 1, 120, '1_46f3a40c4e6d41978b572099b1ca5424_master39.jpg', 3, 1, '2022-11-01 06:24:30', '2022-11-01 13:24:30'),
(1667283979, 'ca-basa', 'Cá Basa', 35400, 0, 'Cá basa là dòng cá da trơn được nuôi làm kinh tế ở rất nhiều quốc gia trên thế giới, đặc biệt là các quốc gia thuộc khu vực châu Á.\r\n\r\nThịt cá không những thơm ngon về hương vị mà lại còn rất tốt cho sức khỏe. Cá basa ở Việt Nam còn được gọi là cá giáo và cá sát bụng, loài cá này có tên tiếng anh là Basa Fish.', 1, 120, '1_76eae34373244d83be568f07881c3888_master2.jpg', 3, 1, '2022-11-01 06:26:19', '2022-11-01 13:26:19'),
(1667284069, 'ca-bop-cat-khoanh', 'Cá Bớp Cắt Khoanh', 169500, 0, 'Cá bớp với thịt béo ngọt, chắc thịt đặc trưng của các loài cá biển luôn là nguyên liệu \"vàng\" trong nấu nướng bởi hương vị trong các mà món lẩu, món kho,... đều vô cùng ngon.', 1, 120, '1_f2a8d3178b094f5ca53d994673322994_master95.jpg', 3, 1, '2022-11-01 06:27:49', '2022-11-01 13:27:49'),
(1667284212, 'ca-chem-quy-nhon-size-08-12', 'Cá Chẽm Quy Nhơn Size 0.8-1.2', 229000, 0, 'Chưa có mô tả cho sản phẩm này', 1, 120, 'ca_chem_s0_8_-_1_2__kg__c8_5230f7185699453a9e95ad80679f4cfc_master12.jpg', 1, 1, '2022-11-01 07:24:06', '2022-11-01 13:30:12'),
(1667284318, 'ca-chim-trang-lon-size-08-10', 'Cá Chim Trắng Lớn Size 0.8-1.0', 285000, 0, 'Cá chim trắng là loài cá biển có màu bạc hoặc trắng với một ít vảy, đặc trưng bởi cơ thể bằng phẳng, thân hơi tròn dẹp, vây đuôi chẻ và vây ngực dài. Loại cá này được đánh giá cao trong ẩm thực vì hương vị đặc biệt của nó.\r\n\r\nCá chim trắng có hương vị thơm ngon, thịt nhiều nước, chất dinh dưỡng cao như omega 3, protein, canxi, sắt, Vitamin C, B1, B2,…. rất tốt cho sức khỏe.', 1, 120, '1_8518b1afbcbf44de88e27f0f2494b23b_master42.jpg', 3, 1, '2022-11-13 08:39:31', '2022-11-01 13:31:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`) VALUES
(39, 1667230401, 'image__81__e1befcd558714c6d92ce224ffd01ae2c_master74.jpg'),
(40, 1667230401, 'image__82__2d7719ebb18d4e159f7aa3ef41db0528_master12.jpg'),
(41, 1667230401, 'image__83__cdc66674cc854a03aee688dd0496c126_master65.jpg'),
(42, 1667230510, '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg'),
(43, 1667230510, '2_a280a11885e4486092662bcd8773537a_master44.jpg'),
(44, 1667230510, '3_9de21a0acd1f4de1841ed3aaf51c9e46_master15.jpg'),
(45, 1667230510, '4_e5c3d1f56af84800b015f5aa4bbf60d9_master81.jpg'),
(46, 1667230603, '2_04043e295213456796b1e5566973cfe8_master74.jpg'),
(47, 1667230603, '3_fca0e27689d54423b64c476e2d09c56e_master69.jpg'),
(48, 1667230603, '4_7dd08918131f4ddeae11f5b696991b78_master47.jpg'),
(49, 1667230741, '2_f834144867884b29a2f5a4c615090b02_master98.jpg'),
(50, 1667230741, '3_849171934d044ebab4885db97bae4bc8_master15.jpg'),
(51, 1667230741, '4_39ae97451ae1436b9e530857c8499e5e_master90.jpg'),
(52, 1667230843, '2_8e2d378661cd46008b0e502f265a9e0b_master80.jpg'),
(53, 1667230843, '3_8cd85ff7027b4e0092b124ee053c64d4_master51.jpg'),
(54, 1667230927, '1_801c5af7c0a74b978908ba8d2fc9e133_master35.jpg'),
(55, 1667230927, '2_8869af3b33414f799de1f817d5dd9e65_master87.jpg'),
(56, 1667230927, '3_30d5558636e543a993fddac81f8a52b7_master4.jpg'),
(57, 1667230927, '4_f66a2d184cce4fb8b5b480938594fa9f_master26.jpg'),
(58, 1667231042, '1_0d4f22b060da48d6b49bccb8b64841aa_master28.jpg'),
(59, 1667231042, '2_ca590e8c25214223bad71c4e516ea8af_master (1)2.jpg'),
(60, 1667231042, '3_b4095e7d34a04813bb54495c022696e0_master12.jpg'),
(61, 1667231042, '4_983bc0db5a1341e2a26f058328be6365_master (1)54.jpg'),
(62, 1667231141, '1_5e68977153524e5c8dc9a67dc5d9cdd4_master69.jpg'),
(63, 1667231141, '2_ce260bf375a54b3a82b5ad380c162efa_master37.jpg'),
(64, 1667231141, '3_e7ed8584588b45f8bfa580d0a116cd24_master (1)9.jpg'),
(65, 1667231141, '4_3179743b23f14e048e9727a7b2973a87_master95.jpg'),
(66, 1667231221, '1_467bc22c76cf43cdbb845574238f5a29_master39.jpg'),
(67, 1667231221, '2_da05426e5b5645a388d87a35964ff6c8_master34.jpg'),
(68, 1667231221, '3_0672b6709ae648be956f71ef713a445f_master82.jpg'),
(69, 1667231360, '1_24fad3cb1ee741e586e57e8712ca7ab0_master13.jpg'),
(70, 1667231360, '2_e095e617008d45898740b437a72d664e_master76.jpg'),
(71, 1667231360, '3_98ea84757e14452bb82aaa1ee725c42a_master24.jpg'),
(72, 1667231421, 'dua_1ac034ee55c8471aa24057fdd6ce77e8_master67.jpg'),
(73, 1667231503, 'sapoche_e6d650308567454a8f88c70f2634a3a2_master15.jpg'),
(74, 1667231503, 'sapoche-2_3e62e3ee9bf64ee18c15665f2f6196d0_master0.jpg'),
(75, 1667231503, 'sapoche-3_50483ee77d694642a3466fe3d7dfc89f_master92.jpg'),
(76, 1667231580, '1_c96e4846c89e45479dd2e67d280f452b_master2.jpg'),
(77, 1667231580, '3_b3a6a08fd70147528f3b38da89baeb25_master44.jpg'),
(78, 1667231580, '4_8949d961d443400d8981792442dbc5e8_master36.jpg'),
(79, 1667231662, '1_bc6e4b1ce7fb48769a064fc5c2126d7c_master42.jpg'),
(80, 1667231662, '2_7d8891ea2b144a388cee25008342c675_master45.jpg'),
(81, 1667231662, '3_00d6daab501546fbb59af72a9df72970_master95.jpg'),
(82, 1667231662, '4_487894b81d8b41c1b9af3fbc6c16771d_master40.jpg'),
(83, 1667231746, '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg'),
(84, 1667231746, '2_db92de1654d945e19b61a7521e5528b7_master89.jpg'),
(85, 1667231746, '3_57e4501589064cca874f71300ac3f4d1_master85.jpg'),
(86, 1667231746, '4_d2857a714e5d4563b10eb99499a4ec98_master11.jpg'),
(87, 1667231830, '1_57b0017982ca46dab89a7b8e666aeb60_master7.jpg'),
(88, 1667231830, '2_25310bc4cc344c29b23207cd9e7bf15b_master48.jpg'),
(89, 1667231830, '3_a072f7ba8a354e6b9b7470c2128d2aab_master26.jpg'),
(90, 1667231938, '1_f8d054a59d7d46ffa9e8a0321ad36af3_master0.jpg'),
(91, 1667231938, '2_77abc3220966462f8be7c1d04c7ffa4f_master64.jpg'),
(92, 1667231938, '3_7f116536d4e74ae2a902c04a056c1b51_master21.jpg'),
(93, 1667231938, '4_cdaaf06b644547778c9a014a534790f8_master86.jpg'),
(94, 1667232066, 'me_thai_d3e038fd8faf4f0dbf687d3d5113ad5a_master39.jpg'),
(95, 1667232066, 'me-1_a3889645309f4ca0a06d5a1561496620_master82.jpg'),
(96, 1667232066, 'me-2_468671f91d4944ba86c937fdc9cbe03b_master45.jpg'),
(97, 1667232134, 'image_07f908d24f7649adae0876575566ab50_master13.jpg'),
(98, 1667232200, 'nhan_xuong_c5e154ac590b4b5dbbe0a1e73afe5142_master56.jpg'),
(99, 1667232286, '1_5a48725f38974cb08c5e511d1b2e67de_master72.jpg'),
(100, 1667232286, '2_7c97cc849caf470f88c482bbef7d76a9_master27.jpg'),
(101, 1667232286, '3_f6feb1518d4948d4a53e089ffb6fad80_master89.jpg'),
(102, 1667232286, '4_0b9dadd844a64edcae9cb81d217ebea5_master8.jpg'),
(103, 1667232388, '1_bffe3aa8e4f64ffba462196b4a342603_master55.jpg'),
(104, 1667232388, '2_7da91d6ebad94bee94bffbe9e5723095_master83.jpg'),
(105, 1667232388, '3_9e7846ecdf044f03a54c655650cc8bbd_master78.jpg'),
(106, 1667232388, '4_22e944bcd73f4439b5f49c3e09a93da9_master42.jpg'),
(107, 1667232549, '1_e50530f054d847b78502bde7239eb00b_master78.jpg'),
(108, 1667232549, '2_737a5f8b660d4e56bf0ea615b934e139_master38.jpg'),
(109, 1667232549, '3_cf75acbdcf794fac829f0544f66f0d5b_master40.jpg'),
(110, 1667232549, '4_848a8311cf9e4436a0091676ca9dd77f_master32.jpg'),
(111, 1667232663, 'image__65__e17d67ed6ff7474e9911e484d27733b5_master93.jpg'),
(112, 1667232663, 'image__66__9b1310a9b60a41c1b0b3296ec023a982_master20.jpg'),
(113, 1667232663, 'image__67__12b9d834b3c347fea0a383943f97faa0_master86.jpg'),
(114, 1667232759, '2_88977781286e40aebf73abb565da5fcb_master24.jpg'),
(115, 1667232759, '3_2f88a03934714095947165cbf03f65f9_master5.jpg'),
(116, 1667232759, '4_bbd4c0f2c84b439fae5adf11910e900b_master2.jpg'),
(117, 1667232853, '1_5da68a4d6e124259919fcd5565ef50d4_master51.jpg'),
(118, 1667232853, '2_436169bd89bb4afc85f003b58c688b77_master30.jpg'),
(119, 1667232853, '4_dcbd968941034e4a9abd73544cdd00f7_master100.jpg'),
(120, 1667233337, '1_e027ff9ad555488fba2ea410d7758816_master40.jpg'),
(121, 1667233337, '2_281e82760af7413f8cd58303ceaf3392_master55.jpg'),
(122, 1667233337, '3_f83c2257b8c04dc58e59b6ace2197aec_master29.jpg'),
(123, 1667233337, '4_d622a01257594a24870b6eacf9bb635c_master12.jpg'),
(124, 1667233400, 'dolci-1_fb042fc4acb140699843205dc8c9973a_master53.jpg'),
(125, 1667233564, 'cam_vang_-_kg_c3_374a9ba11ec94ad3b1e105df98ca8e34_master61.jpg'),
(126, 1667233564, 'cam_vang_-_kg_c4_d9f75c78ff554e489341ebd95df94805_master30.jpg'),
(129, 1667234796, 'image_-_2022-02-17t02583954.jpg'),
(130, 1667234796, 'image_-_2022-02-17t02584082.jpg'),
(131, 1667234796, 'kiwi-1_b3aedd840dfb481197d8db3d96d91813_master12.jpg'),
(132, 1667234896, '1_08ab65dc2bd84bc2a73fe7f79ac1a309_master99.jpg'),
(133, 1667234896, '2_f878e4881fd14035982cb6fb5e4afa01_master66.jpg'),
(134, 1667234896, '3_d0020409ce184faea044e27b68212fd4_master18.jpg'),
(135, 1667234988, '1_a0306f026ce74a7dbafd5f0965a33b70_master26.jpg'),
(136, 1667234988, '2_b2f8e81768e147c3a571ff70cd94cf3b_master23.jpg'),
(137, 1667234988, '3_64ff9b70b48a438884df883bed8509eb_master55.jpg'),
(138, 1667235060, 'luu_thai_7ab1677424374b21b37ff74e472ed726_master98.jpg'),
(139, 1667235146, '1_61035c793bcc4bdd9adf97bfda668219_master62.jpg'),
(140, 1667235146, '2_bfff5bb956fd41ad87fc3bf2537bca6a_master83.jpg'),
(141, 1667235146, '3_71db1ae751b343359a7d1d2272a4a35a_master22.jpg'),
(142, 1667235146, '4_ef0af0f2939e41dba962eab77f65f92c_master68.jpg'),
(143, 1667235241, 'eb72e93709dace8497cb_fd152b04e9ab48c8a96c7074e31cb8fd_master95.jpg'),
(144, 1667235241, 'f47ce53605dbc2859bca_58f6bfe496fd4e8cab904fa4f0329c15_master41.jpg'),
(145, 1667235241, 'f9573410d4fd13a34aec_c39eadb31fb74460b35c03caa064be77_master78.jpg'),
(146, 1667235323, '1_cf45d4192bb64ccfa07b5612c850d16d_master40.jpg'),
(147, 1667235323, '2_c721ad6fbdcb4733a0790f855688a839_master21.jpg'),
(148, 1667235323, '3_9eba83855bfa419fadfedc29695eb506_master77.jpg'),
(149, 1667235323, '4_addeee69ea5c407aa6a97a4a3aa0ef14_master75.jpg'),
(150, 1667235448, '1_c99dca30af134c4783fdecebf2a23224_master40.jpg'),
(151, 1667235448, '2_1e9af61d409e40ea8e62d7dc8f71bb8a_master89.jpg'),
(152, 1667235448, '3_174a112fd10b4070ba5456d654148c13_master31.jpg'),
(153, 1667235448, '4_947e079fe78b46388e41e6999d1b4db3_master60.jpg'),
(154, 1667235448, '5_c86b3777c32046f19ed14f75bea492d2_master47.jpg'),
(155, 1667235613, 'image__10__14d7855a6ca148e79829afc09235a2d3_master16.jpg'),
(156, 1667235613, 'image__11__40ab463545fa41dab8bb55d1af042598_master81.jpg'),
(157, 1667235613, 'image__12__56b7de57b1b545d9a2e6afbd6d5c16e2_master6.jpg'),
(158, 1667235613, 'image__13__49366523f40d4a8dabffa48d6596f801_master70.jpg'),
(159, 1667235698, 'ba_roi_heo_f1b83a29d1c54c49b0e9be7951f6dec0_master95.jpg'),
(173, 1667273735, 'pexels-alleksana-411389871.jpg'),
(174, 1667273735, 'pexels-ann-h-391284647.jpg'),
(175, 1667273735, 'pexels-anthony-13243085.jpg'),
(176, 1667273735, 'pexels-anthony-13243145.jpg'),
(177, 1667273735, 'pexels-anthony-13243270.jpg'),
(179, 1667275158, 'image__14__d1e45f803ed442548d277c89cd8221d5_master96.jpg'),
(180, 1667275158, 'image__15__2c257011d4bb4816b53ce87bf21970f4_master81.jpg'),
(181, 1667275158, 'image__16__3f4bd80a71ad42878db3a38663418752_master31.jpg'),
(182, 1667275240, '1_af734256351d46ad957ee179c88f129c_master70.jpg'),
(183, 1667275240, '2_108afbe7420c457e9c64c7b3dd46f185_master29.jpg'),
(184, 1667275240, '3_5d0970d54d6d470bb3a663c6e5c4f44b_master28.jpg'),
(185, 1667275323, 'image__1__c37cd23cd8954f4eb4e22ed105c9d539_master92.jpg'),
(186, 1667275323, 'image__2__af51c6c9d0294ba593fdbd9e10813faf_master2.jpg'),
(187, 1667275323, 'image__3__ea90c9c0b445406dae0f1e83ab54f903_master8.jpg'),
(188, 1667275323, 'image_222c2134cfe745448a996da0a8faf455_master95.jpg'),
(189, 1667275426, '2_27246b2a2b6d40b1b07faff6df829de9_master82.jpg'),
(190, 1667275426, '4_65ec8522dc9f442ba73b8cda4a566117_master22.jpg'),
(191, 1667275426, '3_9215d9a0dfad43f4992a2fa621b4f7c5_master (1)83.jpg'),
(192, 1667275426, '1_61b022bc3f464f9192ba99970200863d_master72.jpg'),
(193, 1667275539, 'cot_let_1_72a324df142f4c338d9ee0467cb44330_master45.jpg'),
(194, 1667275539, 'cot_let_2_ed40c54ab28146ee8d6ccefcc0b528d5_master97.jpg'),
(195, 1667275626, '1_242f6e8d7bec4cfe959217490b86c59e_master12.jpg'),
(196, 1667275626, '2_8c9a4a8c0f2c48eabe03b65f77a1b632_master5.jpg'),
(197, 1667275626, '3_c8a5efabec1049fa8f25f74df66209bb_master39.jpg'),
(198, 1667275626, '4_525f855c57bb452c8cb4fe0c07abfd10_master99.jpg'),
(199, 1667275778, '1_83e1d5ef7eb24cc0943944aadc7f8d83_master81.jpg'),
(200, 1667275778, '2_7a893d8d1584482c9df21e9121980eb0_master62.jpg'),
(201, 1667275778, '3_1ec880803ade4d80b2f65eb89b39fefe_master63.jpg'),
(202, 1667275778, '4_022bb793b35941f49f5f3073a0dfd6f3_master92.jpg'),
(203, 1667275858, 'dung_heo_1_36c9172ebf794ee09e36f029f492d18e_master100.jpg'),
(204, 1667275858, 'dung_heo_2_456341e951844618a482a37c6ce03ef4_master56.jpg'),
(205, 1667275992, '2_763e9780261d49c6a083813643ca83ea_master21.jpg'),
(206, 1667275992, '3_3c51ed9cbebe45829b41a81b8559e879_master15.jpg'),
(207, 1667275992, '4_761f5825868240ab85a12845489ec497_master81.jpg'),
(208, 1667275992, '5_5478317ab7b348cea2f61737dd9afe3b_master43.jpg'),
(209, 1667276093, '1_6a61719c44154af880a893078de19942_master63.jpg'),
(210, 1667276093, '2_4024f53911b6434582951204eae392af_master57.jpg'),
(211, 1667276093, '3_169524e09a0d4613838f8997bba4097b_master27.jpg'),
(212, 1667276093, '4_ba540d11d26f4c37b0515c26117d0451_master76.jpg'),
(213, 1667276199, 'duoi_heo_1_c007102ac5234ce39906a48cad410584_master22.jpg'),
(214, 1667276199, 'duoi_heo_3_9ceee7bd9fd64dcd863a7530fa050c79_master82.jpg'),
(215, 1667276199, 'duoi_heo_2_6b245e5ed57c44aabbbe266316726345_master12.jpg'),
(216, 1667280654, '1_fecd0504ddf948b7a6d5b43a1955eded_master77.jpg'),
(217, 1667280654, '2_b29772654cc2403f9bab143db68f5996_master65.jpg'),
(218, 1667280654, '3_a1a5e4e6fdf54189a97cb4591b3794d5_master72.jpg'),
(219, 1667280789, '1_27b8625ba85d42dea49bf0fd351f2c96_master36.jpg'),
(220, 1667280789, '2_e22aaa37e236498088a6c64e95487873_master25.jpg'),
(221, 1667280789, '3_a1ef284af82547e99420f9b636cc1591_master12.jpg'),
(222, 1667280789, '4_9690f37bfb724863bf40a26d02d26df8_master57.jpg'),
(223, 1667280888, '1_d22629f88a8b4bc287a3162e08113645_master95.jpg'),
(224, 1667280888, '2_97ed7e35acde4c10ab89c00b3e601fa9_master21.jpg'),
(225, 1667280888, '3_8d7c4537927a429da6deb1316bd582ff_master37.jpg'),
(226, 1667280888, '4_14875949b8a74f5a85a8a55cfe89e1e2_master54.jpg'),
(227, 1667280982, '2_51f1afbcb5a44a5393b1d0e6af87c7f9_master28.jpg'),
(228, 1667280982, '3_12aa89d33f85422aa34e9b30721893d5_master17.jpg'),
(229, 1667280982, '4_ddda0bc2a067434090fec18c1aed05af_master42.jpg'),
(230, 1667281090, '1_132e0bf221d045f7865cf87c705076f8_master50.jpg'),
(231, 1667281090, '2_3187116c672c4f46ae4593cd18ac41a8_master44.jpg'),
(232, 1667281090, '3_beb5199dc3ec48cda7be036e05c70116_master80.jpg'),
(233, 1667281090, '4_f48ccf2068894d3fa89f2b8940210812_master8.jpg'),
(234, 1667281157, '1_12fa7c59f36b47e982033a953191f7d5_master1.jpg'),
(235, 1667281157, '2_705f51b2da37439499b3fc274885b300_master38.jpg'),
(236, 1667281244, '1_0dccdd49c4a644e58bb998f60ad0d740_master16.jpg'),
(237, 1667281244, '2_f6c96722621c4c89b4d89e28bdea4b59_master43.jpg'),
(238, 1667281244, '3_adbab23410604d62bca2746403eb689b_master13.jpg'),
(239, 1667281244, '4_ddbe0c70cb784bcd991147c4bd44c6c7_master75.jpg'),
(240, 1667281347, '1_393a43c1ac45410ea16aa39f06dd1776_master70.jpg'),
(241, 1667281347, '2_bbb9c55451814bf987a930fd71519663_master84.jpg'),
(242, 1667281347, '3_32d7a814d05e4bcd8ea418063c56004e_master20.jpg'),
(243, 1667281347, '4_5a396d56b48040dca8cd5cb7bac0aeb4_master60.jpg'),
(244, 1667281441, '1_0ec5b355c5794f05844fcd6606f9891d_master62.jpg'),
(245, 1667281441, '2_97a9b5f7037444f89d774dfdbf7823bc_master53.jpg'),
(246, 1667281441, '3_3975a9098e7346bfb1d24198a8bdb3a5_master30.jpg'),
(247, 1667281515, '1_0394531b441f49d3b272f955a40622bc_master85.jpg'),
(248, 1667281515, '2_590e1b6b23664b5c8244357b9a93ffa8_master74.jpg'),
(249, 1667281607, '1_98dd94018d47405896d210c208030bb0_master99.jpg'),
(250, 1667281607, '2_662987816f034a2186827e262057d0ce_master50.jpg'),
(251, 1667281607, '3_69903b3767ba45a8a3be12a70ab546b1_master45.jpg'),
(252, 1667282112, '1_63114cf3f6ed43c6b066b13b4f2fd604_master9.jpg'),
(253, 1667282112, '2_c017a6204e2c4ba68007d7620c1da995_master52.jpg'),
(254, 1667282112, '3_f3811c3c9be54e1c8888389425656f69_master57.jpg'),
(255, 1667282187, '1_dbfe3a66052d47b1889808166a09d107_master8.jpg'),
(256, 1667282187, '2_09e20680cded4035ac5750048100b275_master42.jpg'),
(257, 1667282187, '3_c2dc6c211ab74858a134323170cc4496_master68.jpg'),
(258, 1667282279, '1_710b150d949f41debddaf9fb21123914_master4.jpg'),
(259, 1667282279, '2_2e3b2b33abbf44c0a13b50ffb4571b1c_master1.jpg'),
(260, 1667282279, '3_01844c69bc72472aa22f6ef108fb269c_master21.jpg'),
(261, 1667282279, '4_48ead264952e4d2d92f389de7fc55d71_master93.jpg'),
(262, 1667283341, 'image__1__8417d346008648b9976fe16604241d75_master89.jpg'),
(263, 1667283341, 'image__2__b8c8c7d4889343c3b962cf84aaed2953_master8.jpg'),
(264, 1667283341, 'image__3__f83df262b8e44e3c99cbf3e9eeebc6dd_master85.jpg'),
(265, 1667283341, 'image_48ef971aebfd4ab080899c11c6a7911b_master8.jpg'),
(266, 1667283517, 'image__1__cdb373a3a52144dbb64f9e22f48b8ca1_master53.jpg'),
(267, 1667283517, 'image__2__7f2310d440574a1ca7db716c3e019d62_master36.jpg'),
(268, 1667283517, 'image__3__03714595cfb24151aed05a9f93662e7f_master71.jpg'),
(269, 1667283517, 'image_858db4a644bf4e92afb6f81221be3ad8_master56.jpg'),
(270, 1667283634, '1_de4a20d5806f48c39ad7bf794536a128_master88.jpg'),
(271, 1667283634, '2_77ffd4ac56d64742898a705d60eaee05_master94.jpg'),
(272, 1667283634, '3_b6ab2b56b26d4c5fb7da59db88daf113_master47.jpg'),
(273, 1667283634, '4_8ffb17c1c8784e669a16c33fb546dead_master100.jpg'),
(274, 1667283749, '1_646ed83ddeb849b2a9c439297ba382b1_master79.jpg'),
(275, 1667283749, '2_4e23e067371b42eb97b1c1ee1f42285b_master90.jpg'),
(276, 1667283749, '3_abd76a78f9cd4692a16716679941272c_master92.jpg'),
(277, 1667283870, '1_46f3a40c4e6d41978b572099b1ca5424_master39.jpg'),
(278, 1667283870, '2_30234d4dc0a0402aa773666e99b7b395_master91.jpg'),
(279, 1667283870, '3_1c626b38efa2444f82ce93568a28b7c7_master21.jpg'),
(280, 1667283870, '4_847e2dfdd676425680c42da687da6c28_master67.jpg'),
(281, 1667283979, '1_76eae34373244d83be568f07881c3888_master2.jpg'),
(282, 1667283979, '2_db20b1ec974e4f4882b8999340f4a7d2_master88.jpg'),
(283, 1667283979, '3_8558e9b4784e4a6a8b7849cb2067b77a_master21.jpg'),
(284, 1667283979, '4_f9d76b873e7942e1939579dc13996ee3_master91.jpg'),
(285, 1667284069, '1_f2a8d3178b094f5ca53d994673322994_master95.jpg'),
(286, 1667284069, '2_652dac30ae3647a2a848fa407a9e5462_master2.jpg'),
(287, 1667284069, '3_d753d973636b42e698c72bc0e23570ab_master80.jpg'),
(288, 1667284069, '4_bdac12750fa649289186b50763aa8cfb_master13.jpg'),
(289, 1667284212, 'ca_chem_s0_8_-_1_2__kg__c8_5230f7185699453a9e95ad80679f4cfc_master12.jpg'),
(290, 1667284212, 'ca_chem_s0_8_-_1_2__kg__c12_23a79b75aa654b518de194faba0e4f3b_master64.jpg'),
(291, 1667284212, 'ca_chem_s0_8_-_1_2__kg__c7_8ba457e520b941599a92dcfbf79b6111_master24.jpg'),
(292, 1667284318, '1_8518b1afbcbf44de88e27f0f2494b23b_master42.jpg'),
(293, 1667284318, '2_d05ee9ab1f634f3293ae64dc345fbb34_master12.jpg'),
(294, 1667284318, '3_63eb57de1f504a4ba53c21afed4e4a77_master89.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `slug`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, 'trendding', 'Trendding', 1, '2022-08-04 12:33:59', '2022-08-04 19:33:59'),
(5, 'cooking', 'Cooking', 1, '2022-08-04 12:35:08', '2022-08-04 19:35:08'),
(6, 'healthy-food', 'Healthy Food', 1, '2022-08-04 12:35:27', '2022-08-04 19:35:27'),
(7, 'life-style', 'Life Style', 1, '2022-11-01 08:07:30', '2022-08-04 19:35:45'),
(8, 'skins-care', 'Skins Care', 1, '2022-11-01 08:04:12', '2022-08-04 19:48:45'),
(11, 'decor', 'Decor', 1, '2022-11-01 08:07:54', '2022-11-01 14:55:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `conscious` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `address_detail` text DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `order_note` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `user_id`, `full_name`, `country`, `conscious`, `district`, `address_detail`, `phone`, `email`, `order_note`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', NULL, '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-03 07:49:15', '2022-11-03 14:49:15'),
(4, 4, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', NULL, '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-03 07:50:04', '2022-11-03 14:50:04'),
(5, 5, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', NULL, '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-03 08:58:03', '2022-11-03 15:58:03'),
(6, 5, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', NULL, '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-03 09:00:13', '2022-11-03 16:00:13'),
(7, 5, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', NULL, '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-03 09:06:10', '2022-11-03 16:06:10'),
(8, 5, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', NULL, '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-03 09:39:49', '2022-11-03 16:39:49'),
(9, 5, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', NULL, '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-03 09:50:29', '2022-11-03 16:50:29'),
(10, 5, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', NULL, '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-03 09:50:46', '2022-11-03 16:50:46'),
(11, 5, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', NULL, '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 2, '2022-11-13 12:13:52', '2022-11-03 16:51:00'),
(12, 5, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', NULL, '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 2, '2022-11-13 12:13:50', '2022-11-03 16:51:11'),
(13, 6, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', '180 thanh hoa', '097 9773 734', 'phammy773734@gmail.com', NULL, 0, '2022-11-13 12:21:27', '2022-11-13 19:21:27'),
(14, 6, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', '180 thanh hoa', '097 9773 734', 'phammy773734@gmail.com', NULL, 0, '2022-11-13 12:22:10', '2022-11-13 19:22:10'),
(15, 6, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', '180 thanh hoa', '097 9773 734', 'phammy773734@gmail.com', NULL, 0, '2022-11-13 12:26:44', '2022-11-13 19:26:44'),
(16, 7, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', '180 to 13', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-17 07:43:07', '2022-11-17 14:43:07'),
(17, 7, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', '180 to 13', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-17 07:44:58', '2022-11-17 14:44:58'),
(18, 7, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', '180 to 13', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-17 07:45:53', '2022-11-17 14:45:53'),
(19, 7, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Châu Phú', '180 to 13', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-11-17 07:46:36', '2022-11-17 14:46:36'),
(24, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 1, '2022-12-03 07:20:39', '2022-12-03 14:19:47'),
(25, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-12-03 07:46:31', '2022-12-03 14:46:31'),
(26, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-12-03 07:47:05', '2022-12-03 14:47:05'),
(27, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-12-03 07:47:40', '2022-12-03 14:47:40'),
(28, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-12-03 07:48:38', '2022-12-03 14:48:38'),
(29, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-12-03 07:48:53', '2022-12-03 14:48:53'),
(30, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-12-03 07:51:48', '2022-12-03 14:51:48'),
(31, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', 'Giao hàng giờ hành chính', 0, '2022-12-03 07:54:36', '2022-12-03 14:54:36'),
(32, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', 'Giao hàng giờ hành chính', 0, '2022-12-03 07:54:59', '2022-12-03 14:54:59'),
(33, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', 'Giao hàng giờ hành chính', 0, '2022-12-03 07:55:34', '2022-12-03 14:55:34'),
(34, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-12-03 08:02:15', '2022-12-03 15:02:15'),
(35, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-12-03 08:04:57', '2022-12-03 15:04:57'),
(36, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-12-03 08:05:17', '2022-12-03 15:05:17'),
(37, 8, 'Phạm Thị Ngọc Mỹ', 'Việt Nam', 'An Giang', 'Nội Bài', '180 Thanh Hoa', '097 9773 734', 'myb1910105@student.ctu.edu.vn', NULL, 0, '2022-12-03 08:06:10', '2022-12-03 15:06:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_image` varchar(255) NOT NULL,
  `pro_price` bigint(20) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `order_id`, `user_id`, `pro_id`, `pro_name`, `pro_image`, `pro_price`, `pro_quantity`, `created_at`, `updated_at`) VALUES
(2, 2, 4, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-03 07:49:15', '2022-11-03 14:49:15'),
(3, 2, 4, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-11-03 07:49:15', '2022-11-03 14:49:15'),
(4, 4, 4, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 4, '2022-11-03 07:50:04', '2022-11-03 14:50:04'),
(5, 5, 5, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-03 08:58:03', '2022-11-03 15:58:03'),
(6, 6, 5, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-03 09:00:13', '2022-11-03 16:00:13'),
(7, 7, 5, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-03 09:06:10', '2022-11-03 16:06:10'),
(8, 8, 5, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-03 09:39:49', '2022-11-03 16:39:49'),
(9, 9, 5, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-03 09:50:29', '2022-11-03 16:50:29'),
(10, 10, 5, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-03 09:50:46', '2022-11-03 16:50:46'),
(11, 11, 5, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-03 09:51:00', '2022-11-03 16:51:00'),
(12, 12, 5, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-03 09:51:11', '2022-11-03 16:51:11'),
(13, 13, 6, 1667235613, 'Ba Rọi Heo', 'image__10__14d7855a6ca148e79829afc09235a2d3_master16.jpg', 72000, 1, '2022-11-13 12:21:27', '2022-11-13 19:21:27'),
(14, 13, 6, 1667275158, 'Ba Rọi Heo Rút Sườn', 'image__14__d1e45f803ed442548d277c89cd8221d5_master96.jpg', 216000, 1, '2022-11-13 12:21:27', '2022-11-13 19:21:27'),
(15, 14, 6, 1667235613, 'Ba Rọi Heo', 'image__10__14d7855a6ca148e79829afc09235a2d3_master16.jpg', 72000, 1, '2022-11-13 12:22:10', '2022-11-13 19:22:10'),
(16, 14, 6, 1667275158, 'Ba Rọi Heo Rút Sườn', 'image__14__d1e45f803ed442548d277c89cd8221d5_master96.jpg', 216000, 1, '2022-11-13 12:22:10', '2022-11-13 19:22:10'),
(17, 15, 6, 1667235613, 'Ba Rọi Heo', 'image__10__14d7855a6ca148e79829afc09235a2d3_master16.jpg', 72000, 1, '2022-11-13 12:26:44', '2022-11-13 19:26:44'),
(18, 15, 6, 1667275158, 'Ba Rọi Heo Rút Sườn', 'image__14__d1e45f803ed442548d277c89cd8221d5_master96.jpg', 216000, 1, '2022-11-13 12:26:44', '2022-11-13 19:26:44'),
(19, 16, 7, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-11-17 07:43:07', '2022-11-17 14:43:07'),
(20, 16, 7, 1667230741, 'Dưa Hấu Không Hạt', '2_f834144867884b29a2f5a4c615090b02_master98.jpg', 39000, 1, '2022-11-17 07:43:07', '2022-11-17 14:43:07'),
(21, 16, 7, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-17 07:43:07', '2022-11-17 14:43:07'),
(22, 16, 7, 1667230401, 'Đu Đủ Malaysia Depaco', 'image__81__e1befcd558714c6d92ce224ffd01ae2c_master74.jpg', 35200, 1, '2022-11-17 07:43:07', '2022-11-17 14:43:07'),
(23, 16, 7, 1667230927, 'Dưa Lưới Tròn Vỏ Xanh Ruột Cam Tl3', '1_801c5af7c0a74b978908ba8d2fc9e133_master35.jpg', 128700, 4, '2022-11-17 07:43:07', '2022-11-17 14:43:07'),
(24, 17, 7, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-11-17 07:44:58', '2022-11-17 14:44:58'),
(25, 17, 7, 1667230741, 'Dưa Hấu Không Hạt', '2_f834144867884b29a2f5a4c615090b02_master98.jpg', 39000, 1, '2022-11-17 07:44:58', '2022-11-17 14:44:58'),
(26, 17, 7, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-17 07:44:58', '2022-11-17 14:44:58'),
(27, 17, 7, 1667230401, 'Đu Đủ Malaysia Depaco', 'image__81__e1befcd558714c6d92ce224ffd01ae2c_master74.jpg', 35200, 1, '2022-11-17 07:44:58', '2022-11-17 14:44:58'),
(28, 17, 7, 1667230927, 'Dưa Lưới Tròn Vỏ Xanh Ruột Cam Tl3', '1_801c5af7c0a74b978908ba8d2fc9e133_master35.jpg', 128700, 4, '2022-11-17 07:44:58', '2022-11-17 14:44:58'),
(29, 18, 7, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-11-17 07:45:53', '2022-11-17 14:45:53'),
(30, 18, 7, 1667230741, 'Dưa Hấu Không Hạt', '2_f834144867884b29a2f5a4c615090b02_master98.jpg', 39000, 1, '2022-11-17 07:45:53', '2022-11-17 14:45:53'),
(31, 18, 7, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-17 07:45:53', '2022-11-17 14:45:53'),
(32, 18, 7, 1667230401, 'Đu Đủ Malaysia Depaco', 'image__81__e1befcd558714c6d92ce224ffd01ae2c_master74.jpg', 35200, 1, '2022-11-17 07:45:53', '2022-11-17 14:45:53'),
(33, 18, 7, 1667230927, 'Dưa Lưới Tròn Vỏ Xanh Ruột Cam Tl3', '1_801c5af7c0a74b978908ba8d2fc9e133_master35.jpg', 128700, 4, '2022-11-17 07:45:53', '2022-11-17 14:45:53'),
(34, 19, 7, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-11-17 07:46:36', '2022-11-17 14:46:36'),
(35, 19, 7, 1667230741, 'Dưa Hấu Không Hạt', '2_f834144867884b29a2f5a4c615090b02_master98.jpg', 39000, 1, '2022-11-17 07:46:36', '2022-11-17 14:46:36'),
(36, 19, 7, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-11-17 07:46:36', '2022-11-17 14:46:36'),
(37, 19, 7, 1667230401, 'Đu Đủ Malaysia Depaco', 'image__81__e1befcd558714c6d92ce224ffd01ae2c_master74.jpg', 35200, 1, '2022-11-17 07:46:36', '2022-11-17 14:46:36'),
(38, 19, 7, 1667230927, 'Dưa Lưới Tròn Vỏ Xanh Ruột Cam Tl3', '1_801c5af7c0a74b978908ba8d2fc9e133_master35.jpg', 128700, 4, '2022-11-17 07:46:36', '2022-11-17 14:46:36'),
(43, 24, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 07:19:47', '2022-12-03 14:19:47'),
(44, 25, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 07:46:31', '2022-12-03 14:46:31'),
(45, 26, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 07:47:05', '2022-12-03 14:47:05'),
(46, 27, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 07:47:40', '2022-12-03 14:47:40'),
(47, 28, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 07:48:38', '2022-12-03 14:48:38'),
(48, 29, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 07:48:53', '2022-12-03 14:48:53'),
(49, 30, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 07:51:48', '2022-12-03 14:51:48'),
(50, 31, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 07:54:36', '2022-12-03 14:54:36'),
(51, 31, 8, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-12-03 07:54:36', '2022-12-03 14:54:36'),
(52, 31, 8, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-12-03 07:54:36', '2022-12-03 14:54:36'),
(53, 32, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 07:54:59', '2022-12-03 14:54:59'),
(54, 32, 8, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-12-03 07:54:59', '2022-12-03 14:54:59'),
(55, 32, 8, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-12-03 07:54:59', '2022-12-03 14:54:59'),
(56, 33, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 07:55:34', '2022-12-03 14:55:34'),
(57, 33, 8, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-12-03 07:55:34', '2022-12-03 14:55:34'),
(58, 33, 8, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-12-03 07:55:34', '2022-12-03 14:55:34'),
(59, 34, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 08:02:15', '2022-12-03 15:02:15'),
(60, 34, 8, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-12-03 08:02:15', '2022-12-03 15:02:15'),
(61, 34, 8, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-12-03 08:02:15', '2022-12-03 15:02:15'),
(62, 35, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 08:04:57', '2022-12-03 15:04:57'),
(63, 35, 8, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-12-03 08:04:57', '2022-12-03 15:04:57'),
(64, 35, 8, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-12-03 08:04:57', '2022-12-03 15:04:57'),
(65, 36, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 08:05:17', '2022-12-03 15:05:17'),
(66, 36, 8, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-12-03 08:05:17', '2022-12-03 15:05:17'),
(67, 36, 8, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-12-03 08:05:17', '2022-12-03 15:05:17'),
(68, 37, 8, 1667231746, 'Mận hồng đào (vỉ 6 trái)', '1_a20fe79fa0d346a09f9132eaca33c0c3_master67.jpg', 39000, 1, '2022-12-03 08:06:10', '2022-12-03 15:06:10'),
(69, 37, 8, 1667230510, 'Dừa Cắt Hình Nón Gtj', '1_1e142da04591482db2e8c1f4c67b79e0_master60.jpg', 23000, 1, '2022-12-03 08:06:10', '2022-12-03 15:06:10'),
(70, 37, 8, 1667230603, 'Dừa Gáo Trọc Xiêm Xanh Bến Tre Dka', '2_04043e295213456796b1e5566973cfe8_master74.jpg', 19000, 1, '2022-12-03 08:06:10', '2022-12-03 15:06:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_statistical`
--

CREATE TABLE `tbl_statistical` (
  `id` int(11) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `sales` varchar(200) NOT NULL,
  `profit` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_statistical`
--

INSERT INTO `tbl_statistical` (`id`, `order_date`, `sales`, `profit`, `quantity`, `total_order`) VALUES
(1, '2022-11-08', '20000000', '7000000', 90, 10),
(2, '2022-11-07', '68000000', '9000000', 60, 8),
(3, '2022-11-06', '30000000', '3000000', 45, 7),
(4, '2022-11-05', '45000000', '3800000', 30, 9),
(5, '2022-11-04', '30000000', '1500000', 15, 12),
(6, '2022-11-03', '8000000', '700000', 65, 30),
(7, '2022-11-02', '28000000', '23000000', 32, 20),
(8, '2020-11-01', '25000000', '20000000', 7, 6),
(9, '2022-10-31', '36000000', '28000000', 40, 15),
(10, '2022-10-30', '50000000', '13000000', 89, 19),
(11, '2022-10-29', '20000000', '15000000', 63, 11),
(12, '2022-10-28', '25000000', '16000000', 94, 14),
(13, '2022-10-27', '32000000', '17000000', 16, 10),
(14, '2022-10-26', '33000000', '19000000', 14, 5),
(15, '2022-10-25', '36000000', '18000000', 22, 12),
(16, '2022-10-24', '34000000', '20000000', 33, 20),
(17, '2022-10-23', '25000000', '16000000', 94, 14),
(18, '2022-10-22', '12000000', '7000000', 16, 10),
(19, '2022-10-21', '63000000', '19000000', 14, 5),
(20, '2022-10-20', '66000000', '18000000', 22, 12),
(21, '2022-10-19', '74000000', '20000000', 33, 20),
(22, '2022-10-18', '63000000', '19000000', 14, 5),
(23, '2022-10-17', '66000000', '18000000', 23, 12),
(24, '2022-10-16', '74000000', '20000000', 32, 20),
(25, '2022-10-15', '63000000', '19000000', 14, 5),
(26, '2020-10-14', '66000000', '18000000', 23, 12),
(27, '2020-10-13', '74000000', '20000000', 33, 20),
(28, '2020-10-12', '66000000', '18000000', 23, 12),
(29, '2020-10-11', '74000000', '20000000', 10, 20),
(30, '2020-10-10', '63000000', '19000000', 14, 5),
(31, '2020-10-09', '66000000', '18000000', 23, 12),
(32, '2020-10-08', '74000000', '20000000', 15, 20),
(33, '2020-10-07', '66000000', '18000000', 23, 12),
(34, '2020-10-06', '74000000', '20000000', 30, 22),
(35, '2020-10-05', '66000000', '18000000', 23, 12),
(36, '2020-10-04', '74000000', '20000000', 32, 20),
(37, '2020-10-03', '63000000', '19000000', 14, 5),
(38, '2020-10-02', '66000000', '18000000', 23, 12),
(39, '2020-10-01', '74000000', '20000000', 32, 20),
(40, '2020-09-30', '63000000', '19000000', 14, 5),
(41, '2020-09-29', '66000000', '18000000', 23, 12),
(42, '2020-09-28', '74000000', '20000000', 15, 20),
(43, '2020-09-27', '66000000', '18000000', 23, 12),
(44, '2020-09-26', '74000000', '20000000', 30, 22),
(45, '2020-09-25', '66000000', '18000000', 23, 12),
(46, '2020-09-24', '74000000', '20000000', 32, 20),
(47, '2020-09-23', '63000000', '19000000', 14, 5),
(48, '2020-09-22', '66000000', '18000000', 23, 12),
(49, '2020-09-21', '74000000', '20000000', 32, 20),
(50, '2020-09-20', '63000000', '19000000', 14, 5),
(51, '2020-09-19', '66000000', '18000000', 23, 12),
(52, '2020-09-18', '74000000', '20000000', 15, 20),
(53, '2020-09-17', '66000000', '18000000', 23, 12),
(54, '2020-09-16', '74000000', '20000000', 30, 22),
(55, '2020-09-15', '66000000', '18000000', 23, 12),
(56, '2020-09-14', '74000000', '20000000', 32, 20),
(57, '2020-09-13', '63000000', '19000000', 14, 5),
(58, '2020-09-12', '66000000', '18000000', 23, 12),
(59, '2020-09-11', '74000000', '20000000', 32, 20),
(60, '2020-09-10', '63000000', '19000000', 14, 5),
(61, '2020-09-09', '66000000', '18000000', 23, 12),
(62, '2020-09-08', '74000000', '20000000', 15, 20),
(63, '2020-09-07', '66000000', '18000000', 23, 12),
(64, '2020-09-06', '74000000', '20000000', 30, 22),
(65, '2020-09-05', '66000000', '18000000', 23, 12),
(66, '2020-09-04', '74000000', '20000000', 32, 20),
(67, '2020-09-03', '63000000', '19000000', 14, 5),
(68, '2020-09-02', '66000000', '18000000', 23, 12),
(69, '2020-09-01', '74000000', '20000000', 32, 20),
(70, '2022-12-03', '363000', '36300', 13, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conscious` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `full_name`, `email`, `avatar`, `phone`, `country`, `conscious`, `district`, `commune`, `address_detail`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Ngọc Mỹ', 'Phạm Thị Ngọc Mỹ', 'phammy773734@gmail.com', 'download (1)46.jpg', '097 9773 734', 'Việt Nam', 'An Giang', 'Châu Phú', 'Thạnh Mỹ Tây', '180 thanh hoa', '2022-11-13 12:20:04', '$2y$10$oZc9zHCedO1dZciKZyFS5eUsf6h6d07sJublWlTEovsqKfLRxQZ7m', '8ow6tonpKu47NOwMxfJQCBPDFUSyBueHlD9POgMtPv3HPGOkm2wXKARm7hlD', '2022-11-13 12:20:39', '2022-11-13 12:20:39'),
(8, 'Ngọc Mỹ', 'Phạm Thị Ngọc Mỹ', 'myb1910105@student.ctu.edu.vn', 'download (2)78.jpg', '097 9773 734', 'Việt Nam', 'An Giang', 'Nội Bài', 'Thạnh Mỹ Tây', '180 Thanh Hoa', '2022-12-03 07:14:48', '$2y$10$2R8PuPp017hlIGd940gVTujfTQVqDVPQ1fmAUD1sX/wz.eH7gLfeS', NULL, '2022-12-03 07:15:24', '2022-12-03 07:15:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `wish_list`
--

INSERT INTO `wish_list` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 20, 1659490882, '2022-10-28 11:41:17', '2022-10-28 11:41:17'),
(2, 20, 1659491472, '2022-10-28 11:45:31', '2022-10-28 11:45:31'),
(3, 20, 1659494328, '2022-10-28 11:45:43', '2022-10-28 11:45:43'),
(4, 20, 1659702929, '2022-10-28 11:54:01', '2022-10-28 11:54:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `category_of_blog`
--
ALTER TABLE `category_of_blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `comment_pro`
--
ALTER TABLE `comment_pro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `category_of_blog`
--
ALTER TABLE `category_of_blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comment_pro`
--
ALTER TABLE `comment_pro`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1667284319;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
