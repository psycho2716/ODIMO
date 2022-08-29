-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 04:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odimo`
--

-- --------------------------------------------------------

--
-- Table structure for table `document_data`
--

CREATE TABLE `document_data` (
  `id` int(10) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `n_add` varchar(50) NOT NULL,
  `n_send` varchar(50) NOT NULL,
  `u_sub` varchar(50) NOT NULL,
  `u_filing` varchar(50) NOT NULL,
  `u_unit` varchar(50) NOT NULL,
  `u_dor` date NOT NULL,
  `u_address` varchar(150) NOT NULL,
  `uploaded` datetime NOT NULL,
  `image` varchar(150) NOT NULL,
  `file` longblob NOT NULL,
  `u_document` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_data`
--

INSERT INTO `document_data` (`id`, `reference_id`, `n_add`, `n_send`, `u_sub`, `u_filing`, `u_unit`, `u_dor`, `u_address`, `uploaded`, `image`, `file`, `u_document`) VALUES
(48, '2022 - 4289', 'hello1', 'World', 'English', 'MEI', 'hello2', '2022-03-20', 'Brgy. Agpanabat, Romblon, Romblon', '2022-03-16 14:20:53', '2.PNG', '', 'Incoming'),
(52, '2022 - 3804', 'John Kevin Manzo', 'World', 'English', 'MEI', 'John Kevin Manzo', '2022-03-16', 'Brgy. Lonos, Romblon, Romblon', '2022-03-16 18:31:40', '1.PNG', '', 'Outgoing'),
(55, '2022 - 4148', 'John Kevin Manzo', '2', 'English', 'MEI', 'John Kevin Manzo', '2022-03-16', '', '2022-03-16 20:10:55', '01.PNG', '', 'Outgoing'),
(56, '2022 - 4148', 'John Kevin Manzo', 'hello', 'English', 'MEI', 'John Kevin Manzo', '2022-03-21', 'Brgy. Lonos, Romblon, Romblon', '2022-03-16 21:01:00', '02.PNG', '', 'Outgoing');

-- --------------------------------------------------------

--
-- Table structure for table `uheads_data`
--

CREATE TABLE `uheads_data` (
  `id` int(11) NOT NULL,
  `n_add` varchar(50) NOT NULL,
  `n_send` varchar(50) NOT NULL,
  `process_owner` varchar(50) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `u_address` varchar(50) NOT NULL,
  `u_document` varchar(50) NOT NULL,
  `u_filing` varchar(50) NOT NULL,
  `u_sub` varchar(50) NOT NULL,
  `u_unit` varchar(50) NOT NULL,
  `image` varchar(150) NOT NULL,
  `file` longblob NOT NULL,
  `uploaded` datetime NOT NULL,
  `u_dor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uheads_data`
--

INSERT INTO `uheads_data` (`id`, `n_add`, `n_send`, `process_owner`, `reference_id`, `u_address`, `u_document`, `u_filing`, `u_sub`, `u_unit`, `image`, `file`, `uploaded`, `u_dor`) VALUES
(12, 'hello', 'World', 'Research', '2022 - 9397', 'Brgy. Agpanabat, Romblon, Romblon', 'Incoming', 'MEI', 'English', 'hello', '1.PNG', '', '2022-03-17 18:13:30', '2022-03-08'),
(13, 'hello', 'Fin the Human', 'Research and Development', '2022 - 3193', 'Brgy. Lonos, Romblon, Romblon', 'Outgoing', 'MEI', 'English', 'hello', '02.PNG', '', '2022-03-17 19:14:10', '2022-03-08'),
(14, 'Jake the Dog', 'Fin the Human', 'Test', '2022 - 2001', 'Brgy. Lonos, Romblon, Romblon', 'Incoming', 'MEO', 'English', 'Jake the Dog', '', '', '2022-03-17 19:37:28', '2022-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$2wrFQsnAlEYs/oMFOoFaeO4OptJQoEBBk4ZKRMFkW6gA.IxECdx1K', '0000-00-00 00:00:00.000000'),
(3, 'hello', '$2y$10$VjkAuD/xRr0bPQWckle24./GiAL4LohWsxzdxFNDjMRCe9i2iTwmK', '0000-00-00 00:00:00.000000'),
(4, 'helloworld@gmail.com', '$2y$10$QczqksImtbMT7mjBS8XeQu3S54ESTYPq66L.DEaxTn1gIfEI1ApZO', '0000-00-00 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document_data`
--
ALTER TABLE `document_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uheads_data`
--
ALTER TABLE `uheads_data`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `document_data`
--
ALTER TABLE `document_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `uheads_data`
--
ALTER TABLE `uheads_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
