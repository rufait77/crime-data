-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2025 at 08:02 PM
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
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_name`, `password`) VALUES
('abc', '123');

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

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `admin_name`, `title`, `content`, `image_path`, `created_at`, `updated_at`) VALUES
(6, 'abc', 'post 2', 'this is the updated post', 'assets/img/blogs/blog_67d38cef1f26a2.48530774.PNG', '2025-03-14 01:50:17', '2025-03-14 01:57:03'),
(7, 'abc', 'post 2', 'The standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n\r\n1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"', 'assets/img/blogs/blog_67d38e1e890b90.21044255.jpg', '2025-03-14 02:02:06', '2025-03-14 02:02:06'),
(8, 'abc', 'Post with no photo', 'This is a post with no photo', NULL, '2025-03-14 02:07:11', '2025-03-14 02:08:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD UNIQUE KEY `id` (`admin_name`),
  ADD UNIQUE KEY `unique_admin_name` (`admin_name`);

--
-- Indexes for table `bank_financials`
--
ALTER TABLE `bank_financials`
  ADD UNIQUE KEY `bank_name` (`bank_name`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_name` (`admin_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `fk_admin_name` FOREIGN KEY (`admin_name`) REFERENCES `admin_info` (`admin_name`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
