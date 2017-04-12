--
-- Database: `kwntu`
--

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `genre_slug`, `created_at`, `updated_at`) VALUES
(1, 'classics', 'classics', '2017-04-11 16:04:11', '2017-04-11 16:05:06'),
(2, 'fantasy', 'fantasy', '2017-04-11 16:05:32', '2017-04-11 16:05:32'),
(3, 'history', 'history', '2017-04-11 16:05:59', '2017-04-11 16:05:59'),
(4, 'horror', 'horror', '2017-04-11 16:06:21', '2017-04-11 16:06:21'),
(5, 'humor', 'humor', '2017-04-11 16:06:34', '2017-04-11 16:06:34'),
(6, 'poetry', 'poetry', '2017-04-11 16:06:49', '2017-04-11 16:06:49'),
(7, 'romance', 'romance', '2017-04-11 16:07:06', '2017-04-11 16:07:06'),
(8, 'science fiction', 'science-fiction', '2017-04-11 16:07:45', '2017-04-11 16:07:45'),
(9, 'short story', 'short-story', '2017-04-11 16:08:05', '2017-04-11 16:08:05');

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `member_fname`, `member_lname`, `member_addr`, `member_dbirth`, `member_gender`, `created_at`, `updated_at`) VALUES
(1, 'Marlon', 'Buella', 'ESCOPA II Project 4', NULL, 'o', '2017-04-10 15:16:14', '2017-04-10 15:16:14'),
(2, 'Juan', 'dela Cruz', NULL, NULL, 'o', '2017-04-10 16:09:37', '2017-04-10 16:09:37'),
(3, 'Maria', 'delos Santos', 'Meycauayan, Bulacan', '1995-09-20', 'o', '2017-04-11 11:54:48', '2017-04-11 11:54:48');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_pword`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mbuella', 'marlon.b.buella@gmail.com', '$2y$10$Pco0VEjsTDDZ9Km0jn./2equaWcMNMJdcotkO33rfImQ05jGCMsRe', '1', '3raxUZhEQQ8mn8zDYhxcweAxhlY4Btv58Pg0GwZQXOKaI0C3sLKstawxA7vg', '2017-04-10 15:16:14', '2017-04-10 15:16:14'),
(2, 'jdlacruz17', 'jdlacruz@email.com', '$2y$10$LtOZ2V3wLSD6ALnO/A01w.6JJDKkfoAjRLHK4UlmU3ri/.VbOhfeC', '1', 'ibvd3aWoa3eEgBulHnFoj3RoHhdLwM2d4d5e3vnJBwwzZh7stg1XzSGqf2RF', '2017-04-10 16:09:37', '2017-04-10 16:09:37'),
(3, 'mdsantos30', 'mdsantos@email.com', '$2y$10$hNGtaea5E.bQdYQt103t1O2RSp4Cc5jY8xRVVnEXEitcIxBRXY8fe', '1', 'HNKxY5ZLksxa2I4kUZk4RoShJUZkHWivxxOzyT0mu1U7ev2hJ7Sse58aKxUX', '2017-04-11 11:54:48', '2017-04-11 11:54:48');
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
