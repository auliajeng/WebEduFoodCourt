-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 08:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_foodcourt`
--

-- --------------------------------------------------------

--
-- Table structure for table `kedai`
--

CREATE TABLE `kedai` (
  `id` int(11) NOT NULL,
  `nama_kedai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kedai`
--

INSERT INTO `kedai` (`id`, `nama_kedai`) VALUES
(1, 'Waroeng Cilikan'),
(2, 'Kedai Jajan Dulu'),
(3, 'Kedai Dilla'),
(4, 'Es Teller Sultan'),
(5, 'Bakso Cuangki'),
(6, 'Tahu Walik dan Aci'),
(7, 'Pangsit Kuah dan Jus Buah'),
(8, 'RITS eatery'),
(9, 'Cirambay'),
(10, 'Kedai CER');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kedai` varchar(100) DEFAULT NULL,
  `kedai_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `harga`, `kedai`, `kedai_id`) VALUES
(1, 'Nasi Chicken Korean Spicy', 6000, 'Waroeng Cilikan', 1),
(2, 'Pasta Creamy Mushroom', 6000, 'Waroeng Cilikan', 1),
(3, 'Pasta Richeese (Spicy / Cheese)', 6000, 'Waroeng Cilikan', 1),
(4, 'Nasi Chicken Creamy Mushroom', 6000, 'Waroeng Cilikan', 1),
(6, 'Pasta Korean Spicy', 6000, 'Waroeng Cilikan', 1),
(8, 'Mozarella Dark Choco', 3000, 'Waroeng Cilikan', 1),
(9, 'Crunchy Dark Choco', 3000, 'Waroeng Cilikan', 1),
(10, 'Curry Ramen (Original / Spicy Chili Oil)', 7000, 'Waroeng Cilikan', 1),
(11, 'Dry Curry Ramen', 7000, 'Waroeng Cilikan', 1),
(12, 'Cimol Chili Oil (Kering / Kuah)', 5000, 'Waroeng Cilikan', 1),
(13, 'Cimol Lombok Ijo', 5000, 'Kedai CER', 1),
(14, 'Tantanmen', 5000, 'Kedai CER', 1),
(15, 'Tantan Goreng', 5000, 'Kedai CER', 1),
(16, 'Cilur (Cilok Kuah Telur)', 5000, 'Kedai CER', 1),
(17, 'Cilok Kuah Ori', 5000, 'Kedai CER', 1),
(18, 'Ciwir (Cilok Ayam Suwir)', 5000, 'Kedai CER', 1),
(19, 'Pempek Crispi', 5000, 'Kedai CER', 1),
(20, 'Pempek Dos Kuah Cuko', 5000, 'Kedai CER', 1),
(21, 'Klonyom', 5000, 'Kedai CER', 1),
(22, 'Makaroni Telur', 5000, 'Kedai CER', 1),
(23, 'Es Teller Sultan (Small)', 7000, 'Es Teller Sultan', 1),
(24, 'Es Teller Sultan (Medium)', 10000, 'Es Teller Sultan', 1),
(25, 'Es Teller Sultan (Large)', 14000, 'Es Teller Sultan', 1),
(26, 'Bakso Cuangki', 5000, 'Bakso Cuangki', 1),
(27, 'Otak-otak (Kuah / Chili Oil)', 5000, 'Kedai Jajan Dulu', 1),
(28, 'Tempura (Kuah / Chili Oil)', 5000, 'Kedai Jajan Dulu', 1),
(29, 'Cireng Chili Oil', 5000, 'Kedai Jajan Dulu', 1),
(30, 'Piscok Lumer ', 5000, 'Kedai Jajan Dulu', 1),
(31, 'Cibay Chili Oil', 5000, 'Kedai Jajan Dulu', 1),
(32, 'Cisocek (Cireng Sosis Kosek)', 5000, 'Kedai Jajan Dulu', 1),
(33, 'Cireng Kuah Seblak', 5000, 'Kedai Jajan Dulu', 1),
(34, 'Gabin Vla Susu', 5000, 'Kedai Jajan Dulu', 1),
(35, 'Cheese Roll', 5000, 'Kedai Jajan Dulu', 1),
(37, 'Geblek Mewek', 5000, 'Kedai Dilla', 1),
(38, 'Cibay', 5000, 'Kedai Dilla', 1),
(39, 'Bakso Seafood', 5000, 'Kedai Dilla', 1),
(40, 'Kwetiaw (Goreng / Kuah)', 5000, 'Kedai Dilla', 1),
(41, 'Cifood (Cimol Seafood)', 7000, 'Kedai Dilla', 1),
(42, 'Mie Gacoan', 5000, 'Kedai Dilla', 1),
(43, 'Mie Ayam', 5000, 'Kedai Dilla', 1),
(44, 'Mie Yam Goreng', 6000, 'Kedai Dilla', 1),
(45, 'Cirambay Goreng', 5000, 'Cirambay', 1),
(46, 'Cirambay Rebus', 5000, 'Cirambay', 1),
(47, 'Cirambay Kuah Pedas', 5000, 'Cirambay', 1),
(48, 'Cipak Koceak', 5000, 'Cirambay', 1),
(49, 'Mie Jebew', 5000, 'Cirambay', 1),
(50, 'Mie Tulang', 5000, 'Cirambay', 1),
(51, 'Sticky Milk (Taro / Strawberry Tart / Creamy Choco / Matcha Mania)', 5000, 'Cirambay', 1),
(53, 'Tahu Walik', 5000, 'Tahu Walik dan Aci', 1),
(54, 'Tahu Aci Kuah Gejrot', 5000, 'Tahu Walik dan Aci', 1),
(55, 'Tahu Aci Geprek', 5000, 'Tahu Walik dan Aci', 1),
(56, 'Tahu Aci Bumbu Tabur', 5000, 'Tahu Walik dan Aci', 1),
(57, 'Tahu Aci Bumbu Tabur', 5000, 'Tahu Walik dan Aci', 1),
(59, 'Basreng Chili Oil (Kering / Kuah)', 5000, 'Waroeng Cilikan', 1),
(60, 'Sweet Choco Strawberry Milk', 5000, 'Waroeng Cilikan', 1),
(61, 'Lion Dark Choco Milk', 5000, 'Waroeng Cilikan', 1),
(62, 'Choco Mango Milk', 5000, 'Waroeng Cilikan', 1),
(63, 'Choco Taro Milk', 5000, 'Waroeng Cilikan', 1),
(64, 'Choco Red Velvet Milk', 5000, 'Waroeng Cilikan', 1),
(65, 'Fresh Milk Caffe', 5000, 'Waroeng Cilikan', 1),
(66, 'Mieset Original', 5000, 'Waroeng Cilikan', 1),
(67, 'Mieset pangsit + bakso', 8000, 'Waroeng Cilikan', 1),
(68, 'Mieset sosis ', 8000, 'Waroeng Cilikan', 1),
(69, 'Mieset Telur', 10000, 'Waroeng Cilikan', 1),
(70, 'Mieset sosis telur', 13000, 'Waroeng Cilikan', 1),
(71, 'Es Teh Jumbo', 3000, 'Tahu Walik dan Aci', 1),
(72, 'Jus (Alpukat / Strawberry)', 8000, 'Pangsit Kuah dan Jus Buah', 1),
(73, 'Jus (Naga / Mangga)', 7000, 'Pangsit Kuah dan Jus Buah', 1),
(74, 'Jus (Kweni / Melon / Nanas)', 6000, 'Pangsit Kuah dan Jus Buah', 1),
(75, 'Jus (Jambu / Tomat)', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(76, 'Sop Buah', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(77, 'Es Jeruk', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(78, 'Coklat Nyong (Ori / Keju)', 6000, 'Pangsit Kuah dan Jus Buah', 1),
(79, 'Coklat Nyong (Avocado / Banana)', 8000, 'Pangsit Kuah dan Jus Buah', 1),
(80, 'Pop Ice Cincau', 4000, 'Pangsit Kuah dan Jus Buah', 1),
(81, 'Pop Ice Boba', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(82, 'Chocolatos Cincau', 4000, 'Pangsit Kuah dan Jus Buah', 1),
(83, 'Chocolatos Boba', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(84, 'Frisan Flag Cincau', 4000, 'Pangsit Kuah dan Jus Buah', 1),
(85, 'Frisan Flag Boba', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(86, 'Hilo Cincau', 4000, 'Pangsit Kuah dan Jus Buah', 1),
(87, 'Hilo Boba', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(88, 'Good Day Cincau ', 4000, 'Pangsit Kuah dan Jus Buah', 1),
(89, 'Good Day Boba', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(90, 'Nutrisari ', 4000, 'Pangsit Kuah dan Jus Buah', 1),
(91, 'Coklat Boba', 7000, 'Pangsit Kuah dan Jus Buah', 1),
(92, 'Greentea Boba', 7000, 'Pangsit Kuah dan Jus Buah', 1),
(93, 'Thaitea Boba', 7000, 'Pangsit Kuah dan Jus Buah', 1),
(94, 'Cappucino Boba', 7000, 'Pangsit Kuah dan Jus Buah', 1),
(95, 'Es Jelly Nano Nano', 3000, 'Pangsit Kuah dan Jus Buah', 1),
(96, 'Es Choki-Choki Buah Semangka dan Melon', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(97, 'Pangsit Kuah Ayam (Original / Sosis / Jamur) bisa mix', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(98, 'Wonton (Goreng / Kering / Kuah)', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(99, 'Yamie Spicy (Chili Oil)', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(100, 'Canai (Coklat / Keju)', 5000, 'Pangsit Kuah dan Jus Buah', 1),
(101, 'Smoothies Strawberry', 5000, 'Smoothies dan Nasi', 1),
(102, 'Smoothies Strawberry', 5000, 'Smoothies dan Nasi', 1),
(103, 'Smoothies Strawberry', 5000, 'Smoothies dan Nasi', 1),
(104, 'Smoothies Strawberry', 5000, 'RITS eatery', 1),
(105, 'Smoothies Anggur', 5000, 'RITS eatery', 1),
(106, 'Smoothies Banana', 5000, 'RITS eatery', 1),
(107, 'Smoothies Avocado', 5000, 'RITS eatery', 1),
(108, 'Smoothies Mango', 5000, 'RITS eatery', 1),
(109, 'MilkShake Oreo', 5000, 'RITS eatery', 1),
(110, 'MilkShake Marie', 5000, 'RITS eatery', 1),
(111, 'MilkShake Coffee', 5000, 'RITS eatery', 1),
(112, 'MilkShake Chocolatos', 5000, 'RITS eatery', 1),
(113, 'Es Kul-Kul (Pisang / Melon / Nanas / Semangka)', 2000, 'RITS eatery', 1),
(114, 'Salad Buah', 5000, 'RITS eatery', 1),
(115, 'Makaroni Bolognese ', 5000, 'RITS eatery', 1),
(116, 'Spaghetti Bolognese', 5000, 'RITS eatery', 1),
(117, 'Waffle Small (Coklat / Tiramisu / Strawberry / Blueberry / Keju)', 3000, 'RITS eatery', 1),
(118, 'Waffle Medium (Coklat / Tiramisu / Strawberry / Blueberry / Keju)', 5000, 'RITS eatery', 1),
(119, 'Nasi Ayam Suwir Jamur', 6000, 'RITS eatery', 1),
(120, 'Potato Chips (Bolognese / Original / Bumbu Tabur)', 5000, 'RITS eatery', 1),
(121, 'Potato Wedges (Original / Chili Oil / Mayonaise manis / Asam Manis / Mentai)', 5000, 'RITS eatery', 1),
(122, 'Nasi Ayam Crispy (Original / Chili Oil / Mayonaise manis / Asam Manis / Mentai)', 6000, 'RITS eatery', 1),
(123, 'Nasi Chicken Bulgogi', 6000, 'RITS eatery', 1),
(124, 'Makaroni Chili Oil', 5000, 'RITS eatery', 1),
(125, 'Nasi Sarang Semut Ayam (Original / Matah / Asam Manis / Pedas Manis)', 6000, 'RITS eatery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '4444', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kedai`
--
ALTER TABLE `kedai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kedai` (`kedai_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kedai`
--
ALTER TABLE `kedai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_kedai` FOREIGN KEY (`kedai_id`) REFERENCES `kedai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
