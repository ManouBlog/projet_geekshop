-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 11:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geekshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `geekshop_users`
--

CREATE TABLE `geekshop_users` (
  `id` int(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `cpass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `geekshop_users`
--

INSERT INTO `geekshop_users` (`id`, `nom`, `prenom`, `user`, `pass`, `cpass`) VALUES
(1, 'Adjobi', 'kadjo pierre emmanuel', 'piscou', '123', '123'),
(2, 'Adjobi', 'kadjo pierre emmanuel', 'piscou', '123', '123'),
(3, 'Adjobi', 'kadjo pierre emmanuel', 'piscou', '123', '123'),
(4, 'bog', 'big', 'big Boss', 'azerty', 'azerty'),
(5, 'kadjo', 'pierre', 'piscou', 'azerty', 'azerty'),
(6, 'bro', 'kadjo', 'travis', 'travis', 'travis');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `reference` int(20) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `quantite_minimale` varchar(20) NOT NULL,
  `quantite_en_stock` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`reference`, `libelle`, `quantite_minimale`, `quantite_en_stock`) VALUES
(18, 'bougie', '123', '  300'),
(23, 'koutoukou', '1', '50'),
(24, 'cahier', '10', '20'),
(25, 'bono', '19', '50'),
(26, 'mais', '400', '600'),
(28, 'mais', '123', '50'),
(29, 'mais', '100', '200'),
(30, 'velo ', '400', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `geekshop_users`
--
ALTER TABLE `geekshop_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`reference`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `geekshop_users`
--
ALTER TABLE `geekshop_users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `reference` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
