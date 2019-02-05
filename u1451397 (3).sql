-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 01:12 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1451397`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `course_ID` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `number` int(16) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_ID`, `name`, `course_ID`, `email`, `number`, `gender`) VALUES
(57, 'king', 5, 'chams@hotmail.com', 2147483647, 'male'),
(63, 'hrtget', 1, 'fwefw', 0, 'male'),
(57, 'king', 5, 'chams@hotmail.com', 2147483647, 'male'),
(63, 'hrtget', 1, 'fwefw', 0, 'male'),
(57, 'king', 5, 'chams@hotmail.com', 2147483647, 'male'),
(63, 'hrtget', 1, 'fwefw', 0, 'male'),
(57, 'king', 5, 'chams@hotmail.com', 2147483647, 'male'),
(63, 'hrtget', 1, 'fwefw', 0, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_ID` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `course_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_ID`, `course_name`, `course_description`) VALUES
(1, 'numeracy', 'In our highly technical world numeracy skills, particularly the ability to interpret data, are becoming increasingly important and are highly sought after by employers. A lack of mathematical confidence and poor numeracy skills are barriers to employment as numeracy tests are increasingly part of the recruitment process, often early on.'),
(2, 'literacy ', ' Literacy is delivered with real life dialogue, discussions, negotiations and conversations. It has a full range of computer-based activities including listening tasks, text display options, speaking and conversation exercises.'),
(3, 'woodwork', 'From building your own bookcases and wooden stools to carrying out beautiful carvings on house decorations and artwork, woodwork is both interesting and challenging, although its common to stereotype it as a bit dull and too much hard work.'),
(4, ' metal work', 'Learn the basic skills for working with new and scrap metals whilst exploring sculptural or applied ideas. Welding, gas cutting, grinding and safe workshop practice are covered. Work on personal or tutor led projects. It is essential to wear old clothes and strong footwear.'),
(5, 'upholstery', 'basic upholstery about recovering and chair repairs. Subjects covered include drop in seats and fixed seats, using traditional materials. Students can bring in their own item of furniture or the teacher can provide a sample for them to work on.'),
(6, 'gardening', 'If you want to learn more about gardening, this course could be just what you\'re looking for. From a workshop at a local garden lasting a few hours to a formal course at college leading to recognised qualification.'),
(7, 'IT', 'ever wanted to make a website, maybe program some software or even own your own IT business? well this IT will be the starting point of a new career towards the IT industry');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `director_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`director_id`, `first_name`, `last_name`) VALUES
(1, 'Steven', 'Spielberg'),
(2, 'Martin', 'Scorcese'),
(3, 'Debra', 'Granik'),
(4, 'George', 'Lucas'),
(5, 'Robert', 'Zemeckis');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `user_ID` int(11) UNSIGNED NOT NULL,
  `gender` text NOT NULL,
  `licence_id` int(12) UNSIGNED NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `contact_number` int(12) NOT NULL,
  `dateofbirth` date NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`user_ID`, `gender`, `licence_id`, `email_address`, `contact_number`, `dateofbirth`, `picture`) VALUES
