-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2023 at 08:36 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_password` varchar(30) NOT NULL,
  `admin_firstname` varchar(50) NOT NULL,
  `admin_lastname` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_registrationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_type` varchar(10) DEFAULT 'Admin',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_registrationdate`, `admin_type`) VALUES
(1, '123', 'Administrator', 'Executive', 'admin@gmail.com', '2022-10-09 00:00:00', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `service_id` int DEFAULT NULL,
  `senior_id` int DEFAULT NULL,
  `appointment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `appointed_date` date NOT NULL,
  `time_slot_id` int DEFAULT NULL,
  `appointment_status` varchar(10) NOT NULL DEFAULT 'PENDING',
  `notes` varchar(500) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `service_id_fk_app` (`service_id`),
  KEY `senior_id_fk_app` (`senior_id`),
  KEY `time_slot_id_fk_app` (`time_slot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `service_id`, `senior_id`, `appointment_date`, `appointed_date`, `time_slot_id`, `appointment_status`, `notes`) VALUES
(1, 1, 1, '2022-08-05 00:00:00', '2022-08-10', 2, 'APPROVED', ''),
(2, 2, 5, '2022-08-10 00:00:00', '2022-08-17', 4, 'PENDING', ''),
(4, 4, 1, '2022-10-15 00:00:00', '2022-10-18', 4, 'PENDING', ''),
(7, 10, 3, '2022-10-14 00:00:00', '2022-10-22', 1, 'PENDING', ''),
(8, 10, 20, '2022-10-17 00:00:00', '2022-10-26', 2, 'PENDING', 'Broken Chairs'),
(9, 4, 25, '2022-10-16 00:00:00', '2022-10-31', 3, 'PENDING', 'Please bring pesticide'),
(10, 11, 10, '2022-10-16 00:00:00', '2022-11-02', 5, 'PENDING', ''),
(13, 8, 12, '2022-10-16 00:00:00', '2022-10-18', 2, 'PENDING', 'leaking'),
(15, 3, 23, '2022-10-16 00:00:00', '2022-10-22', 2, 'PENDING', ''),
(17, 1, 17, '2022-10-16 07:37:27', '2022-10-17', 1, 'APPROVED', 'garden like jungle'),
(18, 1, 10, '2022-10-16 07:37:27', '2022-10-17', 2, 'APPROVED', 'need grass trimming. got snnacks'),
(19, 7, 25, '2022-10-16 15:37:30', '2022-10-18', 1, 'PENDING', ''),
(20, 7, 25, '2022-10-16 15:37:30', '2022-10-18', 1, 'PENDING', ''),
(21, 5, 17, '2022-10-16 15:39:09', '2022-10-19', 3, 'PENDING', 'ironing and dry cleaning dresses'),
(23, 11, 15, '2022-10-16 16:55:20', '2022-10-28', 1, 'PENDING', 'install 3 CCTV cameras'),
(25, 6, 8, '2022-10-16 16:56:41', '2022-10-18', 1, 'PENDING', 'plastering'),
(26, 10, 5, '2022-10-16 16:57:29', '2022-11-16', 1, 'PENDING', ''),
(27, 4, 13, '2022-10-16 16:58:17', '2022-10-21', 2, 'APPROVED', ''),
(28, 3, 20, '2022-10-16 17:01:59', '2022-10-28', 1, 'PENDING', 'spring cleaning'),
(31, 1, 1, '2022-10-16 10:50:55', '2022-10-17', 1, 'APPROVED', ''),
(32, 1, 1, '2022-10-16 10:51:13', '2022-10-17', 4, 'PENDING', '');

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

DROP TABLE IF EXISTS `contractor`;
CREATE TABLE IF NOT EXISTS `contractor` (
  `contractor_id` int NOT NULL AUTO_INCREMENT,
  `contractor_password` varchar(30) NOT NULL,
  `contractor_firstname` varchar(50) NOT NULL,
  `contractor_lastname` varchar(50) NOT NULL,
  `contractor_company` varchar(100) NOT NULL,
  `contractor_contact` varchar(30) NOT NULL,
  `contractor_email` varchar(50) NOT NULL,
  `contractor_registrationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contractor_type` varchar(10) NOT NULL DEFAULT 'Contractor',
  PRIMARY KEY (`contractor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`contractor_id`, `contractor_password`, `contractor_firstname`, `contractor_lastname`, `contractor_company`, `contractor_contact`, `contractor_email`, `contractor_registrationdate`, `contractor_type`) VALUES
