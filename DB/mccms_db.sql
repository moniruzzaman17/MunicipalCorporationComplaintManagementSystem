-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2018 at 10:38 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mccms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(225) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `joining_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `user_id`, `password`, `email`, `contact`, `address`, `image`, `joining_date`) VALUES
(1, 'Moniruzzaman', 'moon199715', '123456', 'moon199715@gmail.com', '01761189963', 'Uttara, Dhaka', 'moon.jpg', '21-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `authority_info`
--

CREATE TABLE `authority_info` (
  `au_id` int(11) NOT NULL,
  `au_name` varchar(255) NOT NULL,
  `au_user_id` varchar(255) NOT NULL,
  `au_password` varchar(255) NOT NULL,
  `au_email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `au_home_district` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `working_division` varchar(255) NOT NULL,
  `working_district` varchar(255) NOT NULL,
  `working_upazila` varchar(255) NOT NULL,
  `au_nid` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `reg_date` date NOT NULL,
  `pro_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authority_info`
--

INSERT INTO `authority_info` (`au_id`, `au_name`, `au_user_id`, `au_password`, `au_email`, `contact`, `au_home_district`, `designation`, `organization`, `working_division`, `working_district`, `working_upazila`, `au_nid`, `date_birth`, `reg_date`, `pro_image`, `status`) VALUES
(1, 'Md Khalid Rahim', 'rahim123', '123456', 'rahim123@gmail.com', '01761189964', 'Jhenaidah', 'Deputy Commissioner', 'Deputy Commissioner Office', 'Rangpur', 'Nilphamari', 'Nilphamari Sadar', '1960125425002', '1958-01-08', '2018-11-30', 'j.jpg', 1),
(2, 'Deoan Kamal Ahmed', 'kamal123', '123456', 'kamal123@gmail.com', '01966352145', 'Nilphamari', 'Mayor', 'Nilphamari Municipality', 'Rangpur', 'Nilphamari', 'Nilphamari Sadar', '1957425687513', '1957-02-05', '2018-11-30', 'm1_6_0.jpg', 1),
(3, 'Asadul Alif', 'alif123', '123456', 'alif123@gmail.com', '01645147548', 'Barishal', 'Member of Parliament', 'National Parliament', 'Barishal', 'Barishal', 'Barisal Sadar Upazila', '1959542314587', '1959-08-25', '2018-12-07', '1495037204_2.jpg', 1),
(4, 'Abul Bashar', 'bashar123', '123456', 'bashar123@gmail.com', '01545124236', 'Rangpur', 'District Comissionar', 'Rangpur DC Office', 'Rangpur', 'Rangpur', 'Rangpur Sadar', '1963542100150', '1963-02-01', '2018-12-07', '30845047522ca14f366a854b4db109ccc26623d0.jpg', 0),
(5, 'Hasnat Karim', 'karim123', '123456', 'karim123@gmail.com', '01754215421', 'Jhenaidah', 'Assistant Commissionar', 'Nilphamari DC Office', 'Rangpur', 'Nilphamari', 'Nilphamari Sadar', '19124741232145', '1972-02-05', '2018-12-07', 'Commiss444ggdssaetioner_P.jpg', 1),
(6, 'Habib Raihan', 'habib123', 'habib123', 'habib123@gmail.com', '01854126525', 'Sherpur', 'Assistant Commissionar Land', 'Manikganj DC Office', 'Dhaka', 'Manikganj', 'Manikganj Sadar Upazila', '197945455121', '1979-08-06', '2018-12-07', 'p_226_1412141982.jpg', 1),
(7, 'Khandakar Abdur Hai', 'hai123', '123456', 'hai123@gmail.com', '01754213121', 'Mymensingh', 'Assistant Police Super', 'Office of the Police Super', 'Rangpur', 'Nilphamari', 'Nilphamari Sadar', '1976154235458', '1976-05-05', '2018-12-07', 'downl455ohoad.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `authority_review`
--

CREATE TABLE `authority_review` (
  `review_id` int(11) NOT NULL,
  `authority_user_id` varchar(100) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `review_text` varchar(255) NOT NULL,
  `review_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authority_review`
--

INSERT INTO `authority_review` (`review_id`, `authority_user_id`, `post_id`, `review_text`, `review_timestamp`, `review_date`) VALUES
(1, 'rahim123', '36', 'Mr. Josim Uddin, Thank you for highlighting this problem. We need to aware our society. According to your complaint and evidence InShaaAllah we will take necessary step against this problem. ', '2018-12-07 13:31:44', '7-12-2018'),
(4, 'rahim123', '35', 'asdf', '2018-12-26 16:03:18', '26-12-2018'),
(5, 'rahim123', '25', 'asdf', '2018-12-26 16:45:07', '26-12-2018'),
(6, 'ata123', '38', '', '2018-12-26 18:35:46', '27-12-2018'),
(7, 'ata123', '38', 'j', '2018-12-26 18:37:48', '27-12-2018'),
(8, 'ata123', '38', 'dsf', '2018-12-26 18:42:18', '27-12-2018'),
(9, 'ata123', '38', '', '2018-12-26 18:42:49', '27-12-2018'),
(10, 'ata123', '38', '', '2018-12-26 18:42:58', '27-12-2018'),
(11, 'rahim123', '36', 'sdf', '2018-12-26 18:46:51', '27-12-2018'),
(12, 'rahim123', '38', 'asdf', '2018-12-26 18:47:08', '27-12-2018'),
(13, 'ata123', '38', 'hj', '2018-12-26 18:47:38', '27-12-2018'),
(14, 'rahim123', '35', '', '2018-12-26 18:57:45', '27-12-2018'),
(15, 'moon199715', '25', 'hello', '2018-12-26 19:05:46', '27-12-2018'),
(16, 'rahim123', '36', 'done?', '2018-12-26 19:06:12', '27-12-2018'),
(17, 'rahim123', '38', 'is it okay??', '2018-12-26 19:06:31', '27-12-2018');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `post_id` varchar(40) NOT NULL,
  `post_type` varchar(30) NOT NULL,
  `com_text` varchar(100) NOT NULL,
  `com_date` varchar(10) NOT NULL,
  `com_time` varchar(10) NOT NULL,
  `current_timestemp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `user_id`, `post_id`, `post_type`, `com_text`, `com_date`, `com_time`, `current_timestemp`) VALUES
(4, 'moon199715', '35', 'Generel', 'Hope authority will take step', '2018-10-29', '06:38:44', '2018-12-07 16:30:28'),
(8, 'moon199715', '20', 'Generel', 'This is an important issue. I hope authority will take step against this condition', '2018-10-29', '07:06:59', '2018-10-29 18:06:59'),
(27, 'masum123', '36', 'Generel', 'সত্যিই এটা রাষ্ট্রের লজ্জা, যারা শিশুদের দিয়ে এভাবে শক্ত কাজ করায় তাদের আইনের আওতায় আনা হোক।', '06-11-2018', '02:50pm', '2018-11-06 08:50:46'),
(34, 'moon199715', '38', 'Generel', 'বর্তমানে এটি একটি গুরুত্বপুর্ন সমস্যা, আশাকরি কর্তৃপক্ষ এ বিষয়ে দৃষ্টি দিবেন', '08-12-2018', '01:11am', '2018-12-07 19:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `post_id` int(100) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `user_fullname` varchar(40) NOT NULL,
  `post_title` text CHARACTER SET utf8 NOT NULL,
  `post_text` text CHARACTER SET utf8 NOT NULL,
  `attatchment` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_type` varchar(40) NOT NULL,
  `upazila_code` varchar(40) NOT NULL,
  `district_code` varchar(50) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`post_id`, `user_id`, `user_fullname`, `post_title`, `post_text`, `attatchment`, `date_time`, `post_type`, `upazila_code`, `district_code`, `post_date`) VALUES
(12, 'shuvo123', 'Shuvo', 'About Closs Blood Relationship', 'Me and my Cousin', 'IMG_20151229_102411.jpg', '2018-11-28 16:06:32', 'Generel', '444', '32', '2018-10-26'),
(13, 'josim123', 'Josim Uddin', 'Showing the Beauty of Flowers', 'Flowers are really beautiful ', 'IMG_20151214_125340.jpg', '2018-11-28 16:07:01', 'Generel', '199', '8', '2018-10-26'),
(15, 'mim786', 'Jannat Mim', 'Introduction about me', 'Hi, I am Jannat', '11249237_1435525090084497_1615929507705296585_n.jpg', '2018-10-26 15:47:59', 'Generel', '149', '1', '0000-00-00'),
(16, 'masum123', 'Masum Khan', 'My Friends', 'WE ARE', '20180213_163627.jpg', '2018-11-28 16:07:57', 'Generel', '315', '61', '2018-10-26'),
(17, 'moon199715', 'Moniruzzaman', 'About Me', 'This is MY Photo', 'moon updateeeee.jpg', '2018-11-28 16:08:03', 'Generel', '429', '30', '2018-10-26'),
(19, 'nibir123', 'Nibir', 'He is My friend', 'my friend apon', '20171227_140652.jpg', '2018-11-28 16:08:12', 'Generel', '310', '60', '2018-10-26'),
(20, 'borson123', 'ATM Bodruzzaman', 'Please Keep Concentrate on this road', 'This is the present condition of this road. I hope authority will see this and take proper step for ', 'download.jpg', '2018-11-28 16:08:16', 'Generel', '429', '30', '2018-10-26'),
(21, 'itu123', 'Afra Anjum', 'পুলিশ স্বাধারন মানুষ কে নির্মম ভাবে পিটালো', 'একটি পুলিশ অবৈধভাবে একটি সাধারন মানুষকে পিটিয়েছেন। প্রমান স্বরুপ একটা ছবি নিচে দেওয়া হল', '528c3228-3bfa-4012-8418-57d0021e3278.png', '2018-11-28 16:08:22', 'Crime', '306', '60', '2018-10-26'),
(25, 'moon199715', 'Moniruzzaman', 'বন্ধ হোক শিশু নির্যাতন-রক্ষা করুন শিশুদের অধিকার', 'এত কোমল,পবিত্র শিশু দের কে আমার আপনার মতই তরুণ প্রজাতির কিছু মানুষ যে যেভাবে পারছে মারছে!! ঘটনা কি? ', 'child.jpg', '2018-11-28 16:08:33', 'Crime', '429', '30', '2018-10-27'),
(35, 'moon199715', 'Moniruzzaman', 'ভাঙা রাস্তা নিয়ে ভোগান্তিতে সাধারন জনগন', 'বর্ষাকালে এই ভাঙা রাস্তায় পানি জমে জনসাধারনের চলার রাস্তা বন্ধ হয়ে যায়, এতে ছাত্রছাত্রীরাও নিয়মিত ক্লাসে যেতে পারে না,এ ব্যাপারে কর্তৃপক্ষের দৃষ্টি আকর্ষন করতেছি।', 'f092d8fc8be4aa4ac370d0fa77802f1b.jpg', '2018-11-28 19:45:44', 'Generel', '429', '30', '2018-11-02'),
(36, 'josim123', 'Josim Uddin', 'শিশুদের কাজ করা রাষ্ট্রের লজ্জা', 'মানিকগঞ্জ এর হরিরামপুর উপজেলার অনেক কারখানায় এভাবে শিশুদের দিয়ে বিপজ্জনক কাজ করানো হয়, আমি যথাযথ কর্তৃপক্ষের দৃষ্টি আকষর্ন করছি যাতে শিশুদের আর বিপজ্জন কাজ করানোও না হয় এবং তাদের শিক্ষা দান নিশ্চিত করা হয়।', 'c5391c298534fa08a84b973abd2af62b.jpg', '2018-11-28 16:08:54', 'Generel', '199', '8', '2018-11-06'),
(38, 'ata123', 'Ataure Rahman', 'আইনের রক্ষক হয়ে ঘুষ নেওয়া', 'আইনের রক্ষক যদি ঘুষ নিয়ে আইনটাকেই পরিবর্তন করে দেয় তবে দেশে আইন প্রতিষ্ঠা হবে কিভাবে? যখন সাধারন মানুষ দেখবে কিছু টাকা দিয়েই সহজেই আইন লঙ্ঘন করা যায় তাহলে মানুষ টাকা দিয়ে আইনের চোখ আড়াল করে নিজের সার্থের জন্য বে-আইনি কাজের সাথে যুক্ত হবে। এ ব্যাপারে কর্তৃপক্ষের দৃষ্টি আকর্ষন করছি। ', 'eae4aaf335040cfa6f018cf617a5d6c6.jpg', '2018-12-07 18:54:08', 'Generel', '483', '1', '2018-12-08'),
(39, 'borson123', 'Bodruzzaman', 'প্রকাশ্য দিবালোকে কুপিয়ে খুন', 'প্রকাশ্যে দিবালোকে এক ব্যক্তিকে ধারালো অস্ত্র দিয়ে কুপিয়ে খুন করছেন তারই পরিচিত এক ব্যক্তি। আর চারদিকে মানুষ ভীড় করে সে দৃশ্য দেখছে। বৃহস্পতিবার সকাল সাড়ে ১০টার দিকে ভারতের অন্ধ্রপ্রদেশের কাডাপা জেলার প্রোদাতুর শহরে এই ঘটনা ঘটে। নিহত ব্যক্তির নাম মারুতি রেড্ডি (৩২)। জাম্মালামাদুগুর দেবগুঁড়ি গ্রামের বাসিন্দা তিনি।', '967850d114f9f2d6c055acefba88389a.jpg', '2018-12-26 20:53:14', 'Crime', '429', '30', '2018-12-27'),
(44, 'itu123', 'Afra Anjum', 'কিশোর অপরাধ এবং বাংলাদেশের বাস্তবতা', 'বাংলাদেশের আইন ও সাধারণ মানুষের মনোভাব কি শিশুবান্ধব? একদিকে শিশুরা যেমন হত্যা-নির্যাতনের শিকার হচ্ছে, অন্যদিকে নানা অপরাধের কথা বলে তাদের আটক করা হচ্ছে সাধারণ আইনে৷ তার ওপর সংশোধন কেন্দ্রগুলোও শিশুদের উপযোগী নয়!', 'bc7d8d1a21b5415387bca9667a0bba82.jpg', '2018-12-26 21:24:36', 'Generel', '306', '60', '2018-12-27'),
(46, 'ata123', 'Ataure Rahman', 'কাশিপুরের জোড়া খুনের আসামীরা প্রকাশ্যে কিন্তু প্রশাসন নীরব', ' নারায়ণগঞ্জ জেলার আলোচিত ডবল মার্ডারের এজাহার মতে খুনের পেছনে মূল কারন ছিলো উক্ত এলাকায় মাদক ব্যবসা নিয়ন্ত্রণ, সন্ত্রাসী কর্মকান্ড, ভূমি দস্যুতা এবং আধিপত্য বিস্তার। নিহত তুহিন হাওলাদার মিল্টন (৩৫) এবং পারভেজ (২৪) উভয়ই ১নং বাবুরাইল শুক্কুর মিয়ার বাড়ির ভাড়াটিয়া জয়নাল আবেদীন এর কুখ্যাত সন্ত্রাসী পুত্র জাহাঙ্গীর বেপারীর গ্রুপ এর সদস্য ছিলো।', 'b57e121b6a9c41b32a158b279be6b4e2.jpg', '2018-12-26 21:30:38', 'Crime', '483', '1', '2018-12-27'),
(47, 'salman123', 'Salman', 'প্রকাশ্য দিবালোকে গুলি করে খুন', 'প্রকাশ্য দিবালোকে গুলি করে খুনের ঘটনা ঘটল কুষ্টিয়াতে। শহর থেকে মাত্র পাঁচ কিলোমিটার দূরে ডাওয়াগুড়ি বাজারে ৩১ নম্বর জাতীয় সড়কের ওপর চলল ১১ রাউন্ড গুলি। ঘটনায় মৃত্যু হয়েছে গৌতম সরকার নামে এক ব্যক্তির।', '931c7fb4637df1fbf8baa16895111ee1.jpg', '2018-12-26 21:34:29', 'Crime', '306', '60', '2018-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) UNSIGNED NOT NULL,
  `division_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `website`) VALUES
(1, 3, 'Dhaka', 'ঢাকা', 'www.dhaka.gov.bd'),
(2, 3, 'Faridpur', 'ফরিদপুর', 'www.faridpur.gov.bd'),
(3, 3, 'Gazipur', 'গাজীপুর', 'www.gazipur.gov.bd'),
(4, 3, 'Gopalganj', 'গোপালগঞ্জ', 'www.gopalganj.gov.bd'),
(5, 8, 'Jamalpur', 'জামালপুর', 'www.jamalpur.gov.bd'),
(6, 3, 'Kishoreganj', 'কিশোরগঞ্জ', 'www.kishoreganj.gov.bd'),
(7, 3, 'Madaripur', 'মাদারীপুর', 'www.madaripur.gov.bd'),
(8, 3, 'Manikganj', 'মানিকগঞ্জ', 'www.manikganj.gov.bd'),
(9, 3, 'Munshiganj', 'মুন্সিগঞ্জ', 'www.munshiganj.gov.bd'),
(10, 8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensingh.gov.bd'),
(11, 3, 'Narayanganj', 'নারায়াণগঞ্জ', 'www.narayanganj.gov.bd'),
(12, 3, 'Narsingdi', 'নরসিংদী', 'www.narsingdi.gov.bd'),
(13, 8, 'Netrokona', 'নেত্রকোণা', 'www.netrokona.gov.bd'),
(14, 3, 'Rajbari', 'রাজবাড়ি', 'www.rajbari.gov.bd'),
(15, 3, 'Shariatpur', 'শরীয়তপুর', 'www.shariatpur.gov.bd'),
(16, 8, 'Sherpur', 'শেরপুর', 'www.sherpur.gov.bd'),
(17, 3, 'Tangail', 'টাঙ্গাইল', 'www.tangail.gov.bd'),
(18, 5, 'Bogura', 'বগুড়া', 'www.bogra.gov.bd'),
(19, 5, 'Joypurhat', 'জয়পুরহাট', 'www.joypurhat.gov.bd'),
(20, 5, 'Naogaon', 'নওগাঁ', 'www.naogaon.gov.bd'),
(21, 5, 'Natore', 'নাটোর', 'www.natore.gov.bd'),
(22, 5, 'Nawabganj', 'নবাবগঞ্জ', 'www.chapainawabganj.gov.bd'),
(23, 5, 'Pabna', 'পাবনা', 'www.pabna.gov.bd'),
(24, 5, 'Rajshahi', 'রাজশাহী', 'www.rajshahi.gov.bd'),
(25, 5, 'Sirajgonj', 'সিরাজগঞ্জ', 'www.sirajganj.gov.bd'),
(26, 6, 'Dinajpur', 'দিনাজপুর', 'www.dinajpur.gov.bd'),
(27, 6, 'Gaibandha', 'গাইবান্ধা', 'www.gaibandha.gov.bd'),
(28, 6, 'Kurigram', 'কুড়িগ্রাম', 'www.kurigram.gov.bd'),
(29, 6, 'Lalmonirhat', 'লালমনিরহাট', 'www.lalmonirhat.gov.bd'),
(30, 6, 'Nilphamari', 'নীলফামারী', 'www.nilphamari.gov.bd'),
(31, 6, 'Panchagarh', 'পঞ্চগড়', 'www.panchagarh.gov.bd'),
(32, 6, 'Rangpur', 'রংপুর', 'www.rangpur.gov.bd'),
(33, 6, 'Thakurgaon', 'ঠাকুরগাঁও', 'www.thakurgaon.gov.bd'),
(34, 1, 'Barguna', 'বরগুনা', 'www.barguna.gov.bd'),
(35, 1, 'Barishal', 'বরিশাল', 'www.barisal.gov.bd'),
(36, 1, 'Bhola', 'ভোলা', 'www.bhola.gov.bd'),
(37, 1, 'Jhalokati', 'ঝালকাঠি', 'www.jhalakathi.gov.bd'),
(38, 1, 'Patuakhali', 'পটুয়াখালী', 'www.patuakhali.gov.bd'),
(39, 1, 'Pirojpur', 'পিরোজপুর', 'www.pirojpur.gov.bd'),
(40, 2, 'Bandarban', 'বান্দরবান', 'www.bandarban.gov.bd'),
(41, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 'www.brahmanbaria.gov.bd'),
(42, 2, 'Chandpur', 'চাঁদপুর', 'www.chandpur.gov.bd'),
(43, 2, 'Chattogram', 'চট্টগ্রাম', 'www.chittagong.gov.bd'),
(44, 2, 'Cumilla', 'কুমিল্লা', 'www.comilla.gov.bd'),
(45, 2, 'Cox''s Bazar', 'কক্স বাজার', 'www.coxsbazar.gov.bd'),
(46, 2, 'Feni', 'ফেনী', 'www.feni.gov.bd'),
(47, 2, 'Khagrachari', 'খাগড়াছড়ি', 'www.khagrachhari.gov.bd'),
(48, 2, 'Lakshmipur', 'লক্ষ্মীপুর', 'www.lakshmipur.gov.bd'),
(49, 2, 'Noakhali', 'নোয়াখালী', 'www.noakhali.gov.bd'),
(50, 2, 'Rangamati', 'রাঙ্গামাটি', 'www.rangamati.gov.bd'),
(51, 7, 'Habiganj', 'হবিগঞ্জ', 'www.habiganj.gov.bd'),
(52, 7, 'Maulvibazar', 'মৌলভীবাজার', 'www.moulvibazar.gov.bd'),
(53, 7, 'Sunamganj', 'সুনামগঞ্জ', 'www.sunamganj.gov.bd'),
(54, 7, 'Sylhet', 'সিলেট', 'www.sylhet.gov.bd'),
(55, 4, 'Bagerhat', 'বাগেরহাট', 'www.bagerhat.gov.bd'),
(56, 4, 'Chuadanga', 'চুয়াডাঙ্গা', 'www.chuadanga.gov.bd'),
(57, 4, 'Jashore', 'যশোর', 'www.jessore.gov.bd'),
(58, 4, 'Jhenaidah', 'ঝিনাইদহ', 'www.jhenaidah.gov.bd'),
(59, 4, 'Khulna', 'খুলনা', 'www.khulna.gov.bd'),
(60, 4, 'Kushtia', 'কুষ্টিয়া', 'www.kushtia.gov.bd'),
(61, 4, 'Magura', 'মাগুরা', 'www.magura.gov.bd'),
(62, 4, 'Meherpur', 'মেহেরপুর', 'www.meherpur.gov.bd'),
(63, 4, 'Narail', 'নড়াইল', 'www.narail.gov.bd'),
(64, 4, 'Satkhira', 'সাতক্ষীরা', 'www.satkhira.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`) VALUES
(1, 'Barishal', 'বরিশাল'),
(2, 'Chittagong', 'চট্টগ্রাম'),
(3, 'Dhaka', 'ঢাকা'),
(4, 'Khulna', 'খুলনা'),
(5, 'Rajshahi', 'রাজশাহী'),
(6, 'Rangpur', 'রংপুর'),
(7, 'Sylhet', 'সিলেট'),
(8, 'Mymensingh', 'ময়মনসিংহ');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(50) NOT NULL,
  `receiver_id` varchar(50) NOT NULL,
  `msg_text` text NOT NULL,
  `post_title` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender_id`, `receiver_id`, `msg_text`, `post_title`, `msg_date`) VALUES
(1, 'rahim123', 'itu123', 'I need the location where the problem was generated', 'বন্ধ হোক শিশু নির্যাতন-রক্ষা করুন শিশুদের অধিকার', '2018-12-26 20:36:04'),
(2, 'itu123', 'rahim123', 'Sure sir, that was in mirpur 2', '', '2018-12-26 20:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `r_id` int(100) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `less_important_count` int(100) NOT NULL,
  `important_count` int(100) NOT NULL,
  `most_important_count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`r_id`, `post_id`, `user_id`, `less_important_count`, `important_count`, `most_important_count`) VALUES
