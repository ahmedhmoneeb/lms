-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2017 at 01:57 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.20-2~ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `announcement_class_id` varchar(255) NOT NULL,
  `announcement_teacher_id` varchar(255) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_description` varchar(255) NOT NULL,
  `announcement_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `announcement_class_id`, `announcement_teacher_id`, `announcement_title`, `announcement_description`, `announcement_date`) VALUES
(1, '12', '6', 'Announcement for Class BSIS - 3A', 'Announcement for Class BSIS - 3A', '25 May,2016');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `assignment_title` varchar(255) NOT NULL,
  `assignment_filename` varchar(255) NOT NULL,
  `assignment_description` varchar(255) NOT NULL,
  `assignment_teacher_id` varchar(255) NOT NULL,
  `assignment_class_id` varchar(255) NOT NULL,
  `assignment_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `assignment_title`, `assignment_filename`, `assignment_description`, `assignment_teacher_id`, `assignment_class_id`, `assignment_date`) VALUES
(33, 'File Normalizations', '9599761392935355828.pdf', 'File Normalizations', '6', '12', '21 January,2014'),
(34, 'Assignment For Class BSIS 4B', 'DownloadFile.pdf', 'Assignment For Class BSIS 4B', '6', '8', '11 May,2016');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Allahabad'),
(2, 'Varanasi');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_title` varchar(100) NOT NULL,
  `class_description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_title`, `class_description`) VALUES
(7, 'BSIS-4A', 'BSIS-4A Class'),
(8, 'BSIS-4B', 'BSIS-4B Class'),
(12, 'BSIS-3A', 'BSIS-3A Class'),
(13, 'BSIS-3B', 'BSIS-3B Class'),
(14, 'BSIS-3C', 'BSIS-3C Class');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'India'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_total_semestor` varchar(255) NOT NULL,
  `course_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_total_semestor`, `course_description`) VALUES
(1, 'DCST', '6', 'Diploma in Computer Science and Technology'),
(3, 'BCA', '6', 'Bachlore in Computer Application'),
(4, 'MCA', '6', 'Master in Computer Application'),
(5, 'PGDCA', '2', 'Post Graducate Diploma in Compter Application');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_title` varchar(255) NOT NULL,
  `department_description` varchar(255) NOT NULL,
  `department_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_title`, `department_description`, `department_code`) VALUES
(4, 'College of Industrial Technology', 'College of Industrial Technology', 'COM'),
(5, 'Science Department', 'Science Department', 'Science'),
(6, 'School of Arts and Science', 'School of Arts and Science', 'SAS'),
(7, 'College of Education', 'College of Education', 'CE');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_class_id` varchar(255) NOT NULL,
  `event_teacher_id` varchar(255) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_description` text NOT NULL,
  `event_date_start` varchar(100) NOT NULL,
  `event_date_end` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_class_id`, `event_teacher_id`, `event_title`, `event_description`, `event_date_start`, `event_date_end`) VALUES
(18, '13', '4', 'Convocation of Year 2012-2015', 'Convocation of Year 2012-2015', '3 May,2016', '6 May,2016'),
(19, '12', '6', 'New Year Celebration', 'New Year Celebration', '11 May,2016', '19 May,2016');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `exam_title` varchar(255) NOT NULL,
  `exam_etype_id` varchar(255) NOT NULL,
  `exam_month_id` varchar(255) NOT NULL,
  `exam_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_title`, `exam_etype_id`, `exam_month_id`, `exam_description`) VALUES
(1, 'Semestor 1 Exam', '1', '3', 'Exam');

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `etype_id` int(11) NOT NULL,
  `etype_title` varchar(255) NOT NULL,
  `etype_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`etype_id`, `etype_title`, `etype_description`) VALUES