(1, '123', 'Contractor', 'First', 'Mertz-Mayert', '016-349-4453', 'contractor@gmail.com', '2021-11-04 00:00:00', 'Contractor'),
(2, 'og8wxKq3N', 'Wain', 'Cassell', 'Stamm-Gottlieb', '931-636-5911', 'wcassell1@google.com.hk', '2021-11-08 00:00:00', 'Contractor'),
(3, 'BMa5tThbrafL', 'Trixi', 'Kyngdon', 'Fay Group', '197-625-7761', 'tkyngdon2@kickstarter.com', '2022-10-03 00:00:00', 'Contractor'),
(4, 'SCocmMEQYtQH', 'Herc', 'Borrows', 'Hamill LLC', '531-780-1788', 'hborrows3@loc.gov', '2022-03-15 00:00:00', 'Contractor'),
(5, '29e8ZcSU2NBx', 'Ambrosi', 'Farraway', 'Ullrich LLC', '989-769-6946', 'afarraway4@java.com', '2022-02-27 00:00:00', 'Contractor'),
(6, 'sQj6SFmD', 'Nanette', 'Mitchell', 'Muller-Ankunding', '260-714-8033', 'nmitchell5@ocn.ne.jp', '2022-09-13 00:00:00', 'Contractor'),
(7, 'em1jE8tSkwS', 'Mitzi', 'Nottram', 'Franecki-Schmitt', '917-390-4720', 'mnottram6@myspace.com', '2022-01-11 00:00:00', 'Contractor'),
(8, 'nJkJxusAmXlq', 'Rayna', 'Perse', 'Balistreri, Kuvalis and Kris', '259-235-4631', 'rperse7@nyu.edu', '2022-05-16 00:00:00', 'Contractor'),
(9, '8mbW6RhrpvdI', 'Russ', 'Margach', 'Murphy, Armstrong and Bartoletti', '566-966-5456', 'rmargach8@economist.com', '2021-11-22 00:00:00', 'Contractor'),
(15, '123', 'Contractor', 'Test', 'Contractor Association', '018-280-5327', 'contractortest@gmail.com', '2022-10-16 00:00:00', 'Contractor'),
(16, '123', 'Contractor', 'Lim', 'Contractor Association', '018-280-5327', 'contractorLim@gmail.com', '2022-10-16 00:00:00', 'Contractor');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int NOT NULL AUTO_INCREMENT,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoice_description` varchar(500) NOT NULL,
  `invoice_total` tinyint(1) NOT NULL,
  `appointment_id` int DEFAULT NULL,
  `contractor_id` int DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `appointment_id_fk_inv` (`appointment_id`),
  KEY `contractor_id_fk_inv` (`contractor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_date`, `invoice_description`, `invoice_total`, `appointment_id`, `contractor_id`) VALUES
(1, '2022-08-10 00:00:00', '1. Gardening - RM50', 50, 1, 1),
(2, '2022-08-17 00:00:00', '1. Basic Housekeeping - RM25', 25, 2, 2),
(3, '2022-10-16 00:00:00', '1. Pest Control - RM30', 30, 4, 3),
(6, '2022-10-16 00:00:00', '1. Laundry & Dry Cleaning', 50, 10, 1),
(7, '2022-10-16 00:00:00', '1. Gardening - RM50', 50, 17, 1),
(8, '2022-10-16 00:00:00', '1. Gardening - RM50', 50, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `service_id` int DEFAULT NULL,
  `review` varchar(500) DEFAULT NULL,
  `rating` int NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `service_id_fk_review` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `service_id`, `review`, `rating`) VALUES
(1, 1, 'Great work done', 5),
(2, 2, 'Could offer more for basic cleaning', 4),
(4, 6, 'Really great job', 4),
(5, 7, 'My AC works now thank you Home Repair', 4),
(6, 10, 'My favourite old couch is like brand new again', 5),
(7, 2, 'Wish they cleaned the underside of my house', 3),
(8, 11, 'Now I can finally talk to my nieces and nephews', 5),
(9, 1, 'Friendly gardener', 2),
(10, 1, 'Well done', 3),
(11, 1, 'Weeding done well', 3),
(12, 7, 'Great job.', 5),
(13, 4, 'Finally pest free!', 4),
(14, 6, 'great job', 4),
(15, 10, 'Great Job', 4),
(16, 3, 'excellent service', 5);

-- --------------------------------------------------------

--
-- Table structure for table `senior`
--

DROP TABLE IF EXISTS `senior`;
CREATE TABLE IF NOT EXISTS `senior` (
  `senior_ID` int NOT NULL AUTO_INCREMENT,
  `senior_firstname` varchar(50) NOT NULL,
  `senior_lastname` varchar(50) NOT NULL,
  `senior_contact` varchar(30) NOT NULL,
  `senior_email` varchar(50) NOT NULL,
  `senior_addressline1` varchar(150) NOT NULL,
  `senior_addressline2` varchar(150) DEFAULT NULL,
  `senior_postcode` varchar(5) NOT NULL,
  `state_id` int DEFAULT NULL,
  `senior_registrationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `senior_password` varchar(30) NOT NULL,
  `senior_type` varchar(6) NOT NULL DEFAULT 'Senior',
  PRIMARY KEY (`senior_ID`),
  KEY `state_id_fk_senior` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `senior`
