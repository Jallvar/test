-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
<<<<<<< HEAD
-- Время создания: Сен 06 2016 г., 19:58
=======
-- Время создания: Сен 05 2016 г., 17:41
>>>>>>> 871fa622d03607214ff16db11cee729c5b6e03d7
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `tjd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Структура таблицы `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
=======
>>>>>>> 871fa622d03607214ff16db11cee729c5b6e03d7
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
<<<<<<< HEAD
  `book` int(255) NOT NULL,
  `author` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;
=======
  `name` varchar(255) NOT NULL,
  `author` int(255) NOT NULL,
  `date` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
>>>>>>> 871fa622d03607214ff16db11cee729c5b6e03d7