(17, 'female', 1, 'helen24@hotmail.co.uk', 2147483647, '0000-00-00', 'helenlicence.jpg'),
(24, 'male', 1, 'willsmith@barnet.co.uk', 2082664000, '0000-00-00', 'willlicence.jpg'),
(26, 'male', 3, 'pokedude4@hotmail.co.uk', 2147483647, '0000-00-00', 'newdriveradd.jpg'),
(27, 'male', 2, 'marinov@hotmail.co.uk', 2147483647, '2018-03-22', 'marinozlicence.jpg'),
(29, 'male', 2, 'clarke4@hotmail.co.uk', 2147483647, '2018-03-14', 'clarkelicence.png'),
(30, 'female', 1, 'morgan@hotmail.com', 2147483647, '2018-03-15', 'morganlicence.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `film_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `year` varchar(4) NOT NULL,
  `director_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`film_id`, `title`, `year`, `director_id`) VALUES
(1, 'Jaws', '1975', 1),
(2, 'Mean Streets', '1973', 2),
(3, 'Who Framed Roger Rabbit', '1988', 5),
(4, 'Forrest Gump', '1994', 5),
(5, 'Star Wars', '1977', 4),
(6, 'Back to the Future', '1985', 5);

-- --------------------------------------------------------

--
-- Table structure for table `film_genre`
--

CREATE TABLE `film_genre` (
  `film_id` int(10) UNSIGNED NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film_genre`
--

INSERT INTO `film_genre` (`film_id`, `genre_id`) VALUES
(5, 1),
(6, 1),
(1, 2),
(2, 2),
(2, 3),
(3, 4),
(4, 4),
(3, 5),
(1, 6),
(5, 6),
(6, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_ID` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `image` varchar(80) NOT NULL,
  `year` int(4) NOT NULL,
  `ageRating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_ID`, `name`, `image`, `year`, `ageRating`) VALUES
(1, 'megaman 3', 'images/megaman5.jpg', 2002, 3),
(2, 'sonic colours', 'images/soniccolors.png', 2012, 3),
(3, 'little big planet', 'images/littlebplanet.jpg', 2011, 7),
(4, 'gears of war 2', 'images/gears.jpg', 2012, 18),
(5, 'total drama world tour', 'images/totaldrama.jpg', 2009, 3),
(6, 'pokemon omega', 'images/omega.png', 2014, 7),
(7, 'Doubutsu no Mori', 'images/jap.png', 2012, 3),
(8, 'little king\'s story', 'images/king.jpg', 2009, 3);

-- --------------------------------------------------------

--
-- Table structure for table `game_genre`
--

CREATE TABLE `game_genre` (
  `genre_ID` int(11) NOT NULL,
  `game_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_genre`
--

INSERT INTO `game_genre` (`genre_ID`, `game_ID`) VALUES
(1, 2),
(2, 1),
(2, 8),
(3, 4),
(4, 3),
(4, 6),
(4, 7),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `game_platform`
--

CREATE TABLE `game_platform` (
  `platform_ID` int(11) NOT NULL,
  `game_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_platform`
--

INSERT INTO `game_platform` (`platform_ID`, `game_ID`) VALUES
(1, 1),
(2, 3),
(2, 5),
(3, 4),
(4, 6),
(4, 7),
(5, 2),
(5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_ID` int(10) UNSIGNED NOT NULL,
  `genreName` varchar(30) NOT NULL,
  `genreDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_ID`, `genreName`, `genreDescription`) VALUES
(1, 'arcade', 'requires players to use quick reflexes, accuracy, and timing to overcome obstacles. Arcade games often have short levels, simple and intuitive control schemes, and rapidly increasing difficulty.'),
(2, 'action-adventure', 'Action-adventure games tend to focus on exploration and usually involve item gathering, simple puzzle solving, and combat.'),
(3, 'shooter', 'A shooter game focuses primarily on combat involving projectile weapons, such as guns and missiles. They can also be divided into 2D, first-person and third-person shooters.'),
(4, 'RPG', 'Players control a central game character, or multiple game characters, usually called a party, and attain victory by completing a series of quests or reaching the conclusion of a central storyline. Players explore a game world, while solving puzzles and engaging in tactical combat. A key feature of the genre is that characters grow in power and abilities, and characters are typically designed by the player.'),
(5, 'sports', 'Sports are games that play competitively one team containing or controlled by you, and another team that opposes you.');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `job_description` mediumtext NOT NULL,
  `start_time` varchar(6) NOT NULL,
  `end_time` varchar(6) NOT NULL,
  `start_date` date NOT NULL,
  `expiry` date NOT NULL,
  `user_ID` int(11) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `company_name`, `job_title`, `job_description`, `start_time`, `end_time`, `start_date`, `expiry`, `user_ID`, `admin_id`, `status`) VALUES
