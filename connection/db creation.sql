
--
-- Creat Database: rapidjobbs;
--
CREATE DATABASE IF NOT EXISTS rapidjobbs; 
-- --------------------------------------------------------
use rapidjobbs;
--
-- Table structure for table vacancies
--
 
CREATE TABLE IF NOT EXISTS vacancies (
  `vacID` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(20) NOT NULL,
  `vacProfession` varchar(50) NOT NULL,
  `vacPic` varchar(200) NOT NULL,
  PRIMARY KEY (`vacID`)
);

--
-- Dumping data for table `tbl_users`
--

INSERT INTO vacancies (`vacID`, `companyName`, `vacProfession`, `vacPic`) VALUES
(10, 'DirectFN', 'System Engineer', '000000.jpg'),
(11, 'Duo', 'Software Engineer', '000001.jpg'),
(12, 'Pearson', 'QA Engineer', '000002.jpg'),
(13, '99x', 'Business Analyst', '000003.jpg'),
(14, 'IFS', 'Project Manager', '000004.jpg');

CREATE TABLE IF NOT EXISTS apply (
  `appID` int(11) NOT NULL AUTO_INCREMENT,
  `applicantID` int(11) NOT NULL,
  `applicantName` varchar(50) NOT NULL,
  `vacID` int(11) NOT NULL,
  `companyName` varchar(20) NOT NULL,
  `vacProfession` varchar(50) NOT NULL,
  `vacPic` varchar(200) NOT NULL,
  PRIMARY KEY (`appID`)
);

INSERT INTO apply (`applicantID`, `applicantName`, `vacID`, `companyName`,`vacProfession`,`vacPic`) VALUES
(0000, 'Nadana Kodippili','10','DirectFN', 'System Engineer', '000000.jpg');
