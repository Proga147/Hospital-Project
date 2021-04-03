-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 07:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(8, 'When will I be able to leave the hospital ?', 'The length of your stay is based on your progress and your treatment. Please check with your doctor.'),
(9, 'Can I be fast Tracked ?', 'Patients with a minor injury may be eligible to be seen in our Minor Cases Unit or referred to Fast Track at the Michael Browne Polyclinic'),
(35, 'Who will I see in the A&E department?', 'Everyone is assessed by a medical professional on arrival who will assess how serious your condition is and whether you need to be seen in the department on the day of arrival.  Depending on your needs, you will be treated by either an emergency nurse practitioner or one of our A&E doctors.'),
(36, 'How can my family and friends call me?', 'The telephone in your room cannot be dialed directly from outside the hospital. All calls must come through the hospital switchboard, 246-000-0000. Your family may call you at any time on most nursing units.'),
(37, 'What do I do if I have questions about my bill?', 'You can call Patient Business Services, extension 4910, while you are in the hospital or at (831) 625-4922 after you go home.'),
(40, 'Are cell phones allowed in the hospital?', 'No you cannot'),
(42, 'When can I leave the hospital', 'Neverrr');

-- --------------------------------------------------------

--
-- Table structure for table `guestward`
--

CREATE TABLE `guestward` (
  `username` varchar(24) NOT NULL,
  `id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guestward`
--

INSERT INTO `guestward` (`username`, `id`) VALUES
('guest1', 2),
('guest2', 5),
('guest4', 4),
('guest10', 8),
('onetime9', 10),
('mike96', 9),
('jammon8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(16) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `child_name` varchar(255) DEFAULT NULL,
  `username` varchar(16) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(16) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'guest',
  `last_login` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `child_name`, `username`, `password`, `role`, `last_login`) VALUES
(1, '', '', 'mblack', 'admin', 'admin', '2021-04-03 17:05:55.000000'),
(2, 'Shane', 'Marissa', 'guest1', 'guest3', 'guest', '2020-05-19 03:45:42.000000'),
(17, NULL, NULL, 'Mark', 'admin', 'admin', '0000-00-00 00:00:00.000000'),
(32, 'mark', 'john', 'guest4', 'guest4', 'guest', '2020-05-18 01:35:03.000000'),
(33, 'cara', 'monica', 'guest6', 'guest5', 'guest', '2020-04-24 21:44:43.629629'),
(34, 'Jamar', 'Michael ', 'jamar', 'jamar', 'guest', '2020-04-24 10:10:54.000000'),
(49, 'Marcello', 'Janelle', 'onetime9', 'onetime', 'guest', '2020-04-29 03:20:41.005227'),
(50, 'jonathan', 'vvyan', 'jammon8', 'jamy6', 'guest', '2020-04-29 03:32:08.014334'),
(51, 'shawn', 'sarah', 'mike96', 'open6', 'guest', '2020-04-29 15:02:22.930344');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` int(8) NOT NULL,
  `ward` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `ward`) VALUES
(1, 'Acute Medical Unit Admissions'),
(2, 'Respiratory '),
(3, 'Cardiology'),
(4, 'Childrens'),
(5, 'Maternity/Gynaecology'),
(6, 'SCBU'),
(7, 'Elderly and Medical'),
(8, 'Gastroenterology'),
(9, 'Trauma'),
(10, 'Short Stay Ward'),
(11, 'Delivery Suite (Labour Ward)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guestward`
--
ALTER TABLE `guestward`
  ADD KEY `ward_id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guestward`
--
ALTER TABLE `guestward`
  ADD CONSTRAINT `guestward_ibfk_1` FOREIGN KEY (`id`) REFERENCES `wards` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