(1, 'Final Year Exam', 'Final Year Exam');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `files_id` int(11) NOT NULL,
  `files_title` varchar(255) NOT NULL,
  `files_class_id` varchar(255) NOT NULL,
  `files_teacher_id` varchar(255) NOT NULL,
  `files_filename` varchar(255) NOT NULL,
  `files_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`files_id`, `files_title`, `files_class_id`, `files_teacher_id`, `files_filename`, `files_description`) VALUES
(2, 'Files for BSIS - 3A ', '12', '6', 'Best Keyword Cover Search.pdf', 'Files for BSIS - 3A '),
(3, 'Files for BSIS - 3B', '13', '6', 'DownloadFile (3).pdf', 'Files for BSIS - 3B');

-- --------------------------------------------------------

--
-- Table structure for table `login_level`
--

CREATE TABLE `login_level` (
  `level_id` int(11) NOT NULL,
  `level_title` varchar(255) NOT NULL,
  `level_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `marks_id` int(11) NOT NULL,
  `marks_exam_id` varchar(255) NOT NULL,
  `marks_student_id` varchar(255) NOT NULL,
  `marks_subject_id` varchar(255) NOT NULL,
  `marks_written` varchar(255) NOT NULL,
  `marks_practical` varchar(255) NOT NULL,
  `marks_semestor_id` varchar(255) NOT NULL,
  `marks_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`marks_id`, `marks_exam_id`, `marks_student_id`, `marks_subject_id`, `marks_written`, `marks_practical`, `marks_semestor_id`, `marks_description`) VALUES
(2, '1', '1', '1', '97', '49', '1', 'C Language and Prgramming Language Marks'),
(3, '1', '1', '2', '78', '65', '4', 'Advance Prgramming in C'),
(4, '1', '1', '6', '67', '87', '4', 'CAD paper'),
(5, '1', '1', '4', '86', '68', '4', 'RDBMS Written and Practical Language'),
(6, '1', '1', '5', '75', '54', '4', 'VB.Net Paper');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_sender_id` varchar(255) NOT NULL,
  `message_receiver_id` varchar(255) NOT NULL,
  `message_type` varchar(255) NOT NULL,
  `message_sender_type` varchar(255) NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_subject` text NOT NULL,
  `message_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_sender_id`, `message_receiver_id`, `message_type`, `message_sender_type`, `message_date`, `message_subject`, `message_content`) VALUES
(1, '6', '6', '2', '2', '2016-05-02 18:50:35', 'Message to Amit', 'sdfasdf'),
(2, '6', '4', '2', '2', '2016-05-03 10:56:18', 'Test Message', 'This is the test message'),
(3, '6', '6', '2', '2', '2016-05-03 10:57:22', 'Class Enquiry', 'asdf'),
(4, '6', '4', '2', '2', '2016-05-03 10:57:48', 'Assignments Update', 'asdf'),
(6, '1', '4', '2', '3', '2016-05-03 11:10:23', 'Class Change Notice', 'Message to Atul Kumar'),
(7, '1', '6', '3', '3', '2016-05-03 11:10:41', 'Event Details', 'Message to Sunil Singh'),
(8, '6', '1', '3', '2', '2016-05-03 12:15:40', 'Update on Assignments', 'This is message line1.\r\nThis is message line2.\r\nThis is message line3.\r\nThis is message line4.'),
(9, '6', '1', '3', '2', '2016-05-03 12:17:15', 'New Announcements', 'This is message line1.\r\nThis is message line2.\r\nThis is message line3.\r\nThis is message line4.'),
(10, '6', '6', '2', '2', '2016-05-04 12:31:56', 'Test Message', 'Test Message');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `month_id` int(11) NOT NULL,
  `month_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`month_id`, `month_title`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `student_id` int(11) NOT NULL,
  `q1` varchar(20) NOT NULL,
  `q2` varchar(20) NOT NULL,
  `q3` varchar(20) NOT NULL,
  `q4` varchar(20) NOT NULL,
  `q5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`student_id`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES
(1, 'a', 'b', 'a', 'b', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_class_id` varchar(255) NOT NULL,
  `quiz_teacher_id` varchar(255) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `quiz_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_class_id`, `quiz_teacher_id`, `quiz_title`, `quiz_description`) VALUES
