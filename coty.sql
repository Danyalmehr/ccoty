-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 03:11 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coty`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `brand_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_desc`) VALUES
(1, 'Burberry', ''),
(2, 'Gucci', ''),
(3, 'Bottega Veneta', ''),
(18, 'Hugo Boss', 'Hugo Boss AG, often styled as BOSS, is a German luxury fashion house headquartered in Metzingen, Baden-WÃ¼rttemberg. The company produces clothing, accessories, footwear and fragrances. Hugo Boss is one of the biggest German clothing companies, with global sales of â‚¬2.9 billion in 2019.'),
(20, 'Calvin Klein', 'CALVIN KLEIN is a global lifestyle brand that exemplifies bold, progressive ideals and a seductive, and often minimal, aesthetic. We seek to thrill and inspire our audience while using provocative imagery and striking designs to ignite the senses.'),
(22, 'Miu Miu', 'Miu Miu is an Italian high fashion women\'s clothing and accessory brand and a fully owned subsidiary of Prada. It is headed by Miuccia Prada and headquartered in Paris, France.'),
(25, 'Chloe', 'ChloÃ© is a French luxury fashion house founded in 1952 by Gaby Aghion. During the next year of 1953 Aghion joined forces with Jacques Lenoir, formally managing the business side of the brand, allowing Aghion to purely pursue the creative growth of ChloÃ©. Its headquarters are located in Paris, France.'),
(26, 'Marc Jacobs', ''),
(29, 'Roberto Cavalli', 'Roberto Cavalli (Italian pronunciation: [roËˆbÉ›rto kaËˆvalli]; born 15 November 1940) is an Italian fashion designer and inventor. He is known for exotic prints and for creating the sand-blasted look for jeans. The high-end Italian fashion house Roberto Cavalli sells luxury clothing, perfume and leather accessories.'),
(30, 'Tiffany & co.', 'Tiffany & Co. is an American luxury jewelry and specialty retailer headquartered in New York City. It sells jewelry, sterling silver, china, crystal, stationery, fragrances, water bottles, watches, personal accessories, and leather goods'),
(37, 'Davidoff', ''),
(38, 'd', ''),
(39, 'asd', 'as'),
(40, 'asda', 'sd'),
(41, 'asdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `fragrance`
--

CREATE TABLE `fragrance` (
  `fragrance_id` int(10) UNSIGNED NOT NULL,
  `fragrance_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `fragrance_description` text NOT NULL,
  `fragrance_gender` varchar(50) NOT NULL,
  `brand_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fragrance`
--

INSERT INTO `fragrance` (`fragrance_id`, `fragrance_name`, `category`, `image`, `fragrance_description`, `fragrance_gender`, `brand_id_fk`) VALUES
(1, 'Her', 'Fruity', 'burberry_her.jpg', '', 'Female', 1),
(2, 'Bloom', 'Floral Floral', 'gucci_bloom.jpg', '', 'Female', 2),
(5, 'Her Blossom', 'Floral Fruity', 'burberry_her_blossom.jpg', '', 'Female', 1),
(8, 'Pour Femme', 'Leathery Chypre', 'bv_signature_f.jpg', '', 'Female', 3),
(9, 'Pour Homme', 'Leathery Woody', 'bv_signature_m.jpg', '', 'Male', 3),
(11, 'Daisy Love', 'Oriental Fruity', 'MJ_daisylove.jpg', '', 'Female', 26),
(12, 'MyBurberry Black', 'Oriental Floral', 'burberry_myBurberry_black.jpg', '', 'Female', 1),
(13, 'MyBurberry', 'Oriental Floral', 'burberry_myBurberry.jpg', '', 'Female', 1),
(14, 'Bottled Tonic', 'Fruity Oriental', 'hb_bottled_tonic.jpg', '', 'Male', 18),
(15, 'Paradiso Assoluto', 'Floral Oriental', 'RC_ParadisoAssoluto.jpg', 'Feminine, Opulent and Sensual', 'Female', 29),
(29, 'asd', 'asd', 'MiuMiu-LeauRosee.jpg', 'dsg', 'Male', 2),
(30, 'asd', 'asd', 'burberry_myBurberry.jpg', 'das', 'Male', 3),
(31, 'asd', 'dff', 'HB_theScent.jpg', 'asd', 'Male', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fragrance_note`
--

CREATE TABLE `fragrance_note` (
  `fragrance_note_id` int(10) UNSIGNED NOT NULL,
  `note_id_fk` int(10) UNSIGNED NOT NULL,
  `note_placement` varchar(50) NOT NULL,
  `fragrance_id_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fragrance_note`
--

INSERT INTO `fragrance_note` (`fragrance_note_id`, `note_id_fk`, `note_placement`, `fragrance_id_fk`) VALUES
(1, 3, 'Heart', 1),
(3, 1, 'Top', 1),
(4, 2, 'Top', 1),
(5, 10, 'Top', 1),
(7, 12, 'Heart', 1),
(8, 11, 'Base', 1),
(9, 8, 'Base', 1),
(10, 16, 'Base', 2),
(11, 13, 'Heart', 2),
(12, 15, 'Top', 2),
(13, 5, 'Top', 5),
(14, 6, 'Heart', 5),
(15, 4, 'Top', 5),
(16, 7, 'Heart', 5),
(17, 8, 'Base', 5),
(18, 9, 'Base', 5),
(22, 17, 'Top', 8),
(23, 18, 'Heart', 8),
(24, 19, 'Base', 8),
(25, 20, 'Base', 8),
(26, 19, 'Top', 9),
(27, 24, 'Heart', 9),
(28, 25, 'Heart', 9),
(29, 26, 'Base', 9),
(34, 39, 'Top', 11),
(35, 40, 'Heart', 11),
(36, 41, 'Base', 11),
(37, 42, 'Base', 11),
(38, 43, 'Top', 12),
(39, 11, 'Heart', 12),
(40, 20, 'Base', 12),
(41, 44, 'Top', 13),
(42, 48, 'Heart', 13),
(43, 20, 'Base', 13),
(44, 45, 'Top', 14),
(45, 35, 'Heart', 14),
(46, 46, 'Heart', 14),
(47, 47, 'Base', 14),
(48, 49, 'Top', 15),
(49, 50, 'Heart', 15),
(50, 9, 'Base', 15),
(87, 10, 'Top', 29),
(88, 9, 'Heart', 29),
(89, 50, 'Base', 29),
(90, 13, 'Top', 30),
(91, 50, 'Heart', 30),
(92, 17, 'Base', 30),
(93, 9, 'Top', 31),
(94, 19, 'Heart', 31),
(95, 16, 'Base', 31);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(10) UNSIGNED NOT NULL,
  `note` varchar(50) NOT NULL,
  `note_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `note`, `note_category`) VALUES
