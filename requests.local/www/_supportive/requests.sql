-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 21 2014 г., 00:25
-- Версия сервера: 5.5.25
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `learnmysql`
--

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r_date` date NOT NULL,
  `r_time` time NOT NULL,
  `performer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_date` date NOT NULL,
  `c_time` time NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'В ожидании',
  `log` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `r_type`, `client`, `r_date`, `r_time`, `performer`, `c_date`, `c_time`, `status`, `log`) VALUES
(1, 'убрать снег 1', 'ИП Клавдия Михаловна', '2014-11-19', '00:00:00', 'Я', '0000-00-00', '00:00:00', 'В ожидании', ''),
(2, 'привезти колёса 1', 'Автодом', '2014-11-18', '00:00:00', '', '0000-00-00', '00:00:00', 'В ожидании', ''),
(3, 'убрать снег 2', 'ИП Клавдия Михаловна', '2014-11-19', '00:00:00', 'Я', '0000-00-00', '00:00:00', 'В ожидании', ''),
(5, 'помыть окна', 'Имя Фамилия Отчество1', '2014-11-19', '00:00:00', 'Олег', '0000-00-00', '00:00:00', 'Выполнена', '<br />2014-11-20 23:30:57 Клиент изменен с "Имя Фамилия Отчество" на "Имя Фамилия Отчество1"<br />2014-11-20 23:30:57 Запрос изменен с "помыть окна" на "помыть окна1"<br />2014-11-20 23:31:07 Запрос изменен с "помыть окна1" на "помыть окна"<br />2014-11-20 23:31:07 Статус изменен с "Выполняется" на "Выполнена"<br />2014-11-20 23:31:07 Статус изменен с "Пётр" на "Олег"<br />2014-11-20 23:31:07 Клиент изменен с "" на "Имя Фамилия Отчество1"<br />2014-11-20 23:31:07 Запрос изменен с "" на "помыть окна"<br />2014-11-20 23:31:07 Статус изменен с "" на "Выполнена"<br />2014-11-20 23:31:07 Статус изменен с "" на "Олег"<br />2014-11-20 23:31:07 Клиент изменен с "" на "Имя Фамилия Отчество1"<br />2014-11-20 23:31:07 Запрос изменен с "" на "помыть окна"<br />2014-11-20 23:31:07 Статус изменен с "" на "Выполнена"<br />2014-11-20 23:31:07 Статус изменен с "" на "Олег"<br />2014-11-20 23:31:07 Клиент изменен с "" на "Имя Фамилия Отчество1"<br />2014-11-20 23:31:07 Запрос изменен с "" на "помыть окна"<br />2014-11-20 23:31:07 Статус изменен с "" на "Выполнена"<br />2014-11-20 23:31:07 Статус изменен с "" на "Олег"'),
(6, 'написать диплом', 'Абвер', '2014-11-19', '00:00:00', '', '0000-00-00', '00:00:00', 'В ожидании', ''),
(8, 'задание242', 'Заявитель242', '2014-11-21', '00:15:28', 'Не задан', '0000-00-00', '00:00:00', 'В ожидании', ''),
(9, 'задание24', 'Заявитель24', '2014-11-21', '00:15:28', 'Не задан', '0000-00-00', '00:00:00', 'В ожидании', '<br />2014-11-21 00:16:59 Клиент изменен с "Заявитель242" на "Заявитель24"<br />2014-11-21 00:16:59 Запрос изменен с "задание242" на "задание24"');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;