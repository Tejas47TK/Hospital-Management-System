-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 09:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `appointment_date` varchar(30) NOT NULL,
  `symptoms` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date_booked` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `firstname`, `lastname`, `gender`, `phone`, `appointment_date`, `symptoms`, `status`, `date_booked`) VALUES
(1, 'James', 'Stark', '3541548711', 'male', '2022-12-01', 'headache', 'Discharge', '2022-12-18 23:29:50'),
(2, 'david', 'smith', '5649875199', 'male', '2022-12-23', 'headache', 'Discharge', '2022-12-19 12:12:54'),
(3, 'david', 'smith', '5649875199', 'male', '2022-12-31', 'headache', 'Discharge', '2022-12-19 13:30:45'),
(4, 'david', 'smith', '5649875199', 'male', '2022-12-20', 'Dengu', 'Pendding', '2022-12-19 23:11:00'),
(5, 'chetan', 'bochare', '9767563423', 'male', '2022-12-20', 'fever', 'Discharge', '2022-12-20 09:07:40'),
(6, 'david', 'smith', '5649875199', 'male', '2022-12-22', 'headache', 'Discharge', '2022-12-20 13:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salary` int(50) NOT NULL,
  `data_reg` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `profile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `firstname`, `lastname`, `username`, `email`, `gender`, `phone`, `country`, `password`, `salary`, `data_reg`, `status`, `profile`) VALUES
(1, 'Jack', 'Smith', 'jack', 'jack@gmail.com', 'male', '45896485956', 'America', 'jack1', 0, '2022-12-10 01:12:44', 'Approved', 'doctor.jpg'),
(2, 'om', 'smith', 'om', 'om@gamil.com', 'male', '54987454684', 'India', 'om', 0, '2022-12-19 16:06:12', 'Rejected', 'doctor.jpg'),
(4, 'om1', 'om2', 'om1', 'om1@gamil.com', 'male', '4564885465', 'India', 'om', 0, '2022-12-19 16:10:19', 'Approved', 'doctor.jpg'),
(5, 'Gaurav', 'Awagan', 'gaurav', 'gaurav@gmail.com', 'male', '4872457449', 'India', 'gu', 0, '2022-12-20 09:10:33', 'Approved', 'doctor.jpg'),
(6, 'mohan', 'gawande', 'mohan', 'mohan@gmail.com', 'male', '4578965478', 'India', 'mo', 0, '2022-12-20 13:47:33', 'Approved', 'doctor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_admin`
--

CREATE TABLE `hospital_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_admin`
--

INSERT INTO `hospital_admin` (`id`, `username`, `password`, `profile`) VALUES
(1, 'abhay', 'abhay123', 'download.jpg'),
(2, 'chetan', 'chetan', '2C5JGxrbGCWWCNOhU12GrtuOT0wFZRwKT9sgunOZ.jpg'),
(3, 'Vipul', 'VIPUL', '1061557.png');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `patient` varchar(30) NOT NULL,
  `date_discharge` varchar(50) NOT NULL,
  `amount_paid` varchar(40) NOT NULL,
  `description` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `doctor`, `patient`, `date_discharge`, `amount_paid`, `description`) VALUES
(1, 'jack', 'James', '2022-12-19 00:23:16', '500', 'sleep more than eight hour per day'),
(2, 'jack', 'James', '2022-12-19 01:16:13', '100', 'medicine per time'),
(3, 'jack', 'david', '2022-12-19 12:13:47', '200', 'medicine per time'),
(4, 'jack', 'david', '2022-12-19 13:31:55', '1000', 'sleep more than eight hour per day'),
(5, 'gaurav', 'chetan', '2022-12-20 09:14:03', '200', 'sleep more than eight hour per day'),
(6, 'jack', 'david', '2022-12-20 13:44:53', '200', 'medicine per time');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_reg` varchar(50) NOT NULL,
  `profile` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `firstname`, `lastname`, `username`, `email`, `gender`, `phone`, `country`, `password`, `date_reg`, `profile`) VALUES
(1, 'James', 'Stark', 'james1', 'james@gmail.com', '3541548711', 'male', 'Russia', 'jes', '2022-12-10 01:20:19', 'aeroplane.jpg'),
(2, 'david', 'smith', 'david', 'david@gamil.com', '5649875199', 'male', 'Russia', 'dav', '2022-12-19 12:12:31', 'social-media-profile-photos-3.webp'),
(3, 'chetan', 'bochare', 'chetan', 'chetan@gmail.com', '9767563423', 'male', 'India', '1212', '2022-12-20 09:06:22', 'download (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `date_send` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `title`, `message`, `username`, `date_send`) VALUES
(1, 'Send Report', 'My Invoice i received is too much', 'james', '2022-12-18 15:27:24'),
(4, 'Send Report', 'fees is too much ', 'chetan', '2022-12-20 09:15:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `hospital_admin`
--
ALTER TABLE `hospital_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hospital_admin`
--
ALTER TABLE `hospital_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
