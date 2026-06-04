-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 04, 2026 at 12:40 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CRUD_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `publication_year` int NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `genre_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `publication_year`, `cover_image`, `genre_id`, `user_id`, `created_at`) VALUES
(1, 'Laughable Loves', 'Milan Kundera', 'A collection of stories about love, irony, desire and misunderstanding.', 1969, 'laughable_loves.jpeg', 4, 4, '2026-06-03 20:49:44'),
(2, 'The Alchemist', 'Paulo Coelho', 'A symbolic novel about dreams, destiny and a journey to find treasure.', 1988, 'the_alchemist.jpg', 4, 2, '2026-06-03 20:49:44'),
(3, 'Pierre and Luce', 'Romain Rolland', 'A short romantic story set during the First World War.', 1920, 'pierre_and_luce.jpg', 2, 3, '2026-06-03 20:49:44'),
(4, 'Of Mice and Men', 'John Steinbeck', 'A classic story about friendship, dreams and hardship in America.', 1937, 'of_mice_and_men.jpg', 3, 1, '2026-06-03 20:49:44'),
(5, 'Waiting for Godot', 'Samuel Beckett', 'A famous absurdist play about waiting, uncertainty and meaning.', 1952, 'waiting_for_godot.jpg', 2, 2, '2026-06-03 20:49:44'),
(6, 'The Diary of a Young Girl', 'Anne Frank', 'A personal diary written during the Second World War.', 1947, 'the_diary_of_anne_frank.jpg', 5, 3, '2026-06-03 20:49:44'),
(7, 'The Pit and the Pendulum', 'Edgar Allan Poe', 'A dark short story about fear, imprisonment and survival.', 1842, 'the_pit_and_the_pendelulum.jpg', 3, 1, '2026-06-03 20:49:44'),
(8, 'The Picture of Dorian Gray', 'Oscar Wilde', 'A novel about beauty, morality and hidden corruption.', 1890, 'the_picture_of_dorian_grey.jpeg', 3, 2, '2026-06-03 20:49:44'),
(9, 'Les Miserables', 'Victor Hugo', 'A historical novel about justice, poverty, revolution and redemption.', 1862, 'les_miserables.jpg', 3, 3, '2026-06-03 20:49:44'),
(10, 'Romeo and Juliet', 'William Shakespeare', 'A tragedy about young love and family conflict.', 1597, 'romeo_and_juliet.jpg', 2, 1, '2026-06-03 20:49:44'),
(11, 'Animal Farm', 'George Orwell', 'A political allegory about power, revolution and corruption.', 1945, 'animal_farm.jpg', 3, 2, '2026-06-03 20:49:44'),
(12, '1984', 'George Orwell', 'A dystopian novel about surveillance, control and totalitarian power.', 1949, '1984.jpg', 3, 3, '2026-06-03 20:49:44'),
(13, 'The Trial', 'Franz Kafka', 'A novel about guilt, bureaucracy and a mysterious court system.', 1925, 'trial.jpeg', 4, 1, '2026-06-03 20:49:44'),
(14, 'Letter to the Father', 'Franz Kafka', 'A personal letter exploring family, fear and authority.', 1919, 'letter_to_the_fater.jpg', 5, 2, '2026-06-03 20:49:44'),
(15, 'The Metamorphosis', 'Franz Kafka', 'A surreal story about alienation and transformation.', 1915, 'the_metamorphosis.jpeg', 4, 3, '2026-06-03 20:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `description`) VALUES
(1, 'Novel', 'Long fictional books focused on characters, story and society.'),
(2, 'Drama', 'Books and plays written for performance or built around strong dialogue.'),
(3, 'Classic Literature', 'Important older works that are widely read and studied.'),
(4, 'Philosophical Fiction', 'Stories focused on ideas, identity, meaning and human existence.'),
(5, 'Memoir', 'Personal or autobiographical writing based on real experiences.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Alex Carter', 'alex@example.com', '$2y$12$X493IFoUU4qtlPa/ucjv2OhOegxHXfGOEcDF24o1vzkMMEcAsBlPq'),
(2, 'Emma Smith', 'emma@example.com', '$2y$12$X493IFoUU4qtlPa/ucjv2OhOegxHXfGOEcDF24o1vzkMMEcAsBlPq'),
(3, 'Noah Wilson', 'noah@example.com', '$2y$12$X493IFoUU4qtlPa/ucjv2OhOegxHXfGOEcDF24o1vzkMMEcAsBlPq'),
(4, 'admin', 'admin@gmail.com', '$2y$10$QkFGNtXXzr2l7s/HN5ES5./HjPON0QbPK7hOF9R2OHtLVBaSa.XBa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
