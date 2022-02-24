-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 24 2022 г., 17:24
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `canvases`
--

CREATE TABLE `canvases` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` smallint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `canvases`
--

INSERT INTO `canvases` (`id`, `name`, `status`) VALUES
(1, 'Paper', 1),
(2, 'Velvet', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` smallint(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Animals ', 1),
(2, 'Dogs', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category_figures`
--

CREATE TABLE `category_figures` (
  `id` int(11) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `figure_id` int(10) NOT NULL,
  `status` smallint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_figures`
--

INSERT INTO `category_figures` (`id`, `cat_id`, `figure_id`, `status`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `dimensions`
--

CREATE TABLE `dimensions` (
  `id` int(11) NOT NULL,
  `values` varchar(255) NOT NULL,
  `unit` smallint(2) NOT NULL DEFAULT 1,
  `status` smallint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dimensions`
--

INSERT INTO `dimensions` (`id`, `values`, `unit`, `status`) VALUES
(1, '8\"x10\"', 1, 1),
(2, '12\"x16\"', 1, 1),
(3, '16\"x20\"', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `figures`
--

CREATE TABLE `figures` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `preview` text NOT NULL,
  `description` text NOT NULL,
  `status` smallint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `figures`
--

INSERT INTO `figures` (`id`, `name`, `preview`, `description`, `status`) VALUES
(1, 'test name', 'test preview', 'test description', 1),
(2, 'dog name', 'dog preview', 'dog description', 1),
(3, 'dog name', 'dog preview', 'dog description', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `figure_images`
--

CREATE TABLE `figure_images` (
  `id` int(11) NOT NULL,
  `figure_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` smallint(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `frames`
--

CREATE TABLE `frames` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` smallint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `frames`
--

INSERT INTO `frames` (`id`, `type`, `status`) VALUES
(1, 'Unframed', 1),
(2, 'Framed Canvas', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1643543399),
('m220130_114641_create_table_categories', 1643543403),
('m220130_180311_create_table_figures', 1643566559),
('m220203_030830_create_table_categories_figures', 1643858131),
('m220207_181355_create_table_orders', 1644258713),
('m220208_181021_add_column_table_orders', 1644344027),
('m220209_175949_create_table_canvases', 1644429722),
('m220210_034812_create_table_frames', 1644465055),
('m220210_040436_create_table_dimensions', 1644515178),
('m220210_180521_create_table_prices', 1644516713),
('m220224_103515_create_table_figure_image', 1645700424);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postcode` int(11) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `status` smallint(2) NOT NULL DEFAULT 1,
  `state` smallint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `value` varchar(50) NOT NULL,
  `currency` smallint(2) NOT NULL DEFAULT 1,
  `figure_id` int(11) NOT NULL,
  `options` varchar(255) NOT NULL,
  `state` smallint(2) NOT NULL DEFAULT 1,
  `status` smallint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prices`
--

INSERT INTO `prices` (`id`, `value`, `currency`, `figure_id`, `options`, `state`, `status`) VALUES
(1, '30', 1, 1, '12 x 14', 1, 1),
(2, '50', 1, 1, '25 x 30', 1, 1),
(3, '25', 1, 2, '55 x 100', 1, 1),
(4, '10', 1, 2, '34 x 34', 1, 1),
(5, '25', 1, 1, '12\"x16\" Framed Canvas Paper', 0, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `canvases`
--
ALTER TABLE `canvases`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_figures`
--
ALTER TABLE `category_figures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dimensions`
--
ALTER TABLE `dimensions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `figures`
--
ALTER TABLE `figures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `figure_images`
--
ALTER TABLE `figure_images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `frames`
--
ALTER TABLE `frames`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `canvases`
--
ALTER TABLE `canvases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `category_figures`
--
ALTER TABLE `category_figures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `dimensions`
--
ALTER TABLE `dimensions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `figures`
--
ALTER TABLE `figures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `figure_images`
--
ALTER TABLE `figure_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `frames`
--
ALTER TABLE `frames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
