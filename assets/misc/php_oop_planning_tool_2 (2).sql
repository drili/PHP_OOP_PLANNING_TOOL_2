-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 02. 07 2023 kl. 11:10:34
-- Serverversion: 10.1.28-MariaDB
-- PHP-version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_oop_planning_tool_2`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_cvr` int(11) NOT NULL,
  `customer_color` varchar(255) NOT NULL,
  `customer_hourly_rate` int(11) NOT NULL,
  `customer_enabled` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_cvr`, `customer_color`, `customer_hourly_rate`, `customer_enabled`) VALUES
(1, 'hawdaha 1', 124151, '#e3e3e3', 1000, 1),
(2, 'hawda 2', 124151, '#f0f8ff', 1000, 1),
(3, 'hawdawd 3', 124151, '#7fffd4', 1000, 1),
(4, 'hq32dad', 124151, '#8a2be2', 1000, 1),
(5, 'w4daa', 124151, '#ff7f50', 1000, 1),
(6, 'hawdawd awda', 124151, '#ee82ee', 1000, 1),
(7, 'yqeawd awd', 124151, '#00ff7f', 1000, 1),
(8, 'yqeawd aw 8', 124151, '#b8860b', 1000, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `sprints`
--

CREATE TABLE `sprints` (
  `sprint_id` int(11) NOT NULL,
  `sprint_name` varchar(255) NOT NULL,
  `sprint_month` int(11) NOT NULL,
  `sprint_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `sprints`
--

INSERT INTO `sprints` (`sprint_id`, `sprint_name`, `sprint_month`, `sprint_year`) VALUES
(1, 'January 2023', 1, 2023),
(2, 'February 2023', 2, 2023),
(3, 'March 2023', 3, 2023),
(4, 'April 2023', 4, 2023),
(5, 'May 2023', 5, 2023),
(6, 'June 2023', 6, 2023),
(7, 'July 2023', 7, 2023),
(8, 'August 2023', 8, 2023),
(9, 'September 2023', 9, 2023),
(10, 'October 2023', 10, 2023),
(11, 'November 2023', 11, 2023),
(12, 'December 2023', 12, 2023),
(13, 'January 2024', 1, 2024),
(14, 'February 2024', 2, 2024),
(15, 'March 2024', 3, 2024),
(16, 'April 2024', 4, 2024),
(17, 'May 2024', 5, 2024),
(18, 'June 2024', 6, 2024),
(19, 'July 2024', 7, 2024),
(20, 'August 2024', 8, 2024),
(21, 'September 2024', 9, 2024),
(22, 'October 2024', 10, 2024),
(23, 'November 2024', 11, 2024),
(24, 'December 2024', 12, 2024);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_low` int(11) NOT NULL,
  `task_high` int(11) NOT NULL,
  `task_workflow_status` int(11) NOT NULL DEFAULT '0',
  `task_description` varchar(255) NOT NULL,
  `sprint_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  `task_type_id` int(11) NOT NULL,
  `task_vertical_id` int(11) NOT NULL,
  `is_external` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_archived` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `task_low`, `task_high`, `task_workflow_status`, `task_description`, `sprint_id`, `customer_id`, `label_id`, `task_type_id`, `task_vertical_id`, `is_external`, `created_at`, `created_by`, `is_archived`) VALUES
(68, 'First Task', 3, 5, 0, 'æalkwejd lkawjdlk awlkd awd aæl', 6, 1, 2, 0, 2, 0, '2023-06-16 22:49:12', 3, 0),
(69, 'More Bizz 1', 1, 5, 0, '<p>aælwdjkælkawjd lka</p>', 6, 0, 1, 0, 0, 0, '2023-06-17 11:30:52', 3, 0),
(70, 'Website: Workshops og opstart af opgaver 2', 5, 7, 0, '<p>hawdawd</p>', 6, 4, 2, 0, 2, 0, '2023-06-17 11:32:33', 3, 0),
(71, 'Website: Workshops og opstart af opgaver 2', 3, 5, 0, '<p>tawdawd</p>', 6, 2, 1, 0, 1, 0, '2023-06-18 18:25:45', 3, 0),
(72, 'Website: Workshops og opstart af opgaver 2', 3, 5, 0, '<p>tawdawd</p>', 10, 2, 1, 0, 1, 0, '2023-06-18 18:25:45', 3, 0),
(73, 'TEST DEV 1', 2, 5, 0, '<p>hawdaw</p>', 6, 3, 2, 0, 2, 0, '2023-06-18 18:30:29', 3, 0),
(74, 'TEST DEV 2', 1, 2, 0, '<p>hawda</p>', 6, 2, 2, 0, 1, 0, '2023-06-18 18:34:06', 3, 0),
(75, 'TEST DEV 3', 2, 5, 0, '<p>hgawd</p>', 6, 2, 2, 0, 2, 0, '2023-06-18 18:36:04', 3, 0),
(76, 'TEST DEV 4', 1, 23, 0, '<p>hawd</p>', 6, 3, 3, 0, 1, 0, '2023-06-18 18:38:04', 3, 0),
(77, 'TEST DEV 4', 1, 23, 0, '<p>hawd</p>', 7, 3, 3, 0, 1, 0, '2023-06-18 18:38:05', 3, 0),
(78, 'TEST DEV 5', 1, 2, 0, '<p>hawd</p>', 6, 2, 1, 0, 2, 0, '2023-06-18 18:38:57', 3, 0),
(79, '1 alwkda', 2, 4, 0, '<p>hgawd</p>', 6, 2, 2, 0, 2, 0, '2023-06-18 18:42:21', 3, 0),
(80, '2 awdag', 2, 5, 0, '<p>hawd</p>', 6, 3, 3, 0, 1, 0, '2023-06-18 18:49:07', 3, 0),
(81, '3 akwjd', 2, 5, 0, '<p>awldka	</p>', 6, 2, 2, 0, 2, 0, '2023-06-18 18:52:06', 3, 0),
(82, '4 haswda', 1, 2, 0, '<p>hawd</p>', 6, 3, 2, 0, 2, 0, '2023-06-18 18:52:29', 3, 0),
(83, '5jka wd', 2, 45, 0, '<p>awd-law</p>', 6, 2, 2, 0, 1, 0, '2023-06-18 18:52:54', 3, 0),
(84, 'Website: Workshops og opstart af opgaver 2 Website: Workshops og opstaWebsite: Workshops og opstart af opgaver 2 rt af opgaver 2 ', 1, 12, 0, '<p>hawdawd</p>', 6, 2, 1, 0, 1, 0, '2023-06-18 18:54:44', 3, 0),
(85, '2 awkld', 1, 12, 0, '<p>hawdawd</p>', 7, 2, 1, 0, 1, 0, '2023-06-18 18:54:52', 3, 0),
(86, 'YQ NEWLY UPDATED', 4, 5, 0, '<p>hawdawd</p>', 6, 8, 1, 0, 2, 0, '2023-06-19 19:11:42', 3, 1),
(87, 'YQ NEW 2', 1, 6, 0, '<h1>hawdawd 2</h1><p>2</p>', 8, 7, 1, 0, 2, 0, '2023-06-19 19:11:54', 3, 1),
(88, 'Test Persosn', 2, 5, 0, '<p>hawdawd</p>', 6, 1, 2, 0, 1, 0, '2023-06-26 12:45:53', 3, 1),
(89, 'Test Persosn', 2, 5, 0, '<p>hawdawd</p>', 7, 1, 2, 0, 1, 0, '2023-06-26 12:45:53', 3, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tasks_persons`
--

