-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2025 at 12:50 AM
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
-- Database: `bank_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_financials`
--

CREATE TABLE `bank_financials` (
  `bank_name` varchar(255) DEFAULT NULL,
  `total_asset` varchar(255) DEFAULT NULL,
  `total_liability` varchar(255) DEFAULT NULL,
  `total_capital` varchar(255) DEFAULT NULL,
  `net_income` varchar(255) DEFAULT NULL,
  `eps` varchar(255) DEFAULT NULL,
  `no_of_staff` varchar(255) DEFAULT NULL,
  `no_of_branch` varchar(255) DEFAULT NULL,
  `bank_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_financials`
--

INSERT INTO `bank_financials` (`bank_name`, `total_asset`, `total_liability`, `total_capital`, `net_income`, `eps`, `no_of_staff`, `no_of_branch`, `bank_logo`) VALUES
('Awash Bank', '  262,408,622.00 ', '  244,463,279.00 ', '  37,945,343.00 ', '  8,677,762.00 ', '487', '20633', '947', 'assets/img/Bank Logo/Awash-Bank.png'),
('Bank of Abyssinia S.C.', '  222,303,169.00 ', '  199,109,069.00 ', '  23,194,100.00 ', '  4,237,996.00 ', '0.33', '11455', '930', 'assets/img/Bank Logo/Picture25.png'),
('Dashen Bank', '  183,720,295.00 ', '  159,793,266.00 ', '  23,297,029.00 ', '  4,886,091.00 ', '433', '18555', '882', 'assets/img/Bank Logo/Picture24.png'),
('Cooperative Bank of Oromia S.C.', '  139,698,907.00 ', '  123,754,774.00 ', '  15,944,133.00 ', '  1,615,452.00 ', '15', '15467', '758', 'assets/img/Bank Logo/Picture23.png'),
('Hibret Bank', '  96,580,170.00 ', '  83,933,403.00 ', '  12,646,767.00 ', '  2,338,168.00 ', '383', '9440', '499', 'assets/img/Bank Logo/Picture22.png'),
('Oromia Bank', '  68,073,947.00 ', '  58,494,060.00 ', '  9,597,887.00 ', '  961,248.00 ', '142', '10340', '575', 'assets/img/Bank Logo/Picture21.png'),
('NIB International Bank', '  67,038,015.00 ', '  56,670,699.00 ', '  10,367,316.00 ', '  957,020.00 ', '70', '7210', '441', 'assets/img/Bank Logo/Picture20.png'),
('Abay Bank', '  66,417,516.00 ', '  57,089,147.00 ', '  9,328,369.00 ', '  1,052,060.00 ', '280', '9475', '542', 'assets/img/Bank Logo/Picture19.png'),
('Wegagen Bank S.C.', '  65,733,550.00 ', '  56,526,098.00 ', '  9,207,451.00 ', '  1,603,201.00 ', '0.3689', '5426', '436', 'assets/img/Bank Logo/Picture18.png'),
('Tseday Bank S.C.', '  60,881,035.00 ', '  48,324,226.00 ', '  12,556,808.00 ', '  595,647.00 ', 'N/A', '768', '91', 'assets/img/Bank Logo/Picture17.png'),
('Zemen Bank S.C.', '  59,200,783.00 ', '  46,938,839.00 ', '  12,261,943.00 ', '  2,392,430.00 ', '376', '1831', '125', 'assets/img/Bank Logo/Picture16.png'),
('Buna Bank', '  54,531,896.00 ', '  47,460,905.00 ', '  7,070,991.00 ', '  764,532.00 ', '161.57', '4172', '474', 'assets/img/Bank Logo/Picture15.png'),
('Berhan Bank S.C.', '  46,021,506.00 ', '  39,808,311.00 ', '  6,213,195.00 ', '  1,188,212.00 ', '350.33', '6004', '383', 'assets/img/Bank Logo/Picture14.png'),
('Amhara Bank Share Company', '  35,217,541.00 ', '  28,114,270.00 ', '  7,103,272.00 ', '  524,494.00 ', '0.083', '5391', '310', 'assets/img/Bank Logo/Picture13.png'),
('Enat Bank Share Company', '  27,218,652.00 ', '  23,006,026.00 ', '  4,212,626.00 ', '  555,198.00 ', '201', '1930', '201', 'assets/img/Bank Logo/Picture12.png'),
('Global Bank', '  24,188,312.00 ', '  20,617,345.00 ', '  3,570,968.00 ', '  499,849.00 ', '332', '3333', '225', 'assets/img/Bank Logo/Picture11.png'),
('Siinquee Bank', '  20,537,075.00 ', '  12,447,643.00 ', '  8,089,432.00 ', '  371,560.00 ', 'N/A', '6921', '404', 'assets/img/Bank Logo/Picture10.png'),
('Addis International Bank', '  15,406,811.00 ', '  12,248,302.00 ', '  3,158,509.00 ', '  413,868.00 ', '20.44', '1372', '156', 'assets/img/Bank Logo/Picture9.png'),
('ZamZam Bank', '  9,377,719.00 ', '  7,343,285.00 ', '  2,034,434.00 ', '  110,307.00 ', '0.0594', '1471', '84', 'assets/img/Bank Logo/Picture8.png'),
('Hijra Bank', '  8,182,851.00 ', '  6,636,632.00 ', '  1,546,219.00 ', '  100,458.00 ', '73.84', '1635', '100', 'assets/img/Bank Logo/Picture7.png'),
('Ahadu Bank', '  6,422,843.00 ', '  5,429,347.00 ', '  993,496.00 ', '  90,901.00 ', '48 (Per 500)', '1747', '104', 'assets/img/Bank Logo/Picture6.png'),
('Tsehay Bank Share Company', '  6,179,823.00 ', '  5,048,006.00 ', '  1,131,817.00 ', '  (106,905.00)', 'N/A', '13406', '627', 'assets/img/Bank Logo/Picture5.png'),
('Gadaa Bank S.C.', '  5,605,348.00 ', '  4,408,922.00 ', '  1,196,425.00 ', '  90,151.00 ', '0.08', '1371', '85', 'assets/img/Bank Logo/Picture4.png'),
('Shebele Bank', '  3,760,393.00 ', '  3,091,046.00 ', '  594,930.00 ', '  19,838.00 ', 'N/A', '651', '50', 'assets/img/Bank Logo/Picture3.png'),
('Goh Betoch Bank Share Company', '  2,859,950.00 ', '  1,177,293.00 ', '  1,682,657.00 ', '  80,093.00 ', '76.05', '181', '9', 'assets/img/Bank Logo/Picture2.png'),
('Rammis Bank', '  2,320,824.00 ', '  1,875,187.00 ', '  445,637.00 ', '  (196,312.00)', 'Nahins', '681', '40', 'assets/img/Bank Logo/Picture1.png'),
('hello', '  1.00 ', '  2.00 ', '  3.00 ', '  4.00 ', '5', '6', '7', 'assets/img/Bank Logo/Picture2.png'),
('hello2', '  1.00 ', '  2.00 ', '  3.00 ', '  4.00 ', '5', '6', '7', 'assets/img/Bank Logo/Picture2.png'),
('aminu test', 'asd', 'asd', 'sad', 'asd', 'asd', 'ds', 'asd', 'assets/img/Bank Logo/Picture3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_financials`
--
ALTER TABLE `bank_financials`
  ADD UNIQUE KEY `bank_name` (`bank_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