(1, 'Blueberry', 'Fruit'),
(2, 'Raspberry', 'Fruit'),
(3, 'Jasmine', 'Flower'),
(4, 'Mandarin', 'Fruit'),
(5, 'Pink Pepper', 'Fruit'),
(6, 'Plum Blossom', 'Flower'),
(7, 'Peony', 'Flower'),
(8, 'Musk', 'Other'),
(9, 'Sandalwood', 'Wood'),
(10, 'Blackberry', 'Fruit'),
(11, 'Amber', 'Other'),
(12, 'Violet', 'Flower'),
(13, 'Jasmine bud', 'Flower'),
(14, 'Jasmine absolute', 'Flower'),
(15, 'Rangoon creeper', 'Flower'),
(16, 'Tuberose', 'Flower'),
(17, 'Sambac jasmine', 'Flower'),
(18, 'Plum', 'Fruit'),
(19, 'Leather', 'Other'),
(20, 'Patchouli', 'Flower'),
(21, 'Lavender', 'Flower'),
(22, 'Tonka bean', 'Seed'),
(23, 'Neroli', 'Flower'),
(24, 'Fir Balsam', 'Plant'),
(25, 'Labdanum', 'Flower'),
(26, 'Pimento', 'Fruit'),
(27, 'Blackcurrant', 'Fruit'),
(28, 'Bergamot', 'Fruit'),
(29, 'Orange Blossom', 'Flower'),
(30, 'Fig leaves', 'Plant'),
(31, 'Olive wood', 'Wood'),
(32, 'Lemon Essence', 'Fruit'),
(33, 'Bitter Orange', 'Fruit'),
(34, 'Vetiver', 'Plant'),
(35, 'Ginger', 'Other'),
(36, 'Cardamom', 'Other'),
(37, 'Maninka Fruit', 'Fruit'),
(38, 'Vanilla', 'Other'),
(39, 'Crystallized berries', 'Fruit'),
(40, 'Daisy petals', 'Flower'),
(41, 'Driftwood', 'Wood'),
(42, 'Cashmere musks', 'Other'),
(43, 'Candied roses', 'Flower'),
(44, 'Freesia', 'Flower'),
(45, 'Apple', 'Fruit'),
(46, 'Cinnamon', 'Other'),
(47, 'Woody notes', 'Wood'),
(48, 'Centifolia rose', 'Flower'),
(49, 'Wisteria', 'Flower'),
(50, 'Wild jasmine', ''),
(52, 'das', ''),
(53, 'sd', ''),
(54, 'asd', ''),
(55, 'asdasd', 'Flower'),
(56, 'dasd', ''),
(57, 'a', ''),
(58, 'sad', ''),
(59, 'dsad', ''),
(60, 'asf', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `fragrance`
--
ALTER TABLE `fragrance`
  ADD PRIMARY KEY (`fragrance_id`),
  ADD KEY `brand_id_fk` (`brand_id_fk`);

--
-- Indexes for table `fragrance_note`
--
ALTER TABLE `fragrance_note`
  ADD PRIMARY KEY (`fragrance_note_id`),
  ADD KEY `note_id_fk` (`note_id_fk`),
  ADD KEY `fragrance_id_fk` (`fragrance_id_fk`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `fragrance`
--
ALTER TABLE `fragrance`
  MODIFY `fragrance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `fragrance_note`
--
ALTER TABLE `fragrance_note`
  MODIFY `fragrance_note_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fragrance`
--
ALTER TABLE `fragrance`
  ADD CONSTRAINT `fragrance_ibfk_1` FOREIGN KEY (`brand_id_fk`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE;

--
-- Constraints for table `fragrance_note`
--
ALTER TABLE `fragrance_note`
  ADD CONSTRAINT `fragrance_note_ibfk_1` FOREIGN KEY (`note_id_fk`) REFERENCES `notes` (`note_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fragrance_note_ibfk_2` FOREIGN KEY (`fragrance_id_fk`) REFERENCES `fragrance` (`fragrance_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