(2, '12', '6', 'Quiz for Class BSIS-3A First Year ', 'Quiz for Class BSIS-3A First Year '),
(3, '12', '6', 'Java Quiz', 'Quiz 2');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `qq_id` int(11) NOT NULL,
  `qq_quiz_id` varchar(100) NOT NULL,
  `qq_question` text NOT NULL,
  `qq_option1` varchar(500) NOT NULL,
  `qq_option2` varchar(500) NOT NULL,
  `qq_option3` varchar(500) NOT NULL,
  `qq_option4` varchar(500) NOT NULL,
  `qq_correct` varchar(500) NOT NULL,
  `qq_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`qq_id`, `qq_quiz_id`, `qq_question`, `qq_option1`, `qq_option2`, `qq_option3`, `qq_option4`, `qq_correct`, `qq_description`) VALUES
(2, '2', 'int stands for in PHP ?', 'Integer', 'Integrated', 'Init', 'Insert', 'Integer', 'int stands for in PHP ?'),
(3, '3', 'What is an applet?', 'An applet is a Java program that runs in a Web browser.', 'Applet is a standalone java program.', 'Applet is a tool.', 'Applet is a run time environment.   Show Answer', 'An applet is a Java program that runs in a Web browser.', 'What is an applet?'),
(4, '2', 'What is full form of PHP ?', 'Hyper text PHP', 'PHP Hyper Text', 'Pharmacy Photon', 'Personal Home Page', 'Personal Home Page', 'Personal Home Page'),
(5, '2', 'All variables in PHP start with which symbol?', '&', '!', '$', '=', '$', 'All variables in PHP start with which symbol?'),
(6, '2', 'How do you write "Hello World" in PHP', 'Document.Write("Hello World");', '"Hello World";', 'echo "Hello World";', 'count  "Hello World";', 'echo "Hello World";', 'How do you write "Hello World" in PHP'),
(7, '2', 'What is the correct way to end a PHP statement?', 'New line', ':', ';', 'Enld', ';', 'What is the correct way to end a PHP statement?'),
(8, '3', 'What is correct syntax for main method of a java class?', 'public static int main(String[] args)', 'public int main(String[] args)', 'public static void main(String[] args)', 'None of the above.', 'public static void main(String[] args)', 'What is correct syntax for main method of a java class?'),
(9, '3', 'Method Overloading is an example of', 'Static Binding.', 'Static Binding.  B - Dynamic Binding.', 'Both of the above.', 'None of the above.   Show Answer', 'Static Binding.', 'Method Overloading is an example of'),
(10, '3', ' In which case, a program is expected to recover?', 'If an error occurs.', 'If an exception occurs.', 'Both of the above.', 'None of the above.', 'If an exception occurs.', ' In which case, a program is expected to recover?');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `qr_id` int(11) NOT NULL,
  `qr_quiz_id` varchar(255) NOT NULL,
  `qr_student_id` varchar(255) NOT NULL,
  `qr_total_question` varchar(255) NOT NULL,
  `qr_answer` varchar(255) NOT NULL,
  `qr_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`qr_id`, `qr_quiz_id`, `qr_student_id`, `qr_total_question`, `qr_answer`, `qr_date`) VALUES
