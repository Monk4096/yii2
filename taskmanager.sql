-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 192.168.1.134:3306
-- Время создания: Май 19 2019 г., 01:07
-- Версия сервера: 5.6.41
-- Версия PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taskmanager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `task_id`, `description`, `creator_id`, `date_create`) VALUES
(1, 1, 'первый комментарий', 1, '2019-05-17 00:00:00'),
(2, 1, 'второй комментарий', 4, '2019-05-17 00:00:00'),
(3, 1, 'проверка коммента', 1, '2019-05-18 00:00:00'),
(4, 2, 'проверка коммента2', 1, '2019-05-18 00:00:00'),
(5, 2, 'твапдрыпдшрпф', 1, '2019-05-18 00:00:00'),
(6, 2, 'еще раз', 1, '2019-05-18 17:51:10'),
(7, 4, 'на тебе комментарий!', 1, '2019-05-18 17:51:39'),
(8, 4, 'и еще один!!!1', 1, '2019-05-18 17:51:58'),
(9, 1, 'Проверка\r\n', 2, '2019-05-18 17:55:46'),
(10, 1, '123', 2, '2019-05-18 18:30:43'),
(11, 1, 'у34п', 1, '2019-05-18 18:31:47'),
(12, 3, 'erger', 1, '2019-05-18 18:37:17'),
(13, 1, '5yeryurtur', 1, '2019-05-18 18:43:55'),
(14, 15, 'Надо еще сходить', 1, '2019-05-18 21:27:27'),
(15, 1, 'пошел спать', 1, '2019-05-19 01:06:05');

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
('m000000_000000_base', 1555935621),
('m190422_121043_create_users_table', 1555935625),
('m190423_144216_create_tasks_table', 1556031241),
('m190423_150201_update_users_table', 1556031767),
('m190510_125806_create_status_table', 1557494081),
('m190510_125903_update_tasks_table', 1557495458),
('m190517_091534_create_comments_table', 1558085147);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Отправлена в работу'),
(2, 'В работе'),
(3, 'Завершена'),
(4, 'ghjdthrf');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `responsible_id` int(11) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `creator_id`, `responsible_id`, `deadline`, `status_id`) VALUES
(1, 'задача 1', 'проверка обновленияпроверка', 1, 1, NULL, 2),
(2, 'задача 2', 'описание задачи 2', 1, 4, '2019-05-02', 2),
(3, 'Задача 3', 'Описание Задачи 3', 1, 4, '2019-05-03', 1),
(4, 'Задача 4', 'Описание Задачи 4', 1, 4, '2019-05-04', 1),
(5, 'Задача 5', 'описание задачи 5', 2, 2, '2019-05-05', 1),
(6, 'Задача test', 'проверка', 1, 1, '2019-05-06', 1),
(7, 'Задача test', 'проверка', 1, 1, NULL, 1),
(8, 'Задача test', 'проверка', 1, 1, NULL, 1),
(9, 'Задача test2', 'Проверка', 1, 1, NULL, 1),
(10, 'Задача test2', 'Проверка', 1, 1, NULL, 1),
(13, 'Создание задачи', 'Проверка создания задачи', 3, 3, NULL, 1),
(14, 'Создание задачи 2', 'Создание задачи 2', 3, 3, NULL, 1),
(15, 'сходить в магазин', 'купить пиво', 1, 1, '2019-05-01', 3),
(17, 'Задача отправки сообщения', 'показать в письме описание задачи.', 1, 3, NULL, 1),
(19, 'Задача отправки сообщения 2', 'Test 123', 1, 3, NULL, 1),
(20, 'Задача отправки сообщения 3', 'Test 1234', 1, 3, NULL, 1),
(21, 'Задача отправки сообщения 4', 'Test 12345', 1, 3, NULL, 1),
(22, 'Тест с телефона', 'Описание ', 3, 3, '2019-05-22', 1),
(23, 'Тест с телефона 2', 'Описание', 4, 4, '2019-05-17', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `password`) VALUES
(1, 'admin', 'administrator', 'admin'),
(2, 'user', 'user', 'user'),
(3, 'unknown', 'unknown', '123456'),
(4, 'test', NULL, 'test');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_creator_user` (`creator_id`),
  ADD KEY `fk_tasks_comments` (`task_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasks_creator_user` (`creator_id`),
  ADD KEY `fk_tasks_responsible_user` (`responsible_id`),
  ADD KEY `fk_tasks_status` (`status_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_creator_user` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_tasks_comments` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_creator_user` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_tasks_responsible_user` FOREIGN KEY (`responsible_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_tasks_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `fk_tasks_status_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
