-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2018 г., 19:09
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `casino`
--

-- --------------------------------------------------------

--
-- Структура таблицы `casino`
--

CREATE TABLE `casino` (
  `money` float NOT NULL DEFAULT '0' COMMENT 'Показывает количество денег в казино'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Сущность казино';

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL,
  `login` varchar(255) NOT NULL COMMENT 'Имя пользователя (используется для входа в систему и приветствия)',
  `password` varchar(255) NOT NULL COMMENT 'Пароль (хранится всегда в закодированном виде)',
  `money` int(16) NOT NULL COMMENT 'Деньги пользователя',
  `bonus_balls` int(16) NOT NULL COMMENT 'Баллы лояльности'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Сущность пользователь';

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `money`, `bonus_balls`) VALUES
(1, 'varezzz1', 'password', 100000, 1000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