CREATE TABLE `tasks_persons` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `time_percentage_allocated` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `tasks_persons`
--

INSERT INTO `tasks_persons` (`id`, `task_id`, `person_id`, `time_percentage_allocated`) VALUES
(1, 69, 4, 0),
(2, 69, 5, 0),
(3, 70, 3, 0),
(4, 70, 4, 0),
(5, 71, 4, 0),
(6, 72, 4, 0),
(7, 73, 4, 0),
(8, 74, 3, 0),
(9, 75, 3, 0),
(10, 76, 4, 0),
(11, 77, 4, 0),
(12, 78, 4, 0),
(13, 79, 3, 0),
(14, 80, 3, 0),
(15, 81, 3, 0),
(16, 82, 3, 0),
(17, 82, 5, 0),
(18, 83, 3, 0),
(19, 83, 4, 0),
(20, 84, 3, 0),
(21, 85, 3, 0),
(22, 86, 3, 0),
(23, 87, 3, 0),
(37, 85, 4, 0),
(38, 85, 5, 0),
(46, 89, 5, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `task_labels`
--

CREATE TABLE `task_labels` (
  `label_id` int(11) NOT NULL,
  `label_name` varchar(255) NOT NULL,
  `label_color` varchar(255) NOT NULL DEFAULT '#36008D'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `task_labels`
--

INSERT INTO `task_labels` (`label_id`, `label_name`, `label_color`) VALUES
(1, 'None', '#FFFFFF'),
(2, 'Pre-Sale', '#50dbc8'),
(3, 'Ad-hoc', '#30afe8'),
(4, 'Kørsel', '#40abc8');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `task_verticals`
--

CREATE TABLE `task_verticals` (
  `task_vertical_id` int(11) NOT NULL,
  `task_vertical_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `task_verticals`
--

INSERT INTO `task_verticals` (`task_vertical_id`, `task_vertical_name`) VALUES
(1, 'SEO'),
(2, 'Paid Search');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `time_registrations`
--

CREATE TABLE `time_registrations` (
  `time_registration_id` int(11) NOT NULL,
  `time_registration_amount` decimal(11,2) NOT NULL,
  `time_registration_date` varchar(255) NOT NULL,
  `task_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `time_registration_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `time_registrations`
--

INSERT INTO `time_registrations` (`time_registration_id`, `time_registration_amount`, `time_registration_date`, `task_id`, `person_id`, `time_registration_note`) VALUES
(1, '2.00', '2023-06-25', 87, 3, ''),
(2, '2.00', '2023-06-25', 87, 3, ''),
(3, '1.00', '2023-06-26', 87, 3, ''),
(4, '0.50', '2023-06-27', 87, 3, ''),
(5, '1.00', '2023-06-25', 87, 3, ''),
(6, '1.00', '2023-06-26', 84, 3, ''),
(7, '2.00', '2023-06-27', 84, 3, ''),
(8, '2.00', '2023-06-27', 89, 3, '');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_image` varchar(255) DEFAULT NULL,
  `user_title` varchar(255) DEFAULT 'default',
  `user_role` int(11) DEFAULT '0',
  `user_activated` int(11) DEFAULT '0',
  `darkmode` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `profile_image`, `user_title`, `user_role`, `user_activated`, `darkmode`) VALUES
(3, 'Karl Johnson', 'db2@kynetic.dk', '$2y$10$oth6IPxaIQUbiXrHSfbO4e/YVQQbNhHyL7sI7w59iy4Mkd8f5UOkm', '2023-06-13 20:15:59', 'ai_jhgajhdjawd.jpg', 'default', 0, 1, 0),
(4, 'Yasmin Katie', 'db3@kynetic.dk', '$2y$10$4H5fQ9uraT7pOPsPyhIt8eorl69PW/VA..MRsJ3UWeR6zfNUuEHwK', '2023-06-13 20:26:05', NULL, 'default', 0, 0, 0),
(5, 'Qax Weston', 'db4@kynetic.dk', '$2y$10$4H5fQ9uraT7pOPsPyhIt8eorl69PW/VA..MRsJ3UWeR6zfNUuEHwK', '2023-06-14 13:13:00', NULL, 'default', 0, 0, 0),
(6, 'Eliot Bob', 'db5@kynetic.dk', '$2y$10$4H5fQ9uraT7pOPsPyhIt8eorl69PW/VA..MRsJ3UWeR6zfNUuEHwK', '2023-06-14 13:50:36', NULL, 'default', 0, 0, 0),
(7, 'Ratch Target', 'db6@kynetic.dk', '$2y$10$4H5fQ9uraT7pOPsPyhIt8eorl69PW/VA..MRsJ3UWeR6zfNUuEHwK', '2023-06-14 13:52:37', NULL, 'default', 0, 0, 0),
(8, 'Tyson Unicorn', 'db7@k.dk', '$2y$10$4H5fQ9uraT7pOPsPyhIt8eorl69PW/VA..MRsJ3UWeR6zfNUuEHwK', '2023-06-14 13:54:12', NULL, 'default', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_role_id`, `user_role_name`) VALUES
(1, 0, 'default'),
(2, 1, 'admin');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks for tabel `sprints`
--
ALTER TABLE `sprints`
  ADD PRIMARY KEY (`sprint_id`);

--
-- Indeks for tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indeks for tabel `tasks_persons`
--
ALTER TABLE `tasks_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `task_labels`
--
ALTER TABLE `task_labels`
  ADD PRIMARY KEY (`label_id`);

--
-- Indeks for tabel `task_verticals`
--
ALTER TABLE `task_verticals`
  ADD PRIMARY KEY (`task_vertical_id`);

--
-- Indeks for tabel `time_registrations`
--
ALTER TABLE `time_registrations`
  ADD PRIMARY KEY (`time_registration_id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tilføj AUTO_INCREMENT i tabel `sprints`
--
ALTER TABLE `sprints`
  MODIFY `sprint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tilføj AUTO_INCREMENT i tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Tilføj AUTO_INCREMENT i tabel `tasks_persons`
--
ALTER TABLE `tasks_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Tilføj AUTO_INCREMENT i tabel `task_labels`
--
ALTER TABLE `task_labels`
  MODIFY `label_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tilføj AUTO_INCREMENT i tabel `task_verticals`
--
ALTER TABLE `task_verticals`
  MODIFY `task_vertical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tilføj AUTO_INCREMENT i tabel `time_registrations`
--
ALTER TABLE `time_registrations`
  MODIFY `time_registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tilføj AUTO_INCREMENT i tabel `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
