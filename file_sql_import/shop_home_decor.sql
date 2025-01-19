-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2025 at 01:36 AM
-- Server version: 9.1.0
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_home_decor`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `pty` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `pty`, `price`, `created_at`, `updated_at`) VALUES
(8, 5, 41, 2, 18, NULL, NULL),
(9, 6, 70, 4, 78, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `email`, `content`, `created_at`, `updated_at`) VALUES
(5, 'Linh', '01234567', 'HCM', 'linh123@gmail.com', '123', '2025-01-09 06:55:47', '2025-01-09 06:55:47'),
(6, 'Linh', '0901234556', 'HCM', 'linh0@gmail.com', 'none', '2025-01-16 20:32:42', '2025-01-16 20:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `active`, `created_at`, `updated_at`) VALUES
(11, 'Cushion', 0, 'Cushion', '<p>Cushion</p>', 1, '2025-01-09 06:36:23', '2025-01-09 06:36:23'),
(12, 'Bed', 0, 'Bedding', '<p>Bedding</p>', 1, '2025-01-09 06:36:44', '2025-01-09 06:36:44'),
(13, 'Bed sets', 12, 'Bed sets', '<p>Bed sets</p>', 1, '2025-01-09 06:36:57', '2025-01-09 06:36:57'),
(14, 'Bedside Tables', 12, 'Bedside Tables', '<p>Bedside Tables</p>', 1, '2025-01-09 06:37:58', '2025-01-09 06:37:58'),
(15, 'Table', 0, 'Table', '<p>Table</p>', 1, '2025-01-09 06:38:42', '2025-01-09 06:38:42'),
(16, 'Sofa', 0, 'Sofa', '<p>Sofa</p>', 1, '2025-01-09 06:38:56', '2025-01-09 06:38:56'),
(17, 'Office sofa', 16, 'Office sofa', '<p>Office sofa</p>', 1, '2025-01-09 06:39:51', '2025-01-09 06:39:51'),
(18, 'Luxury sofa', 16, 'Luxury sofa', '<p>Luxury sofa</p>', 1, '2025-01-09 06:40:23', '2025-01-09 06:40:23'),
(19, 'Blinds', 0, 'Blinds', '<p>Blinds</p>', 1, '2025-01-09 06:40:35', '2025-01-09 06:40:35'),
(20, 'Roman blinds', 19, 'Roman blinds', '<p>Roman blinds</p>', 1, '2025-01-09 06:40:49', '2025-01-09 06:40:49'),
(21, 'Vertical Blinds', 19, 'Vertical Blinds', '<p>Vertical Blinds</p>', 1, '2025-01-09 06:41:09', '2025-01-09 06:41:09'),
(23, 'Linh', 0, 'linh', '<p>linh</p>', 0, '2025-01-10 23:27:13', '2025-01-10 23:27:13'),
(24, 'Roller Blind', 19, 'Roller Blind', '<p>Roller Blind</p>', 1, '2025-01-16 20:33:56', '2025-01-16 20:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_03_143714_create_menus_table', 2),
(5, '2024_12_05_125002_create_products_table', 3),
(6, '2024_12_05_130702_update_table_product', 4),
(7, '2024_12_08_055012_create_sliders_table', 5),
(8, '2024_12_13_124445_create_customers_table', 6),
(9, '2024_12_13_124508_create_carts_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int NOT NULL,
  `price` int DEFAULT NULL,
  `price_sale` int DEFAULT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `menu_id`, `price`, `price_sale`, `active`, `created_at`, `updated_at`, `thumb`) VALUES
(36, 'Petra Cotton Velvet Boxy Cushion', 'Match your room\'s design energy with the Petra velvet boxy cushion. Made from \'feels so good\' cotton velvet in a \'made you look\' boxy, two tone design. Mix and match your scatters for extra oooh. Petra arrives vacuum packed for ease of delivery. Unwrap, fluff up and enjoy.\r\nHeight 30cm\r\nWidth 50cm', '<p>Match your room&#39;s design energy with the Petra velvet boxy cushion. Made from &#39;feels so good&#39; cotton velvet in a &#39;made you look&#39; boxy, two tone design. Mix and match your scatters for extra oooh. Petra arrives vacuum packed for ease of delivery. Unwrap, fluff up and enjoy.<br />\r\nHeight 30cm<br />\r\nWidth 50cm</p>', 11, 25, NULL, 1, '2025-01-09 06:44:27', '2025-01-09 06:44:27', '/storage/uploads/2025/01/09/Cushion_1.PNG'),
(37, 'Velvet Boxy Cushion', 'Match your room\'s design energy with the Petra velvet boxy cushion.', '<p>Made from &#39;feels so good&#39; cotton velvet in a &#39;made you look&#39; boxy, two tone design. Mix and match your scatters for extra oooh. Petra arrives vacuum packed for ease of delivery. Unwrap, fluff up and enjoy.<br />\r\nHeight 45cm<br />\r\nWidth 45cm</p>', 11, 30, NULL, 1, '2025-01-09 06:49:04', '2025-01-09 06:49:04', '/storage/uploads/2025/01/09/Cushion_2.PNG'),
(38, 'Jasper Conran London Papercut Tufted Cushion', '100% cotton tufted face. Cotton reverse. Iconic papercut design.', '<p>100% cotton tufted face. Cotton reverse. Iconic papercut design.<br />\r\nHeight 43cm<br />\r\nWidth 43cm</p>', 11, 28, NULL, 1, '2025-01-09 06:50:39', '2025-01-09 06:50:39', '/storage/uploads/2025/01/09/Cushion_3.PNG'),
(39, 'Jasper Conran London Papercut Tufted Cushion', '100% cotton tufted face. Cotton reverse. Iconic papercut design. Height 43cm Width 43cm', '<p>100% cotton tufted face. Cotton reverse. Iconic papercut design. Height 43cm Width 43cm</p>', 11, 28, NULL, 1, '2025-01-09 06:51:25', '2025-01-09 06:51:25', '/storage/uploads/2025/01/09/Cushion_4.PNG'),
(40, 'Petra Velvet Boxy Cushion', 'Match your room\'s design energy with the Petra velvet boxy cushion. Made from \'feels so good\' cotton velvet in a \'made you look\' boxy, two tone design\r\nHeight 45cm\r\nWidth 45cm', '<p>Match your room&#39;s design energy with the Petra velvet boxy cushion. Made from &#39;feels so good&#39; cotton velvet in a &#39;made you look&#39; boxy, two tone design<br />\r\nHeight 45cm<br />\r\nWidth 45cm</p>', 11, 30, NULL, 1, '2025-01-09 06:52:08', '2025-01-09 06:52:08', '/storage/uploads/2025/01/09/Cushion_5.PNG'),
(41, 'Yard Jaye Velvet Fringed Polyester Filled 100% Cotton Cushion', 'Crafted from soft, cotton velvet fabric; the Jaye cushion is complete with a double-stitch fringed edge. Expertly made and available in a range of earthy tones, inspired by lichen greens and cool inks; this design is ideal for layering a depth of colour to your home decor.\r\nHeight 45cm\r\nWidth 45cm\r\nDepth 8cm', '<p>Crafted from soft, cotton velvet fabric; the Jaye cushion is complete with a double-stitch fringed edge. Expertly made and available in a range of earthy tones, inspired by lichen greens and cool inks; this design is ideal for layering a depth of colour to your home decor.<br />\r\nHeight 45cm<br />\r\nWidth 45cm<br />\r\nDepth 8cm</p>', 11, 18, NULL, 1, '2025-01-09 06:52:37', '2025-01-09 06:52:37', '/storage/uploads/2025/01/09/Cushion_6.PNG'),
(42, 'Yard 100% Linen Grid Check Feather Filled Cushion', 'Effortless and understated, the Yard 100% Linen cushion features a smart yarn dyed check. Reversible, and complete with a twin-stitch flanged edge; this classic structured style is available in a range of subtle natural tones and will sit well within any interior.\r\nHeight 50cm\r\nWidth 50cm\r\nDepth 8cm', '<p>Effortless and understated, the Yard 100% Linen cushion features a smart yarn dyed check. Reversible, and complete with a twin-stitch flanged edge; this classic structured style is available in a range of subtle natural tones and will sit well within any interior.<br />\r\nHeight 50cm<br />\r\nWidth 50cm<br />\r\nDepth 8cm</p>', 11, 32, NULL, 1, '2025-01-09 06:53:02', '2025-01-09 06:53:02', '/storage/uploads/2025/01/09/Cushion_7.PNG'),
(43, 'Yard Strata Stripe Cotton Jute Woven Cushion', 'In an understated way, the nautical-inspired Strata Stripe cushion makes its mark with a wonderfully textured design. The wide, vertical sustainable jute stripes are complimented by a diagonally-stitched alternative cotton stripe in a clear white. This cushion is ideal for neutrally decorated rooms, or if you wish to bring the natural fibres of outdoors to the inside of your home. Material Composition update in TOV: 80% Jute 20% Cotton.\r\nHeight 45cm\r\nWidth 45cm\r\nDepth 8cm', '<p>In an understated way, the nautical-inspired Strata Stripe cushion makes its mark with a wonderfully textured design. The wide, vertical sustainable jute stripes are complimented by a diagonally-stitched alternative cotton stripe in a clear white. This cushion is ideal for neutrally decorated rooms, or if you wish to bring the natural fibres of outdoors to the inside of your home. Material Composition update in TOV: 80% Jute 20% Cotton.<br />\r\nHeight 45cm<br />\r\nWidth 45cm<br />\r\nDepth 8cm</p>', 11, 17, NULL, 1, '2025-01-09 06:53:36', '2025-01-09 06:53:36', '/storage/uploads/2025/01/09/Cushion_8.PNG'),
(44, 'Cotton Duvet Cover and Pillowcase Set', 'Snuggle up in this beautifully crafted bed set, refined and washed to give you the ultimate cosy comfort. Exceptionally soft and full of \'just hit snooze\' this cosy cotton duvet cover and pillowcase set features twin needling for a neat, tailored finish. It will soon become your firm favourite.', '<p>Snuggle up in this beautifully crafted bed set, refined and washed to give you the ultimate cosy comfort. Exceptionally soft and full of &#39;just hit snooze&#39; this cosy cotton duvet cover and pillowcase set features twin needling for a neat, tailored finish. It will soon become your firm favourite.</p>', 13, 65, NULL, 1, '2025-01-09 06:59:54', '2025-01-09 06:59:54', '/storage/uploads/2025/01/09/Bedsets_1.PNG'),
(45, 'Thread Count Terri Duvet Cover and Pillowcase Set', 'Stripe it lucky with the bold and beautiful Terri bed set. Made from 180 thread count cotton, this soft and comfortable set boasts a striking multi-coloured striped design bringing stand-out style to your bedroom.', '<p>Stripe it lucky with the bold and beautiful Terri bed set. Made from 180 thread count cotton, this soft and comfortable set boasts a striking multi-coloured striped design bringing stand-out style to your bedroom.</p>', 13, 65, NULL, 1, '2025-01-09 07:00:31', '2025-01-09 07:00:31', '/storage/uploads/2025/01/09/Bedsets_2.PNG'),
(46, 'Thread Count Bow Otto Duvet Cover and Pillowcase Set', 'Classic and understated, the Otto bed set features a grey striped design with tie detailing to the pillowcases. Made from 180 thread count cotton, this soft and sophisticated bed set brings a laidback feel to your sleep space.', '<p>Classic and understated, the Otto bed set features a grey striped design with tie detailing to the pillowcases. Made from 180 thread count cotton, this soft and sophisticated bed set brings a laidback feel to your sleep space.</p>', 13, 60, NULL, 1, '2025-01-09 07:01:04', '2025-01-09 07:01:04', '/storage/uploads/2025/01/09/Bedsets_3.PNG'),
(47, 'Duvet Cover and Pillowcase Set', 'Snuggle up in this beautifully crafted bed set, refined and washed to give you the ultimate cosy comfort. Exceptionally soft and full of \'just hit snooze\' this cosy cotton duvet cover and pillowcase set features twin needling for a neat, tailored finish. It will soon become your firm favourite.', '<p>Snuggle up in this beautifully crafted bed set, refined and washed to give you the ultimate cosy comfort. Exceptionally soft and full of &#39;just hit snooze&#39; this cosy cotton duvet cover and pillowcase set features twin needling for a neat, tailored finish. It will soon become your firm favourite.</p>', 13, 75, NULL, 1, '2025-01-09 07:01:38', '2025-01-09 07:01:38', '/storage/uploads/2025/01/09/Bedsets_4.PNG'),
(48, 'Eleni Bedside', 'Height 64cm\r\nWidth 40cm\r\nDepth 41cm\r\nWipe clean only.', '<p>Height 64cm<br />\r\nWidth 40cm<br />\r\nDepth 41cm<br />\r\nWipe clean only.</p>', 14, 299, NULL, 1, '2025-01-09 07:02:38', '2025-01-09 07:02:38', '/storage/uploads/2025/01/09/Bedside_1.PNG'),
(49, 'Lucien Mango Wood Bedside Table', 'Height 56cm\r\nWidth 51cm\r\nDepth 45cm\r\nWipe clean only.', '<p>Height 56cm<br />\r\nWidth 51cm<br />\r\nDepth 45cm<br />\r\nWipe clean only.</p>', 14, 329, NULL, 1, '2025-01-09 07:03:08', '2025-01-09 07:03:08', '/storage/uploads/2025/01/09/Bedside_2.PNG'),
(50, 'Cory Oak 2 Drawer Bedside Table', 'Whether you keep your clutter curated or stored away, Cory is a whole style moment. From the chunky feet, to the off-centre drawers and elevated design details, we are obsessed.\r\nHeight 51cm\r\nWidth 56cm\r\nDepth 39cm', '<p>Whether you keep your clutter curated or stored away, Cory is a whole style moment. From the chunky feet, to the off-centre drawers and elevated design details, we are obsessed.<br />\r\nHeight 51cm<br />\r\nWidth 56cm<br />\r\nDepth 39cm</p>', 14, 300, NULL, 1, '2025-01-09 07:03:38', '2025-01-09 07:03:38', '/storage/uploads/2025/01/09/Bedside_3.PNG'),
(51, 'Odie Bedside Table', 'The Odie range is sleek and modern, but it\'s got a timeless story behind it. The range takes its inspiration from vintage sewing boxes. There\'s a clever hidden drawer in this bedside table, so you can keep your nighttime necessities at hand without having them all on view. Height (cm: )50 Width (cm): 40 Depth (cm): 40.\r\nHeight 50cm\r\nWidth 41cm\r\nDepth 41cm', '<p>The Odie range is sleek and modern, but it&#39;s got a timeless story behind it. The range takes its inspiration from vintage sewing boxes. There&#39;s a clever hidden drawer in this bedside table, so you can keep your nighttime necessities at hand without having them all on view. Height (cm: )50 Width (cm): 40 Depth (cm): 40.<br />\r\nHeight 50cm<br />\r\nWidth 41cm<br />\r\nDepth 41cm</p>', 14, 449, NULL, 1, '2025-01-09 07:04:08', '2025-01-09 07:04:08', '/storage/uploads/2025/01/09/Bedside_4.PNG'),
(52, 'Sofa tea table', 'Glass sofa tea table with 2-storey design brings comfort to the living space. Combined with copper tones, it adds luxurious beauty to the living space.', '<p>Glass sofa tea table with 2-storey design brings comfort to the living space. Combined with copper tones, it adds luxurious beauty to the living space.<br />\r\n&nbsp;</p>', 15, 267, NULL, 1, '2025-01-09 07:06:41', '2025-01-09 07:06:41', '/storage/uploads/2025/01/09/Table_1.jpg'),
(53, 'Stone-topped tea table', 'Modern stone-top tea table models are popular products today. Because this product brings a more luxurious beauty, it is easy to clean and wipe during use.', '<p>Modern stone-top tea table models are popular products today. Because this product brings a more luxurious beauty, it is easy to clean and wipe during use.</p>', 15, 298, NULL, 1, '2025-01-09 07:07:14', '2025-01-09 07:07:14', '/storage/uploads/2025/01/09/Table_2.jpg'),
(54, 'Smart Sofa Tea Table', 'Always bringing impressive, high-end smart sofa table designs, updated with new and luxurious models. We introduce to customers a beautiful sofa tea table model with eye-catching colors and a modern design that can be placed in any space.', '<p>Always bringing impressive, high-end smart sofa table designs, updated with new and luxurious models. We introduce to customers a beautiful sofa tea table model with eye-catching colors and a modern design that can be placed in any space.</p>', 15, 330, NULL, 1, '2025-01-09 07:12:19', '2025-01-09 07:12:19', '/storage/uploads/2025/01/09/Table_3.jpg'),
(55, 'Sofa Tea Table made of wood', 'Table with natural brown wood color combined with harmonious white brings a modern and novel look to the living room interior space. Besides, the design of the tea table with rounded edges is both beautiful, soft and highly safe, especially for families with the elderly and children.', '<p>Table with natural brown wood color combined with harmonious white brings a modern and novel look to the living room interior space. Besides, the design of the tea table with rounded edges is both beautiful, soft and highly safe, especially for families with the elderly and children.</p>', 15, 215, NULL, 1, '2025-01-09 07:13:10', '2025-01-09 07:13:10', '/storage/uploads/2025/01/09/Table_4.jpg'),
(56, 'Tea Table', 'The stone-top sofa tea table model is designed with quite a large size, so it is suitable for arranging living room sofa sets with a length of 3-3.5m. This stone-top sofa tea table is suitable for arranging in spacious living room spaces.', '<p>The stone-top sofa tea table model is designed with quite a large size, so it is suitable for arranging living room sofa sets with a length of 3-3.5m. This stone-top sofa tea table is suitable for arranging in spacious living room spaces.</p>', 15, 345, NULL, 1, '2025-01-09 07:13:49', '2025-01-09 07:13:49', '/storage/uploads/2025/01/09/Table_5.jpg'),
(57, 'Office Sofa', 'Skeleton: Made from natural wood, termite resistant\r\nFoam mattress with 3-layer design, soft and anti-sagging\r\nSprings imported from Malaysia\r\nDimensions of long sofa: 2300*900 mm\r\nSingle sofa size: 1200*900 mm\r\nUpholstery material: microfiber leather, soft like real leather\r\nThe design is modern, minimalist but brings luxurious beauty\r\nHigh quality leather material brings comfort when used', '<p>Skeleton: Made from natural wood, termite resistant<br />\r\nFoam mattress with 3-layer design, soft and anti-sagging<br />\r\nSprings imported from Malaysia<br />\r\nDimensions of long sofa: 2300*900 mm<br />\r\nSingle sofa size: 1200*900 mm<br />\r\nUpholstery material: microfiber leather, soft like real leather<br />\r\nThe design is modern, minimalist but brings luxurious beauty<br />\r\nHigh quality leather material brings comfort when used</p>', 17, 943, NULL, 1, '2025-01-09 07:23:57', '2025-01-09 07:23:57', '/storage/uploads/2025/01/09/Office_sofa_1.jpg'),
(58, 'Office Sofa', 'Dimensions: 2050*850 mm\r\nUpholstery material: soft imported Korean leather\r\nThe frame uses natural termite-free wood\r\nSprings imported from Malaysia\r\nSoft foam cushion, effective anti-sagging', '<p>Dimensions: 2050*850 mm<br />\r\nUpholstery material: soft imported Korean leather<br />\r\nThe frame uses natural termite-free wood<br />\r\nSprings imported from Malaysia<br />\r\nSoft foam cushion, effective anti-sagging</p>', 17, 410, NULL, 1, '2025-01-09 07:24:38', '2025-01-09 07:24:38', '/storage/uploads/2025/01/09/Office_Sofa_2.jpg'),
(59, 'Office Sofa', 'Bringing not only office space, but also living rooms... luxury, class and modernity, the Office Sofa model exudes beauty with outstanding quality and extremely sophisticated design.', '<p>Bringing not only office space, but also living rooms... luxury, class and modernity, the Office Sofa model exudes beauty with outstanding quality and extremely sophisticated design.</p>', 17, 628, NULL, 1, '2025-01-09 07:25:33', '2025-01-09 07:25:33', '/storage/uploads/2025/01/09/Office_Sofa_3.jpg'),
(60, 'Office Sofa', 'Origin: Malaysia\r\nLeather material: 100% genuine cowhide, high quality leather from Mastrotto ITALY.\r\nCowhide thickness: 1.3~1.5mm (thickest and most premium today).\r\nFoam: Premium soft Malaysian foam.\r\nPackaging: Imported complete set according to manufacturer\'s standards.\r\nFrame system: Meranti wood, Malaysian natural forest wood.\r\nCompact design is popular today', '<p>Origin: Malaysia<br />\r\nLeather material: 100% genuine cowhide, high quality leather from Mastrotto ITALY.<br />\r\nCowhide thickness: 1.3~1.5mm (thickest and most premium today).<br />\r\nFoam: Premium soft Malaysian foam.<br />\r\nPackaging: Imported complete set according to manufacturer&#39;s standards.<br />\r\nFrame system: Meranti wood, Malaysian natural forest wood.<br />\r\nCompact design is popular today</p>', 17, 1470, NULL, 1, '2025-01-09 07:26:42', '2025-01-09 07:26:42', '/storage/uploads/2025/01/09/Office_Sofa_4.jpg'),
(61, 'Luxury Sofa', 'Check out the high-end sofa model with outstanding colors and modern designs. Although the design is minimalist, it still provides a highly aesthetic interior space, providing a comfortable living space in the house. Below is some useful information about the product.', '<p>Check out the high-end sofa model with outstanding colors and modern designs. Although the design is minimalist, it still provides a highly aesthetic interior space, providing a comfortable living space in the house. Below is some useful information about the product.</p>', 18, 666, NULL, 1, '2025-01-09 07:28:26', '2025-01-09 07:28:26', '/storage/uploads/2025/01/09/Luxury_Sofa_1.jpg'),
(62, 'Luxury Sofa', 'Neoclassical style sofas are always high-class sofas with carefully crafted designs and styles. High-end sofa sets give you an extremely impressive and luxurious choice. A high-end sofa model that can be placed in any space is made from soft, comfortable luxury leather and has many outstanding advantages.', '<p>Neoclassical style sofas are always high-class sofas with carefully crafted designs and styles. High-end sofa sets give you an extremely impressive and luxurious choice. A high-end sofa model that can be placed in any space is made from soft, comfortable luxury leather and has many outstanding advantages.</p>', 18, 470, NULL, 1, '2025-01-09 07:28:53', '2025-01-09 07:28:53', '/storage/uploads/2025/01/09/Luxury_Sofa_2.jpg'),
(63, 'Luxury Sofa', 'This beautiful sofa is designed with a modern design. Looking at the chair, one can see the comfort because it is designed with a small tea table in the middle. This tea table can hold water cans, coffee cans... In addition, Also designed shelves for books, newspapers and magazines. The high-end sofa product line is covered with imported Korean leather, providing high durability and beauty.', '<p>This beautiful sofa is designed with a modern design. Looking at the chair, one can see the comfort because it is designed with a small tea table in the middle. This tea table can hold water cans, coffee cans... In addition, Also designed shelves for books, newspapers and magazines. The high-end sofa product line is covered with imported Korean leather, providing high durability and beauty.</p>', 18, 645, NULL, 1, '2025-01-09 07:29:41', '2025-01-09 07:29:41', '/storage/uploads/2025/01/09/Luxury_Sofa_3.jpg'),
(64, 'Luxury Sofa', 'Elevating living space to a completely different level, the high-end Sofa model is the most sought-after high-end sofa product line today. The product is designed with perfect structure, harmonious and balanced colors suitable for all space conditions such as private homes, apartments, corporate offices...', '<p>Elevating living space to a completely different level, the high-end Sofa model is the most sought-after high-end sofa product line today. The product is designed with perfect structure, harmonious and balanced colors suitable for all space conditions such as private homes, apartments, corporate offices...</p>', 18, 610, NULL, 1, '2025-01-09 07:30:06', '2025-01-09 07:30:06', '/storage/uploads/2025/01/09/Luxury_Sofa_4.jpg'),
(65, 'Shangri Made to Measure Roman Blind', 'Bring style to your home with the Shangri Made to Measure roman blinds, adding a rich and colourful printed velvet design to your home, perfect for any dramatic and opulent interior scheme. Personalise your home decor with three linings types, blackout, thermal or standard, ensuring a bespoke touch that suits your taste.', '<p>Bring style to your home with the Shangri Made to Measure roman blinds, adding a rich and colourful printed velvet design to your home, perfect for any dramatic and opulent interior scheme. Personalise your home decor with three linings types, blackout, thermal or standard, ensuring a bespoke touch that suits your taste.&nbsp;</p>', 20, 127, 101, 1, '2025-01-09 07:31:13', '2025-01-09 07:31:13', '/storage/uploads/2025/01/09/Roman_blinds_1.PNG'),
(66, 'Corded Roman Blind', 'This Cord roman blind is perfect to update your window and lend a relaxed modern, look to your interior. Made from polyester, the roman blind is fully lined for added insulation and privacy. Available in a choice of sizes and colours to fit your window dimensions.', '<p>This Cord roman blind is perfect to update your window and lend a relaxed modern, look to your interior. Made from polyester, the roman blind is fully lined for added insulation and privacy. Available in a choice of sizes and colours to fit your window dimensions.<br />\r\n&nbsp;</p>', 20, 70, 56, 1, '2025-01-09 07:32:09', '2025-01-09 07:32:09', '/storage/uploads/2025/01/09/Roman_blinds_2.PNG'),
(67, 'Fire Retardant Roman Blind', 'Transform your living area into a haven of elegance with our Prairie Pattern Made to Measure Roman Blinds. Meticulously fashioned from fire-retardant fabric and lining, these blinds effortlessly exude a natural aesthetic while maintaining impeccable drape and quality.', '<p>Transform your living area into a haven of elegance with our Prairie Pattern Made to Measure Roman Blinds. Meticulously fashioned from fire-retardant fabric and lining, these blinds effortlessly exude a natural aesthetic while maintaining impeccable drape and quality.</p>', 20, 116, 92, 1, '2025-01-09 07:32:44', '2025-01-09 07:32:44', '/storage/uploads/2025/01/09/Roman_blinds_3.PNG'),
(68, 'Coast Made to Measure Roman Blinds', 'Add a pop of colour and quirkiness to your windows with these Coast Made to Measure roman blinds which are customisable with a choice of three lining types, blackout, thermal or standard to suit your personal preference. You can select your preferred fitting type for seamless integration into your space, and personalise the experience further by choosing the side for the operating chain.', '<p>Add a pop of colour and quirkiness to your windows with these Coast Made to Measure roman blinds which are customisable with a choice of three lining types, blackout, thermal or standard to suit your personal preference. You can select your preferred fitting type for seamless integration into your space, and personalise the experience further by choosing the side for the operating chain.</p>', 20, 70, 48, 1, '2025-01-09 07:33:25', '2025-01-14 09:09:42', '/storage/uploads/2025/01/09/Roman_blinds_4.PNG'),
(69, 'Mirage Cordless White Vertical Blind', 'Get ready to unveil the magic of our Mirage Vertical blind. It\'s not just an ordinary blind; it\'s a stylish and practical masterpiece. The fabric mix of sheer and opaque panels offers a touch of elegance while providing light diffusion when open and complete privacy when closed.', '<p>Get ready to unveil the magic of our Mirage Vertical blind. It&#39;s not just an ordinary blind; it&#39;s a stylish and practical masterpiece. The fabric mix of sheer and opaque panels offers a touch of elegance while providing light diffusion when open and complete privacy when closed.&nbsp;</p>', 21, 380, NULL, 1, '2025-01-09 07:34:13', '2025-01-09 07:34:13', '/storage/uploads/2025/01/09/Vertical_Blinds_1.PNG'),
(70, 'Stripe Cordless Vertical Blind', 'Available in a selection of sizes and colours, this vertical blind is fashioned with a subtle striped design. Featuring cordless operation with a tilt wand function, this blind boasts a child-safe design and can be easily fixed and adjusted to suit your requirements.', '<p>Available in a selection of sizes and colours, this vertical blind is fashioned with a subtle striped design. Featuring cordless operation with a tilt wand function, this blind boasts a child-safe design and can be easily fixed and adjusted to suit your requirements.</p>', 21, 78, NULL, 1, '2025-01-09 07:34:53', '2025-01-09 07:34:53', '/storage/uploads/2025/01/09/Vertical_Blinds_2.PNG'),
(71, 'Xanadu Made to Measure Vertical Blind', 'The Xanadu packs a punch and is perfect for creating visual interest in your space. This modern pattern is perfect for adding an edge to your home.', '<p>The Xanadu packs a punch and is perfect for creating visual interest in your space. This modern pattern is perfect for adding an edge to your home.<br />\r\n&nbsp;</p>', 21, 78, 62, 1, '2025-01-09 07:35:30', '2025-01-09 07:35:30', '/storage/uploads/2025/01/09/Vertical_Blinds_3.PNG'),
(74, 'Roller Blind 1', 'Roller Blind 1', '<p>Roller Blind 1</p>', 24, 40, 36, 0, '2025-01-16 20:35:04', '2025-01-16 20:35:19', '/storage/uploads/2025/01/17/Roller_Blinds_1.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1cKsH8cSbHFo6ry2GQRVyQoQGT6hvnFMEtOOhUMz', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQlUyVnBhb3RKMW5mam5BZEs1MElPYmFCTHhtUjZXWGhndkgxd0d4ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWN0cy9hZGQiO319', 1737084986),
('nBlEjSpiJLMHdyIAqXzhdRFYH9WKBrSfCPExFNOg', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQUpPeXdoUW9VVG9CVFRScUdMOGVUandNOTV2bkNDazlITW1TQUpMeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWN0cy9hZGQiO319', 1737021747);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` int NOT NULL,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(7, 'Sale off', '#', '/storage/uploads/2025/01/09/Banner_2.PNG', 1, 1, '2025-01-09 06:00:50', '2025-01-09 06:00:50'),
(8, 'Sale off', '#', '/storage/uploads/2025/01/09/Banner_3.PNG', 1, 1, '2025-01-09 06:09:42', '2025-01-09 06:09:42'),
(9, 'Sale off', '#', '/storage/uploads/2025/01/09/Banner_1.PNG', 1, 1, '2025-01-09 05:57:38', '2025-01-09 06:10:13'),
(11, 'Linh', '#', '/storage/uploads/2025/01/10/Banner_1.PNG', 1, 0, '2025-01-09 21:37:42', '2025-01-09 21:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@localhost.com', 1, NULL, '$2y$12$qY0urDhQG8f6UiHBNwUGOOa4YA/WiauEU6LYXOvlR/JN7464pSDpq', 'U3svF4rDdG3c0PfainxiFnaHE9IQ0Z2BDUuj0MC265CKyXZJUHroLjLk9ZXb', '2024-11-27 17:00:00', '2024-11-27 17:00:00'),
(2, 'Linh1', 'linh123@gmail.com', 0, NULL, '$2y$12$g8Ck6qGoh7FZeFsr.bHLgumwZg.3P3fjmItOXZiuQSPGi1yjWPKvy', NULL, '2024-12-14 03:44:09', '2025-01-11 08:55:53'),
(4, 'Linh0', 'linh0@gmail.com', 0, NULL, '$2y$12$D3IvWbuIA6VwpPHW9N4EiuVeZvgsM/N8RqzawYegIxFZuwqiC7Y4O', NULL, '2024-12-14 07:45:08', '2024-12-14 07:45:08'),
(5, 'Ngoc Linh1', 'ngoclinh123@gmail.com', 0, NULL, '$2y$12$tGyXW5x1ytU.tVA/Kvr.GOmx4SkXlKhNttMEWgz6Nc/iECifGXyli', NULL, '2025-01-14 08:45:56', '2025-01-14 08:46:42'),
(6, 'Dao Ngoc Linh 123', 'linh1234@gmail.com', 0, NULL, '$2y$12$4Gt41nUap4tzVVf/FbZ5Ze0xitk.gYGODw22v1hGU.H2R.EWqjwmG', NULL, '2025-01-16 20:29:26', '2025-01-16 20:29:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
