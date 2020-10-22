-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 22 2020 г., 04:56
-- Версия сервера: 10.1.22-MariaDB
-- Версия PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydating`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `address2` text NOT NULL,
  `country_id` int(6) NOT NULL,
  `region_id` int(6) NOT NULL,
  `zip` int(8) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password_hash`, `email`, `address`, `address2`, `country_id`, `region_id`, `zip`, `phone`) VALUES
(1, 'Galymzhan', 'Makhaliev', 'galym112', 'password', 'galim-91@mail.ru', '6-microdistrict 1A', 'flat 13', 7, 2, 50056, '87077919133'),
(2, 'Asap', 'Rocky', 'asaprock', 'huiznaet', 'asap@mail.ru', 'asap la', 'miami', 2, 7, 7, '988888888'),
(3, 'Kanye', 'Bek', 'kanyebek', '$2y$10$n3X4Z8r1kxA4.siAwoC5/.iMiLiFsXXiUIFMc6fvNkKOasiW1vbW.', 'kanyebek@mail.ru', 'LA, miami', 'big villa', 0, 0, 123456, '12345678'),
(4, 'Makalai', 'Kalai', 'makaka', '$2y$10$bcXqZAsUNEa2pQCZEqAwJeug67avQatxzKXqHLGAJZKwbMAROdtlm', 'makaka@mail.ru', 'Jungle', 'Tree', 0, 0, 999999, '000000000');

-- --------------------------------------------------------

--
-- Структура таблицы `ws_sessions`
--

CREATE TABLE `ws_sessions` (
  `session_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `session_expires` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `session_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `ws_sessions`
--

INSERT INTO `ws_sessions` (`session_id`, `session_expires`, `session_data`) VALUES
('aopb1j62re62kord8mnrvb8u9g', 1603304774, 'fname|s:5:\"Ablay\";lname|s:4:\"Khan\";a|s:1:\"a\";'),
('dn71io7qep26qhr1k1vh8skcig', 1603304820, 'fname|s:5:\"Ablay\";lname|s:4:\"Khan\";a|s:1:\"a\";');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ws_sessions`
--
ALTER TABLE `ws_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
