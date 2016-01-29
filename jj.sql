-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2016 at 08:59 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jj`
--

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE IF NOT EXISTS `enroll` (
  `jid` int(11) NOT NULL,
  `hid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`jid`, `hid`) VALUES
(4, 2),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE IF NOT EXISTS `hire` (
`hid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `desc` varchar(70) NOT NULL,
  `details` varchar(300) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `poster` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`hid`, `title`, `desc`, `details`, `mob`, `poster`) VALUES
(1, 'Web Developer', 'Experienced Web Developer well versed in JS frameworks', 'Worked on front-end frameworks like Angular JS, Twitter Bootstrap, Jquery and back-end tools like Django, Node JS and PHP. Skilled and Creative with 4 years of experience.', 9876543210, 2),
(2, 'Project & Risk Manager', ' Attended Seminars, Risk Based Analysis on Project & Risk Management.', 'Overall 11 years of experience in CDM, L&D, Projects Service Delivery, Quality, Metrics & Process Improvements, Project & Resource Management (Quintiles).  Attended Seminars and Risk Based Analysis on Project Management & Risk Management in UK (Edinburgh) .', 8975642310, 2),
(3, 'Assistant Manager IT', 'Executive MBA in IT & Operations in Business Management.', 'As an IT Project Manager, building, managing and motivating high-performing, delivery-focused technology teams to IT team. Develop, maintain and monitor IT capital and expense budgeting and planning for infrastructure. Preparing Standard Operating Procedures /Work Instructions for the processes. ', 7984651320, 2),
(4, 'Assistant Professor', 'Department of Biotechnology, Indian Academy Degree College.', 'Genomics and Proteomics, Animal Biotechnology, Molecular Genetics and Biotechnology, Molecular biology, Molecular medicine, Genetic Engineering, Immunology, Human Biotechnology and Plant Biotechnology.', 8795462130, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
`jid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `desc` varchar(70) NOT NULL,
  `details` varchar(300) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `poster` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jid`, `title`, `desc`, `details`, `mob`, `poster`) VALUES
(1, 'MBA Graduate Required', 'Fresher/Experienced candidate to handle Accounts of MNC', 'MBA graduate with specialization in Accounts/Finance required to handle the accounts and finances of the organization. Training will be given, if well performed in training, will be hired. Stipend during training is Rs.25,000/-. CTC after recruitment will be mentioned in offer letter after training.', 9999999999, 3),
(3, 'Technical Account Manager ', 'BS or MS degree in Computer Science or related major.', 'We are looking for a web savvy, energetic, and motivated individual to help our clients and prospect clients with their performance monitoring and optimization need. This individual must have the passion and energy to work in an entrepreneurial and fast paced environment. ', 9998887776, 3),
(4, 'Quality Assurance Manager', 'BS Computer Science, Information Systems Management or similar.', 'The main responsibilities of the position require assuring a consistent quality of our software product by enforcing best testing practices and processes, managing and growing the team, and providing guidance and leadership.', 9988776655, 3),
(6, 'Software Engineer', 'BE Graduate in CS/IS  Fresher/Experienced.', 'azbfclksnlkcn', 8562369745, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`uno` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `utype` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uno`, `uname`, `pwd`, `utype`) VALUES
(0, 'd@d.d', 'd', 3),
(1, 'a@a.a', 'a', 5),
(2, 'c@c.c', 'c', 3),
(3, 'b@b.b', 'b', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
 ADD PRIMARY KEY (`jid`,`hid`), ADD KEY `hid` (`hid`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
 ADD PRIMARY KEY (`hid`), ADD UNIQUE KEY `mob` (`mob`), ADD KEY `poster` (`poster`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
 ADD PRIMARY KEY (`jid`), ADD UNIQUE KEY `mob` (`mob`), ADD KEY `poster` (`poster`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`uno`), ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `uno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`jid`) REFERENCES `jobs` (`jid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`hid`) REFERENCES `hire` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hire`
--
ALTER TABLE `hire`
ADD CONSTRAINT `hire_ibfk_1` FOREIGN KEY (`poster`) REFERENCES `user` (`uno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`poster`) REFERENCES `user` (`uno`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
