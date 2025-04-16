-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2025 at 02:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_Website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COM_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `comment_name`, `comment_msg`, `comment_mail`, `comment_Website`, `COM_time`) VALUES
(4, 1, 'fsdeafasdf', 'ejhgygdjugfjx', 'ashrafns@gmail.com', '', '2023-10-14 20:29:08'),
(5, 1, 'fsdeafasdf', 'gsdfhgwrtyht4wreytw', 'ashrafns@gmail.com', '', '2023-10-14 20:29:08'),
(6, 1, 'fsdeafasdf', 'Erewqr weqr weqrwer', 'ashrafns@gmail.com', '', '2023-10-14 20:30:01'),
(7, 1, 'ashraf', 'تصميم جميل لمبرمج راثع', 'ashrafns@gmail.com', '', '2023-10-14 21:06:05'),
(8, 2, 'samir', 'fsdagfsdafas', 'ashrafns@gmail.com', '', '2023-10-14 21:59:44'),
(9, 2, 'ahmed', 'how are you', 'ashrafns@gmail.com', '', '2023-10-14 22:02:52'),
(10, 2, 'mona', 'fasdfdasfsdafasdf', 'ashrafns@gmail.com', '', '2023-10-14 22:10:41'),
(11, 2, 'mona', 'fasdfdasfsdafasdf', 'ashrafns@gmail.com', '', '2023-10-14 22:10:41'),
(12, 3, 'adel ', 'السام عليكم ورحمة الله وبركاته ', 'adel@gmail.com', '', '2023-10-15 21:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `postImg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postCont` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subPostCont` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `postTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `postImg`, `postCont`, `subPostCont`, `postTitle`, `subTitle`, `postTime`) VALUES
(1, 'blog-3.jpg', 'Clita duo sadipscing amet ea ut kasd amet dolore, sed erat at dolore vero tempor et sit amet, amet amet elitr et consetetur ea duo. Gubergren tempor rebum clita at sit diam. Ea sadipscing voluptua et sit diam diam sed, gubergren magna ipsum lorem clita dolores nonumy dolor. Gubergren duo invidunt elitr amet labore dolores justo sanctus nonumy. Accusam diam tempor at ea clita dolores dolor et ipsum, dolor voluptua consetetur gubergren sit, no consetetur kasd vero invidunt clita dolore elitr eos, accusam amet et labore sed sadipscing accusam labore dolores. Eirmod no lorem sed dolor nonumy consetetur tempor sed ashraf', 'Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor invidunt at est sanctus sanctus. Clita dolores sit kasd diam takimata justo diam lorem sed. Magna amet sed rebum eos. Clita no magna no dolor erat diam tempor rebum consetetur, sanctus labore sed nonumy diam lorem amet eirmod. No at tempor sea diam kasd, takimata ea nonumy elitr sadipscing gubergren erat. Gubergren at lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam dolores takimata dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna sea at sed et eos. Accusam eirmod kasd lorem clita sanctus ut consetetur et. Et duo tempor sea kasd clita ipsum et. Takimata kasd diam justo est eos erat aliquyam et ut. Ea sed sadipscing no justo et eos labore, gubergren ipsum magna dolor lorem dolore, elitr aliquyam takimata sea kasd dolores diam, amet et est accusam labore eirmod vero et voluptua. Amet labore clita duo et no. Rebum voluptua magna eos magna, justo gubergren labore sit voluptua eos. Dolores et no stet magna et gubergren amet dolor sit, lorem dolore est vero et.', 'العنوان الاول ', 'Est dolor lorem et ea', '2023-10-11 17:18:07'),
(2, 'blog-2.jpg', 'الموضوع الثاني  fow,w ;,jd ', '', 'العنوان الثاني ', '', '2023-10-11 17:38:06'),
(3, 'blog-1.jpg', 'الموضوع الثالث', NULL, 'العنوان الثالث', NULL, '2023-10-11 18:31:56'),
(5, '357ـblog-4.jpg', 'يقوم السملمون بصيام رمضان', 'ياتي بعد رمضان عيد الفطر ', 'في رمضان', 'صيام رمضان', '2023-10-13 19:00:42'),
(6, '204ـblog-6.jpg', 'vsdfgstghfehytrehetr', '', 'العنوان الخامس', '', '2023-10-13 19:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userImg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userBaio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twiiter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instgram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `userImg`, `userBaio`, `twiiter`, `facebook`, `linkedin`, `instgram`, `address`, `email`, `phone`, `password`) VALUES
(1, 'ذوالنون أحمد نايل', '319ـzan.png', 'Justo stet no accusam stet invidunt sanctus magna clita vero eirmod, sit sit labore dolores lorem. Lorem at sit dolor dolores sed diam ashraf ali ', 'https://twitter.com/ActionMa3Waleed', 'https://www.facebook.com/ActionMa3Waleed/', 'https://sa.linkedin.com/in/mohammed-alshaikh-813bb6247', 'https://www.amazon.sa/ref=nav_logo', '123 Street, New York, USA', 'info@example.com', '+012 345 6789', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