(93, 'marks and spencer', 'vacfvab', 'Upholding a positive brand image and providing excellent customer service at all times.\r\n\r\nManaging cash and card transactions effectively in accordance to company procedures.\r\n Delivering products safely and securely, avoiding unnecessary risks by adhering to all safety and security policies.\r\n\r\nWorking as part of the marks Delivery Driver Team.', '03:43', '03:44', '2018-02-28', '2018-03-02', 17, 18, 'waiting to be accepted'),
(94, 'marks and spencer', 'vacfvab', 'Upholding a positive brand image and providing excellent customer service at all times.\r\n\r\nManaging cash and card transactions effectively in accordance to company procedures.\r\n Delivering products safely and securely, avoiding unnecessary risks by adhering to all safety and security policies.\r\n\r\nWorking as part of the marks Delivery Driver Team.', '23:03', '23:02', '2018-03-12', '2018-03-27', 17, 18, 'Waiting to be accepted'),
(95, 'marks and spencer', 'driver', 'Upholding a positive brand image and providing excellent customer service at all times.\r\n\r\nManaging cash and card transactions effectively in accordance to company procedures.\r\n Delivering products safely and securely, avoiding unnecessary risks by adhering to all safety and security policies.\r\n\r\nWorking as part of the marks Delivery Driver Team.', '04:05', '03:45', '2018-03-29', '2018-03-31', 24, 18, 'Waiting to be accepted'),
(96, 'marks and spencer', 'vacfvab', 'Upholding a positive brand image and providing excellent customer service at all times.\r\n\r\nManaging cash and card transactions effectively in accordance to company procedures.\r\n Delivering products safely and securely, avoiding unnecessary risks by adhering to all safety and security policies.\r\n\r\nWorking as part of the marks Delivery Driver Team.', '23:03', '23:32', '2018-03-30', '2018-04-01', 17, 18, 'Waiting to be accepted'),
(97, 'marks and spencer', 'sadva', 'Upholding a positive brand image and providing excellent customer service at all times.\r\n\r\nManaging cash and card transactions effectively in accordance to company procedures.\r\n Delivering products safely and securely, avoiding unnecessary risks by adhering to all safety and security policies.\r\n\r\nWorking as part of the marks Delivery Driver Team.', '03:32', '23:23', '2018-03-30', '2018-04-01', 24, 18, 'waiting to be accepted'),
(100, 'marks and spencer', 'svgre', 'Upholding a positive brand image and providing excellent customer service at all times.\r\n\r\nManaging cash and card transactions effectively in accordance to company procedures.\r\n Delivering products safely and securely, avoiding unnecessary risks by adhering to all safety and security policies.\r\n\r\nWorking as part of the marks Delivery Driver Team.', '03:24', '04:23', '2018-04-15', '2018-04-24', 27, 18, 'Waiting to be accepted'),
(106, 'argos', 'qwerty', 'qwerty', '10:10', '10:10', '2018-04-27', '2018-04-28', 24, 23, 'Job has been accepted'),
(107, 'argos', 'jkhg', 'jhgjk', '10:10', '01:00', '2018-04-27', '2018-04-28', 30, 23, 'Waiting to be accepted'),
(114, 'marks and spencer', 'delivery driver', 'Upholding a positive brand image and providing excellent customer service at all times.\r\n\r\nManaging cash and card transactions effectively in accordance to company procedures.\r\n Delivering products safely and securely, avoiding unnecessary risks by adhering to all safety and security policies.\r\n\r\nWorking as part of the mark\'s Delivery Driver Team.', '23:32', '04:05', '2018-04-30', '2018-07-09', 17, 18, 'Waiting to be accepted'),
(115, 'marks and spencer', 'driving assistant', 'Parts Delivery Driver key responsibilities:\r\nYou will be responsible for delivering parts to both individual customers and trade clients as well as assisting with moving vehicles around the group. This will involve: \r\n\r\nPicking and posting orders \r\nCollect and Deliver parts and packages across the country \r\nRepresent the business in a professional and courteous manner \r\nSuccessful upkeep of company mandatory paperwork \r\nAdhoc Driver duties \r\n\r\nThe ideal Parts Delivery Driver:\r\nPrevious driving experience desired \r\nFlexible \r\nHard working \r\nHighly motivated & physically capable of working in a fast paced environment \r\nA clean UK Driving Licence', '23:32', '23:23', '2018-06-05', '2018-07-27', 24, 18, 'Waiting to be accepted');

-- --------------------------------------------------------

--
-- Table structure for table `licence`
--

