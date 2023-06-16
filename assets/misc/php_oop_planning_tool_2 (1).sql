-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 16. 06 2023 kl. 20:40:35
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
(2, 'hawda 2', 124151, '#e3e3e3', 1000, 1),
(3, 'hawdawd 3', 124151, '#e3e3e3', 1000, 1),
(4, 'hq32dad', 124151, '#e3e3e3', 1000, 1),
(5, 'w4daa', 124151, '#e3e3e3', 1000, 1),
(6, 'hawdawd awda', 124151, '#e3e3e3', 1000, 1),
(7, 'yqeawd awd', 124151, '#e3e3e3', 1000, 1),
(8, 'yqeawd aw 8', 124151, '#e3e3e3', 1000, 0);

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
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'Karl Johnson', 'db2@kynetic.dk', '$2y$10$wf9NkXnwaKEf/7CWu1gv4uJmUJPyQfoTBOFRiKKuWib54HY9op2qG', '2023-06-13 20:15:59', NULL, 'default', 0, 1, 0),
(4, 'Yasmin Katie', 'db3@kynetic.dk', '$2y$10$F5LzTirVabOlno79IyaZWumod.CuDVDE5xX7ZtNSc/tRCZ7Qbiuhi', '2023-06-13 20:26:05', NULL, 'default', 0, 0, 0),
(5, 'Qax Weston', 'db4@kynetic.dk', '$2y$10$BcNCycMNO8MdEocXur6lvegF9wwid02uB.r/9zBKZUhvuf9wcYJeq', '2023-06-14 13:13:00', NULL, 'default', 0, 0, 0),
(6, 'Eliot Bob', 'db5@kynetic.dk', '$2y$10$WuCKjPiG5lnyov.C9qGHW.18CumoN/xH6s8kgDdL20ciAJ41nMGJu', '2023-06-14 13:50:36', NULL, 'default', 0, 0, 0),
(7, 'Ratch Target', 'db6@kynetic.dk', '$2y$10$qPon280RGMhR8VtNwwp04.T4gO/V43tZVsd1rHZJsoz8RWLLQiNPi', '2023-06-14 13:52:37', NULL, 'default', 0, 0, 0),
(8, 'Tyson Unicorn', 'db7@k.dk', '$2y$10$ei3Rs9ITZ9zI579EAs4rFumMrgLSZjGvCM4/.khmgYD.tqcq54VDe', '2023-06-14 13:54:12', NULL, 'default', 0, 0, 0);

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
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Tilføj AUTO_INCREMENT i tabel `tasks_persons`
--
ALTER TABLE `tasks_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
