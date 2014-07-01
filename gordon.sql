-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2013 at 06:28 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gordon`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) CHARACTER SET latin1 NOT NULL,
  `title` varchar(20) CHARACTER SET latin1 NOT NULL,
  `price` double NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `rating` int(11) NOT NULL,
  `ratetime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category`, `title`, `price`, `description`, `image`, `rating`, `ratetime`) VALUES
(1, 'Starters', 'Davy''s classic prawn', 7.85, 'A selection of prawns, marie rose sauce with a hint of Manzanilla', 'davys-classic-prawn-cocktail.jpg', 0, 0),
(2, 'Starters', 'Warm grilled goat''s ', 5.55, 'on balsamic dressed mixed leaf', 'warm-grilled-goats-cheese-crostini.jpg', 0, 0),
(3, 'Starters', 'Plate of Scottish sm', 7.95, 'with lambs leaf dressed with balsamic syrup and pink peppercorns', 'plate-of-scottish-smoked-salmon.jpg', 0, 0),
(4, 'Salads', 'Gordon''s Salad', 9.95, 'Chicory, gorgonzola cheese, pear and dandelion salad with a whole grain mustard dressing', 'gordons-salad.jpg', 0, 0),
(5, 'Salads', 'Grilled Salmon Salad', 23.95, 'Mixed greens with sliced avocado, bacon, cherry tomato, onion and Cheshire with toasted sesame citrus vinaigrette', 'grilled-salmon-salad.jpg', 0, 0),
(6, 'Salads', 'Cobb Salad', 21.15, 'Our take on the classic - grilled chicken, hickory-smoked bacon, Stilton cheese, tomato, boiled egg, black olive, English peas, avocado and fresh chives, with a choice of dressing on the side', 'cobb-salad.jpg', 0, 0),
(7, 'Sandwiches', 'Grilled goat''s chees', 7.95, 'Warm goat''s cheese served with roast Mediterranean vegetables and pesto on a toasted ciabatta', 'grilled-goats-cheese.jpg', 0, 0),
(8, 'Sandwiches', 'Cumberland sausage', 7.25, '6oz Cumberland sausage ring served with red onions, in toasted sourdough bloomer', 'cumberland-sausage.jpg', 0, 0),
(9, 'Main courses', 'Kings Wings', 15.95, 'A dozen spiced chicken wings tossed in our special Guinness Hoisin BBQ sauce, with sesame seeds and green onions', 'kings-wings.jpg', 5, 1),
(10, 'Main courses', 'Sausage Rolls', 18.35, 'Banger sausage wrapped in pastry served with our house BBQ and Scotch eggs', 'sausage-rolls.jpg', 0, 0),
(11, 'Main courses', 'Bangers and mash', 10.95, 'Cumberland sausages with traditional mashed potatoes and onion gravy', 'bangers-and-mash.jpg', 0, 0),
(12, 'Main courses', 'Fish and chips', 12.95, 'Line caught haddock in beer batter served with chipped potatoes and minted pea puree', 'fish-n-chips.jpg', 0, 0),
(13, 'Main courses', 'New season lamb cutl', 16.25, 'Roasted vegetables, sweet potato and chive mash', 'new-season-lamb-cutlets.jpg', 0, 0),
(14, 'Main courses', 'Side orders', 2.85, 'Choose from:\n- chipped potatoes or fries\n- Jersey Royal potatoes\n- traditional mash\n- seasonal vegetable selection\n- green beans\n- mixed leaf salad with house dressing\n(Price is for each portion)', 'side-orders.jpg', 0, 0),
(15, 'Beef', 'T-Bone steak', 28.95, '400g served on the bone. Made up of both sirloin and fillet offering you both the tenderness of the fillet and the flavour of the sirloin', 't-bone-steak.jpg', 10, 2),
(16, 'Beef', 'Sirloin steak', 23.55, 'A juicy, tasty and tender cut of 240g fully trimmed and aged for 21 days', 'sirloin-steak.jpg', 5, 1),
(17, 'Beef', 'Ribeye steak', 20.15, 'Rich marbling is the secret to this succulent and tasty cut of 220g, aged for 28 days', 'ribeye-steak.jpg', 0, 0),
(18, 'Desserts', 'English cheese board', 9.75, 'A selection of four British cheeses served with biscuits and green tomato and apple chutney', 'english-cheese-board.jpg', 0, 0),
(19, 'Desserts', 'Chocolate tart', 5.85, 'Delicious tart with clotted cream and raspberry coulis', 'chocolate-tart.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `mid` int(11) NOT NULL,
  `sessionid` int(11) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`mid`, `sessionid`) VALUES
(9, 4),
(15, 4),
(16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tagging`
--

CREATE TABLE IF NOT EXISTS `tagging` (
  `tid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  PRIMARY KEY (`tid`,`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tagging`
--

INSERT INTO `tagging` (`tid`, `mid`) VALUES
(14, 15),
(15, 15),
(16, 15),
(17, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(17, 'test'),
(16, 'test'),
(15, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `commonname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `commonname`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Puppa');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `menus` (`id`);
