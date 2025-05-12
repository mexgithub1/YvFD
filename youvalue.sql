-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 08:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youvalue`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `file` text NOT NULL,
  `category` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `title`, `file`, `category`, `date_created`) VALUES
(1, 'Accepting Jesus in our life will make us Happy', 'Icona Pop - All Night (Lyrics).mp3', 'Normal', '2025-03-07 15:25:27'),
(3, 'You need to let go of your Anxiety', 'Jibbs - Chain Hang Low (Official Music Video).mp3', 'Anxiety', '2025-03-07 15:39:57'),
(6, 'What does the bible says about depression', 'gangsta\'s paradise (instrumental) [edit audio].mp3', 'Depressed', '2025-03-21 21:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark_audio`
--

CREATE TABLE `bookmark_audio` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `audio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmark_audio`
--

INSERT INTO `bookmark_audio` (`id`, `users_id`, `audio_id`) VALUES
(5, 105, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookmark_readables`
--

CREATE TABLE `bookmark_readables` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `readables_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark_video`
--

CREATE TABLE `bookmark_video` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmark_video`
--

INSERT INTO `bookmark_video` (`id`, `users_id`, `video_id`) VALUES
(6, 106, 1),
(8, 105, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `image` text NOT NULL,
  `time` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `code` text NOT NULL,
  `chat_notif` int(1) NOT NULL DEFAULT 1,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `image`, `time`, `code`, `chat_notif`, `date`) VALUES
(34, 106, 108, 'test', '', '2025-03-11 14:35:55', '37723', 1, '2025-03-11'),
(35, 108, 106, 'hello', '', '2025-03-11 14:36:02', '37723', 1, '2025-03-11'),
(36, 106, 108, 'kamusta', '', '2025-03-11 14:36:10', '37723', 1, '2025-03-11'),
(37, 106, 108, 'asdas', '', '2025-03-11 14:43:56', '37723', 1, '2025-03-11'),
(38, 108, 106, 'heyhey', '', '2025-03-11 14:45:38', '37723', 1, '2025-03-11'),
(39, 105, 108, 'hi im godegkola', '', '2025-03-11 14:51:57', '13957', 1, '2025-03-11'),
(40, 105, 108, 'hello', '', '2025-03-21 21:48:25', '13957', 1, '2025-03-21'),
(41, 105, 108, 'Hello my name is Max Marquez I would like to talk with you', '', '2025-04-30 13:14:37', '13957', 1, '2025-04-30'),
(42, 108, 105, 'Hello thank you for reaching out to me how are you feeling right now?', '', '2025-04-30 13:15:06', '13957', 1, '2025-04-30'),
(43, 108, 105, '', '', '2025-04-30 13:15:26', '13957', 1, '2025-04-30'),
(44, 105, 108, 'I\'m feeling a little sad can you help me?', '', '2025-04-30 13:16:36', '13957', 1, '2025-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `chat_code`
--

CREATE TABLE `chat_code` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `scroll` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_code`
--

INSERT INTO `chat_code` (`id`, `sender_id`, `receiver_id`, `code`, `scroll`) VALUES
(5, 106, 108, 37723, 0),
(6, 105, 108, 13957, 0);

-- --------------------------------------------------------

--
-- Table structure for table `depressed`
--

CREATE TABLE `depressed` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `phone_number` text NOT NULL,
  `age` text NOT NULL,
  `gender` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `depressed`
--

INSERT INTO `depressed` (`id`, `fullname`, `email`, `phone_number`, `age`, `gender`, `date_created`) VALUES
(1, 'juan cruz', 'godegkola@gmail.com', '09999999', '26', 'Male', '2025-04-02 07:47:34'),
(2, 'juan cruz2', 'godegkola@gmail.com', '09999999', '26', 'Male', '2025-04-02 07:47:34'),
(3, 'Lovely Villacorte', 'sorar384@gmail.com', '09999999', '23', 'Male', '2025-04-11 13:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` int(11) NOT NULL,
  `questions` text NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  `answers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `questions`, `choice1`, `choice2`, `choice3`, `choice4`, `answers`) VALUES
(21, 'Have you felt sad or down most of the time in the past few days?', 'Not at all', 'Occasionally', 'Sometimes', 'Almost every day', 'Almost every day'),
(22, 'Have you had trouble sleeping or sleeping too much recently?', 'Almost every night', 'Some nights', 'Not at all', 'Rarely', 'Nearly every day'),
(23, 'Have you had difficulty enjoying things you used to find pleasurable?', 'Not at all', 'Some days', 'Rarely', 'Almost every day', 'Almost every day'),
(24, 'Have you been feeling nervous, anxious, or on edge?', 'Rarely', 'Occasionally', 'Never', 'All the times', 'All the times'),
(25, 'Have you been feeling tired or low on energy even after resting?', 'Not at all', 'Almost everyday', 'Sometimes', 'Rarely', 'Almost everyday'),
(26, 'Have you found it difficult to stay focused on what you\'re doing, even simple tasks?', 'Most of the times', 'Not at all', 'Rarely', 'From time to time', 'Most of the times'),
(27, 'Have you been feeling irritable or easily frustrated?', 'A few times', 'Rarely', 'Almost everyday', 'Never', 'Almost everyday'),
(28, 'Have you been withdrawing from social activities or avoiding people?', 'Sometimes', 'Most of the times', 'Rarely', 'Not at all', 'Most of the times'),
(29, 'Have you experienced changes in appetite or eating habits?', 'Sometimes', 'Never', 'Occasionally', 'Almost every day', 'Almost every day'),
(30, 'Have you felt overwhelmed by your responsibilities or daily tasks?', 'Everytime', 'A few times', 'Not at all', 'Occasionally', 'Everytime');

-- --------------------------------------------------------

--
-- Table structure for table `readables`
--

CREATE TABLE `readables` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `file` text NOT NULL,
  `category` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `readables`
--

INSERT INTO `readables` (`id`, `title`, `file`, `category`, `date_created`) VALUES
(1, 'Book about happiness', 'Chapter 1&5-Firesafezone.docx', 'Anxiety', '2025-04-02 07:35:33'),
(2, 'What to do when depressed', 'IM-IPT.pdf', 'Depressed', '2025-04-02 07:35:49'),
(4, 'Foods to help you fight anxiety', 'TWO HEARTS.pdf', 'Anxiety', '2025-04-11 13:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(1) NOT NULL,
  `title` text NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `end_date` date NOT NULL DEFAULT current_timestamp(),
  `hectare` text NOT NULL,
  `type` text NOT NULL,
  `select2` text NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `title`, `start_date`, `end_date`, `hectare`, `type`, `select2`, `total`) VALUES
(9, 'asdasd', '2024-11-17', '2024-11-18', 'Hectare 1', 'Fertilizer', 'Sacks', 0),
(10, 'sdfsdf', '2024-11-17', '2024-11-18', 'Hectare 2', 'Fertilizer', 'Sacks', 0),
(11, 'nnnnnnnnn', '2024-11-21', '2024-11-22', 'Hectare 1', 'Watering', 'Sacks', 6);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `users_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `code`, `users_id`, `score`, `date`) VALUES
(9, '5798879275', 105, 40, '2025-03-21 21:43:23'),
(10, '373501554', 105, 50, '2025-03-21 21:44:25'),
(11, '3712162067', 105, 30, '2025-04-30 11:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `take_students`
--

CREATE TABLE `take_students` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `users_id` int(11) NOT NULL,
  `questionnaires_id` int(11) NOT NULL,
  `answers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `take_students`
--

INSERT INTO `take_students` (`id`, `code`, `users_id`, `questionnaires_id`, `answers`) VALUES
(168, '3712162067', 105, 36, 'Basketball'),
(169, '3712162067', 105, 30, 'Berlin'),
(170, '3712162067', 105, 31, 'Pacific Ocean'),
(171, '3712162067', 105, 33, 'Barometer'),
(172, '3712162067', 105, 38, 'Au'),
(173, '3712162067', 105, 24, 'Jupiter'),
(174, '3712162067', 105, 34, 'Carbon dioxide'),
(175, '3712162067', 105, 40, 'Japan'),
(176, '3712162067', 105, 39, 'Hydrogen'),
(177, '3712162067', 105, 26, 'Giraffe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `middlename` text NOT NULL,
  `phone_number` text NOT NULL,
  `age` text NOT NULL,
  `gender` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `passwordtxt` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `code` int(11) NOT NULL,
  `type` int(1) NOT NULL COMMENT '0=student,1=faculty,2=admin',
  `datetake` date NOT NULL DEFAULT current_timestamp(),
  `totaltake` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `img`, `firstname`, `lastname`, `middlename`, `phone_number`, `age`, `gender`, `email`, `password`, `passwordtxt`, `contact`, `address`, `code`, `type`, `datetake`, `totaltake`) VALUES
(1, 'Barbecued-snags.jpg', 'godeg test', 'kola', '', '', '', '', 'admin@admin.com', '$2y$10$PI0nCdoRms.MjY7epPZVqu67pbH0cyACqwnl3ZGx9qox0R23no0gG', 'admin', '0', '', 22198, 2, '2025-04-30', 0),
(105, 'blank_profile.png', 'Max', 'Marquez', 'ttest', '9878676675', '33', 'Male', 'Maxmarquez123@aup.edu.ph', '$2y$10$IeJ4y2.eNwa4p3UMZu3blOOodVKFxz2zeHfrBv0goCavl.jFm4mzW', '111', '', '', 0, 0, '2025-04-30', 1),
(106, 'blank_profile.png', 'sorar', 'sorar', 'sorar', '', '', '', 'sorar384@gmail.com', '$2y$10$Y8h1jxlcFHSxFtyjvXB5z.qtIhxWAYqdb5zfHQsiNYAgRci7tpkCu', '123', '', '', 0, 0, '2025-04-30', 0),
(108, 'blank_profile.png', 'Guidance', 'Faculty', '', '', '', '', 'faculty2@email.com', '$2y$10$y86IYywbdcKhqW7q0SLLV.rNavSZMgN/.defMImpPpZYEYfJk/TKq', '123', '', '', 0, 1, '2025-04-30', 0),
(110, '', 'test', 'sdfdsf', 'sdfsdf', '09999999', '34', 'Male', 'test@gmail.com', '$2y$10$N3gMznlDluBoCQnGHX.xIepemS8AQwAkEg4Gwg1V26NMYrP.xDWa6', '123', '', '', 0, 0, '2025-04-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `file` text NOT NULL,
  `category` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `file`, `category`, `date_created`) VALUES
(5, 'A short message to depressed people', 'A message to anyone feeling lonely anxious sad or stuck from dr alex george oneminutemessage.mp4', 'Depressed', '2025-04-26 21:55:02'),
(6, 'Am I Depressed?', 'Am I Depressed.mp4', 'Depressed', '2025-04-26 21:59:16'),
(7, 'a prayer for those with depression', 'a prayer for those who struggle with depression pray praying christian bible depression sad.mp4', 'Depressed', '2025-04-26 22:01:20'),
(8, 'Depressed listen to this video', 'Depressed listen to this video.mp4', 'Depressed', '2025-04-26 22:39:32'),
(9, 'Are you believing this lie about depression ', 'Are you believing this lie about depression.mp4', 'Depressed', '2025-04-26 22:40:32'),
(10, 'Are you depressed or just sad this is how to tell ', 'Are you depressed or just sad this is how to tell.mp4', 'Depressed', '2025-04-26 22:43:35'),
(13, 'Bible verse for depression', 'Bible verse for depression.mp4', 'Depressed', '2025-04-26 22:50:52'),
(14, 'What to do when depressed', 'Dealing with depression video ministry.mp4', 'Depressed', '2025-04-26 22:55:53'),
(15, 'Depressed you need to hear this ', 'Depressed you need to hear this.mp4', 'Depressed', '2025-04-26 22:57:25'),
(17, 'Depression is a by product of self love', 'Depression is a by product of self love.mp4', 'Depressed', '2025-04-26 23:01:01'),
(18, 'Emotional trauma you have to see this', 'Emotional trauma you have to see this.mp4', 'Depressed', '2025-04-26 23:03:51'),
(19, 'Feeling low or sad for no reason watch this!', 'Feeling low or sad for no reason.mp4', 'Depressed', '2025-04-26 23:06:36'),
(20, 'Finding strength through music', 'Finding strength through music overcoming depression.mp4', 'Depressed', '2025-04-26 23:08:58'),
(21, 'God cares about your mental health', 'God cares about your mental health.mp4', 'Depressed', '2025-04-26 23:09:41'),
(22, 'God pull me out of this pit', 'God pull me out of this pit.mp4', 'Depressed', '2025-04-26 23:10:34'),
(23, 'God sees the tired you', 'God sees the tired you faith support mental health.mp4', 'Depressed', '2025-04-26 23:11:32'),
(24, 'God wants to deliver you from depression', 'God wants to deliver you from suicidal thoughts and depression-today.mp4', 'Depressed', '2025-04-26 23:12:44'),
(25, 'How christians can cope with depression', 'How christians can cope with depression.mp4', 'Depressed', '2025-04-26 23:13:44'),
(26, 'How to break the depression cycle', 'How to break the depression cycle.mp4', 'Depressed', '2025-04-26 23:14:28'),
(27, 'How to cure depression mentalhealth', 'How to cure depression mentalhealth.mp4', 'Depressed', '2025-04-26 23:15:03'),
(28, 'How to overcome depression 2 timothy 1-7', 'How to overcome depression 2 timothy 1-7.mp4', 'Depressed', '2025-04-27 10:04:38'),
(29, 'How to overcome your depression', 'How to overcome your depression.mp4', 'Depressed', '2025-04-27 10:06:27'),
(30, 'Reach out when you feel depressed', 'How to reach out for help if you are depressed or struggling.mp4', 'Depressed', '2025-04-27 10:07:17'),
(31, 'Watch this video in order to stop overthinking and anxiety ', 'How to stop overthinking and anxiety.mp4', 'Depressed', '2025-04-27 10:08:40'),
(32, 'If you are struggling with low mood', 'If you are struggling with low mood and depression.mp4', 'Depressed', '2025-04-27 10:11:11'),
(33, 'Jesus doesn\'t want us to suffer', 'Jesus doesn\'t want us to suffer.mp4', 'Depressed', '2025-04-27 10:12:26'),
(34, 'Jesus healed me from depression', 'Jesus healed me from depression and anxiety anorexia.mp4', 'Depressed', '2025-04-27 10:13:12'),
(35, 'Overcoming depression dose of society', 'Overcoming depression dose of society.mp4', 'Depressed', '2025-04-27 10:14:37'),
(36, 'Relieve depression with this simple step', 'Relieve depression with this simple step.mp4', 'Depressed', '2025-04-27 10:15:28'),
(37, 'Do we sin when we are depressed?', 'Is depression a sin.mp4', 'Depressed', '2025-04-27 10:15:52'),
(38, 'Prayer to break depression', 'Prayer to break depression christian motivation faith prayer.mp4', 'Depressed', '2025-04-27 10:16:58'),
(39, 'Scriptures for when we feel depressed', 'Scriptures for when we feel depressed.mp4', 'Depressed', '2025-04-27 10:28:14'),
(40, 'The Lord helped me out of depression', 'The Lord helped me out of depression.mp4', 'Depressed', '2025-04-27 10:28:47'),
(41, 'The two steps to cure your depression', 'The two steps to cure your depression.mp4', 'Depressed', '2025-04-27 10:29:20'),
(42, 'Top 5 signs of high functioning depression', 'Top 5 signs of high functioning depression.mp4', 'Depressed', '2025-04-27 10:29:52'),
(43, 'A video on true hope amidst depression ', 'True hope amidst depression.mp4', 'Depressed', '2025-04-27 10:30:22'),
(44, 'What does Jesus say about depression', 'What does Jesus say about depression matthew 5-4.mp4', 'Depressed', '2025-04-27 10:31:26'),
(45, 'What should we do when we are depressed', 'What should a christian do when they are depressed.mp4', 'Depressed', '2025-04-27 10:36:34'),
(46, 'You dont become happy overnight', 'You dont become a saint overnight.mp4', 'Depressed', '2025-04-27 10:37:20'),
(47, 'You\'re not alone in what you are going through', 'You\'re not alone in what you are going through.mp4', 'Depressed', '2025-04-27 10:39:53'),
(54, 'When should you seek help on depression', 'When should you seek help on depression.mp4', 'Depressed', '2025-04-27 10:58:05'),
(55, 'How to deal with depression without medication', 'How to deal with depression without medication.mp4', 'Depressed', '2025-04-27 10:58:20'),
(56, 'A Message to Someone With Suicidal Thoughts', 'A Message to Someone With Suicidal Thoughts.mp4', 'Depressed', '2025-04-27 10:58:55'),
(57, 'Bible verses for depression and hopelessness', 'Bible verses for depression and hopelessness.mp4', 'Depressed', '2025-04-27 10:59:10'),
(58, 'What is depression and how can it be treated', 'Depression What is it and how can it be treated.mp4', 'Depressed', '2025-04-27 10:59:28'),
(59, 'LivingWell on how to Overcome the Depression', 'LivingWell Overcoming Depression.mp4', 'Depressed', '2025-04-27 10:59:46'),
(61, 'This Is a Message for Anyone Considering Suicide', 'Messages for Anyone Considering Suicide, From People Who\'ve Been There.mp4', 'Depressed', '2025-04-27 11:01:59'),
(62, 'YOUR VALUE a very Powerful Motivational Speech for people', 'YOUR VALUE Powerful Motivational Speech.mp4', 'Depressed', '2025-04-27 11:02:36'),
(64, '1 Minute Verse - Depression', '1 Minute Verse - Depression.mp4', 'Depressed', '2025-04-27 11:11:32'),
(65, 'Do you have melancholic depression?', 'Do you have melancholic depression.mp4', 'Depressed', '2025-04-27 11:13:32'),
(66, 'Bible verses on social anxiety', '3 bible verses for insecurity social anxiety people pleasing.mp4', 'Anxiety', '2025-04-27 13:20:52'),
(67, '3 tips to overcome emotional anxiety', '3 tips to overcome emotional anxiety.mp4', 'Anxiety', '2025-04-27 13:21:48'),
(68, '3 tips to overcoming anxiety symptoms', '3 tips to overcoming anxiety symptoms once and for all.mp4', 'Anxiety', '2025-04-27 13:23:49'),
(69, '7 signs of anxiety', '7 signs of anxiety.mp4', 'Anxiety', '2025-04-27 13:24:25'),
(70, '10 bible verses when you need hope', '10 bible verses when you need hope.mp4', 'Anxiety', '2025-04-27 13:24:53'),
(71, '60 seconds of tapping to release anxiety', '60 seconds of tapping to release anxiety.mp4', 'Anxiety', '2025-04-27 13:25:34'),
(72, 'Anxiety and the solution', 'Anxiety and the solution.mp4', 'Anxiety', '2025-04-27 13:26:37'),
(73, 'Anxiety will shape your whole life if you let it', 'Anxiety will shape your whole life if you let it sundayservice anxiety.mp4', 'Anxiety', '2025-04-27 13:27:15'),
(74, 'A prayer for your peace of mind', 'A prayer for your peace of mind.mp4', 'Anxiety', '2025-04-27 13:28:00'),
(75, 'A prayer to break all mental torment', 'A prayer to break all mental torment.mp4', 'Anxiety', '2025-04-27 13:33:24'),
(76, 'Best hack to stop panic attacks anxiety', 'Best hack to stop panic attacks anxiety accupressure.mp4', 'Anxiety', '2025-04-27 13:34:05'),
(77, 'Try to do this Breathing exercise for to help anxiety', 'Breathing exercise for anxiety.mp4', 'Anxiety', '2025-04-27 13:35:32'),
(78, 'Dealing with anxiety alone', 'Dealing with anxiety alone.mp4', 'Anxiety', '2025-04-27 13:36:00'),
(79, 'Dont be afraid of anxiety', 'Dont be afraid of anxiety.mp4', 'Anxiety', '2025-04-27 13:37:30'),
(80, 'Dont quit, God has more for you', 'Dont quit God has more for you.mp4', 'Anxiety', '2025-04-27 13:42:10'),
(81, 'Experiencing morning anxiety listen up', 'Experiencing morning anxiety listen up.mp4', 'Anxiety', '2025-04-27 13:43:11'),
(82, 'Expressing gratitude to god reduces anxiety', 'Expressing gratitude to god reduces anxiety.mp4', 'Anxiety', '2025-04-27 13:43:42'),
(83, 'Feeling depressed anxious or frustrated? Watch this clip', 'Feeling depressed anxious or frustrated.mp4', 'Anxiety', '2025-04-27 13:44:10'),
(84, 'Growing spirituall', 'Growing spirituall.mp4', 'Anxiety', '2025-04-27 13:44:35'),
(85, 'Meditation help to protect you against anxiety', 'How does meditation help to protect you against anxiety.mp4', 'Anxiety', '2025-04-27 13:45:27'),
(86, 'How I overcame the darkness of my anxiety', 'How I overcame the darkness of my anxiety.mp4', 'Anxiety', '2025-04-27 13:46:08'),
(87, 'How to get over your social anxiety', 'How to get over your social anxiety.mp4', 'Anxiety', '2025-04-27 13:46:40'),
(88, 'An advice to people on how to overcome anxiety', 'How to overcome anxiety.mp4', 'Anxiety', '2025-04-27 13:49:08'),
(89, 'How to overcome fear and anxiety? Watch this', 'How to overcome fear and anxiety.mp4', 'Anxiety', '2025-04-27 13:49:41'),
(90, 'How to stop anxiety by mindfulness meditation ', 'How to stop anxiety and overthinking mindfulness meditation metaphor anxiety overthinking.mp4', 'Anxiety', '2025-04-27 13:50:27'),
(91, 'How to stop anxiety', 'How to stop anxiety.mp4', 'Anxiety', '2025-04-27 13:51:35'),
(92, 'If you struggle to feel God\'s presence in your life watch this', 'If you struggle to-feel gods presence in your life watch this.mp4', 'Anxiety', '2025-04-27 13:52:25'),
(93, 'Is anxiety becoming a habit?', 'Is anxiety becoming a habit.mp4', 'Anxiety', '2025-04-27 13:53:37'),
(94, 'Jesus had anxiety', 'Jesus had anxiety.mp4', 'Anxiety', '2025-04-27 13:54:00'),
(95, 'Lets pray about anxiety fear, depression, stress, sleeplessness ', 'Lets pray about anxiety fear depression stress sleeplessness.mp4', 'Anxiety', '2025-04-27 13:54:50'),
(96, 'Lets read Bible verses to overcome anxiety', 'Lets read Bible verses to overcome anxiety.mp4', 'Anxiety', '2025-04-27 14:51:33'),
(97, 'Managing anxiety overload motivational video', 'Managing anxiety overload motivation.mp4', 'Anxiety', '2025-04-27 14:52:58'),
(98, 'Overwhelmed by life discover the rest Jesus promises you', 'Overwhelmed by life discover the rest jesus promises you.mp4', 'Anxiety', '2025-04-27 14:53:54'),
(99, 'Depending on  Jesus', 'Depending on  Jesus.mp4', 'Anxiety', '2025-04-27 14:54:45'),
(100, 'Scriptures for anxiety best bible verses for worry', 'Scriptures for anxiety best bible verses for worry.mp4', 'Anxiety', '2025-04-27 14:56:02'),
(101, 'The best solution to reduce stress anxiety', 'The best solution to reduce stress anxiety.mp4', 'Anxiety', '2025-04-27 14:56:42'),
(102, 'The cure for anxiety', 'The cure for anxiety.mp4', 'Anxiety', '2025-04-27 14:57:20'),
(103, 'These foods fight anxiety', 'These foods fight anxiety.mp4', 'Anxiety', '2025-04-27 14:57:45'),
(104, 'This can free you from anxiety', 'This can free you from anxiety.mp4', 'Anxiety', '2025-04-27 14:58:20'),
(105, 'This is how you stop feeling overwhelmed', 'This is how you stop feeling overwhelmed.mp4', 'Anxiety', '2025-04-27 14:58:55'),
(106, 'Tips for dealing with stress and anxiety', 'Tips for dealing with stress and anxiety.mp4', 'Anxiety', '2025-04-27 14:59:28'),
(107, 'To the christian struggling with anxiety watch this!', 'To the christian struggling with anxiety.mp4', 'Anxiety', '2025-04-27 15:00:08'),
(108, 'How Do I Free Myself From Overthinking', 'How Do I Free Myself From Overthinking.mp4', 'Anxiety', '2025-04-27 15:04:24'),
(109, 'Scriptures for When You Feel Hopeless', 'Scriptures for When You Feel Hopeless.mp4', 'Anxiety', '2025-04-27 15:05:58'),
(110, 'If You\'re Anxious This Message Is For You', 'If You’re Feeling Lost or Anxious, This Message Is For You..mp4', 'Anxiety', '2025-04-27 15:21:51'),
(111, 'How To Relieve Anxiety In One Minute', 'How To Relieve Anxiety In One Minute.mp4', 'Anxiety', '2025-04-27 15:30:19'),
(113, 'Advice For Anyone Who\'s Struggling with Anxiety', 'People With Anxiety & Depression Share Advice For Anyone Who\'s Struggling.mp4', 'Anxiety', '2025-04-27 15:30:58'),
(114, 'God says to not stress. So we should Trust God and let our worries be gone', 'God says to not stress..mp4', 'Anxiety', '2025-04-27 15:39:01'),
(115, 'Trust God when you dont understand', 'Trust God when you dont understand.mp4', 'Anxiety', '2025-04-27 15:39:59'),
(116, 'Turn it over to God the antidote for anxiety', 'Turn it over to God the antidote for anxiety.mp4', 'Anxiety', '2025-04-27 15:40:38'),
(117, '3 encouraging bible verses in psalms', '3 encouraging bible verses in psalms.mp4', 'Normal', '2025-04-27 15:53:13'),
(118, 'A prayer against anxiety', 'A prayer against anxiety.mp4', 'Normal', '2025-04-27 15:54:09'),
(119, 'A prayer for anxiety', 'A prayer for anxiety.mp4', 'Normal', '2025-04-27 15:54:48'),
(120, 'Begin each day by speaking with God', 'Begin each day by speaking with God.mp4', 'Normal', '2025-04-27 15:55:42'),
(121, 'Dealing with tough times', 'Dealing with tough times.mp4', 'Normal', '2025-04-27 15:56:05'),
(122, 'Our Divine purpose in life (A video to inspire you) ', 'Divine purpose.mp4', 'Normal', '2025-04-27 15:56:33'),
(123, 'Gods reality in your life', 'Dont let fear conclude gods reality in your life.mp4', 'Normal', '2025-04-27 15:57:21'),
(124, 'God will bring you through ', 'God will bring you through.mp4', 'Normal', '2025-04-27 15:58:04'),
(125, 'Happiness in the Lord', 'Happiness in the Lord.mp4', 'Normal', '2025-04-27 16:01:25'),
(126, 'How to develop an attitude of gratitude', 'How to develop an attitude of gratitude.mp4', 'Normal', '2025-04-27 16:02:07'),
(127, 'How to overcome worry with Gods words', 'How to overcome worry with Gods words.mp4', 'Normal', '2025-04-27 16:02:41'),
(128, 'How to stay positive during your worst days', 'How to stay positive during your worst days.mp4', 'Normal', '2025-04-27 16:03:15'),
(129, 'If you feel like giving up watch-this', 'If you feel like giving up watch-this.mp4', 'Normal', '2025-04-27 16:03:41'),
(130, 'Jesus on anxiety', 'Jesus on anxiety.mp4', 'Normal', '2025-04-27 16:04:07'),
(132, 'This Bible verse could change your entire day', 'This Bible verse could change your entire day.mp4', 'Normal', '2025-04-27 16:05:34'),
(133, 'This video will show you how to stay motivated', 'This is how to stay motivated.mp4', 'Normal', '2025-04-27 16:06:05'),
(134, 'This video will change your idea about self love', 'This will change your idea of self love.mp4', 'Normal', '2025-04-27 16:06:36'),
(135, 'Watch this to Unlock the power of positive thinking', 'Unlocking the power of positive thinking.mp4', 'Normal', '2025-04-27 16:09:37'),
(136, 'Verse of the day from mercy Isaiah 43 1-2', 'Verse of the day from mercy isaiah 43 1-2.mp4', 'Normal', '2025-04-27 16:10:46'),
(137, 'Watch this if youre sad', 'Watch this if youre sad.mp4', 'Normal', '2025-04-27 16:11:14'),
(138, 'What are your motives for self care', 'What are your motives for self care.mp4', 'Normal', '2025-04-27 16:11:44'),
(139, 'Why meditation is the 1 mental illness cure', 'Why meditation is the 1 mental illness cure.mp4', 'Normal', '2025-04-27 16:12:21'),
(140, 'These are some tips on how to be happier in life', 'How to be happier.mp4', 'Normal', '2025-04-27 16:34:09'),
(141, 'These are the three keys to have a very happy life', '3 keys to a happy life.mp4', 'Normal', '2025-04-27 16:34:49'),
(142, 'The key to a happy life', 'The key to a happy life.mp4', 'Normal', '2025-04-27 16:35:20'),
(143, 'Stop overthinking', 'Stop overthinking.mp4', 'Normal', '2025-04-27 16:35:44'),
(144, 'Avoid worrying', 'Avoid worrying.mp4', 'Normal', '2025-04-27 16:36:19'),
(145, 'Stop worrying with this simple trick', 'Stop worrying with this simple trick.mp4', 'Normal', '2025-04-27 16:36:44'),
(146, '103 year olds advice motivation inspiration mindset', '103 year olds advice motivation inspiration mindset.mp4', 'Normal', '2025-04-27 16:37:30'),
(147, 'One of the main key to happiness is not even trying and eventually you will be happy', 'The key to happiness is not even trying.mp4', 'Normal', '2025-04-27 19:24:36'),
(148, '5 foods that ll make you happy', '5 foods that ll make you happy.mp4', 'Normal', '2025-04-27 19:25:14'),
(149, 'work on yourself first to be happy', 'If you truly want to be happy you need to work on yourself first.mp4', 'Normal', '2025-04-27 19:39:39'),
(150, 'Instant gratitude can improve our mind', 'Instant gratitude.mp4', 'Normal', '2025-04-27 19:40:20'),
(151, 'Practical way to stop negative thoughts on our mind', 'Practical way to stop negative thoughts.mp4', 'Normal', '2025-04-27 19:40:58'),
(152, 'The power of gratitude is a strong thing ', 'The power of gratitude.mp4', 'Normal', '2025-04-27 19:41:31'),
(153, 'Watch this powerful prayer against mental health', 'Powerful prayer against mental health.mp4', 'Normal', '2025-04-27 20:04:36'),
(154, 'How changing my diet transformed my mental health glucose', 'How changing my diet transformed my mental health glucose.mp4', 'Normal', '2025-04-27 20:05:37'),
(155, 'How to improve mental health 3 tips for mental health', 'How to improve mental health 3 tips for mental health.mp4', 'Normal', '2025-04-27 22:08:12'),
(156, 'How to stop overthinking', 'How to stop overthinking.mp4', 'Normal', '2025-04-27 22:08:36'),
(157, 'how to stop overthinking everything in 58 seconds', 'how to stop overthinking everything in 58 seconds.mp4', 'Normal', '2025-04-27 22:09:03'),
(158, 'Mentally weak can strengthen their mind through this technique', 'Mentally weak can strengthen their mind through this technique.mp4', 'Normal', '2025-04-27 22:09:39'),
(159, 'Stop overthinking and focus on now instead on looking at the future and worrying', 'Stop overthinking and focus on now.mp4', 'Normal', '2025-04-27 22:10:06'),
(160, '6 Bible Verses that will make you feel better', '6 Bible Verses that will make you feel better.mp4', 'Normal', '2025-04-27 22:28:20'),
(161, 'DO YOU TRUST GOD EVEN ON HARD TIMES？', 'HIS WAYS, NOT MINE DO YOU TRUST GOD EVEN ON HARD TIMES？.mp4', 'Normal', '2025-04-27 22:30:36'),
(163, 'THE CHOICE (Short Animated Movie)', 'THE CHOICE (Short Animated Movie).mp4', 'Normal', '2025-04-27 22:31:22'),
(164, 'THE GREATEST BIBLE VERSES (Inspirational)', 'THE GREATEST BIBLE VERSES (Inspirational).mp4', 'Normal', '2025-04-27 22:31:58'),
(165, 'THE SEED Inspirational Short Film to calm your mind', 'THE SEED Inspirational Short Film.mp4', 'Normal', '2025-04-27 22:52:22'),
(166, 'the power of CHOICE (a short film to motivate you)', 'the power of CHOICE (a short film to motivate you).mp4', 'Normal', '2025-04-27 22:52:44'),
(167, 'Nothing can separate us from the love of God', 'Nothing can separate us from the love of God.mp4', 'Normal', '2025-04-27 23:06:05'),
(168, 'You deserve to be happy', 'You deserve to be happy.mp4', 'Normal', '2025-04-27 23:13:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmark_audio`
--
ALTER TABLE `bookmark_audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmark_readables`
--
ALTER TABLE `bookmark_readables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmark_video`
--
ALTER TABLE `bookmark_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_code`
--
ALTER TABLE `chat_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depressed`
--
ALTER TABLE `depressed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `readables`
--
ALTER TABLE `readables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `take_students`
--
ALTER TABLE `take_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookmark_audio`
--
ALTER TABLE `bookmark_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookmark_readables`
--
ALTER TABLE `bookmark_readables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookmark_video`
--
ALTER TABLE `bookmark_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `chat_code`
--
ALTER TABLE `chat_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `depressed`
--
ALTER TABLE `depressed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `readables`
--
ALTER TABLE `readables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `take_students`
--
ALTER TABLE `take_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
