-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 01:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9');

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `idvendeur` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `details` varchar(127) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `delegation` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `sous_categorie` varchar(20) NOT NULL,
  `datepublication` timestamp NOT NULL DEFAULT current_timestamp(),
  `popularite` int(3) NOT NULL DEFAULT 0,
  `signals` int(3) NOT NULL DEFAULT 0,
  `image1` varchar(50) NOT NULL,
  `image2` varchar(50) NOT NULL,
  `image3` varchar(50) NOT NULL,
  `image4` varchar(50) NOT NULL,
  `image5` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id`, `idvendeur`, `name`, `price`, `details`, `ville`, `delegation`, `categorie`, `sous_categorie`, `datepublication`, `popularite`, `signals`, `image1`, `image2`, `image3`, `image4`, `image5`) VALUES
(1, 1, 'T-shirt ZARA Rouge', 46.9, 'T-shirt Rouge neuf taille M. Red Printed by HRX. Prix légèrement négociable. Pour les sérieux uniquement. ✅➡ Disponible à Tunis', 'Tunis', 'Centre Ville', 'mode', 'homme', '2023-05-09 22:00:00', 10, 12, 'gallery-1.jpg', 'gallery-2.jpg', 'gallery-3.jpg', 'gallery-4.jpg', ''),
(5, 1, 'potato', 3, 'potatoes for sale', '', '', '', '', '2023-05-09 22:00:00', 0, 0, 'product-4.jpg', '', '', '', ''),
(8, 8, 'tomato', 5, 'tomatoes for sale', '', '', '', '', '2023-05-09 22:00:00', 0, 0, 'product-5.jpg', '', '', '', ''),
(14, 12, 'nnn', 100, 'ijfijf', 'Béja', 'autre', 'maison ', 'autre', '2023-05-12 12:46:26', 0, 0, '0admin.jpg', '1app-store.png', '2buy-1.jpg', '3buy-2.jpg', '4buy-3.jpg'),
(12, 6, 'White Chocolate', 12, 'White chocolate for sale', 'Djerba', 'Midoun', 'Nourriture', 'Sucré', '2023-05-11 19:02:58', 0, 0, 'product-2.jpg', 'product-2.jpg', 'product-2.jpg', 'product-2.jpg', 'product-2.jpg'),
(13, 10, 'Mercedes', 1500000, 'new new l karhba', 'Ariana', 'autre', 'vehicules', 'autre', '2023-05-12 11:07:28', 0, 2, '0car-1.png', '1car-2.png', '2car-3.png', '3product-5.jpg', '4product-10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `description` varchar(256) NOT NULL,
  `suggestion` varchar(256) DEFAULT NULL,
  `user` int(3) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT 0,
  `image` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id`, `description`, `suggestion`, `user`, `rating`, `image`) VALUES
(1, 'Top Annonces est un site magnifique qui a une interface utilisateur ergonomique.', NULL, 1, 4, NULL),
(2, 'Une des meilleures expériences de vente en ligne grace aux annonces de Top Annonces! Merci.', NULL, 2, 3, NULL),
(3, 'J\'utilise cette plateforme depuis des années et elle ne cesse de me surprendre! 20/20 !', NULL, 7, 5, NULL),
(4, 'great experice so far', 'nothing to add', 7, 5, NULL),
(5, 'Not that good', 'not yet', 7, 2, NULL),
(6, 'très bon site', 'rien à ajouter', 12, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banned`
--

CREATE TABLE `banned` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `datenaissance` date DEFAULT NULL,
  `image` varchar(64) DEFAULT NULL,
  `role` varchar(16) NOT NULL DEFAULT 'utilisateur',
  `telephone` int(16) DEFAULT NULL,
  `cin` int(8) DEFAULT NULL,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banned`
--

INSERT INTO `banned` (`id`, `name`, `email`, `password`, `datenaissance`, `image`, `role`, `telephone`, `cin`, `nom`, `prenom`) VALUES
(3, 'aaa', 'aaa@gmail.com', '8aefb06c426e07a0a671a1e2488b4858d694a730', NULL, NULL, 'utilisateur', NULL, NULL, NULL, NULL),
(4, 'foulenbenfoulen', 'foulen@gmail.com', '8aefb06c426e07a0a671a1e2488b4858d694a730', NULL, NULL, 'utilisateur', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 1, 'islem', 'islembargui43@gmail.com', '29108548', 'j&#39;ai trop aimé les articles '),
(2, 10, 'fouratttt', 'fourat@mail.com', '', 'salut salut bye bye'),
(3, 12, 'esmou', 'emailmte3ou@ee.co', '', 'salut byye');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(11) NOT NULL,
  `placed_on` date DEFAULT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(2, 2, 'fourat', '4444', 'fourat@gmail.com', 'cash on delivery', 'flat no. jnj, jnj, un, hbh, nujn - 542', 'camera (60 x 1) - ', 60, NULL, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`) VALUES
(1, 'camera', 'aa', 60, 'camera-1.webp', 'camera-2.webp', 'camera-3.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `datenaissance` date DEFAULT NULL,
  `image` varchar(64) DEFAULT NULL,
  `role` varchar(16) NOT NULL DEFAULT 'utilisateur',
  `telephone` int(16) DEFAULT NULL,
  `cin` int(8) DEFAULT NULL,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(32) DEFAULT NULL,
  `vip` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `datenaissance`, `image`, `role`, `telephone`, `cin`, `nom`, `prenom`, `vip`) VALUES
(1, 'islem', 'islembargui43@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 'user-1.png', 'utilisateur', 99000111, NULL, NULL, NULL, 0),
(2, 'fourat', 'fourat@gmail.com', '43814346e21444aaf4f70841bf7ed5ae93f55a9d', NULL, 'user-2.png', 'utilisateur', NULL, NULL, NULL, NULL, 0),
(5, 'fff', 'fff@gmail.com', '8aefb06c426e07a0a671a1e2488b4858d694a730', NULL, NULL, 'utilisateur', NULL, NULL, NULL, NULL, 0),
(6, 'islem', 'islem@gmail.com', '8aefb06c426e07a0a671a1e2488b4858d694a730', NULL, NULL, 'vendeur', NULL, NULL, NULL, NULL, 0),
(7, 'fbs', 'fbs@fbs.com', 'f2c645ea8f4b67b87075524c47b1a122f044565a', NULL, 'user-3.png', 'utilisateur', NULL, NULL, NULL, NULL, 0),
(8, 'bbb', 'bbb@bbb.com', '5cb138284d431abd6a053a56625ec088bfb88912', NULL, NULL, 'vendeur', NULL, NULL, NULL, NULL, 0),
(9, 'ccc', 'ccc@ccc.com', 'f36b4825e5db2cf7dd2d2593b3f5c24c0311d8b2', NULL, NULL, 'vendeur', NULL, NULL, NULL, NULL, 1),
(10, 'ddd', 'ddd@ddd.com', '9c969ddf454079e3d439973bbab63ea6233e4087', NULL, NULL, 'vendeur', NULL, NULL, NULL, NULL, 1),
(11, 'abdou', 'abdou@abdou.com', 'd3e9a229222587ff6c2beb5f89811e720d1de1f6', '2000-07-07', 'Gicon-5.png', 'vendeur', 22222222, 88888888, 'abdallah', 'la9aboujdid', 0),
(12, 'user', 'user@user.com', '12dea96fec20593566ab75692c9949596833adc9', '2000-01-01', 'gallery-1.jpg', 'vendeur', 11111111, 888888888, 'username', 'userlastname', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(3, 1, 1, 'camera', 50, 'camera-1.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