--

INSERT INTO `senior` (`senior_ID`, `senior_firstname`, `senior_lastname`, `senior_contact`, `senior_email`, `senior_addressline1`, `senior_addressline2`, `senior_postcode`, `state_id`, `senior_registrationdate`, `senior_password`, `senior_type`) VALUES
(1, 'John', 'Doe', '891-587-3971', 'senior@gmail.com', '444 Old Shore Alley', '', '12345', 13, '2022-07-21 00:00:00', '123', 'Senior'),
(2, 'Hussein', 'Lelliott', '325-991-0556', 'hlelliott1@ucsd.edu', '2 Lakeland Plaza', '', '23546', 2, '2022-07-22 00:00:00', 'T3pfEY3U', 'Senior'),
(3, 'Bethena', 'Winn', '934-730-7566', 'bwinn2@prlog.org', '8711 Aberg Circle', '', '52464', 3, '2022-07-22 00:00:00', 'Kg3OpHgpo', 'Senior'),
(4, 'Brandi', 'Pollard', '566-939-9337', 'bpollard3@list-manage.com', '749 Springs Road', '', '46246', 4, '2022-07-22 00:00:00', 'M1GMu30', 'Senior'),
(5, 'Bale', 'Powrie', '448-680-0441', 'bpowrie4@icio.us', '1 Crescent Oaks Center', '', '43631', 5, '2022-07-23 00:00:00', 'sdlnD0eOL', 'Senior'),
(6, 'Gawen', 'Cottesford', '615-851-5491', 'gcottesford5@google.fr', '58831 Algoma Hill', '', '65864', 6, '2022-07-23 00:00:00', 'FIoEzOP', 'Senior'),
(7, 'Robert', 'Storrah', '834-905-4134', 'rstorrah6@printfriendly.com', '12 Anzinger Hill', '', '73451', 7, '2022-07-23 00:00:00', 'QH5DOMKirwz', 'Senior'),
(8, 'Daron', 'Depke', '521-385-3655', 'ddepke7@odnoklassniki.ru', '00 Iowa Point', '', '46346', 8, '2022-07-24 00:00:00', 'VDfAmv3SDvPK', 'Senior'),
(9, 'Washington', 'Bonnesen', '925-690-2629', 'wbonnesen8@posterous.com', '02425 Esch Drive', '', '46754', 9, '2022-07-24 00:00:00', '0kCpcYYTvy', 'Senior'),
(10, 'Lira', 'Rigg', '766-570-1027', 'lrigg9@dailymotion.com', '6767 Kim Park', '', '36724', 10, '2022-07-25 00:00:00', 'zhQwniSYHe', 'Senior'),
(11, 'Josh', 'Piburn', '334-740-9319', 'jpiburna@nba.com', '618 Autumn Leaf Parkway', '', '24578', 11, '2022-07-25 00:00:00', 'FbBa4gvWnX', 'Senior'),
(12, 'Marja', 'Matushevich', '913-860-5541', 'mmatushevichb@disqus.com', '0832 Lighthouse Bay Trail', '', '43346', 12, '2022-07-25 00:00:00', 'lCkixWad', 'Senior'),
(13, 'Jacinta', 'Trayling', '727-786-7041', 'jtraylingc@comcast.net', '876 Southridge Point', '', '39328', 1, '2022-07-26 00:00:00', 'xUwQNfsmLM', 'Senior'),
(14, 'Shandie', 'Bolzmann', '182-420-1442', 'sbolzmannd@networkadvertising.org', '9470 Hallows Center', '', '45713', 2, '2022-07-26 00:00:00', 'GH14mWB4dAv7', 'Senior'),
(15, 'Audie', 'Pavis', '865-262-9272', 'apavise@eepurl.com', '98 Vera Center', '', '23456', 3, '2022-07-26 00:00:00', '3l9yftZGI', 'Senior'),
(16, 'Salome', 'Woodyeare', '387-663-3158', 'swoodyearef@ow.ly', '882 Algoma Street', '', '75254', 4, '2022-07-26 00:00:00', 'fVaNLch', 'Senior'),
(17, 'Melisse', 'Hendrikse', '840-228-3239', 'mhendrikseg@si.edu', '5 Iowa Drive', '', '63754', 5, '2022-07-27 00:00:00', 'EqYnRLhfK', 'Senior'),
(18, 'Morten', 'Wand', '608-446-2780', 'mwandh@t.co', '69 Harper Street', '', '41464', 6, '2022-07-28 00:00:00', 'HDKhE0s1N4iw', 'Senior'),
(19, 'Penrod', 'Cumming', '662-159-4841', 'pcummingi@example.com', '08299 South Center', '', '70450', 7, '2022-07-29 00:00:00', 'y9SOckc', 'Senior'),
(20, 'Bartlet', 'Wethers', '213-136-3044', 'bwethersj@flavors.me', '5297 Calypso Avenue', '', '53264', 8, '2022-07-30 00:00:00', 'B00jHWEJ', 'Senior'),
(21, 'Rochella', 'Matysik', '600-842-7640', 'rmatysikk@squarespace.com', '9 Park Meadow Drive', '', '64313', 9, '2022-07-30 00:00:00', 'VP3Jfdhs', 'Senior'),
(22, 'Brocky', 'Stanier', '316-279-1669', 'bstanierl@prnewswire.com', '75 American Ash Circle', '', '43253', 10, '2022-08-01 00:00:00', 'pb1JydJR7u', 'Senior'),
(23, 'Jorrie', 'Pollie', '904-923-8777', 'jpolliem@ibm.com', '1 2nd Avenue', '', '48100', 11, '2022-08-02 00:00:00', '7MxU8Dcp', 'Senior'),
(24, 'Ruthanne', 'Nield', '847-925-0188', 'rnieldn@webs.com', '44879 3rd Drive', '', '35212', 12, '2022-08-03 00:00:00', 'RZU7AACYn', 'Senior'),
(25, 'Elonore', 'Rijkeseis', '618-159-1394', 'erijkeseiso@pagesperso-orange.fr', '8590 Granby Terrace', '', '36532', 1, '2022-08-04 00:00:00', '1M3oZK', 'Senior'),
(46, 'chung', 'asd', '01298734551', 'chungliqing@live.com', 'Somewhere over the rainbow', '', '70450', 3, '2022-10-13 00:00:00', 'asdf', 'Senior'),
(47, 'Kong', 'Heng', '01116474038', 'henryheng1577@hotmail.com', '22, Lorong 2/3, Taman Semarak 2', '', '34000', 8, '2022-10-15 00:00:00', '000000', 'Senior'),
(49, 'Chung ', 'Li Qing', '018-280-5327', 'chungliqing@gmail.com', '264, Jalan Senangin 9, Taman Senangin, Seremban', '', '70450', 5, '2022-10-16 00:00:00', '123', 'Senior'),
(50, 'Li Qing', 'Lim', '018-280-5327', 'chungliqing@hotmail.com', '264, Jalan Senangin 9, Taman Senangin, Seremban', '', '70450', 5, '2022-10-16 00:00:00', '123', 'Senior'),
(51, 'Chung ', 'Li Qing', '018-280-5327', 'liqing@live.com', '264, Jalan Senangin 9, Taman Senangin', '', '70450', 5, '2022-10-16 00:00:00', '123', 'Senior');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(150) NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `service_price` decimal(7,2) NOT NULL,
  `service_description` text,
  `contractor_id` int DEFAULT NULL,
  PRIMARY KEY (`service_id`),
  KEY `contractor_id_fk_service` (`contractor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_type`, `service_price`, `service_description`, `contractor_id`) VALUES
