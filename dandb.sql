-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 11:17 AM
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
-- Database: `pixel_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `timestamps`, `email`) VALUES
(4, 'sabin', '$2y$10$UT4evKdwWkDxFVey54KHjOINw7DR13P1jxLjWo.Ov35OmIJaPoTh6', '2022-06-30 05:40:55', 'admin@website.com');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `course_title` varchar(250) NOT NULL,
  `course_price` int(11) NOT NULL,
  `course_description` text NOT NULL,
  `course_curriculum_brief` text NOT NULL,
  `course_aim` text NOT NULL,
  `course_objectives` text NOT NULL,
  `course_salient_features` text NOT NULL,
  `course_entry_criteria` text NOT NULL,
  `course_structure_downloadable` text DEFAULT NULL,
  `course_structure_details` text DEFAULT NULL,
  `course_url` varchar(250) NOT NULL,
  `enrollment_count` bigint(20) NOT NULL DEFAULT 0,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_id`, `course_name`, `course_title`, `course_price`, `course_description`, `course_curriculum_brief`, `course_aim`, `course_objectives`, `course_salient_features`, `course_entry_criteria`, `course_structure_downloadable`, `course_structure_details`, `course_url`, `enrollment_count`, `createdat`, `updatedat`) VALUES
(39, 810005664055, 'Computer System Administrator and Developer Course', 'Computer System Administrator and Developer Course', 150000, '<p>Credit Hours: 1320 hours</p><p><strong>Includes :</strong></p><p>Fundamentals of IT Course free</p>', '<p>The competency based and market oriented modular curriculum for &quot;Computer system Administrator and Developer&quot;is designed to produce employable workforce equipped with knowledge, skills and attitudes related to the occupation.</p><p>Once the trainees acquired the competencies they will have ample opportunity for employment through which they will contribute in the national streamline of poverty reduction in the country. The skills and knowledge included in this curriculum improve their knowledge and skills and make them competent Computer system Administrator and Developer needed for the occupation.</p>', '<p>The main aim of this program is to produce employable &quot;Computer system Administrator and Developer&quot; who could provide different services related to the information technology for public and private sectors in the country and abroad.</p>', '<p>After completion of this training, the trainees will be able to implement the knowledge and skills related to the:</p><ol><li>Communication and Employability Skills for IT</li><li>Computer Systems</li><li>Information Systems</li><li>Impace of the use of IT on Business Systems</li><li>Organizational Systems Security</li><li>e-Commerce</li><li>Managing Networks</li><li>Computer Networks</li><li>Systems Analysis and Design</li><li>Event Driven Programming</li><li>Object Oriented Programming</li><li>Database Design</li><li>Client Side Customization of Web Pages</li><li>Data Analysis and Design</li><li>Developing Computer Games</li><li>Human Computer Interaction</li><li>Web Server Scripting</li><li>Website Production</li><li>Digital Graphics</li><li>Computer Animation</li><li>Web Animation for Intera</li></ol>', '<p><strong>Duration</strong>:&nbsp;The total duration of the course extends over 1320 hours.&nbsp;</p><p><strong>Target group</strong>:&nbsp; The target group for this training program will be all interested individuals with educational prerequisite of minimum SLC pass.</p><p><strong>Group size</strong>: The group size of this training program will be maximum 24, provided all necessary resources to practice the tasks/ competencies as specified in this curriculum</p><p><strong>Target location</strong>: The target location of this training program will be all over Nepal.&nbsp;</p><p><strong>Medium of Instruction</strong>: The medium of instruction for this training program will be Nepali or English or both.&nbsp;</p><p><strong>Pattern of attendance</strong>:&nbsp;Trainee should have 90% attendance during the training period to get the certificate.&nbsp;</p><p><strong>Focus of the program</strong>:&nbsp; This is a competency-based modular curriculum. This curriculum emphasizes on competency performance. 65% time is allotted for performance and remaining 35% time is for related technical knowledge. So, the main focus will be on performance of the specified competencies in the curriculum.&nbsp;</p>', '<p><strong>Entry Criteria</strong></p><p>Individuals who meet the following criteria will be allowed to enter this curricular program:</p><p>Minimum of SLC pass</p><p>Nepali citizen</p><p>Minimum of 16 years of age</p><p>Should pass entrance test</p>', '../assets/pdf/courses/2019-07-11_Computer System Administrator and Developer 2014.pdf', '', 'computer-system-administrator-and-developer-course.php', 0, '2022-07-05 05:56:37', '2022-07-05 05:56:37'),
(40, 880734346311, 'Computer Operator Course', 'Computer Operators Course', 20000, '<p>Credit Hours: 220 hours</p><p>Includes :</p><p>Typing Course 15 days free</p><p>&nbsp;</p>', '<p>&quot;Computer Operator&quot; is designed to produce employable workforce equipped with knowledge, skills and attitudes related to the clerical occupation.</p><p>Once the trainees acquired the competencies they will have ample opportunity for wage employment and self-employment through which they will contribute in the national streamline of poverty reduction in the country.</p><p>This curriculum is based on the job required to be performed by a computer operator. This course is designed to equip trainees with knowledge and skills of the field of on basic computer application. This course consists of three sections viz;: SOFTWARE SECTION, HARDWARE SECTION and NETWORK SECTION. Moreover, the SOFTWARE SECTION includes MS DOS, MS Window XP, Windows 7, Windows 8, Word Processing Program, Spreadsheet Program, Presentation Program, Database Program, Photo Editor Program and Email and Internet modules. Trainees will practice &amp; learn skills using computer and peripherals necessary for the program.</p>', '<p>The main aim of this program is to produce employable Computer Operator who could provide clerical services in the government, semi government and private organizations as well as also creates self employment opportunities as well.</p>', '<p>After completion of training the trainees will be able:</p><ol><li>To acquire the Concept of computer fundamentals</li><li>To use MSDOS to edit and run different types of programs</li><li>To Use MS Window XP, Windows 7, Widows 8 to customize your computer and edit, run different types of programs</li><li>To use Word Processing Program to edit, write and publish anything</li><li>To use Spreadsheet Program and keep simple daily transaction in proper way</li><li>To create the slides and show them in desired way using Presentation Program.</li><li>To prepare the required software to calculate and maintain the tables and files using Database Program</li><li>To edit &amp; Design the photo using Photo Editing Program.</li><li>To browse Email and Internet</li><li>To use of computer hardware &amp; Network in office automation</li></ol>', '<p><strong>Duration</strong>:&nbsp;The total duration of the course extends over 220 hours.&nbsp;</p><p><strong>Target group</strong>:&nbsp; The target group for this training program will be all interested individuals in the field computer application; with educational prerequisite of minimum SLC pass.</p><p><strong>Group size</strong>: The group size of this training program will be maximum 20, provided all necessary resources to practice the tasks/ competencies as specified in this curriculum</p><p><strong>Target location</strong>: The target location of this training program will be all over Nepal.&nbsp;</p><p><strong>Medium of Instruction</strong>: The medium of instruction for this training program will be Nepali or English or both.&nbsp;</p><p><strong>Pattern of attendance</strong>:&nbsp;Trainee should have 90% attendance during the training period to get the certificate.&nbsp;</p><p><strong>Focus of the program</strong>:&nbsp; This is a competency-based curriculum. This curriculum emphasizes on competency performance. 75% time is allotted for performance and remaining 25% time is for related technical knowledge. So, the main focus will be on performance of the specified competencies in the curriculum.&nbsp;</p><p><strong>Follow up suggestion</strong>:&nbsp;</p><p><strong>First follow up</strong>: Six months after the completion of the program&nbsp;</p><p><strong>Second follow up</strong>: Six months after the completion of the first follow up&nbsp;</p><p><strong>Follow up cycle</strong>: In a cycle of one year after the completion of the second follow up for five years</p><p><strong>Grading System</strong></p><p>The trainees will be graded as follows based on the marks in percentage secured by them in tests/ evaluations.</p><p><strong>Distinction</strong>: Passed with 80% or above</p><p><strong>First Division</strong>: passed with 75% or above</p><p><strong>Second Division</strong>: passed with 65% or above</p><p><strong>Third Division</strong>: passed with 60% or above&nbsp;</p><p><strong>Certificate requirement</strong>:&nbsp; The related training institute will provide the certificate of&rdquo; Computer Operator (Basic computer Application&quot; to those trainees who successfully complete the prescribed course and conducted evaluation.</p>', '<p><strong>Entry Criteria</strong></p><p>Individuals who meet the following criteria will be allowed to enter this curricular program:</p><p>Minimum of SLC pass</p><p>Nepali citizen</p><p>Minimum of 16 years of age</p><p>Should pass entrance test</p>', '../assets/pdf/courses/Computer Operator, Revised- 2014.pdf', '<p>Module 1: Introduction to Computer</p><p>Module 2: Operating System&nbsp;</p><p>Module 3: Word Processing Program&nbsp;</p><p>Module 5: Spreadsheet Program</p><p>Module 5: Presentation Program</p><p>Module 6: Database Program</p><p>Module 7: Photo Editor Program&nbsp;</p><p>Module 8: Email, Internet &amp; webpage&nbsp;</p><p>Module 9: Computer Hardware &amp; Networking&nbsp;</p><p>Module 10: Computer Security</p><p>Module 10: Entrepreneurship Development</p>', 'computer-operator-course.php', 1, '2022-07-05 06:22:22', '2022-07-05 06:22:22'),
(41, 1706265164404, 'foundation of it course', 'Foundation of IT course', 0, '<p>Credit Hours: 48 hours</p><p><strong>Includes:</strong></p><p>Computer Fundamentals</p><p>Assembling / Dissembling computer parts</p>', '<p>The competency based and market oriented modular curriculum for &quot;Fundamentals of IT&quot; is designed to produce employable workforce equipped with knowledge, skills and attitudes related to the occupation.</p><p>Once the trainees acquired the competencies they will have ample opportunity for employment through which they will contribute in the national streamline of poverty reduction in the country. The skills and knowledge included in this curriculum improve their knowledge and skills and make them competent Computer system Administrator and Developer needed for the occupation.</p>', '<p>The main aim of this program is to provide further help while learning the &quot;Computer system Administrator and Developer&quot; course who could provide different services related to the information technology for public and private sectors in the country and abroad.</p>', '<p>After completion of this training, the trainees will be able to implement the knowledge and skills related to the:</p><ol><li>Commputer Fundamentals</li><li>Assembling / Dissembling Computer Parts</li><li>Opearating System (windows)</li><li>Understanding of windows opearting system</li><li>Microsoft office<ul><li>Microsoft Word</li><li>Microsoft Excel</li><li>Microsoft Powerpoint</li></ul></li><li>Fundamentals of Web<ul><li>HTML</li><li>DHTML</li><li>CSS</li></ul></li><li>Antivirus System, Drivers &amp; Utilities</li><li>Email &amp; Internet</li></ol>', '<p><strong>Duration</strong>:&nbsp;The total duration of the course is included in the 1320 hours of the Computer System Administrator and Developer Course.&nbsp;</p><p><strong>Target group</strong>:&nbsp; The target group for this training program will be all interested individuals with educational prerequisite of minimum SLC pass.</p><p><strong>Group size</strong>: The group size of this training program will be maximum 24, provided all necessary resources to practice the tasks/ competencies as specified in this curriculum</p><p><strong>Target location</strong>: The target location of this training program will be all over Nepal.&nbsp;</p><p><strong>Medium of Instruction</strong>: The medium of instruction for this training program will be Nepali or English or both.&nbsp;</p><p><strong>Pattern of attendance</strong>:&nbsp;Trainee should have 90% attendance during the training period to get the certificate.&nbsp;</p><p><strong>Focus of the program</strong>:&nbsp; This is a competency-based modular curriculum. This curriculum emphasizes on competency performance. 65% time is allotted for performance and remaining 35% time is for related technical knowledge. So, the main focus will be on performance of the specified competencies in the curriculum. &nbsp;</p>', '<p><strong>Entry Criteria</strong></p><p>Individuals who meet the following criteria will be allowed to enter this curricular program:</p><p>Minimum of SEE/SLC pass</p><p>Nepali citizen</p><p>Minimum of 16 years of age</p>', NULL, '', 'foundation-of-it-course.php', 0, '2022-07-05 06:45:44', '2022-07-05 06:45:44'),
(42, 2197873813695, 'typing course', 'Typing Course', 0, '<p>English Typing</p><p>Nepali Typing</p>', '<p>The competency based and market oriented modular curriculum for &quot;Typing Course&quot; is designed to produce employable workforce equipped with knowledge, skills and attitudes related to the occupation.</p><p>Once the trainees acquired the competencies they will have ample opportunity for employment through which they will contribute in the national streamline of poverty reduction in the country. The skills and knowledge included in this curriculum improve their knowledge and skills and make them competent Computer system Administrator and Developer needed for the occupation.</p>', '<p>The main aim of this program is to provide further help while learning the &quot;Computer Operator&quot; course who could provide different services related to the information technology for public and private sectors in the country and abroad.</p>', '<p>After completion of this training, the trainees will be</p><ol><li>Proficient in English Typing</li><li>Proficient in Nepali Typing</li></ol>', '<p><strong>Duration</strong>:&nbsp;The total duration of the course is included in the 1320 hours of the Computer System Administrator and Developer Course.&nbsp;</p><p><strong>Target group</strong>:&nbsp; The target group for this training program will be all interested individuals with educational prerequisite of minimum SLC pass.</p><p><strong>Group size</strong>: The group size of this training program will be maximum 24, provided all necessary resources to practice the tasks/ competencies as specified in this curriculum</p><p><strong>Target location</strong>: The target location of this training program will be all over Nepal.&nbsp;</p><p><strong>Medium of Instruction</strong>: The medium of instruction for this training program will be Nepali or English or both.&nbsp;</p><p><strong>Pattern of attendance</strong>:&nbsp;Trainee should have 90% attendance during the training period to get the certificate.&nbsp;</p><p><strong>Focus of the program</strong>:&nbsp; This is a competency-based modular curriculum. This curriculum emphasizes on competency performance. 65% time is allotted for performance and remaining 35% time is for related technical knowledge. So, the main focus will be on performance of the specified competencies in the curriculum. &nbsp;</p>', '<p><strong>Entry Criteria</strong></p><p>Individuals who meet the following criteria will be allowed to enter this curricular program:</p><p>Minimum of SEE/SLC pass</p><p>Nepali citizen</p><p>Minimum of 16 years of age</p>', NULL, '', 'typing-course.php', 0, '2022-07-05 06:50:27', '2022-07-05 06:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `course_id`, `user_id`, `timestamps`) VALUES
(2, 880734346311, 9, '2022-07-06 08:22:04'),
(4, 2197873813695, 9, '2022-07-06 09:08:22'),
(5, 810005664055, 18, '2022-07-07 08:53:23'),
(6, 880734346311, 18, '2022-07-07 09:05:57'),
(7, 1706265164404, 18, '2022-07-07 09:07:28'),
(8, 2197873813695, 18, '2022-07-07 09:09:35'),
(9, 880734346311, 17, '2022-07-07 09:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `courses_enrolled` varchar(250) NOT NULL,
  `email_confirmation_code` bigint(20) NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `date_of_birth`, `gender`, `username`, `courses_enrolled`, `email_confirmation_code`, `email_verified`, `created_at`, `modified_at`) VALUES
(3, 'sabin baniya', 'dummyml@tutanota.de', '9806542271', '$2y$10$zo7ItM7s0.0Gpf4hwPqz6ef4FnQN2QvwZAyFtDCO6ih', '2014-06-19', 'male', 'ihihi123', '', 0, 0, '2022-06-26 10:37:36', '2022-06-26 10:37:36'),
(4, 'sabin baniya', 'hi@as.com', '9806542271', '$2y$10$utqLK8F3RfPXGBfbRzD6DOxT617BKHNjipPt9Pf5DCe', '2014-06-20', 'male', 'isabin2', '', 0, 0, '2022-06-26 10:44:19', '2022-06-26 10:44:19'),
(5, 'Kamal Prasad Poudel', 'femohi5193@sofrge.com', '1234567890', '$2y$10$0LFIh/M0YNgWM7gFNjcR7OicLEshjolQDX9fvoymThj', '2014-06-21', 'male', 'mehoi', '', 0, 0, '2022-06-26 10:45:29', '2022-06-26 10:45:29'),
(6, 'Kamal Prasad Poudel', 'femohi125193@sofrge.com', '1234567890', '$2y$10$k.cZibFgHhsv3FLpOcpGH.rcE7tE2My6Hs40WLGZG74', '2014-06-20', 'male', 'mehoi21', '', 0, 0, '2022-06-26 10:46:23', '2022-06-26 10:46:23'),
(7, 'Kamal Prasad Poudel', 'sabinbaniy@gmail.com', '1234567890', '$2y$10$jUngKMDZQ1V3Knbi04WpF.I1253PBRiVebLv.tKvvmU', '2014-06-20', 'male', 'sabinbaniya', '', 0, 0, '2022-06-26 10:47:14', '2022-06-26 10:47:14'),
(8, 'sabin baniya', 'sabin@sabin.com', '1234567890', '$2y$10$NUAFPF4mUdw2G3Pd94oGC.tPl6S1xXon9PcFC9mCEp5', '2014-06-26', 'male', 'sabin123', '', 0, 0, '2022-06-26 10:55:01', '2022-06-26 10:55:01'),
(9, 'sabin baniya', 'baniyasabin3669@gmail.com', '1234567890', '$2y$10$1gQyxiTIxBJAbUjseLIITO.SvgHEW8v.vUxEN1bV5.bJMiqH.tPDq', '2014-06-19', 'male', 'baniyasabin', '', 0, 0, '2022-06-26 11:03:45', '2022-06-26 11:03:45'),
(17, 'Sabin Baniya', 'dummymail@tutanota.de', '9806542271', '$2y$10$SCbI9gdZCjweaagJZF6tP.1GNfBWQDzAP2f43TuboIHMhtY.KUPXG', '2014-07-07', 'male', 'sabin', '1', 870818734840, 1, '2022-07-07 06:13:22', '2022-07-07 06:13:22'),
(18, 'Jhon Doe', 'baniya.sabinn@gmail.com', '0000000000', '$2y$10$HSjZiNgI23exr8bURlkHCuZfXATqgUccsrwVBrGUnpxlOsDnIEuPi', '2014-07-07', 'male', 'jhon', '', 248721846411, 1, '2022-07-07 08:51:17', '2022-07-07 08:51:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_id` (`course_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
