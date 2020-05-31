-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2020 at 01:39 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `resort_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_description` varchar(700) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog_description`, `date`) VALUES
(1, 'Resort Beach Party', 'Resort beach party is organized by our resort every Sunday. In this party guests enjoy free food and games like passing the parcel, playing volleyball and many more. Guests can also bring their children to spend some quality time with them. They can enjoy playing and dancing with their love ones.', '0000-00-00'),
(2, 'Swimming Competition for guests', 'Our resort is the only one who organize the swimming competition for their guests on the last day of every month. Guests can register and enjoy this event and they also get a chance to win expensive gifts. ', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `book_restaurant`
--

CREATE TABLE `book_restaurant` (
  `id` int(11) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_tour`
--

CREATE TABLE `book_tour` (
  `tour_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `firstname`, `lastname`, `phone`, `email`) VALUES
(1, 'rose ', 'hazze', 987645778, 'ccc@ghaghsg.com'),
(4, 'logan', 'paul', 657890423, 'amsnan@nsjkn.com'),
(5, 'rose ', 'haze', 1223566, 'dda@sda.com'),
(6, 'john', 'smith', 987656783, 'dd@sdsd.com'),
(16, 'rose ', 'haze', 1223566, 'dda@sda.com');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'John Mathew', 'john@gmail.com', 987664423, 'sdxsdsadsa'),
(4, 'Helen Jose', 'cdd@gmail.com', 1223566, 'event booking query'),
(5, 'Will Smith', 'dda@sda.com', 2329484, 'room booking'),
(6, 'Mona Singh', 'dda@sda.com', 12231112, 'booking confirmation'),
(7, 'noor', 'noor@andjk.com', 11234334, 'Dinner Reservaion');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `personcount` int(11) NOT NULL,
  `food` varchar(255) NOT NULL,
  `decoration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `personcount`, `food`, `decoration`) VALUES
(12, 'Ring ceremony', '1999-07-05', 56, 'vegetarian', 'classical'),
(17, 'Jobparty', '2019-04-08', 9000, 'vegetarian', 'classical'),
(19, 'Ring ceremony', '2019-04-07', 9000, 'non-veg', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `first_name`, `last_name`, `email`, `comment`, `date`) VALUES
(1, '', '', 'mannn@gmail.com', 'hello nav', '2020-03-24'),
(2, '', '', 'nav@gmail.com', 'good staff service', '2020-03-28'),
(4, 'Aman', 'Gill', 'aman@gmail.com', 'I enjoyed swimming event that your resort organized last month.', '2020-03-28'),
(5, '', '', 'nav', 'fhbj', '2020-04-01'),
(6, '', '', 'nav@gmail.com', 'fhbj hgvhgvjh vhgvhnb', '2020-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`id`, `name`, `description`) VALUES
(1, 'EXECUTIVE CHEF', 'Executive chef is the head chef of the kitchen. He is the one who creates the specials menu for the day, orders the foods that will be used  for the preparation,\r\n					and works as the general manager of the kitchen for managing all the activity in the kitchen area.\r\n					He probably does the scheduling, the hiring, and the firing of kitchen staff, as well.'),
(2, 'RESTAURANT MANAGER', 'This person has  a number of responsibilities in the day to day  for managing the various functionality and working of a restaurant.\r\n					Qualifications required to be a restaurant manager include basics, such as people skills, organization and also hospitality.'),
(3, 'MAINTENANCE', 'Maintenance workers, also known as repair workers, fix and maintain mechanical equipment, buildings, and machines.\r\n					Tasks include plumbing work, painting, flooring repair and electrical repairs and heating and air conditioning system maintenance.'),
(4, 'HOST/HOSTESS', 'The general job of a restaurant host is to meet, greet, and seat customers with their respective bookings.\r\n					Therefore it is an excellent entry-level job for someone without a lot of restaurant experience in this field.\r\n					The host should be friendly and courteous, as well as organized and comfortable multi-tasking, knowing how to handle busy shifts.');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descrip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `type`, `building`, `availability`) VALUES
(1, 'family', 'F', 'avilable'),
(2, 'Small', 'G', 'not avilable'),
(3, 'Medium', 'J', 'not available'),
(4, 'couple', 'K', 'avilable'),
(5, 'party', 'L', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `descrip` text,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `image`, `name`, `descrip`, `price`) VALUES
(1, NULL, 'Sky Diving', 'If at first you don\'t succeed better pass on on this tour', 100),
(2, NULL, 'Diving with sharks', 'Get a thrill of your life and test your luck', 100),
(22, '2', '3', '4', 5),
(23, 'v', 'b', 'n', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_restaurant`
--
ALTER TABLE `book_restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id` (`client_id`),
  ADD KEY `restaurant_id` (`rest_id`);

--
-- Indexes for table `book_tour`
--
ALTER TABLE `book_tour`
  ADD PRIMARY KEY (`tour_id`,`client_id`),
  ADD KEY `fk_tours_id` (`client_id`) USING BTREE,
  ADD KEY `fk_clients_id` (`tour_id`) USING BTREE;

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `book_restaurant`
--
ALTER TABLE `book_restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_restaurant`
--
ALTER TABLE `book_restaurant`
  ADD CONSTRAINT `clients_id` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `restaurant_id` FOREIGN KEY (`rest_id`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `book_tour`
--
ALTER TABLE `book_tour`
  ADD CONSTRAINT `fk_tours_has_clients_clients1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tours_has_clients_tours` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