(1, '2', '1', '5', '3', '2016-05-04 23:59:59'),
(2, '3', '1', '4', '1', '2016-05-07 12:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'Professor'),
(3, 'Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `syear_id` int(11) NOT NULL,
  `syear_title` varchar(255) NOT NULL,
  `syear_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`syear_id`, `syear_title`, `syear_description`) VALUES
(2, '2011-2012', '2011-2012 Academic Year'),
(3, '2012-2013', '2012-2013 Academic Year'),
(4, '2013-2014', '2013-2014 Year Session');

-- --------------------------------------------------------

--
-- Table structure for table `semestor`
--

CREATE TABLE `semestor` (
  `semestor_id` int(11) NOT NULL,
  `semestor_title` varchar(255) NOT NULL,
  `semestor_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semestor`
--

INSERT INTO `semestor` (`semestor_id`, `semestor_title`, `semestor_description`) VALUES
(1, 'Semester 1', 'Semestor 1'),
(2, 'Semester 2', 'Semester 2'),
(4, 'Semester 3', ''),
(5, 'Semester 4', ''),
(6, 'Semester 5', ''),
(7, 'Semester 6', ''),
(8, 'Semester 7', ''),
(9, 'Semester 8', '');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'UP'),
(2, 'MP');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_course_id` varchar(255) NOT NULL,
  `student_rollno` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_father_name` varchar(255) NOT NULL,
  `student_dob` varchar(255) NOT NULL,
  `student_mobile` varchar(255) NOT NULL,
  `student_photo` varchar(255) NOT NULL,
  `student_details` varchar(500) NOT NULL,
  `student_username` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `questionnaire` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_course_id`, `student_rollno`, `student_name`, `student_father_name`, `student_dob`, `student_mobile`, `student_photo`, `student_details`, `student_username`, `student_password`, `questionnaire`) VALUES
(1, '12', '100011', 'Kaushal Kishore', 'Sumit Kumar', '1 January, 1990', '987654343', 'IMG_5748.jpg', '', 'student', 'test', 0),
(3, '1', '100112', 'Sunil Singh', 'Anil Singh', '12 January, 1992', '9898786756', 'IMG_5748.jpg', 'Sunil Singh', '', '', 0),
(5, '13', '123456', 'Jay Kumar', 'Kaushal Kishore', '14 May,2016', '9876787654', 'Login Page.png', 'Jay Kumar', 'jay', 'test', 0),
(6, '12', 'asdf', 'asdfsad', 'sadf', 'asfdg', 'dsfg', 'Cover.jpg', 'sdfg', 'dsaf', 'aaaa', 0),
(7, '12', 'ssd', 'afnan', 'sddcx', '14 June,2017', 'dfd', '', 'df', 'afnan', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_class_id` varchar(255) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `subject_description` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_class_id`, `subject_code`, `subject_title`, `subject_description`) VALUES
(14, '7', 'IS 411A', 'Senior Systems Project 1', '<p><span style="font-size: medium;"><em>About the Subject</em></span></p>\r\n<p>This subject comprisea topics about systems development, SDLC methodologies, Conceptual Framework, diagrams such as DFD, ERD and Flowchart and writing a thesis proposal.</p>\r\n<p>Â </p>\r\n<p>The project requirement for this subject are:</p>\r\n<p>Chapters (1-5) Thesis Proposal</p>\r\n<p>100% Running System at the end of semester</p>\r\n<p>Â </p>'),
(15, '7', 'IS 412', 'Effective Human Communication for IT Professional', '<p><span style="font-size: medium;"><em>About the Subject</em></span></p>\r\n<p>This subject is intended for IT students to develop or enhance communication skills that will be beneficial especially when used in the business industry. The lesson includes Verbal Communication (Written and Oral), Non-verbal Communication, etc.</p>'),
(16, '7', 'IS 311', 'Programming Languages', '<pre class="coursera-course-heading" data-msg="coursera-course-about"><span style="font-size: medium;"><em>About the Subject</em></span></pre>\r\n<div class="coursera-course-detail" data-user-generated="data-user-generated">Learn many of the concepts that underlie all programming languages. Develop a programming style known as functional programming and contrast it with object-oriented programming. Through experience writing programs and studying three different languages, learn the key issues in designing and using programming languages, such as modularity and the complementary benefits of static and dynamic typing. This course is neither particularly theoretical nor just about programming specifics &ndash; it will give you a framework for understanding how to use language constructs effectively and how to design correct and elegant programs. By using different languages, you learn to think more deeply than in terms of the particular syntax of one language. The emphasis on functional programming is essential for learning how to write robust, reusable, composable, and elegant programs &ndash; in any language.</div>\r\n<h2 class="coursera-course-detail" data-user-generated="data-user-generated">&nbsp;</h2>\r\n<pre class="coursera-course-detail" data-user-generated="data-user-generated"><span style="font-size: medium;"><em>&nbsp;Course Syllabus</em></span></pre>\r\n<div class="coursera-course-detail" data-user-generated="data-user-generated">\r\n<ul>\r\n<li>Syntax vs. semantics vs. idioms vs. libraries vs. tools</li>\r\n<li>ML basics (bindings, conditionals, records, functions)</li>\r\n<li>Recursive functions and recursive types</li>\r\n<li>Benefits of no mutation</li>\r\n<li>Algebraic datatypes, pattern matching</li>\r\n<li>Tail recursion</li>\r\n<li>First-class functions and function closures</li>\r\n<li>Lexical scope</li>\r\n<li>Equivalence and effects</li>\r\n<li>Parametric polymorphism and container types</li>\r\n<li>Type inference</li>\r\n<li>Abstract types and modules</li>\r\n<li>Racket basics</li>\r\n<li>Dynamic vs. static typing</li>\r\n<li>Implementing languages, especially higher-order functions</li>\r\n<li>Macro</li>\r\n<li>Ruby basics</li>\r\n<li>Object-oriented programming</li>\r\n<li>Pure object-orientation</li>\r\n<li>Implementing dynamic dispatch</li>\r\n<li>Multiple inheritance, interfaces, and mixins</li>\r\n<li>OOP vs. functional decomposition and extensibility</li>\r\n<li>Subtyping for records, functions, and objects</li>\r\n<li>Subtyping</li>\r\n<li>Class-based subtyping</li>\r\n<li>Subtyping vs. parametric polymorphism; bounded polymorphism</li>\r\n</ul>\r\n</div>'),
(17, '7', 'IS 413', 'Introduction to the IM Professional and Ethics', '<p>This subject discusses about Ethics, E-Commerce, Cybercrime Law, Computer Security, etc.</p>'),
(22, '8', 'IS 221', 'Application Development', ''),
(23, '8', 'IS 222', 'Network and Internet Technology', ''),
(24, '8', 'IS 223', 'Business Process', ''),
(25, '8', 'IS 224', 'Discrete Structures', ''),
(26, '8', 'IS 227', 'IS Programming 2', ''),
(27, '12', 'SS POL GOV', 'Politics and Governance with Philippine Constitution', ''),
(28, '12', 'LIT 1', 'Philippine  Literature', ''),
(29, '12', 'ACCTG 2', 'Fundamentals of Accounting 2', ''),
(30, '13', 'PE 4', 'Team Sports', ''),
(31, '13', 'IS 302', 'Survey of Programming Languages', ''),
(32, '13', 'IS 303', 'Structured Query Language', ''),
(33, '13', 'IS 321', 'Information System Planning', ''),
(34, '13', 'IS 322', 'Management of Technology', ''),
(35, '7', 'IS 323', 'E-commerce Strategy Architectural', ''),
(36, '14', 'IS 324', 'System Analysis and Design', ''),
(37, '14', 'Law 1', 'Law on Obligation and Contracts', ''),
(38, '14', 'Philo 1', 'Social Philosophy & Logic', ''),
(39, '14', 'MQTB', 'Quantitative Techniques in Business', ''),
(40, '14', 'RIZAL', 'Rizal: Life and Works', '<p>COURSE OUTLINE<br />\r\n1. Course Code : RIZAL</p>\r\n\r\n<p>2. Course Title &nbsp;: RIZAL (Rizal Life and Works)<br />\r\n3. Pre-requisite : none<br />\r\n5. Credit/ Class Schedule : 3 units; 3 hrs/week<br />\r\n6. Course Description&nbsp;<br />\r\n1. A critical analysis of Jose Rizal&rsquo;s life and ideas as reflected in his biography, his novels Noli Me Tangere and El Filibusterismo and in his other writings composed of essays and poems to provide the students a value based reference for reacting to certain ideas and behavior.<br />\r\n<br />\r\n<strong>PROGRAM OBJECTIVES</strong><br />\r\n1. To instill in the students human values and cultural refinement through the humanities and social sciences.<br />\r\n2. To inculcate high ethical standards in the students through its integration in the learning activities.<br />\r\n3. To have critical studies and discussions why Rizal is made the national hero of the Philippines.<br />\r\n<br />\r\nTOPICS:&nbsp;<br />\r\n1. A Hero is Born&nbsp;<br />\r\n2. Childhood Days in Calamba<br />\r\n3. School Days in Binan<br />\r\n4. Triumphs in the Ateneo<br />\r\n5. At the UST<br />\r\n6. In Spain<br />\r\n7. Paris to Berlin<br />\r\n8. Noli Me Tangere<br />\r\n9. Elias and Salome<br />\r\n10. Rizal&rsquo;s Tour of Europe with with Viola<br />\r\n11. Back to Calamba<br />\r\n12. HK, Macao and Japan<br />\r\n13. Rizal in Japan<br />\r\n14. Rizal in America<br />\r\n15. Life and Works in London<br />\r\n16. In Gay Paris<br />\r\n17. Rizal in Brussles<br />\r\n18. In Madrid<br />\r\n19. El Filibusterismo<br />\r\n20. In Hong Kong<br />\r\n21. Exile in Dapitan<br />\r\n22. The Trial of Rizal<br />\r\n23. Martyrdom at Bagumbayan<br />\r\n<br />\r\nTextbook and References:<br />\r\n1. Rizal&rsquo;s Life, Works and Writings (The Centennial Edition) by: Gregorio F. Zaide<br />\r\nand Sonia M. Zaide Quezon City, 1988. All Nations Publishing Co.<br />\r\n2. Coates, Austin. Rizal: First Filipino Nationalist and Martyr, Quezon City, UP Press 1999.<br />\r\n3. Constantino, Renato. Veneration Without Understanding. Quezon City, UP Press Inc., 2001.<br />\r\n4. Dela Cruz, W. &amp; Zulueta, M. Rizal: Buhay at Kaisipan. Manila, NBS Publications 2002.<br />\r\n5. Ocampo, Ambeth. Rizal Without the Overcoat (New Edition). Pasig City, anvil Publishing House 2002.<br />\r\n6. Odullo-de Guzman, Maria. Noli Me Tangere and El Filibusterismo. Manila, NBS Publications 1998.<br />\r\n7. Palma, Rafael. Rizal: The Pride of the Malay Race. Manila, Saint Anthony Company 2000.<br />\r\n8.Romero, M.C. &amp; Sta Roman, J. Rizal &amp; the Development of Filipino Consciousness (Third Edition). Manila, JMC Press Inc., 2001.<br />\r\n<br />\r\nCourse Evaluation:<br />\r\n<br />\r\n1. Quizzes : 30 %<br />\r\n2. Exams : 40 %<br />\r\n3. Class Standing : 20 %<br />\r\n- recitation<br />\r\n- attendance<br />\r\n- behavior<br />\r\n4. Final Grade<br />\r\n- 40 % previous grade<br />\r\n- 60 % current grade</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `tc_id` int(11) NOT NULL,
  `tc_user_id` varchar(255) NOT NULL,
  `tc_class_id` varchar(255) NOT NULL,
  `tc_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`tc_id`, `tc_user_id`, `tc_class_id`, `tc_description`) VALUES
(1, '', '7', 'Assign Teacher to BSIS-4A'),
(2, '6', '12', 'Assing to class'),
(3, '6', '13', 'Assign to BSIS-3B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_level_id` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_add1` varchar(255) NOT NULL,
  `user_add2` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_state` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_dob` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_level_id`, `user_username`, `user_password`, `user_name`, `user_add1`, `user_add2`, `user_city`, `user_state`, `user_country`, `user_email`, `user_mobile`, `user_gender`, `user_dob`, `user_image`) VALUES
(4, '1', 'admin', 'test', 'Kaushal Kishore', 'House no : 768', 'Sector 2B', '1', '1', '2', 'kaushal.rahuljaiswal@gmail.com', '987654321', '', '12 january, 2013', 'IMG_5740.jpg'),
(6, '2', 'atul', 'test', 'Atul Kumar', 'House no : 712', 'Sector 2A', '1', '2', '1', 'atul@gmail.com', '987654321', '', '12 january, 2013', 'Female_8_.png'),
(9, '2', 'kaushal', 'test', 'Kaushal Kishore', 'New Lahore Colony', 'Shirur', '2', '2', '2', 'kaushal.rahuljaiswal@gmail.com', '9876543212', '', '19 May,2016', 'Login Page.png'),
(10, '2', 'afnan', '123', 'afnan', 'dgfd', 'sds', '1', '2', '1', 'dfd', 'dfdg', '', '15 June,2017', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `ulog_id` int(11) NOT NULL,
  `ulog_username` varchar(25) NOT NULL,
  `ulog_login_date` varchar(30) NOT NULL,
  `ulog_logout_date` varchar(30) NOT NULL,
  `ulog_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`ulog_id`, `ulog_username`, `ulog_login_date`, `ulog_logout_date`, `ulog_user_id`) VALUES
(1, 'admin', '2013-11-01 11:57:33', '2013-11-18 10:33:54', 10),
(2, 'admin', '2013-11-05 09:52:09', '2013-11-18 10:33:54', 10),
(3, 'admin', '2013-11-08 10:41:09', '2013-11-18 10:33:54', 10),
(4, 'admin', '2013-11-12 22:53:05', '2013-11-18 10:33:54', 10),
(5, 'admin', '2013-11-13 07:07:04', '2013-11-18 10:33:54', 10),
(6, 'admin', '2013-11-13 13:07:58', '2013-11-18 10:33:54', 10),
(7, 'admin', '2013-11-13 13:30:45', '2013-11-18 10:33:54', 10),
(8, 'admin', '2013-11-13 15:25:20', '2013-11-18 10:33:54', 10),
(9, 'admin', '2013-11-13 15:46:28', '2013-11-18 10:33:54', 10),
(10, 'admin', '2013-11-13 16:04:10', '2013-11-18 10:33:54', 10),
(11, 'admin', '2013-11-13 17:31:37', '2013-11-18 10:33:54', 10),
(12, 'admin', '2013-11-13 22:47:45', '2013-11-18 10:33:54', 10),
(13, 'admin', '2013-11-14 10:27:06', '2013-11-18 10:33:54', 10),
(14, 'admin', '2013-11-14 10:27:55', '2013-11-18 10:33:54', 10),
(15, 'admin', '2013-11-14 10:38:08', '2013-11-18 10:33:54', 10),
(16, 'admin', '2013-11-14 10:38:09', '2013-11-18 10:33:54', 10),
(17, 'admin', '2013-11-14 10:41:06', '2013-11-18 10:33:54', 10),
(18, 'admin', '2013-11-14 11:44:08', '2013-11-18 10:33:54', 10),
(19, 'admin', '2013-11-14 21:53:56', '2013-11-18 10:33:54', 10),
(20, 'admin', '2013-11-14 22:03:53', '2013-11-18 10:33:54', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`etype_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`files_id`);

--
-- Indexes for table `login_level`
--
ALTER TABLE `login_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`month_id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD KEY `user_id` (`student_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`qq_id`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`qr_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`syear_id`);

--
-- Indexes for table `semestor`
--
ALTER TABLE `semestor`
  ADD PRIMARY KEY (`semestor_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`tc_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`ulog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `etype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_level`
--
ALTER TABLE `login_level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `qq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `qr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `syear_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `semestor`
--
ALTER TABLE `semestor`
  MODIFY `semestor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `ulog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `student_questionnaire` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