(26, '35', 'moon199715', 0, 1, 0),
(45, '35', 'itu123', 0, 1, 0),
(46, '36', 'itu123', 0, 0, 1),
(47, '20', 'itu123', 1, 0, 0),
(48, '36', 'moon199715', 0, 0, 1),
(49, '20', 'moon199715', 1, 0, 0),
(50, '36', 'josim123', 0, 0, 1),
(52, '25', 'moon199715', 0, 0, 1),
(53, '21', 'moon199715', 0, 1, 0),
(54, '36', 'ata123', 0, 0, 1),
(55, '38', 'moon199715', 0, 1, 0),
(56, '38', 'itu123', 0, 0, 1),
(57, '38', 'ata123', 0, 1, 0),
(58, '44', 'ata123', 0, 1, 0),
(59, '44', 'salman123', 1, 0, 0),
(60, '38', 'salman123', 0, 0, 1),
(61, '36', 'salman123', 0, 0, 1),
(62, '47', 'salman123', 0, 0, 1),
(63, '46', 'salman123', 0, 0, 1),
(64, '39', 'salman123', 0, 0, 1),
(65, '25', 'salman123', 0, 0, 1),
(66, '21', 'salman123', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating_overview`
--

CREATE TABLE `rating_overview` (
  `rate_id` int(11) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `total_rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating_overview`
--

INSERT INTO `rating_overview` (`rate_id`, `post_id`, `total_rating`) VALUES
(1, '35', 2),
(4, '36', 5),
(5, '20', 2),
(7, '25', 2),
(8, '21', 2),
(9, '38', 4),
(10, '44', 2),
(11, '47', 1),
(12, '46', 1),
(13, '39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `rep_id` int(100) NOT NULL,
  `com_id` varchar(50) NOT NULL,
  `post_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `rep_text` varchar(500) NOT NULL,
  `rep_date` varchar(6) NOT NULL,
  `rep_time` varchar(6) NOT NULL,
  `current_time_stamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`rep_id`, `com_id`, `post_id`, `user_id`, `rep_text`, `rep_date`, `rep_time`, `current_time_stamp`) VALUES
(2, '4', '35', 'josim123', 'এ রকম আরো অনেক সমস্যা আছে যা কর্তৃপক্ষের কাছে তুলে ধরা হয় না', '07-12-', '10:32p', '2018-12-07 16:32:02.000000'),
(4, '27', '36', 'josim123', 'যারা শিশুশ্রম করায় তাদের আইনের মধ্যে এনে বিচার করা উচিৎ', '07-12-', '10:33p', '2018-12-07 16:33:55.000000'),
(5, '4', '35', 'itu123', 'এবার কর্তৃপক্ষের কাছে সমস্যা তুলে ধরার জন্য সুযোগ হয়েছে। ধন্যবাদ MCCMS', '07-12-', '10:35p', '2018-12-07 16:35:22.000000'),
(8, '34', '38', 'ata123', 'demo', '26-12-', '03:09a', '2018-12-25 21:09:32.000000'),
(9, '34', '38', 'ata123', 's', '26-12-', '03:11a', '2018-12-25 21:11:16.000000'),
(10, '34', '38', 'ata123', '', '26-12-', '03:20a', '2018-12-25 21:20:19.000000'),
(11, '34', '38', 'ata123', '', '26-12-', '03:20a', '2018-12-25 21:20:53.000000');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(2) UNSIGNED NOT NULL,
  `district_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`) VALUES
(1, 34, 'Amtali Upazila', 'আমতলী'),
(2, 34, 'Bamna Upazila', 'বামনা'),
(3, 34, 'Barguna Sadar Upazila', 'বরগুনা সদর'),
(4, 34, 'Betagi Upazila', 'বেতাগি'),
(5, 34, 'Patharghata Upazila', 'পাথরঘাটা'),
(6, 34, 'Taltali Upazila', 'তালতলী'),
(7, 35, 'Muladi Upazila', 'মুলাদি'),
(8, 35, 'Babuganj Upazila', 'বাবুগঞ্জ'),
(9, 35, 'Agailjhara Upazila', 'আগাইলঝরা'),
(10, 35, 'Barisal Sadar Upazila', 'বরিশাল সদর'),
(11, 35, 'Bakerganj Upazila', 'বাকেরগঞ্জ'),
(12, 35, 'Banaripara Upazila', 'বানাড়িপারা'),
(13, 35, 'Gaurnadi Upazila', 'গৌরনদী'),
(14, 35, 'Hizla Upazila', 'হিজলা'),
(15, 35, 'Mehendiganj Upazila', 'মেহেদিগঞ্জ '),
(16, 35, 'Wazirpur Upazila', 'ওয়াজিরপুর'),
(17, 36, 'Bhola Sadar Upazila', 'ভোলা সদর'),
(18, 36, 'Burhanuddin Upazila', 'বুরহানউদ্দিন'),
(19, 36, 'Char Fasson Upazila', 'চর ফ্যাশন'),
(20, 36, 'Daulatkhan Upazila', 'দৌলতখান'),
(21, 36, 'Lalmohan Upazila', 'লালমোহন'),
(22, 36, 'Manpura Upazila', 'মনপুরা'),
(23, 36, 'Tazumuddin Upazila', 'তাজুমুদ্দিন'),
(24, 37, 'Jhalokati Sadar Upazila', 'ঝালকাঠি সদর'),
(25, 37, 'Kathalia Upazila', 'কাঁঠালিয়া'),
(26, 37, 'Nalchity Upazila', 'নালচিতি'),
(27, 37, 'Rajapur Upazila', 'রাজাপুর'),
(28, 38, 'Bauphal Upazila', 'বাউফল'),
(29, 38, 'Dashmina Upazila', 'দশমিনা'),
(30, 38, 'Galachipa Upazila', 'গলাচিপা'),
(31, 38, 'Kalapara Upazila', 'কালাপারা'),
(32, 38, 'Mirzaganj Upazila', 'মির্জাগঞ্জ '),
(33, 38, 'Patuakhali Sadar Upazila', 'পটুয়াখালী সদর'),
(34, 38, 'Dumki Upazila', 'ডুমকি'),
(35, 38, 'Rangabali Upazila', 'রাঙ্গাবালি'),
(36, 39, 'Bhandaria', 'ভ্যান্ডারিয়া'),
(37, 39, 'Kaukhali', 'কাউখালি'),
(38, 39, 'Mathbaria', 'মাঠবাড়িয়া'),
(39, 39, 'Nazirpur', 'নাজিরপুর'),
(40, 39, 'Nesarabad', 'নেসারাবাদ'),
(41, 39, 'Pirojpur Sadar', 'পিরোজপুর সদর'),
(42, 39, 'Zianagar', 'জিয়ানগর'),
(43, 40, 'Bandarban Sadar', 'বান্দরবন সদর'),
(44, 40, 'Thanchi', 'থানচি'),
(45, 40, 'Lama', 'লামা'),
(46, 40, 'Naikhongchhari', 'নাইখংছড়ি '),
(47, 40, 'Ali kadam', 'আলী কদম'),
(48, 40, 'Rowangchhari', 'রউয়াংছড়ি '),
(49, 40, 'Ruma', 'রুমা'),
(50, 41, 'Brahmanbaria Sadar Upazila', 'ব্রাহ্মণবাড়িয়া সদর'),
(51, 41, 'Ashuganj Upazila', 'আশুগঞ্জ'),
(52, 41, 'Nasirnagar Upazila', 'নাসির নগর'),
(53, 41, 'Nabinagar Upazila', 'নবীনগর'),
(54, 41, 'Sarail Upazila', 'সরাইল'),
(55, 41, 'Shahbazpur Town', 'শাহবাজপুর টাউন'),
(56, 41, 'Kasba Upazila', 'কসবা'),
(57, 41, 'Akhaura Upazila', 'আখাউরা'),
(58, 41, 'Bancharampur Upazila', 'বাঞ্ছারামপুর'),
(59, 41, 'Bijoynagar Upazila', 'বিজয় নগর'),
(60, 42, 'Chandpur Sadar', 'চাঁদপুর সদর'),
(61, 42, 'Faridganj', 'ফরিদগঞ্জ'),
(62, 42, 'Haimchar', 'হাইমচর'),
(63, 42, 'Haziganj', 'হাজীগঞ্জ'),
(64, 42, 'Kachua', 'কচুয়া'),
(65, 42, 'Matlab Uttar', 'মতলব উত্তর'),
(66, 42, 'Matlab Dakkhin', 'মতলব দক্ষিণ'),
(67, 42, 'Shahrasti', 'শাহরাস্তি'),
(68, 43, 'Anwara Upazila', 'আনোয়ারা'),
(69, 43, 'Banshkhali Upazila', 'বাশখালি'),
(70, 43, 'Boalkhali Upazila', 'বোয়ালখালি'),
(71, 43, 'Chandanaish Upazila', 'চন্দনাইশ'),
(72, 43, 'Fatikchhari Upazila', 'ফটিকছড়ি'),
(73, 43, 'Hathazari Upazila', 'হাঠহাজারী'),
(74, 43, 'Lohagara Upazila', 'লোহাগারা'),
(75, 43, 'Mirsharai Upazila', 'মিরসরাই'),
(76, 43, 'Patiya Upazila', 'পটিয়া'),
(77, 43, 'Rangunia Upazila', 'রাঙ্গুনিয়া'),
(78, 43, 'Raozan Upazila', 'রাউজান'),
(79, 43, 'Sandwip Upazila', 'সন্দ্বীপ'),
(80, 43, 'Satkania Upazila', 'সাতকানিয়া'),
(81, 43, 'Sitakunda Upazila', 'সীতাকুণ্ড'),
(82, 44, 'Barura Upazila', 'বড়ুরা'),
(83, 44, 'Brahmanpara Upazila', 'ব্রাহ্মণপাড়া'),
(84, 44, 'Burichong Upazila', 'বুড়িচং'),
(85, 44, 'Chandina Upazila', 'চান্দিনা'),
(86, 44, 'Chauddagram Upazila', 'চৌদ্দগ্রাম'),
(87, 44, 'Daudkandi Upazila', 'দাউদকান্দি'),
(88, 44, 'Debidwar Upazila', 'দেবীদ্বার'),
(89, 44, 'Homna Upazila', 'হোমনা'),
(90, 44, 'Comilla Sadar Upazila', 'কুমিল্লা সদর'),
(91, 44, 'Laksam Upazila', 'লাকসাম'),
(92, 44, 'Monohorgonj Upazila', 'মনোহরগঞ্জ'),
(93, 44, 'Meghna Upazila', 'মেঘনা'),
(94, 44, 'Muradnagar Upazila', 'মুরাদনগর'),
(95, 44, 'Nangalkot Upazila', 'নাঙ্গালকোট'),
(96, 44, 'Comilla Sadar South Upazila', 'কুমিল্লা সদর দক্ষিণ'),
(97, 44, 'Titas Upazila', 'তিতাস'),
(98, 45, 'Chakaria Upazila', 'চকরিয়া'),
(100, 45, 'Cox''s Bazar Sadar Upazila', 'কক্স বাজার সদর'),
(101, 45, 'Kutubdia Upazila', 'কুতুবদিয়া'),
(102, 45, 'Maheshkhali Upazila', 'মহেশখালী'),
(103, 45, 'Ramu Upazila', 'রামু'),
(104, 45, 'Teknaf Upazila', 'টেকনাফ'),
(105, 45, 'Ukhia Upazila', 'উখিয়া'),
(106, 45, 'Pekua Upazila', 'পেকুয়া'),
(107, 46, 'Feni Sadar', 'ফেনী সদর'),
(108, 46, 'Chagalnaiya', 'ছাগল নাইয়া'),
(109, 46, 'Daganbhyan', 'দাগানভিয়া'),
(110, 46, 'Parshuram', 'পরশুরাম'),
(111, 46, 'Fhulgazi', 'ফুলগাজি'),
(112, 46, 'Sonagazi', 'সোনাগাজি'),
(113, 47, 'Dighinala Upazila', 'দিঘিনালা '),
(114, 47, 'Khagrachhari Upazila', 'খাগড়াছড়ি'),
(115, 47, 'Lakshmichhari Upazila', 'লক্ষ্মীছড়ি'),
(116, 47, 'Mahalchhari Upazila', 'মহলছড়ি'),
(117, 47, 'Manikchhari Upazila', 'মানিকছড়ি'),
(118, 47, 'Matiranga Upazila', 'মাটিরাঙ্গা'),
(119, 47, 'Panchhari Upazila', 'পানছড়ি'),
(120, 47, 'Ramgarh Upazila', 'রামগড়'),
(121, 48, 'Lakshmipur Sadar Upazila', 'লক্ষ্মীপুর সদর'),
(122, 48, 'Raipur Upazila', 'রায়পুর'),
(123, 48, 'Ramganj Upazila', 'রামগঞ্জ'),
(124, 48, 'Ramgati Upazila', 'রামগতি'),
(125, 48, 'Komol Nagar Upazila', 'কমল নগর'),
(126, 49, 'Noakhali Sadar Upazila', 'নোয়াখালী সদর'),
(127, 49, 'Begumganj Upazila', 'বেগমগঞ্জ'),
(128, 49, 'Chatkhil Upazila', 'চাটখিল'),
(129, 49, 'Companyganj Upazila', 'কোম্পানীগঞ্জ'),
(130, 49, 'Shenbag Upazila', 'শেনবাগ'),
(131, 49, 'Hatia Upazila', 'হাতিয়া'),
(132, 49, 'Kobirhat Upazila', 'কবিরহাট '),
(133, 49, 'Sonaimuri Upazila', 'সোনাইমুরি'),
(134, 49, 'Suborno Char Upazila', 'সুবর্ণ চর '),
(135, 50, 'Rangamati Sadar Upazila', 'রাঙ্গামাটি সদর'),
(136, 50, 'Belaichhari Upazila', 'বেলাইছড়ি'),
(137, 50, 'Bagaichhari Upazila', 'বাঘাইছড়ি'),
(138, 50, 'Barkal Upazila', 'বরকল'),
(139, 50, 'Juraichhari Upazila', 'জুরাইছড়ি'),
(140, 50, 'Rajasthali Upazila', 'রাজাস্থলি'),
(141, 50, 'Kaptai Upazila', 'কাপ্তাই'),
(142, 50, 'Langadu Upazila', 'লাঙ্গাডু'),
(143, 50, 'Nannerchar Upazila', 'নান্নেরচর '),
(144, 50, 'Kaukhali Upazila', 'কাউখালি'),
(145, 1, 'Dhamrai Upazila', 'ধামরাই'),
(146, 1, 'Dohar Upazila', 'দোহার'),
(147, 1, 'Keraniganj Upazila', 'কেরানীগঞ্জ'),
(148, 1, 'Nawabganj Upazila', 'নবাবগঞ্জ'),
(149, 1, 'Savar Upazila', 'সাভার'),
(150, 2, 'Faridpur Sadar Upazila', 'ফরিদপুর সদর'),
(151, 2, 'Boalmari Upazila', 'বোয়ালমারী'),
(152, 2, 'Alfadanga Upazila', 'আলফাডাঙ্গা'),
(153, 2, 'Madhukhali Upazila', 'মধুখালি'),
(154, 2, 'Bhanga Upazila', 'ভাঙ্গা'),
(155, 2, 'Nagarkanda Upazila', 'নগরকান্ড'),
(156, 2, 'Charbhadrasan Upazila', 'চরভদ্রাসন '),
(157, 2, 'Sadarpur Upazila', 'সদরপুর'),
(158, 2, 'Shaltha Upazila', 'শালথা'),
(159, 3, 'Gazipur Sadar-Joydebpur', 'গাজীপুর সদর'),
(160, 3, 'Kaliakior', 'কালিয়াকৈর'),
(161, 3, 'Kapasia', 'কাপাসিয়া'),
(162, 3, 'Sripur', 'শ্রীপুর'),
(163, 3, 'Kaliganj', 'কালীগঞ্জ'),
(164, 3, 'Tongi', 'টঙ্গি'),
(165, 4, 'Gopalganj Sadar Upazila', 'গোপালগঞ্জ সদর'),
(166, 4, 'Kashiani Upazila', 'কাশিয়ানি'),
(167, 4, 'Kotalipara Upazila', 'কোটালিপাড়া'),
(168, 4, 'Muksudpur Upazila', 'মুকসুদপুর'),
(169, 4, 'Tungipara Upazila', 'টুঙ্গিপাড়া'),
(170, 5, 'Dewanganj Upazila', 'দেওয়ানগঞ্জ'),
(171, 5, 'Baksiganj Upazila', 'বকসিগঞ্জ'),
(172, 5, 'Islampur Upazila', 'ইসলামপুর'),
(173, 5, 'Jamalpur Sadar Upazila', 'জামালপুর সদর'),
(174, 5, 'Madarganj Upazila', 'মাদারগঞ্জ'),
(175, 5, 'Melandaha Upazila', 'মেলানদাহা'),
(176, 5, 'Sarishabari Upazila', 'সরিষাবাড়ি '),
(177, 5, 'Narundi Police I.C', 'নারুন্দি'),
(178, 6, 'Astagram Upazila', 'অষ্টগ্রাম'),
(179, 6, 'Bajitpur Upazila', 'বাজিতপুর'),
(180, 6, 'Bhairab Upazila', 'ভৈরব'),
(181, 6, 'Hossainpur Upazila', 'হোসেনপুর '),
(182, 6, 'Itna Upazila', 'ইটনা'),
(183, 6, 'Karimganj Upazila', 'করিমগঞ্জ'),
(184, 6, 'Katiadi Upazila', 'কতিয়াদি'),
(185, 6, 'Kishoreganj Sadar Upazila', 'কিশোরগঞ্জ সদর'),
(186, 6, 'Kuliarchar Upazila', 'কুলিয়ারচর'),
(187, 6, 'Mithamain Upazila', 'মিঠামাইন'),
(188, 6, 'Nikli Upazila', 'নিকলি'),
(189, 6, 'Pakundia Upazila', 'পাকুন্ডা'),
(190, 6, 'Tarail Upazila', 'তাড়াইল'),
(191, 7, 'Madaripur Sadar', 'মাদারীপুর সদর'),
(192, 7, 'Kalkini', 'কালকিনি'),
(193, 7, 'Rajoir', 'রাজইর'),
(194, 7, 'Shibchar', 'শিবচর'),
(195, 8, 'Manikganj Sadar Upazila', 'মানিকগঞ্জ সদর'),
(196, 8, 'Singair Upazila', 'সিঙ্গাইর'),
(197, 8, 'Shibalaya Upazila', 'শিবালয়'),
(198, 8, 'Saturia Upazila', 'সাঠুরিয়া'),
(199, 8, 'Harirampur Upazila', 'হরিরামপুর'),
(200, 8, 'Ghior Upazila', 'ঘিওর'),
(201, 8, 'Daulatpur Upazila', 'দৌলতপুর'),
(202, 9, 'Lohajang Upazila', 'লোহাজং'),
(203, 9, 'Sreenagar Upazila', 'শ্রীনগর'),
(204, 9, 'Munshiganj Sadar Upazila', 'মুন্সিগঞ্জ সদর'),
(205, 9, 'Sirajdikhan Upazila', 'সিরাজদিখান'),
(206, 9, 'Tongibari Upazila', 'টঙ্গিবাড়ি'),
(207, 9, 'Gazaria Upazila', 'গজারিয়া'),
(208, 10, 'Bhaluka', 'ভালুকা'),
(209, 10, 'Trishal', 'ত্রিশাল'),
(210, 10, 'Haluaghat', 'হালুয়াঘাট'),
(211, 10, 'Muktagachha', 'মুক্তাগাছা'),
(212, 10, 'Dhobaura', 'ধবারুয়া'),
(213, 10, 'Fulbaria', 'ফুলবাড়িয়া'),
(214, 10, 'Gaffargaon', 'গফরগাঁও'),
(215, 10, 'Gauripur', 'গৌরিপুর'),
(216, 10, 'Ishwarganj', 'ঈশ্বরগঞ্জ'),
(217, 10, 'Mymensingh Sadar', 'ময়মনসিং সদর'),
(218, 10, 'Nandail', 'নন্দাইল'),
(219, 10, 'Phulpur', 'ফুলপুর'),
(220, 11, 'Araihazar Upazila', 'আড়াইহাজার'),
(221, 11, 'Sonargaon Upazila', 'সোনারগাঁও'),
(222, 11, 'Bandar', 'বান্দার'),
(223, 11, 'Naryanganj Sadar Upazila', 'নারায়ানগঞ্জ সদর'),
(224, 11, 'Rupganj Upazila', 'রূপগঞ্জ'),
(225, 11, 'Siddirgonj Upazila', 'সিদ্ধিরগঞ্জ'),
(226, 12, 'Belabo Upazila', 'বেলাবো'),
(227, 12, 'Monohardi Upazila', 'মনোহরদি'),
(228, 12, 'Narsingdi Sadar Upazila', 'নরসিংদী সদর'),
(229, 12, 'Palash Upazila', 'পলাশ'),
(230, 12, 'Raipura Upazila, Narsingdi', 'রায়পুর'),
(231, 12, 'Shibpur Upazila', 'শিবপুর'),
(232, 13, 'Kendua Upazilla', 'কেন্দুয়া'),
(233, 13, 'Atpara Upazilla', 'আটপাড়া'),
(234, 13, 'Barhatta Upazilla', 'বরহাট্টা'),
(235, 13, 'Durgapur Upazilla', 'দুর্গাপুর'),
(236, 13, 'Kalmakanda Upazilla', 'কলমাকান্দা'),
(237, 13, 'Madan Upazilla', 'মদন'),
(238, 13, 'Mohanganj Upazilla', 'মোহনগঞ্জ'),
(239, 13, 'Netrakona-S Upazilla', 'নেত্রকোনা সদর'),
(240, 13, 'Purbadhala Upazilla', 'পূর্বধলা'),
(241, 13, 'Khaliajuri Upazilla', 'খালিয়াজুরি'),
(242, 14, 'Baliakandi Upazila', 'বালিয়াকান্দি'),
(243, 14, 'Goalandaghat Upazila', 'গোয়ালন্দ ঘাট'),
(244, 14, 'Pangsha Upazila', 'পাংশা'),
(245, 14, 'Kalukhali Upazila', 'কালুখালি'),
(246, 14, 'Rajbari Sadar Upazila', 'রাজবাড়ি সদর'),
(247, 15, 'Shariatpur Sadar -Palong', 'শরীয়তপুর সদর '),
(248, 15, 'Damudya Upazila', 'দামুদিয়া'),
(249, 15, 'Naria Upazila', 'নড়িয়া'),
(250, 15, 'Jajira Upazila', 'জাজিরা'),
(251, 15, 'Bhedarganj Upazila', 'ভেদারগঞ্জ'),
(252, 15, 'Gosairhat Upazila', 'গোসাইর হাট '),
(253, 16, 'Jhenaigati Upazila', 'ঝিনাইগাতি'),
(254, 16, 'Nakla Upazila', 'নাকলা'),
(255, 16, 'Nalitabari Upazila', 'নালিতাবাড়ি'),
(256, 16, 'Sherpur Sadar Upazila', 'শেরপুর সদর'),
(257, 16, 'Sreebardi Upazila', 'শ্রীবরদি'),
(258, 17, 'Tangail Sadar Upazila', 'টাঙ্গাইল সদর'),
(259, 17, 'Sakhipur Upazila', 'সখিপুর'),
(260, 17, 'Basail Upazila', 'বসাইল'),
(261, 17, 'Madhupur Upazila', 'মধুপুর'),
(262, 17, 'Ghatail Upazila', 'ঘাটাইল'),
(263, 17, 'Kalihati Upazila', 'কালিহাতি'),
(264, 17, 'Nagarpur Upazila', 'নগরপুর'),
(265, 17, 'Mirzapur Upazila', 'মির্জাপুর'),
(266, 17, 'Gopalpur Upazila', 'গোপালপুর'),
(267, 17, 'Delduar Upazila', 'দেলদুয়ার'),
(268, 17, 'Bhuapur Upazila', 'ভুয়াপুর'),
(269, 17, 'Dhanbari Upazila', 'ধানবাড়ি'),
(270, 55, 'Bagerhat Sadar Upazila', 'বাগেরহাট সদর'),
(271, 55, 'Chitalmari Upazila', 'চিতলমাড়ি'),
(272, 55, 'Fakirhat Upazila', 'ফকিরহাট'),
(273, 55, 'Kachua Upazila', 'কচুয়া'),
(274, 55, 'Mollahat Upazila', 'মোল্লাহাট '),
(275, 55, 'Mongla Upazila', 'মংলা'),
(276, 55, 'Morrelganj Upazila', 'মরেলগঞ্জ'),
(277, 55, 'Rampal Upazila', 'রামপাল'),
(278, 55, 'Sarankhola Upazila', 'স্মরণখোলা'),
(279, 56, 'Damurhuda Upazila', 'দামুরহুদা'),
(280, 56, 'Chuadanga-S Upazila', 'চুয়াডাঙ্গা সদর'),
(281, 56, 'Jibannagar Upazila', 'জীবন নগর '),
(282, 56, 'Alamdanga Upazila', 'আলমডাঙ্গা'),
(283, 57, 'Abhaynagar Upazila', 'অভয়নগর'),
(284, 57, 'Keshabpur Upazila', 'কেশবপুর'),
(285, 57, 'Bagherpara Upazila', 'বাঘের পাড়া '),
(286, 57, 'Jessore Sadar Upazila', 'যশোর সদর'),
(287, 57, 'Chaugachha Upazila', 'চৌগাছা'),
(288, 57, 'Manirampur Upazila', 'মনিরামপুর '),
(289, 57, 'Jhikargachha Upazila', 'ঝিকরগাছা'),
(290, 57, 'Sharsha Upazila', 'সারশা'),
(291, 58, 'Jhenaidah Sadar Upazila', 'ঝিনাইদহ সদর'),
(292, 58, 'Maheshpur Upazila', 'মহেশপুর'),
(293, 58, 'Kaliganj Upazila', 'কালীগঞ্জ'),
(294, 58, 'Kotchandpur Upazila', 'কোট চাঁদপুর '),
(295, 58, 'Shailkupa Upazila', 'শৈলকুপা'),
(296, 58, 'Harinakunda Upazila', 'হাড়িনাকুন্দা'),
(297, 59, 'Terokhada Upazila', 'তেরোখাদা'),
(298, 59, 'Batiaghata Upazila', 'বাটিয়াঘাটা '),
(299, 59, 'Dacope Upazila', 'ডাকপে'),
(300, 59, 'Dumuria Upazila', 'ডুমুরিয়া'),
(301, 59, 'Dighalia Upazila', 'দিঘলিয়া'),
(302, 59, 'Koyra Upazila', 'কয়ড়া'),
(303, 59, 'Paikgachha Upazila', 'পাইকগাছা'),
(304, 59, 'Phultala Upazila', 'ফুলতলা'),
(305, 59, 'Rupsa Upazila', 'রূপসা'),
(306, 60, 'Kushtia Sadar', 'কুষ্টিয়া সদর'),
(307, 60, 'Kumarkhali', 'কুমারখালি'),
(308, 60, 'Daulatpur', 'দৌলতপুর'),
(309, 60, 'Mirpur', 'মিরপুর'),
(310, 60, 'Bheramara', 'ভেরামারা'),
(311, 60, 'Khoksa', 'খোকসা'),
(312, 61, 'Magura Sadar Upazila', 'মাগুরা সদর'),
(313, 61, 'Mohammadpur Upazila', 'মোহাম্মাদপুর'),
(314, 61, 'Shalikha Upazila', 'শালিখা'),
(315, 61, 'Sreepur Upazila', 'শ্রীপুর'),
(316, 62, 'angni Upazila', 'আংনি'),
(317, 62, 'Mujib Nagar Upazila', 'মুজিব নগর'),
(318, 62, 'Meherpur-S Upazila', 'মেহেরপুর সদর'),
(319, 63, 'Narail-S Upazilla', 'নড়াইল সদর'),
(320, 63, 'Lohagara Upazilla', 'লোহাগাড়া'),
(321, 63, 'Kalia Upazilla', 'কালিয়া'),
(322, 64, 'Satkhira Sadar Upazila', 'সাতক্ষীরা সদর'),
(323, 64, 'Assasuni Upazila', 'আসসাশুনি '),
(324, 64, 'Debhata Upazila', 'দেভাটা'),
(325, 64, 'Tala Upazila', 'তালা'),
(326, 64, 'Kalaroa Upazila', 'কলরোয়া'),
(327, 64, 'Kaliganj Upazila', 'কালীগঞ্জ'),
(328, 64, 'Shyamnagar Upazila', 'শ্যামনগর'),
(329, 18, 'Adamdighi', 'আদমদিঘী'),
(330, 18, 'Bogra Sadar', 'বগুড়া সদর'),
(331, 18, 'Sherpur', 'শেরপুর'),
(332, 18, 'Dhunat', 'ধুনট'),
(333, 18, 'Dhupchanchia', 'দুপচাচিয়া'),
(334, 18, 'Gabtali', 'গাবতলি'),
(335, 18, 'Kahaloo', 'কাহালু'),
(336, 18, 'Nandigram', 'নন্দিগ্রাম'),
(337, 18, 'Sahajanpur', 'শাহজাহানপুর'),
(338, 18, 'Sariakandi', 'সারিয়াকান্দি'),
(339, 18, 'Shibganj', 'শিবগঞ্জ'),
(340, 18, 'Sonatala', 'সোনাতলা'),
(341, 19, 'Joypurhat S', 'জয়পুরহাট সদর'),
(342, 19, 'Akkelpur', 'আক্কেলপুর'),
(343, 19, 'Kalai', 'কালাই'),
(344, 19, 'Khetlal', 'খেতলাল'),
(345, 19, 'Panchbibi', 'পাঁচবিবি'),
(346, 20, 'Naogaon Sadar Upazila', 'নওগাঁ সদর'),
(347, 20, 'Mohadevpur Upazila', 'মহাদেবপুর'),
(348, 20, 'Manda Upazila', 'মান্দা'),
(349, 20, 'Niamatpur Upazila', 'নিয়ামতপুর'),
(350, 20, 'Atrai Upazila', 'আত্রাই'),
(351, 20, 'Raninagar Upazila', 'রাণীনগর'),
(352, 20, 'Patnitala Upazila', 'পত্নীতলা'),
(353, 20, 'Dhamoirhat Upazila', 'ধামইরহাট '),
(354, 20, 'Sapahar Upazila', 'সাপাহার'),
(355, 20, 'Porsha Upazila', 'পোরশা'),
(356, 20, 'Badalgachhi Upazila', 'বদলগাছি'),
(357, 21, 'Natore Sadar Upazila', 'নাটোর সদর'),
(358, 21, 'Baraigram Upazila', 'বড়াইগ্রাম'),
(359, 21, 'Bagatipara Upazila', 'বাগাতিপাড়া'),
(360, 21, 'Lalpur Upazila', 'লালপুর'),
(361, 21, 'Natore Sadar Upazila', 'নাটোর সদর'),
(362, 21, 'Baraigram Upazila', 'বড়াই গ্রাম'),
(363, 22, 'Bholahat Upazila', 'ভোলাহাট'),
(364, 22, 'Gomastapur Upazila', 'গোমস্তাপুর'),
(365, 22, 'Nachole Upazila', 'নাচোল'),
(366, 22, 'Nawabganj Sadar Upazila', 'নবাবগঞ্জ সদর'),
(367, 22, 'Shibganj Upazila', 'শিবগঞ্জ'),
(368, 23, 'Atgharia Upazila', 'আটঘরিয়া'),
(369, 23, 'Bera Upazila', 'বেড়া'),
(370, 23, 'Bhangura Upazila', 'ভাঙ্গুরা'),
(371, 23, 'Chatmohar Upazila', 'চাটমোহর'),
(372, 23, 'Faridpur Upazila', 'ফরিদপুর'),
(373, 23, 'Ishwardi Upazila', 'ঈশ্বরদী'),
(374, 23, 'Pabna Sadar Upazila', 'পাবনা সদর'),
(375, 23, 'Santhia Upazila', 'সাথিয়া'),
(376, 23, 'Sujanagar Upazila', 'সুজানগর'),
(377, 24, 'Bagha', 'বাঘা'),
(378, 24, 'Bagmara', 'বাগমারা'),
(379, 24, 'Charghat', 'চারঘাট'),
(380, 24, 'Durgapur', 'দুর্গাপুর'),
(381, 24, 'Godagari', 'গোদাগারি'),
(382, 24, 'Mohanpur', 'মোহনপুর'),
(383, 24, 'Paba', 'পবা'),
(384, 24, 'Puthia', 'পুঠিয়া'),
(385, 24, 'Tanore', 'তানোর'),
(386, 25, 'Sirajganj Sadar Upazila', 'সিরাজগঞ্জ সদর'),
(387, 25, 'Belkuchi Upazila', 'বেলকুচি'),
(388, 25, 'Chauhali Upazila', 'চৌহালি'),
(389, 25, 'Kamarkhanda Upazila', 'কামারখান্দা'),
(390, 25, 'Kazipur Upazila', 'কাজীপুর'),
(391, 25, 'Raiganj Upazila', 'রায়গঞ্জ'),
(392, 25, 'Shahjadpur Upazila', 'শাহজাদপুর'),
(393, 25, 'Tarash Upazila', 'তারাশ'),
(394, 25, 'Ullahpara Upazila', 'উল্লাপাড়া'),
(395, 26, 'Birampur Upazila', 'বিরামপুর'),
(396, 26, 'Birganj', 'বীরগঞ্জ'),
(397, 26, 'Biral Upazila', 'বিড়াল'),
(398, 26, 'Bochaganj Upazila', 'বোচাগঞ্জ'),
(399, 26, 'Chirirbandar Upazila', 'চিরিরবন্দর'),
(400, 26, 'Phulbari Upazila', 'ফুলবাড়ি'),
(401, 26, 'Ghoraghat Upazila', 'ঘোড়াঘাট'),
(402, 26, 'Hakimpur Upazila', 'হাকিমপুর'),
(403, 26, 'Kaharole Upazila', 'কাহারোল'),
(404, 26, 'Khansama Upazila', 'খানসামা'),
(405, 26, 'Dinajpur Sadar Upazila', 'দিনাজপুর সদর'),
(406, 26, 'Nawabganj', 'নবাবগঞ্জ'),
(407, 26, 'Parbatipur Upazila', 'পার্বতীপুর'),
(408, 27, 'Fulchhari', 'ফুলছড়ি'),
(409, 27, 'Gaibandha sadar', 'গাইবান্ধা সদর'),
(410, 27, 'Gobindaganj', 'গোবিন্দগঞ্জ'),
(411, 27, 'Palashbari', 'পলাশবাড়ী'),
(412, 27, 'Sadullapur', 'সাদুল্যাপুর'),
(413, 27, 'Saghata', 'সাঘাটা'),
(414, 27, 'Sundarganj', 'সুন্দরগঞ্জ'),
(415, 28, 'Kurigram Sadar', 'কুড়িগ্রাম সদর'),
(416, 28, 'Nageshwari', 'নাগেশ্বরী'),
(417, 28, 'Bhurungamari', 'ভুরুঙ্গামারি'),
(418, 28, 'Phulbari', 'ফুলবাড়ি'),
(419, 28, 'Rajarhat', 'রাজারহাট'),
(420, 28, 'Ulipur', 'উলিপুর'),
(421, 28, 'Chilmari', 'চিলমারি'),
(422, 28, 'Rowmari', 'রউমারি'),
(423, 28, 'Char Rajibpur', 'চর রাজিবপুর'),
(424, 29, 'Lalmanirhat Sadar', 'লালমনিরহাট সদর'),
(425, 29, 'Aditmari', 'আদিতমারি'),
(426, 29, 'Kaliganj', 'কালীগঞ্জ'),
(427, 29, 'Hatibandha', 'হাতিবান্ধা'),
(428, 29, 'Patgram', 'পাটগ্রাম'),
(429, 30, 'Nilphamari Sadar', 'নীলফামারী সদর'),
(430, 30, 'Saidpur', 'সৈয়দপুর'),
(431, 30, 'Jaldhaka', 'জলঢাকা'),
(432, 30, 'Kishoreganj', 'কিশোরগঞ্জ'),
(433, 30, 'Domar', 'ডোমার'),
(434, 30, 'Dimla', 'ডিমলা'),
(435, 31, 'Panchagarh Sadar', 'পঞ্চগড় সদর'),
(436, 31, 'Debiganj', 'দেবীগঞ্জ'),
(437, 31, 'Boda', 'বোদা'),
(438, 31, 'Atwari', 'আটোয়ারি'),
(439, 31, 'Tetulia', 'তেতুলিয়া'),
(440, 32, 'Badarganj', 'বদরগঞ্জ'),
(441, 32, 'Mithapukur', 'মিঠাপুকুর'),
(442, 32, 'Gangachara', 'গঙ্গাচরা'),
(443, 32, 'Kaunia', 'কাউনিয়া'),
(444, 32, 'Rangpur Sadar', 'রংপুর সদর'),
(445, 32, 'Pirgachha', 'পীরগাছা'),
(446, 32, 'Pirganj', 'পীরগঞ্জ'),
(447, 32, 'Taraganj', 'তারাগঞ্জ'),
(448, 33, 'Thakurgaon Sadar Upazila', 'ঠাকুরগাঁও সদর'),
(449, 33, 'Pirganj Upazila', 'পীরগঞ্জ'),
(450, 33, 'Baliadangi Upazila', 'বালিয়াডাঙ্গি'),
(451, 33, 'Haripur Upazila', 'হরিপুর'),
(452, 33, 'Ranisankail Upazila', 'রাণীসংকইল'),
(453, 51, 'Ajmiriganj', 'আজমিরিগঞ্জ'),
(454, 51, 'Baniachang', 'বানিয়াচং'),
(455, 51, 'Bahubal', 'বাহুবল'),
(456, 51, 'Chunarughat', 'চুনারুঘাট'),
(457, 51, 'Habiganj Sadar', 'হবিগঞ্জ সদর'),
(458, 51, 'Lakhai', 'লাক্ষাই'),
(459, 51, 'Madhabpur', 'মাধবপুর'),
(460, 51, 'Nabiganj', 'নবীগঞ্জ'),
(461, 51, 'Shaistagonj Upazila', 'শায়েস্তাগঞ্জ'),
(462, 52, 'Moulvibazar Sadar', 'মৌলভীবাজার'),
(463, 52, 'Barlekha', 'বড়লেখা'),
(464, 52, 'Juri', 'জুড়ি'),
(465, 52, 'Kamalganj', 'কামালগঞ্জ'),
(466, 52, 'Kulaura', 'কুলাউরা'),
(467, 52, 'Rajnagar', 'রাজনগর'),
(468, 52, 'Sreemangal', 'শ্রীমঙ্গল'),
(469, 53, 'Bishwamvarpur', 'বিসশম্ভারপুর'),
(470, 53, 'Chhatak', 'ছাতক'),
(471, 53, 'Derai', 'দেড়াই'),
(472, 53, 'Dharampasha', 'ধরমপাশা'),
(473, 53, 'Dowarabazar', 'দোয়ারাবাজার'),
(474, 53, 'Jagannathpur', 'জগন্নাথপুর'),
(475, 53, 'Jamalganj', 'জামালগঞ্জ'),
(476, 53, 'Sulla', 'সুল্লা'),
(477, 53, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর'),
(478, 53, 'Shanthiganj', 'শান্তিগঞ্জ'),
(479, 53, 'Tahirpur', 'তাহিরপুর'),
(480, 54, 'Sylhet Sadar', 'সিলেট সদর'),
(481, 54, 'Beanibazar', 'বেয়ানিবাজার'),
(482, 54, 'Bishwanath', 'বিশ্বনাথ'),
(483, 54, 'Dakshin Surma Upazila', 'দক্ষিণ সুরমা'),
(484, 54, 'Balaganj', 'বালাগঞ্জ'),
(485, 54, 'Companiganj', 'কোম্পানিগঞ্জ'),
(486, 54, 'Fenchuganj', 'ফেঞ্চুগঞ্জ'),
(487, 54, 'Golapganj', 'গোলাপগঞ্জ'),
(488, 54, 'Gowainghat', 'গোয়াইনঘাট'),
(489, 54, 'Jaintiapur', 'জয়ন্তপুর'),
(490, 54, 'Kanaighat', 'কানাইঘাট'),
(491, 54, 'Zakiganj', 'জাকিগঞ্জ'),
(492, 54, 'Nobigonj', 'নবীগঞ্জ');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `SL` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `mail_address` varchar(40) NOT NULL,
  `nid_no` int(20) NOT NULL,
  `date_birth` date NOT NULL,
  `division_name` varchar(40) NOT NULL,
  `district_name` varchar(30) NOT NULL,
  `district_code` varchar(30) NOT NULL,
  `upazila_name` varchar(30) NOT NULL,
  `upazila_code` varchar(30) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `status` int(50) NOT NULL DEFAULT '1',
  `post_status` int(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`SL`, `user_name`, `full_name`, `password`, `mail_address`, `nid_no`, `date_birth`, `division_name`, `district_name`, `district_code`, `upazila_name`, `upazila_code`, `profile_image`, `status`, `post_status`) VALUES
(0, 'ata123', 'Ataure Rahman', '123456', 'ataure@gmail.com', 2140003647, '1996-08-12', 'Dhaka', 'Dhaka', '1', 'Dakshin Surma Upazila', '483', 'IMG_20150415_172058.jpg', 1, 1),
(0, 'bashar123', 'Abdur Bashar', '123456', 'bashar123@gmail.com', 2147483647, '1963-05-19', 'Rangpur', 'Rangpur', '32', 'Rangpur Sadar', '444', '', 1, 1),
(0, 'borson123', 'Bodruzzaman', '123456', 'borson@gmail.com', 2147483647, '1996-02-05', 'Rangpur', 'Nilphamari', '30', 'Nilphamari Sadar', '429', 'borson.jpg', 1, 1),
(0, 'dgsg5', 'Ssgd', '123456', 'bbbb@gmail.com', 2147483647, '2018-10-25', 'Barishal', 'Barishal', '35', 'Barisal Sadar Upazila', '10', '', 0, 1),
(0, 'fchd5345', 'Kkkkkk', '3535353', 'kkkkkkkkb@gmail.com', 2147483647, '2018-10-16', 'Khulna', 'Netrokona', '13', 'Barisal Sadar Upazila', '10', '', 1, 1),
(0, 'itu123', 'Afra Anjum', '123456', 'itu123@gmail.com', 2147483647, '1996-11-05', 'Khulna', 'Kushtia', '60', 'Kushtia Sadar', '306', '10984295_723731791073172_5843626888297835545_n.jpg', 1, 1),
(0, 'josim123', 'Josim Uddin', '123456', 'josim@gmail.com', 2147483647, '1994-12-12', 'Dhaka', 'Manikganj', '8', 'Harirampur Upazila', '199', 'IMG_20160612_14512226.jpg', 1, 1),
(0, 'masum123', 'Masum Khan', '123456', 'masum@gmail.com', 2147483647, '1995-05-05', 'Dhaka', 'Gazipur', '3', 'Sreepur Upazila', '315', 'DSC04798.jpg', 1, 1),
(0, 'mim123', 'Jannat Mim', '123456', 'mim@gmail.com', 2147483647, '1996-12-01', 'Dhaka', 'Dhaka', '1', 'Savar Upazila', '149', '11249237_1435525090084497_1615929507705296585_n.jpg', 1, 1),
(0, 'moon199715', 'Moniruzzaman', '123456', 'moon199715@yahoo.com', 21422223, '1997-08-09', 'Rangpur', 'Nilphamari', '30', 'Nilphamari Sadar', '429', 'moon updateeeee.jpg', 1, 1),
(0, 'nibir123', 'Nibir', '123456', 'nibir@gmail.com', 2147483647, '1996-01-01', 'Khulna', 'Kushtia', '60', 'Bheramara', '310', '20171227_141036.jpg', 1, 1),
(0, 'salman123', 'Salman', '123456', 'salman@gmail.com', 2147483647, '1998-05-05', 'Khulna', 'Kushtia', '60', 'Kushtia Sadar', '306', 'salamn.jpg', 1, 1),
(0, 'sdfasdf5', 'SDfdsf', 'asdgfsdg', 'asha24@gmail.com', 2147483647, '2018-10-17', '', 'Narayanganj', '11', 'Hizla Upazila', '14', '', 0, 1),
(0, 'shuvo123', 'Shuvo', '123456', 'shuvo@gmail.com', 2147483647, '1996-01-01', 'Rangpur', 'Rangpur', '32', 'Rangpur Sadar', '444', 'IMG_20151228_233912.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authority_info`
--
ALTER TABLE `authority_info`
  ADD PRIMARY KEY (`au_id`);

--
-- Indexes for table `authority_review`
--
ALTER TABLE `authority_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `rating_overview`
--
ALTER TABLE `rating_overview`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `authority_info`
--
ALTER TABLE `authority_info`
  MODIFY `au_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `authority_review`
--
ALTER TABLE `authority_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `r_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `rating_overview`
--
ALTER TABLE `rating_overview`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