(1, 'Gardening', 'Cleaning & Maintenance', '50.00', 'Our gardeners are responsible for keeping green areas clean, cleaning trash, and guaranteeing the health of plants and greenscapes. We are able to operate and maintain mowers, trimmers, and fertilisers carefully. Not only that, we ensure to always keep your home\'s outside spaces lush and vibrant.', 1),
(2, 'Basic Housekeeping', 'Cleaning & Maintenance', '25.00', 'Home Repair\'s housekeepers should perform light cleaning the home and report any safety issues. Our housekeepers are able to vacuum, sweep, empty trash cans, dust shelves, wipe windows, and mop floors as a part of basic housekeeping.', 2),
(3, 'Advanced Housekeeping', 'Cleaning & Maintenance', '40.00', 'In advanced housekeeping, our workers are equipped with more advanced materials for instances such as cleaning the fan or dusting ceilings, along with a thorough spring cleaning session included as well.', 2),
(4, 'Pest Control', 'Cleaning & Maintenance', '30.00', 'Want to get rid of unwanted guests occupying your home? Well no worries for that, Home Repair is here to put an end to these pest issues! Our pest exterminators are skilled to inspect any area and then determine the pest issue, and these critters will be gone before you know it. ', 3),
(5, 'Laundry & Dry Cleaning', 'Cleaning & Maintenance', '20.00', 'Home Repair will wash or dry-clean items such as clothing, suede, leather, furs, blankets, draperies, linens, rugs, and carpets, by operating or tending washing or dry-cleaning equipment at your home. ', 2),
(6, 'Paint Job', 'Cleaning & Maintenance', '20.00', 'Our painters use primers and sealers, among other finishes, on room walls and other constructions. All work locations are prepared, cleaned, and taped. If required, the previous paint layer is stripped away. The painters also create a new hue or consistency by mixing paints or oils.', 4),
(7, 'Electrical', 'Repair & Installation', '40.00', 'A building\'s lights, appliances, and machinery can\'t function without the work of an electrical expert, who is responsible for installing all of the wiring, circuits, and outlets. They must ensure the integrity of electrical systems by diagnosing and fixing any problems that arise.', 5),
(8, 'Air Conditioner', 'Repair & Installation', '50.00', 'Within the comfort of your own homes, the air conditioning technician is responsible for the installation, maintenance, repair, and service of various pieces of equipment and facilities, such as air conditioning systems and units, water-cooling devices, and freezers.', 6),
(9, 'Plumbing', 'Repair & Installation', '30.00', 'In addition to providing general plumbing services, Home Repair also employs a staff of licenced plumbers who can install, service, and repair plumbing systems, including water and gas lines, heating systems, and related fixtures and appliances at your homes.', 7),
(10, 'Furniture Repair', 'Repair & Maintenance', '40.00', 'In-home furniture assembly and repair services are available from a qualified expert. As part of their job, they examine the condition of items, provide finishing services for furniture, track down replacement components for furniture in the event of damage or wear and tear, and keep sales and repair records.', 8),
(11, 'Safety & Smart Home Installation', 'Repair & Installation', '30.00', 'Home Repair\'s technicians are also capable and fit for installing and repairing any smart home devices that may help you automate tasks like setting and checking on your house\'s temperature, and managing your security cameras and systems.', 9);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int NOT NULL AUTO_INCREMENT,
  `state_name` varchar(30) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Johor'),