CREATE TABLE `licence` (
  `licence_id` int(12) UNSIGNED NOT NULL,
  `licence_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `licence`
--

INSERT INTO `licence` (`licence_id`, `licence_type`) VALUES
(1, 'Class2'),
(2, 'Forklift'),
(3, 'CatA2'),
(4, 'CatB'),
(5, 'D1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_ID` int(11) UNSIGNED NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_ID`, `username`, `password`) VALUES
(1, '123', '123'),
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `platform_ID` int(10) UNSIGNED NOT NULL,
  `platformName` varchar(15) NOT NULL,
  `platformDescription` text NOT NULL,
  `platformImage` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`platform_ID`, `platformName`, `platformDescription`, `platformImage`) VALUES
(1, 'gameboy', 'Packing a huge amount of power into a tiny package, this little console proved a revolution in videogaming when it launched in Japan in 1989. Since then, this pocket-sized system has sold over 100 million units', 'images/gameboyplat.png'),
(2, 'ps3', 'First arriving in 2006, the PlayStation 3 has gone from strength to strength and firmly established itself as a favourite amongst gamers the world over!', 'images/ps3.png'),
(3, 'xbox 360', 'Xbox 360 brings you a total games and entertainment experience. The largest library of games, including titles that get you right into the thick of it with Kinect. Plus, your whole family can watch HD movies, TV shows, live events, music, sports and more across all your devices.', 'images/xbox360.jpg'),
(4, '3DS', 'Nintendo 3DS is your handheld portal to a world of amazing games and features, allowing you to connect with friends and the global Nintendo community with sharing options like never before. Take your handheld gaming experience to another dimension with Nintendo 3DS', 'images/3ds.png'),
(5, 'wii', 'The Nintendo Wii Console comes with a motion sensitive remote which translates your movements directly onto the on screen activity. it offers big fun at a mini price. It comes packed with a red Wii Remote Plus controller and nunchuk accessory, Plug it in and play!', 'images/wii.png');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_ID` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `occupation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_ID`, `name`, `username`, `password`, `email`, `occupation`) VALUES
(2, 'west yorkshire Mr', 'cooldude', 'test', 'pokedude4@hotmail.co.uk', 'manager'),
(3, 'greggs', 'test', '1', 'starnursing@hotmail.com', 'manager'),
(7, 'james', 'cooldude178993', 'diamond', 'boss@hotmail.com', 'manager'),
(8, 'maths', 'pokemon', '123', 'chasm@hotmail.com', 'assistant'),
(9, 'chris', '123', 'diamond', 'pokedude4@hotmail.co.uk', 'manager'),
(10, 'chris', '123', 'diamond', 'pokedude4@hotmail.co.uk', 'manager'),
(11, 'west yorkshire Mr', 'test', '123', 'starnursing@hotmail.com', 'manager'),
(12, 'clive chudi', 'cooldude17', 'diamond', 'pokedude4@hotmail.co.uk', 'manager'),
(16, 'clive nkwo', 'testing', '12', 'clivette17@hotmail.com', 'assistant'),
(17, '123', '123', '123', '123', 'manager'),
(18, 'test', 'test', 'test', 'test', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `occupation` varchar(40) NOT NULL,
  `company` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `firstname`, `surname`, `username`, `password`, `occupation`, `company`) VALUES
(17, 'Helen', 'Jones', 'abc', '900150983cd24fb0d6963f7d28e17f72', 'driver', 'N/A'),
(18, 'James', 'Green', '12', 'c20ad4d76fe97759aa27a0c99bff6710', 'Client', 'marks and spencer'),
(23, 'chris', 'salon', 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 'Client', 'argos'),
(24, 'Will', 'Smith', '345', 'd81f9c1be2e08964bf9f24b15f0e4900', 'driver', 'N/A'),
(27, 'marinov', 'ason', 'cooldude17', '75c6f03161d020201000414cd1501f9f', 'driver', 'N/A'),
(28, 'Deborah', 'Okangi', 'www', '4eae35f1b35977a00ebd8086c259d4c9', 'driver', 'N/A'),
(29, 'clarke', 'jordan', 'zam', '142cb104bb9ea93530eeb1a904e351c2', 'driver', 'N/A'),
(30, 'morgan', 'sarah', 'rrr', '44f437ced647ec3f40fa0841041871cd', 'driver', 'N/A'),
(31, 'sarah', 'gray', '444', '550a141f12de6341fba65b0ad0433500', 'driver', 'N/A'),
(32, 'sammy', 'rich', 'pop', 'b21afc54fb48d153c19101658f4a2a48', 'Client', 'toys r us'),
(33, 'charlie', 'white', 'beb', '5be372d4352c9807436913fcd665e652', 'Client', 'john lewis'),
(34, 'mark', 'jones', 'neb', '6dc494f7895b68556766dd8bd6db671d', 'driver', 'N/A'),
(35, 'jake', 'bounce', '666', 'fae0b27c451c728867a567e8c1bb4e53', 'driver', 'N/A'),
(36, 'Charlotte', 'Clark', 'Charlotte9', '6e8a5d405229ad564bc7563d5fbbf3b9', 'driver', 'N/A'),
(37, 'Steve', 'Gyekye', 'Gyekye.10', 'e241b82da9bcda302feb2fee47e9ad2b', 'Client', 'Gyekye INC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_ID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `licence_id` (`licence_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_ID`);

--
-- Indexes for table `game_genre`
--
ALTER TABLE `game_genre`
  ADD PRIMARY KEY (`genre_ID`,`game_ID`);

--
-- Indexes for table `game_platform`
--
ALTER TABLE `game_platform`
  ADD PRIMARY KEY (`platform_ID`,`game_ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`licence_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`platform_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `game_platform`
--
ALTER TABLE `game_platform`
  MODIFY `platform_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `licence`
--
ALTER TABLE `licence`
  MODIFY `licence_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `platform`
--
ALTER TABLE `platform`
  MODIFY `platform_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`licence_id`) REFERENCES `licence` (`licence_id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `driver` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
