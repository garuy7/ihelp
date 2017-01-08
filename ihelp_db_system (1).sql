-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2017 at 06:08 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ihelp_db_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` char(10) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_head` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `department_head`) VALUES
('1001', 'College of Computer Studies (CCS)', 'Ms. Aurora Miro'),
('1002', 'College of Nursing', 'I don''t know');

-- --------------------------------------------------------

--
-- Table structure for table `job_request`
--

CREATE TABLE `job_request` (
  `jo_trans_no` int(11) NOT NULL,
  `jo_date_request` date NOT NULL,
  `jo_user_id` char(10) NOT NULL,
  `jo_building` varchar(255) NOT NULL,
  `jo_problem_type` varchar(255) NOT NULL,
  `jo_quantity` int(11) NOT NULL,
  `jo_description` varchar(255) NOT NULL,
  `jo_purpose` varchar(500) NOT NULL,
  `jo_noted_by` char(10) NOT NULL,
  `jo_date_actioned` date NOT NULL,
  `jo_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_request`
--

INSERT INTO `job_request` (`jo_trans_no`, `jo_date_request`, `jo_user_id`, `jo_building`, `jo_problem_type`, `jo_quantity`, `jo_description`, `jo_purpose`, `jo_noted_by`, `jo_date_actioned`, `jo_status`) VALUES
(1001, '2017-01-02', '123456', 'College of Computer Studies (CCS)', 'Wiring', 1, 'ambot lang unsa ni ngari', 'wa ko kahibaw', '1001', '2017-01-03', 3),
(1002, '2017-01-02', '123456', 'College of Nursing', 'Plumbing', 2, 'fdgfg', 'fghgfhgj', '1001', '0000-00-00', 3),
(1003, '2017-01-02', '123456', 'College of Computer Studies (CCS)', 'Wiring', 2, 'fdgfg', 'fhgjghj', '', '0000-00-00', 2),
(1004, '2017-01-02', '123456', '', '0', 0, '', '', '1001', '0000-00-00', 1),
(1005, '2017-01-02', '123456', '', '0', 0, '', '', '1001', '0000-00-00', 1),
(1006, '2017-01-02', '123456', '', 'Wiring', 2, 'ffghgf', 'dffghg', '1001', '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `p_id` char(10) NOT NULL,
  `p_fname` varchar(255) NOT NULL,
  `p_lname` varchar(255) NOT NULL,
  `p_birthdate` date NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `p_gender` char(1) NOT NULL,
  `p_mob_no` bigint(20) NOT NULL,
  `p_position` varchar(255) NOT NULL,
  `p_build_assign` varchar(255) NOT NULL,
  `p_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`p_id`, `p_fname`, `p_lname`, `p_birthdate`, `p_address`, `p_gender`, `p_mob_no`, `p_position`, `p_build_assign`, `p_status`) VALUES
('1', 'doy doy', 'cosep', '0000-00-00', '', '', 0, 'carpenter', '', 1),
('1001', 'Jane Christy', 'Pensegras', '1993-03-07', 'Mandaue City', 'F', 9322880426, 'carpenter', 'OB', 1),
('123456', 'fdgdfg', 'fdgfghgfh', '2017-01-03', 'fgdfgfdg', 'M', 4654, 'Electrician', 'New Building', 1),
('2', 'abby', 'cosep', '0000-00-00', '', '', 0, 'carpenter', '', 1),
('3', 'carlo', 'cosep', '0000-00-00', '', '', 0, 'carpenter', '', 1),
('4', 'olga', 'cosep', '0000-00-00', '', '', 0, 'painter', '', 1),
('4354', 'gdfgs', 'fgghjghj', '2017-01-03', 'dfgfg', 'M', 234234, 'Janitor', 'NB', 1),
('5', 'jannah', 'cosep', '0000-00-00', '', '', 0, 'painter', '', 1),
('6', 'kerwin', 'cosep', '0000-00-00', '', '', 0, 'painter', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `s_id` char(10) NOT NULL,
  `s_trans_no` char(10) NOT NULL,
  `s_date_scheduled` date NOT NULL,
  `s_scheduled_by` char(10) NOT NULL,
  `s_assigned_to` char(10) NOT NULL,
  `s_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_no_gennerate`
--

CREATE TABLE `trans_no_gennerate` (
  `jo_trans_no_gen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_no_gennerate`
--

INSERT INTO `trans_no_gennerate` (`jo_trans_no_gen`) VALUES
(1000),
(1001),
(1002),
(1003),
(1004),
(1005),
(1006);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` char(10) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_gender` char(1) NOT NULL,
  `user_mobile_no` bigint(20) NOT NULL,
  `user_department` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_about` varchar(1000) NOT NULL,
  `user_saying` varchar(1000) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_fname`, `user_lname`, `user_email`, `user_address`, `user_birthdate`, `user_gender`, `user_mobile_no`, `user_department`, `user_type`, `user_password`, `user_about`, `user_saying`, `user_status`) VALUES
(1, '1001', 'Jane Christy', 'Pensegras', 'yuragaruy@gmail.com', 'Mandaue City', '2009-05-07', 'F', 9322880426, 'Maintenance', 1, '123', 'Hello, My name is Jane Christy I am a Civil Engineer at University of Cebu Lapu-Lapu and Mandaue.', 'Everything that kills me makes me feel alive.', 1),
(2, '123456', 'Raymund', 'Garuy', 'yuragraymund@gmail.com', 'Cebu City', '1994-03-07', 'M', 9322880426, 'College of Computer Studies', 3, '654321', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 1),
(3, '456789', 'Rene Rose', 'Yurag', 'rryurag@gmail.com', 'Lapu-Lapu City', '1990-06-17', 'F', 9322880426, 'College of Nursing', 2, '12345', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 1),
(4, '987654', 'Renel', 'Yurag', 'yuragrenel@gmail.com', 'Lapu-Lapu City', '1988-10-10', 'M', 9227146086, 'College of Computer Studies (CCS)', 3, '123456', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 1),
(5, '09451360', 'Marilou', 'Maglente', 'marilou@gmail.com', 'Mandaue City', '2016-06-06', 'F', 12345678910, 'College of Computer Studies (CCS)', 3, '123456', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 1),
(6, '12345678', 'Georgia', 'Alvarez', 'georgia@gmail.com', 'Mandaue City', '2016-01-01', 'F', 12345678910, 'College of Nursing', 2, '123456', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 1),
(8, '0123456', 'Evander', 'Soco', 'dfdgfdg', 'Mandaue City', '2017-01-02', 'M', 321654, 'College of Computer Studies (CCS)', 2, '123456', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 1),
(9, '456123', '', '', 'mt.yuragraymund@gmail.com', '', '0000-00-00', '', 9322880426, '', 2, '12345', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 2),
(10, '13606512', '', '', 'mt.yuragraymund@gmail.com', '', '0000-00-00', '', 9327274373, '', 3, '12345', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 2),
(11, '8754564', '', '', 'mt.yuragraymund@gmail.com', '', '0000-00-00', '', 9227146086, '', 1, '12345', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 2),
(12, '9874534', '', '', 'mt.yuragraymund@gmail.com', '', '0000-00-00', '', 9227146086, '', 2, '12345', '', '', 2),
(13, '67675345', '', '', 'mt.yuragraymund@gmail.com', '', '0000-00-00', '', 9227146086, '', 2, '12345', '', '', 2),
(14, '2457895`', '', '', 'mt.yuragraymund@gmail.com', '', '0000-00-00', '', 9227146086, '', 3, '12345', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 2),
(15, '56478', '', '', 'mt.yuragraymund@gmail.com', '', '0000-00-00', '', 9227146086, '', 2, '12345', 'State a brief description of yourself by editing your profile.', 'You can also add some sayings here.', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `job_request`
--
ALTER TABLE `job_request`
  ADD PRIMARY KEY (`jo_trans_no`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `trans_no_gennerate`
--
ALTER TABLE `trans_no_gennerate`
  ADD PRIMARY KEY (`jo_trans_no_gen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_no_gennerate`
--
ALTER TABLE `trans_no_gennerate`
  MODIFY `jo_trans_no_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