(2, 'Kedah'),
(3, 'Kelantan'),
(4, 'Malacca'),
(5, 'Negeri Sembilan'),
(6, 'Pahang'),
(7, 'Penang'),
(8, 'Perak'),
(9, 'Perlis'),
(10, 'Sabah'),
(11, 'Sarawak'),
(12, 'Selangor'),
(13, 'Terengganu'),
(14, 'Kuala Lumpur'),
(15, 'Labuan'),
(16, 'Putrajaya');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

DROP TABLE IF EXISTS `time_slot`;
CREATE TABLE IF NOT EXISTS `time_slot` (
  `time_slot_id` int NOT NULL AUTO_INCREMENT,
  `time_slot` varchar(50) NOT NULL,
  PRIMARY KEY (`time_slot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`time_slot_id`, `time_slot`) VALUES
(1, '09:30AM - 10:30AM'),
(2, '11:00AM - 12:00PM'),
(3, '01:30PM - 02:30PM'),
(4, '03:00PM - 04:00PM'),
(5, '04:30PM - 05:30PM');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `senior_id_fk_app` FOREIGN KEY (`senior_id`) REFERENCES `senior` (`senior_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_id_fk_app` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_slot_id_fk_app` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slot` (`time_slot_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `appointment_id_fk_inv` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appointment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contractor_id_fk_inv` FOREIGN KEY (`contractor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `service_id_fk_review` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `senior`
--
ALTER TABLE `senior`
  ADD CONSTRAINT `state_id_fk_senior` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `contractor_id_fk_service` FOREIGN KEY (`contractor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
