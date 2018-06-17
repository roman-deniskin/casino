-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 17 2018 г., 16:04
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

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
  `id` int(11) NOT NULL,
  `money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `casino`
--

INSERT INTO `casino` (`id`, `money`) VALUES
(1, 9894700);

-- --------------------------------------------------------

--
-- Структура таблицы `prizes`
--

CREATE TABLE `prizes` (
  `id` int(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'Тип приза',
  `userId` int(11) NOT NULL DEFAULT '0' COMMENT 'Кому принадлежит. По умолчанию 0 - принадлежит Казино, если приз возвращён, то значение -1',
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prizes`
--

INSERT INTO `prizes` (`id`, `name`, `type`, `userId`, `is_confirmed`) VALUES
(1, 'House', 1, 0, 0),
(2, 'Car', 2, 0, 0),
(3, 'Car', 2, 0, 0),
(4, 'Car', 2, 0, 0),
(5, 'Car', 2, 0, 0),
(6, 'Car', 2, 0, 0),
(7, 'Smartphone', 3, 0, 0),
(8, 'Smartphone', 3, 0, 0),
(9, 'Smartphone', 3, 0, 0),
(10, 'Smartphone', 3, 0, 0),
(11, 'Smartphone', 3, 0, 0),
(12, 'Smartphone', 3, 0, 0),
(13, 'Smartphone', 3, 0, 0),
(14, 'Smartphone', 3, 0, 0),
(15, 'Smartphone', 3, 0, 0),
(16, 'Smartphone', 3, 0, 0),
(17, 'Smartphone', 3, 0, 0),
(18, 'Smartphone', 3, 0, 0),
(19, 'Smartphone', 3, 0, 0),
(20, 'Smartphone', 3, 0, 0),
(21, 'Smartphone', 3, 0, 0),
(22, 'Smartphone', 3, 0, 0),
(23, 'Smartphone', 3, 0, 0),
(24, 'Smartphone', 3, 0, 0),
(25, 'Smartphone', 3, 0, 0),
(26, 'Smartphone', 3, 0, 0),
(27, 'Smartphone', 3, 0, 0),
(28, 'Smartphone', 3, 0, 0),
(29, 'Smartphone', 3, 0, 0),
(30, 'Smartphone', 3, 0, 0),
(31, 'Smartphone', 3, 0, 0),
(32, 'Smartphone', 3, 0, 0),
(33, 'Smartphone', 3, 0, 0),
(34, 'Smartphone', 3, 0, 0),
(35, 'Smartphone', 3, 0, 0),
(36, 'Smartphone', 3, 0, 0),
(37, 'Smartphone', 3, 0, 0),
(38, 'Smartphone', 3, 0, 0),
(39, 'Smartphone', 3, 0, 0),
(40, 'Smartphone', 3, 0, 0),
(41, 'Smartphone', 3, 0, 0),
(42, 'Smartphone', 3, 0, 0),
(43, 'Smartphone', 3, 0, 0),
(44, 'Smartphone', 3, 0, 0),
(45, 'Smartphone', 3, 0, 0),
(46, 'Smartphone', 3, 0, 0),
(47, 'Smartphone', 3, 0, 0),
(48, 'Smartphone', 3, 0, 0),
(49, 'Smartphone', 3, 0, 0),
(50, 'Smartphone', 3, 0, 0),
(51, 'Smartphone', 3, 0, 0),
(52, 'Smartphone', 3, 0, 0),
(53, 'Smartphone', 3, 0, 0),
(54, 'Smartphone', 3, 0, 0),
(55, 'Smartphone', 3, 0, 0),
(56, 'Smartphone', 3, 0, 0),
(57, 'Kick scooter', 4, 0, 0),
(58, 'Kick scooter', 4, 0, 0),
(59, 'Kick scooter', 4, 0, 0),
(60, 'Kick scooter', 4, 0, 0),
(61, 'Kick scooter', 4, 0, 0),
(62, 'Kick scooter', 4, 0, 0),
(63, 'Kick scooter', 4, 0, 0),
(64, 'Kick scooter', 4, 0, 0),
(65, 'Kick scooter', 4, 0, 0),
(66, 'Kick scooter', 4, 0, 0),
(67, 'Kick scooter', 4, 0, 0),
(68, 'Kick scooter', 4, 0, 0),
(69, 'Kick scooter', 4, 0, 0),
(70, 'Kick scooter', 4, 0, 0),
(71, 'Kick scooter', 4, 0, 0),
(72, 'Kick scooter', 4, 0, 0),
(73, 'Kick scooter', 4, 0, 0),
(74, 'Kick scooter', 4, 0, 0),
(75, 'Kick scooter', 4, 0, 0),
(76, 'Kick scooter', 4, 0, 0),
(77, 'Kick scooter', 4, 0, 0),
(78, 'Kick scooter', 4, 0, 0),
(79, 'Kick scooter', 4, 0, 0),
(80, 'Kick scooter', 4, 0, 0),
(81, 'Kick scooter', 4, 0, 0),
(82, 'Kick scooter', 4, 0, 0),
(83, 'Kick scooter', 4, 0, 0),
(84, 'Kick scooter', 4, 0, 0),
(85, 'Kick scooter', 4, 0, 0),
(86, 'Kick scooter', 4, 0, 0),
(87, 'Kick scooter', 4, 0, 0),
(88, 'Kick scooter', 4, 0, 0),
(89, 'Kick scooter', 4, 0, 0),
(90, 'Kick scooter', 4, 0, 0),
(91, 'Kick scooter', 4, 0, 0),
(92, 'Kick scooter', 4, 0, 0),
(93, 'Kick scooter', 4, 0, 0),
(94, 'Kick scooter', 4, 0, 0),
(95, 'Kick scooter', 4, 0, 0),
(96, 'Kick scooter', 4, 0, 0),
(97, 'Kick scooter', 4, 0, 0),
(98, 'Kick scooter', 4, 0, 0),
(99, 'Kick scooter', 4, 0, 0),
(100, 'Kick scooter', 4, 0, 0),
(101, 'Kick scooter', 4, 0, 0),
(102, 'Kick scooter', 4, 0, 0),
(103, 'Kick scooter', 4, 0, 0),
(104, 'Kick scooter', 4, 0, 0),
(105, 'Kick scooter', 4, 0, 0),
(106, 'Kick scooter', 4, 0, 0),
(107, 'Kick scooter', 4, 0, 0),
(108, 'Kick scooter', 4, 0, 0),
(109, 'Kick scooter', 4, 0, 0),
(110, 'Kick scooter', 4, 0, 0),
(111, 'Kick scooter', 4, 0, 0),
(112, 'Kick scooter', 4, 0, 0),
(113, 'Kick scooter', 4, 0, 0),
(114, 'Kick scooter', 4, 0, 0),
(115, 'Kick scooter', 4, 0, 0),
(116, 'Kick scooter', 4, 0, 0),
(117, 'Kick scooter', 4, 0, 0),
(118, 'Kick scooter', 4, 0, 0),
(119, 'Kick scooter', 4, 0, 0),
(120, 'Kick scooter', 4, 0, 0),
(121, 'Kick scooter', 4, 0, 0),
(122, 'Kick scooter', 4, 0, 0),
(123, 'Kick scooter', 4, 0, 0),
(124, 'Kick scooter', 4, 0, 0),
(125, 'Kick scooter', 4, 0, 0),
(126, 'Kick scooter', 4, 0, 0),
(127, 'Kick scooter', 4, 0, 0),
(128, 'Kick scooter', 4, 0, 0),
(129, 'Kick scooter', 4, 0, 0),
(130, 'Kick scooter', 4, 0, 0),
(131, 'Kick scooter', 4, 0, 0),
(132, 'Kick scooter', 4, 0, 0),
(133, 'Kick scooter', 4, 0, 0),
(134, 'Kick scooter', 4, 0, 0),
(135, 'Kick scooter', 4, 0, 0),
(136, 'Kick scooter', 4, 0, 0),
(137, 'Kick scooter', 4, 0, 0),
(138, 'Kick scooter', 4, 0, 0),
(139, 'Kick scooter', 4, 0, 0),
(140, 'Kick scooter', 4, 0, 0),
(141, 'Kick scooter', 4, 0, 0),
(142, 'Kick scooter', 4, 0, 0),
(143, 'Kick scooter', 4, 0, 0),
(144, 'Kick scooter', 4, 0, 0),
(145, 'Kick scooter', 4, 0, 0),
(146, 'Kick scooter', 4, 0, 0),
(147, 'Kick scooter', 4, 0, 0),
(148, 'Kick scooter', 4, 0, 0),
(149, 'Kick scooter', 4, 0, 0),
(150, 'Kick scooter', 4, 0, 0),
(151, 'Kick scooter', 4, 0, 0),
(152, 'Kick scooter', 4, 0, 0),
(153, 'Kick scooter', 4, 0, 0),
(154, 'Kick scooter', 4, 0, 0),
(155, 'Kick scooter', 4, 0, 0),
(156, 'Kick scooter', 4, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL,
  `login` varchar(255) NOT NULL COMMENT 'Имя пользователя (используется для входа в систему и приветствия)',
  `password` varchar(255) NOT NULL COMMENT 'Пароль (хранится всегда в закодированном виде)',
  `money` int(16) NOT NULL COMMENT 'Деньги пользователя',
  `unconfirmed_money` float NOT NULL,
  `bonus_balls` int(16) NOT NULL COMMENT 'Баллы лояльности'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Сущность пользователь';

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `money`, `unconfirmed_money`, `bonus_balls`) VALUES
(1, 'varezzz1', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0, 0, 119930);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `casino`
--
ALTER TABLE `casino`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `prizes`
--
ALTER TABLE `prizes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `casino`
--
ALTER TABLE `casino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `prizes`
--
ALTER TABLE `prizes`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
