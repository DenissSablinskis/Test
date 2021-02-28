-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 28 2021 г., 19:45
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mysql`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mytable`
--

CREATE TABLE `mytable` (
  `id` int(20) NOT NULL,
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `mytable`
--

INSERT INTO `mytable` (`id`, `email`, `date`) VALUES
(108, 'denissablinskij@inbox.lv', '2021-02-28'),
(126, 'denissablinskij@gmail.com', '2021-02-28'),
(128, 'heritage34@yahoo.com', '2021-02-28'),
(129, 'Vefreme_Des@inbox.lv', '2021-02-28'),
(130, 'Moranodz@mail.ru', '2021-02-28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `mytable`
--
ALTER TABLE `mytable`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
