-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2021 at 07:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abcd_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_data`
--

CREATE TABLE `appointment_data` (
  `appointment_id` int(11) NOT NULL,
  `patient_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `d_o_b` date NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `department` varchar(150) NOT NULL,
  `doc_selected` varchar(150) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `appt_date` date NOT NULL,
  `appt_time` time NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_data`
--

INSERT INTO `appointment_data` (`appointment_id`, `patient_name`, `email`, `gender`, `d_o_b`, `phone_number`, `department`, `doc_selected`, `doc_id`, `appt_date`, `appt_time`, `timestamp`) VALUES
(1002, 'Shilpa Dutta', 'shilpa@mail.com', 'F', '1995-01-16', '1234567890', 'Ophthalmologists', 'Abhijeet Chaudhuri', 1, '2021-05-01', '07:00:00', '2021-04-29 18:38:53'),
(1003, 'Swapna Dutta', 'swapna@mail.com', 'F', '1965-09-07', '9007175210', 'Ophthalmologists', 'Abhijeet Chaudhuri', 1, '2021-05-17', '17:30:00', '2021-04-29 18:48:13'),
(1004, 'Sudip Dutta', 'sudip@mail.com', 'M', '2021-03-31', '9748059033', 'Ophthalmologists', 'Abhijeet Chaudhuri', 1, '2021-06-07', '21:30:00', '2021-04-29 18:51:46'),
(1008, 'Rahul Dutta', 'rahul59@mail.com', 'M', '2018-06-13', '06290044365', 'Ophthalmologists', 'Abhijeet Chaudhuri', 1, '2021-05-03', '21:30:00', '2021-04-29 19:21:34'),
(1009, 'Priya Shaw', 'priya124@mail.com', 'M', '2021-03-09', '06290044365', 'Ophthalmologists', 'Abhijeet Chaudhuri', 1, '2021-04-26', '17:30:00', '2021-04-29 20:03:33'),
(1010, 'Sonakshi Sinha', 'sonakshi@mail.com', 'F', '2011-01-04', '06290044365', 'Ophthalmologists', 'Abhijeet Chaudhuri', 1, '2021-05-01', '07:00:00', '2021-04-29 20:12:13'),
(1012, 'Subhadip Dutta', 'subhadipdutta180@gmail.com', 'M', '1998-07-16', '06290044365', 'Allergists', 'Rahul Kar', 2, '2021-05-12', '20:00:00', '2021-04-29 21:01:03'),
(1013, 'Gourab Biswas', 'gourab123@mail.com', 'M', '2021-04-13', '06290044365', 'Allergists', 'Rahul Kar', 2, '2021-04-20', '00:00:00', '2021-04-29 21:02:58'),
(1014, 'Madhurima Das', 'madhu@mail.com', 'F', '2021-04-06', '06290044365', 'Allergists', 'Rahul Kar', 2, '2021-04-14', '20:00:00', '2021-04-29 21:06:43'),
(1015, 'Swapna Dutta', 'subhadipdutta180@gmail.com', 'F', '1951-09-07', '9748059033', 'Ophthalmologists', 'Abhijeet Chaudhuri', 1, '2021-05-24', '17:30:00', '2021-05-03 10:53:46'),
(1016, 'Sudip Dutta', 'subhadipdutta180@gmail.com', 'M', '1951-09-07', '9748059033', 'Ophthalmologists', 'Abhijeet Chaudhuri', 1, '2021-05-29', '17:30:00', '2021-05-03 18:07:51'),
(1017, 'Sundar', 'sunder@mail.com', 'M', '2021-05-05', '6290044365', 'Ophthalmologists', 'Abhijeet Chaudhuri', 1, '2021-05-24', '17:30:00', '2021-05-04 14:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(150) NOT NULL,
  `doc_number` varchar(15) NOT NULL,
  `doc_alt_number` varchar(15) NOT NULL,
  `doc_email` varchar(150) NOT NULL,
  `department` varchar(150) NOT NULL,
  `specialization` varchar(500) NOT NULL,
  `qualification` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`doc_id`, `doc_name`, `doc_number`, `doc_alt_number`, `doc_email`, `department`, `specialization`, `qualification`) VALUES
(1, 'Abhijeet Chaudhuri', '6290044365', '9007175210', 'abhijeet@mail.com', 'Ophthalmologists', 'You call them eye doctors. They can prescribe glasses or contact lenses and diagnose and treat diseases like glaucoma. Unlike optometrists, they’re medical doctors who can treat every kind of eye condition as well as operate on the eyes.', 'MBBS'),
(2, 'Rahul Kar', '1234567890', '1234567890', 'rahul@mail.com', 'Allergists', 'immune system disorders such as asthma, eczema, food allergies, insect sting allergies, and some autoimmune diseases', 'MBBS. MCA, MTECH'),
(3, 'Kelly Bailey', '5489641239', '1256789610', 'KellyBailey@mail.com', 'Anesthesiologists', 'These doctors give you drugs to numb your pain or to put you under during surgery, childbirth, or other procedures. They monitor your vital signs while you’re under anesthesia.', 'MBBS, MTECH'),
(4, 'Robert Moody', '1269734598', '6512397800', 'RobertMoody@mail.com', 'Ophthalmologists', 'You call them eye doctors. They can prescribe glasses or contact lenses and diagnose and treat diseases like glaucoma. Unlike optometrists, they’re medical doctors who can treat every kind of eye cond', 'MBBS'),
(5, 'Misael Armstrong', '4569872360', '4589012369', 'MisaelArmstrong@mail.com', 'Ophthalmologists', 'You call them eye doctors. They can prescribe glasses or contact lenses and diagnose and treat diseases like glaucoma. Unlike optometrists, they’re medical doctors who can treat every kind of eye condition as well as operate on the eyes.', 'MBBS, EYE01, MTECH');

-- --------------------------------------------------------

--
-- Table structure for table `doc_timeslot`
--

CREATE TABLE `doc_timeslot` (
  `timeslot_entry` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(150) NOT NULL,
  `doc_email` varchar(150) NOT NULL,
  `department` varchar(150) NOT NULL,
  `Day` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_timeslot`
