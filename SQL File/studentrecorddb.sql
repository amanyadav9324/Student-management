SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `student`  
--

-- --------------------------------------------------------

--
--
--  Login table 
CREATE TABLE users (
    username VARCHAR(100) PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Table structure for table `cities`
CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `course`, `subject`, `fname`, `mname`, `lname`, `gender`, `gname`, `ocp`, `income`, `category`, `pchal`, `nationality`, `mobno`, `emailid`, `country`, `state`, `dist`, `padd`, `cadd`, `board`, `roll`, `pyear`, `sub`, `marks`, `fmarks`, `board1`, `roll1`, `yop1`, `sub1`, `session`, `marks1`, `fmarks1`, `regno`, `regdate`) VALUES
(1, '3', 'C Language+Operating System+ Data Structure', 'Anuj', '', 'Kumar', 'Male', 'Rahul', 'Service', '500000', 'obc', 'no', 'Indian', '1234567890', 'ak30@gmail.com', '101', '38', 'Ghaziabad', 'A123 XYZ Apartment GHZB UP 201017', 'A123 XYZ Apartment GHZB UP 201017', '10 UP Board', '123456', '2015', '10 PCM', 450, 500, '12 CBSE', '112233', '2017', '12 PCM', '2023-2024', '400', '600', '3982596902', '2024-02-15 16:25:55'),
(3, '4', 'C Language+Software Engineering+ Discrete Mathematics ', 'Rahul', 'Kumar', 'Singh', 'Male', 'Balved Singh', 'Pvt. Job.', '700000', 'general', 'no', 'Indian', '1231231234', 'rahul@gmail.com', '101', '10', 'New Delhi', 'H no 18 Mayur Vihar Phase 1 New Delhi-110092', 'H no 18 Mayur Vihar Phase 1 New Delhi-110092', '10 CBSE', '23213', '2018', 'PCM', 500, 600, '12 CBSE', '325435', '2020', 'PCM', '2023-2024', '486', '500', '3485082443', '2024-02-17 17:00:52'),
(5, '9', 'History+Geography + Sociology ', 'Garim', '', 'Singh', 'female', 'Ram Singh', 'Govt Job', '700000', 'obc', 'no', 'Indian', '4525631456', 'gr@gmail.com', '101', '10', 'New Delhi', '#122 ABC Apartment Laxmi Nagar New Delhi-110092', '#122 ABC Apartment Laxmi Nagar New Delhi-110092', '10 CBSE', '25534', '2016', 'PCM', 452, 500, '12 CBSE', '46474', '2018', 'PCM', '2023-2024', '567', '650', '6214384819', '2024-02-18 01:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `postingdate` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `postingdate`, `status`) VALUES
(8, '2017-2018', '2024-02-15', 0),
(9, '2018-2019', '2024-02-15', 0),
(10, '2019-2020', '2024-02-15', 0),
(11, '2020-2021', '2024-02-15', 0),
(12, '2021-2022', '2024-02-15', 0),
(13, '2022-2023', '2024-02-15', 0),
(14, '2023-2024', '2024-02-15', 1),
(15, '2024-2025', '2024-02-15', 0),
(16, '2025-2026', '2024-02-15', 0),
(17, '2026-2027', '2024-02-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`;
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `cshort` varchar(50) DEFAULT NULL,
  `cfull` varchar(250) DEFAULT NULL,
  `sub1` varchar(250) DEFAULT NULL,
  `sub2` varchar(250) DEFAULT NULL,
  `sub3` varchar(250) DEFAULT NULL,
  `sub4` varchar(255) DEFAULT NULL,
  `dt_created` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` varchar(200) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject`;
--

INSERT INTO `subject` (`subid`, `cshort`, `cfull`, `sub1`, `sub2`, `sub3`, `sub4`, `dt_created`, `update_date`) VALUES
(1, '3', 'Bachelor of Technology', 'C Language', 'Operating System', 'Data Structure', 'Mathmatics', '2024-02-15 17:23:31', NULL),
(2, '5', 'Bachelor of Arts', 'English', 'Sociology', 'Philosophy', 'History', '2024-02-16 11:43:21', NULL),
(4, '4', 'Bachelor of Computer Application', 'C Language', 'Software Engineering', 'Discrete Mathematics ', 'Computer Networks', '2024-02-16 22:27:14', NULL),
(5, '9', 'Master of Arts', 'History', 'Geography ', 'Sociology ', 'English', '2024-02-16 07:24:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`;
--

CREATE TABLE `tbl_course` (
  `cid` int(11) NOT NULL,
  `cshort` varchar(250) DEFAULT NULL,
  `cfull` varchar(250) DEFAULT NULL,
  `cdate` varchar(50) DEFAULT NULL,
  `update_date` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`cid`, `cshort`, `cfull`, `cdate`, `update_date`) VALUES
(1, 'MCA', 'MASTER OF COMPUTER APPLICATION', '15-02-2024', NULL),
(3, 'B.Tech', 'Bachelor of Technology', '15-02-2024', NULL),
(4, 'BCA', 'Bachelor of Computer Application', '15-02-2024', NULL),
(5, 'BA', 'Bachelor of Arts', '15-02-2024', NULL),
(9, 'MA', 'Master of Arts', '15-02-2024', NULL),
(2, 'BSC', 'Bachelor of Science', '15-02-2025', NULL);

-- --------------------------------------------------------
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`cid`);

--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
