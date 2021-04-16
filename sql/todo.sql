-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 09:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `reminds`
--

CREATE TABLE `reminds` (
  `id` int(11) NOT NULL,
  `usersid` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `usersid` int(11) NOT NULL,
  `remindnb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`usersid`, `remindnb`) VALUES
(2, 5),
(1, 0),
(5, 2),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `inscription` date NOT NULL DEFAULT current_timestamp(),
  `lastco` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nom`, `prenom`, `mdp`, `image`, `inscription`, `lastco`) VALUES
(1, 'jladeiro@efficom-lille.com', 'LADEIRO', 'Jules', 'azertyuiop', '', '2021-04-14', '2021-04-10 16:04:00'),
(2, 'julesladnef@gmail.com', 'Ladeiro', 'Jules', 'azertyuiop', '/WilfreB1.png', '2021-04-14', '2021-04-15 20:10:09'),
(5, 'lcornelis@efficom-lille.com', 'Cornelis', 'Lucas', 'azertyuiop', '/lucas1.png', '2021-04-15', '2021-04-15 23:26:02'),
(6, 'mkonate@efficom-lille.com', 'Konate', 'Morike', 'azertyuiop', '/morike1.png', '2021-04-16', '2021-04-16 09:20:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reminds`
--
ALTER TABLE `reminds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reminds`
--
ALTER TABLE `reminds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reminds`
--
ALTER TABLE `reminds`
  ADD CONSTRAINT `reminds_ibfk_1` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `stats_ibfk_1` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