--

INSERT INTO `doc_timeslot` (`timeslot_entry`, `doc_id`, `doc_name`, `doc_email`, `department`, `Day`, `time`, `slot`) VALUES
(1, 1, 'Abhijeet Chaudhuri', 'abhijeet@mail.com', 'Ophthalmologists', 'Monday', '07:00:00', 1),
(2, 1, 'Abhijeet Chaudhuri', 'abhijeet@mail.com', 'Ophthalmologists', 'Saturday', '07:00:00', 1),
(3, 1, 'Abhijeet Chaudhuri', 'abhijeet@mail.com', 'Ophthalmologists', 'Monday', '17:30:00', 2),
(4, 1, 'Abhijeet Chaudhuri', 'abhijeet@mail.com', 'Ophthalmologists', 'Monday', '21:30:00', 3),
(5, 2, 'Rahul Kar', 'rahul@mail.com', 'Allergists', 'Wednesday', '07:00:00', 1),
(6, 2, 'Rahul Kar', 'rahul@mail.com', 'Allergists', 'Wednesday', '20:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_db`
--

CREATE TABLE `feedback_db` (
  `comment_id` bigint(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_db`
--

INSERT INTO `feedback_db` (`comment_id`, `full_name`, `user_email`, `comment`, `time`) VALUES
(1, 'Subhadip Dutta', 'subhadipdutta180@gmail.com', 'This is just for testing the feedback form.', '2021-04-13 09:57:48'),
(4, 'Swapna Dutta', 'swapnadutta123.sd@gmail.com', 'This website looks cool.', '2021-04-13 19:24:15'),
(12, 'Shilpa Dutta', 'shilpadutta.sh@gmail.com', 'This website is awesome.', '2021-04-14 10:27:40'),
(15, 'Sudip Dutta', 'sudip@gmail.com', 'This website is becoming outstanding. The max-height property in CSS is used to set the maximum height of a specified element. Authors may use any of the length values as long as they are a positive value. max-height overrides height, but min-height always overrides max-height.', '2021-04-19 11:09:34'),
(16, 'Rahul Kar', 'rahul234.rk@mail.com', 'The max-height property defines the maximum height of an element.\n\nIf the content is larger than the maximum height, it will overflow. How the container will handle the overflowing content is defined by the overflow property.\n\nIf the content is smaller than the maximum height, the max-height property has no effect.\n\nNote: This prevents the value of the height property from becoming larger than max height. The value of the max-height property overrides the height property.', '2021-04-19 11:10:28'),
(17, 'Shibu Das', 'shibu@mail.com', 'The HyperText Markup Language, or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', '2021-04-19 11:11:37'),
(18, 'Purba Das', 'purba123.pd@gmail.com', 'This is awesome.', '2021-04-21 10:43:45'),
(19, 'Sunder', 'sunder@mail.com', 'This is a test.', '2021-06-01 16:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `med_order`
--

CREATE TABLE `med_order` (
  `order_id` bigint(20) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `ph_no` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `img_loc` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `med_order`
--

INSERT INTO `med_order` (`order_id`, `full_name`, `ph_no`, `address`, `email`, `img_loc`, `description`, `time`) VALUES
(1003, 'Swapna Dutta', '9007175210', 'C/32, rabindrapally, kol- 700086, Near Yuabk Sangha Club, PO: Patuli', 'swapnadutta@gmail.com', 'girlpic.png', NULL, '2021-05-04 07:06:26'),
(1004, 'Sunder', '1234567890', 'B/32/A, rabindrapally, kol- 700086', 'subhadipdutta180@gmail.com', 'girlpic.png', 'hello', '2021-06-03 16:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `pathalogy_order`
--

CREATE TABLE `pathalogy_order` (
  `order_id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `ph_no` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `test` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pathalogy_order`
--

INSERT INTO `pathalogy_order` (`order_id`, `full_name`, `ph_no`, `address`, `email`, `test`, `date`, `description`, `time`) VALUES
(1, 'Subhadip Dutta', '06290044365', 'B/32/A, rabindrapally, kol- 700086', 'subhadipdutta180@gmail.com', 'Urinalysis', '2021-05-17', 'Hello, website.', '2021-05-04 11:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `User_Pass` varchar(150) NOT NULL,
  `Time_of_join` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`User_ID`, `User_Name`, `User_Email`, `User_Pass`, `Time_of_join`) VALUES
(2, 'Shilpa Dutta', 'shilpa@mail.com', '$2y$10$2zms3xPVfgnoDikDMSz5Z.s6b0NClsrGicuesAsMA2Lxs9VOhDhuC', '2021-04-19 18:02:14'),
(3, 'Sudip Dutta', 'sudip@mail.com', '$2y$10$FxIr3u9w.6iWTMBxk2weAeDhFfBC8caLmmiow4OlK7Kdcqj0JWySK', '2021-04-21 05:34:42'),
(4, 'Swapna Dutta', 'swapnadutta@mail.com', '$2y$10$l5/7opA13FJ82xedCYmvyu.cukRiO7/ErQW0p5xfaJE3ULSssCWCC', '2021-04-21 09:17:37'),
(5, 'Purba Das', 'purba123.pd@gmail.com', '$2y$10$hZI.lpiXq/Drft8lxAomzufKFF0LWQO1cOjkIuPmnlMIybcly2jB.', '2021-04-21 10:46:52'),
(6, 'Subhadip Dutta', 'subhadipdutta180@gmail.com', '$2y$10$b7crMDEPtW4cynxp2Ajr/e1EIi0uNXEja/RuS/bKN1J6TTmp0l2jy', '2021-06-01 15:51:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_data`
--
ALTER TABLE `appointment_data`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `doc_timeslot`
--
ALTER TABLE `doc_timeslot`
  ADD PRIMARY KEY (`timeslot_entry`);

--
-- Indexes for table `feedback_db`
--
ALTER TABLE `feedback_db`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `med_order`
--
ALTER TABLE `med_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pathalogy_order`
--
ALTER TABLE `pathalogy_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_data`
--
ALTER TABLE `appointment_data`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;

--
-- AUTO_INCREMENT for table `doctor_details`
--
ALTER TABLE `doctor_details`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doc_timeslot`
--
ALTER TABLE `doc_timeslot`
  MODIFY `timeslot_entry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback_db`
--
ALTER TABLE `feedback_db`
  MODIFY `comment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `med_order`
--
ALTER TABLE `med_order`
  MODIFY `order_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `pathalogy_order`
--
ALTER TABLE `pathalogy_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
