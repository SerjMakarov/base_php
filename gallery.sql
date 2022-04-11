-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 11 2022 г., 01:56
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
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `goods_name` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description` text,
  `price` int DEFAULT NULL,
  `currencies` tinytext,
  `id_img` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `goods_name`, `description`, `price`, `currencies`, `id_img`) VALUES
(21, 'SOLARGLIDE 5 M', 'SOLARGLIDE 5 ОБЕСПЕЧИВАЮТ УСТОЙЧИВОСТЬ И ПРЕВОСХОДНЫЙ ВОЗВРАТ ЭНЕРГИИ.\r\nSolarglide 5 — это универсальные кроссовки, в которых ты можешь тренироваться и достигать поставленных целей. В них используются все современные технологии: от промежуточной подошвы BOOST до вязаного текстильного верха и adidas LEP 2.0. Верх кроссовок на 50% состоит из функционального волокна Parley Ocean Plastic — переработанного пластика, собранного на пляжах и прибрежных территориях до того, как он попадет в океан.', 3000, 'Руб', 47),
(22, 'ULTRABOOST 4.0 DNA', 'КРОССОВКИ ULTRABOOST 4.0 DNA\r\nКРОССОВКИ ULTRABOOST НА КАЖДЫЙ ДЕНЬ.\r\nМолодая легенда. Кроссовки adidas Ultraboost дебютировали в 2015 году и стали настоящим хитом далеко за пределами бега. Мягкий вязаный верх обеспечивает вентиляцию там, где она необходима больше всего. Промежуточная подошва Boost дарит невероятный комфорт, а элементы дизайна повторяют архивные модели.', 5000, 'Руб', 48),
(23, 'RESPONSE SUPER 2.0', 'КРОССОВКИ ДЛЯ БЕГА RESPONSE SUPER 2.0\r\nБЕГОВЫЕ КРОССОВКИ НА КАЖДЫЙ ДЕНЬ.\r\nВ этих беговых кроссовках adidas тебе будет комфортно весь день. Сетчатый верх хорошо пропускает воздух, позволяя ногам дышать. Амортизирующая подошва смягчает каждый шаг.\r\n\r\nМодель выполнена из переработанных материалов в рамках наших обязательств по сокращению пластиковых отходов. 20% элементов верха минимум на 50% состоят из переработанных материалов.', 8000, 'руб', 49),
(25, 'БОТИНКИ ДЛЯ ХАЙКИНГА TERREX TRAILMAKER COLD.RDY', 'БОТИНКИ ДЛЯ ХАЙКИНГА TERREX TRAILMAKER COLD.RDY\r\nЛЕГКИЕ И ТЕПЛЫЕ КРОССОВКИ ДЛЯ ХАЙКИНГА\r\nХолод и зима не помеха для похода в этих универсальных кроссовках adidas Terrex Trailmaker Mid Hiking. Легкий эластичный материал с водоотталкивающей мембраной на зимней подкладке плотно облегает стопу. Водоотталкивающий слой PrimaLoft® и утеплитель COLD.RDY сохраняют тепло и сухость в условиях холода и высокой влажности.', 8522, 'Руб', 51),
(26, 'КЕПКА BASEBALL', 'КЕПКА BASEBALL\r\nПОВСЕДНЕВНАЯ КЕПКА ИЗ ЛЕГКОЙ ТКАНИ.\r\nДополни свой образ этой классической бейсболкой adidas. Мягкая ткань защищает от солнца. Модель украшена фирменным логотипом.', 1000, 'Руб', 52),
(27, 'ADVANTAGE BASE VELCRO', 'КРОССОВКИ ADVANTAGE BASE\r\nПОВСЕДНЕВНЫЕ КРОССОВКИ В ТЕННИСНОМ СТИЛЕ.\r\nТеннисный стиль для городских улиц. Верх этих кроссовок выполнен из гладкой экокожи и дополнен перфорированными тремя полосками. Низкая прошитая резиновая подошва завершает образ.', 6000, 'Руб', 53);

-- --------------------------------------------------------

--
-- Структура таблицы `small_img`
--

CREATE TABLE `small_img` (
  `id_img` int UNSIGNED NOT NULL,
  `url` text NOT NULL,
  `size` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `small_img`
--

INSERT INTO `small_img` (`id_img`, `url`, `size`, `name`) VALUES
(47, './upload/1649626741_74877e81996311ec87ca2c4d5458e9b8_907247caa04211ec87d32c4d5458e9b8.jpg', 39865, '1649626741_74877e81996311ec87ca2c4d5458e9b8_907247caa04211ec87d32c4d5458e9b8.jpg'),
(48, './upload/1649626821_85e241588b1511ec87b72c4d5458e9b8_506c2ed28b0e11ec87b72c4d5458e9b8.jpg', 40368, '1649626821_85e241588b1511ec87b72c4d5458e9b8_506c2ed28b0e11ec87b72c4d5458e9b8.jpg'),
(49, './upload/1649626916_2fc7a8f37ea011ec87a82c4d5458e9b8_53a2ce1a7f4711ec87a92c4d5458e9b8.jpg', 46062, '1649626916_2fc7a8f37ea011ec87a82c4d5458e9b8_53a2ce1a7f4711ec87a92c4d5458e9b8.jpg'),
(51, './upload/1649627280_be21b38f25cd11ec873c2c4d5458e9b8_0c5dc25825e411ec873c2c4d5458e9b8.jpg', 56720, '1649627280_be21b38f25cd11ec873c2c4d5458e9b8_0c5dc25825e411ec873c2c4d5458e9b8.jpg'),
(52, './upload/1649627946_74877e99996311ec87ca2c4d5458e9b8_bf544c24a04111ec87d32c4d5458e9b8.jpg', 288317, '1649627946_74877e99996311ec87ca2c4d5458e9b8_bf544c24a04111ec87d32c4d5458e9b8.jpg'),
(53, './upload/1649628233_74877e80996311ec87ca2c4d5458e9b8_907247c4a04211ec87d32c4d5458e9b8.jpg', 135425, '1649628233_74877e80996311ec87ca2c4d5458e9b8_907247c4a04211ec87d32c4d5458e9b8.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `small_img`
--
ALTER TABLE `small_img`
  ADD PRIMARY KEY (`id_img`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `small_img`
--
ALTER TABLE `small_img`
  MODIFY `id_img` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
