-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 12 2024 г., 14:05
-- Версия сервера: 8.0.30
-- Версия PHP: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `umirs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `img` text NOT NULL,
  `responses` json NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COMMENT='Вопросы для тестов';

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `title`, `name`, `desc`, `img`, `responses`) VALUES
(34, 54, 'НАЗВАНИЕ dfsВОПРОСА', 'НАЗВАНИЕ dfsВОПРОСА', 'ОПИСАНИЕ ВОПРОСА', 'картинка 2 (2).png', '[\"ОТВЕТ ПРАВИЛЬНЫЙ\", \"ОТВЕТ 2\", \"333333\", \"OTVET4\"]'),
(20, 46, 'апекпкем', 'апекпкем', 'кеикемкеи', '01.png', '[\"u0438u0435u043au0435u043au0438u043au0435u0438\", \"u043au0438u0435u043au0435u0438\", \"u043au0435u0438u043au0435u0438u043au0435\", \"u0438u043au0435u0438u043au0435u0438\"]'),
(19, 46, 'авыаываыыва ыва ыв', 'авыаываыыва ыва ыв', 'аываываываы ыва ', '02.png', '[\"u044bu0432u0430u044bu0432u0430\", \"u044b u0430u044bu0432u0430\", \" u0430u044bu0432u0430\", \"u044bu0432u0430u044bu0432u0430\"]'),
(18, 46, 'мчмвап', 'мчмвап', 'вапвпимс', 'Обложка 2.png', '[\"u0441u043cu0438u0441u043cu0438\", \"u0441u043cu0438u0441u043c\", \"u0438u0441u043cu0438\", \"u0441u043cu0438u0441u043cu0438\"]'),
(33, 54, 'DNJHJQ D', 'DNJHJQ D', 'ВТОРОЕ ОПИСАНИЕ ДЯ ВТОРОГО ВОПРОСА', 'ф.png', '[\"ОТВЕТ\", \"ANSWER\", \"REQUIRE\", \"TEST\"]'),
(32, 54, 'ТРЕТИЙ УЖЕ', 'ТРЕТИЙ УЖЕ', 'TRETIY DESCRIPTION', '', '[\"ОТВЕ\", \"2423\", \"fsdfgsdf\", \"dsfsdf\"]'),
(26, 52, 'ТРЕТИЙ УЖЕ', 'ТРЕТИЙ УЖЕ', 'TRETIY DESCRIPTION', '', '[\"ОТВЕ\", \"2423\", \"fsdfgsdf\", \"dsfsdf\"]'),
(27, 52, 'НАЗВАНИЕ ВОПРОСА', 'НАЗВАНИЕ ВОПРОСА', 'ОПИСАНИЕ ВОПРОСА', 'картинка 2 (2).png', '[\"ОТВЕТ ПРАВИЛЬНЫЙ\", \"ОТВЕТ 2\", \"333333\", \"OTVET4\"]'),
(28, 52, 'DNJHJQ D', 'DNJHJQ D', 'ВТОРОЕ ОПИСАНИЕ ДЯ ВТОРОГО ВОПРОСА', 'ф.png', '[\"ОТВЕТ\", \"ANSWER\", \"REQUIRE\", \"TEST\"]'),
(29, 53, 'ТРЕТИЙ УЖЕ', 'ТРЕТИЙ УЖЕ', 'TRETIY DESCRIPTION', '', '[\"ОТВЕ\", \"2423\", \"fsdfgsdf\", \"dsfsdf\"]'),
(30, 53, 'DNJHJQ D', 'DNJHJQ D', 'ВТОРОЕ ОПИСАНИЕ ДЯ ВТОРОГО ВОПРОСА', 'ф.png', '[\"ОТВЕТ\", \"ANSWER\", \"REQUIRE\", \"TEST\"]'),
(31, 53, 'НАЗВАНИЕ dfsВОПРОСА', 'НАЗВАНИЕ dfsВОПРОСА', 'ОПИСАНИЕ ВОПРОСА', 'картинка 2 (2).png', '[\"ОТВЕТ ПРАВИЛЬНЫЙ\", \"ОТВЕТ 2\", \"333333\", \"OTVET4\"]');

-- --------------------------------------------------------

--
-- Структура таблицы `successTest`
--

CREATE TABLE `successTest` (
  `id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COMMENT='Таблица связей между тестами и пользователями';

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `desc_short` varchar(255) NOT NULL,
  `preview_img_src` varchar(255) NOT NULL,
  `main_img_src` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `questions` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COMMENT='Тесты';

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `name`, `desc`, `desc_short`, `preview_img_src`, `main_img_src`, `time`, `difficulty`, `questions`) VALUES
(54, 'Тест для тестfsа номер два', 'Большое опdsfсиание теста используется для детальной странички бам бам бом бом ', 'Описsdfание теста краткое. используется в превью.', 'DSC01173.jpg', 'DSC01173.jpg', '12', '7', '123'),
(53, 'Тест для теста номер два', 'Большое опсиание теста используется для детальной странички бам бам бом бом ', 'Описание теста краткое. используется в превью.', 'DSC01173.jpg', 'DSC01173.jpg', '12', '7', '123'),
(46, 'название теста', 'описание теста', 'описание теста кратко', 'images.jpg', 'images.jpg', '12', '12', '123'),
(52, 'Тест для теста номер два', 'Большое опсиание теста используется для детальной странички бам бам бом бом ', 'Описание теста краткое. используется в превью.', 'DSC01173.jpg', 'DSC01173.jpg', '12', '7', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `primary` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COMMENT='Таблица пользователей';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `number`, `password`, `primary`) VALUES
(2, 'name', 'surname', 'emai2l', 'number', '', 0),
(3, '', '', '', '', '', 0),
(4, '', '', '', '', '', 0),
(5, 'аывмыа', 'ываыва', 'ываыва', 'ыва', '', 0),
(6, '', '', '', '', '', 0),
(7, '', '', '', '', '', 0),
(8, '', '', '', '..', '', 0),
(9, '', '', '', '..', '', 0),
(10, '', '', '', '..', '', 0),
(11, '', '', '', '..', '', 0),
(12, '', '', '', '..', '', 0),
(13, '123', '123', '123', '123', '', 0),
(14, 'fdf', '123', '123', '123', '', 0),
(15, 'ка', '123', '123', '123', '', 0),
(16, 'das', '123', '123', '123', '', 0),
(17, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', '', 0),
(18, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(19, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(20, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(21, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(22, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(23, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(24, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(25, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(26, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(27, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(28, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(29, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(30, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(31, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(32, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(33, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(34, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(35, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(36, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(37, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(38, 'das', 'asdasd', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'das', 0),
(39, 'sdf', 'fsdf', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'sdf', 0),
(40, 'sdf', 'fsdf', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'sdf', 0),
(41, 'sdf', 'fsdf', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'sdf', 0),
(42, 'sdf', 'fsdf', 'pro100lehsa@gmail.com', 'pro100lehsa@gmail.com', 'fsdf', 0),
(43, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `successTest`
--
ALTER TABLE `successTest`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `successTest`
--
ALTER TABLE `successTest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
