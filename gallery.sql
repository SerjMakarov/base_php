-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 01 2022 г., 00:29
-- Версия сервера: 8.0.28-0ubuntu0.20.04.3
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `small_img`
--

CREATE TABLE `small_img` (
  `id` int UNSIGNED NOT NULL,
  `url` varchar(1000) NOT NULL,
  `size` int NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `small_img`
--

INSERT INTO `small_img` (`id`, `url`, `size`, `name`) VALUES
(62, './upload/1648587492_12.jpg', 139286, '1648587492_12.jpg'),
(63, './upload/1648591109_13.jpg', 113016, '1648591109_13.jpg'),
(64, './upload/1648591117_09.jpg', 81022, '1648591117_09.jpg'),
(65, './upload/1648591121_14.jpg', 151814, '1648591121_14.jpg'),
(66, './upload/1648591124_07.jpg', 99418, '1648591124_07.jpg'),
(67, './upload/1648591130_02.jpg', 70076, '1648591130_02.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `small_img`
--
ALTER TABLE `small_img`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `small_img`
--
ALTER TABLE `small_img`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
