-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 22 2023 г., 11:46
-- Версия сервера: 5.6.38
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `basic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `trade_category_t`
--

CREATE TABLE `trade_category_t` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `trade_category_t`
--

INSERT INTO `trade_category_t` (`id`, `name`, `parent_id`) VALUES
(1, 'Самарская область', 0),
(2, 'Краснодарский край', 0),
(3, 'Самара', 1),
(4, 'Краснодар', 2),
(5, 'Омская область', 0),
(6, 'Новосибирская область', 0),
(7, 'Омск', 5),
(8, 'Новосибирск', 6),
(9, 'Барабинск', 8),
(10, 'Черлак', 7),
(11, 'Искитим', 8),
(12, 'Чернореченский', 11);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `trade_category_t`
--
ALTER TABLE `trade_category_t`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `trade_category_t`
--
ALTER TABLE `trade_category_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
